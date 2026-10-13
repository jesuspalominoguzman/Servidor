<?php

    function aplicarDescuento(float $precio, float $porcentaje): float {

        $descuento = ($precio * $porcentaje) / 100;

        return $precio - $descuento;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej 30 PHP</title>
</head>
<body>


    <header>
        <h1>Ejercicio 20 - Bloque 6</h1>
    </header>



    <table border="1">
        <tr>
            <th>Precio</th>
            <th>Descuento</th>
            <th>Total</th>
        </tr>
        <tr>
            <td>80</td>
            <td>25%</td>
            <td><?php echo aplicarDescuento(80, 25); ?></td>
        </tr>
        <tr>
            <td>100</td>
            <td>20%</td>
            <td><?php echo aplicarDescuento(100, 20); ?></td>
        </tr>
        <tr>
            <td>100</td>
            <td>25%</td>
            <td><?php echo aplicarDescuento(100, 25); ?></td>
        </tr>
    </table>
    
</body>
</html>