<?php
function generarTabla($arr){
    
    echo '<table border = "1">';
    
    foreach($arr as $fila){
        
        echo '<tr>';
        echo '<td>' . $fila["nombre"];
        echo '<td>' . $fila["apellido"];
        echo '<td>' . $fila["edad"];
        echo '<td>' . $fila["ciudad"];
    
        echo '</tr>';
    }

    echo '</table>';
}
?>