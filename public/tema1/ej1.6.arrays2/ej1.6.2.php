<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $productos = [
        "manzana" => 1.5,
        "plátano" => 0.75,
        "naranja" => 1.2,
        "fresa" => 2
    ];

    echo "<div>Array:<pre>";
    print_r($productos);
    echo "</pre></div>"; 


    $productos["aguacate"] = 5.99;
    echo "<div>Array:<pre>";
    print_r($productos);
    echo "</pre></div>"; 

    $productos["plátano"] = 1.75;

    echo "<div>Array:<pre>";
    print_r($productos);
    echo "</pre></div>"; 

    echo "<ul>";

    foreach($productos as $producto => $precio){
        printf("<li>%s: %.2f€</li>", $producto, $precio);
    }
    echo "</ul>";
    
    ?>
</body>
</html>