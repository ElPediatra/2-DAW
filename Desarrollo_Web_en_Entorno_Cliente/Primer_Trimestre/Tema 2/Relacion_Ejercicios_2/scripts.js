//Ejercicio 5.1
function calcularPerimetro() {
    //Consigo el valor del lado por el input del html
    const lado = parseFloat(document.getElementById("lado").value);

    //Calculo el perímetro
    const perimetro = 4 * lado;

    //Muestro el resultado por el id fijado
    document.getElementById("resultado").textContent = perimetro;
}

//Ejercicio 5.2
document.getElementById("calcularButton").addEventListener("click", function() {
    //Consigo los numeros que da el usuario
    const num1 = parseFloat(document.getElementById("num1").value);
    const num2 = parseFloat(document.getElementById("num2").value);
    const num3 = parseFloat(document.getElementById("num3").value);
    const num4 = parseFloat(document.getElementById("num4").value);

    //Calculo la suma de los 2 primerso
    const suma = num1 + num2;

    //Calculo el producto de los 2 ultimos
    const producto = num3 * num4;

    //Muestro el resultado por los ids correspondientes
    document.getElementById("sumaResultado").textContent = suma;
    document.getElementById("productoResultado").textContent = producto;
});