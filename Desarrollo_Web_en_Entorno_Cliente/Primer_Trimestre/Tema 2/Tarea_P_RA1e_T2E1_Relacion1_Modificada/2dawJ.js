        //Pido el número al usuario y la base en la que lo quiere
        var numero = parseInt(prompt("Escribe un número entero:"));
        var base = parseInt(prompt("Escribe la base a la que deseas convertir el número:"));

        //Función para convertir el número a la base que nos piden
        function convertirBase(numero, base) {
            return numero.toString(base);
        }

        //Realizo la conversión llamando a la función
        var resultado = convertirBase(numero, base);

        //Muestro el resultado
        document.write("<h2>Resultado: " + resultado + "</h2>");