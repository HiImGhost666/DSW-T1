<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $contador = 5;
    $pre_incremento = ++$contador;

    echo('<p>Valor de $pre_incremento: ' . $pre_incremento . ', Valor de $contador: ' . $contador . '</p>');

    $contador = 5;
    $post_incremento = $contador++;
    echo('<p>Valor de $post_incremento: ' . $post_incremento . ', Valor de $contador: ' . $contador . '</p>');

    $a = 10;
    $b = 3;

    $resultado_precedencia = $a + $b * 2;
    
    echo("<p>Resultado de la precedencia: " . $resultado_precedencia . '</p>');

    $resultado_parentesis = ($a + $b) * 2;
    echo("<p>Resultado con paréntesis: " . $resultado_parentesis . '</p>');

    ?>
</body>
</html>