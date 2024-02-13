<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$dsn = "mysql:host=localhost;dbname=inmobiliaria";
$username = "dwes";
$password = "abc123.";

try {
    $llamadaBD = new PDO($dsn, $username, $password);
    $llamadaBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST["enviar"])) {
        switch ($_POST["categoria"]) {
            case 'todas':
                echo "<h1> Conexión correcta </h1>";   
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <h1>Consulta de noticias</h1>
                    <label for="titulo">Mostrar noticias por categoría: </label>
                    <select name="categoria" id="categoria">
                        <option value="todas">Todas las categorías</option>
                        <option value="promociones">Promociones</option>
                        <option value="ofertas">Ofertas</option>
                        <option value="costas">Costas</option>
                    </select>
                    <input type="submit" name="enviar" value="actualizar">
                </form>
                <?php   
                $consulta = $llamadaBD->query("SELECT * FROM noticias ORDER BY fecha DESC");
                break;
            case 'promociones':
                echo "<h1> Conexión correcta </h1>";   
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <h1>Consulta de noticias</h1>
                    <label for="titulo">Mostrar noticias por categoría: </label>
                    <select name="categoria" id="categoria">
                        <option value="todas">Todas las categorías</option>
                        <option value="promociones">Promociones</option>
                        <option value="ofertas">Ofertas</option>
                        <option value="costas">Costas</option>
                    </select>
                    <input type="submit" name="enviar" value="actualizar">
                </form>
                <?php    
                $consulta = $llamadaBD->query("SELECT * FROM noticias WHERE categoria = 'promociones' ORDER BY fecha DESC");
                break;
            case 'ofertas':
                echo "<h1> Conexión correcta </h1>";    
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <h1>Consulta de noticias</h1>
                    <label for="titulo">Mostrar noticias por categoría: </label>
                    <select name="categoria" id="categoria">
                        <option value="todas">Todas las categorías</option>
                        <option value="promociones">Promociones</option>
                        <option value="ofertas">Ofertas</option>
                        <option value="costas">Costas</option>
                    </select>
                    <input type="submit" name="enviar" value="actualizar">
                </form>
                <?php   
                $consulta = $llamadaBD->query("SELECT * FROM noticias WHERE categoria = 'ofertas' ORDER BY fecha DESC");
                break;
            case 'costas':
                echo "<h1> Conexión correcta </h1>";
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <h1>Consulta de noticias</h1>
                    <label for="titulo">Mostrar noticias por categoría: </label>
                    <select name="categoria" id="categoria">
                        <option value="todas">Todas las categorías</option>
                        <option value="promociones">Promociones</option>
                        <option value="ofertas">Ofertas</option>
                        <option value="costas">Costas</option>
                    </select>
                    <input type="submit" name="enviar" value="actualizar">
                </form>
                <?php   
                $consulta = $llamadaBD->query("SELECT * FROM noticias WHERE categoria = 'costas' ORDER BY fecha DESC");
                break;
            default:
                echo"error";
                break;
        }
        
        echo "<table>";
        echo "<th>título</th>";
        echo "<th>texto</th>";
        echo "<th>categoria</th>";
        echo "<th>fecha</th>";
        while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$registro['titulo']."</td>"."<td>".$registro['texto']."</td>"."<td>".$registro['categoria']."</td>"."<td>".$registro['fecha']."</td>" ;
            echo "</tr>";
        }
        echo "</table>";
    } else {
?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <h1>Consulta de noticias</h1>
        <label for="titulo">Mostrar noticias por categoría: </label>
        <select name="categoria" id="categoria">
            <option value="todas">Todas las categorías</option>
            <option value="promociones">Promociones</option>
            <option value="ofertas">Ofertas</option>
            <option value="costas">Costas</option>
        </select>
        <input type="submit" name="enviar" value="actualizar">
    </form>
<?php
    }
} catch(PDOException $e) {
    echo "<h1>Error de conexión: " . $e->getMessage() . "</h1>";
}
?>

</body>
</html>
