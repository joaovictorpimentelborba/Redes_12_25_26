// java_forca.js (substituir todo o conteúdo por este)
let img_forca = document.querySelector("#_img_forca");
let cmc = document.querySelector("#_btn_comecar");
let btns = document.querySelectorAll("._btns_js");
let txt = document.querySelector("#txt_jogo");

let palavra = ["equusasinus", "anta", "aranha", "alce", "besouro", "bagre", "borboleta", "cao", "camelo", "canguru", "caranguejo", "cavalo", "chimpanze", "cobra", "coruja", "crocodilo", "elefante", "escorpiao", "tamandua", "falcão", "foca", "formiga", "gato", "girafa", "golfinho", "gorila", "hipopotamo", "jacare", "javali", "koala", "lagarto", "leao", "lobo", "lula", "mosquito", "ornitorrinco", "ouriço", "panda", "pato", "peixebolha", "pinguim", "polvo", "raposa", "rinoceronte", "sapo", "tartaruga", "tigre", "veado", "zebra", "aguia"];

let p_escolida = "";
let erro = 0;
let num = 0;
  
cmc.addEventListener("click", inserir);

function inserir() {

    img_forca.src = "imgs/ima0.png";
    txt.innerHTML = "";
    erro = 0;

    num = Math.floor(Math.random() * palavra.length);
    p_escolida = palavra[num];

    for (let i = 0; i < p_escolida.length; i++)
    {
        let P_conteiner = document.createElement("div");
        P_conteiner.classList.add("letra-container");
        P_conteiner.style.display = "inline-block";
        P_conteiner.style.margin = "0 8px";

        let l_div = document.createElement("div");
        l_div.textContent = "";
        l_div.classList.add("letra");
        l_div.dataset.pos = i;

        let unds_div = document.createElement("div");
        unds_div.textContent = "__";
        unds_div.classList.add("underscore");

        P_conteiner.appendChild(l_div);
        P_conteiner.appendChild(unds_div);
        txt.appendChild(P_conteiner);
    }

    //volta a ativar os btns
    for (let i = 0; i < btns.length; i++)
    {
        btns[i].disabled = false;
    }

    cmc.textContent = "Reiniciar?";
}


// uso de IIFE para "capturar" o índice com let
for (let i = 0; i < btns.length; i++) {

    (function (index) {

        btns[index].addEventListener("click", function () {

            let acerto = false;
            let btn_letra = btns[index].textContent.toLowerCase();

            // revela todas as ocorrências da letra na palavra
            for (let j = 0; j < p_escolida.length; j++) {
                if (p_escolida[j] == btn_letra) {
                    let l_div = txt.querySelector(".letra[data-pos='" + j + "']");
                    l_div.textContent = btn_letra.toUpperCase();            
                    acerto = true;    
                }
            }

            if (acerto == false) {
                erro++;
                img_forca.src = "imgs/ima" + erro + ".png";              
            }    

            btns[index].disabled = true;    //desativar btn

            // conta quantas letras faltam
            let letras = txt.querySelectorAll(".letra");
            let vitoria = 0;

            for (let j = 0; j < letras.length; j++)
            {
                if (letras[j].textContent.trim() == "")
                {
                    vitoria++;      //conquetnação se encontarar um espaço vazio
                }
            }

            //se ganhar
            if (vitoria == 0)
            {
                alert("Você ganhou");
                for (let i = 0; i < btns.length; i++)
                {
                    btns[i].disabled = true;
                }
            }

            //se ganhar
            if (erro == 6)
            {
                img_forca.src = "imgs/ima" + 6 + ".png";
                alert("Voce Perdeu a palavra era: " + p_escolida.toUpperCase());
                
                for (let i = 0; i < btns.length; i++)
                {
                    btns[i].disabled = true;
                }
            }
        });
    })(i);
}
