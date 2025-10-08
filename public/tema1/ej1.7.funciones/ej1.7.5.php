<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    $arr = [10, 2, 7, 15, 3];

    echo '<pre>';
    print_r($arr);
    echo '</pre>';

    calcularEstadisticas($arr);


    $arr2 =  [1, 1, 1, 1, 1];

    echo '<pre>';
    print_r($arr2);
    echo '</pre>';

    calcularEstadisticas($arr2);

    
    function calcularEstadisticas($arr){

        $menor = $arr[0];
        $mayor = $arr[0];
        $suma = 0;

        $arrNuevo = [
            "menor" => 0,
            "mayor" => 0,
            "media" => 0
        ];


        foreach($arr as $num){
            if($num < $menor){
                $menor = $num;
            }elseif($num > $mayor){
                $mayor = $num;
            }

            $suma += $num;
        }

        $media = $suma / count($arr);

        $arrNuevo["menor"] = $menor;
        $arrNuevo["mayor"] = $mayor;
        $arrNuevo["media"] = $media;

       echo '<pre>';
        print_r($arrNuevo);
        echo '</pre>';
    }



    ?>
</body>
</html>