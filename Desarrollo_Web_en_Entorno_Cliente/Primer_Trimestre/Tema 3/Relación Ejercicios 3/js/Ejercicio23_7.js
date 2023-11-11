function separarFrase() {
    var frase = document.getElementById("frase").value; //Capturo la frase
    var palabras = frase.split(" "); //La separo por los espacios y la meto en un array
    var resultado = "";

    for (var i = 0; i < palabras.length; i++) { //Recorro el array y voy montando el resultado con una frase por línea
        resultado += palabras[i] + "<br>";
    }

    //Muestro el resultado
    document.getElementById("resultado").innerHTML = resultado;
}
