<?php

include_once("sesiones.php");
include_once("class.ConexionBD.php");


function comprobar_email($email) {
        if (preg_match("/^[0-9a-z]+(([\.\-_])[0-9a-z]+)*@[0-9a-z]+(([\.\-])[0-9a-z-]+)*\.[a-z]{2,4}$/i", $email)) {
            return true;
        } else {
            return false;
        }
}


 //Obtener valores enviados por el formulario y convertirlos a mayusculas para insertarlos en la base de datos
foreach($_POST as $nombre_campo => $valor)
{
    $asignacion = "\$" . $nombre_campo . "='" . strtoupper($valor) . "';";
    eval($asignacion);
    //echo $asignacion;
}

$error=false;
$existeUsuario=false;

// Si el fornulario ha sido enviado -> Se valida noy hay errores en la introducción de datos y
// sin no los hay, si existe alguna usuario con el mismo login en la base de datos
if (isset($insertar) )
{

    // Comprobación de  que se han introducido todos los datos obligatorios

    if (strcmp(trim($login),"")==0)
    {
       $errores["login"] = "¡Hay que introducir el login del usuario!";
       $error = true;
    }
    else
    {
       if (strlen($login) < LONGITUD_MINIMA_LOGIN)
       {
          $errores["login"] = "¡El login del usuario tiene que tener al menos ".LONGITUD_MINIMA_LOGIN." caracteres!";
          $error = true;
       }
       else
           $errores["login"] = "";
    }

    if (strcmp(trim($password),"")==0)
    {
       $errores["password"] = "¡Hay que introducir el password del usuario!";
       $error = true;
    }
    else
    {
       if (strlen($password) < LONGITUD_MINIMA_PASSWORD)
       {
          $errores["password"] = "¡El password del usuario tiene que tener al menos ".LONGITUD_MINIMA_PASSWORD." caracteres!";
          $error = true;
       }
       else
           $errores["password"] = "";
    }


    if (strcmp(trim($nombre),"")==0)
    {
       $errores["nombre"] = "¡Hay que introducir el nombre del usuario!";
       $error = true;
    }
    else
       $errores["nombre"] = "";


    if (strcmp(trim($email),"")!=0 && comprobar_email($email)==false)
    {
       $errores["email"] = "¡Formato de email incorrecto!";
       $error = true;
    }
    else
       $errores["email"] = "";

    if ($error==false) //Si no hay errores al introducir los datos
    {
        $conexion=new ConexionBD;
        $link=$conexion->conectar_bd();

        $sql="SELECT * FROM usuarios";

        $result = mysqli_query($link,$sql) or die("Error en la sentencia SQL<br><br>".$sql."<br><br>");
        while ( $reg = mysqli_fetch_array ( $result ))
        {
            if (strcmp($reg["login"],$login)==0)
            {
                $existeUsuario=true;
                $conexion->cerrar_conexion();
            }
        }
    }


}



