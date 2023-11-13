/* Crear un Objeto Usuario, que permita autenticar a la perosna que quiera iniciar sesión en el sistema */

document.getElementById('login').addEventListener('submit', function(event) {
    event.preventDefault();

    /* Constructor por defecto */
    var Usuario = function(usuario, contraseña) {
        this.usuario = usuario;
        this.contraseña = contraseña;
    }

    /* Validador del usuario (se supone que ya está creado, solo estamos probando el login con función) */
    Usuario.prototype.checkInformation = function() { //Método booleano para validar el usuario
        if (this.usuario === 'admin' && this.contraseña === 'admin') {
            return true;
        } else {
            return false;
        }
    }

    /* Creo las variables y el nuevo usuario */
    var usuario = document.getElementById('usuario').value;
    var contraseña = document.getElementById('contraseña').value;

    var nuevoUsuario = new Usuario(usuario, contraseña);

    /* Hago la comparación con el método booleano */
    if (nuevoUsuario.checkInformation()) {
        document.getElementById('mensaje').textContent = 'Usuario correcto, iniciando sesion...';
    } else {
        document.getElementById('mensaje').textContent = 'Nombre de usuario o contraseña incorrectos, reviselo por favor.';
    }
})