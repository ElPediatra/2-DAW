<?php
// index.php

// Creo las variables para el acceso
$servername = "localhost";
$username = "dwes";
$password = "abc123.";
$dbname = "Tienda_Juegos";

// Creo la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Compruebo que no haya errores en la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verifico que se envió el formulario de acceso
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturo los datos de acceso
    $nombre_usuario = $_POST["nombre_usuario"];
    $contrasena = $_POST["contrasena"];

    // Escapa los valores para evitar inyección SQL (importante para la seguridad)
    $nombre_usuario = $conn->real_escape_string($nombre_usuario);
    $contrasena = $conn->real_escape_string($contrasena);

    // Realizo la consulta a la base de datos
    $consulta = "SELECT perfil FROM usuarios WHERE nombre_usuario = '$nombre_usuario' AND contrasena = '$contrasena'";
    $resultado = $conn->query($consulta);

    // Compruebo que el usuario exista en la base de datos
    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $perfil = $fila["perfil"];

        // Redirijo al usuario dependiendo de su perfil
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

//Comprobación del formulario para cambiar el modo de claro a oscuro y viceversa
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["modo"])) {
    $modo_actual = $_COOKIE["modo"] ?? "claro"; //Valor predeterminado: claro
    $modo = ($modo_actual == "oscuro") ? "claro" : "oscuro";
    setcookie("modo", $modo, time() + 3600, "/"); //Pongo que la cookie expire en 1 hora
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

    <!-- Formulario para el modo claro y oscuro -->
    <form method="post" action="index.php">
        <input type="hidden" name="modo" value="<?php echo $modo; ?>"> <!-- Cambio el valor entre "oscuro" y "claro" -->
        <button type="submit">Cambiar Estilo de la Web (Claro y Oscuro)</button>
    </form>

    <!-- Estilo dinámico según la cookie "modo" -->
    <style>
        body {
            background-color: <?php echo ($modo_actual == "oscuro") ? "#1a1a1a" : "#fff"; ?>;
            color: <?php echo ($modo_actual == "oscuro") ? "#fff" : "#000"; ?>;
        }
    </style>
</body>
</html>
