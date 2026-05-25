<?php
$host = "localhost";
$user = "root";
$pass = "root"; // Padrão do MAMP (no XAMPP costuma ser vazio "")
$dbname = "chat_db";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    // Ativa o modo de erros para facilitar o desenvolvimento
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com a base de dados: " . $e->getMessage());
}
?>