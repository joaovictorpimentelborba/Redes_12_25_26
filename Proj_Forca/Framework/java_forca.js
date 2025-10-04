let img_forca = document.querySelector("#_img_forca");
let btn_troca = document.querySelector("#_btn_pagina")
let cmc = document.querySelector("#_btn_comecar")
let btns = document.querySelectorAll("._btns_js");
let txt = document.querySelector("#txt_jogo");

let num = Math.floor(Math.random() * 50);
let palavra = ["equusasinus", "anta", "aranha", "alce", "besouro", "bagre", "borboleta", "cão", "camelo", "canguru", "caranguejo", "cavalo", "chimpanzé", "cobra", "coruja", "crocodilo", "elefante", "escorpião", "tamanduá", "falcão", "foca", "formiga", "gato", "girafa", "golfinho", "gorila", "hipopótamo", "jacaré", "javali", "koala", "lagarto", "leão", "lobo", "lula", "mosquito", "ornitorrinco", "ouriço", "panda", "pato", "peixebolha", "pinguim", "polvo", "raposa", "rinoceronte", "sapo", "tartaruga", "tigre", "veado", "zebra", "águia"];
 
//Equus asinus jumento ou burro [0]
//btn_troca



cmc.addEventListener("click",inserir);
// btns[1].addEventListener("click",);
// btns[2].addEventListener("click",);
// btns[3].addEventListener("click",);
// btns[4].addEventListener("click",);
// btns[5].addEventListener("click",);
// btns[6].addEventListener("click",);
// btns[7].addEventListener("click",);
// btns[8].addEventListener("click",);
// btns[9].addEventListener("click",);
// btns[10].addEventListener("click",);
// btns[11].addEventListener("click",);
// btns[12].addEventListener("click",);
// btns[13].addEventListener("click",);
// btns[14].addEventListener("click",);
// btns[15].addEventListener("click",);
// btns[16].addEventListener("click",);
// btns[17].addEventListener("click",);
// btns[18].addEventListener("click",);
// btns[19].addEventListener("click",);
// btns[20].addEventListener("click",);
// btns[21].addEventListener("click",);
// btns[22].addEventListener("click",);
// btns[23].addEventListener("click",);
// btns[24].addEventListener("click",);
// btns[25].addEventListener("click",);
// btns[26].addEventListener("click",);


   
function inserir() {
    let undl = "";
    for (let i = 0; i < palavra[num].length; i++){
         undl += "_ ";
    }
    txt.textContent = undl;
    cmc.textContent="Reiniciar?"
}