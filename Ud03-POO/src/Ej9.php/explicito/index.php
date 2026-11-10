<?php
declare(strict_types=1);

require_once __DIR__ . '/Curso.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 9 – Constructor explícito</title>
</head>
<body>
<h1>Ejercicio 9 – Constructor explícito</h1>

<?php
$curso1 = new Curso('PHP', 30);
$curso2 = new Curso('Laravel'); // 20 horas por defecto

echo '<p>' . htmlspecialchars($curso1->getNombre(), ENT_QUOTES, 'UTF-8')
    . ': ' . $curso1->getHoras() . ' horas</p>';

echo '<p>' . htmlspecialchars($curso2->getNombre(), ENT_QUOTES, 'UTF-8')
    . ': ' . $curso2->getHoras() . ' horas</p>';

/*
 * RESPUESTAS:
 * - string $nombre (parámetro normal): solo declara el parámetro. Hay que asignarlo
 *   manualmente con $this->nombre = $nombre;
 * - private string $nombre (promoción): declara Y asigna la propiedad automáticamente.
 * - La promoción evita repetir la declaración de la propiedad arriba y la asignación abajo.
 * - La promoción NO comprueba automáticamente que las horas sean positivas; habría
 *   que añadir validación manualmente igual que en la forma explícita.
 */
?>
</body>
</html>
