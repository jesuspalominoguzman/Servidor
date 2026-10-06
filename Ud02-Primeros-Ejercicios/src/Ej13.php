<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej13 PHP</title>
</head>
<body>
    <header>
        <h1>Ejercicio 13 - Bloque 3</h1>
    </header>

    <form action="" method="post">
        <label for="texto">Ingrese un nombre</label>
        <input type="texto" name="nombre" id="texto">
        <button type="submit">Enviar</button>
    </form>

    <?php 
    
    if (isset($_POST['nombre']) && $_POST['nombre'] !== '') {
        
        $nombre = htmlspecialchars(trim($_POST['nombre'] ?? ''));
    ?>
    
        <section>
            <p>
                <?php 
                
                if(strlen($nombre) > 0) {
                    echo "Buenas " . $nombre;

                }else{
                    echo "Escribe el nombre primero";
                }
                ?>
            </p>
        </section>

    <?php 
    } 
    ?>

</body>
</html>