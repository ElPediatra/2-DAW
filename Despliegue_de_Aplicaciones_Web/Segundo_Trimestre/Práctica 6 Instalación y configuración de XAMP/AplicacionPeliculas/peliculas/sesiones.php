<?php

include_once("configuracion.php");

function iniciar_sesion($tipo_usuario, $login)
{
      //session_start();
      $_SESSION['usuario'] = strtoupper($login);
      $_SESSION['tipo_usuario'] = $tipo_usuario;

}

function validar_sesion(&$login,&$tipo_usuario)
{
  $VALIDADO=0;

  if (isset($_SESSION['usuario']))
  {
    $login=$_SESSION['usuario'];
    $tipo_usuario=$_SESSION['tipo_usuario'];
    $VALIDADO=1;
  }
  else
  {
        $VALIDADO=0;
  }
  return $VALIDADO;
}

function cerrar_sesion()
{
  //session_start();

  if (isset($_SESSION['usuario'])){
       unset ($_SESSION['usuario']);
       unset ($_SESSION['tipo_usuario']);
       session_destroy();
  }
}


?>
