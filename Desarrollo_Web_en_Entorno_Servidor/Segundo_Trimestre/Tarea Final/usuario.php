<?php
//usuario.php
//Incluyo el archivo para configurar la cookie
include("configurar_modo.php");

session_start(); //Inicio la sesión o reanudo una existente en caso de no haberla cerrado

//Verifico si el usuario está logueado
if (!isset($_SESSION["nombre_usuario"])) {
    //Redirige al usuario a la página de inicio de sesión si no está loguead
    header("Location: index.php");
    exit;
}

//Accedo a la información del usuario
$nombre_usuario = $_SESSION["nombre_usuario"];
$perfil = $_SESSION["perfil"];

//Verifico si el perfil es el requerido (en este caso "usuario")
if ($perfil !== "usuario") {
    //Redirijo al usuario a su página, (si no es perfil "usuario" es pergil "admin")
    header("Location: index.php");
    exit;
}

//Creo las variables para el acceso
$servername = "localhost";
$username = "dwes";
$password = "abc123.";
$dbname = "Tienda_Juegos";

//Creo la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

//Creo un array vacío para almacenar los productos
$productos = [];
//Creo una consulta SQL para capturar los datos de la tabla juegos y la ejecuto
$sql = "SELECT nombre, imagen, descripcion FROM juegos";
$result = $conn->query($sql);
if ($result->num_rows > 0) { //Compruebo que al menos me de un resultado, capturo los elementos y los añado al array
    while ($row = $result->fetch_assoc()) {
        $productos[] = [
            'nombre' => $row['nombre'],
            'imagen' => $row['imagen'],
            'descripcion' => $row['descripcion'],
        ];
    }
}

//Solicitud post para incluir los juegos seleccionados en el listado al "carrito"
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['comprar_id']) && isset($_POST['comprar_nombre'])) {
        $compra_id = $_POST['comprar_id'];
        $compra_nombre = $_POST['comprar_nombre'];

        //Agregar el juego a la lista de compras en la sesión
        $_SESSION['compras'][] = $compra_nombre;
    }
}

//Compruebo que se ha mandado el formulario para cambiar de modo claro a modo oscuro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["modo"])) {
    $modo_actual = $_COOKIE["modo"] ?? "claro"; // Valor predeterminado: claro
    $modo = ($modo_actual == "oscuro") ? "claro" : "oscuro";
    setcookie("modo", $modo, time() + 3600, "/"); //Timer para que se mantenga la configuración de la cookie (No funciona)
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Juegos</title>
    <!-- Estilo propio de las imágenes de esta página -->
    <style>
    img {
	    width: 200px; /* Ancho de 100 p\u00edxeles */
    	height: 100px; /* Alto de 100 p\u00edxeles */
	}

    body {
        background-color: <?php echo ($modo_actual == "oscuro") ? "#1a1a1a" : "#fff"; ?>;
        color: <?php echo ($modo_actual == "oscuro") ? "#fff" : "#000"; ?>;
    }
    </style>
</head>
<body>
    <h1>Tienda de Juegos</h1>

    <!-- Formulario para el modo claro y oscuro -->
    <form method="post" action="usuario.php">
        <input type="hidden" name="modo" value="<?php echo $modo; ?>"> <!-- Valor alternante entre "oscuro" y "claro" -->
        <button type="submit">Cambiar modo</button>
    </form>
    <br>
    <div>
        <h2>Lista de compras:</h2>
        <ul>
            <!-- For each para recorrer el array de compras y mostar los elementos en una lista -->
            <?php foreach ($_SESSION['compras'] as $compra) { ?>
                <li><?php echo $compra; ?></li>
            <?php } ?>
        </ul>
        <form method="post">
            <button type="submit" name="validar_compra">Validar compra</button>
        </form>
        <?php
        //Verificar si se ha enviado el formulario de validación
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['validar_compra'])) {
            echo "Compra confirmada. ¡Gracias!";
                // Vaciar la lista de compras
                $_SESSION['compras'] = array();
            }
        ?>
    </div>
    <br>
    <form action="cerrar_sesion.php" method="post">
        <input type="submit" value="Cerrar sesión">
    </form>
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
            <!-- Foreach para mostrar los productos de la tabla juegos -->
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