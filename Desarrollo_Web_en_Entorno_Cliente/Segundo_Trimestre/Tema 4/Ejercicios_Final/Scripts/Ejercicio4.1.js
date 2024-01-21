function MuestraFecha(){
    document.getElementById("texto").innerHTML=Date();
}

document.getElementById("unboton").addEventListener("click",MuestraFecha);