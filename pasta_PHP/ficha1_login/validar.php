<?php 
$user_html=htmlspecialchars($_REQUEST["user"]);
$pass_html=htmlspecialchars($_REQUEST["pass"]);

$user_txt=file("users.txt");
$pass_txt=file("pass.txt");

$entrou=false;

for($i=0; $i < count($user_txt); $i++){
    
    $user = trim($user_txt[$i]);
    $pass = trim($pass_txt[$i]);

    if($user_html==$user && $pass==$pass_html){
        
        echo"Bem vindo " . $user;
        $entrou=true;
        break;
    }
}
if($entrou==false){
    echo"!ERRO AO ENTRAR!";
}

?>