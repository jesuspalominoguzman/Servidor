<?php
declare(strict_types=1);

class Persona
{
    private string $nombre;

    public function __construct(string $nombre)
    {
        $nombre = trim($nombre);
        if ($nombre === '') {
            throw new InvalidArgumentException('El nombre no puede estar vacío.');
        }
        $this->nombre = $nombre;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function obtenerDescripcion(): string
    {
        return 'Persona: ' . $this->nombre;
    }
}
