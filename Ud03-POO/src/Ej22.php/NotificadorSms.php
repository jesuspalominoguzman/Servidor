<?php
declare(strict_types=1);

require_once __DIR__ . '/Notificador.php';

class NotificadorSms implements Notificador
{
    public function prepararAviso(string $mensaje): string
    {
        return 'SMS: ' . $mensaje;
    }
}
