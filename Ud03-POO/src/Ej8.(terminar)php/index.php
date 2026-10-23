<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8 PHP</title>
</head>
<body>
    <header>
        <h1>Ejercicio 8 - Bloque 2</h1>
    </header>

    <?php

    require_once __DIR__ . '/Producto.php';

    $producto1 = new Producto('Teclado', 25);
    
    ?>

    <div>
        <h2>Primera Operación</h2>
        <p>Saldo: <?php echo $cuenta1->getSaldo(); ?></p>
    </div>

    <div>
        <h2>Segunda Operación</h2>

        <p>Se acepta? <?php echo $cuenta1->ingresar(50); ?></p>

        <p>Saldo: <?php echo $cuenta1->getSaldo(); ?></p>

    </div>

    <div>
        <h2>Tercera Operación</h2>
        <?php $cuenta1->retirar(100); ?>
        <p>Saldo: <?php echo $cuenta1->getSaldo(); ?></p>
    </div>  





    



</body>
</html>

