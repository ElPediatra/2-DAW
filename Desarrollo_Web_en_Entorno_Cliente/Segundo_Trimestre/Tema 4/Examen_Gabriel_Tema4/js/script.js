/* Función para comprobar el nombre */
function checkNombre() {
    /* Variables */
    // Capturo el 'nombre' que ha puesto el usuario
    var nombre = document.getElementById('nombre').value;
    var errorDiv = document.getElementById('error');

    // Utilizo esta expresión regular para comprobar que el nombre solo está formado por letras (tanto mayúsculas como minúsculas)
    if (!/^[a-zA-Z]+$/.test(nombre)) {
        // Si no cumple la regla muestro mensaje de error y no quito el focus.
        errorDiv.innerHTML = 'El Nombre no es correcto, solo puede estar formado por letras';
        // Hago que se le haga focus de nuevo a la casilla
        document.getElementById('nombre').focus();
        return false;
    } else {
        // Si cumple la regla dejo que siga con el resto de campos y quito el focus
        errorDiv.innerHTML = '';
        document.getElementById('nombre').blur();
        return true;
    }
}

/* Función para comprobar los apellidos */
function checkApellido() {
    /* Variables */
    // Capturo el 'apellido' que ha puesto el usuario
    var apellidos = document.getElementById('apellidos').value;
    var errorDiv = document.getElementById('error');

    // Utilizo esta expresión regular para comprobar que los apellidos solo está formado por letras (tanto mayúsculas como minúsculas)
    if (!/^[a-zA-Z\s]+$/.test(apellidos)) {
        // Si no cumple la regla muestro mensaje de error y no quito el focus.
        errorDiv.innerHTML = 'El apellido no es correcto, solo puede estar formado por letras';
        // Hago que se le haga focus de nuevo a la casilla
        document.getElementById('apellidos').focus();
        return false;
    } else {
        // Si cumple la regla dejo que siga con el resto de campos y quito el focus
        document.getElementById('apellidos').blur();
        errorDiv.innerHTML = '';
        return true;
    }
}

/* Función para comprobar el Código de Verificación */

/* Expresion para Código de Verificación? */
function checkCodigo() {
    /* Variables */
    // Capturo el 'código' que ha puesto el usuario
    var codigoVerificacion = document.getElementById('codigoVerificacion').value;
    var errorDiv = document.getElementById('error');

    // Con esta expresión regular compruebo que el código solo tenga números

    /* /^\d{4}[A-Z]{1}$/ */
    /* /^(?=(?:\D*\d){4})(?=[^A-Z]*[A-Z]).{5}$/ */

    if (!/^(?=(?:\D*\d){4})(?=[^A-Z]*[A-Z]).{5}$/.test(codigoVerificacion)) {
        // Si no cumple la regla muestro mensaje de error y no quito el focus.
        errorDiv.innerHTML = 'El código de verificación no es correcto, tiene que estar formado por 4 números y 1 letra MAYÚSCULA';
        // Hago que se le haga focus de nuevo a la casilla
        document.getElementById('codigoVerificacion').focus();
        return false;
    } else {
        // Si cumple la regla dejo que siga con el resto de campos y quito el focus
        document.getElementById('codigoVerificacion').blur();
        errorDiv.innerHTML = '';
        return true;
    }
}

function checkDatos() {
    
    /* Variables */
    //Capturo los datos de usuario y contraseña del DOM
    var usuarioWeb = document.getElementById('usuario').value;
    var contrasenaWeb = document.getElementById('contrasena').value;
    var resultado = document.getElementById('resultado');

    //Capturo el código de verificació que ha puesto el usuario
    var codigoVerificacion = document.getElementById('codigoVerificacion').value;
    var codigoSinLetra = codigoVerificacion.replace(/\D/g, ""); //Uso esta expresión para reemplazar las letras por 'nada' ""

    // Compruebo que el login sea válido (son el usuario y contraseña de mi objeto usuario)
    if (usuarioWeb === "Admin" && contrasenaWeb == codigoSinLetra) {
        // Si es correcto, habilito el botón para pasar a inglés/español
        resultado.innerHTML = '<input type="submit" name="enviar" id="ingles" onclick="cambiarIngles()" value="Poner en Inglés"><br><br><input type="submit" name="botonSalir" id="salir" onclick="salirLogin()" value="Salir">';
        // Comienzo la cuenta atrás
        cuentaAtras();
    } else {
        // Si no son válidos mando mensaje informando
        resultado.innerHTML = 'No se ha podido iniciar sesión';
    }
}

