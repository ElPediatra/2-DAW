function fibonacciRecursivo(n) {
  if (n <= 1) {
    return n;
  } else {
    return fibonacciRecursivo(n - 1) + fibonacciRecursivo(n - 2);
  }
}

function generarSecuencia() {
  var cantidad = document.getElementById("cantidad").value;

  if (cantidad !== "") {
    cantidad = parseInt(cantidad);

    if (isNaN(cantidad) || cantidad <= 0 || cantidad >=41 ) {
      alert("Por favor, escribe un número entero positivo que no sea mayor de 40.");
      return;
    }

    var secuencia = "Secuencia de Fibonacci: ";
    for (var i = 0; i < cantidad; i++) {
      secuencia += fibonacciRecursivo(i) + ", ";
    }

    secuencia = secuencia.slice(0, -2); // Eliminar la última coma y espacio
    document.getElementById("resultado").innerText = secuencia;
  } else {
    alert("Por favor, escribe un número entero positivo.");
  }
}