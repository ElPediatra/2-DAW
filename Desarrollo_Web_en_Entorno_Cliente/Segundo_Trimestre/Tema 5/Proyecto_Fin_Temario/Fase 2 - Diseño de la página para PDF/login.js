document.addEventListener('DOMContentLoaded', function() {
    const botonUsuario = document.getElementById('botonUsuario');
    const botonAdmin = document.getElementById('botonAdmin');
    const seccionLogin = document.querySelector('.seccion-login');
    const seccionProfesor = document.querySelector('.seccion-profesor');

    botonUsuario.addEventListener('click', function() {
        alert('Opción no disponible, pendiente de acceso a Servidor AJAX/JSON');
    });

    botonAdmin.addEventListener('click', function() {
        const nombreProfesor = document.getElementById('nombreProfe').value;
        const nombreUsuario = document.getElementById('campoUsuario').value;
        const contrasena = document.getElementById('contrasena').value;

        if (nombreUsuario === 'admin' && contrasena === 'admin') {
            alert('Acceso concedido');
            setTimeout(function() {
                seccionLogin.style.display = 'none';
                seccionProfesor.style.display = 'block';
                setTimeout(function() {
                    seccionProfesor.style.display = 'none';
                    //Creo un nuevo elemento h3
                    var nuevoH3 = document.createElement('h3');
                    //Capturo el nombre del profesor
                    var nombreProfesor = document.getElementById('nombreProfe').value;
                    //Añado el texto al h3
                    nuevoH3.textContent = 'Profesor: ' + nombreProfesor;
                    //Añado el nuevo H3 al DOM
                    seccionProfesor.appendChild(nuevoH3);
                }, 10000);
            }, 100);
        } else {
            alert('Acceso denegado');
        }
    });
});

