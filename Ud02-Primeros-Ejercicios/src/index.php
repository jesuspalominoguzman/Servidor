<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios PHP - DAW</title>
    <style>
        :root {
            /* Paleta de colores basada en Catppuccin/Dracula para modo oscuro */
            --bg-color: #1e1e2e;
            --text-color: #cdd6f4;
            --card-bg: #313244;
            --accent-color: #cba6f7;
            --hover-color: #b4befe;
        }
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            margin: 0;
            padding: 3rem 1rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            color: var(--accent-color);
            margin-bottom: 3rem;
            text-align: center;
            font-size: 2.5rem;
            letter-spacing: 1px;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 1.5rem;
            width: 100%;
            max-width: 1000px;
        }
        .card {
            background-color: var(--card-bg);
            border-radius: 12px;
            padding: 2rem 1.5rem;
            text-align: center;
            text-decoration: none;
            color: var(--text-color);
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            border: 2px solid transparent;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            border-color: var(--accent-color);
            background-color: #45475a;
            color: var(--hover-color);
        }
        .card-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            color: #a6adc8;
            font-size: 1.2rem;
            padding: 2rem;
            border: 2px dashed #45475a;
            border-radius: 12px;
        }
    </style>
</head>
<body>

    <h1> Prácticas de Servidor</h1>

    <div class="grid">
        <?php
        // Escanea el directorio actual buscando archivos que coincidan con el patrón
        $archivos = glob('Ej*.php');

        // Ordenamiento natural (1, 2... 9, 10) en lugar de alfabético (1, 10, 2...)
        natsort($archivos);

        if (count($archivos) > 0) {
            foreach ($archivos as $archivo) {
                // Quitamos la extensión para un título más limpio
                $nombre_base = basename($archivo, '.php');
                
                // Formateamos de "Ej1" a "Ejercicio 1"
                $titulo = preg_replace('/^Ej(\d+)$/i', 'Ejercicio $1', $nombre_base);

                echo "<a href='$archivo' class='card'>";
                echo "  <div class='card-icon'>🐘</div>";
                echo "  <div class='card-title'>$titulo</div>";
                echo "</a>";
            }
        } else {
            echo "<div class='empty-state'>Aún no hay ejercicios por aquí. ¡A picar código!</div>";
        }
        ?>
    </div>

</body>
</html>