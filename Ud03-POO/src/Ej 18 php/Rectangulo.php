<?php
declare(strict_types=1);

require_once __DIR__ . '/Figura.php';

class Rectangulo extends Figura
{
    private float $base;
    private float $altura;

    public function __construct(float $base, float $altura)
    {
        if ($base <= 0 || $altura <= 0) {
            throw new InvalidArgumentException('La base y la altura deben ser positivas.');
        }
        $this->base   = $base;
        $this->altura = $altura;
    }

    public function calcularArea(): float
    {
        return $this->base * $this->altura;
    }
}
