<?php
$titulo = "Página Secundaria";
include __DIR__ . '/encabezado.php';
?>
    <header>
        <h1><?= htmlspecialchars($titulo) ?></h1>
    </header>
    <p>Contenido diferente reutilizando los mismos fragmentos.</p>
<?php
include __DIR__ . '/pie.php';
?>