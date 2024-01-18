<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
     <meta http-equiv="content-type" content="text/html; charset=UTF-8">
     <title>Resultados de la búsqueda</title>
</head>
<body>
<?php
     if (!empty($_POST['texto_buscar']) && !empty($_POST['buscar_en']) && !empty($_POST['genero_musical'])) {
          echo "Texto a buscar: " . $_POST['texto_buscar'] . "<br>";
          echo "Buscar en: " . $_POST['buscar_en'] . "<br>";
          echo "Género musical: " . $_POST['genero_musical'] . "<br>";
     }
?>
     <form action="ejercicio1.php" method="post">
          <input type="submit" value="Volver a la página de búsqueda">
     </form>
</body>
</html>
