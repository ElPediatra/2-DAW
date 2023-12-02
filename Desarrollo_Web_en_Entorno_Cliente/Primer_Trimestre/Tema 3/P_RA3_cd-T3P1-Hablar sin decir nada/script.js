//Creo los arrays con los 4 niveles de frases
const array1 = [
    "Queridos compañeros",
    "Por otra parte,y dados los condicionamientos actuales",
    "Asimismo,",
    "Sin embargo no hemos de olvidar que",
    "De igual manera,",
    "La práctica de la vida cotidiana prueba que,",
    "No es indispensable argumentar el peso y la significación de estos problemas ya que,",
    "Las experiencias ricas y diversas muestran que,",
    "El afán de organización, pero sobre todo",
    "Los superiores principios ideológicos, condicionan que",
    "Incluso, bien pudiéramos atrevernos a sugerir que",
    "Es obvio señalar que,",
    "Pero pecaríamos de insinceros si soslayásemos que,",
    "Y además, quedaríamos inmersos en la más abyecta de las estulticias si no fueramos consacientes de que,",
    "Por último, y como definitivo elemento esclarecedor, cabe añadir que,"
];

const array2 = [
    "la realización de las premisas del programa",
    "la complejidad de los estudios de los dirigentes",
    "el aumento constante, en cantidad y en extensión, de nuestra actividad",
    "la estructura actual de la organización",
    "el nuevo modelo de actividad de la organización,",
    "el desarrollo continuo de distintas formas de actividad",
    "nuestra actividad de información y propaganda",
    "el reforzamiento y desarrollo de las estructuras",
    "la consulta con los numerosos militantes",
    "el inicio de la acción general de formación de las actitudes",
    "un relanzamiento específico de todos los sectores implicados",
    "la superación de experiencias periclitadas",
    "una aplicación indiscriminada de los factores confluyentes",
    "la condición sine qua non rectora del proceso",
    "el proceso consensuado de unas y otras aplicaciones concurrentes"
];

const array3 = [
    "nos obliga a un exhaustivo análisis",
    "cumple un rol escencial en la formación",
    "exige la precisión y la determinación",
    "ayuda a la preparación y a la realización",
    "garantiza la participación de un grupo importante en la formación",
    "cumple deberes importantes en la determinación",
    "facilita la creación",
    "obstaculiza la apreciación de la importancia",
    "ofrece un ensayo interesante de verificación",
    "implica el proceso de reestructuración y modernización",
    "habrá de significar un auténtico y eficaz punto de partida",
    "permite en todo caso explicitar las razones fundamentales",
    "asegura, en todo caso, un proceso muy sensible de inversión",
    "radica en una elaboración cuidadosa y sistemática de las estrategias adecuadas",
    "deriva de una indirecta incidencia superadora"
];

const array4 = [
    "de las condiciones financieras y administrativas existentes.",
    "de las directivas de desarrollo para el futuro.",
    "del sistema de participación general.",
    "de las actitudes de los miembros hacia sus deberes ineludibles.",
    "de las nuevas proposiciones.",
    "de las direcciones educativas en el sentido del progreso.",
    "del sistema de formación de cuadros que corresponda a las necesidades.",
    "de las condiciones de las actividades apropiadas.",
    "del modelo de desarrollo.",
    "de las formas de acción.",
    "de las básicas premisas adoptadas.",
    "de toda una casuística de amplio espectro.",
    "de los elementos generadores.",
    "para configurar una interface amigable y coadyuvante a la reingeniería del sistema.",
    "de toda una serie de criterios ideológicamente sistematizados en un frente común de actuación regeneradora."
];

//Función para crear el discurso
function generarDiscurso() {
    if (array1.length > 0 && array2.length > 0 && array3.length > 0 && array4.length > 0) {
        var index1 = Math.floor(Math.random() * array1.length);
        var index2 = Math.floor(Math.random() * array2.length);
        var index3 = Math.floor(Math.random() * array3.length);
        var index4 = Math.floor(Math.random() * array4.length);

        var frase1 = array1.splice(index1, 1);
        var frase2 = array2.splice(index2, 1);
        var frase3 = array3.splice(index3, 1);
        var frase4 = array4.splice(index4, 1);

        var discurso = document.getElementById("discurso");
        discurso.innerHTML += frase1 + " " + frase2 + " " + frase3 + " " + frase4 + "<br>";

        // Almacenar en una cookie las veces que se ha pulsado el botón
        var vecesPulsado = getCookie("vecesPulsado");
        if (vecesPulsado == "") {
            vecesPulsado = 0;
        }
        setCookie("vecesPulsado", ++vecesPulsado, 365);
    } else {
        alert("No hay más frases disponibles para generar un discurso.");
    }
}

//Función para manejar las cookies
function setCookie(nombre, valor, dias) {
    var fecha = new Date();
    fecha.setTime(fecha.getTime() + (dias*24*60*60*1000));
    var expira = "expires="+ fecha.toUTCString();
    document.cookie = nombre + "=" + valor + ";" + expira + ";path=/";
}

function getCookie(nombre) {
    var nombre = nombre + "=";
    var cookies = document.cookie.split(';');
    for(var i = 0; i < cookies.length; i++) {
        var c = cookies[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(nombre) == 0) {
            return c.substring(nombre.length, c.length);
        }
    }
    return "";
}

function mostrarCookie() {
    var vecesPulsado = getCookie("vecesPulsado");
    var valorCookie = document.getElementById("valorCookie");
    valorCookie.innerHTML = "Has pulsado el botón " + vecesPulsado + " veces.";
}
