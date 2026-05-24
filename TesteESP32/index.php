<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Path Runner - Sistema Logístico Autônomo</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <div class="nav-container">
            <div class="logo">
                <div class="logo-placeholder"><img src="img/logo.png" width="100px"></div>
                Path Runner
            </div>
            <nav>
                <ul>
                    <li><a href="#sobre">Sobre</a></li>
                    <li><a href="#tecnologias">Tecnologias</a></li>
                    <li><a href="#solicitar" class="btn-nav">Solicitar</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="hero">
        <div class="hero-text">
            <h1>O Futuro da Logística Interna Artesanal</h1>
            <p>O Path Runner é um veículo autônomo desenvolvido para otimizar o transporte de materiais didáticos e
                objetos entre ambientes escolares. Equipado com sistemas inteligentes de desvio de obstáculos e
                navegação precisa por linhas guiadas, ele garante eficiência, segurança e inovação tecnológica dentro da
                LAN escolar.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.</p>
        </div>

        <div class="coluna-cards">
            <div class="status-card">
                <h3>📍 Monitor do Path Runner</h3>
                <div class="status-linha">
                    <span>Destino atual:</span>
                    <strong id="monitor-sala">Carregando...</strong>
                </div>
                <div class="status-linha">
                    <span>Estado:</span>
                    <strong id="monitor-status">Carregando...</strong>
                </div>
                <div class="status-linha">
                    <span>Interferência:</span>
                    <span id="monitor-interferencia" class="badge-limpo">Nenhuma</span>
                </div>
            </div>

            <div class="pedido-card" id="solicitar">
                <h2>Fazer Solicitação</h2>
                <p>Selecione o destino desejado e chame o Path Runner até a sua localização.</p>

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
    </main>

    <section class="features-section">
        <div class="features-container">
            <h2>Características do Dispositivo</h2>

            <div class="features-grid">
                <div class="feature-box">
                    <span class="feature-icon">🔋</span>
                    <h3>Autonomia Estendida</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mollis pretium lorem primis cubilia cut.
                        Dictumst nisl proin primis est ut facilisis congue sodales.</p>
                </div>

                <div class="feature-box">
                    <span class="feature-icon">🛑</span>
                    <h3>Evasão de Obstáculos</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mollis pretium lorem primis cubilia cut.
                        Dictumst nisl proin primis est ut facilisis congue sodales.</p>
                </div>

                <div class="feature-box">
                    <span class="feature-icon">📶</span>
                    <h3>Conexão Wi-Fi Local</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mollis pretium lorem primis cubilia cut.
                        Dictumst nisl proin primis est ut facilisis congue sodales.</p>
                </div>

                <div class="feature-box">
                    <span class="feature-icon">👌</span>
                    <h3>Fácil Utilização</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mollis pretium lorem primis cubilia cut.
                        Dictumst nisl proin primis est ut facilisis congue sodales.</p>
                </div>

                <div class="feature-box">
                    <span class="feature-icon">📊</span>
                    <h3>Dados em Tempo Real</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mollis pretium lorem primis cubilia cut.
                        Dictumst nisl proin primis est ut facilisis congue sodales.</p>
                </div>

                <div class="feature-box">
                    <span class="feature-icon">📦</span>
                    <h3>Capacidade de Carga</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mollis pretium lorem primis cubilia cut.
                        Dictumst nisl proin primis est ut facilisis congue sodales.</p>
                </div>
            </div>
        </div>
    </section>

    <script src="script.js"></script>
</body>

</html>