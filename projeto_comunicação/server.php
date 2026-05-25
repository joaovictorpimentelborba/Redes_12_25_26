<?php
require_once 'conexao.php';

// Procurar todos os utilizadores online para o painel do administrador
$stmtUsers = $pdo->query("SELECT username, ultima_atividade FROM utilizadores WHERE status = 'online' ORDER BY username ASC");
$utilizadores_online = $stmtUsers->fetchAll(PDO::FETCH_ASSOC);
$total_online = count($utilizadores_online);

// Procurar o registo global de mensagens (Log do Servidor)
$stmtMsg = $pdo->query("
    SELECT m.mensagem, m.data_envio, r.username as remetente, d.username as destinatario 
    FROM mensagens m
    JOIN utilizadores r ON m.remetente_id = r.id
    JOIN utilizadores d ON m.destinatario_id = d.id
    ORDER BY m.data_envio DESC 
    LIMIT 50
");
$LOG_mensagens = $stmtMsg->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Servidor - Comunicações PHP</title>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #1a202c;
        color: #e2e8f0;
        margin: 0;
        padding: 20px;
    }

    .server-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 2px solid #2d3748;
        padding-bottom: 20px;
        margin-bottom: 20px;
    }

    h1 {
        margin: 0;
        color: #63b3ed;
    }

    .status-badge {
        padding: 8px 15px;
        border-radius: 20px;
        font-weight: bold;
        font-size: 14px;
        background: #38a169;
        color: white;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .grid {
        display: grid;
        grid-template-columns: 1fr 2fr;
        gap: 20px;
    }

    .card {
        background: #2d3748;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    h2 {
        margin-top: 0;
        color: #cbd5e0;
        border-bottom: 1px solid #4a5568;
        padding-bottom: 10px;
        font-size: 18px;
    }

    .user-row {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #4a5568;
    }

    .user-row:last-child {
        border: none;
    }

    .log-box {
        background: #1a202c;
        border: 1px solid #4a5568;
        padding: 15px;
        border-radius: 6px;
        height: 400px;
        overflow-y: auto;
        font-family: 'Courier New', Courier, monospace;
        font-size: 14px;
    }

    .log-line {
        margin-bottom: 8px;
        line-height: 1.4;
        border-bottom: 1px dashed #2d3748;
        padding-bottom: 4px;
    }

    .log-time {
        color: #a0aec0;
    }

    .log-users {
        color: #f6ad55;
        font-weight: bold;
    }

    .log-text {
        color: #edf2f7;
    }

    .refresh-notice {
        font-size: 12px;
        color: #718096;
        text-align: right;
        margin-top: 10px;
    }
    </style>
    <meta http-equiv="refresh" content="2">
</head>

<body>

    <div class="server-container">
        <header>
            <div>
                <h1>Consola de Monitorização do Servidor</h1>
                <div style="color: #a0aec0; margin-top: 5px;">Módulo: Comunicações em PHP (PSI)</div>
            </div>
            <div class="status-badge">
                <span
                    style="width: 10px; height: 10px; background: #fff; border-radius: 50%; display: inline-block; animation: pulse 1.5s infinite;"></span>
                SERVIDOR ATIVO (Porta Local)
            </div>
        </header>

        <div class="grid">
            <div class="card">
                <h2>Clientes Ligados (<span id="count"><?php echo $total_online; ?></span>)</h2>
                <div id="users-list">
                    <?php if (empty($utilizadores_online)): ?>
                    <p style="color: #a0aec0; font-style: italic;">Nenhum cliente conectado de momento.</p>
                    <?php else: ?>
                    <?php foreach ($utilizadores_online as $u): ?>
                    <div class="user-row">
                        <span style="color: #68d391;">● <?php echo htmlspecialchars($u['username']); ?></span>
                        <span style="font-size: 12px; color: #a0aec0;">Ativo em:
                            <?php echo date('H:i:s', strtotime($u['ultima_atividade'])); ?></span>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card">
                <h2>Registo de Mensagens em Tempo Real (Tráfego)</h2>
                <div class="log-box">
                    <?php if (empty($LOG_mensagens)): ?>
                    <div style="color: #718096; font-style: italic;">A aguardar tráfego de dados na rede local...</div>
                    <?php else: ?>
                    <?php foreach ($LOG_mensagens as $log): ?>
                    <div class="log-line">
                        <span class="log-time">[<?php echo date('H:i:s', strtotime($log['data_envio'])); ?>]</span>
                        <span class="log-users"> PRIVADO (<?php echo htmlspecialchars($log['remetente']); ?> ➔
                            <?php echo htmlspecialchars($log['destinatario']); ?>):</span>
                        <span class="log-text">"<?php echo htmlspecialchars($log['mensagem']); ?>"</span>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="refresh-notice">Atualização automática a cada 2 segundos.</div>
            </div>
        </div>
    </div>

</body>

</html>