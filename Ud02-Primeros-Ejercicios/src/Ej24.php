<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej 24 PHP</title>
</head>
<body>

    <header>
        <h1>Ejercicio 24 - Bloque 5</h1>
    </header>

    <?php
        
        $contadores = ['A' => 0, 'B' => 0];
        $letras= [];


        for ($i = 0; $i < 50; $i++) {
            $numero = rand(0, 1);

            if ($numero == 0) {
                $letras[] = 'A';
            } else {
                $letras[] = 'B';
            }

        }

        foreach ($letras as $letra) {
            $contadores[$letra]++;
        }

    ?>
    
    <div>
        <h3>Las letras A y b aparecen: 
            <?php print_r($contadores); echo "cuya suma es " . $contadores['A'] + $contadores['B']; ?>
        </h3>
    </div>


</body>
</html>