function compararTriangulos() {

    //Contadores de tipos de triangulos, lo paso a Int para poder añadir contadores y comparar después
    var equilatero = parseInt(0); //3 lados iguales
    var isosceles = parseInt(0); //2 lados iguales
    var escaleno = parseInt(0); //0 lados iguales

    //Capturo los datos de los imputs y los paso a número (Int), pongo como nombre su abreviación (triangulo1lado1 = t1l1)

    //Variables triangulo1
    var t1l1 = parseInt(document.getElementById('triangulo1lado1').value);
    var t1l2 = parseInt(document.getElementById('triangulo1lado2').value);
    var t1l3 = parseInt(document.getElementById('triangulo1lado3').value);

    //Variables triangulo2
    var t2l1 = parseInt(document.getElementById('triangulo2lado1').value);
    var t2l2 = parseInt(document.getElementById('triangulo2lado2').value);
    var t2l3 = parseInt(document.getElementById('triangulo2lado3').value);

    //Variables triangulo3
    var t3l1 = parseInt(document.getElementById('triangulo3lado1').value);
    var t3l2 = parseInt(document.getElementById('triangulo3lado2').value);
    var t3l3 = parseInt(document.getElementById('triangulo3lado3').value);

    //Variables triangulo3
    var t4l1 = parseInt(document.getElementById('triangulo4lado1').value);
    var t4l2 = parseInt(document.getElementById('triangulo4lado2').value);
    var t4l3 = parseInt(document.getElementById('triangulo4lado3').value);

    //Comparo los lados para ver si son iguales y añado contador al tipo de triángulo que sea
    //Comparo Triangulo1
    if (t1l1 == t1l2) {
        if (t1l1 == t1l3) {
            equilatero+=1;
        } else {
            isosceles+=1;
        }
    } else if (t1l2 == t1l3) {
        isosceles+=1;
    } else {
        escaleno+=1;
    }

    //Comparo Triangulo2
    if (t2l1 == t2l2) {
        if (t2l1 == t2l3) {
            equilatero+=1;
        } else {
            isosceles+=1;
        }
    } else if (t2l2 == t2l3) {
        isosceles+=1;
    } else {
        escaleno+=1;
    }

    //Comparo Triangulo3
    if (t3l1 == t3l2) {
        if (t3l1 == t3l3) {
            equilatero+=1;
        } else {
            isosceles+=1;
        }
    } else if (t3l2 == t3l3) {
        isosceles+=1;
    } else {
        escaleno+=1;
    }

    //Comparo Triangulo3
    if (t4l1 == t4l2) {
        if (t4l1 == t4l3) {
            equilatero+=1;
        } else {
            isosceles+=1;
        }
    } else if (t4l2 == t4l3) {
        isosceles+=1;
    } else {
        escaleno+=1;
    }

    //Muestro el resultado total de los triángulos (cantidad total de cada uno)
    document.getElementById('resultado').innerText = 'Hay:'+equilatero+'Triangulos Equilateros. '+isosceles+'Triangulos Isosceles. '+escaleno+'Triangulos escalenos';

    //Comparo la cantidad que hay de cada tipo de triángulo para ver cual es menor
    if (equilatero < isosceles) {
        if (equilatero < escaleno) {
            document.getElementById('resultado2').innerText = 'El triangulo del que menos cantidad hay es el Equilatero';
        }
    } else if (isosceles < escaleno) {
        document.getElementById('resultado2').innerText = 'El triangulo del que menos cantidad hay es el Isosceles';
    } else {
        document.getElementById('resultado2').innerText = 'El triangulo del que menos cantidad hay es el Escaleno';
    }
}