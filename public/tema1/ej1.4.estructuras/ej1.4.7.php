<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        for($fila = 1; $fila <=3; $fila++){
            echo '<p>';
            for($columna = 1; $columna <= 3; $columna++){
                echo '* ';
            }
        }

        echo '</p>'
    ?>
</body>
</html>