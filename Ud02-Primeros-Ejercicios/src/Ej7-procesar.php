<?php

$nombre  = $_GET['nombre'] ?? '';
$apellido1  = $_GET['primerapellido'] ?? '';
$apellido2  = $_GET['segundoapellido'] ?? '';
$correo  = $_GET['correo'] ?? '';
$año  = $_GET['año'] ?? '';
$telefono  = $_GET['telefono'] ?? '';

$nombreHtml = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');
$apellido1Html = htmlspecialchars($apellido1, ENT_QUOTES, 'UTF-8');
$apellido2Html = htmlspecialchars($apellido2, ENT_QUOTES, 'UTF-8');
$correoHtml = htmlspecialchars($correo, ENT_QUOTES, 'UTF-8');
$añoHtml = htmlspecialchars($año, ENT_QUOTES, 'UTF-8');
$telefonoHtml = htmlspecialchars($telefono, ENT_QUOTES, 'UTF-8');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesamiento del EJ7</title>
</head>
<body>

    <table border="5">
      
        <thead>
            <th>Dato</th>
            <th>Valor</th>
        </thead>

        <tr>
            <td>Nombre</td>
            <td><?=  $nombreHtml ?></td>
        </tr>

        <tr>
            <td>Primera apellido</td>
            <td><?=  $apellido1Html ?></td>
        </tr>

        <tr>
            <td>Segundo apellido</td>
            <td><?=  $apellido2Html ?></td>
        </tr>     
        
        
        
        <tr>
            <td>Correo</td>
            <td><?=  $correoHtml ?></td>
        </tr>      
        
        <tr>
            <td>Año</td>
            <td><?=  $añoHtml ?></td>
        </tr>

        <tr>
            <td>Telefono</td>
            <td><?=  $telefonoHtml ?></td>
        </tr>


    </table>
    
</body>
</html>

