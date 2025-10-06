<?php 

#echo"isso é uma string";
echo"<h1>Isto é um titulo</h1>";
$variavel1="PATO";
echo $variavel1;                    #criar variavel
echo"<br>";

#$variavel1=44.2412313;
echo $variavel1;                    #escrever variavel
echo"<br>";

const CONSTANTE1="isto é uma constante";

echo __FILE__; #constante magica
echo"<br>";

$var2=3.14;
$var3=(float)$variavel1;        #trasformar em float
var_dump($var2);
echo"<br>";

echo $variavel1.$var2;          #conquetnação
echo"<br>";
echo "5"+"8";
echo"<br>";
echo $variavel1[2];             #string é considerado um array
echo"<br>";echo"<br>";

if($variavel1=="PATO"){
    echo"bom dia mestre";
}
echo"<br>";
echo"<br>";
$var2=2;
if($var2<=1)
    echo"fraco";
    elseif($var2<=2)
        echo"insuficiente";
    elseif($var2<=3)
        echo"suficiente";
    else
        echo"bom";
echo"<br>";
switch ($var2) {
    case 1:
        echo"fraco";
        break;
    case 2:
         echo"insuficiente";
        break;
    case 3:
        echo"suficiente";
        break;
    default:
        echo"bom";
        break;
}
$nom=3;
echo"<br>";
echo"<br>";

while($nom<10){
    echo $nom;
    echo"<br>";
    $nom++;
}

echo"<br>";echo"<br>";

for($i=0;$i<20;$i++){
    echo $i."<br>";
}

$array=["a","b","c","d","e"];
$numeros=[
    "1"=>"primeiro",    
    "2"=>"segundo",                        #array maluco que o "1" é o nome da posição subistituindo o [0],[1],[2] e os nomes são o conteudo do array
    "3"=>"terceiro",
    "4"=>"quarto"
];
echo $numeros["1"];

$n1=10;
$n2=20;
echo"<br>";echo"<br>";
function soma($num1,$num2){
    echo $num1+$num2;
}

function sub($num1,$num2){
    echo $num1-$num2;
}

sub($n1,$n2);
echo"<br>";echo"<br>";
soma($n1,$n2);
?>