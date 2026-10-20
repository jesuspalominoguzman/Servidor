<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 39 PHP</title>
</head>
<body>
    <header>
        <h1>Ejercicio 39 - Buscar sin perder la posición cero</h1>
    </header>
    <?php
    $texto = 'PHP y Laravel';
    $busquedas = ['PHP', 'Laravel', 'Python'];

    /*
     La posición 0 indica que la subcadena empieza en el primer carácter.
     Si se usa == false, PHP convierte 0 a false y parecería que falló.
     Por eso hay que usar === false para distinguir el booleano del entero 0.
    */
    foreach ($busquedas as $palabra) {
        $pos = strpos($texto, $palabra);
        if ($pos === false) {
            echo "<p>'$palabra': No encontrado</p>";
        } else {
            echo "<p>'$palabra': Posición $pos</p>";
        }
    }

    $archivo = 'ejercicio.php';
    echo "<h3>Pruebas con '$archivo'</h3>";
    echo "<p>Contiene 'ejercicio': " . (str_contains($archivo, 'ejercicio') ? 'Sí' : 'No') . "</p>";
    echo "<p>Empieza por 'ej': " . (str_starts_with($archivo, 'ej') ? 'Sí' : 'No') . "</p>";
    echo "<p>Termina en '.php' o '.html': " . ((str_ends_with($archivo, '.php') || str_ends_with($archivo, '.html')) ? 'Sí' : 'No') . "</p>";

    /*
     Al usar 'Ejercicio.PHP', las funciones devuelven 'No' porque son sensibles a mayúsculas y minúsculas (case-sensitive).
    */
    $archivo2 = 'Ejercicio.PHP';
    echo "<h3>Pruebas con '$archivo2'</h3>";
    echo "<p>Contiene 'ejercicio': " . (str_contains($archivo2, 'ejercicio') ? 'Sí' : 'No') . "</p>";
    ?>
</body>
</html>