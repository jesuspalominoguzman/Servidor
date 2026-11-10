<?php
declare(strict_types=1);

require_once __DIR__ . '/Describible.php';
require_once __DIR__ . '/Categoria.php';
require_once __DIR__ . '/Producto.php';
require_once __DIR__ . '/ProductoFisico.php';
require_once __DIR__ . '/ProductoDigital.php';
require_once __DIR__ . '/Catalogo.php';

function describir(Describible $elemento): string
{
    return $elemento->obtenerDescripcion();
}

// 1. Creación de categorías
$catPerifericos = new Categoria('Periféricos');
$catPantallas   = new Categoria('Pantallas');
$catFormacion   = new Categoria('Formación');

// 2. Creación de productos (Periféricos se comparte entre Teclado y Ratón)
$teclado  = new ProductoFisico('Teclado',   35.0,  $catPerifericos, 0.5, 5);
$raton    = new ProductoFisico('Ratón',     20.0,  $catPerifericos, 0.2, 8);
$monitor  = new ProductoFisico('Monitor',   180.0, $catPantallas,   4.0, 2);
$cursoPhp = new ProductoDigital('Curso PHP', 40.0,  $catFormacion);

// 3. Incorporación al catálogo
$catalogo = new Catalogo();
$catalogo->anadirProducto($teclado);
$catalogo->anadirProducto($raton);
$catalogo->anadirProducto($monitor);
$catalogo->anadirProducto($cursoPhp);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad Final Ud3 – Catálogo Orientado a Objetos</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; line-height: 1.5; margin: 2rem; color: #2d3748; }
        h1, h2 { color: #1a202c; border-bottom: 2px solid #e2e8f0; padding-bottom: 0.3rem; }
        table { border-collapse: collapse; width: 100%; margin: 1rem 0; }
        th, td { border: 1px solid #cbd5e0; padding: 0.75rem; text-align: left; }
        th { background-color: #edf2f7; }
        .success { color: #2f855a; font-weight: bold; }
        .error { color: #c53030; font-weight: bold; }
        .summary { background: #f7fafc; padding: 1rem; border-left: 4px solid #4299e1; margin: 1rem 0; }
    </style>
</head>
<body>

<h1>Tienda Informática: Catálogo Orientado a Objetos</h1>

<h2>1. Catálogo de productos</h2>
<table>
    <thead>
        <tr>
            <th>Descripción</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Envío</th>
            <th>Total de una unidad</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($catalogo->getProductos() as $prod): ?>
        <tr>
            <td><?php echo htmlspecialchars($prod->obtenerDescripcion(), ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($prod->getCategoria()->getNombre(), ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo number_format($prod->getPrecio(), 2, ',', '.'); ?> €</td>
            <td><?php echo number_format($prod->calcularGastosEnvio(), 2, ',', '.'); ?> €</td>
            <td><strong><?php echo number_format($prod->calcularTotal(), 2, ',', '.'); ?> €</strong></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4" style="text-align: right;">Valor conjunto del catálogo:</th>
            <th><?php echo number_format($catalogo->calcularValorTotal(), 2, ',', '.'); ?> €</th>
        </tr>
    </tfoot>
</table>

<div class="summary">
    <p><strong>Cantidad de productos en catálogo:</strong> <?php echo $catalogo->contarProductos(); ?></p>
    <p><strong>Total de productos creados (contador estático):</strong> <?php echo Producto::getTotalCreados(); ?></p>
</div>

<h2>2. Polimorfismo mediante la interfaz Describible</h2>
<p>Llamadas a la función unificada <code>describir(Describible $elemento)</code>:</p>
<ul>
    <li><strong>Categoría:</strong> <?php echo htmlspecialchars(describir($catPerifericos), ENT_QUOTES, 'UTF-8'); ?></li>
    <li><strong>Producto:</strong> <?php echo htmlspecialchars(describir($teclado), ENT_QUOTES, 'UTF-8'); ?></li>
</ul>

<h2>3. Operaciones de reserva y reposición sobre el Teclado</h2>
<table>
    <thead>
        <tr>
            <th>Paso</th>
            <th>Operación</th>
            <th>Resultado esperado</th>
            <th>Resultado observado</th>
            <th>Stock posterior</th>
        </tr>
    </thead>
    <tbody>
        <!-- Paso 1: Consultar stock inicial -->
        <tr>
            <td>1</td>
            <td>Consultar stock inicial</td>
            <td>5 unidades</td>
            <td><span class="success"><?php echo $teclado->getStock(); ?> unidades disponibles</span></td>
            <td><strong><?php echo $teclado->getStock(); ?></strong></td>
        </tr>

        <!-- Paso 2: Reservar 2 unidades -->
        <tr>
            <td>2</td>
            <td>Reservar 2 unidades</td>
            <td>Se completa</td>
            <td>
                <?php
                try {
                    $teclado->reservar(2);
                    echo '<span class="success">Completado correctamente</span>';
                } catch (InvalidArgumentException $e) {
                    echo '<span class="error">Error: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</span>';
                }
                ?>
            </td>
            <td><strong><?php echo $teclado->getStock(); ?></strong></td>
        </tr>

        <!-- Paso 3: Reponer 1 unidad -->
        <tr>
            <td>3</td>
            <td>Reponer 1 unidad</td>
            <td>Se completa</td>
            <td>
                <?php
                try {
                    $teclado->reponer(1);
                    echo '<span class="success">Completado correctamente</span>';
                } catch (InvalidArgumentException $e) {
                    echo '<span class="error">Error: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</span>';
                }
                ?>
            </td>
            <td><strong><?php echo $teclado->getStock(); ?></strong></td>
        </tr>

        <!-- Paso 4: Intentar reservar 5 unidades (fallo esperado) -->
        <tr>
            <td>4</td>
            <td>Intentar reservar 5 unidades</td>
            <td>Rechazada por falta de stock</td>
            <td>
                <?php
                try {
                    $teclado->reservar(5);
                    echo '<span class="success">Completado (inesperado)</span>';
                } catch (InvalidArgumentException $e) {
                    echo '<span class="error">Excepción capturada: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</span>';
                }
                ?>
            </td>
            <td><strong><?php echo $teclado->getStock(); ?></strong> (stock intacto)</td>
        </tr>
    </tbody>
</table>

</body>
</html>
