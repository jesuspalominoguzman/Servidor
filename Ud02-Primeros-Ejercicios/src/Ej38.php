<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 38 PHP</title>
</head>
<body>
    <header>
        <h1>Ejercicio 38 - Preparar y analizar un nombre</h1>
    </header>
    <?php
    $original = ' María Muñoz ';
    $limpioTrim = trim($original);
    $limpioLtrim = ltrim($original);
    $limpioRtrim = rtrim($original);

    echo "<p>Original: [" . htmlspecialchars($original) . "]</p>";
    echo "<p>trim: [" . htmlspecialchars($limpioTrim) . "]</p>";
    echo "<p>ltrim: [" . htmlspecialchars($limpioLtrim) . "]</p>";
    echo "<p>rtrim: [" . htmlspecialchars($limpioRtrim) . "]</p>";

    /*
     strlen() cuenta bytes, por lo que caracteres multibyte como 'ñ' ocupan más de uno.
     mb_strlen() cuenta caracteres reales según la codificación indicada.
    */
    echo "<p>Longitud strlen: " . strlen($limpioTrim) . "</p>";
    echo "<p>Longitud mb_strlen: " . mb_strlen($limpioTrim, 'UTF-8') . "</p>";

    echo "<p>Mayúsculas: " . htmlspecialchars(mb_strtoupper($limpioTrim, 'UTF-8')) . "</p>";
    echo "<p>Minúsculas: " . htmlspecialchars(mb_strtolower($limpioTrim, 'UTF-8')) . "</p>";
    echo "<p>Dos primeros caracteres: " . htmlspecialchars(mb_substr($limpioTrim, 0, 2, 'UTF-8')) . "</p>";

    echo "<hr>";
    echo "<p>strtoupper('Hola PHP'): " . strtoupper('Hola PHP') . "</p>";
    echo "<p>strtolower('Hola PHP'): " . strtolower('Hola PHP') . "</p>";
    
    $cadena2 = 'ABC12345';
    echo "<p>substr ABC: " . substr($cadena2, 0, 3) . "</p>";
    echo "<p>substr 12345: " . substr($cadena2, 3) . "</p>";
    echo "<p>substr 45: " . substr($cadena2, -2) . "</p>";
    ?>
</body>
</html>