<?php 
$user_html=htmlspecialchars($_REQUEST["user"]);
$pass_html=htmlspecialchars($_REQUEST["pass"]);

$S_users=array("Ana","Pedro","Rui","Carlos");
$ADM_users=array("Ricardo","José","Leonardo","Martin");
$N_users=array("João","Ivan","Francisco Canivete","Guilherme");

$S_pass=array("S_ana","S_pedro","S_rui","S_carlos");
$ADM_pass=array("ADM_ricardo","ADM_jose","ADM_leonardo","ADM_martin");
$N_pass=array("N_joao","N_ivan","N_franciscocanivete","N_guilherme");

$entrou=false;

for($i=0; $i<4; $i++){
    
    if($S_users[$i]==$user_html && $S_pass[$i]==$pass_html){
        
        echo"Bem vindo " . $S_users[$i];
        $entrou=true;
    }
    else if($ADM_users[$i]==$user_html && $ADM_pass[$i]==$pass_html){
        
        echo"Bem vindo " . $ADM_users[$i];
        $entrou=true;
    }
    else if($N_users[$i]==$user_html && $N_pass[$i]==$pass_html){
        
        echo"Bem vindo " . $N_users[$i];
        $entrou=true;
        
    }   
}
if($entrou==false){
    echo"!ERRO AO ENTRAR!";
}

?>