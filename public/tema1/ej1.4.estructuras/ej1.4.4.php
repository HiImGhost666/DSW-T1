<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $diaSemana = "Martes";

    switch($diaSemana){
        case "Lunes":
            $mensajeDia = "Inicio de semana laboral.";
            break;

        case "Martes":
        case "Miércoles":
        case "Jueves":
            $mensajeDia = "Día de semana.";
            break;

        case "Viernes":
            $mensajeDia = "Fin de semana cerca.";
            break;
        case "Sábado":
        case "Domingo":
            $mensajeDia = "Fin de semana para descansar";
            break;

        default:
            $mensajeDia = "Día no reconocido";
            break;
    }


    echo '<p id="infoDia">' . $mensajeDia . '</p>';

    ?>
</body>
</html>