<?php

$con = mysqli_connect('localhost','root','root','db_frutas',3306);

$nome = $_POST['nome'];
$senha = $_POST['senha'];
$tipo = $_POST['tipo'];

if($tipo == "cliente")
{
    $check = mysqli_query($con,"SELECT * FROM t_cliente WHERE nome='$nome'");
}
else
{
    $check = mysqli_query($con,"SELECT * FROM t_fornecedor WHERE nome='$nome'");
}

if(mysqli_num_rows($check) > 0)
{
    echo "❌ Já existe um utilizador com esse nome!";
    exit();
}

// inserir
if($tipo == "cliente")
{
    $sql = "INSERT INTO t_cliente(nome,senha) VALUES('$nome','$senha')";
}
else
{
    $sql = "INSERT INTO t_fornecedor(nome,senha) VALUES('$nome','$senha')";
}

mysqli_query($con,$sql);

header("Location: login.php");
?>