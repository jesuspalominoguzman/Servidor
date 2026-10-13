<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej 22 PHP</title>
</head>
<body>

    <header>
        <h1>Ejercicio 22 - Bloque 5</h1>
    </header>
    
    <?php

    $lenguajes = [];

    echo "<ul>";
    for ($i= 0; $i < 20; $i++) {

        $lenguajes[] = rand(0, 99);
        echo "<li>" . $lenguajes[$i] . "</li>";

    }
    echo "</ul>";

    $min = 99;
    $max = 0;
    $media= 0;

    foreach ($lenguajes as $lenguaje) {
        if ($lenguaje < $min) {
            $min = $lenguaje;
        }
        if ($lenguaje > $max) {
            $max = $lenguaje;
        }

        $media = $media + $lenguaje;

    }

    $media = $media / count($lenguajes);

    echo "<br>Mínimo: " . $min . "<br>";
    echo "<br>Máximo: " . $max . "<br>";
    echo "<br>Media: " . $media . "<br>";
    
    ?>
</body>
</html>