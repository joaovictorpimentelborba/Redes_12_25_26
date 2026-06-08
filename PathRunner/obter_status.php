<?php
header("Content-Type: application/json");

$host = "localhost";
$user = "root";
$pass = "root";
$db   = "sistema_carrinho";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo json_encode(["erro" => "Falha na conexão"]);
    exit();
}

// Busca o chamado mais recente criado no sistema
$sql = "SELECT sala_nome, status_atual, interferencia FROM pedidos ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode([
        "sala" => $row['sala_nome'],
        "status" => $row['status_atual'],
        "interferencia" => $row['interferencia']
    ]);
} else {
    echo json_encode([
        "sala" => "Nenhuma",
        "status" => "Sem pedidos ativos",
        "interferencia" => "Nenhuma"
    ]);
}

$conn->close();
?>