function generarPDF() {
    const doc = new jsPDF();

    //Agregar el contenido al PDF
    doc.setFontSize(12);
    var info=document.getElementById("resultado").innerHTML;
    doc.text(info,10,20);
    /*
    doc.text("Profesor:", 10, 20);
    doc.text("Objetivo:", 10, 30);
    doc.text("RA:", 10, 40);
    doc.text("Critérios:", 10, 50);
    doc.text("Tarea:", 10, 60);
    doc.text("Contenido:", 10, 70);*/

    //Guardar el archivo PDF
    doc.save("mi_archivo.pdf");
}