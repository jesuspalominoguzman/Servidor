<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 45 PHP</title>
</head>
<body>
    <header>
        <h1>Ejercicio 45 - Comprobar antes de convertir</h1>
    </header>

    <form action="" method="post">
        <div>
            <label for="edad">Indique su edad:</label>
            <input type="text" name="edad" id="edad">
        </div>
        <button type="submit">Enviar</button>
    </form>

    <?php
    /*
     Convertir no sustituye a validar porque forzar el tipado (ej. (int)'hola') convierte la cadena
     silenciosamente a 0 en lugar de avisar al usuario de que el dato introducido es incorrecto.
    */
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['edad'])) {
            $edadOriginal = trim($_POST['edad']);
            
            if (ctype_digit($edadOriginal)) {
                $edadEntera = (int)$edadOriginal;
                if ($edadEntera >= 0 && $edadEntera <= 120) {
                    echo "<p>Edad válida: $edadEntera</p>";
                    echo "<pre>";
                    echo "Original:\n";
                    var_dump($edadOriginal);
                    echo "Convertida:\n";
                    var_dump($edadEntera);
                    echo "</pre>";
                } else {
                    echo "<p style='color:red;'>Error: La edad debe estar entre 0 y 120.</p>";
                }
            } else {
                echo "<p style='color:red;'>Error: Introduzca únicamente dígitos.</p>";
            }
        }
    }
    ?>
    <hr>
    <h3>Pruebas de conversión forzada:</h3>
    <pre>
    <?php
    var_dump((int)'hola');
    var_dump((int)12.9);
    var_dump((float)'12.5');
    var_dump((string)20);
    ?>
    </pre>

    <p>
        Documentación: <a href="https://www.php.net/manual/es/function.ctype-digit.php" target="_blank">ctype_digit()</a><br>
        Recibe una cadena (string) y devuelve un booleano (true si todos los caracteres son dígitos numéricos, false en caso contrario).
    </p>
</body>
</html>