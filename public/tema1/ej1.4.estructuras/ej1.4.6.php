<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    for($contador = 1; $contador <=10; $contador++){
        if($contador % 2 === 0){
            if($contador == 6){
                echo '<p id="numeroCentral">' . $contador . '</p>';
            } else{
                echo '<p>' . $contador . '</p>';
            }
        }

    }

    ?>
</body>
</html>