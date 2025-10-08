<?php
// ej1.9.7.php - Sistema de Encuestas y Estadísticas
session_start();

// Estructura de datos para encuestas
if (!isset($_SESSION['encuestas'])) {
    $_SESSION['encuestas'] = [
        'tecnologia' => [
            'pregunta' => '¿Cuál es tu lenguaje de programación favorito?',
            'opciones' => ['PHP', 'JavaScript', 'Python', 'Java', 'C#'],
            'votos' => [0, 0, 0, 0, 0],
            'votantes' => []
        ],
        'deportes' => [
            'pregunta' => '¿Cuál es tu deporte favorito?',
            'opciones' => ['Fútbol', 'Baloncesto', 'Tenis', 'Natación', 'Ciclismo'],
            'votos' => [0, 0, 0, 0, 0],
            'votantes' => []
        ]
    ];
}

$encuestas = &$_SESSION['encuestas'];

function votar($encuestaId, $opcionIndex, $usuario, &$encuestas) {
    if (!isset($encuestas[$encuestaId]) || 
        $opcionIndex < 0 || 
        $opcionIndex >= count($encuestas[$encuestaId]['opciones']) ||
        in_array($usuario, $encuestas[$encuestaId]['votantes'])) {
        return false;
    }
    
    $encuestas[$encuestaId]['votos'][$opcionIndex]++;
    $encuestas[$encuestaId]['votantes'][] = $usuario;
    return true;
}

function obtenerEstadisticas($encuestaId, $encuestas) {
    if (!isset($encuestas[$encuestaId])) return null;
    
    $encuesta = $encuestas[$encuestaId];
    $totalVotos = array_sum($encuesta['votos']);
    
    $estadisticas = [
        'total_votos' => $totalVotos,
        'porcentajes' => [],
        'ganadora' => '',
        'max_votos' => 0
    ];
    
    if ($totalVotos > 0) {
        foreach ($encuesta['opciones'] as $index => $opcion) {
            $porcentaje = ($encuesta['votos'][$index] / $totalVotos) * 100;
            $estadisticas['porcentajes'][$opcion] = round($porcentaje, 1);
            
            if ($encuesta['votos'][$index] > $estadisticas['max_votos']) {
                $estadisticas['max_votos'] = $encuesta['votos'][$index];
                $estadisticas['ganadora'] = $opcion;
            }
        }
    }
    
    return $estadisticas;
}

function crearEncuesta($id, $pregunta, $opciones, &$encuestas) {
    if (isset($encuestas[$id])) return false;
    
    $encuestas[$id] = [
        'pregunta' => $pregunta,
        'opciones' => $opciones,
        'votos' => array_fill(0, count($opciones), 0),
        'votantes' => []
    ];
    return true;
}

