//Capturo la <ul> en el HTML
var list = document.querySelector('ul');

//Limpio la <ul>
list.innerHTML = "";

//Creo un array de equipos con su código y nombre separados por un punto y coma
var equipos = ['MAN675847583748sjt567654;Manchester United', 'RMD576746573fhdg4737dh4;Real Madrid', 'LIV5hg65hd737456236dch46dg4;Liverpool FC', 'SEV4f65hf75f736463;Sevilla FC', 'BAR5767ghtyfyr4536dh45dg45dg3;Barcelona FC'];

//Recorro el array de equipos
for (var i = 0; i < equipos.length; i++) {
  //Capturo el equipo actual del array
  var input = equipos[i];

  //Separo el código y el nombre del equipo usando el punto y coma como separador
  //El nombre del equipo es el segundo elemento del array (índice 1)
  var result = input.split(';')[1];

  //Crear un nuevo elemento <li>
  var listItem = document.createElement('li');

  //Creo el texto del elemento <li> como el nombre del equipo
  listItem.textContent = result;

  //Añadir la <li> a la lista <ul>
  list.appendChild(listItem);
}