<?php 
$con = mysqli_connect('localhost','root','root','biblioteca',3306);

if($con->connect_error){
    die("Ocorreu um erro ao ligar a DB".$con->connect_error);
}
else{
    echo"A ligar DB";
}
echo "<br>";

$inserir1="insert into t_livro (titulo, data_emicao, autor, uso) values('Canaviais','2022/05/15', 'Gugu',0);";
$inserir2="insert into t_livro (titulo, data_emicao, autor, uso) values('Santana','1945/07/23', 'Galvão Boeno',1);";

if($con->query($inserir1)){
    echo"Registro 1 inserido";
}
else {
    echo"erro ao inserir 1". $con->error;
}
echo "<br>";
if($con->query($inserir2)){
    echo"Registro 2 inserido";
}
else {
    echo"erro ao inserir 2".$con->error;
}
echo "<br>";
$consulta1="select *from t_livro;";
$resultado= $con->query($consulta1);


if($resultado->num_rows>0){
    echo"<table>";
        echo"<thead>";
            echo"<tr>";
                echo"<td colspan='5'>Titulo</td>";
            echo"</tr>";
            echo"<tr>";
                echo"<tdcolspan='5'>Data Emicao</td>";
            echo"</tr>";
            echo"<tr>";
                echo"<td colspan='5'>Autor</td>";
            echo"</tr>";
            echo"<tr>";
                echo"<tdcolspan='5'>Uso</td>";
            echo"</tr>";
        echo"</thead>";
    while($registro=$resultado->fetch_assoc()){
        echo "Titulo: ".$registro['titulo']." Data Emicao: ".$registro['data_emicao']." Autor: ".$registro['autor']." Uso: ".$registro['uso']."<br>";
    }
    echo"</td>";
}
else{
    echo"nada encontrado!!!";
}
echo"<br>";
$con->close();



?>