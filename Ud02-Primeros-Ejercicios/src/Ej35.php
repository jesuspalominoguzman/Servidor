<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 35 PHP</title>
</head>
<body>
    <header>
        <h1>Ejercicio 35 - Cantidad variable de números</h1>
    </header>
    <?php
    /*
     En la definición de sumarVarios, el operador ... (splat/spread) agrupa todos los argumentos pasados en un array.
     En la llamada a multiplicar, el operador ... desempaqueta los elementos del array para pasarlos como argumentos individuales.
    */
    function sumarVarios(int ...$numeros): int {
        $suma = 0;
        foreach ($numeros as $num) {
            $suma += $num;
        }
        return $suma;
    }

    echo "<p>Suma sin argumentos: " . sumarVarios() . "</p>";
    echo "<p>Suma con un argumento: " . sumarVarios(5) . "</p>";
    echo "<p>Suma con tres argumentos: " . sumarVarios(5, 10, 15) . "</p>";

    function multiplicar(int $a, int $b): int {
        return $a * $b;
    }

    $factores = [4, 5];
    echo "<p>Multiplicar desempaquetando array: " . multiplicar(...$factores) . "</p>";

    echo "<p>Llamada con argumento con nombre: " . multiplicar(b: 10, a: 3) . "</p>";
    ?>
</body>
</html>