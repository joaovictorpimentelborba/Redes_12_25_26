<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

session_start();

$con = mysqli_connect('localhost','root','root','',3306);

$ligado = false;

if($con)
{
    $sql = "SHOW DATABASES LIKE 'db_frutas'";
    $resultado = mysqli_query($con,$sql);

    if($resultado && mysqli_num_rows($resultado) > 0)
    {
        $ligado = true;

        mysqli_select_db($con,"db_frutas");
    }
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Loja Frutas</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php if($ligado){ ?>

    <header>

        <div class="logo">🍎 Frutas Frescas</div>

        <div class="login">

            <?php
        if(isset($_SESSION['nome']))
        {
            echo "Olá ".$_SESSION['nome']." ";

            echo "<a href='logout.php'>
            <button>LOGOUT</button>
            </a>";
        }
        else
        {
            echo "<a href='login.php'>
            <button>LOGIN</button>
            </a>";
        }
        ?>

        </div>

    </header>

    <?php } ?>

    <div class="container">

        <?php if($ligado){ ?>

        <h1>Bem vindo à loja 🍎</h1>

        <?php

$sql = "SELECT * FROM t_produto";
$resultado = mysqli_query($con,$sql);

echo "<table border='1' align='center' cellpadding='10'>";

echo "<tr>";
echo "<th>Número</th>";
echo "<th>Nome</th>";
echo "<th>Preço</th>";
echo "<th>Quantidade</th>";
echo "<th>Peso</th>";
echo "<th>Propriedade</th>";
echo "</tr>";

while($registro = mysqli_fetch_assoc($resultado))
{
    echo "<tr>";

    echo "<td>".$registro['id_produto']."</td>";
    echo "<td>".$registro['nome']."</td>";
    echo "<td>".$registro['preco']." €</td>";
    echo "<td>".$registro['quantidade']."</td>";
    echo "<td>".$registro['peso']." kg</td>";
    echo "<td>".$registro['propriedade']."</td>";

    echo "</tr>";
}

echo "</table>";

?>
        <?php
if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == "cliente")
{
?>

        <hr>

        <h2>Comprar Produto</h2>

        <form action="comprar.php" method="post">

            <select name="id_produto" required>

                <?php

$res_produtos = mysqli_query($con,"
SELECT * FROM t_produto
WHERE quantidade > 0
");

while($p = mysqli_fetch_assoc($res_produtos))
{
    echo "<option value='".$p['id_produto']."'>
    ".$p['nome']." | Stock: ".$p['quantidade']." | ".$p['preco']." €
    </option>";
}

?>

            </select>

            <input type="number" name="quantidade" min="1" placeholder="Quantidade" required>

            <button type="submit">Comprar</button>

        </form>

        <?php
}
?>
        <!-- No final do seu index.php -->

        <?php
// Verifica se existem os parâmetros de sucesso na URL
if (isset($_GET['compra'])) {
    
    if ($_GET['compra'] == 'sucesso') {
        $qtd = $_GET['qtd'];
        $fruta = $_GET['fruta'];
        
        // Exibe o popup de sucesso
        echo "<script>alert('Compra realizada! Você comprou $qtd unidade(s) de $fruta. 🍎');</script>";
    } 
    
    elseif ($_GET['compra'] == 'erro') {
        // Exibe o popup de erro
        echo "<script>alert('Erro: Stock insuficiente para realizar esta compra! ❌');</script>";
    }

    // Limpa a URL para o alerta não aparecer de novo se o usuário atualizar a página (F5)
    echo "<script>window.history.replaceState({}, document.title, 'index.php');</script>";
}
?>

</body>

</html>

<?php } else { ?>

<form action="ligar.php" method="post">
    <button type="submit">
        CONECTAR BASE DE DADOS
    </button>
</form>

<?php } ?>

</div>

</body>

</html>