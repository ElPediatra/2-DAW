<?php
// usuario.php
// Incluye el archivo para configurar la cookie
include("configurar_modo.php");

session_start(); // Inicia la sesión o reanuda una existente

// Verifica si el usuario está autenticado
if (!isset($_SESSION["nombre_usuario"])) {
    // Redirige al usuario a la página de inicio de sesión si no está autenticado
    header("Location: index.php");
    exit;
}

// Accede a la información del usuario
$nombre_usuario = $_SESSION["nombre_usuario"];
$perfil = $_SESSION["perfil"];

// Verifica si el perfil es el requerido (en este caso "usuario")
if ($perfil !== "admin") {
    // Redirige al usuario a una página de acceso denegado
    header("Location: usuario.php");
    exit;
}

$servername = "localhost";
$username = "dwes";
$password = "abc123.";
$dbname = "Tienda_Juegos";

//Creo la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Compruebo si se ha enviado el formulario para cambiar el modo
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["modo"])) {
    $modo_actual = $_COOKIE["modo"] ?? "claro"; // Valor predeterminado: claro
    $modo = ($modo_actual == "oscuro") ? "claro" : "oscuro";
    setcookie("modo", $modo, time() + 3600, "/"); //Timer para que se mantenga la configuración de la cookie
}

// Comprueba si se ha enviado el formulario para añadir un usuario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombre_usuario"]) && isset($_POST["contrasena"]) && isset($_POST["perfil"])) {
    $nombre_usuario = $_POST["nombre_usuario"];
    $contrasena = $_POST["contrasena"]; // Deberías encriptar esta contraseña
    $perfil = $_POST["perfil"];

    // Verifica que $nombre_usuario tenga entre 4 y 8 letras
    if (preg_match("/^[a-zA-Z]{4,8}$/", $nombre_usuario)) {
        // Verifica que $contrasena tenga entre 4 y 25 letras, números 0 caracteres especiales
        if (preg_match("/^[\w\W]{4,25}$/", $contrasena)) {
            // Prepara la consulta SQL
            $stmt = $conn->prepare("INSERT INTO usuarios (nombre_usuario, contrasena, perfil) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nombre_usuario, $contrasena, $perfil);

            // Ejecuta la consulta
            if ($stmt->execute()) {
                echo "Usuario añadido con éxito.";
            } else {
                echo "Error: no se ha podido añadir el usuario."; //. $stmt->error;
            }
        } else {
            echo "La contraseña debe tener entre 4 y 25 letras, números o caracteres especiales.";
        }
    } else {
        echo "El nombre de usuario debe tener entre 4 y 8 letras.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Administrador</title>
    <style>
        body {
            background-color: <?php echo ($modo_actual == "oscuro") ? "#1a1a1a" : "#fff"; ?>;
            color: <?php echo ($modo_actual == "oscuro") ? "#fff" : "#000"; ?>;
        }
    </style>
</head>
<body>
    <h1> Página de Administrador </h1>

    <div>
        <h3> Modo Claro y Oscuro </h3>
        <!-- Formulario para el modo claro y oscuro -->
        <form method="post" action="admin.php">
            <input type="hidden" name="modo" value="<?php echo $modo; ?>"> <!-- Valor alternante entre "oscuro" y "claro" -->
            <button type="submit">Cambiar modo</button>
        </form>

        <h3> Cerrar la sesión </h3>
        <form action="cerrar_sesion.php" method="post">
            <input type="submit" value="Cerrar sesión">
        </form>
    </div>

    <div>
        <h2> Crear Usuarios </h2>
        <form method="post" action="admin.php">
            <label for="nombre_usuario">Nombre de usuario:</label><br>
            <input type="text" id="nombre_usuario" name="nombre_usuario"><br>
            <label for="contrasena">Contraseña:</label><br>
            <input type="password" id="contrasena" name="contrasena"><br>
            <label for="perfil">Perfil:</label><br>
            <select id="perfil" name="perfil">
                <option value="usuario">Usuario</option>
                <option value="admin">Admin</option>
            </select>
            <br>
            <input type="submit" value="Añadir usuario">
        </form>
    </div>
    
    <div>
        <?php
            // Consulta para obtener todos los usuarios
            $result = $conn->query("SELECT * FROM usuarios");

            // Muestra todos los usuarios
            echo "<h2>Usuarios existentes:</h2>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Nombre de usuario</th><th>Perfil</th><th>Acciones</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nombre_usuario"] . "</td>";
                echo "<td>" . $row["perfil"] . "</td>";
                echo "<td><a href='admin.php?eliminar=" . $row["id"] . "'>Eliminar</a></td>";
                echo "</tr>";
            }
            echo "</table>";

            // Comprueba si se ha enviado el parámetro para eliminar un usuario
            if (isset($_GET["eliminar"])) {
                $id = $_GET["eliminar"];

                // Prepara la consulta SQL
                $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
                $stmt->bind_param("i", $id);

                // Ejecuta la consulta
                if ($stmt->execute()) {
                    echo "Usuario eliminado con éxito.";
                } else {
                    echo "Error: no se ha podido eliminar el usuario."; //. $stmt->error;
                }    
            }
        ?>
    </div>

    <div>
        <?php
            // Consulta para obtener todos los juegos
            $result = $conn->query("SELECT * FROM juegos");

            // Muestra todos los juegos
            echo "<h2>Juegos existentes:</h2>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Acciones</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td><a href='admin.php?eliminar_juego=" . $row["id"] . "'>Eliminar</a></td>";
                echo "</tr>";
            }
            echo "</table>";

            // Comprueba si se ha enviado el parámetro para eliminar un juego
            if (isset($_GET["eliminar_juego"])) {
                $id = $_GET["eliminar_juego"];

                // Prepara la consulta SQL
                $stmt = $conn->prepare("DELETE FROM juegos WHERE id = ?");
                $stmt->bind_param("i", $id);

                // Ejecuta la consulta
                if ($stmt->execute()) {
                    echo "Juego eliminado con éxito.";
                } else {
                echo "Error: " . $stmt->error;
                }
            }
        ?>
    </div>

    <div>
    <?php
        // Comprueba si se ha enviado el formulario para añadir un juego
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_FILES["imagen"])) {
                $nombre = $_POST["nombre"];
                $descripcion = $_POST["descripcion"];
                $imagen = $_FILES["imagen"];

                // Comprueba si el archivo subido es una imagen
                $tipo_imagen = exif_imagetype($imagen["tmp_name"]);
                if (in_array($tipo_imagen, [IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP])) {
                    // Comprueba si el archivo de imagen ya existe y, si es así, añade la fecha y hora actuales al nombre del archivo
                    $ruta_imagen = "./img/" . $imagen["name"];
                        if (file_exists($ruta_imagen)) {
                            $ruta_imagen = "./img/" . date("YmdHis") . "_" . $imagen["name"];
                        }

                        // Mueve el archivo de imagen subido al directorio ./img/
                        if (move_uploaded_file($imagen["tmp_name"], $ruta_imagen)) {
                            // Prepara la consulta SQL
                            $stmt = $conn->prepare("INSERT INTO juegos (nombre, imagen, descripcion) VALUES (?, ?, ?)");
                            $stmt->bind_param("sss", $nombre, $ruta_imagen, $descripcion);
                            
                            // Ejecuta la consulta
                            if ($stmt->execute()) {
                                echo "Juego añadido con éxito.";
                            } else {
                            echo "Error: " . $stmt->error;
                            }
                        } else {
                            echo "Error al subir la imagen.";
                        }
                } else {
                    echo "El archivo subido no es una imagen válida.";
                }
            } else {
                echo "Por favor, proporciona un nombre, una descripción y una imagen.";
            }
        }
    // Muestra el formulario para añadir un juego
    ?>

    <h2>Añadir un juego</h2>
    <form method="post" action="admin.php" enctype="multipart/form-data">
        <label for="nombre">Nombre del juego:</label><br>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" required></textarea><br>
        <label for="imagen">Imagen:</label><br>
        <input type="file" id="imagen" name="imagen" required><br>
        <input type="submit" value="Añadir juego">
    </form>
    </div>
</body>
</html>