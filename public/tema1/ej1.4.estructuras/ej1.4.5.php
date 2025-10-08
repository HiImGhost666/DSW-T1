<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $contador = 1;
    $limite = 5;


    while($contador <= $limite){
        if($contador == $limite){
            echo '<p id="ultimoNumero">' . $contador . '</p>';
        } else{
            echo '<p>' . $contador . '</p>';
        }

        $contador++;
        
    }
    ?>
</body>
</html>