<?php

$parrafo = "Texto de ejemplo para probar con distintos metodos de impresion de datos";

// Este es un comentario de prueba de una linea

/*

Esto es un comentario de prueba de un bloque

*/

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 PHP</title>
</head>

<header>
    <h1>Ejercicio 01 - Bloque 1</h1>
</header>
<body>

    <section>

        <p> <?php echo $parrafo ?> </p>

    </section>

    <section>
        
        <p><?php print $parrafo ?> </p>

    </section>

    <section>
        <p> <?= $parrafo ?> </p>
    </section>
    
</body>
</html>