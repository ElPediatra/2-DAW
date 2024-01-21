function validar(){
    var nombre,apellidos,email;
    //Asignamos el valor de lo que escribimos en el html a las variables
    nombre=document.getElementById('nombre').value;
    apellidos=document.getElementById('apellidos').value;
    email=document.getElementById('email').value;
    telefono=document.getElementById('telefono').value;
//Comprobamos si están vacías o no
   if (nombre === "" || apellidos === ""|| email === "" || telefono === "") {
                alert("Por favor, rellena todos los campos.");
            } else if(isNaN(telefono)) {
                alert("El teléfono no es un número");
            }else{
                alert("Formulario enviado correctamente.");
            }
}