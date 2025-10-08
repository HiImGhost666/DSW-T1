<?php
// Ejercicio 26 - Añadir comentario en una lista existente
$comentarios = ["Muy buena atención", "Comida deliciosa", "Servicio rápido"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nuevo = trim($_POST["comentario"] ?? '');
    if ($nuevo) $comentarios[] = $nuevo;
}
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Ej26 - Comentarios</title></head><body>

<form method="POST">
  Nuevo comentario:<br>
  <textarea name="comentario"></textarea><br>
  <button>Enviar</button>
</form>

<h3>Comentarios:</h3>
<?php foreach ($comentarios as $c) echo "- " . htmlspecialchars($c) . "<br>"; ?>
</body></html>
