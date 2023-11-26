// Definición del array "perrillos" con nombres de perros
var perrillos = ["Rocket", "Flash", "Bella", "Slugger"];
console.log(perrillos.toString());

// Definición de la cadena "ciudades" con nombres de ciudades
var ciudades = 'Manchester,London,Liverpool,Birmingham,Leeds,Carlisle';

// Dividir la cadena "ciudades" por comas y asignar el resultado al array "perrillos"
perrillos = ciudades.split(',');
console.log(perrillos.toString());

// Recorrer el array "perrillos"
for (var i = 0; i < perrillos.length; i++) {
  // Si el elemento actual contiene una "C" (mayúscula o minúscula)
  if (perrillos[i].toLowerCase().includes('c')) {
    // Eliminar el elemento del array
    perrillos.splice(i, 1);
    // Decrementar el contador para compensar el cambio en la longitud del array
    i--;
  }
}
console.log(perrillos.toString());

// Agregar los nombres de los perros al principio del array "perrillos"
perrillos.unshift('Rocket', 'Flash', 'Bella', 'Slugger');
console.log(perrillos.toString());

// Agregar "Estepona" al principio del array "perrillos"
perrillos.unshift('Estepona');
console.log(perrillos.toString());