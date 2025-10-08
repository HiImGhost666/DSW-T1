<?php
// ejercicio1_inventario.php

session_start();

// Inicializar inventario si no existe
if (!isset($_SESSION['inventario'])) {
    $_SESSION['inventario'] = [
        [
            'id' => 1,
            'nombre' => 'Laptop Dell',
            'categoria' => 'Electrónicos',
            'precio' => 899.99,
            'stock' => 15,
            'proveedor' => 'TecnoSupply'
        ],
        [
            'id' => 2,
            'nombre' => 'Mouse Inalámbrico',
            'categoria' => 'Accesorios',
            'precio' => 25.50,
            'stock' => 42,
            'proveedor' => 'TechAcc'
        ],
        [
            'id' => 3,
            'nombre' => 'Teclado Mecánico',
            'categoria' => 'Accesorios',
            'precio' => 75.00,
            'stock' => 8,
            'proveedor' => 'MechKeys'
        ],
        [
            'id' => 4,
            'nombre' => 'Monitor 24"',
            'categoria' => 'Electrónicos',
            'precio' => 199.99,
            'stock' => 0,
            'proveedor' => 'TecnoSupply'
        ]
    ];
}

$inventario = &$_SESSION['inventario'];

// Funciones para manejar el inventario
function buscarProductos($criterio, $valor, $inventario) {
    return array_filter($inventario, function($producto) use ($criterio, $valor) {
        return stripos($producto[$criterio], $valor) !== false;
    });
}

function obtenerCategorias($inventario) {
    $categorias = array_column($inventario, 'categoria');
    return array_unique($categorias);
}

function productosPorCategoria($inventario) {
    $agrupados = [];
    foreach ($inventario as $producto) {
        $agrupados[$producto['categoria']][] = $producto;
    }
    return $agrupados;
}

function stockBajo($inventario, $limite = 10) {
    return array_filter($inventario, function($producto) use ($limite) {
        return $producto['stock'] <= $limite;
    });
}

function agregarProducto($datos, &$inventario) {
    $nuevoId = empty($inventario) ? 1 : max(array_column($inventario, 'id')) + 1;
    
    $nuevoProducto = [
        'id' => $nuevoId,
        'nombre' => trim($datos['nombre']),
        'categoria' => trim($datos['categoria']),
        'precio' => (float)$datos['precio'],
        'stock' => (int)$datos['stock'],
        'proveedor' => trim($datos['proveedor'])
    ];
    
    $inventario[] = $nuevoProducto;
    return $nuevoId;
}

function actualizarStock($id, $cantidad, &$inventario) {
    foreach ($inventario as &$producto) {
        if ($producto['id'] == $id) {
            $producto['stock'] += $cantidad;
            return true;
        }
    }
    return false;
}

// Procesar formularios
$mensaje = '';
$accion = $_POST['accion'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($accion) {
        case 'buscar':
            $criterio = $_POST['criterio_busqueda'] ?? 'nombre';
            $valor = $_POST['valor_busqueda'] ?? '';
            $resultados = buscarProductos($criterio, $valor, $inventario);
            break;
            
        case 'agregar':
            if (agregarProducto($_POST, $inventario)) {
                $mensaje = "✅ Producto agregado exitosamente";
            } else {
                $mensaje = "❌ Error al agregar producto";
            }
            break;
            
        case 'actualizar_stock':
            $id = (int)$_POST['id_producto'];
            $cantidad = (int)$_POST['cantidad'];
            if (actualizarStock($id, $cantidad, $inventario)) {
                $mensaje = "✅ Stock actualizado exitosamente";
            } else {
                $mensaje = "❌ Producto no encontrado";
            }
            break;
    }
}

