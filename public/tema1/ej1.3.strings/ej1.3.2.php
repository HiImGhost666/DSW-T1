<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $frase = " PHP es un lenguaje muy potente ";

    $frase = trim($frase);
    echo ('<p id="fraseSinEspacios">' . $frase . '</p>');

    $frase = strtoupper($frase);
    echo ('<p id="fraseMayusculas">' . $frase . '</p>');

    $subcadena = substr($frase, 9, 9);
    echo('<p id="subcadenaExtraida">' . $subcadena . '</p>');



    ?>
</body>
</html>