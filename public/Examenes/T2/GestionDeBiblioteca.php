<?php
// ej1.9.5.php - Sistema de Gestión de Biblioteca
session_start();

// Inicializar biblioteca si no existe
if (!isset($_SESSION['biblioteca'])) {
    $_SESSION['biblioteca'] = [
        'libros' => [
            [
                'id' => 1,
                'titulo' => 'Cien años de soledad',
                'autor' => 'Gabriel García Márquez',
                'genero' => 'Realismo mágico',
                'anio' => 1967,
                'prestado' => false,
                'usuario_prestamo' => null
            ],
            [
                'id' => 2,
                'titulo' => '1984',
                'autor' => 'George Orwell',
                'genero' => 'Distopía',
                'anio' => 1949,
                'prestado' => true,
                'usuario_prestamo' => 'Ana García'
            ]
        ],
        'usuarios' => [
            'admin' => '1234',
            'ana' => 'password',
            'carlos' => 'secure123'
        ]
    ];
}

$biblioteca = &$_SESSION['biblioteca'];

// Funciones de la biblioteca
function buscarLibros($criterio, $valor, $biblioteca) {
    $resultados = [];
    foreach ($biblioteca['libros'] as $libro) {
        if (stripos($libro[$criterio], $valor) !== false) {
            $resultados[] = $libro;
        }
    }
    return $resultados;
}

function prestarLibro($id, $usuario, &$biblioteca) {
    foreach ($biblioteca['libros'] as &$libro) {
        if ($libro['id'] == $id && !$libro['prestado']) {
            $libro['prestado'] = true;
            $libro['usuario_prestamo'] = $usuario;
            return true;
        }
    }
    return false;
}

function devolverLibro($id, &$biblioteca) {
    foreach ($biblioteca['libros'] as &$libro) {
        if ($libro['id'] == $id && $libro['prestado']) {
            $libro['prestado'] = false;
            $libro['usuario_prestamo'] = null;
            return true;
        }
    }
    return false;
}

function agregarLibro($datos, &$biblioteca) {
    $nuevoId = max(array_column($biblioteca['libros'], 'id')) + 1;
    $nuevoLibro = [
        'id' => $nuevoId,
        'titulo' => $datos['titulo'],
        'autor' => $datos['autor'],
        'genero' => $datos['genero'],
        'anio' => (int)$datos['anio'],
        'prestado' => false,
        'usuario_prestamo' => null
    ];
    $biblioteca['libros'][] = $nuevoLibro;
    return $nuevoId;
}

