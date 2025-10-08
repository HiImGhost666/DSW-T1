<?php
// Ejercicio 25 - Buscar y actualizar precio de un producto
$tienda = [
  ["nombre" => "Portátil", "precio" => 800],
  ["nombre" => "Ratón", "precio" => 20],
  ["nombre" => "Teclado", "precio" => 45]
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"] ?? '';
    $nuevo = floatval($_POST["precio"] ?? 0);

    foreach ($tienda as &$t) {
        if ($t["nombre"] === $nombre) {
            $t["precio"] = $nuevo;
        }
    }
    unset($t);
}
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Ej25 - Actualizar Precio</title></head><body>

<form method="POST">
  Producto:
  <select name="nombre">
    <?php foreach ($tienda as $t) echo "<option>" . htmlspecialchars($t['nombre']) . "</option>"; ?>
  </select><br>
  Nuevo precio: <input name="precio" type="number" step="0.01"><br>
  <button>Actualizar</button>
</form>

<h3>Productos actuales:</h3>
<?php foreach ($tienda as $t) echo htmlspecialchars($t['nombre']) . " - " . number_format($t['precio'],2) . "€<br>"; ?>
</body></html>
