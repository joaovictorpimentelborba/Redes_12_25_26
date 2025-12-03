<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sctipt Externos</title>
    <link rel="stylesheet" href="index1.css">
</head>

<body>

    <?php 
    //include, require include_once, require_once
    //require "header.php";

    include "header.php";
    //require "footer.php";
    ?>
    <main>
        <form id="login" action="<?= $SERVER['PHP_SELF'];?> " method="post">

            <label for="user">User</label>
            <input type="text" name="user" id="user">
            <label for="pass">Password</label>
            <input type="password" name="pass" id="pass">
            <input type="submit" value="Entrar" name="sub">

        </form>
        <div>
            <img src="" alt="">
        </div>
    </main>

    <?php 

    $acchars=include "chars.php";
    $n=0;
    foreach ($acchars as $c){
        $n++;
        echo"AC $n: $c";
        echo"<br>";
    }

    if($_REQUEST["sub"]){
        
    $user=$_REQUEST["user"];
    $pass=$_REQUEST["pass"];
    
    $_SESSION["username"]=$user;
    $_SESSION["password"]=$pass;
    header('Refresh:0');
    
    }

    
    ?>

    <?php
    include "footer.php";
    ?>
</body>

</html>