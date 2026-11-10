<?php
declare(strict_types=1);

class Tarifa
{
    public function calcularImporte(int $horas): float
    {
        if ($horas <= 0) {
            throw new InvalidArgumentException('Las horas deben ser positivas.');
        }
        return $horas * 2.0;
    }
}
