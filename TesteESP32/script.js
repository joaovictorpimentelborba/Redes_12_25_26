// // Arquivo JavaScript para o comportamento dinâmico do Path Runner
// document.addEventListener("DOMContentLoaded", function() {
//     console.log("Interface do Path Runner carregada com sucesso!");
    
//     // Futuras funções para monitoramento em tempo real entrarão aqui...
// });
document.addEventListener("DOMContentLoaded", function() {
    console.log("Interface do Path Runner carregada com sucesso!");

    // --- CÓDIGO DO HEADER DINÂMICO ---
    const header = document.querySelector("header");
    let ultimoScroll = 0;

    window.addEventListener("scroll", function() {
        const scrollAtual = window.pageYOffset || document.documentElement.scrollTop;

        // Se o usuário rolou para baixo E passou da altura do próprio header (ex: 80px)
        if (scrollAtual > ultimoScroll && scrollAtual > 80) {
            header.classList.add("header-escondido"); // Esconde o menu
        } else {
            header.classList.remove("header-escondido"); // Mostra o menu (subindo ou no topo)
        }

        // Atualiza a posição para a próxima comparação
        ultimoScroll = scrollAtual <= 0 ? 0 : scrollAtual; 
    });
});

//a