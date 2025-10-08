<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Ejercicio 32 - Gestión de Alumnos</title>
</head>
<body>
<h1>🎓 Gestión de Alumnos</h1>

<?php
session_start();

if (!isset($_SESSION['alumnos'])) {
  $_SESSION['alumnos'] = [
    ["nombre"=>"Lucía","nota"=>8.5,"curso"=>"DAW1"],
    ["nombre"=>"Carlos","nota"=>6.7,"curso"=>"DAW1"],
    ["nombre"=>"Marta","nota"=>9.3,"curso"=>"DAW2"]
  ];
}

// Añadir alumno
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nombre = trim($_POST["nombre"] ?? '');
  $nota = floatval($_POST["nota"] ?? 0);
  $curso = trim($_POST["curso"] ?? '');

  if ($nombre && $curso && $nota >= 0 && $nota <= 10) {
    $_SESSION['alumnos'][] = ["nombre"=>$nombre,"nota"=>$nota,"curso"=>$curso];
    echo "<p style='color:green'>Alumno añadido correctamente ✅</p>";
  } else {
    echo "<p style='color:red'>Introduce datos válidos.</p>";
  }
}

$filtro = $_GET["curso"] ?? "";
?>

<form method="POST">
  <h3>Agregar alumno</h3>
  Nombre: <input name="nombre" required><br>
  Nota: <input type="number" name="nota" min="0" max="10" step="0.1" required><br>
  Curso:
  <select name="curso" required>
    <option>DAW1</option>
    <option>DAW2</option>
  </select>
  <button>Guardar</button>
</form>

<hr>

<form method="GET">
  <h3>Filtrar por curso</h3>
  <select name="curso">
    <option value="">Todos</option>
    <option value="DAW1" <?= $filtro=="DAW1"?"selected":"" ?>>DAW1</option>
    <option value="DAW2" <?= $filtro=="DAW2"?"selected":"" ?>>DAW2</option>
  </select>
  <button>Filtrar</button>
</form>

<h2>Listado de alumnos</h2>
<table border="1" cellpadding="5">
<tr><th>Nombre</th><th>Nota</th><th>Curso</th></tr>

<?php
$total = 0; $count = 0;
foreach ($_SESSION['alumnos'] as $a) {
  if ($filtro && $a['curso'] != $filtro) continue;
  echo "<tr><td>{$a['nombre']}</td><td>{$a['nota']}</td><td>{$a['curso']}</td></tr>";
  $total += $a['nota']; $count++;
}
$promedio = $count ? round($total / $count, 2) : 0;
?>
</table>
<p><b>Promedio del grupo: <?= $promedio ?></b></p>
</body>
</html>
