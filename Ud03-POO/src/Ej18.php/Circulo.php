<?php
declare(strict_types=1);

require_once __DIR__ . '/Figura.php';

class Circulo extends Figura
{
    private float $radio;

    public function __construct(float $radio)
    {
        if ($radio <= 0) {
            throw new InvalidArgumentException('El radio debe ser positivo.');
        }
        $this->radio = $radio;
    }

    public function calcularArea(): float
    {
        return pi() * $this->radio * $this->radio;
    }
}
