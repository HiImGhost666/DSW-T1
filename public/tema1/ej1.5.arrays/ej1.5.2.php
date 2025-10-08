<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $alumno = [
        "nombre" => "Ana",
        "apellido" => "García",
        "edad" => 20,
        "curso" => "Programación Web"
    ];

    echo '<pre>';
    print_r($alumno);
    echo '</pre>';

    echo '<pre>';
    print_r($alumno["nombre"]);
    echo '</pre>';


    $alumno["email"]  = "ana.garcia@example.com";
    
    echo '<pre>';
    print_r($alumno);
    echo '</pre>';
    

    $alumno["edad"] = 21;
    echo '<pre>';
    print_r($alumno);
    echo '</pre>';

    unset($alumno["curso"]);
    echo '<pre>';
    print_r($alumno);
    echo '</pre>';

    ?>
</body>
</html>