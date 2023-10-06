<!DOCTYPE html>
<html>
<head>
	<title>Repetir caracteres de una frase</title>
</head>
<body>
	<h1>Repetir caracteres de una frase</h1>
	<form method="post" action="">
		<label for="frase">Introduce una frase:</label><br>
		<input type="text" id="frase" name="frase"><br><br>
		<input type="submit" value="Mostrar">
	</form>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$frase = $_POST["frase"];
		$frase_repetida = "";
		for ($i = 0; $i < strlen($frase); $i++) {
			$frase_repetida .= $frase[$i] . $frase[$i];
		}
		echo "<p>La frase repetida con todos sus caracteres es: $frase_repetida</p>";
	}
	?>
</body>
</html>
