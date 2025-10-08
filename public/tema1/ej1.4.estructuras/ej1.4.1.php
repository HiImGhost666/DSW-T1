<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $edad = 18;

    if($edad >= 18){
        $mensajeAcceso = "Acceso permitido.";
    } 

    echo('<p id="estadoAcceso">' . $mensajeAcceso . '</p>');
    ?>
</body>
</html>