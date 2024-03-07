function generarPDF() {
    //Variable Objeto
    const doc = new jspdf.jsPDF();

    //variables para imágenes
    var imgJunta = new Image;
    var imgMurgi = new Image;
    imgJunta.src = "img/junta.jpg";
    imgMurgi.src = "img/murgi.png";

    //variables config salto de linea
    var maxTextWidth = 180; // Ancho máximo permitido en la página, en unidades de medida de jsPDF
    var margin = 10; // Márgen superior para comenzar a escribir el texto
    // Divide el texto en partes que se ajusten al ancho de la página
    var lines;
    var spaceLeft;
    var margin = 10;




    //Variables texto
    var titulo1 = document.getElementById('titulo1').innerText;
    var titulo2 = document.getElementById('titulo2').innerText;
    var textoProfesor = document.getElementById('textoProfesor').innerText;
    var textoObjetivo = document.getElementById('textoObjetivo').innerText;
    var textoRA = document.getElementById('textoRA').innerText;
    var criterios = document.getElementById('criterios').innerText;
    var textoTarea = document.getElementById('textoTarea').innerText;
    var textoContenido = document.getElementById('textoContenido').innerText;

    doc.addImage(imgJunta, "JPEG", 5, 5, 50, 32);
    doc.addImage(imgMurgi, "PNG", 162, 8, 40, 38);

    //Agregar el contenido al PDF
    doc.setFontSize(18);
    doc.text(titulo1, 10, 50);
    doc.setFontSize(16);
    doc.text(titulo2, 10, 60);
    doc.setFontSize(15);
    lines= doc.splitTextToSize((textoProfesor), maxTextWidth);
    // Calcula el espacio restante en la página
        spaceLeft = doc.internal.pageSize.height - margin - (lines.length * 15 * 1.2);
        if (spaceLeft < 0) {
            doc.addPage();
            spaceLeft = doc.internal.pageSize.height - margin;
        }
    doc.text(lines, 10, 70);
    //texto objetivo
    doc.setFontSize(12);
    lines= doc.splitTextToSize((textoObjetivo), maxTextWidth);
    // Calcula el espacio restante en la página
        spaceLeft = doc.internal.pageSize.height - margin - (lines.length * 12 * 1.2);
        if (spaceLeft < 0) {
            doc.addPage();
            spaceLeft = doc.internal.pageSize.height - margin;
        }
    doc.text(lines, 10, 80);
    //texto RA
    doc.setFontSize(12);
    lines= doc.splitTextToSize((textoRA), maxTextWidth);
    // Calcula el espacio restante en la página
        spaceLeft = doc.internal.pageSize.height - margin - (lines.length * 12 * 1.2);
        if (spaceLeft < 0) {
            doc.addPage();
            spaceLeft = doc.internal.pageSize.height - margin;
        }
    doc.text(lines, 10, 90);
    //texto criterios
    lines= doc.splitTextToSize((criterios), maxTextWidth);
    // Calcula el espacio restante en la página
        spaceLeft = doc.internal.pageSize.height - margin - (lines.length * 12 * 1.2);
        if (spaceLeft < 0) {
            doc.addPage();
            spaceLeft = doc.internal.pageSize.height - margin;
        }
    doc.text(lines, 10, 100);
    lines= doc.splitTextToSize((textoTarea), maxTextWidth);
    // Calcula el espacio restante en la página
        spaceLeft = doc.internal.pageSize.height - margin - (lines.length * 12 * 1.2);
        if (spaceLeft < 0) {
            doc.addPage();
            spaceLeft = doc.internal.pageSize.height - margin;
        }
    doc.text(lines, 10, 110);
    lines= doc.splitTextToSize((textoContenido), maxTextWidth);
    // Calcula el espacio restante en la página
        spaceLeft = doc.internal.pageSize.height - margin - (lines.length * 12 * 1.2);
        if (spaceLeft < 0) {
            doc.addPage();
            spaceLeft = doc.internal.pageSize.height - margin;
        }
    doc.text(lines, 10, 120);

    //Guardar el archivo PDF
    doc.save("mi_archivo.pdf");
}