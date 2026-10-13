<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej 21 PHP</title>
</head>
<body>

    <header>
        <h1>Ejercicio 21 - Bloque 5</h1>
    </header>
    
    <?php

    $lenguajes = ['PHP ', 'JavaScript', 'Python'];

    echo "<br>" . $lenguajes[0] . "<br>";
    echo "<br>" . $lenguajes[1] . "<br>";

    $lenguajes[1] = 'Java';

    $lenguajes[] = 'CSharp';

    echo "<ul>";
    foreach ($lenguajes as $lenguaje) {
        echo "<li>" . $lenguaje . "</li>";
    }

    echo "</ul>";

    print_r($lenguajes);

    ?>
</body>
</html>