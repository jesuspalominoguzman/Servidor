<?php
declare(strict_types=1);

require_once __DIR__ . '/Tarifa.php';
require_once __DIR__ . '/TarifaCoche.php';
require_once __DIR__ . '/TarifaMoto.php';

function obtenerImporte(Tarifa $tarifa, int $horas): float
{
    // Polimorfismo: sin comprobar instanceof ni el tipo del objeto
    return $tarifa->calcularImporte($horas);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 17 – Tarifas de aparcamiento</title>
</head>
<body>
<h1>Ejercicio 17 – Polimorfismo con tarifas</h1>

<?php
$coche = new TarifaCoche();
$moto  = new TarifaMoto();

// Llamadas individuales
echo '<p>Coche, 3 horas: ' . number_format(obtenerImporte($coche, 3), 2, ',', '.') . ' €</p>';
echo '<p>Moto, 3 horas: '  . number_format(obtenerImporte($moto,  3), 2, ',', '.') . ' €</p>';

// Array y foreach
echo '<h2>Recorrido con foreach</h2>';
$tarifas = [$coche, $moto];
$nombres = ['Coche', 'Moto'];
foreach ($tarifas as $i => $tarifa) {
    echo '<p>' . $nombres[$i] . ', 3 horas: '
        . number_format(obtenerImporte($tarifa, 3), 2, ',', '.') . ' €</p>';
}

/*
 * TABLA DE LLAMADAS:
 * | Llamada       | Tipo declarado | Clase real   | Método ejecutado en       | Resultado |
 * |---------------|----------------|--------------|---------------------------|-----------|
 * | Coche, 3 h    | Tarifa         | TarifaCoche  | Tarifa::calcularImporte() | 6,00 €    |
 * | Moto, 3 h     | Tarifa         | TarifaMoto   | TarifaMoto::calcularImporte() | 3,00 €  |
 *
 * El objeto conserva su clase real porque PHP usa ligadura dinámica (late binding):
 * el tipo del parámetro indica qué se acepta, pero la clase real del objeto determina
 * qué método se ejecuta.
 * El foreach no decide la fórmula; solo recorre el array. Es el objeto quien sabe
 * qué versión del método debe ejecutar.
 */
?>
</body>
</html>
