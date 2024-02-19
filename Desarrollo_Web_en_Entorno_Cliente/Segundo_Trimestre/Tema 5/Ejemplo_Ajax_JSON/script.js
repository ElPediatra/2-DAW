//Variables
var resultado = document.getElementById("info");
var selectRA = document.getElementById("selectRA");
var datos;

function ajax_get_json()
{
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }else{ 
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState === 4 && xmlhttp.status === 200){
            datos = JSON.parse(xmlhttp.responseText);
            for (var i in datos){
                for (var j in datos[i]){
                    var option = document.createElement("option");
                    option.text = datos[i][j].id + ": " + datos[i][j].textoRA;
                    option.value = j;
                    selectRA.add(option);
                }
            }
        }
    }
    xmlhttp.open("GET", "datos.json", true);
    xmlhttp.send();
}

//Muestro los criterios seleccionados en el select
function mostrarCriterios() {
    var index = selectRA.value;
    var criterios = datos["Desarrollo Web en Entorno Servidor"][index].criterios;
    var peso = datos["Desarrollo Web en Entorno Servidor"][index].peso;
    resultado.innerHTML = "";
    for (var i in criterios){
        resultado.innerHTML += i + ": " + criterios[i] + "<br/>";
    }
    resultado.innerHTML += "Peso: " + peso;
}

//Escondo los criterios de evaluación
function borrarCriterios() {
    resultado.innerHTML = "";
}

//Lo pongo para que se cargue directamente al cargar la página
window.onload = ajax_get_json;