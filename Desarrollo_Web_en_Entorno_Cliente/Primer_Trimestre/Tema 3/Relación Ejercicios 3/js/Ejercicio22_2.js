function calcularRaiz() {
    var numero = document.getElementById("numero").value; //Capturo el número del usuario
    var resultado = Math.sqrt(numero); //Utilizo Math.sqrt para calcular la raíz cuadrada y muestro el resultado
    document.getElementById("resultado").innerHTML = "La raiz cuadrada de " + numero + " es " + resultado + ".";
}
