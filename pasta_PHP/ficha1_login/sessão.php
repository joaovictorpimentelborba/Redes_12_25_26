<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jogos</title>
</head>

<body>
    <?php 
    $jogo=[["jogo1","2024","empresa1"],["jogo2","2017","empresa2"],["jogo3","2008","empresa3"]];
    ?>
    <table>
        <thead>
            <tr>
                <td>Nome</td>
                <td>Ano</td>
                <td>Empresa</td>
            </tr>
        </thead>
        <tbody>

            <?php 
            foreach($jogo as $i):
            ?>

            <tr>
                <td>
                    <?= $i[0] ?>
                </td>
                <td>
                    <?= $i[1] ?>
                </td>
                <td>
                    <?= $i[2] ?>
                </td>
            </tr>

            <?php 
            endforeach;
            ?>

        </tbody>
    </table>
</body>

</html>