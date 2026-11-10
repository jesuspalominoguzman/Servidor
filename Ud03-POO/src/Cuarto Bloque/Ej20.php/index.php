<?php
declare(strict_types=1);

abstract class Aviso
{
    private string $texto;

    public function __construct(string $texto)
    {
        $this->texto = $texto;
    }

    final public function getTexto(): string
    {
        return $this->texto;
    }

    abstract public function obtenerMensaje(): string;
}

class AvisoUrgente extends Aviso
{
    public function __construct(string $texto)
    {
        // CORRECCIÓN 1: llamar al constructor del padre para inicializar $texto
        parent::__construct($texto);
    }

    // CORRECCIÓN 2: eliminar getTexto() porque estaba sobreescribiendo un método final
    // (PHP lo prohíbe) y además devolvía un texto incorrecto.

    // CORRECCIÓN 3: implementar obtenerMensaje() que faltaba en la versión original
    public function obtenerMensaje(): string
    {
        return 'URGENTE: ' . $this->getTexto();
    }
}

$aviso = new AvisoUrgente('Revisar entrega');
echo htmlspecialchars($aviso->obtenerMensaje(), ENT_QUOTES, 'UTF-8');

/*
 * CORRECCIONES:
 * 1. AvisoUrgente::__construct() no llamaba a parent::__construct($texto),
 *    por lo que $texto nunca se guardaba en el padre.
 * 2. AvisoUrgente intentaba sobreescribir getTexto(), que es final → error fatal.
 *    Se elimina ese método de la hija.
 * 3. AvisoUrgente no implementaba obtenerMensaje() (método abstracto del padre).
 *    Se añade devolviendo 'URGENTE: ' seguido del texto del padre.
 */
