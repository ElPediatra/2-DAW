//Añadimos var a s/celsius y farenheit para activar las variables
var s = "";

//Itero el bucle desde -2 
function ejercicioK(){
for (var i = -2; i <= 12; i++) { //Corrijo las separaciones del bucle for, se había puesto ":" en vez de ";"
    var celsius = 10 * i;
    var farenheit = 32 + (celsius * 9) / 5;

    s = s + "C= " + celsius + " F= " + farenheit + "\n";

    //Confirmo si estamos en el punto de congelación o no
    if (celsius == 0) {
        s = s + "Punto de congelación del Agua\n";
    }
    if (celsius == 100) {
        s = s + "Punto de ebullición del Agua\n";
    }
}

alert(s); //Cierro el alert con ) ya que no se había cerrado
}

ejercicioK()