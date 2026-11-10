<?php
declare(strict_types=1);

class Autor
{
    private string $nombre;

    public function __construct(string $nombre)
    {
        $nombre = trim($nombre);
        if ($nombre === '') {
            throw new InvalidArgumentException('El nombre del autor no puede estar vacío.');
        }
        $this->nombre = $nombre;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): bool
    {
        $nombre = trim($nombre);
        if ($nombre === '') {
            return false;
        }
        $this->nombre = $nombre;
        return true;
    }
}
