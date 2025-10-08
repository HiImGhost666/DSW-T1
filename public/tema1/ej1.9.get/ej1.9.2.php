<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numeros entre inicio y fin</title>
</head>
<body>
    <?php
    if (isset($_GET['inicio']) && isset($_GET['fin'])) {
        $inicio = (int)$_GET['inicio'];
        $fin = (int)$_GET['fin'];
        
        echo '<ol>';
        for ($i = $inicio; $i <= $fin; $i++) {
            echo "<li>$i</li>";
        }
        echo '</ol>';
    } else {
        echo "<h1>Por favor, proporciona los valores de inicio y fin en la URL.</h1>";
        echo "<p>Ejemplo: ?inicio=3&fin=10</p>";
    }
    ?>
</body>
</html>
