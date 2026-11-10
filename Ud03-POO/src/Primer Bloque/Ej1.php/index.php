<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 PHP</title>
</head>
<body>
    <header>
        <h1>Ejercicio 1 - Bloque 1</h1>
    </header>

    <?php

    require_once __DIR__ . '/libro.php';

    $libro1 = new Libro();
    $libro1->titulo = 'El libro de la vida';
    $libro1->autor = 'Juan Perez';
    $libro1->paginas = 100;

    $libro2 = new Libro();
    $libro2->titulo = 'El libro de la muerte';
    $libro2->autor = 'Lola Perez';
    $libro2->paginas = 200;
    
    ?>

    <div>
        <h2>Primera Impresión de primer libro</h2>
        <p><?php echo $libro1->obtenerFicha(); ?></p>
    </div>

    <div>
        <h2>Primera Impresión de segundo libro</h2>
        <p><?php echo $libro2->obtenerFicha(); ?></p>
    </div>

    <?php 

        $libro1->titulo = 'El libro';
        $libro1->autor = 'Juan';
        $libro1->paginas = 10;

    ?>

    <div>
        <h2>Segunda Impresión de primer libro</h2>
        <p><?php echo $libro1->obtenerFicha(); ?></p>
    </div>

    <div>
        <h2>Segunda Impresión de segundo libro</h2>
        <p><?php echo $libro2->obtenerFicha(); ?></p>
    </div>



</body>
</html>

//La clase que hemos creado es libro, del cual hemos instanciado dos objetos (libro1 y libro2).

// El this es una forma de obtener datos del objeto en el que nos encontramos al momento de asignar valores 
// dentro de la clase, pues la clase no sabe el nombre del objeto que hemos creado, por lo que se llama a sí misma.

