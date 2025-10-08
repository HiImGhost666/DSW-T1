<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    calcular(10,5,"+");
    calcular(10,5,"-");
    calcular(10,5,"*");
    calcular(10,5,"/");
    calcular(10,0,"/");
    calcular(10,5,"$");


    

    function calcular($num1, $num2, $operador){
        $resultado = 0;
        switch($operador){
            case "+":
                $resultado = $num1 + $num2;
                break;

            case "-":
                $resultado = $num1 - $num2;
                break;
            case "*":
                $resultado = $num1 * $num2;
                break;
            case "/":

                if($num2 != 0){
                    $resultado = $num1 / $num2;
                }else{
                    $resultado = 'Error: División por cero no permitida.';
                    break;
                };
                break;
            default:
                $resultado = "Error: Operador no válido.";
                break;
                
        };

        echo "<p>El resultado de " . $num1 . ' ' .$operador . ' ' . $num2 . " es: " . $resultado . '</p>';
    }
    ?>
</body>
</html>