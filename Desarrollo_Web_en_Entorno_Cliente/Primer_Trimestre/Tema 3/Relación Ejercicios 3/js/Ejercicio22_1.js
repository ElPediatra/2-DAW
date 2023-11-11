function calcularPotencia() {
    var numero = document.getElementById("numero").value; //Capturo el número que me indica el usuario
    var resultado = Math.pow(numero, 3); //Uso Math.pow para calcular su potencia de 3 y muestro el resultado
    document.getElementById("resultado").innerHTML = "El resultado de " + numero + " elevado a la tercera potencia es " + resultado + ".";
}
