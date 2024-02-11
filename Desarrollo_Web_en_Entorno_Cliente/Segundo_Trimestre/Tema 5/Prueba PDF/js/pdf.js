var doc;

function prepararPDF() {
    // Crea un nuevo objeto JSPDF
    doc = new jspdf.jsPDF();

    // Agregamos los metadatos al PDF
    doc.setProperties({
        title: 'Formulario',
        subject: 'Prueba PDF',
        author: 'Daniel Marcos Guerra Gómez',
        keywords: 'formulario, pdf, daw, dwec',
        creator: 'Daniel Marcos Guerra Gómez'
    });

    // Agrega el contenido del formulario al PDF
    doc.text(20, 20, 'Nombre: ' + document.getElementById('nombre').value);
    doc.text(20, 30, 'Apellidos: ' + document.getElementById('apellidos').value);
    doc.text(20, 40, 'Edad: ' + document.getElementById('edad').value);
    doc.text(20, 50, 'NIF: ' + document.getElementById('nif').value);
    doc.text(20, 60, 'Email: ' + document.getElementById('email').value);
    doc.text(20, 70, 'Provincia: ' + document.getElementById('provincia').value);
    doc.text(20, 80, 'Fecha de Nacimiento: ' + document.getElementById('fecha').value);
    doc.text(20, 90, 'Teléfono: ' + document.getElementById('telefono').value);
    doc.text(20, 100, 'Hora de Visita: ' + document.getElementById('hora').value);
}

document.getElementById('generarPDF').addEventListener('click', function () {
    // Crea un nuevo objeto JSPDF
    prepararPDF();

    // Guarda el PDF con un nombre específico
    doc.save('formulario.pdf');
});

document.getElementById('previsualizarPDF').addEventListener('click', function () {
    // Crea un nuevo objeto JSPDF
    prepararPDF();

    // Obtiene la URL del PDF como un blob y editar el iframe
    var blobPDF = doc.output('bloburl');
    var iframe = document.getElementById('iframe');
    iframe.src = blobPDF;
    iframe.width = '100%';
    iframe.height = '500px';
});