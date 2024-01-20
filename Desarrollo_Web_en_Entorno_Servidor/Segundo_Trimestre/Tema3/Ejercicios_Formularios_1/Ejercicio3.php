<?php
$texto_buscar = $buscar_en = $genero_musical = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $texto_buscar = isset($_POST["texto_buscar"]) ? test_input($_POST["texto_buscar"]) : "";
  $buscar_en = isset($_POST["buscar_en"]) ? test_input($_POST["buscar_en"]) : "";
  $genero_musical = isset($_POST["genero_musical"]) ? test_input($_POST["genero_musical"]) : "";
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
    <title>Ejercicio 3</title>
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
    </style>
</head>
<body>
    <h1 style="color: blue;">Formulario simple</h1>
    <br><br>

    <h2>Búsqueda de canciones</h2>

    <div class="caja">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
            <div class="campo">
                <label for="texto_buscar">Texto a buscar:</label>
                <input type="text" id="texto_buscar" name="texto_buscar">
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

    <?php
    echo "<h2>Tus datos:</h2>";
    echo "Texto a buscar: " . $texto_buscar;
    echo "<br>";
    echo "Buscar en: " . $buscar_en;
    echo "<br>";
    echo "Género musical: " . $genero_musical;
    ?>

</body>
</html>
