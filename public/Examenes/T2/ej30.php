<?php
// Ejercicio 30 - Copiar y eliminar elementos específicos (pares)
$numeros = [2, 5, 8, 11, 14, 17];
$pares = [];

foreach ($numeros as $n) {
    if ($n % 2 == 0) {
        $pares[] = $n;
    }
}
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Ej30 - Números Pares</title></head><body>

<h3>Números pares encontrados:</h3>
<?php foreach ($pares as $p) echo "- " . htmlspecialchars($p) . "<br>"; ?>
</body></html>
