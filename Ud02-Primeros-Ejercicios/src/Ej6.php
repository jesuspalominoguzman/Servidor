<?php 
$puntos = 40;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej6 PHP</title>
</head>

<header>
    <h1>Ejercicio 05 - Bloque 1</h1>
</header>
<body>

    <section>
        <p>
            Puntos despues de ganar = <?= $puntos += 15 ?>
        </p>
    </section>

    <section>
         <p>
            Puntos despues de perder = <?= $puntos -= 8 ?>
        </p>
    </section>


    <section>
         <p>
            Primera comprobación = <?php var_dump($puntos >40 && $puntos <50) ?>
        </p>
    </section>

    <section>
         <p>
            Segunda comprobación = <?php var_dump($puntos <30 || $puntos >45) ?>
        </p>
    </section>


    
</body>
</html>