// Procesar formularios
$mensaje = '';
$accion = $_POST['accion'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($accion) {
        case 'buscar':
            $criterio = $_POST['criterio'] ?? 'titulo';
            $valor = $_POST['valor_busqueda'] ?? '';
            $resultados = buscarLibros($criterio, $valor, $biblioteca);
            break;
            
        case 'prestar':
            $id = (int)$_POST['id_libro'];
            $usuario = $_POST['usuario'] ?? '';
            if (prestarLibro($id, $usuario, $biblioteca)) {
                $mensaje = "Libro prestado exitosamente a $usuario";
            } else {
                $mensaje = "Error: No se pudo prestar el libro";
            }
            break;
            
        case 'devolver':
            $id = (int)$_POST['id_libro'];
            if (devolverLibro($id, $biblioteca)) {
                $mensaje = "Libro devuelto exitosamente";
            } else {
                $mensaje = "Error: No se pudo devolver el libro";
            }
            break;
            
        case 'agregar':
            $nuevoId = agregarLibro($_POST, $biblioteca);
            $mensaje = "Libro agregado exitosamente con ID: $nuevoId";
            break;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Biblioteca</title>
    <style>
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        .section { margin: 20px 0; padding: 15px; border: 1px solid #ddd; }
        .libro { padding: 10px; margin: 5px 0; background: #f9f9f9; }
        .prestado { background: #ffe6e6; }
        .form-group { margin: 10px 0; }
        label { display: inline-block; width: 150px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>📚 Sistema de Gestión de Biblioteca</h1>
        
        <?php if ($mensaje): ?>
            <div style="color: green; padding: 10px; background: #e8f5e8;"><?= $mensaje ?></div>
        <?php endif; ?>

        <!-- Búsqueda de libros -->
        <div class="section">
            <h2>🔍 Buscar Libros</h2>
            <form method="POST">
                <input type="hidden" name="accion" value="buscar">
                <div class="form-group">
                    <label>Buscar por:</label>
                    <select name="criterio">
                        <option value="titulo">Título</option>
                        <option value="autor">Autor</option>
                        <option value="genero">Género</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Valor:</label>
                    <input type="text" name="valor_busqueda" required>
                </div>
                <button type="submit">Buscar</button>
            </form>
            
            <?php if (isset($resultados)): ?>
                <h3>Resultados (<?= count($resultados) ?>)</h3>
                <?php foreach ($resultados as $libro): ?>
                    <div class="libro <?= $libro['prestado'] ? 'prestado' : '' ?>">
                        <strong><?= $libro['titulo'] ?></strong> - <?= $libro['autor'] ?> (<?= $libro['anio'] ?>)<br>
                        Género: <?= $libro['genero'] ?>
                        <?php if ($libro['prestado']): ?>
                            <br>📌 Prestado a: <?= $libro['usuario_prestamo'] ?>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Gestión de préstamos -->
        <div class="section">
            <h2>📖 Gestión de Préstamos</h2>
            
            <form method="POST" style="display: inline-block; margin-right: 20px;">
                <input type="hidden" name="accion" value="prestar">
                <h3>Prestar Libro</h3>
                <div class="form-group">
                    <label>ID Libro:</label>
                    <input type="number" name="id_libro" required>
                </div>
                <div class="form-group">
                    <label>Usuario:</label>
                    <input type="text" name="usuario" required>
                </div>
                <button type="submit">Prestar Libro</button>
            </form>

            <form method="POST" style="display: inline-block;">
                <input type="hidden" name="accion" value="devolver">
                <h3>Devolver Libro</h3>
                <div class="form-group">
                    <label>ID Libro:</label>
                    <input type="number" name="id_libro" required>
                </div>
                <button type="submit">Devolver Libro</button>
            </form>
        </div>

        <!-- Agregar nuevo libro -->
        <div class="section">
            <h2>➕ Agregar Nuevo Libro</h2>
            <form method="POST">
                <input type="hidden" name="accion" value="agregar">
                <div class="form-group">
                    <label>Título:</label>
                    <input type="text" name="titulo" required>
                </div>
                <div class="form-group">
                    <label>Autor:</label>
                    <input type="text" name="autor" required>
                </div>
                <div class="form-group">
                    <label>Género:</label>
                    <input type="text" name="genero" required>
                </div>
                <div class="form-group">
                    <label>Año:</label>
                    <input type="number" name="anio" required>
                </div>
                <button type="submit">Agregar Libro</button>
            </form>
        </div>

        <!-- Listado completo -->
        <div class="section">
            <h2>📋 Inventario Completo (<?= count($biblioteca['libros']) ?> libros)</h2>
            <?php foreach ($biblioteca['libros'] as $libro): ?>
                <div class="libro <?= $libro['prestado'] ? 'prestado' : '' ?>">
                    <strong>ID <?= $libro['id'] ?>:</strong> <?= $libro['titulo'] ?> - <?= $libro['autor'] ?> (<?= $libro['anio'] ?>)<br>
                    Género: <?= $libro['genero'] ?>
                    <?php if ($libro['prestado']): ?>
                        <br>📌 <strong>Prestado a:</strong> <?= $libro['usuario_prestamo'] ?>
                    <?php else: ?>
                        <br>✅ <strong>Disponible</strong>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>