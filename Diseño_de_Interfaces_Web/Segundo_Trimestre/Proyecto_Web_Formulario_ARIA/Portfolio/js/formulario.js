var slider = document.querySelector('.slider');
slider.addEventListener('keydown', function(e) {
  var valorActual = parseInt(this.getAttribute('aria-valuenow'));
  var valorMinimo = parseInt(this.getAttribute('aria-valuemin'));
  var valorMaximo = parseInt(this.getAttribute('aria-valuemax'));

  switch(e.key) {
    case "ArrowRight":
    case "ArrowUp":
      this.setAttribute('aria-valuenow', Math.min(valorActual + 1, valorMaximo));
      break;
    case "ArrowLeft":
    case "ArrowDown":
      this.setAttribute('aria-valuenow', Math.max(valorActual - 1, valorMinimo));
      break;
    default:
      return;
  }

  e.preventDefault();
});

var input = document.querySelector('#autocomplete');
var list = document.querySelector('#autocomplete-options');

input.addEventListener('input', function() {
  // Buscar opciones basadas en input.value y llenar la lista
  // ...
  input.setAttribute('aria-expanded', 'true');
});

input.addEventListener('blur', function() {
  input.setAttribute('aria-expanded', 'false');
});