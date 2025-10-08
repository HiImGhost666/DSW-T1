<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $numeros = [10,20,30,40,50];

    echo "<div>Array construido:<pre>";
    print_r($numeros);
    echo "</pre></div>";    
    
    echo "<div>Elementos en un listado ordenado: <ol>";
    for($i = 0; $i < count($numeros); $i++){
        echo "<li>" . $numeros[$i] . "</li>";
    }
    echo "</ol></div>";

    $numeros[] = 60;

    echo "<div>Añadiendo el numero 60 al final:<pre>";
    print_r($numeros);
    echo "</pre></div>";


    echo "<div>Dividiendo cada elemento entre 5:";
    for($i = 0; $i < count($numeros); $i++){
        $numeros[$i] = $numeros[$i] / 5;
    }
    echo "</div>";

 echo "<div>Array construido:<pre>";
    print_r($numeros);
    echo "</pre></div>"; 
    
    ?>
</body>
</html>