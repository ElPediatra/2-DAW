<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen PHP Temas 3 y 4 - Formularios y Ficheros</title>

    <!-- Alberto Gómez Morales - 2º DAW - Desarrollo Web en Entorno Servidor

    Apartado 1: Vamos a crear un formulario que recoja los siguientes datos:
        - Nombre, apelidos y dni.
        - Sexo (a elegir entre hombre y mujer, siempre se debe escoger uno y solamente uno)
        - Méritos, donde se puede escoger ninguna, uno o varias opciones de las siguientes:
            + Carnet de conducir B
            + Pensionista
            + 20 años (o más) de experiencia
            + Discapacidad superior al 33%.
        - País de residencia (desplegable donde se debe escoger entre España, Portugal o Francia)
        - Comentario (debe permitir escribir textos largos)
        - Foto carnet (debe permitir subir un fichero)

    Apartado 3: Añadir un contador de visitas a la página usando para ello un fichero. El contador
    será visible y se actualizará únicamente en la página en la que se muestra el formulario.
    -->
</head>
    <body>
        <h2>Alberto Gómez Morales - Examen PHP Temas 3 y 4 - Formularios y Ficheros</h2>
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
        </form>    

        <?php
        $archivoVisitas = 'contador.txt';

        //Si el fichero txt no existe, lo creo
        if (!file_exists($archivoVisitas)) {
            file_put_contents($archivoVisitas, '1');
        } else {
            //Si ya está creado, aumento el valor y lo muestro
            $visitas = (int)file_get_contents($archivoVisitas);
            file_put_contents($archivoVisitas, ++$visitas);
        }

        //Lo muestro en la página
        echo 'Número de visitas: ' . file_get_contents($archivoVisitas);
        ?>
    </body>
</html>