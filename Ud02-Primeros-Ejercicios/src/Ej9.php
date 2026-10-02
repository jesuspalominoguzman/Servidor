<?php 

$numero = $_POST['numero'] ?? '';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej9 PHP</title>
</head>

<header>
    <h1>Ejercicio 09 - Bloque 3</h1>
</header>
<body>

    <form action=" " method="post">
        <label for="numero">Ingrese un número</label>
        <input type="number" name="numero" id="numero">
        <button type="submit">Enviar</button>
    </form>

    
    <section>
        <p>
            <?php 

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            if($numero > 0) {
                echo "El número es positivo";
            }else if($numero < 0) {
                echo "El número es negativo";
            } else {
                echo "El número es cero";
            }

            }
            
            ?>

        </p>
    </section>

    
</body>
</html>