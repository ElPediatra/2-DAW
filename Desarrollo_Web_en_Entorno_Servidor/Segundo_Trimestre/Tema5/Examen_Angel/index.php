<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="dwes.css">
</head>
<body>
<?php
/* Incluyo el archivo fecha.php para dar formato a la fecha */
include 'fecha.php';

/* Creo las variables para el acceso y la conexión */
$servername = "localhost";
$username = "instituto";
$password = "instituto";
$dbname = "Instituto";

$conn = new mysqli($servername, $username, $password, $dbname);

/* Pido los valores de Curso y Letra */
$curso = isset($_GET['curso']) ? $_GET['curso'] : '';
$letra = isset($_GET['letra']) ? $_GET['letra'] : '';

/* Creo la consulta para mostrar los datos */
$sql = "SELECT * FROM Alumnos";
if ($curso != '' && $letra != '') {
  $sql .= " WHERE Curso = $curso AND Letra = '$letra'";
}
$sql .= " ORDER BY Apellidos";

$result = $conn->query($sql);

/* Creo la tabla y muestro los datos */
if ($result->num_rows > 0) {
  echo "<table>";
  echo "<tr><th>N. Expediente</th><th>Nombre</th><th>Apellidos</th><th>Fecha Nacimiento</th><th>Curso</th><th>Letra</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["N_expdte"]. "</td><td>" . $row["Nombre"]. "</td><td>" . $row["Apellidos"]. "</td><td>" . $row["Fecha_nac"]. "</td><td>" . $row["Curso"]. "</td><td>" . $row["Letra"]. "</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 resultados";
}

$conn->close();
?>

<!-- Creo el formulario para que pueda seleccionar los datos que quiera -->
<form method="get" action="">
  <select name="curso">
    <option value="">Curso:</option>
    <option value="1">Primero</option>
    <option value="2">Segundo</option>
  </select>
  <select name="letra">
    <option value="">Letra:</option>
    <option value="A">A</option>
    <option value="B">B</option>
  </select>
  <input type="submit" value="Filtrar">
</form>

</body>
</html>
