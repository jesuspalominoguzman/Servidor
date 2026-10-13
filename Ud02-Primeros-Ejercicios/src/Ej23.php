<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej 23 PHP</title>
</head>
<body>


    <header>
        <h1>Ejercicio 23 - Bloque 5</h1>
    </header>

    <form action="" method="post">
        <label for="texto">Haz una pregunta</label>
        <input type="texto" name="pregunta" id="texto">
        <button type="submit">Confirmar</button>
    </form>

    <?php
     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pregunta'])) {
        
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