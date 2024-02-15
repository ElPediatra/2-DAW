var xmlhttp = new XMLHttpRequest();
var url = "DWS.txt";
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var listaWebs = JSON.parse(this.responseText);
        getWebs(listaWebs);
    }
};
xmlhttp.open("GET", url, true);
xmlhttp.send();

function getWebs(arr) {
    var out = "";
    var i;
    for (i = 0; i < arr.length; i++) {
        out += '<a href="' + arr[i].url + '">' +
        arr[i].display + '</a><br>';
    }
    document.getElementById("lasWebs").innerHTML = out;
}