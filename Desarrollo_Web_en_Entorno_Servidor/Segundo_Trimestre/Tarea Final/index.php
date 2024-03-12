<?php
//index.php
//Incluyo el archivo para configurar la cookie
include("configurar_modo.php");

session_start(); //Inicio la sesión o reanudo una existente en caso de no haberla cerrado

//Creo las variables para el acceso
$servername = "localhost";
$username = "dwes";
$password = "abc123.";
$dbname = "Tienda_Juegos";

//Creo la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

//Verifico que se envió el formulario de acceso
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombre_usuario"])) {
    //Capturo los datos de acceso
    $nombre_usuario = $_POST["nombre_usuario"];
    $contrasena = $_POST["contrasena"];

    //Aseguro la cadena de texto antes de mandarla (lo vi por ahí y lo puse)
    $nombre_usuario = $conn->real_escape_string($nombre_usuario);
    $contrasena = $conn->real_escape_string($contrasena);

    //Realizo la consulta a la base de datos
    $consulta = "SELECT perfil FROM usuarios WHERE nombre_usuario = '$nombre_usuario' AND contrasena = '$contrasena'";
    $resultado = $conn->query($consulta);

    //Compruebo que el usuario exista en la base de datos
    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $perfil = $fila["perfil"];

        //Establezco una variable de sesión para el usuario
        $_SESSION["nombre_usuario"] = $nombre_usuario;
        $_SESSION["perfil"] = $perfil;

        //Redirijo al usuario según su perfil
        if ($perfil == "usuario") {
            header("Location: usuario.php");
            exit;
        } elseif ($perfil == "admin") {
            header("Location: admin.php");
            exit;
        }
    } else {
        //Mando mensaje en lugar de usuario o contraseña incorrecta
        $mensaje_error = "Usuario o contraseña incorrectos. Inténtalo de nuevo.";
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
    <title>Iniciar sesión</title>
    <style>
    body {
        background-color: <?php echo ($modo_actual == "oscuro") ? "#1a1a1a" : "#fff"; ?>;
        color: <?php echo ($modo_actual == "oscuro") ? "#fff" : "#000"; ?>;
    }
    </style>
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

    <form method="post" action="index.php">
        <input type="hidden" name="modo" value="<?php echo $modo; ?>"> <!-- Alterna el valor entre "oscuro" y "claro" -->
        <button type="submit">Cambiar modo</button>
    </form>
</body>
</html>