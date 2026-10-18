<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej 25 PHP</title>
</head>
<body>

    <header>
        <h1>Ejercicio 25 - Bloque 5</h1>
    </header>
    
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Altura</th>
            </tr>
        </thead>
        <tbody>
            <?php

                $alturas = [
                    'Palomino' => 1.88,
                    'Lucía' => 1.75,
                    'Juan' => 1.65,
                    'Pedro' => 1.55,
                    'Carlos' => 1.45       
                ];

                $contador = 0;

                foreach ($alturas as $nombre => $altura) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($nombre) . "</td>";
                    echo "<td>" . $altura . "</td>";
                    echo "</tr>";

                    $contador += $altura;

                }

                $media = $contador / count($alturas);

                echo "<tr>";
                echo "<td>Media</td>";
                echo "<td>" . $media . "</td>";
                echo "</tr>";
            ?>
        </tbody>


    </table>


</body>
</html>