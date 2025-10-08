<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Ejercicio 33 - Catálogo con orden y filtro</title>
</head>
<body>
<h1>🛒 Catálogo de Productos</h1>

<?php
$productos = [
  "p1" => ["nombre"=>"Teclado Mecánico", "precio"=>59.99, "categoria"=>"Periféricos"],
  "p2" => ["nombre"=>"Monitor 24''", "precio"=>149.99, "categoria"=>"Pantallas"],
  "p3" => ["nombre"=>"Ratón Gamer", "precio"=>39.99, "categoria"=>"Periféricos"],
  "p4" => ["nombre"=>"SSD 1TB", "precio"=>89.50, "categoria"=>"Almacenamiento"]
];

$filtro = $_GET['categoria'] ?? '';
$orden = $_GET['orden'] ?? '';

if ($orden == 'precio_asc') {
  uasort($productos, fn($a,$b) => $a['precio'] <=> $b['precio']);
} elseif ($orden == 'precio_desc') {
  uasort($productos, fn($a,$b) => $b['precio'] <=> $a['precio']);
}
?>

<form method="GET">
  Categoría:
  <select name="categoria">
    <option value="">Todas</option>
    <option <?= $filtro=='Periféricos'?'selected':'' ?>>Periféricos</option>
    <option <?= $filtro=='Pantallas'?'selected':'' ?>>Pantallas</option>
    <option <?= $filtro=='Almacenamiento'?'selected':'' ?>>Almacenamiento</option>
  </select>

  Ordenar por:
  <select name="orden">
    <option value="">Sin orden</option>
    <option value="precio_asc" <?= $orden=='precio_asc'?'selected':'' ?>>Precio ascendente</option>
    <option value="precio_desc" <?= $orden=='precio_desc'?'selected':'' ?>>Precio descendente</option>
  </select>
  <button>Filtrar</button>
</form>

<table border="1" cellpadding="5">
<tr><th>Nombre</th><th>Categoría</th><th>Precio (€)</th></tr>

<?php
foreach ($productos as $id => $p) {
  if ($filtro && $p['categoria'] != $filtro) continue;
  echo "<tr><td>{$p['nombre']}</td><td>{$p['categoria']}</td><td>{$p['precio']}</td></tr>";
}
?>
</table>
</body>
</html>
