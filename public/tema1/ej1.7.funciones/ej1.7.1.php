<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    saludar("Juan");
    saludar("");
    
    function saludar($nombre){

        if(!empty($nombre)){
            echo '<h1>¡Hola, ' . $nombre . '!</h1>';
        }else{
            $nombre = "Invitado";
            echo '<h1>¡Hola, ' . $nombre . '!</h1>';
        }
    }
    ?>
</body>
</html>