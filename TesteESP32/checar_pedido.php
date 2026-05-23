<?php
header("Content-Type: text/plain");

$host = "localhost";
$user = "root"; 
$pass = "root";
$db   = "sistema_carrinho";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("ERRO_BD");
}

// Busca o chamado mais recente que ainda está como "Processando informação"
$sql = "SELECT id, sala_codigo FROM pedidos WHERE status_atual = 'Processando informação' ORDER BY id ASC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_pedido = $row['id'];
    $sala_codigo = $row['sala_codigo'];
    
    // Retorna apenas o NÚMERO (Ex: 3) para o ESP32
    echo $sala_codigo;
    
    // Atualiza para 'A caminho da Sala' para indicar que o robô já iniciou
    $conn->query("UPDATE pedidos SET status_atual = 'A caminho da Sala' WHERE id = $id_pedido");
} else {
    echo "NENHUM";
}

$conn->close();
?>