<?php
declare(strict_types=1);

require_once __DIR__ . '/Entrada.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5 – Reparar y comprobar una clase</title>
</head>
<body>
<h1>Ejercicio 5 – Reparar y comprobar una clase</h1>

<?php
/*
 * ERRORES DEL PROGRAMA ORIGINAL:
 *
 * Error 1: return $precio * $cantidad;
 *   Dentro de un método, las propiedades deben accederse con $this->.
 *   Corrección: return $this->precio * $cantidad;
 *
 * Error 2: $entrada = Entrada();
 *   Para instanciar un objeto se necesita la palabra clave new.
 *   Corrección: $entrada = new Entrada();
 *
 * Error 3: echo $entrada['evento'];
 *   Los objetos no se acceden con corchetes (eso es para arrays).
 *   Corrección: echo $entrada->evento;
 *
 * PREGUNTA: ¿Estos cálculos modifican el precio guardado en el objeto?
 *   No. calcularTotal() solo multiplica $this->precio por la cantidad
 *   y devuelve el resultado, sin modificar la propiedad $precio.
 */

$entrada = new Entrada();

// Mostrar el evento
echo '<p>Evento: ' . htmlspecialchars($entrada->evento, ENT_QUOTES, 'UTF-8') . '</p>';

// Tres entradas → 36,00 €
echo '<p>3 entradas: ' . number_format($entrada->calcularTotal(3), 2, ',', '.') . ' €</p>';

// Una entrada → 12,00 €
echo '<p>1 entrada: ' . number_format($entrada->calcularTotal(1), 2, ',', '.') . ' €</p>';

// Cinco entradas → 60,00 €
echo '<p>5 entradas: ' . number_format($entrada->calcularTotal(5), 2, ',', '.') . ' €</p>';
?>
</body>
</html>
