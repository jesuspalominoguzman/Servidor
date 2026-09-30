<?php

$numero = 10;
$texto = "10";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5 PHP</title>
</head>

<header>
    <h1>Ejercicio 05 - Bloque 1</h1>
</header>

<body>

    <section>
        <p>Tipo y valor de variables</p>
        <?php var_dump($numero) ?>
        <?php var_dump($texto) ?>
    </section>

    <section>
        <p>Comparaciones</p>
        <?php var_dump($numero == $texto) ?>
        <?php var_dump($numero === $texto) ?>
        <?php var_dump($numero != $texto) ?>
        <?php var_dump($numero !== $texto) ?>

        <p>Al comparar valores con == solo mira si el número es el mismo</p>
        <p>Al comparar valores con === además de comprobar el número, también comprueba el tipo</p>
        <p>En este caso el numero es == al texto porque contienen el mismo valor</p>
        <p>Pero el numero no es === al texto porque pese a tener el mismo valor, lo tienen en distinto tipo</p>
    </section>
    
</body>
</html>