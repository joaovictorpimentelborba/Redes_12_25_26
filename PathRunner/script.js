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


//Fade in combobox
document.addEventListener("DOMContentLoaded", function () {
    // ==========================================
    // CONFIGURAÇÃO CONFIGURÁVEL: Limite máximo de combo boxes
    // ==========================================
    const MAX_COMBOS = 3; 
    
    const container = document.getElementById("container-comboboxes");

    // 1. Escuta as mudanças de seleção (Change)
    container.addEventListener("change", function (event) {
        if (event.target.tagName === "SELECT") {
            const selectAtual = event.target;
            const divCampoAtual = selectAtual.closest(".campo-combobox");
            
            const todosOsCampos = Array.from(container.getElementsByClassName("campo-combobox"));
            const indiceAtual = todosOsCampos.indexOf(divCampoAtual);
            const proximoIndice = indiceAtual + 1;

            if (selectAtual.value !== "" && proximoIndice < MAX_COMBOS) {
                let proximoCampo = todosOsCampos[proximoIndice];
                
                if (!proximoCampo) {
                    proximoCampo = criarNovaComboBox(proximoIndice + 1, selectAtual.innerHTML);
                    container.appendChild(proximoCampo);
                    
                    setTimeout(() => {
                        proximoCampo.classList.add("ativa");
                    }, 50);
                }
            }
            
            // Se o utilizador resetar a combo box atual para a opção vazia
            if (selectAtual.value === "") {
                limparCamposSeguintes(indiceAtual);
            }
        }
    });

    // 2. Escuta os cliques no botão "X" de remover
    container.addEventListener("click", function (event) {
        if (event.target.classList.contains("btn-remover-combo")) {
            const botaoClicado = event.target;
            const divCampoParaRemover = botaoClicado.closest(".campo-combobox");
            
            const todosOsCampos = Array.from(container.getElementsByClassName("campo-combobox"));
            const indiceAlvo = todosOsCampos.indexOf(divCampoParaRemover);
            
            // Remove a caixa clicada e todas as que estiverem abaixo dela na fila
            limparCamposSeguintes(indiceAlvo - 1);
        }
    });

    // Função que gera o HTML da nova combo box com o botão de fechar integrado
    function criarNovaComboBox(numeroDestino, opçõesHTML) {
        const div = document.createElement("div");
        div.className = "campo-combobox"; 
        
        div.innerHTML = `
            <div class="titulo-combobox-wrapper">
                <label for="sala_destino_${numeroDestino}">${numeroDestino}º Destino (Opcional):</label>
                <button type="button" class="btn-remover-combo" title="Remover este destino">✕ Remover</button>
            </div>
            <select name="salas_destino[]" id="sala_destino_${numeroDestino}">
                ${opçõesHTML} 
            </select>
        `;
        
        const novoSelect = div.querySelector("select");
        novoSelect.value = "";
        novoSelect.required = false; 
        novoSelect.options[0].textContent = "Escolha o próximo destino...";
        
        return div;
    }

    // Função que remove da tela os elementos seguintes
    function limparCamposSeguintes(indiceReferencia) {
        const todosOsCampos = Array.from(container.getElementsByClassName("campo-combobox"));
        for (let i = todosOsCampos.length - 1; i > indiceReferencia; i--) {
            // Nunca removemos a primeira combo box (índice 0)
            if (i > 0) {
                todosOsCampos[i].remove();
            }
        }
    }
});