<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSI Chat - Sala de Comunicação</title>
    <link rel="stylesheet" href="css/chat.css">
</head>

<body>

    <div class="chat-wrapper">
        <div class="sidebar">
            <div class="user-info">
                <h3>Olá, <span id="meu-username"><?php echo htmlspecialchars($_SESSION['username']); ?></span>!</h3>
                <a href="acoes.php?acao=sair" class="btn-sair">Sair</a>
            </div>
            <div class="online-counter">
                Utilizadores ligados: <strong id="total-online">0</strong>
            </div>
            <div class="users-list" id="lista-utilizadores">
            </div>
        </div>

        <div class="chat-area">
            <div class="chat-header" id="chat-header-titulo">
                Seleccione um utilizador na lista para iniciar a conversa privada.
            </div>

            <div class="messages-window" id="janela-mensagens">
                <div class="no-chat">Nenhuma conversa activa.</div>
            </div>

            <form class="write-box" id="form-envio" onsubmit="enviarMensagem(event)">
                <input type="hidden" id="destinatario-id-atual" value="">
                <input type="text" id="campo-mensagem" placeholder="Mensagem..." disabled required autocomplete="off">
                <button type="submit" id="btn-enviar" disabled>Enviar</button>
            </form>
        </div>
    </div>

    <script>
    let destinatarioIdAtual = null;
    let nomeDestinatarioAtual = "";

    function atualizarUtilizadores() {
        fetch('acoes.php?acao=listar_utilizadores')
            .then(function(res) {
                return res.json();
            })
            .then(function(data) {
                // Atualiza o total de pessoas online no sistema
                document.getElementById('total-online').innerText = data.total;

                const listaDiv = document.getElementById('lista-utilizadores');
                let novoHtml = '';
                let oMeuDestinatarioContinuaOnline = false;

                if (data.utilizadores.length === 0) {
                    listaDiv.innerHTML = '<p class="no-users">Ninguém online de momento.</p>';
                    if (destinatarioIdAtual !== null) {
                        fecharChatPorOffline();
                    }
                    return;
                }

                // Gerar o HTML para todos os utilizadores online
                data.utilizadores.forEach(function(user) {
                    let activeClass = '';
                    if (user.id == destinatarioIdAtual) {
                        activeClass = 'active';
                        oMeuDestinatarioContinuaOnline = true; // Confirma que ele ainda está cá
                    }

                    novoHtml += '<div class="user-item ' + activeClass +
                        '" onclick="selecionarUtilizador(' + user.id + ', \'' + user.username + '\')">' +
                        '<span class="status-dot"></span>' +
                        user.username +
                        '</div>';
                });

                listaDiv.innerHTML = novoHtml;

                // Se eu estava a falar com alguém e essa pessoa saiu do sistema, fecha a janela
                if (destinatarioIdAtual !== null && !oMeuDestinatarioContinuaOnline) {
                    fecharChatPorOffline();
                }
            })
            .catch(function(err) {
                console.error("Erro ao listar utilizadores:", err);
            });
    }

    function fecharChatPorOffline() {
        destinatarioIdAtual = null;
        nomeDestinatarioAtual = "";
        document.getElementById('destinatario-id-atual').value = '';
        document.getElementById('chat-header-titulo').innerHTML =
            'O utilizador desconectou-se. Seleccione outro utilizador.';
        document.getElementById('campo-mensagem').disabled = true;
        document.getElementById('btn-enviar').disabled = true;
        document.getElementById('janela-mensagens').innerHTML =
            '<div class="no-chat">Conversa encerrada porque o utilizador ficou offline.</div>';
    }

    function selecionarUtilizador(id, username) {
        // Evita recarregar se clicarmos no mesmo utilizador que já está ativo
        if (destinatarioIdAtual === id) return;

        destinatarioIdAtual = id;
        nomeDestinatarioAtual = username;
        document.getElementById('destinatario-id-atual').value = id;
        document.getElementById('chat-header-titulo').innerHTML = 'Conversa privada com: <strong>' + username +
            '</strong>';

        document.getElementById('campo-mensagem').disabled = false;
        document.getElementById('btn-enviar').disabled = false;
        document.getElementById('campo-mensagem').value = ''; // Limpa o texto anterior ao mudar de conversa
        document.getElementById('campo-mensagem').focus();

        // Limpa a janela imediatamente com um loading visual antes de carregar as mensagens do novo utilizador
        document.getElementById('janela-mensagens').innerHTML = '<div class="no-chat">A carregar mensagens...</div>';

        carregarMensagens();
        atualizarUtilizadores();
    }

    function carregarMensagens() {
        if (!destinatarioIdAtual) return;

        fetch('acoes.php?acao=carregar_mensagens&com_quem_id=' + destinatarioIdAtual)
            .then(function(res) {
                return res.json();
            })
            .then(function(mensagens) {
                // Segurança: Se o utilizador mudou de chat enquanto o fetch respondia, ignora esta resposta
                if (!destinatarioIdAtual) return;

                const janela = document.getElementById('janela-mensagens');

                if (mensagens.length === 0) {
                    janela.innerHTML = '<div class="no-chat">Início da conversa privada com ' +
                        nomeDestinatarioAtual + '.</div>';
                    return;
                }

                let html = '';
                const meuUsername = document.getElementById('meu-username').innerText;

                mensagens.forEach(function(msg) {
                    let classeMsg = (msg.remetente === meuUsername) ? 'sent' : 'received';

                    html += '<div class="message-block ' + classeMsg + '">' +
                        '<div class="msg-meta"><strong>' + msg.remetente + '</strong> &bull; ' + msg.hora +
                        '</div>' +
                        '<div class="msg-content">' + msg.mensagem + '</div>' +
                        '</div>';
                });

                // Auto-scroll inteligente
                const noFim = (janela.scrollHeight - janela.scrollTop <= janela.clientHeight + 150);
                janela.innerHTML = html;

                if (noFim) {
                    janela.scrollTop = janela.scrollHeight;
                }
            })
            .catch(function(err) {
                console.error("Erro ao carregar mensagens:", err);
            });
    }

    function enviarMensagem(e) {
        e.preventDefault();
        const input = document.getElementById('campo-mensagem');
        const msg = input.value.trim();
        if (!msg || !destinatarioIdAtual) return;

        const formData = new FormData();
        formData.append('destinatario_id', destinatarioIdAtual);
        formData.append('mensagem', msg);

        fetch('acoes.php?acao=enviar_mensagem', {
                method: 'POST',
                body: formData
            })
            .then(function(res) {
                return res.json();
            })
            .then(function(data) {
                if (data.status === 'sucesso') {
                    input.value = '';
                    carregarMensagens();
                }
            });
    }

    // Polling de 1 segundo para manter a reatividade alta
    setInterval(atualizarUtilizadores, 1000);
    setInterval(carregarMensagens, 1000);

    // Execução inicial
    atualizarUtilizadores();
    </script>

</body>

</html>