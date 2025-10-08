<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include_once '../ej1.8.modulacion/datos_array.php';
        //Buscar ID mediante indice
        if(isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            if(array_key_exists($id, $datos)) {
                $persona = $datos[$id];
                echo "<h1>Datos de la persona con ID $id</h1>";
                echo "<ul>";
                echo "<li>Nombre: " . htmlspecialchars($persona['nombre']) . "</li>";
                echo "<li>Apellido: " . htmlspecialchars($persona['apellido']) . "</li>";
                echo "<li>Edad: " . (int)$persona['edad'] . "</li>";
                echo "<li>Ciudad: " . htmlspecialchars($persona['ciudad']) . "</li>";
                echo "</ul>";
            } else {
                echo "<h1>ID no encontrado.</h1>";
            }
        } else {
            echo "<h1>Por favor, proporciona un ID en la URL.</h1>";
            echo "<p>Ejemplo: ?id=2</p>";
        }

    ?>
</body>
</html>