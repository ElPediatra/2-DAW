<?php

include_once("sesiones.php");


include_once("class.ConexionBD.php");


//Se controla si se ha iniciado sesión ( el usuario se ha validado)
$VALIDADO=validar_sesion($login,$tipo_usuario);



if ($VALIDADO==1)
{

   //Obtener valores enviados por buscarBar.php                            
   foreach($_POST as $nombre_campo => $valor)
   {
       $asignacion = "\$" . $nombre_campo . "='" . strtoupper($valor) . "';";
       eval($asignacion);
       //echo $asignacion;
   }
    

    //Obtener valores enviasdos GET
    foreach($_GET as $nombre_campo => $valor)
    {
        $asignacion = "\$" . $nombre_campo . "='" . strtoupper($valor) . "';";
        eval($asignacion);
    }





    // *** Iniciacion de variables para el script de paginacion ***

    //Cantidad de resultados por página
    $_pagi_cuantos = PAGINACION;
                                        
    //cantidad de enlaces que se mostrarán como máximo en la barra de navegación
    $_pagi_nav_num_enlaces = 5;

    // *** Construcción de la consulta de busqueda ***


    //Conexion a la base de datos
    $conexion=new ConexionBD;
    $link=$conexion->conectar_bd();

    $sql="select * from peliculas where codigo_pelicula in (select codigo_pelicula from puntuaciones where login='".$login."')";


    //Incluido el script de paginación
    $_pagi_sql=$sql;
    $_pagi_conteo_alternativo=true;
    $_pagi_propagar = array("nombre","director","publico","estreno","genero","pagina");
    include("paginator.inc.php");



    echo "<form name=\"formulario_puntuacion\" METHOD=\"post\" ACTION=\"index.php\">";
    echo "<input type=\"hidden\" name=\"pagina\" value=\"puntuarPelicula.php\">" ;
    echo "<input type=\"hidden\" name=\"codigo_pelicula\">" ;
    echo "<table width=\"700\" border=\"0\" align=\"center\" cellspacing=\"0\">";
        echo "<tr >";
               echo "<td colspan='5' height=\"40\"></td>";
        echo "</tr>";    
        echo "<tr >";
               echo "<td colspan='5' class=\"mostrarTitulo\" >MIS PUNTUACIONES<td>";
        echo "</tr>";
        echo "<tr >";
             echo "<td width=\"430\" class=\"mostrarCabecera\"> NOMBRE</td>";
             echo "<td width=\"90\" class=\"mostrarCabecera\" align=\"center\" >MEDIA </td>";
             echo "<td width=\"90\" class=\"mostrarCabecera\" align=\"center\"> MI PUNTUACIÓN</td>";
             echo "<td width=\"90\" class=\"mostrarCabecera\" align=\"center\"> INFORMACIÓN </td>";
        echo "</tr>";
        echo "<tr >";
               echo "<td colspan='5' height=\"10\"></td>";
        echo "</tr>"; 

        if (mysqli_num_rows($_pagi_result)==0)
        {
            echo "<tr >";
                 echo "<td colspan='5' class=\"mostrar\" >NO HAS PUNTUADO NINGUNA PELÍCULA</td>";
            echo "</tr>";
        }
        else
        {
            while ( $reg = mysqli_fetch_array ($_pagi_result))
            {
               echo "<tr>";
                 echo "<td class=\"mostrar\">".$reg["nombre"]." </td>";

                 //Se obtiene la puntuacion media de la pelicula
                 $sql_puntuacion="SELECT ROUND(AVG(puntuacion),2) FROM puntuaciones  WHERE codigo_pelicula=".$reg["codigo_pelicula"];
                 $result_puntuacion = mysqli_query($link,$sql_puntuacion) or die("Error en la sentencia SQL<br><br>".$sql_puntuacion."<br><br>");
                 $reg_puntuacion = mysqli_fetch_array ($result_puntuacion) ;
                 if ($reg_puntuacion)
                 {
                      if ( $reg_puntuacion["ROUND(AVG(puntuacion),2)"] !=NULL) //Si la película ha sido puntuada se muestra su media
                         echo "<td class=\"mostrar\" align=\"center\">".$reg_puntuacion["ROUND(AVG(puntuacion),2)"]." </td>";
                      else
                         echo "<td class=\"mostrar\" align=\"center\">NP</td>";
                 }

                  //Se obtiene la puntuación del usuario actual
                 $sql_mipuntuacion="SELECT puntuacion FROM puntuaciones  WHERE codigo_pelicula=".$reg["codigo_pelicula"]." AND login='".$login."'";
                 $result_mipuntuacion = mysqli_query($link,$sql_mipuntuacion) or die("Error en la sentencia SQL<br><br>".$sql_mipuntuacion."<br><br>");
                 $reg_mipuntuacion = mysqli_fetch_array ($result_mipuntuacion) ;
                 if ($reg_mipuntuacion)
                 {
                     echo "<td class=\"mostrar\"align=\"center\" > ".$reg_mipuntuacion["puntuacion"]." </td>";
                 }
                 else
                 {
                         echo "<td class=\"mostrar\" align=\"center\">NP</td>";
                 }


                 echo "<td> <input type=\"button\" name=\"Mas Datos\" value=\"Mas Datos\" onClick=\"document.formulario_puntuacion.codigo_pelicula.value='".$reg["codigo_pelicula"]."';document.formulario_puntuacion.submit()\"> </td>";
               echo "</tr>";

            }

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
 else
 {
 ?>
 <table width="600" border="0" height="0" align="center" >
    <tr border="0">
     <td height="170" > </td>
   </tr>
   <tr border="0">
    <td > <span class="prohibido">ES NECEARIO REGISTRARSE PARA PODER ACCEDER AL SISTEMA</span></td>
   </tr>
 </table>



 <?php
 }
 ?>
