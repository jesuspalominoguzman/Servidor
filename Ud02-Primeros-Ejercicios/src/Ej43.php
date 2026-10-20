<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 43 PHP</title>
</head>
<body>
    <header>
        <h1>Ejercicio 43 - Tiradas de dados y estadísticas</h1>
    </header>
    <?php
    /*
     Ahora podemos usar min() y max() directamente pasando el array de tiradas.
     En el bloque anterior no podíamos hacerlo fácilmente porque evaluábamos elementos aislados en un bucle lógico 
     en lugar de tener toda la colección disponible en un array.
    */
    $tiradas = [];
    for ($i = 0; $i < 10; $i++) {
        $tiradas[] = rand(1, 6);
    }

    echo "<ul>";
    foreach ($tiradas as $t) {
        echo "<li>Tirada: $t</li>";
    }
    echo "</ul>";

    $menor = min($tiradas);
    $mayor = max($tiradas);

    $suma = 0;
    foreach ($tiradas as $t) {
        $suma += $t;
    }
    $media = $suma / count($tiradas);

    echo "<p>Menor: $menor</p>";
    echo "<p>Mayor: $mayor</p>";
    echo "<p>Media: " . number_format($media, 2) . "</p>";
    ?>
</body>
</html>