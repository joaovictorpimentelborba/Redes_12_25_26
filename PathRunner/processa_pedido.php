<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = "localhost";
$user = "root";
$pass = "root";
$db   = "sistema_carrinho";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sala_codigo'])) {
    $sala_codigo = (int)$_POST['sala_codigo'];
    
    $salas_nomes = [
        0 => "PBX",
        1 => "Sala 07",
        2 => "Sala 08",
        3 => "Sala 09",
        4 => "Sala 10",
        5 => "Sala 11",
        6 => "1º Porta Auditório",
        7 => "2º Porta Auditório"
    ];
    
    if (array_key_exists($sala_codigo, $salas_nomes)) {
        $sala_nome = $salas_nomes[$sala_codigo];
        
        // Cancela pedidos anteriores para dar prioridade ao novo chamado ativo
        $conn->query("UPDATE pedidos SET status_atual = 'CANCELADO' WHERE status_atual = 'Processando informação'");
        
        // Insere o novo pedido
        $sql = "INSERT INTO pedidos (sala_codigo, sala_nome, status_atual, interferencia) VALUES ($sala_codigo, '$sala_nome', 'Processando informação', 'Nenhuma')";
        
        if ($conn->query($sql) === TRUE) {
            // Sucesso: Redireciona passando os parâmetros na URL
            header("Location: index.php?msg=sucesso&sala=" . urlencode($sala_nome) . "#solicitar");
            exit();
        } else {
            // Erro no banco de dados
            header("Location: index.php?msg=erro#solicitar");
            exit();
        }
    }
}

$conn->close();
?>