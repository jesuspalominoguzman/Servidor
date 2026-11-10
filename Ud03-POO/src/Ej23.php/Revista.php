<?php
declare(strict_types=1);

require_once __DIR__ . '/Recurso.php';

class Revista extends Recurso
{
    public function getDiasPrestamo(): int
    {
        return 7;
    }
}
