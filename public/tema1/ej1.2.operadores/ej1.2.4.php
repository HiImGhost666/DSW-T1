<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $valorA = "10";
    $valorB = 10;

    echo '<p>Comparación estrica igual: <span id="comparacionEstrictaIgual">' . (($valorA === $valorB) ? 'true' : 'false') . '</span> </p>';
    echo '<p>Comparación estrica diferente: <span id="comparacionEstrictaDiferente">' . (($valorA !== $valorB) ? 'true' : 'false') . '</span> </p>';
    echo '<p>valorA es igual a valorB y valorA es un string: <span id="logicoAnd">' . (($valorA == $valorB) && (is_string($valorA)) ? 'true' : 'false') . '</span> </p>';
    echo '<p>valor A es un entero o valorB es un string: <span id="logicoOr">' . ((is_int($valorA)) || (is_string($valorB)) ? 'true' : 'false') . '</span> </p>';

    ?>
</body>
</html>