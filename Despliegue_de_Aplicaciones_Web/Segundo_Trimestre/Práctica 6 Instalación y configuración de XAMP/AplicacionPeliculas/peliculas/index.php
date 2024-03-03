<?php
session_start();
include_once("sesiones.php");
include_once("class.ConexionBD.php");

if (isset($_REQUEST['pagina']))
	$pagina=$_REQUEST['pagina'];
else 
    $pagina="buscarPeliculas.php";

if (isset($_POST['validar']))
	$validar = $_POST['validar'];

if (isset($_POST['login']))
	$login = $_POST['login'];

if (isset($_POST['password']))
	$password = $_POST['password'];



?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="STYLESHEET" type="text/css" href="css/estilos.css">
</head>
<body>


<form name="menu" method="post" action="index.php">
       <input type="hidden" name="pagina">
</form>

<?php

//Si se ha enviado el formulario de login
if (isset($validar))
{
   $conexion=new ConexionBD;
   $link=$conexion->conectar_bd();

   $sql="SELECT * FROM usuarios WHERE login='".strtoupper($login)."' AND password='".md5($password)."'";

   $result = mysqli_query($link,$sql) or die("Error en la sentencia SQL<br><br>".$sql."<br><br>");
   //$nfilas = mysql_num_rows ($result);
   //echo "Numero filas".$nfilas;
   $reg = mysqli_fetch_array ( $result );

   //Si el usuario existe y su password es correcto -> Se configuran la sesión
   if ($reg)
   {

     iniciar_sesion($reg["tipo"], $login);


   }
   else
   {
       echo "<SCRIPT LANGUAGE=\"javascript\">";
       echo "alert(\"Usuario/Password incorrecto\");";
       //echo "location.href = \"index.php\";";
       echo "</SCRIPT>";

   }
   $conexion->cerrar_conexion();


}


//Se controla si se ha iniciado sesion ( el usuario se ha validado)
$VALIDADO=validar_sesion($login,$tipo_usuario);

?>

<div id="TODO" align="center">
<table width="950" border="0" cellspacing="0">
    <tr >
         <td  class="izquierda" width="200" valign="top">
              <table  width="200" border="0" cellspacing="0" >

<?php
              //Si no se ha iniciado sesion
              if ($VALIDADO==0)
              {
              ?>

                 <form name="formulario_login" method="post" action="index.php">
                 <tr border="0">
                   <td height="180" colspan="2" ></td>
                 </tr>
                     <td align="center">
                         <table cellspacing="0" cellpadding="4">
                                <tr border="0">
                                    <td class="formulario">Login: </td>
                                    <td class="formulario" > <input type="text" name="login" size="8" maxlength="12" > </td>
                                </tr>
                                <tr border="0">
                                    <td class="formulario">Password: </td>
                                    <td class="formulario" > <input type="password" name="password" size="8" maxlength="15"> </td>
                                </tr>
                                <tr border="0">
                                    <td colspan="2"  align="center" class="formulario" ><input type="submit" name="validar" value="Validar" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="borrar" value="Borrar" ></td>
                                </tr>
                                <tr border="1">
                                    <td width="150" colspan="2" class="Registrar" align="center"><a class="textoRegistrar"  href="#" onClick="document.menu.pagina.value='registrarUsuario.php';document.menu.submit()">Registrar usuario </a> </td>
                                </tr>
                          </table>
                       </td>
                    </tr>
                 </form>
              <?php

              }
              else //Si el usuario ha iniciado sesión
              {
              ?>
                 <tr border="0">
                   <td height="130" colspan="2" ></td>
                 </tr>
                     <td colspan="2" align="center">
                         <table cellspacing="0">
                                <tr border="0" >
                                     <td  height="50" class="Registrar" ><span class="textoUsuario">Usuario actual:</span></td>
                                     <td  height="50" class="Registrar"><span class="textoLogin"> <?php echo $login; ?></span></td>
                                </tr>
                         </table>
                    </td>
                 </tr>
                 <tr border="0">
                   <td height="50" colspan="2" ></td>
                 </tr>
                 <tr border="0">
                   <td width="200" colspan="2" height="30" class="formulario" ><a class="textoFormulario" href="#" onClick="document.menu.pagina.value='buscarPeliculas.php';document.menu.submit()">Búsqueda de películas</a> </td>
                 </tr>
              <?php
                  //Si el usuario es administrador
                   if ($tipo_usuario==0)
                   {
              ?>
                       <tr border="0">
                          <td width="200" height="30" colspan="2" class="formulario" ><a class="textoFormulario" href="#" onClick="document.menu.pagina.value='insertarPelicula.php';document.menu.submit()">Alta de películas </a></td>
                       </tr>
                       <tr border="0">
                           <td width="200" height="30" colspan="2" class="formulario"><a class="textoFormulario" href="#" onClick="document.menu.pagina.value='eliminarPeliculas.php';document.menu.submit()">Eliminar películas </a></td>
                       </tr>


              <?php
                   }
              ?>
                 <tr border="0">
                     <td width="200" height="30" class="formulario" colspan="2"><a class="textoFormulario" href="#" onClick="document.menu.pagina.value='misPuntuaciones.php';document.menu.submit()">Mis puntuaciones </a> </td>
                 </tr>

                 <tr border="0">
                     <td width="200" height="30" colspan="2" class="formulario"><a  class="textoFormulario" href="#" onClick="document.menu.pagina.value='cerrarSesion.php';document.menu.submit()">Cerrar Sesión </a> </td>
                 </tr>
              <?php

              }

              ?>


              </table>
         </td>
         <td width="750"  class="Derecha"  align="center">
            <table cellspacing="0" border="0" height="500">
                <tr height="80">
                    <td class="logo" align="center" >Películas</td>
                </tr>
                 <tr height="500">
                     <td valign="top"> <?php include($pagina); ?> </td>
                 </tr>
             </table>
        </td>
    </tr>
</table>

</div>


</body>

</html>
