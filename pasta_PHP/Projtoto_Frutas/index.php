<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

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
<div class="logo">
🍎 Frutas do Luffy
</div>

<div class="login">
    <a href="login.php">
        <button>LOGIN</button>
    </a>
</div>
</header>
<?php }?>
<?php

<div class="container">

<?php if($ligado){ ?>

<h1>Bem vindo à loja Frutas do Luffy 🍎</h1>

<?php

$sql = "SELECT * FROM t_produto";
$resultado = mysqli_query($con,$sql);

echo "<table border='1' align='center' cellpadding='10'>";
echo "<tr>";
echo "<th>Numero</th>";
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

<?php } else { ?>

<form action="ligar.php" method="post">
<button type="submit">CONECTAR BASE DE DADOS</button>
</form>

<?php } ?>

</div>

</body>
</html>