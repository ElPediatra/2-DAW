// Función para crear cookies
function crearCookies() {
    // Crear las cookies
    document.cookie = "miCookie1=Contenido de la primera cookie";
    document.cookie = "miCookie2=Contenido de la segunda cookie";
  
    // Mostrar las cookies creadas
    mostrarCookies();
  }
  
  // Función para mostrar las cookies
  function mostrarCookies() {
    // Obtener el elemento de la lista de cookies
    var cookieList = document.getElementById("cookieList");
  
    // Limpiar la lista de cookies
    cookieList.innerHTML = "";
  
    // Obtener todas las cookies
    var cookies = document.cookie.split(";");
  
    // Recorrer las cookies
    for (var i = 0; i < cookies.length; i++) {
      // Obtener la cookie actual
      var cookie = cookies[i].trim();
  
      // Dividir la cookie en el nombre y el contenido
      var nombre = cookie.split("=")[0];
      var contenido = cookie.split("=")[1];
  
      // Crear un nuevo elemento de lista
      var listItem = document.createElement("li");
  
      // Establecer el texto del elemento de lista como el nombre y el contenido de la cookie
      listItem.textContent = nombre + ": " + contenido;
  
      // Agregar el elemento de lista a la lista de cookies
      cookieList.appendChild(listItem);
    }
  }