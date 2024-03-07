//URL del archivo JSON - Al tenerlo en local pongo el nombre directamente
let url = 'http://192.168.217.128:80/datos.json'; //Variable para JSON SERVIDOR
/* let url = 'datos.json'; //Variable para LOCAL */

/*

Para cargar el JSON uso lamp-server (apache2)

Habilito el módulo de CORS en el equipo: sudo a2enmod headers

Añado esta línea en apache2.conf para habilitar las cabeceras CORS en la carpeta de html

<Directory "/var/www/html">
    Header set Access-Control-Allow-Origin "*"
</Directory>

Reinicio el servicio de lamp-server y listo :)

*/

//Utilizo fetch para cargar el archivo JSON
fetch(url)
    .then(response => response.json()) //Convierte la respuesta en JSON
    .then(datos => {//Ahora los datos del archivo JSON están disponibles en la variable datos

        //Capturo el elemento select del DOM
        let selectRA = document.getElementById('losRA');
        let selectCriterios = document.getElementById('losCriterios');

        //Recorro cada RA en los datos
        for (let i = 0; i < datos["Desarrollo Web en Entorno Servidor"].length; i++) {
            //Creo un nuevo elemento option en el select
            let option = document.createElement('option');
            
            //Le doy un valor y el texto del option al id del RA
            option.value = datos["Desarrollo Web en Entorno Servidor"][i].id;
            //Le añado el textoRA del JSON
            option.text = datos["Desarrollo Web en Entorno Servidor"][i].id + ' - ' + datos["Desarrollo Web en Entorno Servidor"][i].textoRA;
            
            //Añado el option al select
            selectRA.appendChild(option);
        }

        //Agrego un Eventlistener al desplegable de RAs
        selectRA.addEventListener('change', function() {
            //Vacio el desplegable de "losCriterios" en caso de que ya esté seleccionado
            selectCriterios.innerHTML = '';

            //Capturo el RA seleccionado en los datos
            let raSeleccionado = datos["Desarrollo Web en Entorno Servidor"].find(ra => ra.id === this.value);

            //Recorre cada criterio en el RA seleccionado
            for (let criterio in raSeleccionado.criterios) {
                //Crea un nuevo elemento option
                let option = document.createElement('option');
                
                //Establece el valor y el texto del option al criterio
                option.value = criterio;
                option.text = criterio + ' - ' + raSeleccionado.criterios[criterio];
                
                //Añade el option al select
                selectCriterios.appendChild(option);
            }
        });
    })
    /* Captura de mensajes en caso de error */
    .catch(error => console.error('Error:', error));