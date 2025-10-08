<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $cadenaFrutas = "Manzana,Plátano,Naranja,Fresa,Uva";
    
    echo "<div>Cadena original:<br>$cadenaFrutas</div>";

    $frutas = explode(",", $cadenaFrutas);
    echo "<div>Array resultante de explode:<pre>";
    print_r($frutas);
    echo "</pre></div>";

    $cadenaGuiones = implode("-", $frutas);
    echo "<div>Nueva cadena con implode:<br>$cadenaGuiones</div>";


    unset($frutas[1], $frutas[3]);  
    $frutas = array_values($frutas); 
    $cadenaFinal = implode(" / ", $frutas);

    echo "<div>Cadena final con array modificado:<br>$cadenaFinal</div>";

    ?>
</body>
</html>