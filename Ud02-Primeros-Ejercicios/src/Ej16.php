    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej16 PHP</title>
</head>
<body>
    <header>
        <h1>Ejercicio 16 - Bloque 4</h1>
    </header>

    <form action="" method="get">
        <label for="numero">Ingrese un número entero</label>
        <input type="number" name="numero" id="numero" min="1" max="10" step="1">
        <button type="submit">Mostrar tabla</button>
    </form>

    <?php 
        
    if (isset($_GET['numero']) && $_GET['numero'] !== '') {
        
        $numero = $_GET['numero'] ?? '';
        if(!is_string($numero)||!ctype_digit($numero)) {
            $error = "El número introducido no es válido";
        }

        
        ?>

        <h2> Tabla de multiplicación del numero <?= $numero ?> </h2>

        <table border="5">
            <thead>
                <tr>
                    <th>Operación</th>
                    <th>Resultado</th>
                </tr>

            </thead>

            <tbody>

            <?php for ($i = 1; $i <= $numero; $i++) { ?>
                    <tr>
                        <td><?= $numero*$i ?> x <?= $i ?></td>
                        <td><?= $numero*$i ?></td>
                    </tr>

                    <?php } ?>
            </tbody>
        </table>






    <?php   
    }
    ?>

</body>
</html>