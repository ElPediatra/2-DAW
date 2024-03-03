<?php

include_once("sesiones.php");

//Se controla si se ha iniciado sesion ( el usuario se ha validado)
$VALIDADO=validar_sesion($login,$tipo_usuario);

if ($VALIDADO==1)
{

?>

<form name="formulario_busqueda" METHOD="post" ACTION="index.php">
<input type="hidden" name="pagina" value="mostrarPeliculas.php">
<table width="500" border="0"  align="center" cellspacing="0" cellpadding="4">
    <tr border="0">
        <td colspan="4" height="60" colspan="2" ></td>
    </tr>
   <tr border="0">
       <td class="formularioTitulo" colspan="4"> BÚSQUEDA DE PELÍCULAS </td>
   </tr>
   <tr border="0">
       <td class="formulario" height="20" colspan="4">  </td>
   </tr>
  <tr border="0">
      <td class="formulario">Nombre: </td>
      <td class="formulario" colspan="3"> <input type="text" name="nombre" size="50" maxlength="100"> </td>
  </tr>
  <tr border="0">
      <td class="formulario">Género: </td>
      <td class="formulario">
        <select name="genero" size="1" >
         <option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
         <option value="Aventuras">Aventuras</option>
         <option value="Terror">Terror</option>
         <option value="Comedia">Comedia</option>
         <option value="Accion">Acción</option>
         <option value="Belica">Bélica</option>
         <option value="Drama">Drama</option>
         <option value="Suspense">Suspense</option>
         <option value="C.Ficcion">C. Ficción</option>
        </select>
      </td>
      <td class="formulario">Todos los públicos:</td>
     <td class="formulario"> SI <input type="radio" name="publico" value="1" > NO <input type="radio" name="publico" value="0" ></td>
   </tr>
   <tr border="0">
    <td class="formulario">Director: </td>
    <td class="formulario" colspan="3"> <input type="text" name="director" size="50" maxlength="100"> </td>
  </tr>
  <tr border="0">
    <td class="formulario"> Puntuación:</td>
    <td class="formulario">
         <select name="puntuacion" size="1" >
          <option value="">Todas</option>
          <option value="1">&gt1</option>
          <option value="2">&gt2</option>
          <option value="3">&gt3</option>
          <option value="4">&gt4</option>
          <option value="5">&gt5</option>
          <option value="6">&gt6</option>
          <option value="7">&gt7</option>
          <option value="8">&gt8</option>
          <option value="9">&gt9</option>
         </select>
     </td>
     <td class="formulario">Estreno:</td>
     <td class="formulario"> SI <input type="radio" name="estreno" value="1" > NO <input type="radio" name="estreno" value="0" ></td>
  </tr>
  <tr border="0">
    <td class="formulario" colspan="2" align="center"><input type="submit" name="Buscar" value="Buscar" /> </td>
    <td class="formulario" colspan="2" align="center"><input type="reset" name="Borrar" value="Borrar" /> </td>
  </tr>
</table>
 </form>



 <?php
}
else   //El usuario no ha inicado sesion
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
