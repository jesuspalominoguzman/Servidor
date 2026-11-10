<?php
declare(strict_types=1);

require_once __DIR__ . '/Persona.php';

class Alumno extends Persona
{
    private string $ciclo;

    public function __construct(string $nombre, string $ciclo)
    {
        $ciclo = trim($ciclo);
        if ($ciclo === '') {
            throw new InvalidArgumentException('El ciclo no puede estar vacío.');
        }
        parent::__construct($nombre);
        $this->ciclo = $ciclo;
    }

    public function getCiclo(): string
    {
        return $this->ciclo;
    }

    public function obtenerDescripcion(): string
    {
        return parent::obtenerDescripcion() . ' / Ciclo: ' . $this->ciclo;
    }
}
