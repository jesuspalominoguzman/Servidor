<?php
declare(strict_types=1);

class Reserva
{
    private string $cliente;
    private static int $totalCreadas = 0;

    public function __construct(string $cliente)
    {
        $cliente = trim($cliente);
        if ($cliente === '') {
            throw new InvalidArgumentException('El nombre del cliente no puede estar vacío.');
        }
        $this->cliente = $cliente;
        self::$totalCreadas++;
    }

    public function getCliente(): string
    {
        return $this->cliente;
    }

    public static function getTotalCreadas(): int
    {
        return self::$totalCreadas;
    }
}
