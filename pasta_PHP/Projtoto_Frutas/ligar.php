<?php
$con = mysqli_connect('localhost','root','root','',3306);

if(!$con)
{
    die("Erro de ligação");
}

mysqli_query($con,"CREATE DATABASE IF NOT EXISTS db_frutas");
mysqli_select_db($con,"db_frutas");

//////////////////////////////////////////////////////////////fornecedor
$sql = "CREATE TABLE IF NOT EXISTS t_fornecedor(
id_fornecedor INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100),
endereco VARCHAR(150),
contacto VARCHAR(30),
email VARCHAR(100),
senha VARCHAR(100)
)";
mysqli_query($con,$sql);

//////////////////////////////////////////////////////////////cliente
$sql = "CREATE TABLE IF NOT EXISTS t_cliente(
id_cliente INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100),
senha VARCHAR(100)
)";
mysqli_query($con,$sql);

//////////////////////////////////////////////////////////////produto
$sql = "CREATE TABLE IF NOT EXISTS t_produto(
id_produto INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100),
preco DECIMAL(10,2),
quantidade INT,
peso DECIMAL(10,2),
propriedade VARCHAR(150),
id_fornecedor INT,
FOREIGN KEY(id_fornecedor)
REFERENCES t_fornecedor(id_fornecedor)
)";
mysqli_query($con,$sql);

//////////////////////////////////////////////////////////////
header("Location: index.php");
exit();

?>