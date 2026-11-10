<?php
declare(strict_types=1);

interface Notificador
{
    public function prepararAviso(string $mensaje): string;
}
