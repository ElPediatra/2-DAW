<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Noticias</title>
</head>
<body>
<?php
if (isset($_POST["titulo"])) {
    echo "Datos enviados correctamente";
    $titulo = $_POST["titulo"];
    $texto = $_POST["texto"];
    $categoria = $_POST["categoria"];
    $fecha= date("Y-m-d");

    $dsn = "mysql:host=localhost;dbname=inmobiliaria";
    $username = "dwes";
    $password = "abc123.";

    try {
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Preparar la consulta
        $consulta = $dbh->prepare("INSERT INTO noticias (titulo, texto, categoria, fecha) VALUES (?, ?, ?, ?)");
        
        // Ejecutar la consulta
        $consulta->execute([$titulo, $texto, $categoria, $fecha]);
    
        // Verificar si la consulta se ejecutó correctamente
        if ($consulta->rowCount() > 0) {
            echo "<h1>Registro insertado correctamente</h1>"."<br>";
        } else {
            echo "Error al insertar el registro";
        }

        // Cerrar la conexión
        $dbh = null;
    } catch (PDOException $e) {
        echo "<h1>Error de conexión: " . $e->getMessage() . "</h1>";
    }
} else {
?>
<!-- Formulario HTML -->
<form action="./Ejercicio2.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <label for="titulo">Título:* </label>
        <input type="text" name="titulo" id="titulo" required>
        <br>
        <label for="texto">Texto:* </label>
        <textarea rows="5" cols="30" name="texto" id="texto" required></textarea>
        <br>
        <label for="categoria">Categoría: </label>
        <select name="categoria" id="categoria">
            <option value="ofertas">ofertas</option>
            <option value="promociones">promociones</option>
        </select>
        <br>
        <label for="archivo">Imagen: </label>
        <input type="file" name="archivo" id="archivo">
        <br><br>
        <button type="submit" name="insertar">Insertar noticia</button>
    </fieldset>
</form>
<?php
}
?>


</body>
</html>
