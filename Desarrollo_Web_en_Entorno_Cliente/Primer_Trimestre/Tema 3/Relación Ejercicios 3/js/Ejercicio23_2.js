var nombres = [];

function agregarNombre() {
    var nombre = document.getElementById("nombre").value; //Capturo la string (nombre) que pone el usuario
    if (nombre === "fin" || nombre === "Fin" || nombre === "FIN") { //Compruebo si ha escrito fin (de las 3 maneras que pide el ejercicio), de ser así 
        document.getElementById("resultado").innerHTML = "He agregado " + nombres.length + " nombres.";
    } else { //Si no ha escrito Fin, meto el nombre que ha escrito al array
        nombres.push(nombre);
        document.getElementById("nombre").value = "";
    }
}