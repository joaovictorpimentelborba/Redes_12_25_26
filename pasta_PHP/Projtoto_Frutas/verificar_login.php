<?php
session_start();

$con = mysqli_connect('localhost','root','root','db_frutas',3306);

$nome = $_POST['nome'];
$senha = $_POST['senha'];
$tipo = $_POST['tipo'];

if($tipo == "cliente")
{
    $sql = "SELECT * FROM t_cliente WHERE nome='$nome' AND senha='$senha'";
}
else
{
    $sql = "SELECT * FROM t_fornecedor WHERE nome='$nome' AND senha='$senha'";
}

$resultado = mysqli_query($con,$sql);

if(mysqli_num_rows($resultado) > 0)
{
    // Extrair a linha com os dados do utilizador que acabou de fazer login
    $dados_utilizador = mysqli_fetch_assoc($resultado);

    $_SESSION['nome'] = $nome;
    $_SESSION['tipo'] = $tipo;

    if($tipo == "fornecedor")
    {
        // Guardar o ID do fornecedor na sessão
        $_SESSION['id'] = $dados_utilizador['id_fornecedor']; 
        header("Location: fornecedor.php");
    }
    else
    {
        // Guardar o ID do cliente na sessão (boa prática para usar no futuro)
        $_SESSION['id'] = $dados_utilizador['id_cliente']; 
        header("Location: index.php");
    }
}
else
{
    echo "Login inválido";
}
?>