<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
// Ejemplo GET: eliminar usando session (demo)
session_start();
if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [
        ["id"=>1,"nombre"=>"Silla"],
        ["id"=>2,"nombre"=>"Mesa"],
        ["id"=>3,"nombre"=>"Lámpara"]
    ];
}
$action = $_GET['action'] ?? '';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($action === 'delete' && $id) {
    foreach ($_SESSION['productos'] as $k => $p) {
        if ($p['id'] === $id) {
            unset($_SESSION['productos'][$k]);
            $_SESSION['productos'] = array_values($_SESSION['productos']);
            $mensaje = "Producto eliminado correctamente.";
            break;
        }
    }
}
echo "<h3>" . htmlspecialchars($mensaje ?? '') . "</h3>";
echo "<h2>Lista de productos:</h2>";
foreach ($_SESSION['productos'] as $p) {
    echo intval($p['id']) . ". " . htmlspecialchars($p['nombre']) . " <a href='?action=delete&id=" . intval($p['id']) . "'>Eliminar</a><br>";
}
?>
</body>
</html>