function restarNumeros() {
    var num1 = parseFloat(document.getElementById("numero1").value);
    var num2 = parseFloat(document.getElementById("numero2").value);
    if (!isNaN(num1) && !isNaN(num2)) { //Valido si son números válidos
        var resultado = num1 - num2;
        document.getElementById("resultado").textContent = "La resta es: " + resultado;
    } else {
        document.getElementById("resultado").textContent = "Por favor, escribe números válidos.";
    }
}