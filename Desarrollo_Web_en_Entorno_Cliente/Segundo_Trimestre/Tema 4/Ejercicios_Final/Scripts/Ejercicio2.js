function validar(){
    var nombre,apellidos;
    //Asignamos el valor de lo que escribimos en el html a las variables
    nombre=document.getElementById('nombre').value;
    apellidos=document.getElementById('apellidos').value;
//Comprobamos si están vacías o no
   if (nombre === "" || apellidos === "") {
                alert("Por favor, rellena todos los campos.");
            } else {
                alert("Formulario enviado correctamente.");
            }
}