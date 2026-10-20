<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 34 PHP</title>
</head>
<body>
    <header>
        <h1>Ejercicio 34 - Bloque 6</h1>
    </header>
    <?php
    require_once __DIR__ . '/funciones.php';

    $productos = [
        ['nombre' => 'Monitor', 'precio' => 200, 'descuento' => 15],
        ['nombre' => 'Teclado', 'precio' => 50, 'descuento' => 10],
        ['nombre' => 'Ratón', 'precio' => 30, 'descuento' => 5]
    ];

    echo "<ul>";
    foreach ($productos as $prod) {
        $precioRebajado = aplicarDescuento($prod['precio'], $prod['descuento']);
        echo "<li>" . htmlspecialchars($prod['nombre']) . ": ";
        echo "Original: " . formatearPrecio($prod['precio']) . " | ";
        echo "Rebajado (" . $prod['descuento'] . "%): " . formatearPrecio($precioRebajado) . "</li>";
    }
    echo "</ul>";
    ?>
</body>
</html>