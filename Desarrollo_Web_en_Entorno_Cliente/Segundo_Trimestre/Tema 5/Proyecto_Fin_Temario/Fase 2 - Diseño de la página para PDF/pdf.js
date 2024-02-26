// Función para generar el PDF
document.getElementById('generarPDF').addEventListener('click', function() {
    var doc = new jsPDF();
    var contenido = document.getElementById('tablaRAs').innerHTML;
    
    doc.fromHTML(contenido, 15, 15, {
        'width': 170
    });
    
    doc.save('descarga.pdf');
});

// Función para previsualizar el PDF
document.getElementById('previsualizarPDF').addEventListener('click', async function() {
    var doc = new jsPDF();
    var contenido = document.getElementById('tablaRAs').innerHTML;
    
    doc.fromHTML(contenido, 15, 15, {
        'width': 170
    });
    
    var pdfDataUri = await doc.output('datauristring');
    
    var win = window.open();
    win.document.write('<iframe src="' + pdfDataUri + '" frameborder="0" style="border:0; top:0px; left:0px; bottom:0px; right:0px; width:100%; height:100%;" allowfullscreen></iframe>');
});