<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once '../ej1.8.modulacion/datos_array.php';
        
        //Mostrar listado de nombres con enlaces y al hacer clic mostrar detalles
        echo "<h1>Listado de personas</h1>";
        echo "<ul>";
        foreach ($datos as $id => $persona) {
            $nombre = htmlspecialchars($persona['nombre']);
            echo "<li><a href=\"?id=$id\">$nombre</a></li>";
        }
        echo "</ul>";
        
        if(isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            if(array_key_exists($id, $datos)) {
                $persona = $datos[$id];
                echo "<h2>Detalles de la persona con ID $id</h2>";
                echo "<ul>";
                echo "<li>Nombre: " . htmlspecialchars($persona['nombre']) . "</li>";
                echo "<li>Apellido: " . htmlspecialchars($persona['apellido']) . "</li>";
                echo "<li>Edad: " . (int)$persona['edad'] . "</li>";
                echo "<li>Ciudad: " . htmlspecialchars($persona['ciudad']) . "</li>";
                echo "</ul>";
            } else {
                echo "<h2>ID no encontrado.</h2>";
            }
        } else {
            echo "<h2>Por favor, selecciona una persona haciendo clic en su nombre.</h2>";
        }
    ?>
</body>
</html>