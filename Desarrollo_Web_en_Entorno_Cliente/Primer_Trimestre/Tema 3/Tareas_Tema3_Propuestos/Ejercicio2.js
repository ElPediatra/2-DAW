function Coche(modelo, color, kms, combustible) {
    this.modelo = modelo;
    this.color = color;
    this.kms = kms;
    this.combustible = combustible;
}

var miCoche = new Coche("Mercedes E330", "negro", 120000, "diésel");
var tuCoche = new Coche("BMW 318", "blanco", 210000, "gasolina");

// Intenta borrar un atributo que no existe
console.log("Antes de borrar:", miCoche);
delete miCoche.matricula; // Intenta borrar un atributo incorrecto
console.log("Después de intentar borrar:", miCoche);

// Intenta borrar un atributo existente
console.log("Antes de borrar:", tuCoche);
delete tuCoche.kms; // Borra el atributo "kms"
console.log("Después de borrar:", tuCoche);