<?php 

// Path de las clases y de las paginas estandar
define("CLASS_PATH", dirname($_SERVER['PHP_SELF'])."/");
define("APPLICATION_PATH", dirname($_SERVER['PHP_SELF'])."/");

//Configuración de la conexion a la base de datos
define("BD_SERVIDOR", "localhost:3306");
define("BD_NOMBRE", "peliculas");
define ("BD_USUARIO", "peliculas");
define ("BD_PASSWORD", "peliculas");

//Configuración de logitudes minimas del login y el password de los usuario
//normales
define ("LONGITUD_MINIMA_LOGIN", 6);
define ("LONGITUD_MINIMA_PASSWORD", 6);

//Configuración del numero de resultados de paginación por cada pagina
define ("PAGINACION", 10);

?>
