/* Crear un Objeto Usuario, que permita autenticar a la perosna que quiera iniciar sesión en el sistema */

document.getElementById('login').addEventListener('submit', function(event) {
    event.preventDefault();

    var Usuario = function(usuario, contraseña) {
        this.usuario = usuario;
        this.contraseña = contraseña;
    }

    Usuario.prototype.checkInformation = function() {
        if (this.usuario === 'admin' && this.contraseña === 'admin') {
            return true;
        } else {
            return false;
        }
    }

    var usuario = document.getElementById('usuario').value;
    var contraseña = document.getElementById('contraseña').value;

    var nuevoUsuario = new Usuario(usuario, contraseña);

    if (nuevoUsuario.checkInformation()) {
        document.getElementById('mensaje').textContent = 'Usuario correcto, iniciando sesion...';
    } else {
        document.getElementById('mensaje').textContent = 'Nombre de usuario o contraseña incorrectos, reviselo por favor.';
    }
})