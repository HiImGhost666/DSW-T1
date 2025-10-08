<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $bill = [
    ['Ron Zacapa 23', 59.99, 2],
    ['Chivas Regal 18', 65, 1],
    ['Glenfiddich 12', 45.55, 3],
    ['Johnnie Walker Blue Label', 180, 1],
    ['Macallan 18', 250, 1],
    ['Jameson Irish Whiskey', 29.9, 4],
    ['Hennessy VS', 40, 2],
    ['Patrón Silver Tequila', 50.1, 2],
    ['Grey Goose Vodka', 55.00, 1],
    ['Baileys Irish Cream', 25.00, 3],
    ['Estrella de Galicia', .7, 24],
    ];

    $total = 0;

        echo "<table border='1'>";
        echo "<tr>
                <th>Artículo</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Coste</th>
            </tr>";
        foreach($bill as $item){
            $articulo = $item[0];
            $precio = number_format($item[1],2) . '€';
            $cantidad = str_pad($item[2], 2, "0", STR_PAD_LEFT);
            $coste = $item[1] * $item[2];

            $total += $coste;
        echo "<tr>
            <td>$articulo</td>
            <td>$precio</td>
            <td>$cantidad</td>
            <td>" . number_format($coste, 2) . "</td>
            </tr>";

        }

        echo "<tr>
        <td colspan='3'><b>Total</b></td>
        <td><b>" . number_format($total, 2) . " €</b></td>
      </tr>";

    echo "</table>";
    ?>
</body>
</html>