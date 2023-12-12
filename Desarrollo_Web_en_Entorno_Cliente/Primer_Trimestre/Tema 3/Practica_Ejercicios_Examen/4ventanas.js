var ventana;
var ventana1;
var ventana2;
var ventana3;
var opcion1;
var opcion2;
var vector = new Array();
var vectorAleatorio = new Array();
var vectorPar = new Array();
var vectorImpar = new Array();
var suma = 0;

function ventana1() {
    ventana = window.open("", "Ventana1", "width=150,height=150");

    opcion1 = document.getElementById("seleccion").value;
    opcion2 = document.getElementById("seleccion1").value;

    for (var i = 0; i < opcion1; i++) {
        vector[i] = i + 1;
    }

    for (var i = 0; i < vector.length; i++) {
        ventana.document.write(vector[i] + "\t");
    }

    for (var i = 0; i < opcion2; i++) {
        vectorAleatorio[i] = Math.round(Math.random() * (opcion1 - 1) + 1);
    }

    ventana.document.write("<br><br>Numeros aleatorios---><br><br>");

    for (var i = 0; i < vectorAleatorio.length; i++) {
        ventana.document.write(vectorAleatorio[i]+"\t");
    }

    ventana.document.bgColor = "yellow";
}

function ventana2(){
    ventana1 = window.open("", "Ventana2", "height=150,width=150");
    ventana1.document.write("Numeros aleatorios---><br><br>");
    for (var i = 0; i < vectorAleatorio.length; i++) {
        ventana1.document.write(vectorAleatorio[i]+"\t");
    }
    ventana1.document.write("<br><br>");
    vectorAleatorio.sort(function(a,b){return a-b});
    ventana1.document.write("Esta es la lista de números entre el menor y el mayor---><br>");
    var menor = vectorAleatorio[0];
    var mayor = vectorAleatorio[vectorAleatorio.length-1];
    for (var i = menor; i <= mayor; i++) {
        ventana1.document.write(i+"\t");
    }
    ventana1.moveTo(screen.availWidth - 150, 0);
    ventana1.document.bgColor = "green";
}

function ventana3(){
    ventana2 = window.open("", "Ventana3", "width=150,height=150");
    var contador = 0;
    for (var i = 0; i < vectorAleatorio.length; i++) {
        if (vectorAleatorio[i] % 2 != 0) {
            vectorImpar[contador] = vectorAleatorio[i];
            contador++;
        }
    }
    
    vectorImpar.sort(function(a,b){return a-b});
    ventana2.document.write("Numeros impares ordenados de menor a mayor<br><br>");
    for (var i = 0; i < vectorImpar.length; i++) {
        ventana2.document.write(vectorImpar[i]+"\t");
    }
    ventana2.moveTo(screen.availWidth-150, screen.availHeight - 150);
    ventana2.document.bgColor = "blue";
}

function ventana4(){
    ventana3 = window.open("", "Ventana4", "width=150,height=150");
    var contador = 0;
    for (var i = 0; i < vector.length; i++) {
        if (vectorAleatorio[i] % 2 == 0) {
            vectorPar[contador] = vectorAleatorio[i];
            contador++;
        }
    }
    ventana3.document.write("Valores pares: ");
    for (var i = 0; i < vectorPar.length; i++) {
        ventana3.document.write(vectorPar[i]+"\t");
    }
    ventana3.document.write("<br><br>");
    ventana3.document.write("Valores aritmeticos---><br>");
    for (var i = 0; i < vectorPar.length; i++) {
        ventana3.document.write(vectorPar[i]+"\t");
    }
    ventana3.document.write("<br><br>Media aritmética de los numeros pares es---><br>");
    var cantidad = 0;
    for (var i = 0; i < vectorPar.length; i++) {
        cantidad++;
        suma = suma + vectorPar[i];
    }
    var media = suma / cantidad;

    ventana3.document.write(media);
    ventana3.moveTo(0, screen.availHeight-150);
    ventana3.document.bgColor = "red";
}