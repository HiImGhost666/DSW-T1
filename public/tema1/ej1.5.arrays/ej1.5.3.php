<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $ciudades = ["Madrid", "Barcelona", "Sevilla", "Valencia", "Bilbao"];

    echo '<div>Número de elementos: ' . count($ciudades) . '</div>';
    
    array_pop($ciudades);
    echo "<div>Array después de eliminar el último elemento:<pre>";
    print_r($ciudades);
    echo "</pre></div>";

    $ciudades[] = "Zaragoza";
    echo "<div>Array después de añador 'Zaragoza' al final:<pre>";
    print_r($ciudades);
    echo "</pre></div>";

    array_shift($ciudades);
    echo "<div>Array después de eliminar el primer elemento:<pre>";
    print_r($ciudades);
    echo "</pre></div>";

    array_unshift($ciudades, "Málaga");
    echo "<div>Array después de añadir 'Málaga' al principio:<pre>";
    print_r($ciudades);
    echo "</pre></div>";
    ?>
</body>
</html>