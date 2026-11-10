<?php
declare(strict_types=1);

require_once __DIR__ . '/Reserva.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 14 – Contar reservas</title>
</head>
<body>
<h1>Ejercicio 14 – Contador estático de reservas</h1>

<?php
// 1. Contador sin crear reservas → esperamos 0
echo '<p>Sin reservas: ' . Reserva::getTotalCreadas() . '</p>'; // 0

// 2. Crear reserva para Ana → esperamos 1
$reservaAna = new Reserva('Ana');
echo '<p>Tras crear Ana: ' . Reserva::getTotalCreadas() . '</p>'; // 1

// 3. Crear reserva para Luis → esperamos 2
$reservaLuis = new Reserva('Luis');
echo '<p>Tras crear Luis: ' . Reserva::getTotalCreadas() . '</p>'; // 2

// 4. Asignar $reservaAna a otra variable sin new → NO incrementa el contador
$otraVariable = $reservaAna;
echo '<p>Tras asignar sin new: ' . Reserva::getTotalCreadas() . '</p>'; // 2

// 5. Intentar crear con cliente de espacios → excepción, el contador NO sube
try {
    $reservaInvalida = new Reserva('   ');
} catch (InvalidArgumentException $e) {
    echo '<p>Excepción: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
}
echo '<p>Tras intento fallido: ' . Reserva::getTotalCreadas() . '</p>'; // sigue en 2

// 6. Crear reserva para María → esperamos 3
$reservaMaria = new Reserva('María');
echo '<p>Tras crear María: ' . Reserva::getTotalCreadas() . '</p>'; // 3

// Clientes de las tres reservas válidas
echo '<h2>Clientes</h2>';
echo '<p>' . htmlspecialchars($reservaAna->getCliente(),  ENT_QUOTES, 'UTF-8') . '</p>';
echo '<p>' . htmlspecialchars($reservaLuis->getCliente(), ENT_QUOTES, 'UTF-8') . '</p>';
echo '<p>' . htmlspecialchars($reservaMaria->getCliente(), ENT_QUOTES, 'UTF-8') . '</p>';

/*
 * RESPUESTAS TRAS RECARGAR LA PÁGINA:
 * - Sí, el programa se vuelve a ejecutar desde el principio.
 * - No, el contador empieza en 0: PHP no mantiene estado entre peticiones HTTP.
 * - El contador representa reservas construidas correctamente durante una sola ejecución,
 *   no personas atendidas desde que existe la aplicación (para eso necesitaríamos una base de datos).
 */
?>
</body>
</html>
