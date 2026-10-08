    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej19 PHP</title>
</head>
<body>
    <header>
        <h1>Ejercicio 19 - Bloque 4</h1>
    </header>

    <form action="" method="get">
        <div>
        <label for="numero">Ingrese un número de inicio</label>
        <input type="number" name="inicio" id="numero">
        </div>

        <div>
        <label for="numero">Ingrese un número de fin</label>
        <input type="number" name="fin" id="numero">
        <button type="submit">Mostrar cuenta</button>
        </div>

    </form>

    <?php 
     if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['inicio'], $_GET['fin']) && $_GET['inicio'] !== '' && $_GET['fin'] !== '') {
        
        $inicio = $_GET['inicio'] ?? '';
        $fin = $_GET['fin'] ?? '';

        if (($inicio >= 1 && $inicio <= 100) && ($fin >= 1 && $fin <= 100) && ($inicio <= $fin)) {
            $contador = 0;
            
            for ($i = $inicio; $i <= $fin; $i++) {
                $contador = $contador + $i;
            }

            echo "El intervalo es: " . $inicio . " a " . $fin;

            echo " El total de los numeros es: " . $contador;

        }
        }
        
        ?>

</body>
</html>