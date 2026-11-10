<?php
declare(strict_types=1);

require_once __DIR__ . '/cuentaBancaria.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 7 – Cuenta bancaria</title>
</head>
<body>
<h1>Ejercicio 7 – Cuenta bancaria con encapsulación</h1>

<?php
// Cuenta con saldo inicial 100.0
$cuenta = new CuentaBancaria('Juan Pérez', 100.0);

echo '<h2>Operaciones sobre la cuenta</h2>';
echo '<table border="1" cellpadding="6">';
echo '<tr><th>Operación</th><th>¿Aceptada?</th><th>Saldo</th></tr>';

// 1. Ingresar 50.0 → Sí, 150,00 €
$ok = $cuenta->ingresar(50.0);
echo '<tr><td>Ingresar 50,00 €</td><td>' . ($ok ? 'Sí' : 'No') . '</td><td>'
    . number_format($cuenta->getSaldo(), 2, ',', '.') . ' €</td></tr>';

// 2. Retirar 30.0 → Sí, 120,00 €
$ok = $cuenta->retirar(30.0);
echo '<tr><td>Retirar 30,00 €</td><td>' . ($ok ? 'Sí' : 'No') . '</td><td>'
    . number_format($cuenta->getSaldo(), 2, ',', '.') . ' €</td></tr>';

// 3. Retirar 200.0 → No, 120,00 €
$ok = $cuenta->retirar(200.0);
echo '<tr><td>Retirar 200,00 €</td><td>' . ($ok ? 'Sí' : 'No') . '</td><td>'
    . number_format($cuenta->getSaldo(), 2, ',', '.') . ' €</td></tr>';

// 4. Ingresar 0.0 → No, 120,00 €
$ok = $cuenta->ingresar(0.0);
echo '<tr><td>Ingresar 0,00 €</td><td>' . ($ok ? 'Sí' : 'No') . '</td><td>'
    . number_format($cuenta->getSaldo(), 2, ',', '.') . ' €</td></tr>';

// 5. Retirar -10.0 → No, 120,00 €
$ok = $cuenta->retirar(-10.0);
echo '<tr><td>Retirar -10,00 €</td><td>' . ($ok ? 'Sí' : 'No') . '</td><td>'
    . number_format($cuenta->getSaldo(), 2, ',', '.') . ' €</td></tr>';

// 6. Retirar 120.0 → Sí, 0,00 €
$ok = $cuenta->retirar(120.0);
echo '<tr><td>Retirar 120,00 €</td><td>' . ($ok ? 'Sí' : 'No') . '</td><td>'
    . number_format($cuenta->getSaldo(), 2, ',', '.') . ' €</td></tr>';

echo '</table>';

// Segunda cuenta sin saldo inicial
echo '<h2>Segunda cuenta (sin saldo inicial)</h2>';
$cuenta2 = new CuentaBancaria('María García');
echo '<p>Saldo inicial: ' . number_format($cuenta2->getSaldo(), 2, ',', '.') . ' €</p>';

// Construcción con saldo negativo
echo '<h2>Construcción inválida: saldo negativo</h2>';
try {
    $cuentaInvalida = new CuentaBancaria('Pedro', -50.0);
} catch (InvalidArgumentException $e) {
    echo '<p>' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
}
?>
</body>
</html>
