document.addEventListener('DOMContentLoaded', function() {
    const botonUsuario = document.getElementById('botonUsuario');
    const botonAdmin = document.getElementById('botonAdmin');
    const seccionLogin = document.querySelector('.seccion-login'); 
    const nombresPermitidos = ['Magdalena', 'Angel', 'Gabriel', 'David', 'Isidoro', 'Joaquin', 'Ana'];

    botonUsuario.addEventListener('click', function() {
        const nombreProfesor = document.getElementById('nombreProfe').value;
        const nombreUsuario = document.getElementById('campoUsuario').value;
        const contrasena = document.getElementById('contrasena').value;

        if (!nombresPermitidos.includes(nombreProfesor)) {
            alert('Nombre de profesor no válido');
            return;
        }

        if (nombreUsuario === 'usuario' && contrasena === 'usuario') {
            alert('Acceso concedido');
            setTimeout(function() {
                seccionLogin.style.display = 'none';
            }, 100);
        } else {
            alert('Acceso denegado');
        }
    });

    botonAdmin.addEventListener('click', function() {
        const nombreProfesor = document.getElementById('nombreProfe').value;
        const nombreUsuario = document.getElementById('campoUsuario').value;
        const contrasena = document.getElementById('contrasena').value;

        if (!nombresPermitidos.includes(nombreProfesor)) {
            alert('Nombre de profesor no válido');
            return;
        }

        if (nombreUsuario === 'administrador' && contrasena === 'admin') {
            alert('Acceso concedido');
            setTimeout(function() {
                seccionLogin.style.display = 'none';
            }, 100);
        } else {
            alert('Acceso denegado');
        }
    });
});

