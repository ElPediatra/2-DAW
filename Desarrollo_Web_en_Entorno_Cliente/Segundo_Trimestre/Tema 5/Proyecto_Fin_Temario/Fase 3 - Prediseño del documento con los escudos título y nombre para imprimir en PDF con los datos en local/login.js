document.addEventListener('DOMContentLoaded', function() {
    const botonUsuario = document.getElementById('botonUsuario');
    const botonAdmin = document.getElementById('botonAdmin');
    const seccionLogin = document.querySelector('.seccion-login');
    const seccionProfesor = document.querySelector('.seccion-profesor');
    const seccionCabecera = document.querySelector('.seccion-cabecera');

    botonUsuario.addEventListener('click', function() {
        alert('Opción no disponible, pendiente de acceso a Servidor AJAX/JSON');
    });

    botonAdmin.addEventListener('click', function() {
        const nombreUsuario = document.getElementById('campoUsuario').value;
        const contrasena = document.getElementById('contrasena').value;

        if (nombreUsuario === 'admin' && contrasena === 'admin') {
            alert('Acceso concedido');
            setTimeout(function() {
                seccionLogin.style.display = 'none';
                seccionProfesor.style.display = 'block';
                setTimeout(function() {
                    seccionProfesor.style.display = 'none';
                    // Creo un nuevo elemento <h3>
                    const nuevoH3 = document.createElement('h3');
                    //Capturo el nombre del profesor después del segundo timeout
                    const nombreProfesor = document.getElementById('nombreProfe').value;
                    //Pongo el texto del <h3> con el nombre del profesor que he capturado antes
                    nuevoH3.textContent = 'Profesor: ' + nombreProfesor;
                    //Agrego el <h3> que he creado al DOM (dentro de la sección de cabecera)
                    seccionCabecera.appendChild(nuevoH3);
                }, 10000);
            }, 100);
        } else {
            alert('Acceso denegado');
        }
    });
});