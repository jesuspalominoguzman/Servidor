<?php
declare(strict_types=1);

require_once __DIR__ . '/Reserva.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 10 – Reserva encapsulada</title>
</head>
<body>
<h1>Ejercicio 10 – Reparar clase encapsulada</h1>

<?php
/*
 * ERRORES ENCONTRADOS Y CORREGIDOS:
 * Error 1: __construct declarado con ": void" → los constructores no tienen tipo de retorno.
 * Error 2: $cliente = $cliente; → debía ser $this->cliente = $cliente;
 * Error 3: $personas = $personas; → debía ser $this->personas = $personas;
 * Error 4: echo $reserva->cliente; → propiedad privada, debe usarse $reserva->getCliente();
 */

// Reserva válida: Ana para 2 personas
$reserva = new Reserva('Ana', 2);
echo '<p>Cliente: ' . htmlspecialchars($reserva->getCliente(), ENT_QUOTES, 'UTF-8') . '</p>';
echo '<p>Personas: ' . $reserva->getPersonas() . '</p>';

// Cambiar a 4 personas → true
$ok = $reserva->setPersonas(4);
echo '<p>Cambiar a 4 personas: ' . ($ok ? 'Aceptado' : 'Rechazado')
    . ' (personas: ' . $reserva->getPersonas() . ')</p>';

// Intentar 0 personas → false
$ok = $reserva->setPersonas(0);
echo '<p>Cambiar a 0 personas: ' . ($ok ? 'Aceptado' : 'Rechazado')
    . ' (personas: ' . $reserva->getPersonas() . ')</p>';

// Reserva omitiendo personas → 1 por defecto
$reserva2 = new Reserva('Carlos');
echo '<p>Reserva de Carlos (sin indicar personas): ' . $reserva2->getPersonas() . '</p>';

// Construcción con 0 personas → excepción
try {
    $reservaInvalida = new Reserva('Pedro', 0);
} catch (InvalidArgumentException $e) {
    echo '<p>Excepción (0 personas): '
        . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
}

// CORRECCIÓN 4: se usa el getter en lugar de acceder directamente a la propiedad privada
// CORRECTO: $reserva->getCliente();  INCORRECTO: $reserva->cliente;
?>
</body>
</html>