//Si se ha enviado el fornulario y  no existe un usuario con el mismo login se inserta el usuario en la base de datos
if ( isset($insertar) && $error==false && $existeUsuario==false)
{
        $sql="INSERT INTO usuarios(login,password,nombre,apellidos,email,tipo)  VALUES ('".strtoupper($login)."','".md5($_POST['password'])."','".$nombre."','".$apellidos."','".$email."',1)";
        $result = mysqli_query($link, $sql) or die("Error en la sentencia SQL<br><br>".$sql."<br><br>");


 ?>

     <table width="500" border="0"  align="center" cellspacing="0" cellpadding="4">
     <tr border="0">
        <td colspan="4" height="100" colspan="2" ></td>
      </tr>
      <tr border="1">
          <td colspan="4" class="formularioTitulo"> Usuario registrado correctamente</td>
      </tr>
      <tr border="1">
          <td colspan="4" class="formularioTitulo">Valídese para acceder al sisema</td>
      </tr>
      </table>

 <?php


        $conexion->cerrar_conexion();

}
else // Si no se ha enviado el fornulario o se ha enviado y existe una usuario con el mismo login
{
?>
   <form name="formulario_registro"  METHOD="post" ACTION="index.php">
   <input type="hidden" name="pagina" value="registrarUsuario.php">
   <table width="500" border="0" height="0" align="center" valign="top" cellspacing="0">
    <tr border="0">
        <td colspan="4" height="80" colspan="2" ></td>
    </tr>

    <tr border="0">
        <td class="formulario" colspan="4"> REGISTRO DE USUARIO </td>
    </tr>
<?php
  if ($existeUsuario==1)
  {
?>
     <tr border="0">
        <td class="formulario" colspan="4" ><span class="textoAviso">!YA EXISTE UN USUARIO CON ESE LOGIN ¡</span> </td>
    </tr>
<?php
  }
  else
  {
?>
    <tr border="0">
        <td class="formulario" colspan="4" height="10"  ></td>
    </tr>
<?php
  }
?>
    <tr border="0">
        <td class="formulario" >Login(*): </td>
        <td colspan="3" class="formulario"> <input type="text" name="login" size="8" maxlength="12" value="<?php echo $login; ?>" > </td>
    </tr>
<?php
    if (isset($errores["login"]) && ($errores["login"] != ""))
    {
     echo "<tr class=\"formulario\" border=\"1\">";
     echo "  <td class=\"formulario\" colspan=\"4\"><span class=\"textoAviso\">". $errores["login"]."</span></td>";
     echo "</tr>";
    }
?>
    <tr border="0">
         <td class="formulario">Password(*): </td>
         <td colspan="3" class="formulario"> <input type="password" name="password" size="10" maxlength="10"> </td>
    </tr>
<?php
    if (isset($errores["password"]) && ($errores["password"] != ""))
    {
     echo "<tr border=\"1\">";
     echo "  <td class=\"formulario\" colspan=\"4\"><span class=\"textoAviso\">".$errores["password"]."</span></td>";
     echo "</tr>";
    }
?>
    <tr border="0">
         <td class="formulario" >Nombre(*): </td>
         <td colspan="3"class="formulario" > <input type="text" name="nombre" size="10" maxlength="30" value="<?php if (isset($nombre)) echo $nombre; ?>"> </td>
    </tr>
<?php
    if (isset($errores["nombre"]) && ($errores["nombre"] != ""))
    {
     echo "<tr border=\"1\">";
     echo "  <td class=\"formulario\" colspan=\"4\"><span class=\"textoAviso\">".$errores["nombre"]."</span></td>";
     echo "</tr>";
    }
?>

    <tr border="0">
         <td class="formulario" >Apellidos: </td>
         <td class="formulario" colspan="3"> <input type="text" name="apellidos" size="30" maxlength="30" value="<?php if (isset($apellidos)) echo $apellidos; ?>"> </td>
    </tr>
    <tr border="0">
         <td class="formulario" >Email: </td>
         <td class="formulario" colspan="3"> <input type="text" name="email" size="30" maxlength="30" value="<?php if (isset($email)) echo $email; ?>"> </td>
    </tr>
<?php
    if (isset($errores["email"]) && ($errores["email"] != ""))
    {
     echo "<tr   border=\"1\">";
     echo "  <td class=\"formulario\" colspan=\"4\">".$errores["email"]."</td>";
     echo "</tr>";
    }
?>
    <tr border="0">
         <td class="formulario" colspan="4">(*) Campos obligatorios</td>
    </tr>
    <tr border="0">
        <td class="formulario" colspan="2" align="center"><input type="submit" name="insertar" value="insertar" /> </td>
        <td class="formulario" colspan="2" align="center"><input type="reset" name="borrar" value="borrar" /> </td>
    </tr>
    </table>
    </form>
<?php

}

?>








