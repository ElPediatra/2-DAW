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
    

    //Obtener valores enviados GET
    foreach($_GET as $nombre_campo => $valor)
    {
        $asignacion = "\$" . $nombre_campo . "='" . strtoupper($valor) . "';";
        eval($asignacion);
    }





    // *** Iniciacion de variables para el script de paginación ***

    //Cantidad de resultados por página
    $_pagi_cuantos = PAGINACION;
                                        
    //cantidad de enlaces que se mostrarán como máximo en la barra de navegación
    $_pagi_nav_num_enlaces = 5;

    // *** Construcción de la consulta de búsqueda ***


    //Conexión a la base de datos
    $conexion=new ConexionBD;
    $link=$conexion->conectar_bd();

    $sql="SELECT P.comentario,U.login FROM puntuaciones P, usuarios U WHERE (P.login = U.login && codigo_pelicula=".$codigo_pelicula.")";


    //echo $sql;

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
               echo "<td height=\"40\"></td>";
        echo "</tr>";                         
        echo "<tr  >";
               echo "<td  width=\"700\" class=\"mostrarTitulo\" >COMENTARIOS DE LA PELICULA</td>";
        echo "</tr>";
        echo "<tr >";
               echo "<td  width=\"700\" height=\"10\"></td>";
        echo "</tr>"; 

        if (mysqli_num_rows($_pagi_result)==0)
        {
            echo "<tr> ";
                 echo "<td width=\"700\" class=\"mostrar\" >NO EXISTEN COMENTARIOS PARA LA PELICULA</td>";
            echo "</tr>";
        }
        else
        {
            while ( $reg = mysqli_fetch_array ($_pagi_result))
            {
                if ($reg["comentario"]!=NULL)
                {
                  echo "<tr >";
                    echo "<td height=\"20\" class=\"mostrar\"> </td>";
                  echo "</tr>";
                  echo "<tr >";
                    echo "<td width=\"700\" class=\"mostrarComentario\">USUARIO: ".$reg["login"]." </td>";
                  echo "</tr>";
                  echo "<tr >";
                    echo "<td height=\"10\" class=\"mostrar\"> </td>";
                  echo "</tr>";
                  echo "<tr >";
                   echo "<td width=\"700\" class=\"mostrar\">".$reg["comentario"]." </td>";
                  echo "</tr>";
                }


            }

        
        }
        echo "<tr border=\"1\">";
               echo "<td width=\"700\" height=\"20\"></td>";
        echo "</tr>";
    echo "</table>";

    echo "<table width=\"700\" border=\"0\" align=\"center\" cellspacing=\"0\">";
        echo "<tr >";
             echo "<td class=\"mostrarPaginacion\" >". $_pagi_navegacion."</td>";
        echo "</tr>";
        echo "<tr >";
             echo "<td class=\"mostrarPaginacion\" >Resultados: ". $_pagi_info."</td>";
        echo "</tr>";
        echo "</form>";
        echo "<form name=\"formulario_comentarios\"  METHOD=\"post\" ACTION=\"index.php\"> ";
        echo "<input type=\"hidden\" name=\"pagina\" value=\"puntuarPelicula.php\">";
        echo "<input type=\"hidden\" name=\"codigo_pelicula\" value=\"".$codigo_pelicula."\">";
        echo "<tr><td class=\"datos\"  align=\"center\"><input type=\"submit\" name=\"comentarios\" value=\"Volver\"; /> </td></tr>";
        echo "</form>";
    echo "</table>";


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
    <td > <span class="prohibido">ES NECESARIO REGISTRARSE PARA PODER ACCEDER AL SISTEMA</span></td>
   </tr>
 </table>



 <?php
 }
 ?>
