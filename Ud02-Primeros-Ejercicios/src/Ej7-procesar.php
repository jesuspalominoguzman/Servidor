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

    <section>

        <h1>Datos del formulario</h1>
        <p>Nombre: <?= $nombreHtml ?></p>
        <p>Primera apellido: <?= $apellido1Html ?></p>
        <p>Segunda apellido: <?= $apellido2Html ?></p>
        <p>Correo: <?= $correoHtml ?></p>
        <p>Año de nacimiento: <?= $añoHtml ?></p>        
        <p>Telefono: <?= $telefonoHtml ?></p>
    </section>
    
</body>
</html>

