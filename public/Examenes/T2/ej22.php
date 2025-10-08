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
if (!isset($_SESSION['usuarios'])) {
    $_SESSION['usuarios'] = [
        ["id"=>1,"nombre"=>"Ana","email"=>"ana@example.com"],
        ["id"=>2,"nombre"=>"Luis","email"=>"luis@example.com"]
    ];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    foreach ($_SESSION['usuarios'] as &$u) {
        if ($u['id'] === $id) {
            $u['nombre'] = trim($_POST['nombre']);
            $u['email'] = trim($_POST['email']);
            $msg = "Usuario actualizado.";
            break;
        }
    }
    unset($u);
}
if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    foreach ($_SESSION['usuarios'] as $u) {
        if ($u['id'] === $id) {
            $pref = $u;
            break;
        }
    }
}
if (isset($pref)) {
    echo "<h2>Editar usuario</h2>";
    echo "<form method='POST'>";
    echo "<input type='hidden' name='id' value='{$pref['id']}'>";
    echo "Nombre: <input name='nombre' value='{$pref['nombre']}'><br>";
    echo "Email: <input name='email' value='{$pref['email']}'><br>";
    echo "<button>Guardar</button>";
    echo "</form>";
} else {
    echo "<h3>" . ($msg ?? '') . "</h3>";
    echo "<h2>Usuarios disponibles:</h2>";
    foreach ($_SESSION['usuarios'] as $u) {
        echo "{$u['id']}. {$u['nombre']} (<a href='?action=edit&id={$u['id']}'>Editar</a>)<br>";
    }
}
?>
</body>
</html>