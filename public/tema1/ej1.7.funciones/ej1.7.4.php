<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        $arr = [10, 5, 20, 1];
        $boolean = false;

        echo '<pre><h1>Array de prueba no ordenado:</h1>';
        print_r($arr);
        echo '</pre>';

        crearListaHtml($arr,$boolean);


        $arr2 = ["Manzana", "Pera", "Uva", "Naranja"];
        $boolean = true;
        echo '<pre><h1>Array de prueba ordenado</h1>';
        print_r($arr2);
        echo '</pre>';

        crearListaHtml($arr2,$boolean);


        function crearListaHtml($array, $bool){
            
            if($bool == false){
                echo "<div><h2>Lista generada (ul): </h2><ul>";
                for($i = 0; $i < count($array); $i++){
                    echo "<li>" . $array[$i] . "</li>";
                }
                echo "</ul></div>";
            } else{
                echo "<div><h2>Lista generada (ol): </h2><ol>";
                for($i = 0; $i < count($array); $i++){
                    echo "<li>" . $array[$i] . "</li>";
                }
                echo "</ol></div>";
            }
        }


    ?>
</body>
</html>