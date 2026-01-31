<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="saude.css">
    <link rel="shortcut icon" href="imgs/logo.jpeg" type="image/x-icon">

</head>

<body>
    <header>
        <div><img src="imgs/logo.png" alt="" width="90px"></div>
        <h1>FitLife ajuda a saber mais sobre ti</h1>
    </header>
    <Main>
        <form method="get">

            <div class="carrocel">

                <div class="group">
                    <button type="submit" name="op" value="gordura">
                        <img src="imgs/Calcular Gordura Corporal.png" alt="" class="item" width="250px"></img>
                    </button>
                    <button type="submit" name="op" value="imc">
                        <img src="imgs/Calcular IMC.png" alt="" class="item" width="250px"></img>
                    </button>
                    <button type="submit" name="op" value="calorias">
                        <img src="imgs/Calculadora de Calorias.png" alt="" class="item" width="250px"></img>
                    </button>
                </div>

                <div class="group">
                    <button type="submit" name="op" value="gordura">
                        <img src="imgs/Calcular Gordura Corporal.png" alt="" class="item" width="250px"></img>
                    </button>
                    <button type="submit" name="op" value="imc">
                        <img src="imgs/Calcular IMC.png" alt="" class="item" width="250px"></img>
                    </button>
                    <button type="submit" name="op" value="calorias">
                        <img src="imgs/Calculadora de Calorias.png" alt="" class="item" width="250px"></img>
                    </button>
                </div>

                <div class="group">
                    <button type="submit" name="op" value="gordura">
                        <img src="imgs/Calcular Gordura Corporal.png" alt="" class="item" width="250px"></img>
                    </button>
                    <button type="submit" name="op" value="imc">
                        <img src="imgs/Calcular IMC.png" alt="" class="item" width="250px"></img>
                    </button>
                    <button type="submit" name="op" value="calorias">
                        <img src="imgs/Calculadora de Calorias.png" alt="" class="item" width="250px"></img>
                    </button>
                </div>
            </div>

        </form>

    </Main>


</body>

</html>
<?php 

    $op=$_REQUEST["op"];
    
    if ($op="gordura"){
        header("location:gordura.php");
    }
    elseif($op="imc"){
        header("location:imc.php");
    }
    else{
        header("location:calorias.php");
    }
?>