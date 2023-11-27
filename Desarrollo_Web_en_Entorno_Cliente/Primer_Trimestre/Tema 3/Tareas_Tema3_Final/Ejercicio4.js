//Capturo la <ul> del HTML
var list = document.getElementById('mensajeLista');

//Defino un array de saludos
var saludos = ['Feliz cumpleaños!', 'Feliz navidades a todos', 'Te deseo una feliz navidad', 'En navidades nos vamos de fiesta', 'Pasa un buen fin de semana'];

//Recorro el array de saludos
for (var i = 0; i < saludos.length; i++) {
  //Capturo el saludo actual del array
  var input = saludos[i];

  //Compruebo si el saludo contiene la palabra "Navidad"
  if (input.indexOf('navidad') !== -1) {
    //Si contiene la palabra "Navidad", agrego el saludo a la lista
    var result = input;
    var listItem = document.createElement('li');
    listItem.textContent = result;
    list.appendChild(listItem);
  }
}