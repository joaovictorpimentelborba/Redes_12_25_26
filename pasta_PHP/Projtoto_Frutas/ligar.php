<?php

$servidor = "localhost";
$user = "root";
$pass = "";

try {

    $conn = new PDO("mysql:host=$servidor", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->exec("CREATE DATABASE IF NOT EXISTS db_Frutas");

    $conn->exec("USE db_Frutas");

    $conn->exec("
    CREATE TABLE IF NOT EXISTS t_frutas(
        id_fruta INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100),
        preco DECIMAL(10,2)
    )");

    // voltar ao index automaticamente
    header("Location: index.php");
    exit();

} catch(PDOException $e){
    echo "Erro: " . $e->getMessage();
}

?>