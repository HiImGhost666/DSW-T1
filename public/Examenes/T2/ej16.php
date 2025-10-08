<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
// Ejemplo GET: detalle por id
$animales = [
  1 => ["nombre"=>"León","habitat"=>"Sabana"],
  2 => ["nombre"=>"Delfín","habitat"=>"Océano"],
  3 => ["nombre"=>"Búho","habitat"=>"Bosque"]
];
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id && isset($animales[$id])) {
    $a = $animales[$id];
    echo "<h2>" . htmlspecialchars($a['nombre']) . "</h2>";
    echo "<p>Hábitat: " . htmlspecialchars($a['habitat']) . "</p>";
} else {
    echo "Animal no encontrado.";
}
?>
</body>
</html>