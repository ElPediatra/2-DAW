<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Noticias</title>
</head>
<body>
    <?php
    $dsn = "mysql:host=localhost;dbname=inmobiliaria";
    $username = "dwes";
    $password = "abc123.";

    try {
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "<h1>Conexión establecida</h1>";

        $consulta = $dbh->query("SELECT * FROM noticias ORDER BY fecha DESC");

        echo "<table>";
        echo "<th>Título</th>";
        echo "<th>Texto</th>";
        echo "<th>Categoría</th>";
        echo "<th>Fecha</th>";

        while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $registro['titulo'] . "</td>";
            echo "<td>" . $registro['texto'] . "</td>";
            echo "<td>" . $registro['categoria'] . "</td>";
            echo "<td>" . $registro['fecha'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";

        $dbh = null; // Cerrar la conexión
    } catch (PDOException $e) {
        echo "<h1>Error de conexión: " . $e->getMessage() . "</h1>";
    }
    ?>
</body>
</html>
