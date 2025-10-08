<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php


invertirCadena("hola");
    function invertirCadena($cadena){

        $invertida = strrev($cadena);
        
        echo '<p>La cadena original es: '. $cadena . '</p>';
        echo '<p>La cadena invertida es: '. $invertida . '</p>';
    }
    ?>
</body>
</html>