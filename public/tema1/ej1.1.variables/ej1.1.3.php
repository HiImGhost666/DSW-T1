<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    //El proposito de este archivo es definir constantes

    /* La diferencia entre  const y define() es que las constantes definidas con const
    se definen en tiempo de compilación y las definidas con define() en tiempo de ejecución.
    Por lo tanto, const no puede ser usado dentro de estructuras de control, mientras que
    define() sí puede. Además, const permite definir constantes de tipo array, mientras que
    define() no lo permite en versiones anteriores a PHP 7.0. */


    const VERSION_PHP = "8.4";
    define("IS_TEST_MODE_ACTIVE", false); // define

    echo "<p>Versión de PHP: " . VERSION_PHP . "</p>";
    echo "<p>Test mode: " . IS_TEST_MODE_ACTIVE . "</p>";


    ?>
</body>
</html>