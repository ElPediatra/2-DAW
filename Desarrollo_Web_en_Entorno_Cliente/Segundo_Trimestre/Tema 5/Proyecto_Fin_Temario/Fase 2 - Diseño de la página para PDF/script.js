/* Alberto Gomez Morales - 2º DAW - Desarrollo Web en Cliente */

//Variables
var selectRA = document.getElementById("selectRA");
var selectCriterio = document.getElementById("selectCriterio");
var datos;
var loginForm = document.getElementById("loginForm");
var mainContent = document.getElementById("mainContent");
var professorName = document.getElementById("professorName");

function login() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    // Verificar las credenciales del usuario
    if ((username == "administrador" && password == "admin") || (username == "profesor" && password == "profe")) {
        // Si las credenciales son correctas, oculta el formulario de inicio de sesión y muestra el contenido principal
        loginForm.style.display = "none";
        mainContent.style.display = "block";
        // Muestra el nombre del profesor
        var name = document.createElement("p");
        name.textContent = "Profesor: " + professorName.value;
        mainContent.prepend(name);
        // Después de 1 minuto, vuelve a mostrar el formulario de inicio de sesión
        setTimeout(function() {
            loginForm.style.display = "block";
            mainContent.style.display = "none";
        }, 60000);
    } else {
        // Si las credenciales son incorrectas, muestra un mensaje de error
        alert("Usuario o contraseña incorrectos");
    }
}