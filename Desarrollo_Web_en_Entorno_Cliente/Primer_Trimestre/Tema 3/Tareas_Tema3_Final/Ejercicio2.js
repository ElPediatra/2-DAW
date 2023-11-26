function Coche(modelo, color, kms, combustible) {
    this.modelo = modelo;
    this.color = color;
    this.kms = kms;
    this.combustible = combustible;
}

var miCoche = new Coche("Mercedes E330", "negro", 120000, "diésel");
var tuCoche = new Coche("BMW 318", "blanco", 210000, "gasolina");

//El atributo matrícula no existe, por lo que no borrará nada del objeto
console.log("Antes de borrar:", miCoche);
delete miCoche.matricula;
console.log("Después de intentar borrar:", miCoche);