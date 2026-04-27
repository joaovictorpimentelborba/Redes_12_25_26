<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login_box">

<h1>Login</h1>

<form action="verificar_login.php" method="post">

<input type="text" name="nome" placeholder="Nome" required><br><br>

<input type="password" name="senha" placeholder="Senha" required><br><br>

<select name="tipo">
<option value="cliente">Cliente</option>
<option value="fornecedor">Fornecedor</option>
</select>

<br><br>

<button type="submit">ENTRAR</button>

</form>

</div>

</body>
</html>