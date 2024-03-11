<?php
// index.php

//Confirmo cuando se envía el formulario de acceso
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Capturo el usuario y la contraseña que ha puesto el usuario
    $nombre_usuario = $_POST["nombre_usuario"];
    $contrasena = $_POST["contrasena"];

    // Realiza la consulta en la base de datos (debes implementar la conexión a la base de datos)
    // Aquí asumimos que ya tienes una conexión establecida y una tabla llamada "usuarios"
    $consulta = "SELECT perfil FROM usuarios WHERE nombre_usuario = '$nombre_usuario' AND contrasena = '$contrasena'";
    // Ejecuta la consulta y obtén el resultado

    // Verifica si se encontró un usuario con las credenciales correctas
    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        $perfil = $fila["perfil"];

        // Redirige según el perfil
        if ($perfil == "usuario") {
            header("Location: usuario.php");
            exit;
        } elseif ($perfil == "admin") {
            header("Location: admin.php");
            exit;
        }
    } else {
        $mensaje_error = "Credenciales incorrectas. Inténtalo de nuevo.";
    }
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
    <?php if (isset($mensaje_error)) { ?>
        <p style="color: red;"><?php echo $mensaje_error; ?></p>
    <?php } ?>
</body>
</html>
