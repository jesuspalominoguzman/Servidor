<?php
declare(strict_types=1);

abstract class Producto
{
    private string $nombre;
    private float  $precio;

    public function __construct(string $nombre, float $precio)
    {
        $nombre = trim($nombre);
        if ($nombre === '') {
            throw new InvalidArgumentException('El nombre no puede estar vacío.');
        }
        if ($precio < 0) {
            throw new InvalidArgumentException('El precio no puede ser negativo.');
        }
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    final public function getPrecio(): float
    {
        return $this->precio;
    }

    public function obtenerDescripcion(): string
    {
        return 'Producto: ' . $this->nombre;
    }

    abstract public function calcularGastosEnvio(): float;

    public function calcularTotal(): float
    {
        return $this->precio + $this->calcularGastosEnvio();
    }
}
