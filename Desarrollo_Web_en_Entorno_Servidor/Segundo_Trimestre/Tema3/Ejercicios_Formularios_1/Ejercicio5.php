<?php
$texto_buscar = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["texto_buscar"])) {
    $error = "¡Debe introducir el texto de búsqueda!";
  } else {
    $texto_buscar = test_input($_POST["texto_buscar"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio5</title>

    <style>
        .caja {
            border: 1px solid blue;
            padding: 20px;
            width: 50%;
            text-align: left;
        }

        .campo {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .campo p {
            margin-right: 10px;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <h1 style="color: blue;">Validación de formularios</h1>

    <h3>Búsqueda de canciones</h3>

    <div class="caja">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <div class="campo">
                <label for="texto_buscar">Texto a buscar: *</label>
                <input type="text" id="texto_buscar" name="texto_buscar">
                <p id="error_texto_buscar" class="error" style="display: <?php echo empty($error) ? 'none' : 'block'; ?>;"><?php echo $error; ?></p>
            </div>
            
            <div class="campo">
                <p>Buscar en:</p>
                <input type="radio" id="titulos_cancion" name="buscar_en" value="titulos_cancion">
                <label for="titulos_cancion">Títulos de canción</label>
                <input type="radio" id="nombres_album" name="buscar_en" value="nombres_album">
                <label for="nombres_album">Nombres de álbum</label>
                <input type="radio" id="ambos_campos" name="buscar_en" value="ambos_campos">
                <label for="ambos_campos">Ambos campos</label>
            </div>
            
            <div class="campo">
                <label for="genero_musical">Género musical:</label>
                <select id="genero_musical" name="genero_musical">
                  <option value="todos">Todos</option>
                  <option value="acustica">Acústica</option>
                  <option value="banda_sonora">Banda sonora</option>
                  <option value="blues">Blues</option>
                  <option value="electronica">Electrónica</option>
                  <option value="folk">Folk</option>
                  <option value="jazz">Jazz</option>
                  <option value="new_age">New Age</option>
                  <option value="pop">Pop</option>
                  <option value="rock">Rock</option>
                </select>
            </div>
            
            <input type="submit" value="Buscar">
        </form>
    </div>

</body>

</html>
