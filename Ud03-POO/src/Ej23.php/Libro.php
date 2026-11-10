<?php
declare(strict_types=1);

require_once __DIR__ . '/Recurso.php';

class Libro extends Recurso
{
    public function getDiasPrestamo(): int
    {
        return 14;
    }
}
