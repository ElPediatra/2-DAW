




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <header>
    <h1>Rima entre palabras</h1>

    </header>
    <main>
    <form method="post">
        <label for="palabra1">Inserta la primera palabra</label>
        <br>
        <input type="text" id="palabra1" name="palabra1">
        <br>
        <br>
        <br>
        <label for="palabra2">Inserta la segunda palabra</label>
        <br>
        
        <input type="text" id="palabra2" name="palabra2">
        <br>
        <br>
        <br>
        <input type="submit" value="Comprobar">
        <br>
        <br>
    </form>
</main>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $palabra1 = strtolower($_POST['palabra1']);
    $palabra2 = strtolower($_POST['palabra2']);

    $final_letra1 = substr($palabra1, -3);
    $final_letra2 = substr($palabra2, -3);

    if ($final_letra1 == $final_letra2) {
      
        print "Las palabras riman";
        
    } else if (substr($final_letra1, -2) == substr($final_letra2, -2)) {
       
        print "Las palabras riman, pero solo un poco";
       
    } else {
       
        print "Las palabras no riman";
        
    }
}
?>


</body>
</html>