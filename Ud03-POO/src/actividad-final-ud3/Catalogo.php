<?php
declare(strict_types=1);

require_once __DIR__ . '/Producto.php';

class Catalogo
{
    /**
     * @var array<int, Producto> Colección de productos del catálogo.
     */
    private array $productos = [];

    public function anadirProducto(Producto $producto): void
    {
        $this->productos[] = $producto;
    }

    /**
     * @return array<int, Producto>
     */
    public function getProductos(): array
    {
        return $this->productos;
    }

    public function contarProductos(): int
    {
        return count($this->productos);
    }

    /**
     * Calcula el valor total conjunto de una unidad de cada producto presente en el catálogo,
     * incluyendo sus correspondientes gastos de envío.
     *
     * Se apoya en el polimorfismo mediante el método calcularTotal() de cada Producto,
     * sin necesidad de inspeccionar el tipo concreto del objeto con condicionales o instanceof.
     *
     * @return float Suma total de los importes con envío, o 0.0 si el catálogo está vacío.
     */
    public function calcularValorTotal(): float
    {
        $total = 0.0;
        foreach ($this->productos as $producto) {
            $total += $producto->calcularTotal();
        }
        return $total;
    }
}
