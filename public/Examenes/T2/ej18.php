<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
// Ejemplo GET: Filtrar catálogo por categoría
$productos = [
  ["titulo"=>"Knight’s Quest", "categoria"=>"RPG", "precio"=>59.99],
  ["titulo"=>"Speed Racer", "categoria"=>"Racing", "precio"=>39.99],
  ["titulo"=>"Farm Life", "categoria"=>"Simulación", "precio"=>29.99],
  ["titulo"=>"Mage Wars", "categoria"=>"RPG", "precio"=>49.99],
];

$categoria = $_GET['categoria'] ?? '';
echo "<h2>Filtro seleccionado: " . htmlspecialchars($categoria ?: '— Ninguno —') . "</h2>";
foreach ($productos as $p) {
    if ($categoria && stripos($p['categoria'], $categoria) === false) continue;
    echo htmlspecialchars($p['titulo']) . " - " . htmlspecialchars($p['categoria']) . " - " . number_format($p['precio'],2) . "€<br>";
}
?>
</body>
</html>