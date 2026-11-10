<?php
declare(strict_types=1);

require_once __DIR__ . '/Describible.php';

class Categoria implements Describible
{
    private string $nombre;

    public function __construct(string $nombre)
    {
        $nombreLimpio = trim($nombre);
        if ($nombreLimpio === '') {
            throw new InvalidArgumentException('El nombre de la categoría no puede estar vacío.');
        }
        $this->nombre = $nombreLimpio;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function obtenerDescripcion(): string
    {
        return 'Categoría: ' . $this->nombre;
    }
}
