<?php
declare(strict_types=1);

class Libro
{
    private string $titulo;
    private string $autor;
    private int $paginas;

    public function __construct(string $titulo, string $autor, int $paginas = 0)
    {
        $titulo = trim($titulo);
        $autor  = trim($autor);

        if ($titulo === '') {
            throw new InvalidArgumentException('El título no puede estar vacío.');
        }
        if ($autor === '') {
            throw new InvalidArgumentException('El autor no puede estar vacío.');
        }
        if ($paginas < 0) {
            throw new InvalidArgumentException('El número de páginas no puede ser negativo.');
        }

        $this->titulo  = $titulo;
        $this->autor   = $autor;
        $this->paginas = $paginas;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getAutor(): string
    {
        return $this->autor;
    }

    public function getPaginas(): int
    {
        return $this->paginas;
    }

    public function obtenerFicha(): string
    {
        return "Título: {$this->titulo}\nAutor: {$this->autor}\nPáginas: {$this->paginas}";
    }
}
