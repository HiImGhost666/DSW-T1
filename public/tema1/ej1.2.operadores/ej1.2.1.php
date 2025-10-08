<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $numero_string = "100";
    $numero_entero = 25;
    $resultado_suma = $numero_string + $numero_entero;

    echo('<p>Resultado de la suma: ' . $resultado_suma . ", Tipo: " . gettype($resultado_suma) . '</p>');

    $resultado_concat = $numero_string . $numero_entero;
    echo('<p>Resultado de la concatenación: ' . $resultado_concat . ", Tipo: " . gettype($resultado_concat) . '</p>');
    ?>
</body>
</html>