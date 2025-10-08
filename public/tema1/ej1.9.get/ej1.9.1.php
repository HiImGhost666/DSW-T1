<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    //Propociona tu nombre y edad en la URL asi localhost8080:/tema1/ej1.9.get/ej1.9.1.php?nombre=Juan
    if (isset($_GET['nombre'])) {
        $nombre = htmlspecialchars($_GET['nombre']);
        echo "<h1>Hola, $nombre.</h1>";
    } else {
        echo "<h1>Por favor, proporciona tu nombre en la URL.</h1>";
    }
    ?>
</body>
</html>