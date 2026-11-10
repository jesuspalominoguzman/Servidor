<?php
declare(strict_types=1);

require_once __DIR__ . '/Tarifa.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 13 – Tarifa con IVA</title>
</head>
<body>
<h1>Ejercicio 13 – Constante y método estático</h1>

<?php
// Consultar la constante sin crear objeto
echo '<p>IVA: ' . (Tarifa::IVA * 100) . ' %</p>';

echo '<table border="1" cellpadding="6">';
echo '<tr><th>Base</th><th>Con IVA</th></tr>';

$bases = [100.0, 50.0, 0.0];
foreach ($bases as $base) {
    echo '<tr><td>' . number_format($base, 2, ',', '.') . ' €</td>'
        . '<td>' . number_format(Tarifa::calcularConIva($base), 2, ',', '.') . ' €</td></tr>';
}

echo '</table>';

// Base negativa → excepción
try {
    Tarifa::calcularConIva(-10.0);
} catch (InvalidArgumentException $e) {
    echo '<p>Base negativa: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
}

/*
 * RESPUESTAS:
 * - No hace falta new porque calcularConIva() es static: pertenece a la clase, no a un objeto.
 * - No usamos $this porque $this hace referencia a un objeto concreto, y aquí no hay objeto.
 * - Escribimos self::IVA sin $ porque IVA es una constante, no una variable; las constantes
 *   no llevan $ en PHP.
 * - Una constante no puede reasignarse durante la ejecución; su valor es fijo en tiempo de compilación.
 */
?>
</body>
</html>
