<?php 
    

$con = mysqli_connect('localhost','root','root','redes',3306);

if($con->connect_error){
    die("Ocorreu um erri ao ligar a DB".$con->connect_error);
}
else{
    echo"A ligar DB";
}
echo "<br>";

$consulta1="create table if not exists linguagem (cod_l int auto_increment primary key, nome varchar(50), tipo varchar(50));";

if($con->query($consulta1)){
    echo"Tabela criada";
}
else {
    echo"Erro ao criar tabela";
}
echo "<br>";

$inserir1="insert into linguagem (nome, tipo) values('PHP','Web Design Backend');";
$inserir2="insert into linguagem (nome, tipo) values('C#','Application Creation');";

if($con->query($inserir1)){
    echo"Registro 1 inserido";
}
else {
    echo"erro ao inserir 1";
}
echo "<br>";
if($con->query($inserir2)){
    echo"Registro 2 inserido";
}
else {
    echo"erro ao inserir 2";
}
echo "<br>";
$consulta1="select *from linguagem;";
$resultado= $con->query($consulta1);


if($resultado->num_rows>0){
    while($registro=$resultado->fetch_assoc()){
        echo "Linguagem ".$registro['nome']."Tipo: ".$registro['tipo']."<br>";
    }
}
else{
    echo"nada encontrado!!!";
}
echo "<br>";


?>