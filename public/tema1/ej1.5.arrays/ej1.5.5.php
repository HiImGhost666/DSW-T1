<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $colores = ["Rojo", "Verde", "Azul", "Amarillo", "Naranja"];

    echo "<div>Array original:<pre>";
    print_r($colores);
    echo "</pre></div>";

    array_splice($colores,2,1);
    echo "<div>Array después de eliminar 'Azul':<pre>";
    print_r($colores);
    echo "</pre></div>";

    array_splice($colores,2,0,["Violeta", "Blanco"]);
    echo "<div>Array después de insertar 'Violeta' y 'Blanco':<pre>";
    print_r($colores);
    echo "</pre></div>";

    array_splice($colores, 1,4,"Marrón");
    echo "<div>Array después de reemplazar desde 'Verde' hasta 'Amarillo' por 'Marrón':<pre>";
    print_r($colores);
    echo "</pre></div>";
    ?>
</body>
</html>