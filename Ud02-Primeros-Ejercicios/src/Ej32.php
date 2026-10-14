<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej 32 PHP</title>
</head>
<body>


    <header>
        <h1>Ejercicio 32 - Bloque 6</h1>
    </header>

    <form action="" method="post">

        <div>
        <label for="numero">Indique el precio</label>
        <input type="numero" name="precio" id="numero">
        </div>

        <div>
        <label for="numero">Indique el porcentaje dex descuento</label>
        <input type="numero" name="descuento" id="numero">
        </div>

        <button type="submit">Confirmar</button>
        
    </form>

    <?php
     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['precio']) && isset($_POST['descuento'])) {
        
        $pregunta = $_POST['pregunta'] ?? '';

        $pregunta = htmlspecialchars($pregunta);

        $pregunta = trim($pregunta);

        $respuestas = [
            "Muy bien gracias",
            "No estoy seguro",
            "Me parece bien",
            "Me parece mal",
            "Estoy seguro",
            "No estoy seguro",
            "Muy mal gracias",
            "No lo se"

        ];
        
        if ($pregunta != ""){

            echo "Pregunta recibida: " . $pregunta . "<br>";
            echo "Respuesta recibida: " . $respuestas[rand(0, count($respuestas) - 1)] . "<br>";

        }else{
            echo "No se ha recibido ninguna pregunta";
        }

     }

    ?>
    
</body>
</html>