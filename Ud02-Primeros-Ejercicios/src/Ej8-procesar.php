<?php

$nombre  = $_POST['nombre'] ?? '';
$genero  = $_POST['genero'] ?? '';
$pais  = $_POST['pais'] ?? '';
$mensajes = isset($_POST['mensajes']) ? 'Sí' : 'No';
$tema  = $_POST['tema'] ?? '';

$nombreHtml = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');
$generoHtml = htmlspecialchars($genero, ENT_QUOTES, 'UTF-8');
$paisHtml = htmlspecialchars($pais, ENT_QUOTES, 'UTF-8');
$mensajesHtml = htmlspecialchars($mensajes, ENT_QUOTES, 'UTF-8');
$temaHtml = htmlspecialchars($tema, ENT_QUOTES, 'UTF-8');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesamiento del EJ8</title>
</head>
<body>

    <section>

        <h1>Datos del formulario</h1>
        <p>Nombre: <?= $nombreHtml ?></p>
        <p>Genero: <?= $generoHtml ?></p>
        <p>pais: <?= $paisHtml ?></p>
        <p>Mensajes: <?= $mensajesHtml ?></p>
        <p>Tema: <?= $temaHtml ?></p>
    </section>
    
</body>
</html>

