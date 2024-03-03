<?php

include_once("sesiones.php");

//Inclusion de la clase para conexion a la base de datos
include_once("class.ConexionBD.php");

//Se controla si se ha iniciado sesion ( el usuario se ha validado)
$VALIDADO=validar_sesion($login,$tipo_usuario);



if (($VALIDADO==1) && ($tipo_usuario==0) )//Si el usuario se ha validado   y es administrador
{

   //Obtener valores enviados por el formulario y convertirlos a mayusculas para insertarlos en la base de datos
  foreach($_POST as $nombre_campo => $valor)
  {
      $asignacion = "\$" . $nombre_campo . "='" . strtoupper($valor) . "';";
      eval($asignacion);
      //echo $asignacion;
  }

  $error=false;
  $existePelicula=false;

  // Si el fornulario ha sido enviado -> Se valida noy hay errores en la introducción de datos y
  // sin no los hay, si existe alguna pelicula con el mismo titulo en la base de datos
  if (isset($insertar) )
  {

      // Comprobación de  que se han introducido todos los datos obligatorios

      if (strcmp(trim($nombre),"")==0)
      {
         $errores["nombre"] = "¡Hay que introducir el título de la pelicula!";
         $error = true;
      }
      else
         $errores["nombre"] = "";


      if (strcmp(trim($director),"")==0)
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


      if ($error==false) //Si no hay errores al introducir los datos
      {
          $conexion=new ConexionBD;
          $link=$conexion->conectar_bd();

          $sql="SELECT * FROM peliculas";

          $result = mysqli_query($link, $sql) or die("Error en la sentencia SQL<br><br>".$sql."<br><br>");
          while ( $reg = mysqli_fetch_array ($result))
          {
              if (strcmp($reg["nombre"],$nombre)==0)
              {
                  $existePelicula=true;
                  $conexion->cerrar_conexion();
              }
          }
      }


  }



  //Si se ha enviado el fornulario y  no existe una pelicula con el mismo nombre se insertar la pelicula en la base de datos
  if ( isset($insertar) && $error==false && $existePelicula==false)
  {
          $sql="INSERT INTO peliculas(nombre,director,genero,estreno,publico,fecha_insercion,imagen)  VALUES ('".$nombre."','".$director."','".$genero."',".$estreno.",".$publico.",CURRENT_DATE,'".$nombreFichero ."')";
          $result = mysqli_query($link, $sql) or die("Error en la sentencia SQL<br><br>".$sql."<br><br>");
          // Mover fichero de imagen a su ubicación definitiva
          if ($copiarFichero)
              move_uploaded_file ($_FILES['imagen']['tmp_name'],
              $nombreDirectorio . $nombreFichero);

?>

     <table width="500" border="0"  align="center" cellspacing="0" cellpadding="4">
     <tr border="0">
        <td colspan="4" height="170" colspan="2" ></td>
      </tr>
      <tr border="1">
          <td colspan="4" class="formularioTitulo"> Película insertada correctamente</td>
      </tr>
      </table>

 <?php
     $conexion->cerrar_conexion();
  }
  else // Si no se ha enviado el fornulario o se ha enviado y existe una pelicula con el mimso nombre
  {

?>
     <form name="formulario_alta" enctype="multipart/form-data" METHOD="post" ACTION="index.php">
     <input type="hidden" name="pagina" value="insertarPelicula.php">
     <table width="500" border="0"  align="center" cellspacing="0" cellpadding="4">
     <tr border="0">
        <td colspan="4" height="60" colspan="2" ></td>
      </tr>
      <tr border="1">
          <td colspan="4" class="formularioTitulo"> ALTA DE PELÍCULA </td>
      </tr>

  <?php

       if ($existePelicula==1)
       {
          echo "<tr>";
          echo "<td  class=\"formulario\" colspan=\"4\" ><span class=\"textoAviso\">Existe una pelicula con ese titulo</span></td>";
          echo "</tr>";
       }
  ?>

       <tr border="0">
          <td class="formulario" height="20" colspan="4">  </td>
      </tr>
      <tr border="1">
          <td class="formulario">Nombre: </td>
          <td class="formulario" colspan="3"> <input type="text" name="nombre" size="50" maxlength="50" value="<?php if (isset($nombre)) echo $nombre; ?>" > </td>
      </tr>
  <?php
      if (isset($errores["nombre"]) && ($errores["nombre"] != ""))
      {
       echo "<tr border=\"1\">";
       echo "  <td  class=\"formulario\" colspan=\"4\" ><span class=\"textoAviso\">".$errores["nombre"]."</span></td>";
       echo "</tr>";
      }
  ?>
      <tr >
          <td class="formulario">Género: </td>
          <td class="formulario">
               <select name="genero" size="1" >
                  <option value="Aventuras" <?php if (isset($genero) && strcmp($genero,'AVENTURASD')==0) echo " selected=\"true\""; ?>>Aventuras</option>
                  <option value="Terror" <?php if (isset($genero) && strcmp($genero,'TERROR')==0)  echo " selected=\"true\""; ?> >Terror</option>
                  <option value="Comedia" <?php if (isset($genero) && strcmp($genero,'COMEDIA')==0) echo " selected=\"true\""; ?> >Comedia</option>
                  <option value="Accion" <?php if (isset($genero) && strcmp($genero,'ACCION')==0)  echo " selected=\"true\""; ?> >Accion</option>
                  <option value="Belica" <?php if (isset($genero) && strcmp($genero,'BELICA')==0)  echo " selected=\"true\""; ?> >Belica</option>
                  <option value="Drama" <?php if (isset($genero) && strcmp($genero,'DRAMA')==0)  echo " selected=\"true\""; ?> >Drama</option>
                  <option value="Suspense" <?php if (isset($genero) && strcmp($genero,'SUSPENSE')==0) echo " selected=\"true\""; ?> >Suspense</option>
                  <option value="C. Ficcion" <?php if (isset($genero) && strcmp($genero,'C. FICCION')==0)  echo " selected=\"true\""; ?> >C.Ficcion</option>
               </select>
          </td>
          <td class="formulario">Todos los públicos</td>
          <td class="formulario" > SI <input type="radio" name="publico" value="1" <?php if (!isset($publico) || $publico==1) echo "checked"; ?> > NO <input type="radio" name="publico" value="0"  <?php if (isset($publico) && $publico==0) echo "checked" ;?> ></td>
      </tr>
      <tr >
           <td class="formulario">Director: </td>
           <td class="formulario" colspan="3"> <input type="text" name="director" size="50" maxlength="50" value="<?php if (isset($director)) echo $director; ?>"> </td>
      </tr>
  <?php
      if (isset($errores["director"]) && ($errores["director"] != ""))
      {
       echo "<tr border=\"1\">";
       echo "  <td class=\"formulario\" colspan=\"4\"><span class=\"textoAviso\">".$errores["director"]."</span></td>";
       echo "</tr>";
      }
  ?>
      <tr >
          <td class="formulario">Estreno</td>
          <td class="formulario" colspan="3"> SI <input type="radio" name="estreno" value="1" <?php if (!isset($estreno) || $estreno==1) echo "checked"; ?> > NO <input type="radio" name="estreno" value="0"  <?php if (isset($estreno) && $estreno==0) echo "checked" ;?> ></td>
      </tr>
      <tr >
          <td class="formulario">Imagen caratula:</td>
          <td class="formulario" colspan="3">
              <input type="hidden" name="MAX_FILE_SIZE" VALUE="102400">
              <input type="file" name=imagen>
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
          <td class="formulario" colspan="2" align="center"><input type="submit" name="insertar" value="insertar" /> </td>
          <td class="formulario" colspan="2" align="center"><input type="reset" name="borrar" value="borrar" /> </td>
      </tr>
      </table>
      </form>
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







