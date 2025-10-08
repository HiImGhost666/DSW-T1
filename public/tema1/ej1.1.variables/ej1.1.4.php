<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $entero = 10;
    $flotante = 10.5;
    $cadena = "PHP";
    $booleano = true;

    echo "<ul>";
    echo '<li>Valor: ' . $entero . ', Tipo: ' . gettype($entero) . '</li>';
    echo '<li>Valor: ' . $flotante . ', Tipo: ' . gettype($flotante) . '</li>';
    echo '<li>Valor: ' . $cadena . ', Tipo: ' . gettype($cadena) . '</li>';
    echo '<li>Valor: ' . $booleano . ', Tipo: ' . gettype($booleano) . '</li>';
    echo "</ul>";
    ?>
</body>
</html>