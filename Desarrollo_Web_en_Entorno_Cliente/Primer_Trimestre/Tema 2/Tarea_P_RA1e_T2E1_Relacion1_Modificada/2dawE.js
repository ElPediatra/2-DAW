 /* 2DAWE.HTM (Cierro esta etiqueta para que no se marque el código como texto) */
 var a, b;
 a = prompt("Escribe la base:");
 b = prompt("Escribe la altura:");

 // Se usa parseFloat() para convertir el texto en números decimales
 a = parseFloat(a);
 b = parseFloat(b);

 //Añado una verificación para ver si el número es válido
 if (!isNaN(a) && !isNaN(b)) {
     var area = (a * b) / 2;
     alert("Área = " + area);
 } else {
     alert("El número no es válido.");
 }