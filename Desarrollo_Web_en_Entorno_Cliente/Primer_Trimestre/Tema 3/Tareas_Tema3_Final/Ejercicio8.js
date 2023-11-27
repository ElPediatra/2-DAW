//Creo el array "perrillos" con nombres de perros
var perrillos = ["Rocket", "Flash", "Bella", "Slugger"];
console.log(perrillos.toString());

//Creo de la cadena "ciudades" con nombres de ciudades
var ciudades = 'Manchester,London,Liverpool,Birmingham,Leeds,Carlisle';

//Divido la cadena "ciudades" por comas y asigno el resultado al array "perrillos"
perrillos = ciudades.split(',');
console.log(perrillos.toString());

//Recorro el array "perrillos"
for (var i = 0; i < perrillos.length; i++) {
  //Si el elemento actual contiene una "C" (mayúscula o minúscula)
  if (perrillos[i].toLowerCase().includes('c')) {
    //Elimino el elemento del array
    perrillos.splice(i, 1);
    //Disminuyo el contador para arreglar el cambio en la longitud del array
    i--;
  }
}
console.log(perrillos.toString());

//Añado los nombres de los perros al principio del array "perrillos"
perrillos.unshift('Rocket', 'Flash', 'Bella', 'Slugger');
console.log(perrillos.toString());

//Añado "Estepona" al principio del array "perrillos"
perrillos.unshift('Estepona');
console.log(perrillos.toString());