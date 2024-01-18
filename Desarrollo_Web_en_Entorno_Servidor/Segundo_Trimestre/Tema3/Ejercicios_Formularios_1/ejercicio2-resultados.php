<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
     <meta http-equiv="content-type" content="text/html; charset=UTF-8">
     <title>Resultados del Formulario</title>
</head>
<body>
<?php
     if (!empty($_POST['cadena']) && !empty($_POST['sexo']) && !empty($_POST['extras'])) {
          echo "Cadena a buscar: " . $_POST['cadena'] . "<br>";
          echo "Sexo: " . $_POST['sexo'] . "<br>";
          echo "Extras: " . implode(", ", $_POST['extras']) . "<br>";
     }
     if (!empty($_POST['color'])) {
          echo "Color: " . $_POST['color'] . "<br>";
     }
     if (!empty($_POST['idiomas'])) {
          echo "Idiomas: " . implode(", ", $_POST['idiomas']) . "<br>";
     }
     if (!empty($_POST['comentario'])) {
          echo "Comentario: " . $_POST['comentario'] . "<br>";
     }
?>
     <form action="ejercicio2.php" method="post">
          <input type="submit" value="Volver al formulario">
     </form>
</body>
</html>
