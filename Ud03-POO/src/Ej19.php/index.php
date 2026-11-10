<?php
declare(strict_types=1);

require_once __DIR__ . '/Producto.php';
require_once __DIR__ . '/ProductoFisico.php';
require_once __DIR__ . '/ProductoDigital.php';

function obtenerTotal(Producto $producto): float
{
    return $producto->calcularTotal();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 19 – Catálogo</title>
</head>
<body>
<h1>Ejercicio 19 – Catálogo de productos físicos y digitales</h1>

<?php
$productos = [
    new ProductoFisico('Teclado',   25.0,  0.5),
    new ProductoDigital('Curso PHP', 20.0),
    new ProductoFisico('Monitor',   180.0, 4.0),
];

echo '<table border="1" cellpadding="6">';
echo '<tr><th>Descripción</th><th>Precio</th><th>Envío</th><th>Total</th></tr>';

$sumaTotal = 0.0;
foreach ($productos as $producto) {
    $envio = $producto->calcularGastosEnvio();
    $total = obtenerTotal($producto);
    $sumaTotal += $total;
    echo '<tr>';
    echo '<td>' . htmlspecialchars($producto->obtenerDescripcion(), ENT_QUOTES, 'UTF-8') . '</td>';
    echo '<td>' . number_format($producto->getPrecio(), 2, ',', '.') . ' €</td>';
    echo '<td>' . number_format($envio, 2, ',', '.') . ' €</td>';
    echo '<td>' . number_format($total, 2, ',', '.') . ' €</td>';
    echo '</tr>';
}

echo '</table>';
echo '<p><strong>Suma total: ' . number_format($sumaTotal, 2, ',', '.') . ' €</strong></p>';

// Prueba errores
echo '<h2>Pruebas de construcción inválida</h2>';

try {
    $invalido = new ProductoFisico('Báscula', 10.0, 0.0);
} catch (InvalidArgumentException $e) {
    echo '<p>Físico peso cero: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
}

try {
    $invalido = new ProductoDigital('Software', -5.0);
} catch (InvalidArgumentException $e) {
    echo '<p>Digital precio negativo: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
}

/*
 * RESPUESTAS:
 * - No podemos crear new Producto() porque es abstracta.
 * - El método abstracto calcularGastosEnvio() obliga a cada hija concreta a implementarlo.
 * - final en getPrecio() impide que las hijas lo sobreescriban; sí pueden utilizarlo.
 * - final en ProductoDigital impide crear clases hijas de ella.
 * - Cuando calcularTotal() se ejecuta sobre el teclado, $this es el objeto ProductoFisico.
 *   calcularTotal() llama a $this->calcularGastosEnvio(), que ejecuta
 *   ProductoFisico::calcularGastosEnvio() → 0.5 * 2.0 = 1.0 → total = 25.0 + 1.0 = 26.0.
 *
 * RECORRIDO del teclado:
 * obtenerTotal($teclado)
 *   → $teclado->calcularTotal()       [heredado de Producto]
 *   → $this->precio + $this->calcularGastosEnvio()
 *   → 25.0 + ProductoFisico::calcularGastosEnvio()
 *   → 25.0 + (0.5 * 2.0)
 *   → 25.0 + 1.0 = 26.0
 */
?>
</body>
</html>
