<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej15 PHP</title>
</head>
<body>
    <header>
        <h1>Ejercicio 15 - Bloque 4</h1>
    </header>


    <section>
        
        <h1> Con while </h1>

        <?php

        $numero = 3;

        while ($numero <= 5) {
            echo "<p> $numero </p>";
            $numero++;
        }

        ?>
    
    </section>


    <section>

        <h1> Con do while </h1>


        <?php
        $numero = 3;

        do{
            echo "<p> $numero </p>";
            $numero++;
        }while ($numero <= 5);


        ?>

    </section>

</body>
</html>