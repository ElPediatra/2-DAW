<?php

include_once("sesiones.php");

?>

<SCRIPT LANGUAGE="javascript">
        function confirmar ( mensaje ) {
                 return confirm( mensaje );
        }
</SCRIPT>

<?php
include_once("class.ConexionBD.php");

include_once("sesiones.php");
//Se controla si se ha iniciado sesion ( el usuario se ha validado)
$VALIDADO=validar_sesion($login,$tipo_usuario);

if (($VALIDADO==1) && ($tipo_usuario==0)) //Si el usuario se ha validado y es administrador
{

  if (isset($_POST['eliminar']))
	$eliminar = $_POST['eliminar'];


  if (isset($eliminar))  // Se borran las peliculas selccionadas en el formulario
  {

      //Conexion a la base de datos
      $conexion=new ConexionBD;
      $link=$conexion->conectar_bd();

      // Contar el numero de peliculas a borrar
	$nfilas=0;  
	if (isset($_POST['borrar']))
	{
      $borrar = $_POST['borrar'];
      $nfilas = count ($borrar);
	}


      echo "<table width=\"600\" border=\"0\" align=\"center\" cellspacing=\"0\">";
      echo "<tr >";
               echo "<td colspan='3' height=\"40\"></td>";
      echo "</tr>";
      echo "<tr >";
           echo "<td colspan=\"2\"class=\"mostrarTitulo\" >PELICULAS ELIMINADAS</td>";
      echo "</tr>";
      echo "<tr >";
               echo "<td class=\"mostrarTitulo\" colspan='3' height=\"10\"></td>";
        echo "</tr>";
      echo "<tr >";
           echo "<td class=\"mostrarCabecera\"  > NOMBRE</td>";
           echo "<td class=\"mostrarCabecera\" align=\"center\"> GÉNERO</td>";
      echo "</tr>";
      echo "<tr >";
               echo "<td colspan='3' height=\"10\"></td>";
        echo "</tr>"; 

      // Mostrar las películas a borrar
      for ($i=0; $i<$nfilas; $i++)
      {

          // Obtener datos de la noticia i-ésima
           $sql_query = "select * from peliculas where codigo_pelicula =". $borrar[$i];
           $result_query = mysqli_query ($link,$sql_query)
              or die ("Fallo en la consulta");
           $reg_query = mysqli_fetch_array ($result_query);

           if ( ($reg_query["imagen"]!=NULL) && (strcmp(trim($reg_query["imagen"]),"")!=0) )
           {
               unlink("img/".$reg_query["imagen"]);
           }

           //Se eliminan las puntuaciones de la película
           $sql_delete = "delete from puntuaciones where codigo_pelicula=".$borrar[$i];
           $result_delete = mysqli_query ($link, $sql_delete)
              or die ("Fallo en la eliminación de las puntuaciones de la película:.".$reg_query['nombre']);

           // Eliminar película
           $sql_delete = "delete from peliculas where codigo_pelicula=".$borrar[$i];
           $result_delete = mysqli_query ($link, $sql_delete)
              or die ("Fallo en la eliminación de la película:.".$reg_query['nombre']);


           // Mostrar datos de la película eliminada
           echo "<tr border=\"1\">";
                     echo "<td class=\"mostrar\">".$reg_query["nombre"]." </td>";
                     echo "<td class=\"mostrar\"  align=\"center\">".$reg_query["genero"]." </td>";
           echo "</tr>";


        }
        echo "<tr >";
               echo "<td colspan='3' height=\"20\"></td>";
        echo "</tr>";
        echo "<tr border=\"1\">";
             echo "<td colspan='5'class=\"mostrar\" > Se ha\n eliminado " . $nfilas . " pelicula\s </td>";
        echo "</tr>";
        echo "</table>";
        // Cerrar conexión
        $conexion->cerrar_conexion();



  }
  else  //Se muestra el formulario
  {
        // *** Iniciacion de variables para el script de paginacion ***

        //Cantidad de resultados por página
        $_pagi_cuantos = PAGINACION;
                                          
        //cantidad de enlaces que se mostrarán como máximo en la barra de navegación
        $_pagi_nav_num_enlaces = 5;

        // *** Construcción de la consulta de busqueda ***

        //Conexión a la base de datos
        $conexion=new ConexionBD;
        $link=$conexion->conectar_bd();

        $sql="select * from peliculas order by nombre";

        //Incluido el script de paginación
        $_pagi_sql=$sql;
        $_pagi_conteo_alternativo=true;
        $_pagi_propagar = array("nombre","director","publico","estreno","genero","pagina","borrar");
        include("paginator.inc.php");



        echo "<FORM ACTION=\"index.php\" METHOD=\"post\">";
        echo "<input type=\"hidden\" name=\"pagina\" value=\"eliminarPeliculas.php\" >";
        echo "<table width=\"700\" border=\"0\" align=\"center\" cellspacing=\"0\">";
        echo "<tr >";
               echo "<td colspan='3' height=\"40\"></td>";
        echo "</tr>";    
        echo "<tr >";
               echo "<td colspan='3' class=\"mostrarTitulo\" >ELIMINAR PELÍCULAS<td>";
        echo "</tr>";
        echo "<tr >";
               echo "<td class=\"mostrarTitulo\" colspan='3' height=\"10\"></td>";
        echo "</tr>";
        echo "<tr >";
           echo "<td class=\"mostrarCabecera\" > NOMBRE</td>";
           echo "<td class=\"mostrarCabecera\" align=\"center\" > GÉNERO</td>";
           echo "<td class=\"mostrarCabecera\" align=\"center\" > ELIMINAR</td>";
        echo "</tr>";
        echo "<tr >";
               echo "<td colspan='5' height=\"10\"></td>";
        echo "</tr>"; 

        if (mysqli_num_rows($_pagi_result)==0)
        {
            echo "<tr border=\"1\">";
               echo "<td class=\"mostrar\" colspan=\"3\">NO EXISTEN PELÍCULAS </td>";
            echo "</tr>";
        }
        else
        {
            while ( $reg = mysqli_fetch_array ($_pagi_result))
            {
                echo "<tr border=\"1\">";
                     echo "<td class=\"mostrar\">".$reg["nombre"]." </td>";
                     echo "<td class=\"mostrar\" align=\"center\">".$reg["genero"]." </td>";
                     echo "<td class=\"mostrar\" align=\"center\"><input type='checkbox' name='borrar[]' value='".$reg["codigo_pelicula"]."'></td>";
                echo "</tr>";
            }
            echo "<tr >";
                 echo "<td colspan='3' height=\"30\"></td>";
            echo "</tr>";
            echo "<tr border=\"1\">";
                 echo "<td colspan='3' class=\"mostrar\" align=\"center\"><input type='submit' name='eliminar' value='Eliminar peliculas seleccionadas' onClick=\"return confirmar('¿Desea borrar las peliculas seleccionadas y sus puntuaciones ?')\"></td>";
            echo "</tr>";
        }
        echo "<tr border=\"1\">";
               echo "<td colspan='5' height=\"20\"></td>";
        echo "</tr>";
        echo "</table>";


        echo "<table width=\"700\" border=\"0\" align=\"center\" cellspacing=\"0\">";
             echo "<tr >";
                  echo "<td class=\"mostrarPaginacion\" >". $_pagi_navegacion."</td>";
             echo "</tr>";
             echo "<tr >";
                  echo "<td class=\"mostrarPaginacion\" >Resultados: ". $_pagi_info."</td>";
             echo "</tr>";
        echo "</table>";
        echo "</form>";
        $conexion->cerrar_conexion();

  }


}
else
{
?>
 <table width="600" border="0" height="0" align="center" >
    <tr border="0">
     <td height="170" > </td>
   </tr>
   <tr border="0">
    <td > <span class="prohibido">ES NECESARIO REGISTRARSE PARA PODER ACCEDER AL SISTEMA</span></td>
   </tr>
 </table>

 <?php
 }
 ?>

