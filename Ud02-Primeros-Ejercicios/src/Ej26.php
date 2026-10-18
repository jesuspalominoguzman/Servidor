<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej 26 PHP</title>
</head>
<body>

    <header>
        <h1>Ejercicio 26 - Bloque 5</h1>
    </header>
    
    <table border="1">

        <?php 

            $personas = [

                'Pedro' => [
                    'nombre' => 'Pedro',
                    'altura' => 1.75,
                    'email' => 'pedro@gmail.com'
                ],
                'Lucía' => [
                    'nombre' => 'Lucía',
                    'altura' => 1.65,
                    'email' => 'lucia@gmail.com'
                ],
                'Juan' => [
                    'nombre' => 'Juan',
                    'altura' => 1.55,
                    'email' => 'juan@gmail.com'
                ],
                'Carlos' => [
                    'nombre' => 'Carlos',
                    'altura' => 1.45,
                    'email' => 'carlos@gmail.com'
                ],
                'Palomino' => [
                    'nombre' => 'Palomino',
                    'altura' => 1.88,
                    'email' => 'palomino@gmail.com'
                ],



            ];

            foreach ($personas as $nombre => $persona) {
                echo "<tr>";

                foreach ($persona as $campo => $valor) {
                    echo "<td>" . htmlspecialchars($valor) . "</td>";
                }

                echo "</tr>";  

            }

        ?>


    </table>


</body>
</html>