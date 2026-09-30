<?php

$x = 166;
$y = 999;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 PHP</title>
</head>

<header>
    <h1>Ejercicio 02 - Bloque 1</h1>
</header>

<body>

    <main>

        <section>
            <p>Valor de las variables de base</p>

                <p>Valor de la x = <?= $x ?> </p>
                <p>Valor de la y = <?= $y ?> </p>

        </section>
        
         <section>
            <p>Valor de la suma de las variables</p>

                <p><?= $x + $y?> </p>

        </section>

        
        <section>
            <p>Valor de la resta de las variables</p>

                <p><?= $x - $y?> </p>

        </section>

                
        <section>
            <p>Valor de la multiplicación de las variables</p>

                <p><?= $x * $y?> </p>

        </section>

                
        <section>
            <p>Valor de la división de las variables</p>

                <p><?= $x / $y?> </p>

        </section>


    </main>
    
</body>
</html>