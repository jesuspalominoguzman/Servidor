<?php
declare(strict_types=1);

require_once __DIR__ . '/Autor.php';
require_once __DIR__ . '/Libro.php';
require_once __DIR__ . '/Biblioteca.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 12 – Biblioteca</title>
</head>
<body>
<h1>Ejercicio 12 – Biblioteca con array de libros</h1>

<?php
$biblioteca = new Biblioteca();

echo '<p>Libros al inicio: ' . $biblioteca->contarLibros() . '</p>';
echo '<p>Valor al inicio: ' . number_format($biblioteca->calcularValorTotal(), 2, ',', '.') . ' €</p>';

// Dos autores
$autor1 = new Autor('Ana López');
$autor2 = new Autor('Carlos Ruiz');

// Tres libros
$libro1 = new Libro('Aprender PHP',  20.0, $autor1);
$libro2 = new Libro('Practicar PHP', 15.0, $autor1);
$libro3 = new Libro('Bases de datos', 30.0, $autor2);

$biblioteca->anadirLibro($libro1);
$biblioteca->anadirLibro($libro2);
$biblioteca->anadirLibro($libro3);

echo '<h2>Catálogo</h2>';
echo '<table border="1" cellpadding="6">';
echo '<tr><th>Título</th><th>Autor</th><th>Precio</th></tr>';

foreach ($biblioteca->getLibros() as $libro) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($libro->getTitulo(),             ENT_QUOTES, 'UTF-8') . '</td>';
    echo '<td>' . htmlspecialchars($libro->getAutor()->getNombre(), ENT_QUOTES, 'UTF-8') . '</td>';
    echo '<td>' . number_format($libro->getPrecio(), 2, ',', '.')  . ' €</td>';
    echo '</tr>';
}

echo '</table>';

echo '<p>Número de libros: ' . $biblioteca->contarLibros() . '</p>';
echo '<p>Valor total: '      . number_format($biblioteca->calcularValorTotal(), 2, ',', '.') . ' €</p>';

/*
 * anadirLibro() no necesita crear otro objeto Libro porque recibe
 * el objeto ya construido y solo guarda la referencia en el array.
 */
?>
</body>
</html>
