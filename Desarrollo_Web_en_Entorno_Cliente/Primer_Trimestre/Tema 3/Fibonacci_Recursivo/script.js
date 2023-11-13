function fibonacciRecursivo(n) {
  if (n <= 1) { //Ejecuto la función recursiva hasta "n" veces, las que pida el usuario
    return n;
  } else {
    return fibonacciRecursivo(n - 1) + fibonacciRecursivo(n - 2);
  }
}

function generarSecuencia() {
  var cantidad = document.getElementById("cantidad").value; //Capturo la cantidad de veces que quiere el usuario

  if (cantidad !== "") { //Compruebo que no esté vacía
    cantidad = parseInt(cantidad);

    if (isNaN(cantidad) || cantidad <= 0 || cantidad >40 ) { //Compruebo si es un número y está entre 0 y 40
      alert("Por favor, escribe un número entero positivo que no sea mayor de 40.");
      return;
    }

    //Contador para la recursiva
    var secuencia = "Secuencia de Fibonacci: ";
    for (var i = 0; i < cantidad; i++) {
      secuencia += fibonacciRecursivo(i) + ", ";
    }

    //Devuelto texto de los valores
    secuencia = secuencia.slice(0, -2); // Elimino la última coma el espacio del texto
    document.getElementById("resultado").innerText = secuencia;
  } else {
    alert("Por favor, escribe un número entero positivo."); //Devuelvo mensaje de error
  }
}