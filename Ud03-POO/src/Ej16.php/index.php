<?php
declare(strict_types=1);

require_once __DIR__ . '/Persona.php';
require_once __DIR__ . '/Alumno.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 16 – Persona y Alumno</title>
</head>
<body>
<h1>Ejercicio 16 – Herencia: Persona → Alumno</h1>

<?php
$persona = new Persona('Luis');
$alumna  = new Alumno('Ana', 'DAW');

echo '<p>' . htmlspecialchars($persona->obtenerDescripcion(), ENT_QUOTES, 'UTF-8') . '</p>';
echo '<p>' . htmlspecialchars($alumna->obtenerDescripcion(),  ENT_QUOTES, 'UTF-8') . '</p>';

// Getter heredado
echo '<p>Nombre de Ana (getter heredado): '
    . htmlspecialchars($alumna->getNombre(), ENT_QUOTES, 'UTF-8') . '</p>';

// Ciclo vacío → excepción
try {
    $alumnoInvalido = new Alumno('Pedro', '');
} catch (InvalidArgumentException $e) {
    echo '<p>Ciclo vacío: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
}

/*
 * RESPUESTAS:
 * - No accedemos directamente a $this->nombre desde la hija porque es PRIVADA en Persona;
 *   la hija usa getNombre() para obtenerla.
 * - parent::__construct() inicializa la propiedad $nombre validándola.
 * - Al construir únicamente la alumna se crea 1 objeto Alumno (que a su vez llama al
 *   constructor del padre para inicializar la parte Persona del mismo objeto).
 */
?>
</body>
</html>
