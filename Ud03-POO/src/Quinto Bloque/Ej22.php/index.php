<?php
declare(strict_types=1);

require_once __DIR__ . '/Notificador.php';
require_once __DIR__ . '/NotificadorEmail.php';
require_once __DIR__ . '/NotificadorSms.php';

function crearAviso(Notificador $notificador, string $mensaje): string
{
    return $notificador->prepararAviso($mensaje);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 22 – Notificadores</title>
</head>
<body>
<h1>Ejercicio 22 – Distintas formas de avisar</h1>

<?php
$email = new NotificadorEmail();
$sms   = new NotificadorSms();

$mensaje = 'La entrega termina mañana';

echo '<p>' . htmlspecialchars(crearAviso($email, $mensaje), ENT_QUOTES, 'UTF-8') . '</p>';
echo '<p>' . htmlspecialchars(crearAviso($sms,   $mensaje), ENT_QUOTES, 'UTF-8') . '</p>';

echo '<h2>Recorrido con foreach</h2>';
$notificadores = [$email, $sms];
foreach ($notificadores as $notificador) {
    echo '<p>' . htmlspecialchars(crearAviso($notificador, $mensaje), ENT_QUOTES, 'UTF-8') . '</p>';
}

/*
 * RESPUESTAS:
 * - Ambas clases pueden pasarse a la misma función porque las dos implementan
 *   la interfaz Notificador, que es el tipo declarado en el parámetro.
 * - La interfaz NO aporta el cuerpo del método; solo declara su firma.
 *   Cada clase implementa su propia lógica.
 * - No bastaría con escribir el método sin declarar implements: PHP comprobaría
 *   si el objeto implementa la interfaz Notificador, y sin esa declaración
 *   lo rechazaría con un TypeError.
 */
?>
</body>
</html>
