<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $producto = [
        "manzana" => 1.5,
        "plátano" => 0.75,
        "naranja" => 1.2,
        "fresa" => 2
    ];

    echo '<table border = "1">';
    // Cabecera de la tabla
    echo '<thead>';
    echo '<tr>';
    echo '<th>Producto</th>';
    echo '<th>Precio</th>';
    echo '</tr>';
    echo '</thead>';

    // Cuerpo de la tabla
    echo '<tbody>';
    foreach($producto as $nombre => $precio){
        echo '<tr>';
        echo '<td>' . $nombre . '</td>';
        echo '<td>';
        printf("%.2f€", $precio);
        echo '</td>';
        echo '</tr>';
    }
    echo '</tbody>';

    echo '</table>';
    ?>
</body>
</html>