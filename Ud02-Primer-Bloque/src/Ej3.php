<?php

$nombre = "Jesus";
$apellido1 = "Palomino";
$apellido2 = "Guzmán";
$correo = "77jesuspg@gmail.com";
$año = 2005;
$telefono = 675483841


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 PHP</title>
</head>

<header>
    <h1>Ejercicio 03 - Bloque 1</h1>
</header>

<body>

    <table border="5">
      
        <thead>
            <th>Dato</th>
            <th>Valor</th>
        </thead>

        <tr>
            <td>Nombre</td>
            <td><?=  $nombre ?></td>
        </tr>

        <tr>
            <td>Apellido 1</td>
            <td><?=  $apellido1 ?></td>
        </tr>

        <tr>
            <td>Apellido 2</td>
            <td><?=  $apellido2 ?></td>
        </tr>     
        
        
        
        <tr>
            <td>Correo</td>
            <td><?=  $correo ?></td>
        </tr>      
        
        <tr>
            <td>Año</td>
            <td><?=  $año ?></td>
        </tr>

        <tr>
            <td>Telefono</td>
            <td><?=  $telefono ?></td>
        </tr>


    </table>
    
</body>
</html>