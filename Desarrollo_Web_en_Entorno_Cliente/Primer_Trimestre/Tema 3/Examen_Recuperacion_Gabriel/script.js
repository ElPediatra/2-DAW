//Creo variables para las ventanas
var ventana1;
var ventana2;
var ventana3;

//Creo el objeto usuario
var usuario = {
    nombre: '',
    contrasena: '',
    contrasenaRepetida: '',
};

//Creo 2 variables para los selects de la pestaña principal
var opcion1;
var opcion2;

// Variables (arrays) para los números
var arrayAleatorio = [];
var arrayOrdenado = [];
var arrayPares = [];

/* Abrir Ventana1 */
function ventana1Abrir() {
    //Creo la ventana y sus parámetros
    var parametros1 = "width=300, height=300, left=0, top=0, resizable=no, menubar=no, toolbar=no, directories=no, location=no, scrollbars=no, status=no";
    ventana1 = window.open("", "ventana1", parametros1);

    //Añado el formulario a mi ventana
    ventana1.document.write('<form id="formulario">Usuario: <input type="text" id="nombre"><br>Contraseña: <input type="password" id="contrasena"><br>Repite la contraseña: <input type="password" id="contrasenaRepetida"><br><input type="submit" value="Enviar"></form>');
    
    //Capturo los datos del formulario creado
    ventana1.document.getElementById('formulario').onsubmit = function(datos) {
        datos.preventDefault();
        var nombre = ventana1.document.getElementById('nombre').value;
        var contrasena = ventana1.document.getElementById('contrasena').value;
        var contrasenaRepetida = ventana1.document.getElementById('contrasenaRepetida').value;
    
        //Valido los datos
        if (nombre.length !== 5 || !nombre.match(/^[a-z]+$/)) {
            //Compruebo que el nombre sea de 5 caracteres y que sea en minúscula
            ventana1.document.write('Usuario NO CREADO, el nombre de usuario tiene que tener máximo 5 caracteres y deben estar en minúscula, revísalo por favor.');
            return;
        } else if (contrasena.length !== 4 || !contrasena.match(/^[0-9]+$/)) {
            //Compruebo que la contraseña sea de 4 numeros
            ventana1.document.write('Usuario NO CREADO, la contraseña no es válida. Tiene que tener se 4 números, revísalo por favor.');
            return;
        } else if (contrasena !== contrasenaRepetida) {
            //Compruebo que la contraseña se haya escrito igual en los 2 campos
            ventana1.document.write('Contraseña incorrecta. Las dos contraseñas deben de ser iguales.');
            return;
        } else {
            //Si está todo bien guardo los datos en el usuario y mando mensaje
            usuario.nombre = nombre;
            usuario.contrasena = contrasena;
            usuario.contrasenaRepetida = contrasenaRepetida;

            ventana1.document.write('Usuario y contraseña creados correctamente.');
        }
    };

    //Le pongo el color de fondo a la ventana
    ventana1.document.bgColor = "lightgreen";
}

/* Cerrar Ventana1 */
function ventana1Cerrar() {
    ventana1.window.close();
}

/* Abrir Ventana2 */
function ventana2Abrir(){
    //Creo la ventana y sus parámetros
    var parametros2 = "width=300, height=300, left=1920, top=0, resizable=no, menubar=no, toolbar=no, directories=no, location=no, scrollbars=no, status=no";
    ventana2 = window.open("", "Ventana2", parametros2);

    //Creo una cuenta atras de 5 segundos para que se cierre la ventana
    setTimeout(function() {
        ventana2.close();
    }, 5000);
    

    //Compruebo que los datos del usuario se hayan creado y mando mensaje
    if (usuario.nombre !== '' && usuario.contrasena !== '') {
        //Si está el usuario, pongo los datos
        ventana2.document.write('<br>Nombre del usuario: ' + usuario.nombre + '<br>Contraseña del usuario: ' + usuario.contrasena);
    } else {
        //Aviso de que el usuario no está creado todavía
        ventana2.document.write('Crea primero el usuario en la primera ventana por favor.<br>');
    }

    //Creo un botón para borrar la contraseña del usuario
    ventana2.document.write('<button type="button" id="borrar">Borrar Contraseña</button>')
    ventana2.document.getElementById('borrar').onclick = function() {
        usuario.contrasena = '';
        usuario.contrasenaRepetida = '';
        ventana2.document.write('<br> Contraseña borrada correctamente. Debes de introducirla de nuevo.');
    }

    //Le pongo el color de fondo a la ventana
    ventana2.document.bgColor = "lightblue";
}

/* Cerrar Ventana2 */
function ventana2Cerrar() {
    ventana2.window.close();
}

/* Abrir Ventana3 */
function ventana3Abrir(){
    //Creo la ventana y sus parámetros
    var parametros3 = "width=300, height=300, left=960, top=1080, resizable=no, menubar=no, toolbar=no, directories=no, location=no, scrollbars=no, status=no";
    ventana3 = window.open("", "Ventana3", parametros3);

    //Capturo el valor de la opción seleccionada en los select de la página principal
    var opcion1 = document.getElementById('lista1').value;
    var opcion2 = document.getElementById('lista2').value;
    
    //Creo el array del rango de números indicado y seleccionando la cantidad de números indicada
    ventana3.document.write('Array con ' + opcion1 + ' números aleatorios generados entre 1 y ' + opcion2 + '<br><br>');
    for (var i = 0; i < opcion1; i++) {
        var numero = Math.floor(Math.random() * opcion2);
        arrayAleatorio.push(numero);
        ventana3.document.write(numero + ' ');
    }
    
    ventana3.document.write('<br><br>Array de números aleatorios seleccionado ordenado de menor a mayor:<br><br>');
    // Copio el array
    arrayOrdenado = arrayAleatorio.slice();
    // Ordeno el array de menor a mayor
    arrayOrdenado.sort(function(a, b) {
        return a - b;
    });
    
    //Muestro el array en la ventana
    for (var i = 0; i < opcion1; i++) {
        ventana3.document.write(arrayOrdenado[i] + ' ');
    }

    //Compruebo los números de arrayOrdenado y si son pares los añado en el array
    for (var i = 0; i < arrayOrdenado.length; i++) {
        if (arrayOrdenado[i] % 2 === 0) {
            arrayPares.push(arrayOrdenado[i]);
        }
    }
    
    //Muestro el array de pares ordenado
    ventana3.document.write('<br><br>Array de números pares ordenado de menor a mayor: <br><br>');
    for (var j = 0; j < arrayPares.length; j++) {
        ventana3.document.write(arrayPares[j] + ' ');
    }

    //Le pongo el color de fondo a la ventana
    ventana3.document.bgColor = "pink";
}

/* Cerrar Ventana3 */
function ventana3Cerrar() {
    ventana3.window.close();
}