<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 PHP</title>
</head>
<body>
    <header>
        <h1>Ejercicio 3 - Bloque 1</h1>
    </header>

    <?php

    require_once __DIR__ . '/marcador.php';

    $marcador1 = new Marcador();
    $marcador1->anotarPunto();
    $marcador1->anotarPunto();
    $marcador1->anotarPunto();

    $marcador2 = new Marcador();
    $marcador2->anotarPunto();



    ?>

    <div>
        <h2>Primera Impresión de marcador</h2>
        <p><?php echo $marcador1->obtenerPuntos(); ?></p>
        <p><?php echo $marcador2->obtenerPuntos(); ?></p>
    </div>

    <?php
        $marcador1->reiniciar();
    ?>

    <div>
        <h2>Segunda Impresión de marcador</h2>
        <p><?php echo $marcador1->obtenerPuntos(); ?></p>
        <p><?php echo $marcador2->obtenerPuntos(); ?></p>
    </div>

</body>
</html>

//no utilizo echo con el resultado de reiniciar porque reinciar al ser un procedimiento no devuelve nada.