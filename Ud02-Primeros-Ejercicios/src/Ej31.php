<?php

    $numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

    function calcularMedia(array $numeros): float {

        $media = 0;

        foreach ($numeros as $numero) {

            $media += $numero;

        }

        return $media / count($numeros);

    }

    function contarMayoresQue(array $numeros, int $limite): int {

        $contador = 0;
        foreach ($numeros as $numero) {

            if ($numero > $limite) {

                $contador++;
            }
        }

        return $contador;
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej 31 PHP</title>
</head>
<body>


    <header>
        <h1>Ejercicio 31 - Bloque 6</h1>
    </header>


    <h1> Media de los números de 1 a 10</h1>

    <p>La media es <?php echo calcularMedia($numeros); ?></p>

    <h1> Números mayores que 5</h1> 

    <p>Hay <?php echo contarMayoresQue($numeros, 5); ?> números mayores que 5</p>
    
</body>
</html>