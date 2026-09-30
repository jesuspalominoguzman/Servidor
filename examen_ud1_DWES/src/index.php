<?php
$nombre_proyecto = "GastroLogger";
$autoria = "Jesús Palomino Guzmán";
$finalidad = "Red social de restaurante para poder compartir con tus amistades tus sitios de comida favoritos";
$funcionalidad1 = "Medidor gráfico de aspectos como calidad-precio, sabor, servicio al cliente... para ver a simple vista una puntuación general del restaurante";
$funcionaidad2 = "Posibilidad de enlace con otras redes sociales como instagram para compartir tus salidas culinarias de una forma más profesional";
$version_de_php = phpversion();
$fecha_actual = date("d/m/Y H:i:s");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presentación de Proyecto</title>
</head>
<body>
    <header>
        <h1>
            <?php echo ($nombre_proyecto); ?>
        </h1>

        <h2>
            <?php echo ($autoria); ?>
        </h2>
    </header>

    <main>

        <section>
                <h2>Finalidad</h2>
                <p><?php echo ($finalidad); ?></p>
        </section>

        <section>
                <h2>Funcionalidades</h2>

                <ol>
                    <li><?php echo $funcionalidad1; ?></li>
                    <li><?php echo $funcionaidad2; ?></li>
                </ol>
        </section>

        <footer>
            <h3>Versiones y Fecha</h3>
            <p><?php echo $version_de_php; ?></p>
            <p><?php echo $fecha_actual; ?></p>
        </footer>
    </main>
</body>
</html>












