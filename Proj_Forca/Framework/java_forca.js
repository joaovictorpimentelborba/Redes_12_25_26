let img_forca = document.querySelector("#_img_forca");
let btn = document.querySelector("#_btn");

var palavra = ["equusasinus", "anta", "aranha", "baleiaazul", "besouro", "bagre", "borboleta", "cão", "camelo", "canguru", "caranguejo", "cavalo", "chimpanzé", "cobra", "coruja", "crocodilo", "elefante", "escorpião", "estreladomar", "falcão", "foca", "formiga", "gato", "girafa", "golfinho", "gorila", "hipopótamo", "jacaré", "javali", "koala", "lagarto", "leão", "lobo", "lula", "mosquito", "ornitorrinco", "ouriço", "panda", "pato", "peixebolha", "pinguim", "polvo", "raposa", "rinoceronte", "sapo", "tartaruga", "tigre", "ursopolar", "veado", "zebra", "águia"];

//Equus asinus jumento ou burro [0]


btn.addEventListener("click", troca_img);

   
function troca_img() {
    img_forca.src = "imgs/forca_branco_sem_nada.png";
    
}