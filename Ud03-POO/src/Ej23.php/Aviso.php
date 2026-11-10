<?php
declare(strict_types=1);

require_once __DIR__ . '/Describible.php';

class Aviso implements Describible
{
    private string $texto;

    public function __construct(string $texto)
    {
        $texto = trim($texto);
        if ($texto === '') {
            throw new InvalidArgumentException('El texto del aviso no puede estar vacío.');
        }
        $this->texto = $texto;
    }

    public function obtenerDescripcion(): string
    {
        return 'Aviso: ' . $this->texto;
    }
}
