<?php
$titulo = "Página Principal - Ejercicio 37";
/*
 El archivo incluido puede leer $titulo porque include/require inserta el código en el mismo ámbito 
 en el que se realiza la llamada. A diferencia de las funciones, que tienen su propio ámbito aislado, 
 los archivos incluidos comparten el ámbito global (o local si se incluyen dentro de una función).
*/
include __DIR__ . '/encabezado.php';
?>
    <header>
        <h1><?= htmlspecialchars($titulo) ?></h1>
    </header>
    <p>Este es el párrafo propio de la primera página.</p>
<?php
include __DIR__ . '/pie.php';
?>