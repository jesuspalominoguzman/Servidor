<?php
declare(strict_types=1);

require_once __DIR__ . '/Describible.php';

abstract class Recurso implements Describible
{
    private string $titulo;

    public function __construct(string $titulo)
    {
        $titulo = trim($titulo);
        if ($titulo === '') {
            throw new InvalidArgumentException('El título no puede estar vacío.');
        }
        $this->titulo = $titulo;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function obtenerDescripcion(): string
    {
        return 'Recurso: ' . $this->titulo;
    }

    abstract public function getDiasPrestamo(): int;
}
