<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $temperatura = 25;

        if($temperatura >= 30){
            $estadoClima = "Hace mucho calor.";
        } else{
            $estadoClima = "La temperatura es agradable.";
        }

        echo ('<p id="climaActual">' . $estadoClima . '</p>');
    ?>
</body>
</html>