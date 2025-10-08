<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $numerosMultidimensional = [];
    

    $contador = 1;

    for($fila = 0; $fila < 16; $fila++){
        for($col = 0; $col < 10; $col++){
            $numerosMultidimensional[$fila][$col] = $contador;
            $contador++;
        }
    }


    echo '<pre>';
    print_r($numerosMultidimensional);
    echo '</pre>';


    echo '<table border = "1">';
    foreach($numerosMultidimensional as $fila){
        echo '<tr>';
        foreach($fila as $num){
            echo '<td>' . $num . '</td>';
        }
        echo '</tr>';
    }

    echo '</table>';
    ?>
</body>
</html>