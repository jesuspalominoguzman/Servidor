<?php
declare(strict_types=1);

require_once __DIR__ . '/Producto.php';

class ProductoFisico extends Producto
{
    public const TARIFA_POR_KG = 2.0;

    private float $peso;
    private int $stock;

    public function __construct(
        string $nombre,
        float $precio,
        Categoria $categoria,
        float $peso,
        int $stock
    ) {
        // Se validan primero los datos específicos para no incrementar
        // el contador de Producto si los datos específicos son erróneos.
        if ($peso <= 0) {
            throw new InvalidArgumentException('El peso del producto físico debe ser positivo.');
        }
        if ($stock < 0) {
            throw new InvalidArgumentException('El stock no puede ser negativo.');
        }

        parent::__construct($nombre, $precio, $categoria);
        $this->peso = $peso;
        $this->stock = $stock;
    }

    public function getPeso(): float
    {
        return $this->peso;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function obtenerDescripcion(): string
    {
        return parent::obtenerDescripcion() . ' / Peso: ' . $this->peso . ' kg';
    }

    public function calcularGastosEnvio(): float
    {
        return $this->peso * self::TARIFA_POR_KG;
    }

    /**
     * Reserva una cantidad determinada de unidades del producto, descontándolas del stock.
     *
     * @param int $unidades Cantidad de unidades a reservar. Debe ser estrictamente positiva
     *                      y no superar el stock disponible actual.
     * @return void
     * @throws InvalidArgumentException Si la cantidad es menor o igual a cero o si supera el stock disponible.
     */
    public function reservar(int $unidades): void
    {
        if ($unidades <= 0) {
            throw new InvalidArgumentException('La cantidad a reservar debe ser estrictamente positiva.');
        }
        if ($unidades > $this->stock) {
            throw new InvalidArgumentException("No hay suficiente stock disponible ({$this->stock}) para reservar {$unidades} unidades.");
        }

        $this->stock -= $unidades;
    }

    /**
     * Repone una cantidad determinada de unidades, incrementando el stock del producto.
     *
     * @param int $unidades Cantidad de unidades a añadir al stock. Debe ser estrictamente positiva.
     * @return void
     * @throws InvalidArgumentException Si la cantidad a reponer es menor o igual a cero.
     */
    public function reponer(int $unidades): void
    {
        if ($unidades <= 0) {
            throw new InvalidArgumentException('La cantidad a reponer debe ser estrictamente positiva.');
        }

        $this->stock += $unidades;
    }
}
