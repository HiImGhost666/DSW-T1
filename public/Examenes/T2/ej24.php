<?php
// Ejercicio 24 - Eliminar producto de una lista por índice
$productos = ["Silla", "Mesa", "Lámpara", "Sofá"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $indice = intval($_POST["indice"] ?? -1);
    if (isset($productos[$indice])) {
        unset($productos[$indice]);
        $productos = array_values($productos);
    }
}
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Ej24 - Eliminar Índice</title></head><body>

<form method="POST">
  Número de producto a eliminar (0 a <?php echo count($productos)-1; ?>): 
  <input name="indice" type="number"><br>
  <button>Eliminar</button>
</form>

<h3>Lista actual:</h3>
<?php foreach ($productos as $i => $p) echo $i . ". " . htmlspecialchars($p) . "<br>"; ?>
</body></html>
