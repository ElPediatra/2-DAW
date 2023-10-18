//Tabla de multiplicar del 7
const tablaMultiplicar7 = document.getElementById("tablaMultiplicar7");
  //Utilizo el bucle for para realizar y mostar la tabla del 7
  for (let i = 1; i <= 10; i++) {
    const resultado = 7 * i;
    tablaMultiplicar7.innerHTML += `<li>7 x ${i} = ${resultado}</li>`;
  }

//Tabla de sumar del 8
const tablaSumar8 = document.getElementById("tablaSumar8");
let j = 1;
//Utilizo el bucle while para realizar y mostar la tabla del 8
while (j <= 10) {
  const resultado = 8 + (j - 1) * 8;
  tablaSumar8.innerHTML += `<li>8 + ${j - 1} x 8 = ${resultado}</li>`;
  j++;
}

//Tabla de dividir del 9
const tablaDividir9 = document.getElementById("tablaDividir9");
let k = 1;
//Utilizo el bucle do-while para realizar y mostar la tabla del 7
do {
  const resultado = 9 / k;
  tablaDividir9.innerHTML += `<li>9 / ${k} = ${resultado}</li>`;
  k++;
} while (k <= 10);

//Operaciones con desplazamiento de bits, tengo que usar >> o << dependiendo de lo que quiera hacer
const resultado1 = 125 >> 3; // Desplazar 3 bits a la derecha (dividir por 8)
const resultado2 = 40 << 2;  // Desplazar 2 bits a la izquierda (multiplicar por 4)
const resultado3 = 25 >> 1;  // Desplazar 1 bit a la derecha (dividir por 2)
const resultado4 = 10 << 4;  // Desplazar 4 bits a la izquierda (multiplicar por 16)

//Muestro el resultado
document.getElementById("resultado1").innerText = `125 >> 3 = ${resultado1}`;
document.getElementById("resultado2").innerText = `40 << 2 = ${resultado2}`;
document.getElementById("resultado3").innerText = `25 >> 1 = ${resultado3}`;
document.getElementById("resultado4").innerText = `10 << 4 = ${resultado4}`;