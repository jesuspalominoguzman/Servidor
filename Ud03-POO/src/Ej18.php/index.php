<?php
declare(strict_types=1);

require_once __DIR__ . '/Figura.php';
require_once __DIR__ . '/Rectangulo.php';
require_once __DIR__ . '/Circulo.php';

function obtenerArea(Figura $figura): float
{
    return $figura->calcularArea();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 18 – Figuras abstractas</title>
</head>
<body>
<h1>Ejercicio 18 – Clase abstracta Figura</h1>

<?php
$rectangulo = new Rectangulo(5.0, 3.0);
$circulo    = new Circulo(2.0);

$figuras = [$rectangulo, $circulo];
$nombres = ['Área del rectángulo', 'Área del círculo'];

$sumaAreas = 0.0;
foreach ($figuras as $i => $figura) {
    $area = obtenerArea($figura);
    $sumaAreas += $area;
    echo '<p>' . $nombres[$i] . ': ' . number_format($area, 2, ',', '.') . '</p>';
}

echo '<p>Suma de áreas: ' . number_format($sumaAreas, 2, ',', '.') . '</p>';

/*
 * RESPUESTAS:
 * - No podemos hacer new Figura() porque es abstracta; existe para definir
 *   un tipo común, no para instanciarse directamente.
 * - Si una hija concreta no implementa calcularArea(), PHP la trataría como abstracta
 *   también y no podría instanciarse.
 */
?>
</body>
</html>
