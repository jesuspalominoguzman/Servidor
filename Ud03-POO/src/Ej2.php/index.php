<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 PHP</title>
</head>
<body>
    <header>
        <h1>Ejercicio 2 - Bloque 1</h1>
    </header>

    <?php

    require_once __DIR__ . '/rectangulo.php';

    $rectangulo1 = new Rectangulo();
    $rectangulo1->base = 5.0;
    $rectangulo1->altura = 3.0;

    $rectangulo2 = new Rectangulo();
    $rectangulo2->base = 4.0;
    $rectangulo2->altura = 4.0;

    ?>

    <div>
        <h2>Impresión de primer rectangulo</h2>
        <p><?php echo $rectangulo1->calcularArea(); ?></p>
        <p><?php echo $rectangulo1->calcularPerimetro(); ?></p>
        <p><?php echo $rectangulo1->esCuadrado() ? 'Sí' : 'No'; ?></p>
    </div>

    <div>
        <h2>Impresión de segundo rectangulo</h2>
        <p><?php echo $rectangulo2->calcularArea(); ?></p>
        <p><?php echo $rectangulo2->calcularPerimetro(); ?></p>
        <p><?php echo $rectangulo2->esCuadrado() ? 'Sí' : 'No'; ?></p>
    </div>

</body>
</html>

