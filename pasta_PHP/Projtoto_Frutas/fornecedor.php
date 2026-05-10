<?php
session_start();

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if(!isset($_SESSION['tipo']) || $_SESSION['tipo'] != "fornecedor")
{
    header("Location: login.php");
    exit();
}

$con = mysqli_connect('localhost','root','root','db_frutas',3306);

$id_fornecedor = $_SESSION['id'];


// =======================
// 🔧 ADICIONAR
// =======================
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add']))
{
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $peso = $_POST['peso'];
    $prop = $_POST['propriedade'];

    $sql = "INSERT INTO t_produto
    (nome,preco,quantidade,peso,propriedade,id_fornecedor)
    VALUES('$nome','$preco','$quantidade','$peso','$prop','$id_fornecedor')";

    mysqli_query($con,$sql);

    header("Location: fornecedor.php");
    exit();
}


// =======================
// ❌ DELETE
// =======================
if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    mysqli_query($con,"
    DELETE FROM t_produto
    WHERE id_produto='$id'
    AND id_fornecedor='$id_fornecedor'
    ");

    header("Location: fornecedor.php");
    exit();
}


// =======================
// ✏️ UPDATE
// =======================
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update']))
{
    $id = $_POST['id'];

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $peso = $_POST['peso'];
    $prop = $_POST['propriedade'];

    mysqli_query($con,"
    UPDATE t_produto SET

    nome='$nome',
    preco='$preco',
    quantidade='$quantidade',
    peso='$peso',
    propriedade='$prop'

    WHERE id_produto='$id'
    AND id_fornecedor='$id_fornecedor'
    ");

    header("Location: fornecedor.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt">

<head>

    <meta charset="UTF-8">

    <title>Painel Fornecedor</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <?php

$hora = date("H");

if($hora >= 6 && $hora < 12)
{
    $saudacao = "Bom dia";
}
elseif($hora >= 12 && $hora < 20)
{
    $saudacao = "Boa tarde";
}
else
{
    $saudacao = "Boa noite";
}

?>

    <header class="header_fornecedor">

        <div>

            <h1>
                <?php echo $saudacao . ", " . $_SESSION['nome']; ?> 🍎
            </h1>

        </div>

        <div>

            <a href="logout.php">
                <button class="logout_btn">
                    Logout
                </button>
            </a>

        </div>

    </header>


    <div class="container_fornecedor">

        <div class="box">

            <h2>Adicionar Produto</h2>

            <form method="post">

                <input type="text" name="nome" placeholder="Nome" required>

                <input type="number" step="0.01" name="preco" placeholder="Preço" required>

                <input type="number" name="quantidade" placeholder="Quantidade" required>

                <input type="number" step="0.01" name="peso" placeholder="Peso" required>

                <input type="text" name="propriedade" placeholder="Propriedade" required>

                <input type="submit" name="add" value="Adicionar Produto">

            </form>

        </div>

        <div class="box">

            <h2>Meus Produtos</h2>

            <?php

        $resultado = mysqli_query($con,"
        SELECT * FROM t_produto
        WHERE id_fornecedor='$id_fornecedor'
        ");

        echo "<table>";

        echo "<tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Quantidade</th>
        <th>Ações</th>
        </tr>";

        while($r = mysqli_fetch_assoc($resultado))
        {
            echo "<tr>";

            echo "<td>".$r['id_produto']."</td>";

            echo "<td>".$r['nome']."</td>";

            echo "<td>".$r['preco']." €</td>";

            echo "<td>".$r['quantidade']."</td>";

            echo "<td>

            <a class='acao_btn editar_btn'
            href='?edit=".$r['id_produto']."'>
            Editar
            </a>

            <a class='acao_btn delete_btn'
            href='?delete=".$r['id_produto']."'
            onclick='return confirm(\"Tem certeza?\")'>
            Delete
            </a>

            </td>";

            echo "</tr>";
        }

        echo "</table>";

        ?>

        </div>

    </div>

    <?php

if(isset($_GET['edit']))
{
    $id = $_GET['edit'];

    $res = mysqli_query($con,"
    SELECT * FROM t_produto
    WHERE id_produto='$id'
    AND id_fornecedor='$id_fornecedor'
    ");

    $dados = mysqli_fetch_assoc($res);

?>

    <div class="box editar_box">

        <h2>Editar Produto</h2>

        <form method="post">

            <input type="hidden" name="id" value="<?php echo $dados['id_produto']; ?>">

            <input type="text" name="nome" value="<?php echo $dados['nome']; ?>">

            <input type="number" step="0.01" name="preco" value="<?php echo $dados['preco']; ?>">

            <input type="number" name="quantidade" value="<?php echo $dados['quantidade']; ?>">

            <input type="number" step="0.01" name="peso" value="<?php echo $dados['peso']; ?>">

            <input type="text" name="propriedade" value="<?php echo $dados['propriedade']; ?>">

            <input type="submit" name="update" value="Guardar Alterações">

        </form>

    </div>

    <?php } ?>

</body>

</html>