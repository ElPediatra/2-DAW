function validar(){
    var nombre,apellidos,email;
    //Asignamos el valor de lo que escribimos en el html a las variables
    nombre=document.getElementById('nombre').value;
    apellidos=document.getElementById('apellidos').value;
    email=document.getElementById('email').value;
//Comprobamos si están vacías o no
   if (nombre === "" || apellidos === ""|| email === "") {
                alert("Por favor, rellena todos los campos.");
            } else {
                alert("Formulario enviado correctamente.");
            }
}