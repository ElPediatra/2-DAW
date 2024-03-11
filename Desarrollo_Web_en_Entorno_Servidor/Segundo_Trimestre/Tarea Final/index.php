<?php
// index.php

//Creo las variables para el acceso
$servername = "localhost";
$username = "dwes";
$password = "abc123.";
$dbname = "Tienda_Juegos";

//Creo la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

//Compruebo que no haya errores en la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verifico que se envió el formulario de acceso
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Capturo los datos de acceso
    $nombre_usuario = $_POST["nombre_usuario"];
    $contrasena = $_POST["contrasena"];

    //Escapa los valores para evitar inyección SQL (importante para la seguridad)
    $nombre_usuario = $conn->real_escape_string($nombre_usuario);
    $contrasena = $conn->real_escape_string($contrasena);

    //Realizo la consulta a la base de datos
    $consulta = "SELECT perfil FROM usuarios WHERE nombre_usuario = '$nombre_usuario' AND contrasena = '$contrasena'";
    $resultado = $conn->query($consulta);

    //Compruebo que el usuario exista en la base de datos
    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $perfil = $fila["perfil"];

        //Redirijo al usuario dependiendo de su perfil
        if ($perfil == "usuario") {
            header("Location: usuario.php");
            exit;
        } elseif ($perfil == "admin") {
            header("Location: admin.php");
            exit;
        }
    } else {
        $mensaje_error = "Usuario o contraseña incorrectos. Inténtalo de nuevo.";
    }

    // Cierra la conexión
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>
    <h1>Iniciar sesión</h1>
    <form method="post" action="index.php">
        <input type="text" name="nombre_usuario" placeholder="Nombre de usuario" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
        <button type="submit">Iniciar sesión</button>
    </form>
    <!-- Aquí pondré el mensaje de error en caso de usuario o contraseña incorrecta -->
    <?php if (isset($mensaje_error)) { ?>
        <p style="color: red;"><?php echo $mensaje_error; ?></p>
    <?php } ?>
</body>
</html>