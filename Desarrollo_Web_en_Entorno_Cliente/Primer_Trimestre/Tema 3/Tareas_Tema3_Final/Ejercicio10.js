//Creo una función para crear cookies
function crearCookies() {
    //Creo las cookies
    document.cookie = "miCookie1=Contenido de la primera cookie";
    document.cookie = "miCookie2=Contenido de la segunda cookie";
  
    //Muestro las cookies creadas
    mostrarCookies();
  }
  
  //Función para mostrar las cookies
  function mostrarCookies() {
    //Capturo el elemento de la lista de cookies
    var cookieList = document.getElementById("cookieList");
  
    //Limpio la lista de cookies
    cookieList.innerHTML = "";
  
    //Capturo todas las cookies
    var cookies = document.cookie.split(";");
  
    //Recorro las cookies
    for (var i = 0; i < cookies.length; i++) {
      //Capturo la cookie actual
      var cookie = cookies[i].trim();
  
      //Divido la cookie en el nombre y el contenido
      var nombre = cookie.split("=")[0];
      var contenido = cookie.split("=")[1];
  
      //Creo un nuevo elemento li en la lista
      var listItem = document.createElement("li");
  
      //Creo el texto de la lista como el nombre y el contenido de la cookie
      listItem.textContent = nombre + ": " + contenido;
  
      //Añado el elemento a la lista de cookies
      cookieList.appendChild(listItem);
    }
  }