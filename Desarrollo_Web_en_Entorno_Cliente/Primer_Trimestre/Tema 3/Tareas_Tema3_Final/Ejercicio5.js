//Obtener la referencia al elemento <ul> en el DOM
var list = document.querySelector('ul');

//Definir un array de saludos
var saludos = ['Feliz cumpleaños!', 'Feliz navidades a todos', 'Te deseo una feliz navidad', 'En Navidades nos vamos de fiesta', 'Pasa un buen fin de semana'];

//Recorrer el array de saludos
for (var i = 0; i < saludos.length; i++) {
  //Obtener el saludo actual del array
  var input = saludos[i];

  //Verificar si el saludo contiene la palabra "Navidad" y no contiene la palabra "fiesta"
  if (input.indexOf('Navidad') !== -1 && input.indexOf('fiesta') === -1) {
    //Si cumple la condición, agregar el saludo a la lista
    var result = input;
    var listItem = document.createElement('li');
    listItem.textContent = result;
    list.appendChild(listItem);
  }
}