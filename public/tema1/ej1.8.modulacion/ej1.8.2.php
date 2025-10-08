<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
    include "cabecera.php";
    require "datos_array.php";
    require "tablaUtils.php";

    echo generarTabla($datos);

    include "pie_pagina.php";
    ?>
</body>
</html>