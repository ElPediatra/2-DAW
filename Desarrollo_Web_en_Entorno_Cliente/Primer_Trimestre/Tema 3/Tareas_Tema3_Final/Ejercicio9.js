//El Array con elementos en el formato "CP; Ciudad"
var elementos = ["28924; Estepona", "28001; Madrid", "08001; Barcelona", "41001; Sevilla", "46001; Valencia"];

//Creo una función para buscar coincidencias en el array de elementos
function buscar() {
  //Capturo el texto de búsqueda del usuario
  var textoBusqueda = document.getElementById("searchText").value.toLowerCase();

  //Busco coincidencias en el array de elementos
  var resultados = elementos.filter(function(elemento) {
    //Divido cada elemento en el código postal y el nombre de la ciudad
    var partes = elemento.split("; ");
    var cp = partes[0];
    var ciudad = partes[1].toLowerCase();

    //Compruebo si el código postal o el nombre de la ciudad incluyen el texto de búsqueda
    return cp.includes(textoBusqueda) || ciudad.includes(textoBusqueda);
  });

  //Muestro los resultados
  var resultadoHTML = "";
  if (resultados.length > 0) {
    //Si hay resultados, los uno en una cadena separada por saltos de línea
    resultadoHTML = resultados.join("<br>");
  } else {
    //Si no hay resultados, muestro este mensaje
    resultadoHTML = "No se encontraron resultados.";
  }
  document.getElementById("result").innerHTML = resultadoHTML;
}