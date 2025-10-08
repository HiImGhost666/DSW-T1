<?php
// ej1.9.6.php - Sistema de Análisis de Texto Avanzado

function analizarTexto($texto) {
    $resultado = [
        'estadisticas' => [],
        'palabras_frecuentes' => [],
        'oraciones' => [],
        'nivel_lectura' => ''
    ];
    
    // Estadísticas básicas
    $resultado['estadisticas']['caracteres'] = strlen($texto);
    $resultado['estadisticas']['palabras'] = str_word_count($texto, 0, 'áéíóúñÁÉÍÓÚÑ');
    $resultado['estadisticas']['oraciones'] = preg_match_all('/[.!?]+/', $texto, $matches);
    
    // Análisis de palabras frecuentes
    $palabras = str_word_count($texto, 1, 'áéíóúñÁÉÍÓÚÑ');
    $frecuencias = array_count_values(array_map('strtolower', $palabras));
    arsort($frecuencias);
    $resultado['palabras_frecuentes'] = array_slice($frecuencias, 0, 10, true);
    
    // Dividir en oraciones
    $resultado['oraciones'] = preg_split('/[.!?]+/', $texto, -1, PREG_SPLIT_NO_EMPTY);
    
    // Calcular nivel de lectura (Flesch-Kincaid simplificado)
    $totalSilabas = 0;
    foreach ($palabras as $palabra) {
        $totalSilabas += contarSilabas($palabra);
    }
    
    if ($resultado['estadisticas']['oraciones'] > 0) {
        $promedioPalabrasOracion = $resultado['estadisticas']['palabras'] / $resultado['estadisticas']['oraciones'];
        $promedioSilabasPalabra = $totalSilabas / $resultado['estadisticas']['palabras'];
        
        $nivel = 0.39 * $promedioPalabrasOracion + 11.8 * $promedioSilabasPalabra - 15.59;
        $resultado['nivel_lectura'] = "Nivel " . round($nivel, 1) . " (aprox. " . obtenerGradoEscolar($nivel) . ")";
    }
    
    return $resultado;
}

function contarSilabas($palabra) {
    $palabra = strtolower($palabra);
    $contador = 0;
    $vocales = ['a', 'e', 'i', 'o', 'u', 'á', 'é', 'í', 'ó', 'ú'];
    
    // Contar vocales
    for ($i = 0; $i < strlen($palabra); $i++) {
        if (in_array($palabra[$i], $vocales)) {
            // No contar diptongos como sílabas separadas
            if ($i == 0 || !in_array($palabra[$i-1], $vocales)) {
                $contador++;
            }
        }
    }
    
    // Ajustes para palabras que terminan en 'e'
    if (substr($palabra, -1) == 'e') {
        $contador--;
    }
    
    // Mínimo una sílaba
    return max(1, $contador);
}

function obtenerGradoEscolar($nivel) {
    if ($nivel <= 6) return "Primaria";
    if ($nivel <= 8) return "Secundaria";
    if ($nivel <= 12) return "Bachillerato";
    return "Universidad";
}

function resaltarPalabrasFrecuentes($texto, $palabrasFrecuentes) {
    $palabrasClave = array_slice(array_keys($palabrasFrecuentes), 0, 5);
    
    foreach ($palabrasClave as $palabra) {
        $texto = preg_replace(
            "/\b" . preg_quote($palabra, '/') . "\b/i",
            "<mark>$0</mark>",
            $texto
        );
    }
    
    return $texto;
}

// Procesar texto enviado
$textoAnalizado = null;
$textoOriginal = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $textoOriginal = $_POST['texto'] ?? '';
    if (!empty($textoOriginal)) {
        $textoAnalizado = analizarTexto($textoOriginal);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Analizador de Texto Avanzado</title>
    <style>
        .container { max-width: 1000px; margin: 0 auto; padding: 20px; }
        .panel { margin: 20px 0; padding: 15px; border: 1px solid #ddd; border-radius: 5px; }
        .estadisticas { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 10px; }
        .estadistica-item { text-align: center; padding: 10px; background: #f5f5f5; border-radius: 3px; }
        .palabra-frecuente { display: inline-block; margin: 5px; padding: 5px 10px; background: #e3f2fd; border-radius: 3px; }
        mark { background: yellow; padding: 2px; }
        textarea { width: 100%; height: 200px; padding: 10px; }
        .oracion { margin: 10px 0; padding: 8px; border-left: 3px solid #2196F3; background: #f8f9fa; }
    </style>
</head>
<body>
    <div class="container">
        <h1>📊 Analizador de Texto Avanzado</h1>
        
        <form method="POST">
            <div class="panel">
                <h2>Ingresa el texto a analizar:</h2>
                <textarea name="texto" placeholder="Escribe o pega tu texto aquí..." required><?= htmlspecialchars($textoOriginal) ?></textarea>
                <button type="submit" style="margin-top: 10px; padding: 10px 20px;">Analizar Texto</button>
            </div>
        </form>
        
        <?php if ($textoAnalizado): ?>
            <!-- Estadísticas -->
            <div class="panel">
                <h2>📈 Estadísticas del Texto</h2>
                <div class="estadisticas">
                    <div class="estadistica-item">
                        <strong>Caracteres</strong><br>
                        <?= $textoAnalizado['estadisticas']['caracteres'] ?>
                    </div>
                    <div class="estadistica-item">
                        <strong>Palabras</strong><br>
                        <?= $textoAnalizado['estadisticas']['palabras'] ?>
                    </div>
                    <div class="estadistica-item">
                        <strong>Oraciones</strong><br>
                        <?= $textoAnalizado['estadisticas']['oraciones'] ?>
                    </div>
                    <div class="estadistica-item">
                        <strong>Nivel de Lectura</strong><br>
                        <?= $textoAnalizado['nivel_lectura'] ?>
                    </div>
                </div>
            </div>
            
            <!-- Palabras más frecuentes -->
            <div class="panel">
                <h2>🔤 Palabras Más Frecuentes</h2>
                <?php foreach ($textoAnalizado['palabras_frecuentes'] as $palabra => $frecuencia): ?>
                    <div class="palabra-frecuente">
                        <?= htmlspecialchars($palabra) ?> (<?= $frecuencia ?>)
                    </div>
                <?php endforeach; ?>
            </div>
            
            <!-- Texto resaltado -->
            <div class="panel">
                <h2>📝 Texto con Palabras Clave Resaltadas</h2>
                <div style="border: 1px solid #eee; padding: 15px; background: white;">
                    <?= nl2br(resaltarPalabrasFrecuentes(htmlspecialchars($textoOriginal), $textoAnalizado['palabras_frecuentes'])) ?>
                </div>
            </div>
            
            <!-- Análisis de oraciones -->
            <div class="panel">
                <h2>📄 Análisis por Oraciones</h2>
                <?php foreach ($textoAnalizado['oraciones'] as $index => $oracion): ?>
                    <div class="oracion">
                        <strong>Oración <?= $index + 1 ?>:</strong><br>
                        <?= htmlspecialchars(trim($oracion)) ?>
                        <br><small>
                            Palabras: <?= str_word_count(trim($oracion), 0, 'áéíóúñÁÉÍÓÚÑ') ?> | 
                            Caracteres: <?= strlen(trim($oracion)) ?>
                        </small>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>