// Estadísticas
$totalProductos = count($inventario);
$totalStock = array_sum(array_column($inventario, 'stock'));
$valorTotalInventario = array_sum(array_map(function($p) {
    return $p['precio'] * $p['stock'];
}, $inventario));
$productosStockBajo = count(stockBajo($inventario));
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Gestión de Inventario</title>
    <style>
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        .panel { border: 1px solid #ddd; padding: 20px; margin: 15px 0; border-radius: 8px; }
        .producto { padding: 10px; margin: 5px 0; border-left: 4px solid #007bff; background: #f8f9fa; }
        .stock-bajo { border-left-color: #dc3545; background: #f8d7da; }
        .sin-stock { border-left-color: #6c757d; background: #e2e3e5; }
        .estadistica { display: inline-block; padding: 15px; margin: 5px; background: #007bff; color: white; border-radius: 5px; }
        .form-group { margin: 10px 0; }
        label { display: inline-block; width: 120px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>📦 Sistema de Gestión de Inventario</h1>
        
        <?php if ($mensaje): ?>
            <div class="panel" style="background: #d4edda; color: #155724;">
                <?= $mensaje ?>
            </div>
        <?php endif; ?>

        <!-- Estadísticas -->
        <div class="panel">
            <h2>📊 Estadísticas del Inventario</h2>
            <div class="estadistica">Total Productos: <?= $totalProductos ?></div>
            <div class="estadistica">Total Stock: <?= $totalStock ?></div>
            <div class="estadistica">Valor Total: <?= number_format($valorTotalInventario, 2) ?>€</div>
            <div class="estadistica">Stock Bajo: <?= $productosStockBajo ?></div>
        </div>

        <!-- Búsqueda -->
        <div class="panel">
            <h2>🔍 Buscar Productos</h2>
            <form method="POST">
                <input type="hidden" name="accion" value="buscar">
                <div class="form-group">
                    <label>Buscar por:</label>
                    <select name="criterio_busqueda">
                        <option value="nombre">Nombre</option>
                        <option value="categoria">Categoría</option>
                        <option value="proveedor">Proveedor</option>
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
                <?php if (empty($resultados)): ?>
                    <p>No se encontraron productos.</p>
                <?php else: ?>
                    <?php foreach ($resultados as $producto): ?>
                        <div class="producto <?= $producto['stock'] == 0 ? 'sin-stock' : ($producto['stock'] <= 10 ? 'stock-bajo' : '') ?>">
                            <strong>ID <?= $producto['id'] ?>:</strong> <?= $producto['nombre'] ?><br>
                            Categoría: <?= $producto['categoria'] ?> | 
                            Precio: <?= number_format($producto['precio'], 2) ?>€ | 
                            Stock: <?= $producto['stock'] ?> | 
                            Proveedor: <?= $producto['proveedor'] ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <!-- Agregar producto -->
        <div class="panel">
            <h2>➕ Agregar Nuevo Producto</h2>
            <form method="POST">
                <input type="hidden" name="accion" value="agregar">
                <div class="form-group">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" required>
                </div>
                <div class="form-group">
                    <label>Categoría:</label>
                    <input type="text" name="categoria" required>
                </div>
                <div class="form-group">
                    <label>Precio:</label>
                    <input type="number" step="0.01" name="precio" required>
                </div>
                <div class="form-group">
                    <label>Stock:</label>
                    <input type="number" name="stock" required>
                </div>
                <div class="form-group">
                    <label>Proveedor:</label>
                    <input type="text" name="proveedor" required>
                </div>
                <button type="submit">Agregar Producto</button>
            </form>
        </div>

        <!-- Actualizar stock -->
        <div class="panel">
            <h2>📝 Actualizar Stock</h2>
            <form method="POST">
                <input type="hidden" name="accion" value="actualizar_stock">
                <div class="form-group">
                    <label>ID Producto:</label>
                    <input type="number" name="id_producto" required>
                </div>
                <div class="form-group">
                    <label>Cantidad (+/-):</label>
                    <input type="number" name="cantidad" required>
                </div>
                <button type="submit">Actualizar Stock</button>
            </form>
        </div>

        <!-- Productos por categoría -->
        <div class="panel">
            <h2>📂 Productos por Categoría</h2>
            <?php $productosCategoria = productosPorCategoria($inventario); ?>
            <?php foreach ($productosCategoria as $categoria => $productos): ?>
                <h3><?= $categoria ?> (<?= count($productos) ?>)</h3>
                <?php foreach ($productos as $producto): ?>
                    <div class="producto <?= $producto['stock'] == 0 ? 'sin-stock' : ($producto['stock'] <= 10 ? 'stock-bajo' : '') ?>">
                        <strong><?= $producto['nombre'] ?></strong> - 
                        <?= number_format($producto['precio'], 2) ?>€ - 
                        Stock: <?= $producto['stock'] ?>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>

        <!-- Stock bajo -->
        <div class="panel">
            <h2>⚠️ Productos con Stock Bajo</h2>
            <?php $stockBajo = stockBajo($inventario); ?>
            <?php if (empty($stockBajo)): ?>
                <p>✅ Todos los productos tienen stock suficiente.</p>
            <?php else: ?>
                <?php foreach ($stockBajo as $producto): ?>
                    <div class="producto stock-bajo">
                        <strong><?= $producto['nombre'] ?></strong> - 
                        Stock actual: <?= $producto['stock'] ?> - 
                        Categoría: <?= $producto['categoria'] ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Inventario completo -->
        <div class="panel">
            <h2>📋 Inventario Completo</h2>
            <?php foreach ($inventario as $producto): ?>
                <div class="producto <?= $producto['stock'] == 0 ? 'sin-stock' : ($producto['stock'] <= 10 ? 'stock-bajo' : '') ?>">
                    <strong>ID <?= $producto['id'] ?>:</strong> <?= $producto['nombre'] ?><br>
                    Categoría: <?= $producto['categoria'] ?> | 
                    Precio: <?= number_format($producto['precio'], 2) ?>€ | 
                    Stock: <?= $producto['stock'] ?> | 
                    Proveedor: <?= $producto['proveedor'] ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>