<?php
// Ejercicio 29 - Reemplazar valores dentro de un array
$productos = [
  "producto1" => "Camiseta",
  "producto2" => "Pantalón",
  "producto3" => "Gorra"
];

$actualizacion = [
  "producto2" => "Sudadera",
  "producto3" => "Bufanda"
];

$productosActualizados = array_replace($productos, $actualizacion);
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Ej29 - Reemplazar</title></head><body>

<h3>Productos actualizados:</h3>
<?php foreach ($productosActualizados as $p) echo "- " . htmlspecialchars($p) . "<br>"; ?>
</body></html>
