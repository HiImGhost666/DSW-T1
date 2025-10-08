<?php
// Ejercicio 28 - Insertar elemento en una posición específica
$colores = ["Rojo", "Verde", "Azul", "Negro"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $color = trim($_POST["color"] ?? '');
    $pos = intval($_POST["pos"] ?? 0);
    array_splice($colores, $pos, 0, $color);
}
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Ej28 - Insertar Color</title></head><body>

<form method="POST">
  Color: <input name="color">
  Posición (0-<?php echo count($colores); ?>): <input name="pos" type="number"><br>
  <button>Insertar</button>
</form>

<h3>Colores actuales:</h3>
<?php foreach ($colores as $i => $c) echo $i . ". " . htmlspecialchars($c) . "<br>"; ?>
</body></html>
