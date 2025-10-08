<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $animales = ["Perro", "Gato", "Pájaro", "Hamster", "Pez", "Serpiente", "Tortuga"];


    echo "<div>Array completo:<pre>";
    print_r($animales);
    echo "</pre></div>";

    $sub_array = array_slice($animales, 2, 3);
    echo "<div>Sub-array desde la posición 2 hasta la 4:<pre>";
    print_r($sub_array);
    echo "</pre></div>";

    $sub_array2 = array_slice($animales, -3);
    echo "<div>Últimos 3 elementos:<pre>";
    print_r($sub_array2);
    echo "</pre></div>";

    $sub_array3 = array_slice($animales,1,2,true);
    echo "<div>2 elementos desde la posición 1 (manteniendo claves):<pre>";
    print_r($sub_array3);
    echo "</pre></div>";
    ?>
</body>
</html>