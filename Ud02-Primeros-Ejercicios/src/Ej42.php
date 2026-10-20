<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 42 PHP</title>
</head>
<body>
    <header>
        <h1>Ejercicio 42 - Laboratorio de cálculos y redondeo</h1>
    </header>
    <?php
    /*
     Redondear hacia abajo un negativo (floor de -7.1 es -8) no es lo mismo que quitar los decimales (que daría -7), 
     porque floor busca el entero inferior más cercano, y -8 es menor que -7.1.
    */
    ?>
    <table border="1">
        <tr><th>Operación</th><th>Resultado</th></tr>
        <tr><td>abs(-8)</td><td><?= abs(-8) ?></td></tr>
        <tr><td>abs(8)</td><td><?= abs(8) ?></td></tr>
        <tr><td>abs(0)</td><td><?= abs(0) ?></td></tr>
        <tr><td>pow(2, 3)</td><td><?= pow(2, 3) ?></td></tr>
        <tr><td>pow(7, 0)</td><td><?= pow(7, 0) ?></td></tr>
        <tr><td>sqrt(81)</td><td><?= sqrt(81) ?></td></tr>
        <tr><td>round(7.46)</td><td><?= round(7.46) ?></td></tr>
        <tr><td>round(7.56)</td><td><?= round(7.56) ?></td></tr>
        <tr><td>round(7.456, 2)</td><td><?= round(7.456, 2) ?></td></tr>
        <tr><td>floor(7.9)</td><td><?= floor(7.9) ?></td></tr>
        <tr><td>ceil(7.9)</td><td><?= ceil(7.9) ?></td></tr>
        <tr><td>floor(-7.1)</td><td><?= floor(-7.1) ?></td></tr>
        <tr><td>ceil(-7.1)</td><td><?= ceil(-7.1) ?></td></tr>
    </table>

    <?php
    $num = 1234.567;
    $redondeado = round($num, 2);
    $formateado = number_format($num, 2, ',', '.');
    
    echo "<h3>Resultados de 1234.567:</h3>";
    echo "<pre>";
    var_dump($redondeado);
    var_dump($formateado);
    echo "</pre>";
    ?>
</body>
</html>