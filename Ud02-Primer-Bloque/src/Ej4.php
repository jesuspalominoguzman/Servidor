<?php

$precio = 25;
$unidades = 4;
$descuento = 10;


$IVA = 21;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 PHP</title>

</head>

<header>
    <h1>Ejercicio 04 - Bloque 1</h1>
</header>

<body>

    <section>
        <p>
            Valor del subtotal = <?= $subtotal = $precio * $unidades ?>
        </p>

        <p>
            Valor del importe descontado = <?= $importe_descontado = ($subtotal * $descuento)/100 ?>
        </p>

        <p>
            Valor de la base tras el descuento = <?= $base_descontada = $subtotal - $importe_descontado ?>
        </p>

        <p>
            Valor del importe del IVA = <?= $importe_IVA = ($base_descontada * $IVA)/100 ?>
        </p>
                
        <p>
            Valor del total final = <?= $total_final = $base_descontada + $importe_IVA ?>
        </p>

    </section>
    
</body>
</html>