// Procesar acciones
$mensaje = '';
$accion = $_POST['accion'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($accion) {
        case 'votar':
            $encuestaId = $_POST['encuesta_id'];
            $opcionIndex = (int)$_POST['opcion'];
            $usuario = $_POST['usuario'] ?? 'Anónimo';
            
            if (votar($encuestaId, $opcionIndex, $usuario, $encuestas)) {
                $mensaje = "¡Voto registrado exitosamente!";
            } else {
                $mensaje = "Error: No se pudo registrar el voto";
            }
            break;
            
        case 'crear_encuesta':
            $nuevaId = $_POST['nueva_id'];
            $pregunta = $_POST['pregunta'];
            $opciones = array_filter(array_map('trim', explode(',', $_POST['opciones'])));
            
            if (crearEncuesta($nuevaId, $pregunta, $opciones, $encuestas)) {
                $mensaje = "Encuesta creada exitosamente";
            } else {
                $mensaje = "Error: La encuesta ya existe";
            }
            break;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Encuestas</title>
    <style>
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        .encuesta { border: 1px solid #ddd; padding: 20px; margin: 20px 0; border-radius: 8px; }
        .barra-progreso { background: #e0e0e0; border-radius: 4px; margin: 5px 0; }
        .progreso { background: #4CAF50; height: 20px; border-radius: 4px; text-align: center; color: white; }
        .ganadora { border: 2px solid #4CAF50; background: #f1f8e9; }
        .estadisticas { background: #f5f5f5; padding: 15px; border-radius: 5px; margin: 10px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h1>📊 Sistema de Encuestas y Estadísticas</h1>
        
        <?php if ($mensaje): ?>
            <div style="color: green; padding: 10px; background: #e8f5e8; border-radius: 4px;">
                <?= $mensaje ?>
            </div>
        <?php endif; ?>

        <!-- Crear nueva encuesta -->
        <div class="encuesta">
            <h2>➕ Crear Nueva Encuesta</h2>
            <form method="POST">
                <input type="hidden" name="accion" value="crear_encuesta">
                <div style="margin: 10px 0;">
                    <label>ID de la encuesta:</label>
                    <input type="text" name="nueva_id" required>
                </div>
                <div style="margin: 10px 0;">
                    <label>Pregunta:</label>
                    <input type="text" name="pregunta" style="width: 400px;" required>
                </div>
                <div style="margin: 10px 0;">
                    <label>Opciones (separadas por comas):</label>
                    <input type="text" name="opciones" style="width: 400px;" 
                           placeholder="Ej: Opción 1, Opción 2, Opción 3" required>
                </div>
                <button type="submit">Crear Encuesta</button>
            </form>
        </div>

        <!-- Lista de encuestas -->
        <?php foreach ($encuestas as $id => $encuesta): ?>
            <?php $estadisticas = obtenerEstadisticas($id, $encuestas); ?>
            
            <div class="encuesta <?= $estadisticas && $encuesta['votos'][array_search($estadisticas['ganadora'], $encuesta['opciones'])] == $estadisticas['max_votos'] ? 'ganadora' : '' ?>">
                <h2>❓ <?= htmlspecialchars($encuesta['pregunta']) ?></h2>
                <p><strong>Encuesta ID:</strong> <?= $id ?> | 
                   <strong>Total de votos:</strong> <?= array_sum($encuesta['votos']) ?> |
                   <strong>Votantes únicos:</strong> <?= count($encuesta['votantes']) ?></p>
                
                <!-- Formulario de votación -->
                <form method="POST" style="margin: 15px 0;">
                    <input type="hidden" name="accion" value="votar">
                    <input type="hidden" name="encuesta_id" value="<?= $id ?>">
                    <div style="margin: 10px 0;">
                        <label>Tu nombre:</label>
                        <input type="text" name="usuario" required>
                    </div>
                    <?php foreach ($encuesta['opciones'] as $index => $opcion): ?>
                        <div>
                            <input type="radio" name="opcion" value="<?= $index ?>" id="<?= $id ?>_<?= $index ?>" required>
                            <label for="<?= $id ?>_<?= $index ?>"><?= htmlspecialchars($opcion) ?></label>
                        </div>
                    <?php endforeach; ?>
                    <button type="submit" style="margin-top: 10px;">Votar</button>
                </form>
                
                <!-- Resultados -->
                <?php if ($estadisticas && $estadisticas['total_votos'] > 0): ?>
                    <div class="estadisticas">
                        <h3>📈 Resultados:</h3>
                        <?php foreach ($encuesta['opciones'] as $index => $opcion): ?>
                            <?php 
                            $votos = $encuesta['votos'][$index];
                            $porcentaje = $estadisticas['porcentajes'][$opcion] ?? 0;
                            $esGanadora = ($opcion === $estadisticas['ganadora'] && $votos === $estadisticas['max_votos']);
                            ?>
                            <div>
                                <strong><?= htmlspecialchars($opcion) ?></strong>
                                <?php if ($esGanadora): ?> 👑<?php endif; ?>
                                <br>
                                <div class="barra-progreso">
                                    <div class="progreso" style="width: <?= $porcentaje ?>%;">
                                        <?= $votos ?> votos (<?= $porcentaje ?>%)
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        
                        <div style="margin-top: 15px; padding: 10px; background: #e3f2fd; border-radius: 4px;">
                            <strong>Análisis:</strong> La opción ganadora es 
                            "<strong><?= $estadisticas['ganadora'] ?></strong>" 
                            con <?= $estadisticas['max_votos'] ?> votos.
                        </div>
                    </div>
                <?php else: ?>
                    <p style="color: #666;">Aún no hay votos para esta encuesta.</p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
        
        <!-- Resumen general -->
        <div class="encuesta">
            <h2>📋 Resumen General del Sistema</h2>
            <div class="estadisticas">
                <strong>Total de encuestas:</strong> <?= count($encuestas) ?><br>
                <strong>Total de votos en el sistema:</strong> 
                <?= array_sum(array_map(function($encuesta) { 
                    return array_sum($encuesta['votos']); 
                }, $encuestas)) ?><br>
                <strong>Total de votantes únicos:</strong>
                <?= count(array_unique(array_reduce($encuestas, function($carry, $encuesta) {
                    return array_merge($carry, $encuesta['votantes']);
                }, []))) ?>
           </div>
        </div>
    </div>
</body>
</html>