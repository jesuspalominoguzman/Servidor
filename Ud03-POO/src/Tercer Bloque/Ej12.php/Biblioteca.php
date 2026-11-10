<?php
declare(strict_types=1);

class Biblioteca
{
    private array $libros = [];

    public function anadirLibro(Libro $libro): void
    {
        $this->libros[] = $libro;
    }

    public function getLibros(): array
    {
        return $this->libros;
    }

    public function contarLibros(): int
    {
        return count($this->libros);
    }

    public function calcularValorTotal(): float
    {
        $total = 0.0;
        foreach ($this->libros as $libro) {
            $total += $libro->getPrecio();
        }
        return $total;
    }
}
