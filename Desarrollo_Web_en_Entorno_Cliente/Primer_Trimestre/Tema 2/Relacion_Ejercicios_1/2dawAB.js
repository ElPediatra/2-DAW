function restarCadenas() {
    var cadena1 = document.getElementById("cadena1").value;
    var cadena2 = document.getElementById("cadena2").value;
    
    if (cadena1 === cadena2) {
        document.getElementById("resultado").textContent = "Las cadenas son iguales, no se pueden restar.";
    } else {
        document.getElementById("resultado").textContent = "No podemos restarlo.";
    }
}