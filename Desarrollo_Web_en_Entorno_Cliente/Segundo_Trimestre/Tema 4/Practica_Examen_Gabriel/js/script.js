/* Alberto Gómez Morales - 2º DAW - Desarrollo Web Cliente */

/* Objeto Usuario */
var usuario = {
    nombre: "admin",
    contrasena: "admin2"
};


/* Check del Nombre */
function checkNombre() {
    /* Variables */
    //Capturo el "nombre" que ha puesto el usuario
    var nombre = document.getElementById('nombre').value;
    var errorDiv = document.getElementById('error');
    
    //Utilizo esta expresión regular para comprobar que el nombre solo está formado por letras (tanto mayúsculas como minúsculas)
    if (!/^[a-zA-Z]+$/.test(nombre)) {
        //Si no cumple la regla muestro mensaje de error y no quito el focus.
        errorDiv.innerHTML = "El Nombre no es correcto, solo puede estar formado por letras";
        //Hago que se le haga focus de nuevo a la casilla
        nombre.focus();
        return false;
    } else {
        //Si cumple la regla dejo que siga con el resto de campos y quito el focus
        errorDiv.innerHTML = "";
        nombre.blur();
        return true;
    }
}

/* Check del Apellido */
function checkApellido() {
    /* Variables */
    //Capturo el "apellido" que ha puesto el usuario
    var apellidos = document.getElementById('apellidos').value;
    var errorDiv = document.getElementById('error');
    
    //Utilizo esta expresión regular para comprobar que los apellidos solo está formado por letras (tanto mayúsculas como minúsculas)
    if (!/^[a-zA-Z\s]+$/.test(apellidos)) {
        //Si no cumple la regla muestro mensaje de error y no quito el focus.
        errorDiv.innerHTML = "El apellido no es correcto, solo puede estar formado por letras";
        //Hago que se le haga focus de nuevo a la casilla
        apellidos.focus();
        return false;
    } else {
        //Si cumple la regla dejo que siga con el resto de campos y quito el focus
        apellidos.blur();
        errorDiv.innerHTML = "";
        return true;
    }
}

/* Check del Correo */
function checkCorreo() {
    /* Variables */
    //Capturo el "correo" que ha puesto el usuario
    var correo = document.getElementById('correo');
    var errorDiv = document.getElementById('error');
    
    //Utilizo esta expresión regular para comprobar que el correo es correcto
    if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,}$/.test(correo.value)) {
        //Si no cumple la regla muestro mensaje de error y no quito el focus.
        errorDiv.innerHTML = "El correo electrónico no es correcto";
        //Hago que se le haga focus de nuevo a la casilla
        correo.focus();
        return false;
    } else {
        //Si cumple la regla dejo que siga con el resto de campos y quito el focus
        correo.blur();
        errorDiv.innerHTML = "";
        return true;
    }
}

/* Check del Código */
function checkCodigo() {
    /* Variables */
    //Capturo el "código" que ha puesto el usuario
    var codigoVerificacion = document.getElementById('codigoVerificacion');
    var errorDiv = document.getElementById('error');
    
    //Con esta expresión regular compruebo que el código solo tenga números
    if (!/^\d{4,}$/.test(codigoVerificacion.value)) {
        //Si no cumple la regla muestro mensaje de error y no quito el focus.
        errorDiv.innerHTML = "El código de verificación no es correcto, solo puede estar formado por números y tiene que tener al menos 4 dígitos";
        //Hago que se le haga focus de nuevo a la casilla
        codigoVerificacion.focus();
        return false;
    } else {
        //Si cumple la regla dejo que siga con el resto de campos y quito el focus
        codigoVerificacion.blur();
        errorDiv.innerHTML = "";
        return true;
    }
}

/* Check Usuario */
function checkUsuario() {
    /* Variables */
    //Capturo el "usuario" que se ha puesto
    var usuarioAux = document.getElementById('usuario').value;
    var resultado = document.getElementById('resultado');
    
    //Utilizo esta expresión regular para comprobar que el usuario solo está formado por letras (minúsculas en este caso)
    if (!/^[a-z]+$/.test(usuarioAux)) {
        //Si no cumple la regla muestro mensaje de error y no quito el focus.
        resultado.innerHTML = "El usuario no es correcto, solo puede estar formado por letras minúsculas";
        //Hago que se le haga focus de nuevo a la casilla
        usuarioAux.focus();
        return false;
    } else {
        //Si cumple la regla dejo que siga con el resto de campos y quito el focus
        resultado.innerHTML = "";
        usuarioAux.blur();
        return true;
    }
}

/* Check Datos de Acceso */
function checkDatos() {
    /* Variables */
    //Capturo los datos de usuario y contraseña del DOM
    var usuarioWeb = document.getElementById('usuario');
    var contrasenaWeb = document.getElementById('contrasena');
    var resultado = document.getElementById('resultado');

    //Compruebo que el login sea válido (son el usuario y contraseña de mi objeto usuario)
    if (usuarioWeb.value === usuario.nombre && contrasenaWeb.value === usuario.contrasena) {
        //Si es correcto, habilito la opción de que puedan cambiar la contraseña
        resultado.innerHTML = '<p>Cambiar la contraseña?</p><input type="password" name="NuevaContraseña" id="nuevaContrasena"><input type="submit" name="cambiar" id="cambiar" onclick="cambiarContrasena()">';
        //Comienzo la cuenta atrás
        cuentaAtras();
    } else {
        //Si no son válidos mando mensaje informando
        resultado.innerHTML = "No se ha podido iniciar sesión";
    }
}

/* Cambio de contraseña */
function cambiarContrasena() {
    var nuevaContrasena = document.getElementById('nuevaContrasena').value;
    var resultado = document.getElementById('resultado');

    usuario.contrasena = nuevaContrasena;
    resultado.innerHTML = "Contraseña cambiada con éxito";
}

/* Reloj Cuenta Atrás */
function cuentaAtras() {
    /* Variables */
    var reloj = document.getElementById('reloj');
    var resultado = document.getElementById('resultado');
    var tiempoRestante = 30;

    //Creo un intervalo para la funcion
    var intervalo = setInterval(function() {
        //Voy restando el tiempo
        tiempoRestante--;

        //Muestro el mensaje con el tiempo actual
        reloj.innerHTML = "La sesión se cerrará en " + tiempoRestante + " segundos.";

        //Cuando llega a 0, lo paro e indico que se ha "cerrado" la sesión
        if (tiempoRestante <= 0) {
            clearInterval(intervalo);
            reloj.innerHTML = "La sesión se ha cerrado.";
            resultado.innerHTML = "";
        }
    }, 1000);
}