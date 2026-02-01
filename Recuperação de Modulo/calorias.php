<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calorias</title>
    <link rel="stylesheet" href="saude.css">
    <link rel="shortcut icon" href="imgs/logo.jpeg" type="image/x-icon">

</head>

<body>
    <?php 
    require "header.php";
    ?>
    <main>
        <br>
        <h2 class="conteiner h2">—Calcular-Calorias—</h2>
        <div class="pai">

            <div class="filho">
                <h4 class="h4"><strong>GEB (Gasto Energético Basal):</strong> Quantidade de calorias que o corpo
                    gasta em repouso, apenas para manter funções vitais como respiração, circulação sanguínea e
                    funcionamento dos órgãos.</h4>
                <h4 class="h4"><strong>Gasto Calórico Total: </strong>É o GEB multiplicado pelo fator de atividade Leva
                    em conta o seu nível de exercício (caminhada, academia, atividades diárias e semanais) e
                    também Representa quantas calorias você gasta por dia considerando sua rotina.</h4>
                <h4 class="h4"><strong>Calorias diárias recomendadas: </strong>É o número de calorias que você deve
                    ingerir por dia para atingir seu objetivo:</h4>
                <ul>
                    <li><strong>Emagrecer:</strong> consumir menos do que gasta → perda de peso</li>
                    <li><strong>Manter:</strong> consumir o que gasta → peso estável</li>
                    <li><strong>Engordar:</strong> consumir mais do que gasta → ganho de peso</li>
                </ul>
            </div>
            <br>
            <div class="filho">
                <form method="GET" class="forms">

                    <label>Género:</label>
                    <select name="genero" id=" genero">
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                    <br>
                    <label>Objetivo:</label>
                    <select name="objetivo" id="objetivo">
                        <option value="Manter">Manter</option>
                        <option value="Engordar">Engordar</option>
                        <option value="Emagrecer">Emagrecer</option>
                    </select>
                    <br>
                    <label>Exercício físico:</label>
                    <select name="exer_fisico" id="exer_fisico">
                        <option value="Nunca">Nunca</option>
                        <option value="Leve">Leve: 1 a 3 vezes por semana</option>
                        <option value="Moderado">Moderado: 4 a 5 vezes por semana</option>
                        <option value="Muito_ativo">Muito ativo: 6 a 7 vezes por semana</option>
                        <option value="Extremo">Extremo: mais que 7 vezes por semana</option>
                    </select>
                    <br>
                    <label>idade:</label>
                    <input type="number" name="idade" id="" min="1" max="100">
                    <br>
                    <label>altura (cm):</label>
                    <input type="number" name="altura" id="" min="40" max="240" step="1">
                    <br>
                    <label>peso (Kg):</label>
                    <input type="number" name="peso" id="" min="2" max="635" step="0.01">
                    <br>
                    <button type="submit" name="calcular" value="1" class="btn">Calcular Calorias</button>
                    <br>
                </form>

                <?php  
                echo "<br>";
            
                if (isset($_GET['calcular'])) {
                    
                    $genero = $_GET['genero'];
                    $objetivo = $_GET['objetivo'];
                    $exer_fisico = $_GET['exer_fisico'];
                    $idade = $_GET['idade'];
                    $altura = $_GET['altura'];
                    $peso = $_GET['peso'];
                    $geb=0;
                    $cal=0;
                    $gasto_total=0;
                    $fator=0;

                    if ($genero == "Masculino") {
                    $geb = (15.057 * $peso) + 692.2;
                    } 
                    else {
                    $geb = (14.818 * $peso) + 486.6;
                    }
                    
                    if ($exer_fisico=="Nunca"){
                         $fator = 1.2;
                    }
                    elseif($exer_fisico=="Leve"){
                        $fator = 1.375;
                    }
                    elseif($exer_fisico=="Moderado"){
                        $fator = 1.55;
                    }
                    elseif($exer_fisico=="Muito_ativo"){
                        $fator = 1.725;
                    }
                    elseif($exer_fisico=="Extremo"){
                        $fator = 1.9;
                    }
                    
                    $gasto_total = $geb * $fator;

                    if ($objetivo == "Emagrecer") {
                        $cal = $gasto_total - 500;
                    } 
                    elseif ($objetivo == "Engordar") {
                        $cal = $gasto_total + 500;
                    } 
                    elseif($objetivo=="Manter") {
                        $cal = $gasto_total;
                    }

                    echo "<h3>Resultados</h3>";
                    echo "<p>GEB: " . number_format($geb, 2) . " kcal</p>";
                    echo "<p>Gasto calórico total: " . number_format($gasto_total, 2) . " kcal</p>";
                    echo "<p><strong>Calorias diárias recomendadas para ".strtolower($objetivo).": " . number_format($cal, 2) . " kcal</strong></p>";
                }
                ?>
            </div>
        </div>
    </main>
</body>

</html>