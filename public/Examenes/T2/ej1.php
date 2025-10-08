<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $arr = [1,2,3,4,5];
    $num = 6;
    function AgregarOEliminar($arr, $num){
        if(in_array($num,$arr)){
            $clave = array_search($num, $arr);
            unset($arr[$clave]);
            $arr = array_values($arr);
        }else{
            $arr[] = $num;
        }

    echo "<p>";
    print_r($arr);
    echo "</p>";

    return $arr;
    }

    AgregarOEliminar($arr,$num);
    ?>

</body>
</html>