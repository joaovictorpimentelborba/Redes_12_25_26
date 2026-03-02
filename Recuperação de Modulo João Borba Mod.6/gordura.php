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
        <h2 class="conteiner h2">—percentual-de-gordura —</h2>
        <div class="pai">

            <div class="filho">
                <h4 class="h4">Todo ser humano precisa de uma certa quantidade de gordura corporal para armazenar
                    energia e manter o funcionamento adequado do organismo, mas tê-la em excesso pode ser um sinal de
                    problemas de saúde.</h4>
                <h4 class="h4">O exército norte-americano desenvolveu uma forma bastante rápida de estimar a
                    porcentagem de gordura corporal com uma fita métrica. </h4>
                <h4 class="h4">O resultado é bem próximo da realidade para a
                    maioria das pessoas, mas não hesite em visitar um médico caso você queira ter uma medição mais
                    precisa.</h4>
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
                    <input type="number" name="altura" min="40" max="240" step="1" required>
                    <br>
                    <label>Cintura (cm):</label>
                    <input type="number" name="cintura" step="1" required>
                    <br>
                    <label>Pescoço (cm):</label>
                    <input type="number" name="pescoco" step="1" required>
                    <br>
                    <label>Quadril (cm) (Apenas mulheres):</label>
                    <input type="number" name="quadril" step="1">
                    <br>
                    <button type="submit" name="calcular" class="btn">Calcular Gordura</button>
                </form>

                <?php  
                    echo "<br>";
                    $bf = null;

                    if (isset($_GET['calcular'])) {
                        
                        $genero=$_REQUEST["genero"];
                        $altura=$_REQUEST["altura"];
                        $cintura = $_REQUEST["cintura"];
                        $pescoco = $_REQUEST["pescoco"];
                        $quadril=$_REQUEST["quadril"];


                        if ($genero == "Masculino") {
                            if ($altura > 0 && $cintura > 0 && $pescoco > 0 ) { 
                                $bf = (495 / (1.033 - (0.191 * log10($cintura - $pescoco)) + (0.155 * log10($altura)))) - 450;     
                            } 
                            else {  
                            $erro = "Valores inválidos!";
                            }
                        } 
                        elseif($genero=="Femenino") {
                             if ($altura > 0 && $cintura > 0 && $pescoco > 0 && $quadril > 0) {
                                $bf = (495 / (1.296 - (0.350 * log10($quadril + $cintura - $pescoco)) + (0.221 * log10($altura)))) - 450;
                             }
                             else {
                            $erro = "Valores inválidos!";
                            }
                            
                        }
                        
                    }

                    if ($bf !== null) {
                        echo "<h3>Resultado</h3>";
                        echo "<p>Seu percentual de gordura corporal é: <strong>".number_format($bf, 2)."%</strong></p>";
                        echo "<br>";
                        if ($genero=="Masculino"){
                            
                            if($bf<=7){
                                echo "Um percentual inferior a 7% é extremamente baixo e geralmente observado apenas em atletas de elite. Pode estar associado a fadiga, diminuição da imunidade e desequilíbrios hormonais, sendo essencial acompanhamento profissional e uma alimentação adequada.";
                            }   
                            elseif ($bf>7 && $bf<=14){
                                echo "Este percentual é muito baixo e geralmente observado em atletas. Exige atenção à alimentação para manter energia, massa muscular e equilíbrio hormonal.";
                            }    
                            elseif ($bf>14 && $bf<=21){
                                echo "Indica boa condição física e baixo risco para a saúde. Manter hábitos saudáveis ajuda a preservar a composição corporal.";
                            }
                            elseif ($bf>21 && $bf<=28){
                                echo "É considerado um valor dentro da normalidade. Pequenos ajustes na alimentação e atividade física ajudam a manter a saúde.";                  
                            }
                            elseif ($bf>28 && $bf<=35){
                                echo "Pode indicar excesso de gordura corporal. Recomenda-se melhorar a alimentação e aumentar a prática de atividade física.";                  
                            }
                            elseif ($bf>35){
                                echo "Percentual elevado, associado a maiores riscos para a saúde. O acompanhamento por profissionais e mudanças no estilo de vida são fundamentais.";                  
                            }
                        }
                        elseif($genero=="Femenino"){
                            if($bf<=7){
                                echo "Percentuais abaixo de 7% são considerados muito baixos e podem comprometer funções hormonais e reprodutivas. É fundamental garantir uma nutrição adequada e acompanhamento de profissionais de saúde para evitar riscos à saúde.";
                            }   
                            elseif ($bf>7 && $bf<=14){
                                echo "Um valor tão baixo pode não ser saudável para a maioria das mulheres. É importante garantir ingestão adequada de nutrientes e acompanhamento profissional para evitar alterações hormonais.";
                            }    
                            elseif ($bf>14 && $bf<=21){
                                echo "Representa um percentual saudável, associado a bom funcionamento do organismo. A prática regular de exercício e alimentação equilibrada são recomendadas.";
                            }
                            elseif ($bf>21 && $bf<=28){
                                echo "Este percentual ainda é considerado saudável. A manutenção de hábitos ativos contribui para o bem-estar geral.";                  
                            }
                            elseif ($bf>28 && $bf<=35){
                                echo "Este valor já pode representar excesso de gordura. A adoção de hábitos mais ativos ajuda a prevenir problemas de saúde.";                  
                            }
                            elseif ($bf>35){
                                echo "Valores elevados exigem atenção redobrada à saúde. Mudanças graduais na alimentação, atividade física e apoio profissional são essenciais.";                  
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </main>

</body>

</html>