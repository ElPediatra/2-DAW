<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmobiliaria - Eliminar</title>
</head>

<body>
    <?php
    if (isset($_POST["eliminar"])) {
        if (isset($_POST["ids"])) {
            $ids = $_POST["ids"];
            $dsn = "mysql:host=localhost;dbname=inmobiliaria";
            $username = "dwes";
            $password = "abc123.";

            try {
                $dwes = new PDO($dsn, $username, $password);
                $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                foreach ($ids as $id) {
                    $eliminar = $dwes->prepare('DELETE FROM noticias WHERE id = ?');
                    $eliminar->execute([$id]);
                }

                echo "Se han eliminado las noticias: " . implode(" ", $ids) . " correctamente.";

                $dwes = null;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
    ?>
    <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <h1>Eliminación de noticias</h1>
        <table>
            <tr>
                <th>Título</th>
                <th>Texto</th>
                <th>Categoría</th>
                <th>Fecha</th>
                <th>Imagen</th>
                <th>Borrar</th>
            </tr>
            <?php
            $dsn = "mysql:host=localhost;dbname=inmobiliaria";
            $username = "dwes";
            $password = "abc123.";

            try {
                $dwes = new PDO($dsn, $username, $password);
                $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $resultado = $dwes->query('SELECT titulo, texto, categoria, fecha, imagen, id FROM noticias ORDER BY fecha DESC');
                while ($noticia = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>{$noticia['titulo']}</td>";
                    echo "<td>{$noticia['texto']}</td>";
                    echo "<td>{$noticia['categoria']}</td>";
                    echo "<td>{$noticia['fecha']}</td>";
                    echo "<td>{$noticia['imagen']}</td>";
                    echo "<td><input type='checkbox' name='ids[]' value='{$noticia['id']}'></td>";
                    echo "</tr>";
                }

                $dwes = null;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
        </table><br>
        <input type="submit" name="eliminar" value="Eliminar noticias marcadas">
    </form>
</body>

</html>
