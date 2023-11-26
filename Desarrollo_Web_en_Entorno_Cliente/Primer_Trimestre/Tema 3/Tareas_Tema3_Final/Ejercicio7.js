// Definir un objeto "persona"
var persona = {
    // Propiedad "name": un array con el nombre y apellido de la persona
    name: ['Rafa', 'Nadal'],
  
    // Propiedad "age": la edad de la persona
    age: 30,
  
    // Propiedad "gender": el género de la persona
    gender: 'masculino',
  
    // Propiedad "interests": un array con los intereses de la persona
    interests: ['tenis', 'futbol'],
  
    // Método "bio": muestra una alerta con la biografía de la persona
    bio: function() {
      alert(this.name[0] + ' ' + this.name[1] + ' tiene ' + this.age + ' años y le gusta el ' + this.interests[0] + ' y el ' + this.interests[1] + '.');
    },
  
    // Método "saluda": muestra una alerta con un saludo de la persona
    saluda: function() {
      alert('Hola, me llamo ' + this.name[0] + '.');
    }
  };