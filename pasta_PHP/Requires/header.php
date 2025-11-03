<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="index1.css">
</head>


<body>
    <?php 
    session_start();    
    
    ?>
    <header>
        <h1 id="Titulo">H1 MUITO PIKA</h1>
        <div id="login">
            <?php 
        $nomer=$_SESSION['username'];
        $passr=$_SESSION['password'];
        echo "username: $nomer Password: $passr ";
        ?>
        </div>
    </header>
    <nav>
        <a href="AC1.php">Assasin's creed</a>
        <a href="AC2.php">Ezio Arc</a>
        <a href="#">USA Arc</a>
        <a href="#">Pirates Arc</a>
    </nav>
</body>

</html>