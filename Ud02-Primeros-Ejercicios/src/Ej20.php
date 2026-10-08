    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej20 PHP</title>
</head>
<body>
    <header>
        <h1>Ejercicio 20 - Bloque 4</h1>
    </header>

    <form action="" method="get">
        <div>
        <label for="numero">Ingrese un número para la base</label>
        <input type="number" name="base" id="numero">
        </div>

        <div>
        <label for="numero">Ingrese un número para el exponente</label>
        <input type="number" name="exponente" id="numero">
        <button type="submit">Mostrar cuenta</button>
        </div>

    </form>

    <?php 
     if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['base'], $_GET['exponente']) && $_GET['base'] !== '' && $_GET['exponente'] !== '') {
        
        $base = $_GET['base'] ?? '';
        $exponente = $_GET['exponente'] ?? '';

        if (is_int($base) && is_int($exponente) && $exponente > 0  ) {
            
        $total = 0;

        for ($i = $base; $i <= $exponente; $i++) {

            $total = $total + ($base * $base);

        }

        echo "La potencia de " . $base . " elevado a " . $exponente . " es: " . $total;

        }else{
            echo "El número introducido no es válido, no se puede calcular la potencia";
        }
        }
        
        ?>

</body>
</html>