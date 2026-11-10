<?php
declare(strict_types=1);

class Entrada
{
    public string $evento = 'Concierto';
    public float  $precio = 12.0;

    public function calcularTotal(int $cantidad): float
    {
        // Error 1 corregido: $precio → $this->precio
        return $this->precio * $cantidad;
    }
}
