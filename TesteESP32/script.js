document.addEventListener("DOMContentLoaded", function() {
    console.log("Interface do Path Runner carregada com sucesso!");

    // --- CÓDIGO DO HEADER DINÂMICO ---
    const header = document.querySelector("header");
    let ultimoScroll = 0;

    window.addEventListener("scroll", function() {
        const scrollAtual = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollAtual > ultimoScroll && scrollAtual > 80) {
            header.classList.add("header-escondido");
        } else {
            header.classList.remove("header-escondido");
        }
        ultimoScroll = scrollAtual <= 0 ? 0 : scrollAtual; 
    });

    // --- NOVO: MONITORAMENTO EM TEMPO REAL (AJAX / FETCH) ---
    const txtSala = document.getElementById("monitor-sala");
    const txtStatus = document.getElementById("monitor-status");
    const badgeInterferencia = document.getElementById("monitor-interferencia");
    const cardStatus = document.querySelector(".status-card");

    function atualizarPainelStatus() {
        // Faz a busca no arquivo backend que extrai dados do banco
        fetch("obter_status.php")
            .then(response => response.json())
            .then(dados => {
                if(!dados.erro) {
                    // Atualiza os textos na tela
                    txtSala.textContent = dados.sala;
                    txtStatus.textContent = dados.status;
                    
                    // Trata visualmente as interferências enviadas pelo robô
                    if (dados.interferencia === "Obstaculo a Frente") {
                        badgeInterferencia.textContent = "🛑 Obstáculo à Frente";
                        badgeInterferencia.className = "badge-perigo";
                        cardStatus.style.borderColor = "#dc3545"; // Borda vermelha no painel
                    } 
                    else if (dados.interferencia === "Reencontrando linha") {
                        badgeInterferencia.textContent = "⚠️ Fora de Linha";
                        badgeInterferencia.className = "badge-alerta";
                        cardStatus.style.borderColor = "#ffc107"; // Borda amarela
                    } 
                    else {
                        badgeInterferencia.textContent = "✅ Nenhuma";
                        badgeInterferencia.className = "badge-limpo";
                        cardStatus.style.borderColor = "#28a745"; // Borda verde (Tudo normal)
                    }
                }
            })
            .catch(err => console.error("Erro ao buscar dados do carrinho:", err));
    }

    // Executa a função imediatamente ao abrir a página
    atualizarPainelStatus();

    // Fica a executar a função automaticamente a cada 2000 milissegundos (2 segundos)
    setInterval(atualizarPainelStatus, 2000);
});