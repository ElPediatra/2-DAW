//Variables para las ventanas
var ventana1;
var ventana2;
var ventana3;
var ventana4;

//Variables desplegables array
var opcion1;
var opcion2;

//Variables (arrays) para los números
var arrayAleatorio = [];
var arrayOrdenado = [];
var arrayImpares = [];

//Variable objeto usuario y Cookie de Fecha
var fechaHora;
var usuario = {
    nombre: 'alumno',
    contrasena: 'bueno',
    autenticar: function(nombre, contrasena) {
        return this.nombre === nombre && this.contrasena === contrasena;
    },
    cambiarContrasena: function(nuevaContrasena) {
        this.contrasena = nuevaContrasena;
    }
};

/* Abrir Ventana1 */
function ventana1Abrir() {
    //Creo la ventana y sus parametros
    var parametros1 = "width=300, height=300, left=0, top=0 resizable=no, menubar=no, toolbar=no, directories=no, location=no, scrollbars=no, status=no";
    ventana1 = window.open("", "ventana1", parametros1);

    //Pego el formulario ya que mi ventana no está pre-creada, por lo tengo tengo que "escribirlo" al crear la ventana
    ventana1.document.write('<form id="formulario">Usuario: <input type="text" id="nombre"><br>Contraseña: <input type="password" id="contrasena"><br>Nueva Contraseña: <input type="password" id="nuevaContrasena"><br><input type="submit" value="Enviar"></form>');

    //Capturo los datos del formulario creado
    ventana1.document.getElementById('formulario').onsubmit = function(datos) {
        datos.preventDefault();
        var nombre = ventana1.document.getElementById('nombre').value;
        var contrasena = ventana1.document.getElementById('contrasena').value;
        var nuevaContrasena = ventana1.document.getElementById('nuevaContrasena').value;

        //Comparo si la contraseña es válida y doy opción a cambiarla
        if (usuario.autenticar(nombre, contrasena)) {
            ventana1.document.write('<br><p>Datos correctos, ¿Deseas cambiar la contraseña?</p>');
            usuario.cambiarContrasena(nuevaContrasena);
            fechaHora = new Date();
        } else { //Mando mensaje de error, contraseña no válida
            ventana1.document.write('<br><p>Datos incorrectos ¿Quieres intentarlo de nuevo?</p>');
        }
    };

    //Asigno el color de fondo a la ventana
    ventana1.document.bgColor = "lightgreen";
}

/* Cerrar Ventana1 */
function ventana1Cerrar() {
    ventana1.window.close();
}

/* Abrir Ventana2 */
function ventana2Abrir(){
    //Creo la ventana y sus parametros
    var parametros2 = "width=300, height=300, left=1920, top=0 resizable=no, menubar=no, toolbar=no, directories=no, location=no, scrollbars=no, status=no";
    ventana2 = window.open("", "Ventana2", parametros2);

    //Capturo el valor de los SELECT como los ha dejado el usuario
    opcion1 = document.getElementById("seleccion1").value;
    opcion2 = document.getElementById("seleccion2").value;

    ventana2.document.write("Array de números aleatorios:<br><br>");
    //Creo el array del rango de números indicado y seleccionando la cantidad de números indicada
    for (var i = 0; i < opcion2; i++) {
        var numero = Math.floor(Math.random() * opcion1);
        arrayAleatorio.push(numero);
        ventana2.document.write(numero + " ");
    }

    ventana2.document.write("<br><br>Array de números aleatorios seleccionado ordenado de menor a mayor:<br><br>");
    //Copio el array
    arrayOrdenado = arrayAleatorio.slice();
    //Ordeno el array de menor a mayor
    arrayOrdenado.sort(function(a, b) {
        return a - b;
    });

    //Muestro el array en texto en la ventana
    for (var i = 0; i < opcion2; i++) {
        ventana2.document.write(arrayOrdenado[i] + " ");
    }

    //Asigno el color de fondo a la ventana
    ventana2.document.bgColor = "lightblue";
}

/* Cerrar Ventana2 */
function ventana2Cerrar() {
    ventana2.window.close();
}

/* Abrir Ventana3 */
function ventana3Abrir(){
    //Creo la ventana y sus parametros
    var parametros3 = "width=300, height=300, left=1920, top=1080 resizable=no, menubar=no, toolbar=no, directories=no, location=no, scrollbars=no, status=no";
    ventana3 = window.open("", "Ventana3", parametros3);

    //Compruebo los números de arrayOrdenado y si son impares los añado en el array
    for (var i = 0; i < arrayOrdenado.length; i++) {
        if (arrayOrdenado[i] % 2 !== 0) {
            arrayImpares.push(arrayOrdenado[i]);
        }
    }

    //Muestro el array de impares ordenado
    ventana3.document.write("Array de números impares ordenado de menor a mayor:<br><br>");
    for (var j = 0; j < arrayImpares.length; j++) {
        ventana3.document.write(arrayImpares[j] + " ");
    }

    //Asigno el color de fondo a la ventana
    ventana3.document.bgColor = "pink";
}

/* Cerrar Ventana3 */
function ventana3Cerrar() {
    ventana3.window.close();
}

/* Abrir Ventana4 */
function ventana4Abrir(){
    //Creo la ventana y sus parametros
    var parametros4 = "width=300, height=300, left=0, top=1080 resizable=no, menubar=no, toolbar=no, directories=no, location=no, scrollbars=no, status=no";
    ventana4 = window.open("", "Ventana4", parametros4);

    //Mando los datos del usuario y su última modificación
    if (usuario && fechaHora) {
        ventana4.document.write('Contraseña del usuario: ' + usuario.contrasena + '<br>Fecha y Hora: ' + fechaHora);
    } else { //Mando mensaje de que no tengo los datos todavía
        ventana4.document.write('Los datos no están disponibles.');
    }

    //Asigno el color de fondo a la ventana
    ventana4.document.bgColor = "orange";
}

/* Cerrar Ventana4 */
function ventana4Cerrar() {
    ventana4.window.close();
}