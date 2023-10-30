function dividirNumeros() {
    var num1 = parseFloat(document.getElementById("numero1").value);
    var num2 = parseFloat(document.getElementById("numero2").value);

    if (!isNaN(num1) && !isNaN(num2)) {
        if (num2 !== 0) {
            var resultado = num1 / num2;
            document.getElementById("resultado").textContent = "El resultado de la división es: " + resultado;
        } else {
            document.getElementById("resultado").textContent = "No se puede dividir por 0. Introduce un divisor diferente.";
        }
    } else {
        document.getElementById("resultado").textContent = "Por favor, introduce números válidos.";
    }
}