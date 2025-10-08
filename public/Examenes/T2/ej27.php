<?php
// Ejercicio 27 - Fusionar arrays de libros
$librosA = ["1984", "El Principito", "Fahrenheit 451"];
$librosB = ["It", "El Resplandor", "Misery"];

$librosTotales = array_merge($librosA, $librosB);
sort($librosTotales);
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Ej27 - Libros</title></head><body>

<h3>Lista completa de libros:</h3>
<?php foreach ($librosTotales as $l) echo "- " . htmlspecialchars($l) . "<br>"; ?>
</body></html>
