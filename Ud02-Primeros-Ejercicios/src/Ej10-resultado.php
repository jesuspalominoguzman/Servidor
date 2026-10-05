<?php

$primernumero  = $_POST['primernumero'] ?? '';
$segundonumero  = $_POST['segundonumero'] ?? '';
$tercernumero  = $_POST['tercernumero'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej10 Resultado</title>
</head>
<body>

    <section>

    <h1>Resultado mediante bucles anidados</h1>

    <?php

        if ($primernumero > $segundonumero){

            if ($primernumero > $tercernumero) {
                echo "El primer número es el mayor";
            } else {
                echo "El tercer número es el mayor";
            }

        }else {
            if ($segundonumero > $tercernumero) {
                echo "El segundo número es el mayor";
            } else {
                echo "El tercer número es el mayor";
            }
        }
    
    ?>

    <h1>Resultado mediante operadores lógicos</h1>
    <?php 

        if ($primernumero > $segundonumero && $primernumero > $tercernumero) {
            echo "El primer número es el mayor";
        } else if ($segundonumero > $primernumero && $segundonumero > $tercernumero) {
            echo "El segundo número es el mayor";
        } else 
            echo "El tercer número es el mayor";

    ?>

    </section>
    
</body>
</html>