<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej12 PHP</title>
</head>
<body>
    <header>
        <h1>Ejercicio 12 - Bloque 3</h1>
    </header>

    <form action="" method="get">
        <label for="numero">Ingrese un número del 1 al 7</label>
        <input type="number" name="dia" id="numero">
        <button type="submit">Enviar</button>
    </form>

    <?php 
    
    if (isset($_GET['dia']) && $_GET['dia'] !== '') {
        
        $dia = $_GET['dia'];
    ?>
    
        <section>
            <p>
                <?php 
                echo "Día introducido por switch: ";
                
                switch ($dia) {
                    case 1: echo "Lunes"; break;
                    case 2: echo "Martes"; break;
                    case 3: echo "Miércoles"; break;
                    case 4: echo "Jueves"; break;
                    case 5: echo "Viernes"; break;
                    case 6: echo "Sábado"; break;
                    case 7: echo "Domingo"; break;
                    default: echo "El día introducido no es válido"; break;
                }

                echo "<br><br>";

                echo "Día introducido por match: ";
                
                echo match ($dia) {
                    '1' => 'Lunes',
                    '2' => 'Martes',
                    '3' => 'Miércoles',
                    '4' => 'Jueves',
                    '5' => 'Viernes',
                    '6' => 'Sábado',
                    '7' => 'Domingo',
                    default => 'El día introducido no es válido',
                };
                ?>
            </p>
        </section>

    <?php 
    } 
    ?>

</body>
</html>