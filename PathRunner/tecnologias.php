<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Path Runner - Tecnologias</title>
    <link rel="stylesheet" href="css/style_tecnologias.css">
</head>

<body>

    <?php include 'header.php'; ?>

    <section class="tech-section">
        <div class="tech-container">
            <h2>Tecnologia</h2>
            <p class="tech-subtitle">Descubra a infraestrutura de hardware e software que dá vida ao Path Runner.</p>

            <div class="tech-grid">
                <div class="tech-card">
                    <div class="tech-header">
                        <span class="tech-icon-box">🛑</span>
                        <h3>Deteção de Obstáculos</h3>
                    </div>
                    <p>A segurança operacional e a autonomia do Path Runner são coordenadas por um sistema ativo de
                        leitura ultrassónica que previne colisões frontais nos corredores.</p>
                    <ul class="tech-list">
                        <li><strong>Sensor Ultrassom:</strong> Emite ondas sonoras de alta frequência para calcular com
                            precisão milimétrica a distância até qualquer objeto.</li>
                        <li><strong>Lógica de Salvaguarda:</strong> Programado via código para interromper a alimentação
                            dos motores e imobilizar o carrinho a menos de 20cm de um obstáculo.</li>
                    </ul>
                </div>

                <div class="tech-card">
                    <div class="tech-header">
                        <span class="tech-icon-box">🛣️</span>
                        <h3>Rastreio de Linha</h3>
                    </div>
                    <p>O sistema de orientação do percurso assenta na leitura ótica do solo, garantindo que o veículo
                        permaneça na rota correta de transporte.</p>
                    <ul class="tech-list">
                        <li><strong>Sensor de Rastreio:</strong> Identifica diferentes tonalidades e envia dados ao
                            processador sobre a posição exata do carrinho na pista.</li>
                        <li><strong>Identificação de Salas:</strong> Utiliza a leitura de padrões específicos baseados
                            em combinações de valores pretos para reconhecer os destinos.</li>
                    </ul>
                </div>

                <div class="tech-card">
                    <div class="tech-header">
                        <span class="tech-icon-box">🤖</span>
                        <h3>Hardware & Processamento</h3>
                    </div>
                    <p>A inteligência e o controlo físico do dispositivo são baseados na cooperação estratégica entre
                        dois microcontroladores e módulos de potência.</p>
                    <ul class="tech-list">
                        <li><strong>Arduino Uno:</strong> Atua como a unidade central de processamento, executando a
                            lógica geral e coordenando os componentes.</li>
                        <li><strong>Shield de Motores:</strong> Controla a velocidade e sentido de rotação dos motores
                            12V, servo 180° e faz a interface com o display LCD.</li>
                    </ul>
                </div>

                <div class="tech-card">
                    <div class="tech-header">
                        <span class="tech-icon-box">📶</span>
                        <h3>Conexão Wi-Fi Local</h3>
                    </div>
                    <p>A ponte entre os comandos digitais do operador e a resposta física do veículo é efetuada por um
                        módulo de comunicação sem fios integrado.</p>
                    <ul class="tech-list">
                        <li><strong>ESP32 NodeMCU:</strong> Microcontrolador encarregue pela comunicação intermédia.
                            Recebe os pedidos via Wi-Fi oriundos do site e retransmite-os ao Arduino Uno.</li>
                        <li><strong>Comunicação de Dados:</strong> Conexão estabelecida localmente via MAMP, garantindo
                            que as ordens transitem de forma rápida e segura.</li>
                    </ul>
                </div>

                <div class="tech-card">
                    <div class="tech-header">
                        <span class="tech-icon-box">💻</span>
                        <h3>Firmware & Integração</h3>
                    </div>
                    <p>O desenvolvimento do software interno baseou-se em testes rigorosos de funcionamento simultâneo
                        através do ecossistema Arduino IDE.</p>
                    <ul class="tech-list">
                        <li><strong>Linguagem C++:</strong> Implementação de algoritmos de controlo. A adaptação foi
                            facilitada pelo domínio prévio na linguagem C#.</li>
                        <li><strong>Comunicação Serial:</strong> Integração física via conexões elétricas e
                            SoftwareSerial para a troca estável de dados entre o ESP32 e o Arduino.</li>
                    </ul>
                </div>

                <div class="tech-card">
                    <div class="tech-header">
                        <span class="tech-icon-box">🔋</span>
                        <h3>Autonomia Estendida</h3>
                    </div>
                    <p>A alimentação elétrica foi dimensionada para fornecer a corrente e a tensão necessárias para a
                        locomoção estável no Bloco A4.</p>
                    <ul class="tech-list">
                        <li><strong>Baterias 3.7V:</strong> Configuração modular utilizando entre duas a quatro
                            baterias, totalizando uma tensão de 7.4V ou 14.8V.</li>
                        <li><strong>Proteção do Circuito:</strong> Inclusão de resistores elétricos para limitar a
                            corrente e salvaguardar componentes sensíveis como os LEDs e o ESP32.</li>
                    </ul>
                </div>

                <div class="tech-card">
                    <div class="tech-header">
                        <span class="tech-icon-box">📊</span>
                        <h3>Dados em Tempo Real</h3>
                    </div>
                    <p>O ecossistema mantém o operador constantemente informado através da recolha e envio imediato de
                        telemetria operativa para a base de dados.</p>
                    <ul class="tech-list">
                        <li><strong>Mapeamento de Ocorrências:</strong> O ESP32 monitoriza o trajeto e faz o upload
                            instantâneo de alterações de status e colisões iminentes.</li>
                        <li><strong>Atualização Assíncrona:</strong> Os dados guardados no MySQL são injetados na
                            interface web para visualização transparente do utilizador.</li>
                    </ul>
                </div>

                <div class="tech-card">
                    <div class="tech-header">
                        <span class="tech-icon-box">📦</span>
                        <h3>Capacidade de Carga</h3>
                    </div>
                    <p>O chassi e a distribuição mecânica do carrinho foram projetados para responder com eficácia às
                        necessidades logísticas de transporte interno.</p>
                    <ul class="tech-list">
                        <li><strong>Motores Corrente Contínua:</strong> Utilização de motores potentes de 12V, capazes
                            de fornecer o torque ideal para deslocar cargas pequenas e médias.</li>
                        <li><strong>Estabilidade Dinâmica:</strong> Uso do servo motor de 180° para controlo angular
                            milimétrico das rodas dianteiras, evitando perdas de equilíbrio.</li>
                    </ul>
                </div>

                <div class="tech-card">
                    <div class="tech-header">
                        <span class="tech-icon-box">📺</span>
                        <h3>Interface Física (HMI)</h3>
                    </div>
                    <p>Além do painel web, o robô dispõe de um canal de comunicação visual direta instalado no próprio
                        chassi do dispositivo físico.</p>
                    <ul class="tech-list">
                        <li><strong>Display LCD:</strong> Módulo eletrónico responsável por imprimir mensagens de texto
                            rápidas diretamente no ecrã do veículo.</li>
                        <li><strong>Indicação de Status:</strong> Alerta visualmente os utilizadores no local se o
                            carrinho está disponível, a avançar para uma paragem ou a retornar ao PBX.</li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="script.js"></script>

</body>

</html>