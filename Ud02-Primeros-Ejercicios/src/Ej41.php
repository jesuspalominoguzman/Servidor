<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 41 PHP</title>
</head>
<body>
    <header>
        <h1>Ejercicio 41 - Mensaje con saltos de línea</h1>
    </header>

    <form action="" method="post">
        <div>
            <label for="mensaje">Mensaje:</label><br>
            <textarea name="mensaje" id="mensaje" rows="5" cols="30"></textarea>
        </div>
        <button type="submit">Enviar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['mensaje']) && is_string($_POST['mensaje'])) {
            $msj = trim($_POST['mensaje']);
            if ($msj !== "") {
                /*
                 Primero se escapa el texto para neutralizar etiquetas maliciosas ingresadas por el usuario.
                 Después se usa nl2br() para insertar las etiquetas <br> seguras generadas por PHP.
                 Si se invierte el orden, htmlspecialchars neutralizaría también los <br> que insertó nl2br.
                */
                $msjSeguro = htmlspecialchars($msj);
                $msjFormateado = nl2br($msjSeguro);
                echo "<h3>Mensaje recibido:</h3>";
                echo "<p>$msjFormateado</p>";
            } else {
                echo "<p style='color:red;'>Error: El mensaje está vacío.</p>";
            }
        } else {
            echo "<p style='color:red;'>Error: Dato inválido.</p>";
        }
    }
    ?>
</body>
</html>