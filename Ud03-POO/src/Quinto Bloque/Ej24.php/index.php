<?php
declare(strict_types=1);

// HUECO 1: interface
interface Identificable
{
    public function getCodigo(): string;
}

// HUECO 2: implements Identificable
class Socio implements Identificable
{
    public function __construct(private string $codigo)
    {
    }

    public function getCodigo(): string
    {
        return 'SOC-' . $this->codigo;
    }
}

class Pedido implements Identificable
{
    public function __construct(private string $codigo)
    {
    }

    public function getCodigo(): string
    {
        return 'PED-' . $this->codigo;
    }
}

// HUECO 3: Identificable  — tipo común que admite Socio y Pedido
// HUECO 4: getCodigo()
function consultarCodigo(Identificable $elemento): string
{
    return $elemento->getCodigo();
}

$socio  = new Socio('10');
$pedido = new Pedido('25');

echo htmlspecialchars(consultarCodigo($socio),  ENT_QUOTES, 'UTF-8');
echo '<br>';
echo htmlspecialchars(consultarCodigo($pedido), ENT_QUOTES, 'UTF-8');

/*
 * HUECOS:
 * 1: interface
 * 2: implements Identificable
 * 3: Identificable
 * 4: getCodigo()
 *
 * SALIDA:
 * SOC-10
 * PED-25
 *
 * RESPUESTAS:
 * - new Identificable() NO es válido: una interfaz no puede instanciarse.
 * - Una clase Cliente que declare getCodigo() sin implements Identificable
 *   NO puede pasarse a consultarCodigo(): PHP comprueba la implementación declarada.
 * - Si varias clases necesitan propiedades y un constructor ya implementado,
 *   se usa una clase abstracta (bloque 4) como base común.
 */
