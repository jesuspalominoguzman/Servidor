<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 44 PHP</title>
</head>
<body>
    <header>
        <h1>Ejercicio 44 - ¿Qué tipo tiene cada dato?</h1>
    </header>
    <?php
    /*
     '20' es numérico (is_numeric) porque PHP puede convertirlo en un número válido para operaciones,
     pero no tiene tipo int porque estrictamente es un string.
     '-3' es numérico, pero no está formado exclusivamente por dígitos (ctype_digit) porque contiene el carácter de signo '-'.
    */
    $valores = [20, '20', 20.5, '12.5', 'hola', false, null, ['PHP', 'JS']];

    foreach ($valores as $v) {
        echo "<pre>";
        echo "Tipo: " . gettype($v) . "\n";
        var_dump($v);
        echo "is_int: " . (is_int($v) ? 'Sí' : 'No') . " | ";
        echo "is_float: " . (is_float($v) ? 'Sí' : 'No') . " | ";
        echo "is_string: " . (is_string($v) ? 'Sí' : 'No') . " | ";
        echo "is_bool: " . (is_bool($v) ? 'Sí' : 'No') . " | ";
        echo "is_array: " . (is_array($v) ? 'Sí' : 'No') . " | ";
        echo "is_null: " . (is_null($v) ? 'Sí' : 'No') . " | ";
        echo "is_numeric: " . (is_numeric($v) ? 'Sí' : 'No');
        echo "</pre><hr>";
    }

    $cadenas = ['20', '0', '-3', '12.5', '', '12,5'];
    echo "<table border='1'><tr><th>Cadena</th><th>is_numeric</th><th>ctype_digit</th></tr>";
    foreach ($cadenas as $c) {
        echo "<tr>";
        echo "<td>'$c'</td>";
        echo "<td>" . (is_numeric($c) ? 'Sí' : 'No') . "</td>";
        echo "<td>" . (ctype_digit($c) ? 'Sí' : 'No') . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>