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

            $menus = [

                'Menú 1' => [
                    'primero' => 'Lentejas',
                    'segundo' => 'Pollo',
                    'postre' => 'Natilla',
                ],
                'Menú 2' => [
                    'primero' => 'Salchichas',
                    'segundo' => 'Patatas',
                    'postre' => 'Yogur',
                ],
                'Menú 3' => [
                    'primero' => 'Lentejas',
                    'segundo' => 'Pollo',
                    'postre' => 'Helao',
                ],



            ];

            foreach ($menus as $nombre => $menú) {
                echo "<section>";
                echo "<h2>" . htmlspecialchars($nombre) . "</h2>";
                echo "<ul>";

                foreach ($menú as $elemento => $valor) {
                    echo "<li>" . htmlspecialchars($valor) . "</li>";
                }

                echo "</ul>";
                echo "</section>";  
            }

            $menu = $menus['Menú 1'];

            $claves = array_keys($menu);

            echo " Las claves son: " . implode(', ', $claves);

            $postre = isset($menu['postre']);

            echo "<br><br>";

            if ($postre) {
                echo "El menu tiene postre";
            } else {
                echo "El menu no tiene postre";
            }

            echo "<br><br> El postre es: " . $postre;

            array_push($menu, 'bebida', 'Agua');

            unset($menu['segundo']);

            array_push($menu, 'observaciones', '');

            $resultado1 = isset($menu['observaciones']);

            $resultado2 = array_key_exists('observaciones', $menu);

            echo "<br><br> Resultado 1: " . $resultado1;
            echo "<br><br> Resultado 2: " . $resultado2;

            $copia = $menus;

            asort($copia);

            echo "<br><br>";

            echo "La lista de valores original es:<br>";

            foreach ($menus as $nombre => $menú) {
                echo "<section>";
                echo "<h2>" . htmlspecialchars($nombre) . "</h2>";
                echo "<ul>";

                foreach ($menú as $elemento => $valor) {
                    echo "<li>" . htmlspecialchars($valor) . "</li>";
                }

                echo "</ul>";
                echo "</section>";  
            }

            echo "<br><br>La lista de valores copia es:<br>";

            foreach ($copia as $nombre => $menú) {
                echo "<section>";
                echo "<h2>" . htmlspecialchars($nombre) . "</h2>";
                echo "<ul>";

                foreach ($menú as $elemento => $valor) {
                    echo "<li>" . htmlspecialchars($valor) . "</li>";
                }

                echo "</ul>";
                echo "</section>";  
            }

        ?>


    </table>


</body>
</html>