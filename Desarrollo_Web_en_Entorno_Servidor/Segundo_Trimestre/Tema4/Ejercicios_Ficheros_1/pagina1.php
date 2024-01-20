<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina1</title>
</head>

<body>
    <h1>Sugerencias para nuestra página web</h1>

    <form action="pagina2.php" method="POST">
        <div>
            <label for="nombre"><strong>Introduzca su nombre:</strong></label><br>
            <input type="text" id="nombre" name="nombre">
        </div>
        <div>
            <label for="comentario"><strong>Comentarios sobre esta página web:</strong></label><br>
            <textarea id="comentario" name="comentario" rows="10" cols="50"></textarea>
        </div>
        <div>
            <input type="submit" value="Enviar">
        </div>
    </form>
</body>

</html>
