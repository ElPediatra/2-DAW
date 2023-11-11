function buscarClave() {
    var fuente = document.getElementById("fuente").value; //Capturo la frase y la clave
    var clave = document.getElementById("clave").value;
    var posicion = fuente.indexOf(clave); //Busco si la clave está en la frase y devuelvo el restulado

    if (posicion !== -1) {
        document.getElementById("resultado").innerHTML = "La clave esta en la posicion " + posicion + ".";
    } else {
        document.getElementById("resultado").innerHTML = "Esa clave no esta en la frase.";
    }
}