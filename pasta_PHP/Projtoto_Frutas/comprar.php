<?php
session_start();
// Conexão com a base de dados db_frutas
$con = mysqli_connect('localhost', 'root', 'root', 'db_frutas', 3306);

if(isset($_POST['id_produto']) && isset($_POST['quantidade'])) {
    $id_produto = $_POST['id_produto'];
    $quantidade_pedida = $_POST['quantidade'];

    // 1. Buscar o nome e a quantidade atual para validação
    $res = mysqli_query($con, "SELECT nome, quantidade FROM t_produto WHERE id_produto='$id_produto'");
    $produto = mysqli_fetch_assoc($res);

    if($produto && $produto['quantidade'] >= $quantidade_pedida) {
        $nome_fruta = $produto['nome'];
        $nova_qtd = $produto['quantidade'] - $quantidade_pedida;

        // 2. Atualizar o stock na tabela t_produto
        mysqli_query($con, "UPDATE t_produto SET quantidade='$nova_qtd' WHERE id_produto='$id_produto'");

        // --- NOVA LÓGICA: APAGAR SE CHEGAR A 0 ---
        if($nova_qtd <= 0) {
            mysqli_query($con, "DELETE FROM t_produto WHERE id_produto='$id_produto'");
            $mensagem_extra = " (O produto esgotou e foi removido do catálogo)";
        } else {
            $mensagem_extra = "";
        }
        // ----------------------------------------

        // Redireciona para o index.php com os dados para o popup
        header("Location: index.php?compra=sucesso&qtd=$quantidade_pedida&fruta=$nome_fruta$mensagem_extra");
        exit();
    } else {
        // Se não houver stock suficiente
        header("Location: index.php?compra=erro");
        exit();
    }
}
?>