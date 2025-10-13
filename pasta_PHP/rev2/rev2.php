<?php 
#busca o name do input, não pode haver name igual a outro e nem id vazio
#htmlspecialchars() bloqueia codigos maliciosos virus; 
#buscar variaveis
$nome_al=htmlspecialchars($_REQUEST["nome"]); 
$morada_al=$_REQUEST["morada"];
$tel_al=$_REQUEST["telefone"];
$data_nasc=$_REQUEST["data_nasc"];
$genero=$_REQUEST["genero"];
$escola=$_REQUEST["escola"];
$email=$_REQUEST["email"];



echo "<H1>Ficha do Aluno</H1>";
echo "<br>";
echo $nome_al;
echo "<br>";
echo $morada_al;
echo "<br>";
echo $tel_al;
echo "<br>";
echo $data_nasc;
echo "<br>";
echo $genero;
echo "<br>";
echo $escola;
echo "<br>";

echo "Switch";
echo "<br>";
echo "<br>";

switch($genero){
    case "M":
        echo "Genero Masculino";
        break;
    case "F":
        echo "Genero Feminino";
        break;
    default:
        echo "Gay?";
        break;
}
echo "<br>";
switch($escola){
    case "GP":
    echo "ES Gabrieal Pereira";
    break;
    case "EBAR":
    echo "EB Andre de resende";
    break;
    default:
    echo "Gay?";
    break;
}
if(filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo $email;
}
else {
    echo "email invalido "+$email;
}

?>