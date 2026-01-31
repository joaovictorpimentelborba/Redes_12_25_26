<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMC</title>
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

                    <label>idade:</label>
                    <input type="number" name="idade" id="" min="1" max="100">

                    <label>altura (m):</label>
                    <input type="number" name="altura" id="" min="0.40" max="2.40" step="0.01">
                    <br>

                    <label>peso (Kg):</label>
                    <input type="number" name="peso" id="" min="2" max="635" step="0.01">

                    <button type="submit" name="calcular" value="1">Calcular IMC</button>
                    <br>
                </form>

                <?php  
            echo "<br>";
            
            $imc=null; 
            
            if (isset($_GET['calcular'])){
                
                $genero=$_REQUEST["genero"];    
                $idade=$_REQUEST["idade"];
                $altura=$_REQUEST["altura"];
                $peso=$_REQUEST["peso"];

                if ($altura > 0 && $peso > 0) {
                    $imc = $peso / ($altura * $altura);
                    $imc = number_format($imc, 2);
                } else {
                    echo "<p>Valores inválidos.</p>";
                }
                 
            }

            if ($imc!=null){

                    if ($imc<=18.5){
                    echo "Seu IMC é de ".$imc." voçê esta com Magreza e seu nivel de obesidade é 0";
                    echo "<br>";
                    echo "<br>";
                    echo "Para combater a magreza, foque em aumentar a ingestão calórica com refeições frequentes e nutritivas, priorizando proteínas, gorduras saudáveis (abacate, oleaginosas) e carboidratos complexos, evitando frituras e industrializados, e combinando com exercícios para ganho de massa muscular, sempre visando um IMC saudável (entre 18,5 e 24,9) e nunca pulando refeições para um ganho de peso gradual e seguro, realçando o corpo com estilo e volume. ";
                }
                elseif ($imc>18.5 && $imc<24.9){
                    echo "Seu IMC é de ".$imc ." voçê esta Normal e seu nivel de obesidade é 0";
                    echo "<br>";
                    echo "<br>";
                    echo "Continue com os hábitos saudáveis de alimentação e exercício físico para manter este equilíbrio, que é fundamental para a sua saúde.";
                }
                elseif ($imc>25 && $imc<29.9){
                    echo "Seu IMC é de ".$imc." voçê esta com Sobrepeso e seu nivel de obesidade é grau 1";
                    echo "<br>";
                    echo "<br>";
                    echo "Pessoas com obesidade grau I devem melhorar a sua saúde adotando uma alimentação equilibrada, com preferência por alimentos naturais e evitando excessos. A prática regular de atividade física, como caminhadas, ajuda no controlo do peso e no bem-estar. É importante manter bons hábitos de sono e reduzir o sedentarismo. O acompanhamento por profissionais de saúde contribui para resultados mais seguros e eficazes.";
                }
                elseif ($imc>30 && $imc<39.9){
                    echo "Seu IMC é de ".$imc." voçê esta com Obesidade e seu nivel de obesidade é grau 2";
                    echo "<br>";
                    echo "<br>";
                    echo "Pessoas com obesidade grau II devem adotar uma alimentação equilibrada e controlada, com redução de alimentos ricos em gordura e açúcar. A prática de atividade física deve ser regular e adaptada às suas capacidades. O acompanhamento médico e nutricional é fundamental para prevenir complicações. O apoio psicológico pode ajudar na motivação e na mudança de hábitos.";
                }
                elseif ($imc>40){
                    echo "Seu IMC é de ".$imc." voçê esta com Obesidade Grave e seu nivel de obesidade é grau 3";
                    echo "<br>";
                    echo "<br>";
                    echo "Obesidade grau III, é essencial um acompanhamento médico contínuo e especializado. A alimentação deve ser cuidadosamente orientada por um nutricionista, e a atividade física deve ser adaptada e supervisionada. Mudanças no estilo de vida, apoio psicológico e, em alguns casos, tratamentos específicos são importantes para melhorar a saúde e a qualidade de vida.";
                }
            }
            ?>
            </div>
        </div>
    </main>
</body>

</html>