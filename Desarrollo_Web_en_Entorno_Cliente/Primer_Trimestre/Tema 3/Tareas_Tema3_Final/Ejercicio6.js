//Obtener la referencia al elemento <ul>
var list = document.querySelector('ul');

//Limpiar el contenido del elemento <ul>
list.innerHTML = "";

//Definir un array de equipos con su código y nombre separados por un punto y coma
var equipos = ['MAN675847583748sjt567654;Manchester United', 'RMD576746573fhdg4737dh4;Real Madrid', 'LIV5hg65hd737456236dch46dg4;Liverpool FC', 'SEV4f65hf75f736463;Sevilla FC', 'BAR5767ghtyfyr4536dh45dg45dg3;Barcelona FC'];

//Recorrer el array de equipos
for (var i = 0; i < equipos.length; i++) {
  //Obtener el equipo actual del array
  var input = equipos[i];

  //Separar el código y el nombre del equipo usando el punto y coma como separador
  //El nombre del equipo es el segundo elemento del array resultante (índice 1)
  var result = input.split(';')[1];

  //Crear un nuevo elemento <li>
  var listItem = document.createElement('li');

  //Establecer el texto del elemento <li> como el nombre del equipo
  listItem.textContent = result;

  //Añadir el elemento <li> a la lista <ul>
  list.appendChild(listItem);
}