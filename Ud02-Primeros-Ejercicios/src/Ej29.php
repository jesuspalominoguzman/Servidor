<?php

    function saludar(string $nombre): string {
        return "Hola, " . $nombre . "!";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej 29 PHP</title>
</head>
<body>


    <header>
        <h1>Ejercicio 29 - Bloque 6</h1>
    </header>



    <ul>
        <li><?php echo saludar("Pablo"); ?></li>
        <li><?php echo saludar("Rafa"); ?></li>
        <li><?php echo saludar("Palomino"); ?></li>
    </ul>
    
</body>
</html>