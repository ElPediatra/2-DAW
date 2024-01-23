function crearNodo()
{
   //Se crea una variable para la imagen
   nodoImagen = document.getElementById("imagen");
}

function agregar()
{
   //Pido el texto para el titulo de la imagen y lo asigno a la variable title de la misma
   var descripcion = prompt("Por favor, introduce la descripción de la imagen:");
   if (descripcion != null) {
      nodoImagen.setAttribute("title", descripcion);
   }
}

function eliminar()
{
   //Borro la variable title de la imagen
   nodoImagen.removeAttribute("title");
}