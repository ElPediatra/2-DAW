<?php
/* Alberto Gómez Morales - 2º DAW - Desarrollo Web en Entorno Servidor

    Apartado 2: Una vez rellenado los datos en el formulario el usuario pulsa el botón para enviar los datos al servidor y debemos
    procesar esta información poniendo especial atención a los siguientes puntos:
        - Comprobar que no ha dejado en blanco ninguno de los siguientes campos: nombre, apellido, dni y foto.
        - Comprobar que el fichero se ha subido por el método POST.
        - Comprobar que el fichero que ha subido es una foto (no hace falta comprobar todas las extensiones existentes, con comprobar que es un fichero jpeg es suficiente).
        - Si falla alguna de las comprobaciones anteriores se debe volver a mostrar el formulario indicando donde se ha cometido el error (no es necesario que los controles
        se rellenen con los datos correctos introducidos por el usuario).
        - Copiar el fichero al directorio img y comprobar si se produce error (puedes ponerle el nombre que quieras al fichero. Si ya existe otro fichero con el mismo nombre
        el nuevo fichero sobrescribirá al antiguo).
        - Si no ha ocurrido ningún error, mostrar todos los datos y la foto en la página.
*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Compruebo que los campos no se han dejado el blanco
    if (empty($_POST["nombre"]) || empty($_POST["apellidos"]) || empty($_POST["dni"]) || empty($_FILES["foto"])) {
        echo "Por favor, rellene todos los campos requeridos.";
    } else {
        //Compruebo que la imagen se ha subido por el método POST.
        //Compruebo que tiene formato (jpeg).
        if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $_FILES['foto']['tmp_name']);
            if ($mime == 'image/jpeg' || $mime == 'image/jpg') {
                //Lo copio a la carpeta /img.
                $destino = 'img/' . $_FILES['foto']['name'];
                if (move_uploaded_file($_FILES['foto']['tmp_name'], $destino)) {
                    echo "Archivo subido correctamente.";
                    echo '<br>';
                    //Muestro los datos de vuelta y la foto
                    echo "Nombre: " . $_POST["nombre"];
                    echo '<br>';
                    echo "Apellidos: " . $_POST["apellidos"];
                    echo '<br>';
                    echo "DNI: " . $_POST["dni"];
                    echo '<br>';
                    echo "País: " . $_POST["pais"];
                    echo '<br>';
                    if (isset($_POST["meritos"])) {
                        echo "Méritos: " . implode(", ", $_POST["meritos"]);
                    } else {
                        echo "Méritos: Ninguno";
                    }
                    echo '<br>';
                    echo "Comentario: " . $_POST["comentario"];
                    echo '<br>';
                    echo '<img src="'.$destino.'">';
                } else {
                    echo "No he podido mover el archivo.";
                }
            } else {
                echo "La imagen subida no es una imagen JPEG.";
            }
            finfo_close($finfo);
        } else {
            echo "El archivo no se ha subido bien, revísalo.";
        }
    }
} else {
    //Mando el formulario de vuelta
    echo '<h2>Alberto Gómez Morales - Examen PHP Temas 3 y 4 - Formularios y Ficheros</h2>
    <form action="examen.php" method="post" enctype="multipart/form-data">
        <!-- Sección de nombre y apellidos -->
        <label for="nombre"><strong>Nombre:</strong></label>
        <input type="text" id="nombre" name="nombre" required><br>    
        <label for="apellidos"><strong>Apellidos:</strong></label>
        <input type="text" id="apellidos" name="apellidos" required><br><br>

        <!-- Sección de DNI -->
        <label for="dni"><strong>DNI:</strong></label>
        <input type="text" id="dni" name="dni" required><br><br>

        <!-- Sección Sexo (H/M)-->
        <label for="sexo"><strong>Sexo:</strong></label>
        <select id="sexo" name="sexo" required>
            <option value="hombre">Hombre</option>
            <option value="mujer">Mujer</option>
        </select><br><br>

        <!-- Méritos -->
        <label><strong>Méritos:</strong></label><br>
        <input type="checkbox" id="carnet" name="meritos[]" value="Carnet de conducir B">
        <label for="carnet">Carnet de conducir B</label><br>
        <input type="checkbox" id="pensionista" name="meritos[]" value="Pensionista">
        <label for="pensionista">Pensionista</label><br>
        <input type="checkbox" id="experiencia" name="meritos[]" value="20 años (o más) de experiencia">
        <label for="experiencia">20 años (o más) de experiencia</label><br>
        <input type="checkbox" id="discapacidad" name="meritos[]" value="Discapacidad superior al 33%">
        <label for="discapacidad">Discapacidad superior al 33%</label><br><br>

        <!-- País de residencia -->
        <label for="pais"><strong>País de residencia:</strong></label>
        <select id="pais" name="pais" required>
            <option value="España">España</option>
            <option value="Portugal">Portugal</option>
            <option value="Francia">Francia</option>
        </select><br><br>

        <!-- Comentario -->
        <label for="comentario"><strong>Comentario:</strong></label><br>
        <textarea id="comentario" name="comentario" rows="4" cols="50"></textarea><br><br>
    
        <!-- Foto Carnet -->
        <label for="foto"><strong>Foto carnet:</strong></label>
        <input type="file" id="foto" name="foto" accept="image/*" required><br><br>

        <input type="submit" value="Enviar">
    </form>';
}
?>