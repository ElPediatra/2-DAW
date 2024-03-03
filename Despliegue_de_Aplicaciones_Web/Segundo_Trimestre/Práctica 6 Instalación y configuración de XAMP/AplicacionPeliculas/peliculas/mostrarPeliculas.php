<?php

include_once("sesiones.php");


include_once("class.ConexionBD.php");


//Se controla si se ha iniciado sesion ( el usuario se ha validado)
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

    $sql="select  peliculas.*, round(avg(puntuaciones.puntuacion),2) ";
    $sql=$sql. "from peliculas left outer join puntuaciones on (peliculas.codigo_pelicula=puntuaciones.codigo_pelicula)  where ";
    if (isset($nombre) && strcmp(trim($nombre),"")!=0)
       $sql=$sql." nombre LIKE '%".$nombre."%' AND ";

    if (isset($genero) && strcmp(trim($genero),"")!=0)
       $sql=$sql." genero='".$genero."' AND ";

    if (isset($director) && strcmp(trim($director),"")!=0)
       $sql=$sql." director='".$director."' AND ";

    if (isset($publico))
       $sql=$sql." publico=".$publico." AND ";

    if (isset($estreno))
       $sql=$sql." estreno=".$estreno." AND ";


    //Para evitar poner muchos if en la construccion de la consulta
    $sql=$sql." (1=1) group by (peliculas.codigo_pelicula)";

    if (isset($puntuacion) && $puntuacion!="")
       $sql=$sql." having round(avg(puntuaciones.puntuacion),2)> ".$puntuacion;


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
               echo "<td colspan='5' height=\"40\"></td>";
        echo "</tr>";                         
        echo "<tr >";
               echo "<td colspan='5' class=\"mostrarTitulo\" >RESULTADOS DE LA BUSQUEDA</td>";
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
                 echo "<td colspan='5' class=\"mostrar\" >NO EXISTEN PELICULAS CON LOS CRITERIOS SELECCIONADOS</td>";
            echo "</tr>";
        }
        else
        {
            while ( $reg = mysqli_fetch_array ($_pagi_result))
            {
               echo "<tr >";
                 echo "<td class=\"mostrar\">".$reg["nombre"]." </td>";
                 if ( $reg["round(avg(puntuaciones.puntuacion),2)"] !=NULL) //Si la pelicula ha sido puntuada se muestra su media
                    echo "<td class=\"mostrar\" align=\"center\">".$reg["round(avg(puntuaciones.puntuacion),2)"]." </td>";
                 else
                    echo "<td class=\"mostrar\" align=\"center\">NP</td>";
                  //Se obtiene la puntuacion del usuario actual
                 $sql_mipuntuacion="SELECT puntuacion FROM puntuaciones  WHERE codigo_pelicula=".$reg["codigo_pelicula"]." AND login='".$login."'";
                 $result_mipuntuacion = mysqli_query($link,$sql_mipuntuacion) or die("Error en la sentencia SQL<br><br>".$sql_mipuntuacion."<br><br>");
                 $reg_mipuntuacion = mysqli_fetch_array ($result_mipuntuacion) ;
                 if ($reg_mipuntuacion)
                 {
                     echo "<td class=\"mostrar\" align=\"center\">".$reg_mipuntuacion["puntuacion"]." </td>";
                 }
                 else
                 {
                         echo "<td class=\"mostrar\" align=\"center\">NP</td>";
                 }


                 echo "<td class=\"mostrar\"> <input type=\"button\" name=\"Mas\" value=\"Mas Datos\" onClick=\"document.formulario_puntuacion.codigo_pelicula.value='".$reg["codigo_pelicula"]."';document.formulario_puntuacion.submit()\"> </td>";
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
    <td > <span class="prohibido">ES NECESARIO REGISTRARSE PARA PODER ACCEDER AL SISTEMA</span></td>
   </tr>
 </table>



 <?php
 }
 ?>
