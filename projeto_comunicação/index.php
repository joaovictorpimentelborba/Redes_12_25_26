<?php
session_start();
require_once 'conexao.php';

$erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);

    if (empty($username)) {
        $erro = "O username não pode estar vazio."; // Requisito do enunciado
    } else {
        // Verificar se o utilizador já existe na BD
        $stmt = $pdo->prepare("SELECT * FROM utilizadores WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Se já existe, verificar se está online
            if ($user['status'] === 'online') {
                $erro = "Este username já está em utilização."; // Requisito do enunciado
            } else {
                // Se estava offline, passa a online e atualiza a atividade
                $stmt = $pdo->prepare("UPDATE utilizadores SET status = 'online', ultima_atividade = NOW() WHERE id = :id");
                $stmt->execute(['id' => $user['id']]);
                
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header("Location: chat.php");
                exit;
            }
        } else {
            // Se não existe, cria um novo utilizador como online
            $stmt = $pdo->prepare("INSERT INTO utilizadores (username, status, ultima_atividade) VALUES (:username, 'online', NOW())");
            $stmt->execute(['username' => $username]);
            
            $_SESSION['user_id'] = $pdo->lastInsertId();
            $_SESSION['username'] = $username;
            header("Location: chat.php");
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSI Chat - Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <div class="login-container">
        <div class="login-card">
            <h2>Comunicações PHP</h2>
            <p>Insira o seu username para entrar no chat interno.</p>

            <?php if (!empty($erro)): ?>
            <div class="erro-box"><?php echo htmlspecialchars($erro); ?></div>
            <?php endif; ?>

            <form action="index.php" method="POST">
                <div class="input-group">
                    <input type="text" name="username" placeholder="Ex: joao_psi" required autocomplete="off">
                </div>
                <button type="submit" class="btn-entrar">Entrar no Sistema</button>
            </form>
        </div>
    </div>

</body>

</html>