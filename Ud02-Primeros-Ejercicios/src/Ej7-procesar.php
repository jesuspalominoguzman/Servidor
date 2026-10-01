<?php

$nombre  = $_GET['nombre'] ?? '';
$apellido1  = $_GET['primerapellido'] ?? '';
$apellido2  = $_GET['segundoapellido'] ?? '';
$correo  = $_GET['correo'] ?? '';
$año  = $_GET['año'] ?? '';
$telefono  = $_GET['telefono'] ?? '';


$nombreHtml = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');


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
        <?php 
        

        
        ?>
    </section>
    
</body>
</html>

