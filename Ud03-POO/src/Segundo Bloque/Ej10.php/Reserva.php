<?php
declare(strict_types=1);

class Reserva
{
    private string $cliente;
    private int    $personas;

    // CORRECCIÓN 1: __construct no devuelve nada, eliminar ": void"
    public function __construct(string $cliente, int $personas = 1)
    {
        $cliente = trim($cliente);

        if ($cliente === '') {
            throw new InvalidArgumentException('El cliente no puede estar vacío.');
        }
        if ($personas <= 0) {
            throw new InvalidArgumentException('El número de personas debe ser positivo.');
        }

        // CORRECCIÓN 2: $this->cliente = $cliente; (faltaba $this->)
        $this->cliente  = $cliente;
        $this->personas = $personas;
    }

    public function getCliente(): string
    {
        return $this->cliente;
    }

    public function getPersonas(): int
    {
        return $this->personas;
    }

    public function setPersonas(int $personas): bool
    {
        if ($personas <= 0) {
            return false;
        }
        // CORRECCIÓN 3: $this->personas = $personas; (faltaba $this->)
        $this->personas = $personas;
        return true;
    }
}
