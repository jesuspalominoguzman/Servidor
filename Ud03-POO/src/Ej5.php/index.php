<?php
declare(strict_types=1);

class Contador
{
    public int $valor = 0;

    public function incrementar(): void
    {
        $this->valor++;
    }
}

$a = new Contador();
$b = new Contador();
$c = $a;

$a->incrementar();
$c->incrementar();
$b->incrementar();

echo $a->valor . '<br>';
echo $b->valor . '<br>';
echo $c->valor . '<br>';

$c = new Contador();
echo $c->valor;


//Comentario sin ejecutar: 2 1 2 0 