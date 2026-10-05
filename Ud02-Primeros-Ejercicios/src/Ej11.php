<?php 

$edad = $_POST['edad'] ?? '';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej11 PHP</title>
</head>

<header>
    <h1>Ejercicio 11 - Bloque 3</h1>
</header>
<body>

    <form action=" " method="post">
        <label for="numero">Ingrese una edad</label>
        <input type="number" name="edad" id="numero">
        <button type="submit">Enviar</button>
    </form>

    
    <section>
        <p>
            <?php 

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            if($edad > 0 && $edad < 3) {
                echo "La persona es bebé";

            }else if ($edad >= 3 && $edad <= 12) {
                echo "La persona es niña";

            }else if ($edad >= 13 && $edad <= 17) {
                echo "La persona es adolescente";
            
            }else if ($edad >= 18 && $edad <= 66) {
                echo "La persona es adulta";

            }else if ($edad >= 67) {
                echo "La persona es jubilada";

            }else {
                echo "La edad introducida es negativa, introduce una edad positiva";
            }

            }
            ?>

        </p>
    </section>

    
</body>
</html>