/* NO ME FUNCIONABA, HE OPTADO POR QUITAR LAS LETRAS Y REEMPLAZARLAS POR NADA ""
Función para sacar la letra del Código de Verificación usando arrays
function sacarNumero(cadena) {
    var numeros = [];
    for (let i = 0; i < cadena.length; i++) {
        var numero = cadena[i];
        if (!isNaN(parseInt(numero))) {
            numeros.push(parseInt(numero));
        }
    }
    return numeros;
}
*/

/* Función para cerrar el login */
function cuentaAtras() {
    /* Variables */
    var resultado = document.getElementById('resultado');
    var tiempoRestante = 10;

    // Creo un intervalo para la funcion
    var intervalo = setInterval(function() {
        // Voy restando el tiempo
        tiempoRestante--;

        // Cuando llega a 0, lo paro e indico que se ha 'cerrado' la sesión
        if (tiempoRestante <= 0) {
            clearInterval(intervalo);
            resultado.innerHTML = '';
        }
    }, 1000);
}

/* Función para cambiar el texto indicado a inglés */
function cambiarIngles() {
    /* Variables */
    var nombre = document.getElementById('textoNombre');
    var apellidos = document.getElementById('textoApellido');
    var codigo = document.getElementById('textoCodigo');
    var usuario = document.getElementById('textoUsuario');
    var contrasena = document.getElementById('textoContrasena');
    var resultado = document.getElementById('resultado');
    var enviar = document.getElementById('btnCheck');

    nombre.innerHTML = 'Name: ';
    apellidos.innerHTML = 'Surname: ';
    codigo.innerHTML = 'Verification Code: ';
    usuario.innerHTML = 'Administrator: ';
    contrasena.innerHTML = 'Password: ';

    //Cambio los botones
    resultado.innerHTML = '<input type="submit" name="enviar" id="ingles" onclick="cambiarEspañol()" value="Change to Spanish"><br><br><input type="submit" name="botonSalir" id="salir" onclick="salirLogin()" value="Exit">';
    enviar.innerHTML = '<input type="submit" name="Enviar" id="enviar" onclick="checkDatos()" value="Send Data">';
}

function cambiarEspañol() {
    /* Variables */
    var nombre = document.getElementById('textoNombre');
    var apellidos = document.getElementById('textoApellido');
    var codigo = document.getElementById('textoCodigo');
    var usuario = document.getElementById('textoUsuario');
    var contrasena = document.getElementById('textoContrasena');
    var resultado = document.getElementById('resultado');
    var enviar = document.getElementById('btnCheck');
    
    nombre.innerHTML = 'Nombre:';
    apellidos.innerHTML = 'Apellidos:';
    codigo.innerHTML = 'Código de Verificación:';
    usuario.innerHTML = 'Usuario Administrador:';
    contrasena.innerHTML = 'Contraseña:';
    
    //Cambio los botones
    resultado.innerHTML = '<input type="submit" name="enviar" id="ingles" onclick="cambiarIngles()" value="Poner en Inglés"><br><br><input type="submit" name="botonSalir" id="salir" onclick="salirLogin()" value="Salir">';
    enviar.innerHTML = '<input type="submit" name="Enviar" id="btnEnviar" onclick="checkDatos()" value="Enviar Datos">';
}

/* Función para salir manualmente del Login */
function salirLogin() {
    /* Variables */
    var resultado = document.getElementById('resultado');

    //Como es solo se salida, lo que hago es capturar el campo del login y vaciarlo
    resultado.innerHTML = '';
}