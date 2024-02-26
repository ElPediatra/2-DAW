<?PHP

// -----------------------------------------------------------------
// Biblioteca de variables y funciones para el manejo de fechas
// -----------------------------------------------------------------

// -----------------------------------------------------------------
// Tabla de meses
// -----------------------------------------------------------------
   $meses = array ("enero", "febrero", "marzo", "abril",
                   "mayo", "junio", "julio", "agosto",
                   "septiembre", "octubre", "noviembre", "diciembre");

// -----------------------------------------------------------------
// Convertir fecha a cadena
// -----------------------------------------------------------------
function date2string ($date)
{
   // Formato: d�a del mes (n�mero, sin ceros) /
   //          mes del a�o (n�mero, sin ceros) /
   //          a�o (cuatro d�gitos)
   // Ejemplo: 7/11/2002
   $string = date ("j/n/Y", strtotime($date));
   return ($string);
}

// -----------------------------------------------------------------
// Convertir (dia, mes, a�o) en fecha
// -----------------------------------------------------------------
function dmy2date ($dia, $mes, $anyo)
{
   $meses = array ("enero", "febrero", "marzo", "abril", "mayo",
                   "junio", "julio", "agosto", "septiembre",
                   "octubre", "noviembre", "diciembre");
   $i=0;
   $enc=0;
   while ($i<12 && !$enc)
   {
      if ($meses[$i] == $mes)
         $enc = 1;
      else
         $i++;
   }
   $fecha = date ("Y-m-d", mktime (0, 0, 0, $i+1, $dia, $anyo));
   return ($fecha);
}

// -----------------------------------------------------------------
// Obtener el d�a del mes de una fecha
// -----------------------------------------------------------------
function dayofdate ($date)
{
   $dia = date ("j", strtotime($date));
   return ($dia);
}

// -----------------------------------------------------------------
// Obtener el mes del a�o de una fecha
// -----------------------------------------------------------------
function monthofdate ($date)
{
   $mes = date ("n", strtotime($date));
   return ($mes);
}

// -----------------------------------------------------------------
// Obtener el a�o de una fecha
// -----------------------------------------------------------------
function yearofdate ($date)
{
   $anyo = date ("Y", strtotime($date));
   return ($anyo);
}

// -----------------------------------------------------------------
// Obtener la fecha de hoy
// -----------------------------------------------------------------
function today ()
{
   $todayDate = date("Y-m-d");
   return ($todayDate);
}

// -----------------------------------------------------------------
// Obtener el n�mero de d�as de un mes dado de un a�o dado
// -----------------------------------------------------------------
function daysofMonth ($month, $year)
{
   $ndays = date ("t", mktime (0, 0, 0, 1, $month, $year));
   return ($ndays);
}

?>