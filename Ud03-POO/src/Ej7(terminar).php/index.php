<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7 PHP</title>
</head>
<body>
    <header>
        <h1>Ejercicio 7 - Bloque 2</h1>
    </header>

    <?php

    require_once __DIR__ . '/cuentaBancaria.php';

    $cuenta1 = new CuentaBancaria('Juan Perez');

    $cuenta1->ingresar(100);
    
    ?>

    <div>
        <h2>Primera Operación</h2>
        <?php $cuenta1->ingresar(100); ?>
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

