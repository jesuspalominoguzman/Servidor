<?php
declare(strict_types=1);

require_once __DIR__ . '/Describible.php';
require_once __DIR__ . '/Recurso.php';
require_once __DIR__ . '/Libro.php';
require_once __DIR__ . '/Revista.php';
require_once __DIR__ . '/Aviso.php';

function describir(Describible $elemento): string
{
    return $elemento->obtenerDescripcion();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 23 – Recursos y Describible</title>
</head>
<body>
<h1>Ejercicio 23 – Recursos que se prestan y se describen</h1>

<?php
$libro   = new Libro('Aprender PHP');
$revista = new Revista('Tecnología actual');
$aviso   = new Aviso('Biblioteca cerrada el lunes');

$elementos = [$libro, $revista, $aviso];
foreach ($elementos as $elemento) {
    echo '<p>' . htmlspecialchars(describir($elemento), ENT_QUOTES, 'UTF-8') . '</p>';
}

echo '<p>Préstamo del libro: '   . $libro->getDiasPrestamo()   . ' días</p>';
echo '<p>Préstamo de la revista: ' . $revista->getDiasPrestamo() . ' días</p>';

/*
 * RESPUESTAS:
 * 1. ¿Qué datos y código comparten Libro y Revista gracias a Recurso?
 *    Comparten la propiedad privada $titulo, el constructor que la inicializa y valida,
 *    el getter getTitulo() y el método obtenerDescripcion().
 *
 * 2. ¿Qué operación común permite exigir Describible a los tres objetos?
 *    Exige la implementación de obtenerDescripcion(): string.
 *
 * 3. ¿Por qué no hacemos que Aviso herede de Recurso?
 *    Porque un aviso no es un recurso prestable (no tiene sentido que tenga días de préstamo).
 *    Herencia modela una relación "es-un", y Aviso solo comparte la capacidad de ser descrito
 *    (Describible), no las características ni el comportamiento de un recurso bibliográfico.
 *
 * 4. ¿Podríamos llamar a getDiasPrestamo() sobre cualquier objeto recibido como Describible?
 *    No. La interfaz Describible solo garantiza que el objeto tiene obtenerDescripcion().
 *    El Aviso implementa Describible pero no tiene el método getDiasPrestamo(), por lo que
 *    llamar a ese método provocaría un error fatal.
 */
?>
</body>
</html>
