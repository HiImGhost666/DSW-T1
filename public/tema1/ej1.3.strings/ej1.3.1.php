<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $producto = "Libro de PHP";
    $precio = 25.99;

    $mensajeProducto = "El producto " . $producto . " tiene un precio de " . $precio . " €.";

    echo('<p id="infoProducto">' . $mensajeProducto . '</p>')

    ?>
</body>
</html>