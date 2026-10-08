    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej17 PHP</title>

    <style>
        table, th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }

    </style>
</head>

<body>
    <header>
        <h1>Ejercicio 17 - Bloque 4</h1>
    </header>

        <h2> Tablas de multiplicación del 1 al 5 </h2>

        <table border="5" >
            <!--
            <thead>
                <tr>
                  <?php for ($numerotabla = 1; $numerotabla < 5; $numerotabla++) { ?>
                        <th>Tabla del <?= $numerotabla ?></th>    
                   <?php } ?>
                </tr>

            </thead>
            -->

            <tbody>

            <?php 
            
            for ($fila = 1; $fila <= $numerotabla; $fila++) { 
                
                echo "<tr>";

                for ($columna = 1; $columna <= 5; $columna++) {
                    echo "<td>" . $fila * $columna . "</td>";
                }

                echo "</tr>";
            }
            ?>
                
            </tbody>
        </table>

</body>
</html>