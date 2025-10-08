<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
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
echo "<h3>" . ($mensaje ?? '') . "</h3>";
echo "<h2>Lista de productos:</h2>";
foreach ($_SESSION['productos'] as $p) {
    echo "{$p['id']}. {$p['nombre']} <a href='?action=delete&id={$p['id']}'>Eliminar</a><br>";
}
?>
</body>
</html>