<?php
declare(strict_types=1);

require_once __DIR__ . '/Describible.php';
require_once __DIR__ . '/Categoria.php';

abstract class Producto implements Describible
{
    private string $nombre;
    private float $precio;
    private Categoria $categoria;
    private static int $totalCreados = 0;

    public function __construct(string $nombre, float $precio, Categoria $categoria)
    {
        $nombreLimpio = trim($nombre);
        if ($nombreLimpio === '') {
            throw new InvalidArgumentException('El nombre del producto no puede estar vacío.');
        }
        if ($precio < 0) {
            throw new InvalidArgumentException('El precio del producto no puede ser negativo.');
        }

        $this->nombre = $nombreLimpio;
        $this->precio = $precio;
        $this->categoria = $categoria;

        self::$totalCreados++;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    final public function getPrecio(): float
    {
        return $this->precio;
    }

    public function getCategoria(): Categoria
    {
        return $this->categoria;
    }

    public function obtenerDescripcion(): string
    {
        return 'Producto: ' . $this->nombre;
    }

    public function calcularTotal(): float
    {
        return $this->precio + $this->calcularGastosEnvio();
    }

    public static function getTotalCreados(): int
    {
        return self::$totalCreados;
    }

    abstract public function calcularGastosEnvio(): float;
}
