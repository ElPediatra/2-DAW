<?php

include_once("sesiones.php");


//Inclusion de la clase para conexion a la base de datos
include_once("class.ConexionBD.php");

//Se controla si se ha iniciado sesion ( el usuario se ha validado)
$VALIDADO=validar_sesion($login,$tipo_usuario);


if (($VALIDADO==1) && ($tipo_usuario==0) )//Si el usuario se ha validado   y es administrador
{

   //Obtener valores enviados por el formulario y convertirlos a mayusculas para modificarlos en la base de datos
  foreach($_POST as $nombre_campo => $valor)
  {
      $asignacion = "\$" . $nombre_campo . "='" . strtoupper($valor) . "';";
      eval($asignacion);
      //echo $asignacion;
  }

  $error=false;


  // Si el fornulario ha sido enviado -> Se valida noy hay errores en la introducción de datos
  if (isset($modificar) )
  {

      // Comprobación de  que se han introducido todos los datos obligatorios

      if (strcmp(trim($nombre),"")==0)
      {
         $errores["nombre"] = "¡Hay que introducir el título de la pelicula!";
         $error = true;
      }
      else
         $errores["nombre"] = "";


      if (strcmp(trim($director),"")==0 && strcmp($reg["director"],"")==0)
      {
         $errores["director"] = "¡Hay que introducir el director de la película!";
         $error = true;
      }
      else
         $errores["director"] = "";
       // Subir fichero

      $copiarFichero = false;

      // Copiar fichero en directorio de ficheros subidos
      // Se renombra para evitar que sobreescriba un fichero existente
      // Para garantizar la unicidad del nombre se añade una marca de tiempo
      if (is_uploaded_file ($_FILES['imagen']['tmp_name']))
      {
         $nombreDirectorio = "img/";
         $nombreFichero = $_FILES['imagen']['name'];
         $copiarFichero = true;

      // Si ya existe un fichero con el mismo nombre, renombrarlo
         $nombreCompleto = $nombreDirectorio . $nombreFichero;
         if (is_file($nombreCompleto))
         {
            $idUnico = time();
            $nombreFichero = $idUnico . "-" . $nombreFichero;
         }
      }
   // El fichero introducido supera el límite de tamaño permitido
      else if ($_FILES['imagen']['error'] == UPLOAD_ERR_FORM_SIZE)
      {
         $maxsize = $_REQUEST['MAX_FILE_SIZE'];
         $errores["imagen"] = "¡El tamaño del fichero supera el límite permitido ($maxsize bytes)!";
         $error = true;
      }
   // No se ha introducido ningún fichero
      else if ($_FILES['imagen']['name'] == "")
         $nombreFichero = '';
   // El fichero introducido no se ha podido subir
      else
      {
         $errores["imagen"] = "¡No se ha podido subir el fichero!";
         $error = true;
      }



  }



  //Si se ha enviado el fornulario y  ho hay errores
  if ( isset($modificar) && $error==false )
  {
          $conexion=new ConexionBD;
          $link$conexion->conectar_bd();
          $sql= "UPDATE peliculas SET director='".$director."' WHERE codigo_pelicula=".$codigo_pelicula;
          $result = mysqli_query($link,$sql) or die("Error en la sentencia SQL<br><br>".$sql."<br><br>");
          $sql= "UPDATE peliculas SET genero='".$genero."' WHERE codigo_pelicula=".$codigo_pelicula;
          $result = mysqli_query($link,$sql) or die("Error en la sentencia SQL<br><br>".$sql."<br><br>");
          $sql= "UPDATE peliculas SET estreno=".$estreno." WHERE codigo_pelicula=".$codigo_pelicula;
          $result = mysqli_query($link,$sql) or die("Error en la sentencia SQL<br><br>".$sql."<br><br>");
          $sql= "UPDATE peliculas SET publico=".$publico." WHERE codigo_pelicula=".$codigo_pelicula;
          $result = mysqli_query($link,$sql) or die("Error en la sentencia SQL<br><br>".$sql."<br><br>");

          if ($copiarFichero)
          {
               // Se borra la imagen antigua si existe
               $sql= "SELECT imagen FROM peliculas WHERE codigo_pelicula=".$codigo_pelicula;
               $result = mysqli_query($link,$sql) or die("Error en la sentencia SQL<br><br>".$sql."<br><br>");
               $reg = mysqli_fetch_array ( $result );
               if ($reg)
               {
                  if ( ($reg["imagen"]!=NULL) && (strcmp(trim($reg["imagen"]),"")!=0) )
                  {
                     unlink($nombreDirectorio.$reg["imagen"]);
                  }
               }

               $sql= "UPDATE peliculas SET imagen='".$nombreFichero."' WHERE codigo_pelicula=".$codigo_pelicula;
               //echo $sql;
               $result = mysqli_query($link,$sql) or die("Error en la sentencia SQL<br><br>".$sql."<br><br>");

               //Mover fichero de imagen a su ubicación definitiva
               move_uploaded_file ($_FILES['imagen']['tmp_name'],$nombreDirectorio . $nombreFichero);
          }


?>

     <table width="500" border="0"  align="center" cellspacing="0" cellpadding="4">
     <tr border="0">
        <td colspan="4" height="170" colspan="2" ></td>
      </tr>
      <tr border="1">
          <td colspan="4" class="formularioTitulo"> Película modificada correctamente</td>
      </tr>
      <form name="formulario_volver"  METHOD="post" ACTION="index.php">
      <input type="hidden" name="pagina" value="puntuarPelicula.php">
      <input type="hidden" name="codigo_pelicula" value="<?php echo $codigo_pelicula; ?>">
      <tr>
          <td class="datos" align="center"><input type="submit" name="volver" value="Volver"; /></td>
      </tr>
       </form>
      </table>

 <?php
     $conexion->cerrar_conexion();
  }
  else // Si no se ha enviado el fornulario  o hay errores al enviarlo
  {

?>
     <form name="formulario_modificacion" enctype="multipart/form-data" METHOD="post" ACTION="index.php">
     <input type="hidden" name="pagina" value="modificarPelicula.php">
     <input type="hidden" name="codigo_pelicula" value="<?php echo $codigo_pelicula; ?>">
     <table width="500" border="0"  align="center" cellspacing="0" cellpadding="4">
     <tr border="0">
        <td colspan="4" height="60" colspan="2" ></td>
      </tr>
      <tr border="1">
          <td colspan="4" class="formularioTitulo"> MODIFICAR PELÍCULA </td>
      </tr>

  <?php

      $conexion=new ConexionBD;
      $link=$conexion->conectar_bd();

      $sql="SELECT * FROM peliculas WHERE codigo_pelicula=".$codigo_pelicula;

      $result = mysqli_query($link,$sql) or die("Error en la sentencia SQL<br><br>".$sql."<br><br>");
      $reg = mysqli_fetch_array ( $result );
      $conexion->cerrar_conexion();

  ?>

       <tr border="0">
          <td class="formulario" height="20" colspan="4">  </td>
      </tr>
      <tr border="1">
          <td class="formulario">Nombre: </td>
          <td class="formulario" colspan="3"> <input type="text" name="nombre" size="50" maxlength="50" value="<?php echo $reg["nombre"]; ?>"  readonly /> </td>
      </tr>

      <tr >
          <td class="formulario">Género: </td>
          <td class="formulario">
               <select name="genero" size="1" >
                   <option value="Aventuras" <?php if (strcmp($reg["genero"],'AVENTURAS')==0) echo " selected=\"true\""; ?>>Aventuras</option>
                   <option value="Terror" <?php if (strcmp($reg["genero"],'TERROR')==0)  echo " selected=\"true\""; ?> >Terror</option>
                   <option value="Comedia" <?php if (strcmp($reg["genero"],'COMEDIA')==0) echo " selected=\"true\""; ?> >Comedia</option>
                   <option value="Accion" <?php if (strcmp($reg["genero"],'ACCION')==0)  echo " selected=\"true\""; ?> >Accion</option>
                   <option value="Belica" <?php if (strcmp($reg["genero"],'BELICA')==0)  echo " selected=\"true\""; ?> >Belica</option>
                   <option value="Drama" <?php if (strcmp($reg["genero"],'DRAMA')==0)  echo " selected=\"true\""; ?> >Drama</option>
                   <option value="Suspense" <?php if (strcmp($reg["genero"],'SUSPENSE')==0) echo " selected=\"true\""; ?> >Suspense</option>
                   <option value="C. Ficcion" <?php if (strcmp($reg["genero"],'C. FICCION')==0)  echo " selected=\"true\""; ?> >C.Ficcion</option>
               </select>
          </td>
          <td class="formulario">Todos los públicos</td>
          <td class="formulario" > SI <input type="radio" name="publico" value="1" <?php if (!isset($reg["publico"]) || $reg["publico"]==1) echo "checked"; ?> > NO <input type="radio" name="publico" value="0"  <?php if (isset($reg["publico"]) && $reg["publico"]==0) echo "checked" ;?> ></td>
      </tr>
      <tr >
           <td class="formulario">Director: </td>
           <td class="formulario"colspan="3"> <input type="text" name="director" size="50" maxlength="50" value="<?php echo $reg["director"]; ?>"> </td>
      </tr>
  <?php
      if ($error==true && $errores["director"] != "")
      {
       echo "<tr border=\"1\">";
       echo "  <td class=\"formulario\" colspan=\"4\"><span class=\"textoAviso\">".$errores["director"]."</span></td>";
       echo "</tr>";
      }
  ?>
      <tr >
          <td class="formulario">Estreno</td>
          <td class="formulario" colspan="3"> SI <input type="radio" name="estreno" value="1" <?php if (!isset($reg["estreno"]) || $reg["estreno"]==1) echo "checked"; ?> > NO <input type="radio" name="estreno" value="0"  <?php if (isset($reg["estreno"]) && $reg["estreno"]==0) echo "checked" ;?> ></td>
      </tr>
      <tr >
          <td class="formulario">Imagen caratula:</td>
          <td class="formulario" colspan="3">
              <input type="hidden" name="MAX_FILE_SIZE" VALUE="102400">
              <input type="file" name="imagen">
          </td>
       </tr>


<?PHP
   if (isset($errores["imagen"]) && ($errores["imagen"] != ""))
   {
       echo "<tr border=\"1\">";
       echo "  <td class=\"formulario\" colspan=\"4\"><span class=\"textoAviso\">".$errores["imagen"]."</span></td>";
       echo "</tr>";
   }
?>


      <tr class="formulario">
          <td class="formulario" colspan="2" align="center"><input type="submit" name="modificar" value="modificar" /> </td>
          <td class="formulario" colspan="2" align="center"><input type="reset" name="borrar" value="borrar" /> </td>
      </tr>
      </form>
      <form name="formulario_volver"  METHOD="post" ACTION="index.php">
      <input type="hidden" name="pagina" value="puntuarPelicula.php">
      <input type="hidden" name="codigo_pelicula" value="<?php echo $codigo_pelicula; ?>">
      <tr>
          <td class="datos" align="center" colspan="4" ><input type="submit" name="volver" value="Volver"; /></td>
      </tr>
      </form>
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







