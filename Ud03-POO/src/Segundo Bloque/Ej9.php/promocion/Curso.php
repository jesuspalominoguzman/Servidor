<?php
declare(strict_types=1);

class Curso
{
    // La promoción de constructor declara y asigna las propiedades en una sola línea
    public function __construct(
        private string $nombre,
        private int    $horas = 20
    ) {
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getHoras(): int
    {
        return $this->horas;
    }
}
