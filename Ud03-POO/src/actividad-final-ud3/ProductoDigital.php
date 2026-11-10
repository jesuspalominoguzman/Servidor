<?php
declare(strict_types=1);

require_once __DIR__ . '/Producto.php';

final class ProductoDigital extends Producto
{
    // Utiliza el constructor heredado de Producto sin añadir propiedades adicionales

    public function obtenerDescripcion(): string
    {
        return parent::obtenerDescripcion() . ' / Descarga digital';
    }

    public function calcularGastosEnvio(): float
    {
        return 0.0;
    }
}
