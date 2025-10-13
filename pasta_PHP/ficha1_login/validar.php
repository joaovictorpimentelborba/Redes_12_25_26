<?php 
$user_html=htmlspecialchars($_REQUEST["nome"]);
$pass_html=htmlspecialchars($_REQUEST["pass"]);

$S_users=array("Ana","Pedro","Rui","Carlos");
$ADM_users=array("Ricardo","José","Leonardo","Martin");
$N_users=array("João","Ivan","Francisco Canivete","Guilherme");

$S_pass=array("S_ana","S_pedro","S_rui","S_carlos");
$ADM_pass=array("ADM_ricardo","ADM_jose","ADM_leonardo","ADM_martin");
$N_pass=array("N_joao","N_ivan","N_franciscocanivete","N_guilherme");

for($i=0; $i>3; $i++){
    if($S_users[$i]==$user_html){
        if($S_pass[$i]==$pass_html){
            echo"Bem vindo "+$S_users[$i];
        }
    }
    else if($ADM_users[$i]==$user_html){
        if($ADM_pass[$i]==$pass_html){
            echo"Bem vindo "+$S_users[$i];
        }
    }
    else if($N_users[$i]==$user_html){
        if($N_pass[$i]==$pass_html){
            echo"Bem vindo "+$S_users[$i];
        }
    }
    else{
        echo"Saia daqui seu negro";
    }
    
}

?>