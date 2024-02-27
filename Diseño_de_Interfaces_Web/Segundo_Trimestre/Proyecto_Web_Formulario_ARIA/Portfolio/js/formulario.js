/* Variables correo */
const inputCorreo = document.getElementById('email');
const emailError = document.getElementById('emailError');

/* Variables teléfono */
const inputTelefono = document.getElementById('telefono');
const telefonoError = document.getElementById('telefonoError');

/* Eventos correo y teléfono */
inputCorreo.addEventListener('blur', validarCorreo);
inputTelefono.addEventListener('blur', validarTelefono);

/* Función Correo */
function validarCorreo() {
    const correo = inputCorreo.value.trim();
    const regexCorreo = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if (regexCorreo.test(correo)) {
        // El correo es válido, puedes continuar con el resto del formulario
        emailError.style.display = 'none';
        // Aquí puedes agregar más lógica para el resto del formulario
    } else {
        // El correo no es válido, muestra el mensaje de error y enfoca el campo
        emailError.style.display = 'block';
        inputCorreo.focus();
    }
}

/* Función Teléfono */
function validarTelefono() {
    const telefono = inputTelefono.value.trim();
    const regexTelefono = /^[6789]\d{8}$/;

    if (regexTelefono.test(telefono)) {
        // El teléfono es válido, puedes continuar con el resto del formulario
        telefonoError.style.display = 'none';
        // Aquí puedes agregar más lógica para el resto del formulario
    } else {
        // El teléfono no es válido, muestra el mensaje de error y enfoca el campo
        telefonoError.style.display = 'block';
        inputTelefono.focus();
    }
}