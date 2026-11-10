<?php
declare(strict_types=1);

class Entrada
{
    public string $evento = 'Concierto';
    public float $precio = 12.0;

    public function calcularTotal(int $cantidad): float
    {
        return $this ->precio * $cantidad;
    }
}

$entrada = new Entrada(); // Error 2

echo $entrada->evento; // Error 3

echo '<br>';
echo $entrada->calcularTotal(3);