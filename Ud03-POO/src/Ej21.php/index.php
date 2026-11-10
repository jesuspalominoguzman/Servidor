<?php
declare(strict_types=1);

class Ticket
{
    private string $nombre;
    protected float $precioBase = 5.0;

    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;
    }

    final public function getNombre(): string
    {
        return $this->nombre;
    }

    public function calcularPrecio(): float
    {
        return $this->precioBase;
    }
}

// HUECO 1: extends Ticket
final class TicketReducido extends Ticket
{
    public function __construct(string $nombre)
    {
        // HUECO 2: parent::__construct($nombre)
        parent::__construct($nombre);
    }

    public function calcularPrecio(): float
    {
        // HUECO 3: parent::calcularPrecio() / 2
        return parent::calcularPrecio() / 2;
    }
}

// HUECO 4: Ticket (tipo común que admite ambos objetos)
function mostrarPrecio(Ticket $ticket): string
{
    return $ticket->getNombre() . ': '
        . number_format($ticket->calcularPrecio(), 2, ',', '.')
        . ' €';
}

$normal   = new Ticket('General');
$reducido = new TicketReducido('Reducido');

echo htmlspecialchars(mostrarPrecio($normal),   ENT_QUOTES, 'UTF-8');
echo '<br>';
// HUECO 5: $reducido
echo htmlspecialchars(mostrarPrecio($reducido), ENT_QUOTES, 'UTF-8');

/*
 * HUECOS:
 * 1: extends Ticket
 * 2: parent::__construct($nombre)
 * 3: parent::calcularPrecio()
 * 4: Ticket
 * 5: $reducido
 *
 * SALIDA:
 * General: 5,00 €
 * Reducido: 2,50 €
 *
 * RESPUESTAS:
 * - TicketReducido SÍ puede acceder a $this->precioBase (es protected).
 *   NO puede acceder a $this->nombre (es private en Ticket).
 * - No se puede crear hija de TicketReducido porque está declarada como final.
 * - Una hija de Ticket NO puede sobrescribir getNombre() (es final).
 *   Sí puede utilizarlo sin sobrescribirlo.
 * - Al llamar mostrarPrecio($reducido), se ejecuta TicketReducido::calcularPrecio(),
 *   que divide el resultado de parent::calcularPrecio() (5.0) entre 2 → 2.5.
 */
