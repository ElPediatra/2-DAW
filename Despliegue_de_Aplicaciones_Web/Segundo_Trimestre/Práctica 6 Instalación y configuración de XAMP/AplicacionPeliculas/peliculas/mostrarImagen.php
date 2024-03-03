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
    
   echo "<input type=\"hidden\" name=\"pagina\" value=\"puntuarPelicula.php\">" ;
   echo "<input type=\"hidden\" name=\"codigo_pelicula\">" ;
   echo "<table width=\"700\" border=\"0\" align=\"center\" cellspacing=\"0\">";
        $conexion=new ConexionBD;
        $link=$conexion->conectar_bd();

        $sql="SELECT * FROM peliculas WHERE codigo_pelicula=".$codigo_pelicula;
        $result = mysqli_query($link,$sql) or die("Error en la sentencia SQL<br><br>".$sql_puntuacion."<br><br>");
        $reg = mysqli_fetch_array ($result) ;
        if ($reg!=NULL)
        {

          echo "<tr >";
                 echo "<td height=\"40\"></td>";
          echo "</tr>";                         
          echo "<tr  >";
                 echo "<td  width=\"700\" class=\"mostrarTitulo\" >IMAGEN DE LA PELICULA :". $reg["nombre"]."</td>";
          echo "</tr>";
          echo "<tr >";
                 echo "<td  width=\"700\" height=\"20\"></td>";
          echo "</tr>"; 




          //No hay imagen para esa pelicula
          if ($reg["imagen"]=='' OR   $reg["imagen"]==NULL)
          {
               echo "<tr> ";
                 echo "<td width=\"700\" class=\"mostrar\" >NO EXISTE IMAGEN PARA LA PELÍCULA</td>";
               echo "</tr>";

          }
          else
          {
              echo "<tr> ";
                 echo "<td align=\"center\" width=\"700\" class=\"mostrar\" ><img src=\"img\\".$reg["imagen"]." \" width=\"225\" height=\"323\"></td>";
              echo "</tr>";

          }


        echo "<tr border=\"1\">";
               echo "<td width=\"700\" height=\"20\"></td>";
        echo "</tr>";
        echo "<form name=\"formulario_comentarios\"  METHOD=\"post\" ACTION=\"index.php\"> ";
        echo "<input type=\"hidden\" name=\"pagina\" value=\"puntuarPelicula.php\">";
        echo "<input type=\"hidden\" name=\"codigo_pelicula\" value=\"".$codigo_pelicula."\">";
        echo "<tr><td class=\"datos\"  align=\"center\"><input type=\"submit\" name=\"comentarios\" value=\"Volver\"; /> </td></tr>";
        echo "</form>";
   echo "</table>";

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
