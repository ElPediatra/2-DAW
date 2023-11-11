function palindromo() {
    var texto = document.getElementById("texto").value; //Capturo la frase
    var textoSinEspacios = texto.replace(/ /g, "").toLowerCase(); //Eliminio los espacios en blanco y lo paso a minúsculas
    var textoReverso = textoSinEspacios.split("").reverse().join(""); //Le doy la vuelta

    if (textoSinEspacios === textoReverso) { //Comparo y mando un restulado
        document.getElementById("resultado").innerHTML = "El texto '" + texto + "' es palindromo.";
    } else {
        document.getElementById("resultado").innerHTML = "El texto '" + texto + "' no es palindromo.";
    }
}
