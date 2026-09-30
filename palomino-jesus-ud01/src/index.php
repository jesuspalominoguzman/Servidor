<?php
$nombre = "jesús";
$apellidos = "palomino guzmán";
$perfil_profesional = "Programador Full Stack";
$presentacion1 = "Soy una persona con iniciativa, siempre con ganas de aprender y aportar.";
$presentacion2 = " Me adapto rápido a distintos entornos de trabajo y me desenvuelvo bien en equipo.";
$presentacion3 = " Me gusta enfrentar nuevos retos y entender cómo funcionan las herramientas que utilizo.";
$formacion_academica_1 = "Bachillerato Tecnológico";
$formacion_academica_2 = "C1 de Cambridge English";
$formacion_academica_3 = "Grado Superior en Desarrollo de Aplicaciones Multiplataforma";
$experiencia_laboral_ = "555 horas de prácticas en desarrollo FullStack en Embrace-IT";
$tecnologías = "HTML, CSS, JavaScript, PHP, MySQL, Git, Flutter, .NET, C#, Java, Python";
$idiomas = "Español (nativo), Inglés (C1)";
$ciudad = "Malaga";
$correo_electronico = "77jesuspg@gmail.com";
$version_de_php = phpversion();
$fecha_guardado = filemtime(__FILE__);
$fecha_actual = date("d/m/Y H:i:s");
$url_contacto = "https://www.linkedin.com/in/jesuspalominoguzman/";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículum Vitae</title>
</head>
<body>
    <header>
        <h1>
            <?php echo ucwords($nombre . " " . $apellidos); ?>
        </h1>
    </header>

    <main>

        <hr>
        <section>
            <h1>Mi Información</h1>

            <ul>
                <li><?php echo $perfil_profesional; ?></li>

                <ol>
                    <li><?php echo $presentacion1;?> </li>
                    <li><?php echo $presentacion2;?> </li>
                    <li><?php echo $presentacion3;?> </li>
                </ol>
                <li><?php echo $ciudad; ?></li>
                <li><?php echo $correo_electronico; ?></li>
            </ul>
        </section>
        <hr>
        <section>
            <h1>Mi Formación Académica</h1>

            <ol>
                <li><?php echo $formacion_academica_1; ?></li>
                <li><?php echo $formacion_academica_2; ?></li>
                <li><?php echo $formacion_academica_3; ?></li>
                <li><?php echo $experiencia_laboral_; ?></li>
            </ol>
        </section>

        <hr>
        
        <section>
            <h1>Mis Habilidades</h1>

            <h3><?php echo $tecnologías; ?></h2>
            <p><?php echo $idiomas; ?></p>
        </section>

        <hr>

        <footer>

        <ul>
            <li>Encuéntrame en LinkedIn como: <a href="<?= $url_contacto ?>">Mi web</a></li>
            <li>Curriculum expedido a versión de PHP: <?php echo $version_de_php; ?></li>
            <li>Fecha de guardado del archivo: <?php echo date("d/m/Y H:i:s", $fecha_guardado); ?></li>
            <li>Fecha actual: <?php echo $fecha_actual; ?></li>
        </ul>
        </footer>
    </main>
</body>
</html>