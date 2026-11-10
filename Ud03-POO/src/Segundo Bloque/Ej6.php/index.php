<?php
declare(strict_types=1);

require_once __DIR__ . '/Libro.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 6 – Libro con constructor</title>
</head>
<body>
<h1>Ejercicio 6 – Libro con constructor y encapsulación</h1>

<?php
// Libro con los tres argumentos
$libro1 = new Libro('El Quijote', 'Miguel de Cervantes', 863);
// Libro sin indicar páginas (valor por defecto 0)
$libro2 = new Libro('Lazarillo de Tormes', 'Anónimo');

echo '<h2>Ficha del libro 1</h2>';
echo '<pre>' . htmlspecialchars($libro1->obtenerFicha(), ENT_QUOTES, 'UTF-8') . '</pre>';

echo '<h2>Ficha del libro 2 (sin páginas)</h2>';
echo '<pre>' . htmlspecialchars($libro2->obtenerFicha(), ENT_QUOTES, 'UTF-8') . '</pre>';

echo '<h2>Usando getters</h2>';
echo '<p>Título: '  . htmlspecialchars($libro1->getTitulo(),  ENT_QUOTES, 'UTF-8') . '</p>';
echo '<p>Autor: '   . htmlspecialchars($libro1->getAutor(),   ENT_QUOTES, 'UTF-8') . '</p>';
echo '<p>Páginas: ' . $libro1->getPaginas() . '</p>';
echo '<p>Páginas del libro 2 (debe ser 0): ' . $libro2->getPaginas() . '</p>';

// --- Pruebas de datos inválidos ---
echo '<h2>Pruebas de construcción inválida</h2>';

// Título formado solo por espacios
try {
    $libroInvalido = new Libro('   ', 'Autor');
} catch (InvalidArgumentException $e) {
    echo '<p>Título vacío: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
}

// Autor vacío
try {
    $libroInvalido = new Libro('Título válido', '');
} catch (InvalidArgumentException $e) {
    echo '<p>Autor vacío: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
}

// Páginas negativas
try {
    $libroInvalido = new Libro('Título válido', 'Autor válido', -10);
} catch (InvalidArgumentException $e) {
    echo '<p>Páginas negativas: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
}

// NOTA: La instrucción $libro->paginas = 220; ya no funciona porque
// la propiedad es privada. Solo el constructor puede inicializarla.
?>
</body>
</html>
