<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gordura</title>
    <link rel="stylesheet" href="saude.css">
    <link rel="shortcut icon" href="imgs/logo.jpeg" type="image/x-icon">

</head>

<body>
    <?php 
    require "header.php";
    ?>
    <main>
        <br>
        <h2 class="conteiner h2">—Calcular-IMC—</h2>
        <div class="pai">

            <div class="filho">
                <h4 class="h4">MC é a sigla para Índice de Massa Corpórea, parâmetro adotado pela Organização Mundial de
                    Saúde para
                    calcular o peso ideal de cada pessoa.</h4>
                <h4 class="h4">O índice é calculado da seguinte maneira: divide-se o peso do paciente
                    pela sua altura elevada ao quadrado. Diz-se que o indivíduo tem peso normal quando o resultado do
                    IMC
                    está
                    entre 18,5 e 24,9.</h4>
                <h4 class="h4">Quer descobrir seu IMC? Insira seu peso e sua altura nos campos abaixo e compare com os
                    índices da tabela. Importante: siga os exemplos e use pontos como separadores.</h4>
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
                    <label>Altura (cm):</label>
                    <input type="number" name="altura" step="0.1" required>
                    <br>
                    <label>Peso (kg):</label>
                    <input type="number" name="peso" step="0.1" required>
                    <br>
                    <label>Cintura (cm):</label>
                    <input type="number" name="cintura" step="0.1" required>
                    <br>
                    <label>Pescoço (cm):</label>
                    <input type="number" name="pescoco" step="0.1" required>
                    <br>
                    <button type="submit" name="calcular">Calcular % Gordura</button>
                    <br>
                </form>

                <?php  
                    echo "<br>";
                    $bf = null;

                    if (isset($_GET['calcular'])) {  // melhor que $_GET['calcular']

                        $genero = $_GET['genero'];
                        $altura = (float) $_GET['altura'];
                        $cintura = (float) $_GET['cintura'];
                        $pescoco = (float) $_GET['pescoco'];

                        if ($altura > 0 && $cintura > 0 && $pescoco > 0) {
                            if ($genero === 'Masculino') {
                                $bf = 86.010 * log10($cintura - $pescoco) - 70.041 * log10($altura) + 36.76;
                            } else {
                                $bf = 163.205 * log10($cintura - $pescoco) - 97.684 * log10($altura) - 78.387;
                            }

                            $bf = number_format($bf, 2);
                        } else {
                            $erro = "Valores inválidos!";
                        }
                    }

                    if (isset($erro)) {
                        echo "<p>$erro</p>";
                    } elseif ($bf !== null) {
                        echo "<p>Seu percentual de gordura corporal é: <strong>$bf%</strong></p>";
                    }
            
                ?>
            </div>
        </div>
    </main>

</body>

</html>