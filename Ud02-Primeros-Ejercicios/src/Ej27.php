<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej 27 PHP</title>
</head>
<body>

    <header>
        <h1>Ejercicio 27 - Bloque 5</h1>
    </header>
    

        <h3>Apartado 1</h3>
        <?php 

            $frutas = ['pera', 'manzana', 'naranja'];

            echo "<p> Hay " . count($frutas) . " frutas en la lista</p>";

            echo "Los tipos de frutas son:<br>";

            for ($i = 0; $i < count($frutas); $i++) {
                var_dump($frutas[$i]);
            }


            echo "<br>"; echo "<br>";

            print_r($frutas);

        ?>

        <hr>

        <p>Apartado 2</p>

        <?php

        
            $frutas[] = 'plátano';

            array_push($frutas, 'limón');

            $extraido = array_pop($frutas);

            echo "<p>El último elemento es: " . $extraido . "</p>";

            echo "<br>";

            print_r($frutas);

        ?>

        <hr>

        <p>Apartado 3</p>

        <?php
            
           $pera = in_array('pera', $frutas);

           if ($pera) {
               echo "Pera está en la lista";
           } else {
               echo "Pera no está en la lista";
           }

           echo "<br>"; echo "<br>";
           print_r($frutas);
            
        ?>

        <hr>

        <p>Apartado 4</p>

        <?php

            $copia = $frutas;

            sort($copia);

            echo "La lista de la copia es:<br>";

            print_r($copia);

            echo "<br>"; echo "<br>";

            echo "La lista original es:<br>";

            print_r($frutas);

        ?>

        <hr>

        <p>Apartado 5</p>

        <?php

        unset($frutas[1]);

        $claves = array_keys($frutas);

        $contador = count($frutas);

        echo "La lista original tiene " . $contador . " elementos y los claves son: ";

        foreach ($claves as $clave) {
            echo $clave . ", ";
        }

        $frutas = array_values($frutas);

        echo "<br>"; echo "<br>";

        print_r($frutas);

        ?>

</body>
</html>