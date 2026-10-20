<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 40 PHP</title>
</head>
<body>
    <header>
        <h1>Ejercicio 40 - Sustituir, separar y reunir</h1>
    </header>
    <?php
    $texto = 'PHP, JavaScript, PHP, Python';
    $cambios = 0;
    $nuevoTexto = str_replace('PHP', 'Laravel', $texto, $cambios);

    echo "<p>Original: " . htmlspecialchars($texto) . "</p>";
    echo "<p>Nuevo: " . htmlspecialchars($nuevoTexto) . "</p>";
    echo "<p>Sustituciones: $cambios</p>";

    $arraySeparado = explode(',', $nuevoTexto);
    $arrayLimpio = [];

    echo "<ul>";
    foreach ($arraySeparado as $item) {
        $limpio = trim($item);
        $arrayLimpio[] = $limpio;
        echo "<li>" . htmlspecialchars($limpio) . "</li>";
    }
    echo "</ul>";

    $textoFinal = implode(' · ', $arrayLimpio);
    echo "<p>Unido: " . htmlspecialchars($textoFinal) . "</p>";
    echo "<p>Elementos totales: " . count($arrayLimpio) . "</p>";
    ?>
</body>
</html>