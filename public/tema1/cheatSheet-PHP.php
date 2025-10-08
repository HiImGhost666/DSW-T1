<?php
        //- Tipos de Comentarios

        // de una linea
        #  de una linea
        /*
            de varias lineas
        */

        $myName = "Pedro";
        echo "Hello ${myName}";     //* interpolación
    
        //- Declaracion de variables y Tipos

        $variable = "valor";        //* Declaración y Inicialización

        //int             //* Entero
        //float         //* números decimales
        //string          //* cadena de texto
        //bool            //* booleano
        //array           //* array
        //object          //* objecto

        echo gettype($variable);    //* Ver tipo de variable
        is_string($myName);         //* Comprueba si es un String (Respuesta en Booleano)
        $entero = (int) "10";       //* Convierte string a entero (Casting)

        //- Visualización de variable y Resultados

    //? echo ---> Para mostrar 1 o mas strings o valores 
        $nombre = "Pedro";
        echo "hola" . $nombre;      //* Salida: hola Pedro
        echo 123;                   //* Salido: 123
    
    //? print_r() ---> Imprime info legible de una variable (uso en array y objetos)
        $frutas = ['manzana','pera','uva'];
        print_r($frutas);
        //* Salida:
        /*  Array
            (
            [0] => manzana
            [1] => pera
            [2] => uva
            )
        */

    //? var_dump  ---> Muestra info estructurada (incluye tipo, valor, longitud de cadena, nº elementos en array,etc)
        $edad = 30;
        var_dump($edad);        //* Salida: int(30)
        $datos = ['nombre' => 'Ana', 'edad' => 25];
        var_dump($datos);
        //* Salida:
        /*  array(2) {
            ["nombre"]=> string(3) "Ana"
            ["edad"]=> int(25)
            }
        */
        //- Constantes --> Valor fijo inalterable

    //? define() ---> define('NOMBRE_CONSTANTE', valor); Nombre suele ir en MAYUSCULAS   
        define('TASA_IVA', 0.21);
        define('COLORES_PRIMARIOS', ['rojo','verde','azul']);    

    //? const   ---> const NOMBRE_CONSTANTE = valor;
        const PI = 3.14159;

        //- Operadores
    
    //? Aritméticos

    $a + $b;  //* Suma
    $a - $b;  //* Resta
    $a * $b;  //* Multiplicación
    $a / $b;  //* División
    $a % $b;  //* Módulo

    //? Comparación

    $a == $b;   //* Igual
    $a === $b;  //* Igual y del mismo tipo
    $a != $b;   //* Diferente
    $a !== $b;  //* Diferente y distinto tipo
    $a > $b;    //* Mayor que
    $a < $b;    //* Menor que

    //? Lógicos

    $a && $b;   //* AND lógico
    $a || $b;   //* OR lógico
    !$a;        //* Negación

    //? Operador Ternario
    //* Sintaxis:  (condicion) ? valor_si_verdadero : valor_si_falso
    $edad = 20;
    $estado = ($edad >= 18) ? "Mayor de edad" : "Menor de edad"; 
    echo $estado;   //* Salida: Mayor de edad 

        //- Estructuras de control

    //! Condicionales: if, else , elseif

    if ($a > $b) {
        echo "$a es mayor que $b";
    } elseif ($a == $b) {
        echo "$a es igual a $b";
    } else {
        echo "$a es menor que $b";
    }

    //! Switch case

    $color = "rojo";
    switch ($color) {
        case "rojo":
            echo "El color es rojo";
            break;
        case "azul":
            echo "El color es azul";
            break;
        default:
            echo "Color desconocido";
    }

    //! Bucles 

    //? While --> Repite bloque mientras condición se cumpla ( se evalua antes de cada iteración)

    $contador = 1; 
    while ($contador <= 3) { 
        echo "Contador: " . $contador . "\n"; 
        $contador++; 
    } 
    /* Salida: 
    Contador: 1 
    Contador: 2 
    Contador: 3 
    */ 

    //? do-while --> Repite bloque al menos 1 vez y luego continua repitiendo mientras codicion se cumpla
    //?              Condicion se evalua despues de cada iteración

    $i = 5; 
    do { 
        echo "Número: " . $i . "\n"; 
        $i++; 
    } while ($i < 5); 
    //* Salida: Número: 5 (se ejecuta al menos una vez) 

    //? For     --> Repite bloque un nº especifico de veces 

    for ($j = 0; $j < 3; $j++) { 
        echo "Iteración: " . $j . "\n"; 
    } 
    /* Salida: 
    Iteración: 0 
    Iteración: 1 
    Iteración: 2 
    */

    //? Foreach     --> Itera sobre elementos de array o colecciones. Mas sencilla de recorrer arrays

    $frutas = ['Manzana', 'Pera', 'Uva']; 
    foreach ($frutas as $fruta) { 
        echo "Me gusta la " . $fruta . ".\n"; 
    } 
    /* Salida: 
    Me gusta la Manzana. 
    Me gusta la Pera.
    Me gusta la Uva.  
    */
    
        //- Strings

    //? Declaración de strings

    //! Comillas simples: más rapidos porque PHP no busca variables dentro de ellas
    $saludo = 'Hola mundo';
    echo $saludo;       //* Salida: Hola mundo
    //! Comillas dobles: permite interpolación de variables e interpreta caracteres de escape
    $nombre = "Pedro";
    echo "Hola, $nombre\n";     //* Salida: Hola, Pedro (y un salto de linea)
    echo 'Hola, $nombre\n';     //* Salida: Hola, $nombre\n (no interpola ni interpreta escape)

    //? Métodos mas usados
    $texto = "Hola Mundo PHP  ";
    strlen($texto);                 //* Longitud --> Salida 18
    $mensaje = $texto . " " . $nombre; //* Concatenacion ---> Salida:Hola Mundo PHP  Pedro
    substr($texto, 0, 3);           //* extra parte de una cadena ---> Salida: Hola
    strtolower($texto);             //* texto en minuscula
    strtoupper($texto);             //* texto en mayuscula
    trim($texto);                   //* Elimina espacio inicio y final del string
    explode(" ",$texto);            //* Convierte String en Array
    str_replace("Mundo", "Universo", $texto);       //* Reemplaza 

    //! --------------------------------------------------------------------------------------------------------------------------------------
    //- Funciones básicas
    // strlen(): longitud de cadena
    echo strlen("Hola PHP"); // 8

    // trim(): elimina espacios al inicio y final
    echo trim("  Hola PHP  "); // "Hola PHP"

    // ltrim(): elimina espacios a la izquierda
    echo ltrim("   Hola"); // "Hola"

    // rtrim(): elimina espacios a la derecha
    echo rtrim("Hola   "); // "Hola"

    //- Conversión de mayúsculas/minúsculas
    // strtoupper(): todo a mayúsculas
    echo strtoupper("php es genial"); // "PHP ES GENIAL"

    // strtolower(): todo a minúsculas
    echo strtolower("PHP ES GENIAL"); // "php es genial"

    // ucfirst(): primera letra en mayúscula
    echo ucfirst("hola mundo"); // "Hola mundo"

    // ucwords(): primera letra de cada palabra
    echo ucwords("hola mundo desde php"); // "Hola Mundo Desde Php"

    //- Reemplazo y manipulación
    // str_replace(): reemplaza texto
    echo str_replace("Java", "PHP", "Me gusta Java"); // "Me gusta PHP"

    // substr(): extrae parte del texto
    echo substr("Programar en PHP", 0, 9); // "Programar"

    // strrev(): invierte el texto
    echo strrev("PHP"); // "PHP" (igual), "Hola" → "aloH"

    // str_repeat(): repite texto
    echo str_repeat("Ha", 3); // "HaHaHa"

    // str_pad(): rellena texto
    echo str_pad("5", 3, "0", STR_PAD_LEFT); // "005"

    // substr_replace(): reemplaza una parte del texto
    echo substr_replace("Hola Mundo", "PHP", 5, 5); // "Hola PHP"

    //- Búsqueda
    // strpos(): posición de la primera aparición
    echo strpos("Aprender PHP es fácil", "PHP"); // 9

    // strrpos(): posición de la última aparición
    echo strrpos("PHP y más PHP", "PHP"); // 8

    // str_contains(): verifica si contiene (PHP 8+)
    var_dump(str_contains("Hola PHP", "PHP")); // true

    // str_starts_with(): empieza con... (PHP 8+)
    var_dump(str_starts_with("Hola Mundo", "Hola")); // true

    // str_ends_with(): termina con... (PHP 8+)
    var_dump(str_ends_with("archivo.txt", ".txt")); // true

    //- Dividir y unir cadenas
    // explode(): separa una cadena en array
    $colores = explode(",", "rojo,verde,azul");
    print_r($colores); // ['rojo', 'verde', 'azul']

    // implode(): une array en texto
    echo implode(" - ", $colores); // "rojo - verde - azul"

    // join(): alias de implode()
    echo join(" / ", $colores); // "rojo / verde / azul"

    //- Comparación y análisis
    // strcmp(): compara (sensible a mayúsculas)
    echo strcmp("Hola", "hola"); // ≠ 0 → diferente

    // strcasecmp(): compara (no sensible a mayúsculas)
    echo strcasecmp("Hola", "hola"); // 0 → igual

    // strnatcmp(): comparación natural
    $val1 = "img2";
    $val2 = "img10";
    echo strnatcmp($val1, $val2); // negativo (img2 < img10)

    // similar_text(): porcentaje de similitud
    similar_text("casa", "caso", $porcentaje);
    echo $porcentaje; // 75

    //- Codificación y seguridad
    // htmlspecialchars(): convierte caracteres especiales
    echo htmlspecialchars("<b>Hola</b>"); // "&lt;b&gt;Hola&lt;/b&gt;"

    // addslashes(): escapa comillas
    echo addslashes("O'Reilly"); // "O\'Reilly"

    // strip_tags(): elimina etiquetas HTML
    echo strip_tags("<p>Hola <b>Mundo</b></p>"); // "Hola Mundo"

    // nl2br(): convierte saltos de línea a <br>
    echo nl2br("Hola\nMundo"); // "Hola<br />Mundo"

    //! ----------------------------------------------------------------------------------------------------------------------------------------

    //? Formateo de Cadenas con printf() y sprintf()
    
    //! printf() ---> imprime una cadena formateada directamente en salida
    $nombre = "Agua";
    $cantidad = 1;
    $precio = 1.50;
    printf("Producto: %s ,Cantidad: %d ,Precio: %.2f€", $nombre,$cantidad,$precio);
    //* Salida: Producto: Agua ,Cantidad: 1 ,Precio: 1.50€
            //* %d:   marcador para entero
            //* %s:   marcador para una cadena
            //* %.2f: marcador para un nº flotante con 2 decimales
    
    //! sprintf() --> devuelve una cadena formateada (no imprime directamente) lo que permite
    //!               almacenarla en una variable para uso posterior
    $temperatura = 25.5; 
    $unidad = "C"; 
    $mensajeClima = sprintf("La temperatura actual es de %.1f%s.", $temperatura, $unidad); 
    echo $mensajeClima; //* Salida: La temperatura actual es de 25.5C.

        //- Manejo de Arrays
    
    //? Array indexado  --> Se accede a los elementos mediante un índice numérico
    //! Usando la sintaxis de corchetes [] (recomendado)
    $frutas = ["manzana", "banana", "naranja"];
    echo $frutas[0];  //* manzana

    //! Usando la sintaxis array() 
    $frutas = array("Manzana", "Plátano", "Cereza"); 
    echo $frutas[0];      //* Salida: Manzana   ---> Obtienes directamente el elemento de esa posición

    //! Añadir elementos después de la declaración 
    $animales = [];             
    $animales[] = "Perro";      //* Añade elemento al final 
    $animales[] = "Gato";       //* Contenido del array: ["Perro","Gato]

    //? Array asociativo  --> Se accede a los elementos mediante claves con nombres (strings)
    //! Usando la sintaxis de corchetes [] 
    $persona = ["nombre" => "Luis", "edad" => 21];
    echo $persona["nombre"];  //* Salida: Luis

    //! Usando la sintaxis array() 
    $persona = array("nombre" => "Juan", "edad" => 30); 
    echo $persona["nombre"]; //* Salida: Juan

    //! Añadir elementos después de la declaración 
    $config = []; 
    $config["database"] = "mydb"; 
    $config["user"] = "root"; 
    echo $config["user"]; //* Salida: root 

    //? Array Multidimensional  --> Un array que contines 1 o mas arrays (útil para almacenar datos complejos o tablas)
    $alumnos = [ 
    ["nombre" => "Ana", "nota" => 8, "edad" => 20], 
    ["nombre" => "Luis", "nota" => 7, "edad" => 22] 
    ];
    echo "Primer alumno:" . $alumnos[0] . "\n";     //* Salida: Primer alumno: Ana      --> Obtener directamente el dato
    $alumnoLuis = $alumnos[1];      //* Obtienes el array asociativo de un alumno en 1 variable
    echo "Edad de Luis: " . $alumnoLuis["edad"];    //* Salida: Edad de Luis: 22    --> Recupera datos desde una variable de alumno
    
    print_r($alumnos);          //* Muestra la estructura completa del array $alumnos ( print_r)

    //? Recorrer arrays
    foreach ($array as $valor) {
        echo $valor;
    }
    //? Métodos más útiles para arrays indexados (numéricos)

    array_push($array, "nuevo");    //* Agregar elemento al final
    array_pop($array);              //* Eliminar ultimo elemento
    echo count($array);             //* Contar elementos array


        //- Funciones

    //? Definir una función

    function suma2($a, $b) {
        return $a + $b;
    }
    echo suma2(2, 3);  //* Imprime 5

    //? Funciones anónimas y callback

    $anonima = function($nombre) {
        return "Hola, " . $nombre;
    };
    echo $anonima("Mundo");  //* Imprime "Hola, Mundo"

    //? Parámetros por referencia

    function incrementar(&$numero) {
        $numero++;
    }
    $a = 5;
    incrementar($a);
    echo $a;  //* Imprime 6

            //- Formularios
    
    //? Obtener datos de un formulario

    //* Obtener datos con método POST
    $nombre = $_POST['nombre'];

    //* Obtener datos con método GET
    $edad = $_GET['edad'];

    //? Validación de datos

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Correo válido";
    } else {
        echo "Correo inválido";
    }
