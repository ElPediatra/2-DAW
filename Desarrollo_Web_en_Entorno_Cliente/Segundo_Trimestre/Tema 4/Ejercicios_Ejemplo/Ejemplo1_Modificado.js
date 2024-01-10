function dale() {
    var msg;
    var x;

    msg = document.getElementById("msg");
    msg.innerHTML = "";
    x = document.getElementById("aqui").value;

    try {
        if(x == "") throw "Está vacío";
        if(isNaN(x)) throw "No es un número";

        x = Number(x);
        if(x < 5) throw "No llega";
        if(x > 10) throw "Se pasa";
    }
    catch(err) {
        msg.innerHTML = "Resultado: " + err;
    }
}