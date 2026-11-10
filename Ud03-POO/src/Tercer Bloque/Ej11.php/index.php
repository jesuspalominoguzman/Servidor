<?php
declare(strict_types=1);

require_once __DIR__ . '/Autor.php';
require_once __DIR__ . '/Libro.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 11 – Libros que comparten autor</title>
</head>
<body>
<h1>Ejercicio 11 – Libros que comparten autor</h1>

<?php
// Un único objeto autor compartido por los dos libros
$autor = new Autor('Ana López');

$libro1 = new Libro('Aprender PHP',   20.0, $autor);
$libro2 = new Libro('Practicar PHP',  15.0, $autor);

echo '<h2>Datos iniciales</h2>';
echo '<p>' . htmlspecialchars($libro1->getTitulo(), ENT_QUOTES, 'UTF-8')
    . ' – ' . number_format($libro1->getPrecio(), 2, ',', '.') . ' €'
    . ' – ' . htmlspecialchars($libro1->getAutor()->getNombre(), ENT_QUOTES, 'UTF-8') . '</p>';

echo '<p>' . htmlspecialchars($libro2->getTitulo(), ENT_QUOTES, 'UTF-8')
    . ' – ' . number_format($libro2->getPrecio(), 2, ',', '.') . ' €'
    . ' – ' . htmlspecialchars($libro2->getAutor()->getNombre(), ENT_QUOTES, 'UTF-8') . '</p>';

// Cambiar el nombre del autor
$autor->setNombre('Ana López García');

echo '<h2>Tras cambiar el nombre del autor</h2>';
echo '<p>' . htmlspecialchars($libro1->getTitulo(), ENT_QUOTES, 'UTF-8')
    . ' – ' . htmlspecialchars($libro1->getAutor()->getNombre(), ENT_QUOTES, 'UTF-8') . '</p>';

echo '<p>' . htmlspecialchars($libro2->getTitulo(), ENT_QUOTES, 'UTF-8')
    . ' – ' . htmlspecialchars($libro2->getAutor()->getNombre(), ENT_QUOTES, 'UTF-8') . '</p>';

// Intentar cambiar el nombre por espacios → rechazado
$ok = $autor->setNombre('   ');
echo '<h2>Intentar nombre con solo espacios</h2>';
echo '<p>¿Aceptado? ' . ($ok ? 'Sí' : 'No') . '</p>';
echo '<p>Nombre del autor de libro1: '
    . htmlspecialchars($libro1->getAutor()->getNombre(), ENT_QUOTES, 'UTF-8') . '</p>';

/*
 * RESPUESTAS:
 * - Se han creado 3 objetos: 1 Autor y 2 Libro.
 * - Ambos libros muestran el nombre actualizado porque los dos guardan una referencia
 *   al MISMO objeto Autor; no hay copia.
 * - getAutor() devuelve la referencia al objeto, no una copia independiente.
 *   Por eso modificar $autor afecta a lo que ven los dos libros.
 */
?>
</body>
</html>
