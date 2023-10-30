function calcularProducto() {
    //Le pido los números al usuario y confirmo si son válidos o no
    var num1 = parseInt(prompt("Escribe el primer número positivo menor de 57:"));
    var num2 = parseInt(prompt("Escribe el segundo número positivo menor de 57:"));

    if (isNaN(num1) || isNaN(num2) || num1 <= 0 || num2 <= 0 || num1 >= 57 || num2 >= 57) {
        alert("Revisalo, los dos números tienen que ser positivos y menores de 57.");
    } else { //En caso de posicito sacamos su producto y lo mostramos
        var resultado = num1 * num2;
        alert("El producto de " + num1 + " y " + num2 + " es: " + resultado);
    }

    //Creo una variable para reiniciar la función en caso de que el usuario lo quiera (recur)
    var reiniciar = confirm("¿Quieres volver a empezar?"); //Utilizo confirmar para validar la variable (si o no booleano)
    if (reiniciar) {
        calcularProducto();
    }
}

//Llamamos al método
calcularProducto();