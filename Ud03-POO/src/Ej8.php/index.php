<?php
declare(strict_types=1);

require_once __DIR__ . '/Producto.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 8 – Producto con precio controlado</title>
</head>
<body>
<h1>Ejercicio 8 – Producto con precio controlado</h1>

<?php
$producto = new Producto('Teclado', 25.0);

echo '<h2>Producto: ' . htmlspecialchars($producto->getNombre(), ENT_QUOTES, 'UTF-8') . '</h2>';

// 1. Calcular 3 unidades → 75,00 €
echo '<p>3 unidades a ' . number_format($producto->getPrecio(), 2, ',', '.') . ' €: '
    . number_format($producto->calcularImporte(3), 2, ',', '.') . ' €</p>';

// 2. Cambiar precio a 30.0 → aceptado, 3 unidades = 90,00 €
$ok = $producto->setPrecio(30.0);
echo '<p>Cambio de precio a 30,00 €: ' . ($ok ? 'Aceptado' : 'Rechazado') . '</p>';
echo '<p>3 unidades ahora: ' . number_format($producto->calcularImporte(3), 2, ',', '.') . ' €</p>';

// 3. Intentar asignar -5.0 → rechazado, precio sigue en 30.0
$ok = $producto->setPrecio(-5.0);
echo '<p>Cambio de precio a -5,00 €: ' . ($ok ? 'Aceptado' : 'Rechazado')
    . ' (precio actual: ' . number_format($producto->getPrecio(), 2, ',', '.') . ' €)</p>';

// 4. Cambiar precio a 0.0 → aceptado, 3 unidades = 0,00 €
$ok = $producto->setPrecio(0.0);
echo '<p>Cambio de precio a 0,00 €: ' . ($ok ? 'Aceptado' : 'Rechazado') . '</p>';
echo '<p>3 unidades a precio 0: ' . number_format($producto->calcularImporte(3), 2, ',', '.') . ' €</p>';

// 5. Calcular 0 unidades → excepción
echo '<h2>Prueba: 0 unidades (inválido)</h2>';
try {
    $producto->calcularImporte(0);
} catch (InvalidArgumentException $e) {
    echo '<p>' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
}

/*
 * COMENTARIO:
 * Tener un setter no obliga a aceptar cualquier valor porque setPrecio() incluye
 * su propia validación: rechaza valores negativos devolviendo false y sin modificar
 * el estado del objeto.
 * setPrecio() devuelve bool para indicar si la operación tuvo éxito.
 * getPrecio() devuelve float porque su objetivo es proporcionar el valor actual.
 */
?>
</body>
</html>
