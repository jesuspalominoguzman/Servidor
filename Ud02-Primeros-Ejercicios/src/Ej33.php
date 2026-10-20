<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 33 PHP</title>
</head>
<body>
    <header>
        <h1>Ejercicio 33 - Bloque 6
        </h1>
    </header>
    <?php
    function agregarPostre(array $menu, string$postre): array {
        $menu[] =$postre;
        $variableLocal = "Dato interno";
        /*
         No se puede leer $variableLocal desde fuera porque su ámbito es local a la función.
         Se destruye de la memoria una vez que la función termina su ejecución.
        */
        return $menu;
    }

    function agregarBebida(array &$menu, string$bebida): void {
        $menu[] =$bebida;
    }

    $menuOriginal = ['primero', 'segundo'];
    $menuConPostre = agregarPostre($menuOriginal, 'postre');

    echo "<h3>Original sin modificar:</h3>";
    echo "<pre>"; var_dump($menuOriginal); echo "</pre>";

    echo "<h3>Devuelto con postre:</h3>";
    echo "<pre>"; var_dump($menuConPostre); echo "</pre>";

    agregarBebida($menuOriginal, 'bebida');
    echo "<h3>Original tras agregar bebida (por referencia):</h3>";
    echo "<pre>"; var_dump($menuOriginal); echo "</pre>";
    ?>
</body>
</html>