?><?php
        //- Tipos de Comentarios

        // de una linea
        #  de una linea
        /*
            de varias lineas
        */

        $myName = "Pedro";
        echo "Hello ${myName}";     //* interpolación
    
        //- Declaracion de variables y Tipos

        $variable = "valor";        //* Declaración y Inicialización

        //int             //* Entero
        //float         //* números decimales
        //string          //* cadena de texto
        //bool            //* booleano
        //array           //* array
        //object          //* objecto

        echo gettype($variable);    //* Ver tipo de variable
        is_string($myName);         //* Comprueba si es un String (Respuesta en Booleano)
        $entero = (int) "10";       //* Convierte string a entero (Casting)

        //- Visualización de variable y Resultados

    //? echo ---> Para mostrar 1 o mas strings o valores 
        $nombre = "Pedro";
        echo "hola" . $nombre;      //* Salida: hola Pedro
        echo 123;                   //* Salido: 123
    
    //? print_r() ---> Imprime info legible de una variable (uso en array y objetos)
        $frutas = ['manzana','pera','uva'];
        print_r($frutas);
        //* Salida:
        /*  Array
            (
            [0] => manzana
            [1] => pera
            [2] => uva
            )
        */

    //? var_dump  ---> Muestra info estructurada (incluye tipo, valor, longitud de cadena, nº elementos en array,etc)
        $edad = 30;
        var_dump($edad);        //* Salida: int(30)
        $datos = ['nombre' => 'Ana', 'edad' => 25];
        var_dump($datos);
        //* Salida:
        /*  array(2) {
            ["nombre"]=> string(3) "Ana"
            ["edad"]=> int(25)
            }
        */
        //- Constantes --> Valor fijo inalterable

    //? define() ---> define('NOMBRE_CONSTANTE', valor); Nombre suele ir en MAYUSCULAS   
        define('TASA_IVA', 0.21);
        define('COLORES_PRIMARIOS', ['rojo','verde','azul']);    

    //? const   ---> const NOMBRE_CONSTANTE = valor;
        const PI = 3.14159;

        //- Operadores
    
    //? Aritméticos

    $a + $b;  //* Suma
    $a - $b;  //* Resta
    $a * $b;  //* Multiplicación
    $a / $b;  //* División
    $a % $b;  //* Módulo

    //? Comparación

    $a == $b;   //* Igual
    $a === $b;  //* Igual y del mismo tipo
    $a != $b;   //* Diferente
    $a !== $b;  //* Diferente y distinto tipo
    $a > $b;    //* Mayor que
    $a < $b;    //* Menor que

    //? Lógicos

    $a && $b;   //* AND lógico
    $a || $b;   //* OR lógico
    !$a;        //* Negación

    //? Operador Ternario
    //* Sintaxis:  (condicion) ? valor_si_verdadero : valor_si_falso
    $edad = 20;
    $estado = ($edad >= 18) ? "Mayor de edad" : "Menor de edad"; 
    echo $estado;   //* Salida: Mayor de edad 

        //- Estructuras de control

    //! Condicionales: if, else , elseif

    if ($a > $b) {
        echo "$a es mayor que $b";
    } elseif ($a == $b) {
        echo "$a es igual a $b";
    } else {
        echo "$a es menor que $b";
    }

    //! Switch case

    $color = "rojo";
    switch ($color) {
        case "rojo":
            echo "El color es rojo";
            break;
        case "azul":
            echo "El color es azul";
            break;
        default:
            echo "Color desconocido";
    }

    //! Bucles 

    //? While --> Repite bloque mientras condición se cumpla ( se evalua antes de cada iteración)

    $contador = 1; 
    while ($contador <= 3) { 
        echo "Contador: " . $contador . "\n"; 
        $contador++; 
    } 
    /* Salida: 
    Contador: 1 
    Contador: 2 
    Contador: 3 
    */ 

    //? do-while --> Repite bloque al menos 1 vez y luego continua repitiendo mientras codicion se cumpla
    //?              Condicion se evalua despues de cada iteración

    $i = 5; 
    do { 
        echo "Número: " . $i . "\n"; 
        $i++; 
    } while ($i < 5); 
    //* Salida: Número: 5 (se ejecuta al menos una vez) 

    //? For     --> Repite bloque un nº especifico de veces 

    for ($j = 0; $j < 3; $j++) { 
        echo "Iteración: " . $j . "\n"; 
    } 
    /* Salida: 
    Iteración: 0 
    Iteración: 1 
    Iteración: 2 
    */

    //? Foreach     --> Itera sobre elementos de array o colecciones. Mas sencilla de recorrer arrays

    $frutas = ['Manzana', 'Pera', 'Uva']; 
    foreach ($frutas as $fruta) { 
        echo "Me gusta la " . $fruta . ".\n"; 
    } 
    /* Salida: 
    Me gusta la Manzana. 
    Me gusta la Pera.
    Me gusta la Uva.  
    */
    
        //- Strings

    //? Declaración de strings

    //! Comillas simples: más rapidos porque PHP no busca variables dentro de ellas
    $saludo = 'Hola mundo';
    echo $saludo;       //* Salida: Hola mundo
    //! Comillas dobles: permite interpolación de variables e interpreta caracteres de escape
    $nombre = "Pedro";
    echo "Hola, $nombre\n";     //* Salida: Hola, Pedro (y un salto de linea)
    echo 'Hola, $nombre\n';     //* Salida: Hola, $nombre\n (no interpola ni interpreta escape)

    //? Métodos mas usados
    $texto = "Hola Mundo PHP  ";
    strlen($texto);                 //* Longitud --> Salida 18
    $mensaje = $texto . " " . $nombre; //* Concatenacion ---> Salida:Hola Mundo PHP  Pedro
    substr($texto, 0, 3);           //* extra parte de una cadena ---> Salida: Hola
    strtolower($texto);             //* texto en minuscula
    strtoupper($texto);             //* texto en mayuscula
    trim($texto);                   //* Elimina espacio inicio y final del string
    explode(" ",$texto);            //* Convierte String en Array
    implode();
    str_replace("Mundo", "Universo", $texto);       //* Reemplaza 

    //? Formateo de Cadenas con printf() y sprintf()
    
    //! printf() ---> imprime una cadena formateada directamente en salida
    $nombre = "Agua";
    $cantidad = 1;
    $precio = 1.50;
    printf("Producto: %s ,Cantidad: %d ,Precio: %.2f€", $nombre,$cantidad,$precio);
    //* Salida: Producto: Agua ,Cantidad: 1 ,Precio: 1.50€
            //* %d:   marcador para entero
            //* %s:   marcador para una cadena
            //* %.2f: marcador para un nº flotante con 2 decimales
    
    //! sprintf() --> devuelve una cadena formateada (no imprime directamente) lo que permite
    //!               almacenarla en una variable para uso posterior
    $temperatura = 25.5; 
    $unidad = "C"; 
    $mensajeClima = sprintf("La temperatura actual es de %.1f%s.", $temperatura, $unidad); 
    echo $mensajeClima; //* Salida: La temperatura actual es de 25.5C.

        //- Manejo de Arrays
    
    //? Array indexado  --> Se accede a los elementos mediante un índice numérico
    //! Usando la sintaxis de corchetes [] (recomendado)
    $frutas = ["manzana", "banana", "naranja"];
    echo $frutas[0];  //* manzana

    //! Usando la sintaxis array() 
    $frutas = array("Manzana", "Plátano", "Cereza"); 
    echo $frutas[0];      //* Salida: Manzana   ---> Obtienes directamente el elemento de esa posición

    //! Añadir elementos después de la declaración 
    $animales = [];             
    $animales[] = "Perro";      //* Añade elemento al final 
    $animales[] = "Gato";       //* Contenido del array: ["Perro","Gato]

    //? Array asociativo  --> Se accede a los elementos mediante claves con nombres (strings)
    //! Usando la sintaxis de corchetes [] 
    $persona = ["nombre" => "Luis", "edad" => 21];
    echo $persona["nombre"];  //* Salida: Luis

    //! Usando la sintaxis array() 
    $persona = array("nombre" => "Juan", "edad" => 30); 
    echo $persona["nombre"]; //* Salida: Juan

    //! Añadir elementos después de la declaración 
    $config = []; 
    $config["database"] = "mydb"; 
    $config["user"] = "root"; 
    echo $config["user"]; //* Salida: root 

    //? Array Multidimensional  --> Un array que contines 1 o mas arrays (útil para almacenar datos complejos o tablas)
    $alumnos = [ 
    ["nombre" => "Ana", "nota" => 8, "edad" => 20], 
    ["nombre" => "Luis", "nota" => 7, "edad" => 22] 
    ];
    echo "Primer alumno:" . $alumnos[0] . "\n";     //* Salida: Primer alumno: Ana      --> Obtener directamente el dato
    $alumnoLuis = $alumnos[1];      //* Obtienes el array asociativo de un alumno en 1 variable
    echo "Edad de Luis: " . $alumnoLuis["edad"];    //* Salida: Edad de Luis: 22    --> Recupera datos desde una variable de alumno
    
    print_r($alumnos);          //* Muestra la estructura completa del array $alumnos ( print_r)

    //? Recorrer arrays
    foreach ($array as $valor) {
        echo $valor;
    }
    //? Métodos más útiles para arrays indexados (numéricos)

    array_push($array, "nuevo");    //* Agregar elemento al final
    array_pop($array);              //* Eliminar ultimo elemento
    echo count($array);             //* Contar elementos array


        //- Funciones

    //? Definir una función

    function suma($a, $b) {
        return $a + $b;
    }
    echo suma(2, 3);  //* Imprime 5

    //? Funciones anónimas y callback

    $anonima = function($nombre) {
        return "Hola, " . $nombre;
    };
    echo $anonima("Mundo");  //* Imprime "Hola, Mundo"

    //? Parámetros por referencia

    function incrementar2(&$numero) {
        $numero++;
    }
    $a = 5;
    incrementar2($a);
    echo $a;  //* Imprime 6

            //- Formularios
    
    //? Obtener datos de un formulario

    //* Obtener datos con método POST
    $nombre = $_POST['nombre'];

    //* Obtener datos con método GET
    $edad = $_GET['edad'];

    //? Validación de datos

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Correo válido";
    } else {
        echo "Correo inválido";
    }
?>