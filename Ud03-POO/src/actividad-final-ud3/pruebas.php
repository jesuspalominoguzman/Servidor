<?php
declare(strict_types=1);

require_once __DIR__ . '/Describible.php';
require_once __DIR__ . '/Categoria.php';
require_once __DIR__ . '/Producto.php';
require_once __DIR__ . '/ProductoFisico.php';
require_once __DIR__ . '/ProductoDigital.php';
require_once __DIR__ . '/Catalogo.php';

$resultados = [];

function registrarResultado(
    array &$resultados,
    string $identificador,
    string $caso,
    string $esperado,
    string $observado,
    bool $coincide,
    string $estadoPosterior = 'N/A'
): void {
    $resultados[] = [
        'id'        => $identificador,
        'caso'      => $caso,
        'esperado'  => $esperado,
        'observado' => $observado,
        'coincide'  => $coincide,
        'estado'    => $estadoPosterior,
    ];
}

$catGeneral = new Categoria('General');

// 1. Catálogo vacío
$catVacio = new Catalogo();
$numProds = $catVacio->contarProductos();
$valorVacio = $catVacio->calcularValorTotal();
$esperado1 = '0 productos y valor total 0,00 €';
$observado1 = "{$numProds} productos y valor total " . number_format($valorVacio, 2, ',', '.') . ' €';
registrarResultado(
    $resultados,
    'T01',
    'Catálogo vacío',
    $esperado1,
    $observado1,
    ($numProds === 0 && abs($valorVacio - 0.0) < 0.001),
    'Catálogo con 0 elementos'
);

// 2. Catálogo de los cuatro productos indicados
$catCompleto = new Catalogo();
$cPer = new Categoria('Periféricos');
$cPan = new Categoria('Pantallas');
$cFor = new Categoria('Formación');

$catCompleto->anadirProducto(new ProductoFisico('Teclado',   35.0,  $cPer, 0.5, 5));
$catCompleto->anadirProducto(new ProductoFisico('Ratón',     20.0,  $cPer, 0.2, 8));
$catCompleto->anadirProducto(new ProductoFisico('Monitor',   180.0, $cPan, 4.0, 2));
$catCompleto->anadirProducto(new ProductoDigital('Curso PHP', 40.0,  $cFor));

$numCompleto = $catCompleto->contarProductos();
$valorCompleto = $catCompleto->calcularValorTotal();
$esperado2 = '4 productos y valor total 284,40 €';
$observado2 = "{$numCompleto} productos y valor total " . number_format($valorCompleto, 2, ',', '.') . ' €';
registrarResultado(
    $resultados,
    'T02',
    'Catálogo con los 4 productos',
    $esperado2,
    $observado2,
    ($numCompleto === 4 && abs($valorCompleto - 284.40) < 0.01),
    'Catálogo con 4 elementos'
);

// 3. Producto digital
$prodDig = new ProductoDigital('E-book', 15.0, $catGeneral);
$envioDig = $prodDig->calcularGastosEnvio();
$totalDig = $prodDig->calcularTotal();
$esperado3 = 'Envío 0,00 €; total igual al precio (15,00 €)';
$observado3 = 'Envío ' . number_format($envioDig, 2, ',', '.') . ' €; total: ' . number_format($totalDig, 2, ',', '.') . ' €';
registrarResultado(
    $resultados,
    'T03',
    'Producto digital (cálculo de envío)',
    $esperado3,
    $observado3,
    (abs($envioDig - 0.0) < 0.001 && abs($totalDig - 15.0) < 0.001),
    'Envío = 0.0, Total = Precio'
);

// 4. Físico con stock 5: reservar 5
$pFis1 = new ProductoFisico('Memoria USB', 10.0, $catGeneral, 0.1, 5);
try {
    $pFis1->reservar(5);
    $ok4 = ($pFis1->getStock() === 0);
    $obs4 = 'Se completa correctamente y stock queda en ' . $pFis1->getStock();
} catch (InvalidArgumentException $e) {
    $ok4 = false;
    $obs4 = 'Excepción inesperada: ' . $e->getMessage();
}
registrarResultado(
    $resultados,
    'T04',
    'Físico con stock 5: reservar 5 unidades',
    'Se completa y deja stock 0',
    $obs4,
    $ok4,
    'Stock = ' . $pFis1->getStock()
);

// 5. Físico con stock 5: reservar 6
$pFis2 = new ProductoFisico('Cable HDMI', 8.0, $catGeneral, 0.2, 5);
try {
    $pFis2->reservar(6);
    $ok5 = false;
    $obs5 = 'Operación aceptada indebidamente';
} catch (InvalidArgumentException $e) {
    $ok5 = ($pFis2->getStock() === 5);
    $obs5 = 'Excepción capturada: ' . $e->getMessage() . '. Stock = ' . $pFis2->getStock();
}
registrarResultado(
    $resultados,
    'T05',
    'Físico con stock 5: reservar 6 unidades (supera stock)',
    'Excepción y stock conservado en 5',
    $obs5,
    $ok5,
    'Stock = ' . $pFis2->getStock()
);

