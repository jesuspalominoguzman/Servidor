<?php
declare(strict_types=1);

require_once __DIR__ . '/Producto.php';

class ProductoFisico extends Producto
{
    private float $peso;

    public function __construct(string $nombre, float $precio, float $peso)
    {
        if ($peso <= 0) {
            throw new InvalidArgumentException('El peso debe ser positivo.');
        }
        parent::__construct($nombre, $precio);
        $this->peso = $peso;
    }

    public function getPeso(): float
    {
        return $this->peso;
    }

    public function obtenerDescripcion(): string
    {
        return parent::obtenerDescripcion() . ' / Peso: ' . $this->peso . ' kg';
    }

    public function calcularGastosEnvio(): float
    {
        return $this->peso * 2.0;
    }
}
