<?php
session_start();
require_once 'conexao.php';

// Proteção: se não estiver logado, não faz nada
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['erro' => 'Não autenticado']);
    exit;
}

$user_id = $_SESSION['user_id'];
$acao = $_GET['acao'] ?? '';

// 1. LIMPEZA DE FANTASMAS: Se um utilizador não atualiza há mais de 6 segundos, fica offline
// LIMPEZA DE FANTASMAS: Só fica offline se não der sinal de vida há mais de 30 segundos
$pdo->query("UPDATE utilizadores SET status = 'offline' WHERE ultima_atividade < NOW() - INTERVAL 45 SECOND AND status = 'online'");

// 2. ATUALIZAR ATIVIDADE: Atualiza o timestamp do utilizador atual para dizer "estou aqui"
$pdo->prepare("UPDATE utilizadores SET ultima_atividade = NOW(), status = 'online' WHERE id = ?")->execute([$user_id]);

header('Content-Type: application/json');

// LISTAR UTILIZADORES ONLINE
if ($acao === 'listar_utilizadores') {
    // Buscar utilizadores online (excluindo o próprio)
    $stmt = $pdo->prepare("SELECT id, username FROM utilizadores WHERE status = 'online' AND id != ?");
    $stmt->execute([$user_id]);
    $online = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Contar o total geral de utilizadores ligados (incluindo o próprio)
    $stmtTotal = $pdo->query("SELECT COUNT(*) FROM utilizadores WHERE status = 'online'");
    $total_ligados = $stmtTotal->fetchColumn();

    echo json_encode([
        'utilizadores' => $online,
        'total' => $total_ligados
    ]);
    exit;
}

// ENVIAR MENSAGEM PRIVADA
if ($acao === 'enviar_mensagem' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $destinatario_id = $_POST['destinatario_id'] ?? null;
    $mensagem = trim($_POST['mensagem'] ?? '');

    if ($destinatario_id && !empty($mensagem)) {
        $stmt = $pdo->prepare("INSERT INTO mensagens (remetente_id, destinatario_id, mensagem) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $destinatario_id, $mensagem]);
        echo json_encode(['status' => 'sucesso']);
    } else {
        echo json_encode(['status' => 'erro']);
    }
    exit;
}

// CARREGAR MENSAGENS
if ($acao === 'carregar_mensagens') {
    $com_quem_id = $_GET['com_quem_id'] ?? null;

    if ($com_quem_id) {
        $stmt = $pdo->prepare("
            SELECT m.*, r.username as remetente, d.username as destinatario 
            FROM mensagens m
            JOIN utilizadores r ON m.remetente_id = r.id
            JOIN utilizadores d ON m.destinatario_id = d.id
            WHERE (m.remetente_id = ? AND m.destinatario_id = ?)
               OR (m.remetente_id = ? AND m.destinatario_id = ?)
            ORDER BY m.data_envio ASC
        ");
        $stmt->execute([$user_id, $com_quem_id, $com_quem_id, $user_id]);
        $mensagens = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($mensagens as &$msg) {
            $msg['hora'] = date('H:i', strtotime($msg['data_envio']));
        }

        echo json_encode($mensagens);
    } else {
        echo json_encode([]);
    }
    exit;
}

// LOGOUT / SAÍDA MANUAl
if ($acao === 'sair') {
    $pdo->prepare("UPDATE utilizadores SET status = 'offline' WHERE id = ?")->execute([$user_id]);
    session_destroy();
    header("Location: index.php");
    exit;
}