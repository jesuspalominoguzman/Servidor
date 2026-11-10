<?php
declare(strict_types=1);

require_once __DIR__ . '/Tarifa.php';

class TarifaMoto extends Tarifa
{
    public function calcularImporte(int $horas): float
    {
        if ($horas <= 0) {
            throw new InvalidArgumentException('Las horas deben ser positivas.');
        }
        return $horas * 1.0;
    }
}
