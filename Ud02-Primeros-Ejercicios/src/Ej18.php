    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej18 PHP</title>
</head>

<body>
    <header>
        <h1>Ejercicio 18 - Bloque 4</h1>
    </header>


    <?php

        for($i = 1; $i <= 20; $i++) {

            if($i == 12) {
                break;
            }
            if($i % 3 == 0) {
                continue;
            }
            echo "Numero " . $i . "<br>";


        }

    ?>


</body>
</html>