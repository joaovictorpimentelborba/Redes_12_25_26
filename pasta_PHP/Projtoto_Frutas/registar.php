<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="login_box">

        <h2>Criar Conta</h2>

        <form action="registar_user.php" method="post">

            <input type="text" name="nome" placeholder="Nome" required><br><br>
            <input type="password" name="senha" placeholder="Senha" required><br><br>

            <select name="tipo">
                <option value="cliente">Cliente</option>
                <option value="fornecedor">Fornecedor</option>
            </select>

            <br><br>

            <button type="submit">Crie Sua Conta</button>

        </form>

    </div>

</body>

</html>