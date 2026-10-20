<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 36 PHP</title>
</head>
<body>
    <header>
        <h1>Ejercicio 36 - Funciones como valores</h1>
    </header>
    <?php
    function duplicar(int $n): int {
        return $n * 2;
    }
    $funcDuplicar = 'duplicar';

    $funcTriplicar = function(int $n): int {
        return $n * 3;
    };

    $numero = 5;
    echo "<p>Número original: $numero</p>";
    echo "<p>Duplicado: " . $funcDuplicar($numero) . "</p>";
    echo "<p>Triplicado: " . $funcTriplicar($numero) . "</p>";

    $incremento = 10;
    $funcFlecha = fn(int $n): int => $n + $incremento;

    echo "<p>Suma con flecha (captura \$incremento del exterior): " . $funcFlecha($numero) . "</p>";
    ?>
</body>
</html>