        //Pedimos el número al usuario y lo convierto a decimal
        var numeroOctal = prompt("Escribe un número en base octal:");
        var numeroDecimal = parseInt(numeroOctal, 8);

        //Convierto el número de decimal a binario
        var numeroBinario = numeroDecimal.toString(2);

        //Muestro el resultado en mi página
        document.write("<h1>Tu número en Octal es: " + numeroOctal + "</h1>");
        document.write("<h2>Número en decimal: " + numeroDecimal + "</h2>");
        document.write("<h2>Número en binario: " + numeroBinario + "</h2>");