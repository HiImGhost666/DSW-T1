<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $textoOriginal = "El perro corre por el parque y el perro ladra.";

    $longitudText = strlen($textoOriginal);

    $textoModificado = str_replace("perro", "gato", $textoOriginal);

    echo('<p>La longitud original del texto es: <span id="longitudOriginal">' . $longitudText . '</span></p>');
    echo('<p id="textoReemplazado">' . $textoModificado . '</p>');
    ?>
</body>
</html>