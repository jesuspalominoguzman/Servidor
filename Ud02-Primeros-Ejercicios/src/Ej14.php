<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej14 PHP</title>
</head>
<body>
    <header>
        <h1>Ejercicio 14 - Bloque 4</h1>
    </header>

    <ul>
        <?php

        $contador = 10;

        while ($contador >= 0) {
            echo "<li> $contador </li>";
            $contador--;
        }

        ?>
    </ul>

    <p> Despegue! </p>

</body>
</html>