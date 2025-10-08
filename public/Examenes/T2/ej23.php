<?php
// Ejercicio 23 - Agregar animales a un zoo existente
$zoo = [
  ["nombre" => "León", "zona" => "Sabana"],
  ["nombre" => "Pingüino", "zona" => "Ártico"]
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nuevo = [
        "nombre" => trim($_POST["nombre"] ?? ''),
        "zona" => trim($_POST["zona"] ?? '')
    ];
    if ($nuevo["nombre"]) $zoo[] = $nuevo;
}
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Ej23 - Zoo</title></head><body>

<form method="POST">
  Nombre: <input name="nombre"><br>
  Zona: <input name="zona"><br>
  <button>Registrar animal</button>
</form>

<h3>Animales del zoológico:</h3>
<?php
foreach ($zoo as $a) {
    echo htmlspecialchars($a['nombre']) . " - Zona: " . htmlspecialchars($a['zona']) . "<br>";
}
?>
</body></html>
