<?php
// usuario.php

session_start();

$servername = "localhost";
$username = "dwes";
$password = "abc123.";
$dbname = "Tienda_Juegos";

//Creo la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

$productos = [];
$sql = "SELECT nombre, imagen, descripcion FROM juegos";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $productos[] = [
            'nombre' => $row['nombre'],
            'imagen' => $row['imagen'],
            'descripcion' => $row['descripcion'],
        ];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['comprar_id']) && isset($_POST['comprar_nombre'])) {
        $compra_id = $_POST['comprar_id'];
        $compra_nombre = $_POST['comprar_nombre'];

        // Agregar el juego a la lista de compras en la sesión
        $_SESSION['compras'][] = $compra_nombre;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Juegos</title>
    <style>
    img {
	    width: 200px; /* Ancho de 100 p\u00edxeles */
    	height: 100px; /* Alto de 100 p\u00edxeles */
	}
    </style>
</head>
<body>
    <h1>Tienda de Juegos</h1>

    <div>
        <h2>Lista de compras:</h2>
        <ul>
            <?php foreach ($_SESSION['compras'] as $compra) { ?>
                <li><?php echo $compra; ?></li>
            <?php } ?>
        </ul>
        <form method="post">
            <button type="submit" name="validar_compra">Validar compra</button>
        </form>
        <?php
        // Verificar si se ha enviado el formulario de validación
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['validar_compra'])) {
            echo "Compra confirmada. ¡Gracias!";
            }
        ?>
    </div>
    <br>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Descripción</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $id => $producto) { ?>
                <tr>
                    <td><?php echo $producto['nombre']; ?></td>
                    <td><img src="<?php echo $producto['imagen']; ?>" alt="Imagen del juego"></td>
                    <td><?php echo $producto['descripcion']; ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="comprar_id" value="<?php echo $id; ?>">
                            <input type="hidden" name="comprar_nombre" value="<?php echo $producto['nombre']; ?>">
                            <button type="submit">Comprar</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>