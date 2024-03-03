<?php
include_once("sesiones.php");
?>

<SCRIPT LANGUAGE="javascript">
        function validarFormulario() {
                 if (document.forms.formulario_puntuar.comentario.value.length > "120")
                 {
                     alert("El comentario no puede superar los 120 caracteres");
                     validado=false ;
                 }
                 else
                     validado=true;

                 if (validado == true)
                        document.forms.formulario_puntuar.submit();

        }
</SCRIPT>


<?php

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
    

  $conexion=new ConexionBD;
  $link=$conexion->conectar_bd();
?>

  <form name="formulario_puntuar"  METHOD="post" ACTION="index.php">
      <input type="hidden" name="pagina" value="puntuarPelicula.php">
      <input type="hidden" name="codigo_pelicula" value="<?php echo $codigo_pelicula; ?>">
      <table width="500" border="0" height="0" align="center" cellspacing="0" cellpadding="3">
          <tr >
              <td colspan="4" height="20" colspan="2" ></td>
          </tr>
<?php
  //Si se ha enviado el formulario y  no hay errores
  if ( isset($puntuar) )
  {

          $sql_query="SELECT puntuacion FROM puntuaciones WHERE codigo_pelicula=".$codigo_pelicula." AND login='".$login."'";
          $result_query = mysqli_query($link,$sql_query) or die("Error en la sentencia SQL<br><br>".$sql_query."<br><br>");
          $reg_query = mysqli_fetch_array ($result_query) ;
          if ($reg_query) //El usuario ya ha puntuado esa pelicula  -> se actualiza su puntuación
          {
            $sql_update="UPDATE puntuaciones SET puntuacion=".$puntuacion." WHERE codigo_pelicula=".$codigo_pelicula." AND login='".$login."'";
            $result_update = mysqli_query($link,$sql_update) or die("Error en la sentencia SQL<br><br>".$sql_update."<br><br>");
            if (trim($comentario) == "")
               $sql_update="UPDATE puntuaciones SET comentario=NULL WHERE codigo_pelicula=".$codigo_pelicula." AND login='".$login."'";
            else
                $sql_update="UPDATE puntuaciones SET comentario='".$comentario."' WHERE codigo_pelicula=".$codigo_pelicula." AND login='".$login."'";
            $result_update = mysqli_query($link,$sql_update) or die("Error en la sentencia SQL<br><br>".$sql_update."<br><br>");
            echo "<tr><td colspan=\"4\" class=\"formulario\">Pelicula puntuada correctamente (Puntuación actualizada)<tr><td> ";
          }
          else //el usuario no ha puntuado la película
          {
            if (trim($comentario) == "")
               $sql_insert="INSERT INTO puntuaciones VALUES(".$codigo_pelicula.",'".$login."',".$puntuacion.",NULL)";
            else
               $sql_insert="INSERT INTO puntuaciones VALUES(".$codigo_pelicula.",'".$login."',".$puntuacion.",'".$comentario."')";
            $result_update = mysqli_query($link,$sql_insert) or die("Error en la sentencia SQL<br><br>".$sql_insert."<br><br>");
            echo "<tr><td colspan=\"4\" class=\"formulario\">Pelicula puntuada correctamente (1ª Puntuacion)<tr><td>";
          }
           echo "<tr><td height=\"20\" colspan=\"4\"><tr><td>";

  }



  $sql_pelicula="SELECT * FROM peliculas WHERE codigo_pelicula=".$codigo_pelicula;
  $result_pelicula = mysqli_query($link,$sql_pelicula) or die("Error en la sentencia SQL<br><br>".$sql."<br><br>");
  $reg_pelicula = mysqli_fetch_array ($result_pelicula) ;


  if ($reg_pelicula)
  {

  ?>

          <tr >
             <td colspan="2"  class="formularioTitulo"> DATOS DE LA PELÍCULA </td>
          </tr>
          <tr >
              <td colspan="4" height="20" colspan="2" class="formularioTitulo"></td>
          </tr>
          <tr >
              <td class="formulario" width="200">NOMBRE: </td>
              <td class="datos" width="300"> <?php echo $reg_pelicula["nombre"]; ?>  </td>
          </tr>
          <tr >
              <td class="formulario" width="200">GÉNERO: </td>
              <td class="datos" width="300"> <?php echo $reg_pelicula["genero"]; ?>  </td>
          </tr>
          <tr >
              <td class="formulario" width="200">DIRECTOR: </td>
              <td class="datos" width="300"> <?php echo $reg_pelicula["director"]; ?>  </td>
          </tr>
          <tr >
              <td class="formulario" width="200">ESTRENO: </td>
              <td class="datos" width="300"> <?php  if ($reg_pelicula["estreno"]==1) echo "SI"; else echo "NO"; ?>  </td>
          </tr>
          <tr >
              <td class="formulario" width="200">PÚBLICO: </td>
              <td class="datos"width="300" > <?php if ($reg_pelicula["publico"]==1) echo "SI"; else echo "NO"; ?>  </td>
          </tr>

<?php
          //Se obtiene la puntuacion media de la pelicula
          $sql_puntuacion="SELECT ROUND(AVG(puntuacion),2) FROM puntuaciones  WHERE codigo_pelicula=".$codigo_pelicula;
          $result_puntuacion = mysqli_query($link,$sql_puntuacion) or die("Error en la sentencia SQL<br><br>".$sql_puntuacion."<br><br>");
          $reg_puntuacion = mysqli_fetch_array ($result_puntuacion) ;
          if ($reg_puntuacion["ROUND(AVG(puntuacion),2)"]!=NULL)
          {
?>
              <tr >
                  <td class="formulario" width="200">PUNTUACIÓN MEDIA:</td>
                  <td class="datos" width="300"> <?php echo $reg_puntuacion["ROUND(AVG(puntuacion),2)"]; ?>  </td>
              </tr>
<?php
          }
          else
          {
?>
              <tr class="formulario" >
                  <td class="formulario" width="200">PUNTUACIÓN MEDIA:</td>
                  <td class="datos" width="300">Nadie ha puntuado esa pelicula</td>
              </tr>
<?php
          }
?>

<?php
          // Se comprueba si el usuario ha puntuado esa película
          $sql_mipuntuacion="SELECT puntuaciones.puntuacion,puntuaciones.comentario FROM peliculas JOIN puntuaciones ON (peliculas.codigo_pelicula=puntuaciones.codigo_pelicula) ";
          $sql_mipuntuacion=$sql_mipuntuacion." WHERE peliculas.codigo_pelicula=".$codigo_pelicula." AND puntuaciones.LOGIN='".$login."'";
          $result_mipuntuacion = mysqli_query($link,$sql_mipuntuacion) or die("Error en la sentencia SQL<br><br>".$sql_mipuntuacion."<br><br>");
          $reg_mipuntuacion = mysqli_fetch_array ($result_mipuntuacion) ;
          if ( $reg_mipuntuacion)
          {

?>
              <tr class="formulario">
                  <td class="formulario" width="200">MI PUNTUACIÓN ACTUAL:  </td>
                  <td class="datos" width="300"> <?php echo $reg_mipuntuacion["puntuacion"]; ?>  </td>
              </tr>
<?php
          }
          else
          {
?>
              <tr class="formulario">
                  <td class="formulario" width="200">MI PUNTUACIÓN ACTUAL:  </td>
                  <td class="datos" width="300"> No he puntuado esta pelicula   </td>
              </tr>
<?php
          }
?>
              <tr >
                  <td class="formulario" width="200">INTRODUCIR NUEVA PUNTUACIÓN:</td>
                  <td class="formulario"><select name="puntuacion" size="1" >
                         <option value="1">1</option>
                         <option value="2">2</option>
                         <option value="3">3</option>
                         <option value="4">4</option>
                         <option value="5">5</option>
                         <option value="6">6</option>
                         <option value="7">7</option>
                         <option value="8">8</option>
                         <option value="9">9</option>
                         <option value="10">10</option>
                       </select>
                  </td>
              </tr>

              <tr >
                  <td class="formulario" width="200">INTRODUCIR UN COMENTARIO (Max 120 car.):</td>
                  <td class="formulario"><textarea name="comentario" rows="4" cols="40" ><?php echo $reg_mipuntuacion["comentario"]; ?> </textarea></td>
              </tr>
              <tr>
                  <td class="datos"  align="center">
                      <input type="submit" name="puntuar" value="Puntuar" onclick=validarFormulario(); />
                      </form>
                  </td>
                  <td class="datos"  align="center">
                      <form name="formulario_comentarios"  METHOD="post" ACTION="index.php">
                      <input type="hidden" name="pagina" value="mostrarComentarios.php">
                      <input type="hidden" name="codigo_pelicula" value="<?php echo $codigo_pelicula; ?>">
                      <input type="submit" name="comentarios" value="Ver todos los comentarios"; />
                      </form>
                  </td>
              </tr>
              <tr>
<?php
      if ($tipo_usuario==0) //Si el usuario es administrador
      {
?>


                      <td class="datos"  align="center">
                      <form name="formulario_modificar"  METHOD="post" ACTION="index.php">
                      <input type="hidden" name="pagina" value="modificarPelicula.php">
                      <input type="hidden" name="codigo_pelicula" value="<?php echo $codigo_pelicula; ?>">
                      <input type="submit" name="modificarPelicula" value="Modificar Datos"; />
                      </form>
                      </td>

<?php
      }
      else
      {
?>
          <td class="datos"  align="center"></td>
<?php
      }
?>

                  <td class="datos"  align="center">
                      <form name="formulario_imagen"  METHOD="post" ACTION="index.php">
                      <input type="hidden" name="pagina" value="mostrarImagen.php">
                      <input type="hidden" name="codigo_pelicula" value="<?php echo $codigo_pelicula; ?>">
                      <input type="submit" name="imagen" value="Ver imagen"; />
                      </form>
                  </td>

              </tr>
      </table>


<?php

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
