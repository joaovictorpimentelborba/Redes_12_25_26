let img_forca = document.querySelector("#_img_forca");
let cmc = document.querySelector("#_btn_comecar");
let btns = document.querySelectorAll("._btns_js");
let txt = document.querySelector("#txt_jogo");

let palavra = ["equusasinus", "anta", "aranha", "alce", "besouro", "bagre", "borboleta", "cao", "camelo", "canguru", "caranguejo", "cavalo", "chimpanze", "cobra", "coruja", "crocodilo", "elefante", "escorpiao", "tamandua", "falcao", "foca", "formiga", "gato", "girafa", "golfinho", "gorila", "hipopotamo", "jacare", "javali", "koala", "lagarto", "leao", "lobo", "lula", "mosquito", "ornitorrinco", "ouriço", "panda", "pato", "gamba", "pinguim", "polvo", "raposa", "rinoceronte", "sapo", "tartaruga", "tigre", "veado", "zebra", "aguia"];
//equusasinus= burro/jumento

let p_escolida = "";
let num = 0;
let erro = 0;

cmc.addEventListener("click", inserir);

function inserir() {
    img_forca.src="imgs/ima0.png"
    txt.innerHTML = ""; //innerHTML???
    erro = 0;
    num = Math.floor(Math.random() *50);
    p_escolida = palavra[num];

    for (let i = 0; i < p_escolida.length; i++) {
        //conteiner
        let l_Container = document.createElement("div");
        l_Container.style.display = "inline-block";
        l_Container.style.textAlign = "center";
        l_Container.style.margin = "0 10px";

        //letra 
        let l_div = document.createElement("div");
        l_div.textContent = "";
        l_div.style.fontSize = "2rem";
        l_div.classList.add("letra");
        l_div.dataset.pos = i;  // posição da letra na palavra

        // underscore
        let unds_div = document.createElement("div");
        unds_div.textContent = "__";
        unds_div.style.fontSize = "3rem";

        // letra dentro do conteiner
        l_Container.appendChild(l_div);
        l_Container.appendChild(unds_div);

        txt.appendChild(l_Container);
    }
    
    cmc.textContent = "Reiniciar?";
}

// evento para cada botão de letra
btns.forEach(btn => {

    btn.addEventListener("click", () => {
        let erro = 0;
        let btn_letra = btn.textContent.toLowerCase();

        for (let i = 0; i < p_escolida.length; i++) {

            if (p_escolida[i] === btn_letra) {

                // acha a div correspondente à posição
                let l_div = txt.querySelector(`.letra[data-pos='${i}']`);
                l_div.textContent = btn_letra.toUpperCase();

            }
            else if (p_escolida[i] != btn_letra) {
                erro++;
                img_forca.src = "imgs/ima" + erro + ".png";
            }
            
        }
    });
});

