<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej8 PHP</title>
</head>

<header>
    <h1>Ejercicio 08 - Bloque 2</h1>
</header>

<body>

    <form action="Ej8-procesar.php" method="post">

        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre">
        </div>

        <div>
            <p for="genero">De qué género eres?</p>

            <input type="radio" id="hombre" name="genero" value="hombre">
            <label for="hombre">Hombre</label>

            <input type="radio" id="mujer" name="genero" value="mujer">
            <label for="mujer">Mujer</label>

            <input type="radio" id="otro" name="genero" value="otro">
            <label for="otro">Otro</label>


        </div>

        <div>
            <p for="pais">De qué país eres?</p>

            <input type="radio" id="españa" name="pais" value="españa">
            <label for="españa">España</label>

            <input type="radio" id="francia" name="pais" value="francia">
            <label for="francia">Francia</label>

            <input type="radio" id="inglaterra" name="pais" value="inglaterra">
            <label for="inglaterra">Inglaterra</label>
        </div>

        <div>
            <label for="mensajes">Quieres seguir recibiendo mensajes?</label>
            <input type="checkbox" id="mensajes" name="mensajes">
        </div>

        <div>
            <label for="tema">Que tema de php te interesa más?</label>
            <input type="text" id="tema" name="tema">
        </div>

        <button type="submit">Enviar</button>


    </form>

</body>

</html>