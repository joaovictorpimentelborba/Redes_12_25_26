<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Path Runner - Painel de Pedidos</title>
    <link rel="stylesheet" href="css/style_pedidos.css">
</head>

<body>

    <?php include 'header.php'; ?>

    <main class="panel-section">
        <div class="panel-container">

            <div class="panel-header">
                <h2>Painel de Controlo e Solicitações</h2>
                <p>Acompanhe o estado do Path Runner em tempo real e efetue novas ordens de transporte.</p>
            </div>

            <div class="coluna-cards">
                <div class="status-card">
                    <h3>📍 Estado do Veículo</h3>
                    <div class="status-linha">
                        <span>Destino atual:</span>
                        <strong id="monitor-sala">Carregando...</strong>
                    </div>
                    <div class="status-linha">
                        <span>Estado atual:</span>
                        <strong id="monitor-status">Carregando...</strong>
                    </div>
                    <div class="status-linha">
                        <span>Interferência:</span>
                        <span id="monitor-interferencia" class="badge-limpo">Nenhuma</span>
                    </div>
                </div>

                <div class="pedido-card" id="solicitar">
                    <h3>Fazer Solicitação</h3>
                    <p>Selecione a sala de destino para onde o Path Runner deve dirigir-se.</p>

                    <?php 
                    if (isset($_GET['msg'])) {
                        if ($_GET['msg'] == 'sucesso' && isset($_GET['sala'])) {
                            echo "<div class='sucesso'>🚀 <strong>Pedido efetuado!</strong> Destino: " . htmlspecialchars($_GET['sala']) . ".</div>";
                        } else if ($_GET['msg'] == 'erro') {
                            echo "<div class='erro'>❌ Erro ao salvar pedido no banco de dados.</div>";
                        }
                    }
                    ?>

                    <form method="POST" action="processa_pedido.php">
                        <label for="sala_codigo">Código da Sala Destino:</label>
                        <select name="sala_codigo" id="sala_codigo" required>
                            <option value="" disabled selected>Escolha uma sala...</option>
                            <option value="0">PBX (0)</option>
                            <option value="1">Sala 07 (1)</option>
                            <option value="2">Sala 08 (2)</option>
                            <option value="3">Sala 09 (3)</option>
                            <option value="4">Sala 10 (4)</option>
                            <option value="5">Sala 11 (5)</option>
                            <option value="6">1º Porta Auditório (6)</option>
                            <option value="7">2º Porta Auditório (7)</option>
                        </select>
                        <button type="submit" class="btn-submit">Chamar Path Runner</button>
                    </form>
                </div>
            </div>

        </div>
    </main>

    <?php include 'footer.php'; ?>

    <script src="script.js"></script>
</body>

</html>