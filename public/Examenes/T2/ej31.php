<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 31 - Registro de Libros</title>
</head>
<body>
<h1>📚 Registro de Libros</h1>

<?php
session_start();

// Si no existe el array en sesión, lo creamos
if (!isset($_SESSION['libros'])) {
    $_SESSION['libros'] = [
        ["titulo"=>"1984","autor"=>"George Orwell","categoria"=>"Ficción"],
        ["titulo"=>"Sapiens","autor"=>"Yuval Noah Harari","categoria"=>"Historia"],
        ["titulo"=>"Clean Code","autor"=>"Robert C. Martin","categoria"=>"Programación"]
    ];
}

// Añadir libro por POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titulo = trim($_POST["titulo"] ?? '');
    $autor = trim($_POST["autor"] ?? '');
    $categoria = trim($_POST["categoria"] ?? '');
    
    if ($titulo && $autor && $categoria) {
        $_SESSION['libros'][] = ["titulo"=>$titulo, "autor"=>$autor, "categoria"=>$categoria];
        echo "<p style='color:green;'>Libro añadido correctamente ✅</p>";
    } else {
        echo "<p style='color:red;'>Por favor, completa todos los campos.</p>";
    }
}

// Filtro por GET
$filtro = $_GET["categoria"] ?? "";
?>

<h3>Añadir nuevo libro</h3>
<form method="POST">
    Título: <input name="titulo" required><br>
    Autor: <input name="autor" required><br>
    Categoría: 
    <select name="categoria" required>
        <option value="">Selecciona...</option>
        <option>Ficción</option>
        <option>Historia</option>
        <option>Programación</option>
        <option>Ciencia</option>
    </select>
    <br><button>Guardar libro</button>
</form>

<hr>

<h3>Filtrar por categoría</h3>
<form method="GET">
    <select name="categoria">
        <option value="">Todas</option>
        <option value="Ficción" <?= $filtro=="Ficción"?"selected":"" ?>>Ficción</option>
        <option value="Historia" <?= $filtro=="Historia"?"selected":"" ?>>Historia</option>
        <option value="Programación" <?= $filtro=="Programación"?"selected":"" ?>>Programación</option>
        <option value="Ciencia" <?= $filtro=="Ciencia"?"selected":"" ?>>Ciencia</option>
    </select>
    <button>Filtrar</button>
</form>

<h2>Lista de libros</h2>
<table border="1" cellpadding="6">
<tr><th>Título</th><th>Autor</th><th>Categoría</th></tr>
<?php
foreach ($_SESSION['libros'] as $libro) {
    if ($filtro && $libro['categoria'] !== $filtro) continue;
    echo "<tr>
            <td>".htmlspecialchars($libro['titulo'])."</td>
            <td>".htmlspecialchars($libro['autor'])."</td>
            <td>".htmlspecialchars($libro['categoria'])."</td>
          </tr>";
}
?>
</table>

<hr>
<a href="?reset=1">🔄 Resetear datos</a>
<?php
if (isset($_GET["reset"])) {
    unset($_SESSION["libros"]);
    echo "<p>Sesión reiniciada.</p>";
}
?>
</body>
</html>
