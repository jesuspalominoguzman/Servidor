<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado XML</title>
</head>
<body>
    <h1>Resultado XML</h1>
    <div id="resultado">
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset ($_FILES["archivo_xml"])) {

            if(pathinfo($_FILES['archivo_xml']['name'], PATHINFO_EXTENSION) == 'xml') {

                $xml = simplexml_load_file($_FILES['archivo_xml']['tmp_name']);

                if ($xml !== false) {

                    echo '<table border="1">';
                    echo '<tr><th>Nombre</th><th>Edad</th><th>Ciudad</th></tr>';

                    foreach ($xml->registro as $fila) {
                        echo '<tr>';
                            echo '<td>' . $fila->nombre . '</td>';
                            echo '<td>' . $fila->edad . '</td>';
                            echo '<td>' . $fila->ciudad . '</td>';
                        echo '</tr>';
                    }
                    
                    echo '</table>';

                }else{
                    echo "Error al cargar y procesar el archivo XML.";
                }


            }else{
                echo "Por favor, seleccione un XML válido.";
            }

        }
        ?>


    </div>

</body>
</html>