document.addEventListener("DOMContentLoaded", function () {
    function fibonacci(n) {
      let fib = [0, 1];
      for (let i = 2; i < n; i++) {
        fib[i] = fib[i - 1] + fib[i - 2];
      }
      return fib;
    }

    function generarSecuencia() {
      // Obtener el número de términos desde el cuadro de entrada
      const inputN = document.getElementById("inputN");
      const n = parseInt(inputN.value);

      // Validar que n sea un número positivo
      if (isNaN(n) || n < 1) {
        alert("Ingrese un número válido y positivo.");
        return;
      }

      // Generar la secuencia de Fibonacci
      const fibSequence = fibonacci(n);

      // Mostrar la secuencia en el documento HTML
      const auxSalida = document.getElementById("salida");
      auxSalida.textContent = `Secuencia de Fibonacci (${n} términos): ${fibSequence.join(", ")}`;
    }

    // Puedes también generar la secuencia al cargar la página si lo deseas
    // generarSecuencia();
  });
