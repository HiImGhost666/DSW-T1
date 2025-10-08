<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $frutas = ["Manzana", "Plátano", "Naranja", "Fresa", "Uva"];

    echo '<div>'; 
    var_dump($frutas);
    echo '</div>';

    echo '<div>' . $frutas[2] . '</div>';

    $frutas[] = "Mango";

    echo '<div>';
    var_dump($frutas);
    echo '</div>';

    unset($frutas[1]);
    echo '<div>';
    var_dump($frutas);
    echo '</div>';

    $frutas[0] = "Pera";

    echo '<div>';
    var_dump($frutas);
    echo '</div>';


    ?>
</body>
</html>