// 6. Físico con stock 5: reservar 0
$pFis3 = new ProductoFisico('Funda Portátil', 15.0, $catGeneral, 0.3, 5);
try {
    $pFis3->reservar(0);
    $ok6 = false;
    $obs6 = 'Operación aceptada indebidamente';
} catch (InvalidArgumentException $e) {
    $ok6 = ($pFis3->getStock() === 5);
    $obs6 = 'Excepción capturada: ' . $e->getMessage() . '. Stock = ' . $pFis3->getStock();
}
registrarResultado(
    $resultados,
    'T06',
    'Físico con stock 5: reservar 0 unidades (no positivo)',
    'Excepción y stock conservado en 5',
    $obs6,
    $ok6,
    'Stock = ' . $pFis3->getStock()
);

// 7. Físico con stock 5: reponer -1
$pFis4 = new ProductoFisico('Adaptador USB-C', 12.0, $catGeneral, 0.1, 5);
try {
    $pFis4->reponer(-1);
    $ok7 = false;
    $obs7 = 'Operación aceptada indebidamente';
} catch (InvalidArgumentException $e) {
    $ok7 = ($pFis4->getStock() === 5);
    $obs7 = 'Excepción capturada: ' . $e->getMessage() . '. Stock = ' . $pFis4->getStock();
}
registrarResultado(
    $resultados,
    'T07',
    'Físico con stock 5: reponer -1 unidades (negativo)',
    'Excepción y stock conservado en 5',
    $obs7,
    $ok7,
    'Stock = ' . $pFis4->getStock()
);

// 8. Intentar construir un producto con precio negativo
try {
    $pInvalido = new ProductoDigital('Software Pro', -10.0, $catGeneral);
    $ok8 = false;
    $obs8 = 'Objeto creado indebidamente';
} catch (InvalidArgumentException $e) {
    $ok8 = true;
    $obs8 = 'Excepción capturada: ' . $e->getMessage();
}
registrarResultado(
    $resultados,
    'T08',
    'Construcción de producto con precio negativo (-10.0)',
    'Excepción; no se completa la construcción',
    $obs8,
    $ok8,
    'Objeto no instanciado'
);

// 9. Intentar construir un físico de peso 0 (comprobar contador estático)
$contadorAntes = Producto::getTotalCreados();
try {
    $pFisPesoCero = new ProductoFisico('Impresora 3D', 250.0, $catGeneral, 0.0, 3);
    $ok9 = false;
    $obs9 = 'Objeto creado indebidamente';
} catch (InvalidArgumentException $e) {
    $contadorDespues = Producto::getTotalCreados();
    $ok9 = ($contadorAntes === $contadorDespues);
    $obs9 = "Excepción capturada: {$e->getMessage()}. Contador antes = {$contadorAntes}, después = {$contadorDespues}";
}
registrarResultado(
    $resultados,
    'T09',
    'Construcción de físico con peso 0.0 (verifica contador estático)',
    'Excepción; el contador conserva el valor anterior al intento',
    $obs9,
    $ok9,
    "Contador = {$contadorAntes}"
);

// 10. Intentar construir una categoría de espacios
try {
    $catEspacios = new Categoria('     ');
    $ok10 = false;
    $obs10 = 'Categoría creada indebidamente';
} catch (InvalidArgumentException $e) {
    $ok10 = true;
    $obs10 = 'Excepción capturada: ' . $e->getMessage();
}
registrarResultado(
    $resultados,
    'T10',
    'Construcción de categoría con espacios en blanco',
    'Excepción; no se completa la construcción',
    $obs10,
    $ok10,
    'Categoría no instanciada'
);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batería de Pruebas – Actividad Final Ud3</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; line-height: 1.5; margin: 2rem; color: #2d3748; }
        h1, h2 { color: #1a202c; border-bottom: 2px solid #e2e8f0; padding-bottom: 0.3rem; }
        table { border-collapse: collapse; width: 100%; margin: 1rem 0; }
        th, td { border: 1px solid #cbd5e0; padding: 0.75rem; text-align: left; }
        th { background-color: #edf2f7; }
        .ok { color: #276749; background-color: #c6f6d5; font-weight: bold; text-align: center; }
        .fail { color: #9b2c2c; background-color: #fed7d7; font-weight: bold; text-align: center; }
    </style>
</head>
<body>

<h1>Batería de Pruebas Unitarias y de Validación</h1>
<p>Comprobaciones independientes del catálogo con verificación de estados iniciales y posteriores.</p>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Caso de prueba</th>
            <th>Resultado esperado</th>
            <th>Resultado observado</th>
            <th>Estado posterior</th>
            <th>¿Coincide?</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($resultados as $r): ?>
        <tr>
            <td><strong><?php echo htmlspecialchars($r['id'], ENT_QUOTES, 'UTF-8'); ?></strong></td>
            <td><?php echo htmlspecialchars($r['caso'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($r['esperado'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($r['observado'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($r['estado'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td class="<?php echo $r['coincide'] ? 'ok' : 'fail'; ?>">
                <?php echo $r['coincide'] ? 'SÍ' : 'NO'; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
