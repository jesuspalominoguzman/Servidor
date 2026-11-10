<?php
declare(strict_types=1);

class Libro
{
    private string $titulo;
    private float  $precio;
    private Autor  $autor;

    public function __construct(string $titulo, float $precio, Autor $autor)
    {
        $titulo = trim($titulo);
        if ($titulo === '') {
            throw new InvalidArgumentException('El título no puede estar vacío.');
        }
        if ($precio < 0) {
            throw new InvalidArgumentException('El precio no puede ser negativo.');
        }
        $this->titulo = $titulo;
        $this->precio = $precio;
        $this->autor  = $autor;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function getAutor(): Autor
    {
        return $this->autor;
    }
}
