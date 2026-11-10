<?php
declare(strict_types=1);

require_once __DIR__ . '/Curso.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 9 – Promoción de constructor</title>
</head>
<body>
<h1>Ejercicio 9 – Promoción de constructor</h1>

<?php
$curso1 = new Curso('PHP', 30);
$curso2 = new Curso('Laravel'); // 20 horas por defecto

echo '<p>' . htmlspecialchars($curso1->getNombre(), ENT_QUOTES, 'UTF-8')
    . ': ' . $curso1->getHoras() . ' horas</p>';

echo '<p>' . htmlspecialchars($curso2->getNombre(), ENT_QUOTES, 'UTF-8')
    . ': ' . $curso2->getHoras() . ' horas</p>';

/*
 * RESPUESTAS:
 * - string $nombre: solo parámetro, sin propiedad.
 * - private string $nombre: declara la propiedad Y la asigna en el constructor.
 * - La promoción evita escribir la propiedad antes del constructor y el $this->x = $x; dentro.
 * - NO hay validación automática: sigue siendo necesario añadirla manualmente si se requiere.
 */
?>
</body>
</html>
