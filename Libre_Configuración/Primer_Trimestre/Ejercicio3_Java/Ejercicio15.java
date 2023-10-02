/* Alberto Gómez Morales - 2º DAW - Libre configuración
 * 
 * 15.- (Sistema de reservas de una aerolínea) Una pequeña aerolínea acaba de comprar una
 * computadora para su nuevo sistema de reservas automatizado. Se le ha pedido a usted que
 * desarrolle el nuevo sistema. Usted escribirá una aplicación para asignar asientos en cada vuelo del
 * único avión de la aerolínea (capacidad: 10 asientos).
 * 
 * Su aplicación debe mostrar las siguientes alternativas: Por favor escriba 1 para Primera Clae y Por
 * favor escriba 2 para Económico. Si el usuario escribe 1, su aplicación debe asignarle un asiento en
 * la sección primera clase (asientos 1 a 5). Si el usuario escribe 2, su aplicación debe asignarle un
 * asiento en la sección económica (asientos 6 a 10). Su aplicación deberá entonces imprimir una
 * tarjeta de embarque, indicando el número de asiento de la persona y si se encuentra en la sección de
 * primera clase o clase económica del avión.
 * 
 * Use un array unidimensional del tipo primitivo boolean para representar la tabla de asientos del
 * avión. Inicialice todos los elementos del array con false para indicar que todos los aisentos están
 * vacíos. A medida que se asigne cada asiento, establezca los elementos correspodientes del array
 * en true para indicar que ese asiento ya no está disponible.
 * 
 * Su aplicación nunca deberá asignar un asiento que ya haya sido asignado. Cuando este llena la
 * sección económica, su programa deberá preguntar a la persona si acepta ser colocada en la sección
 * de primera clase (y viceversa). Si la persona acepta, haga la asignación de asiento apropiada. Si no
 * acepta , imprima el mensaje "El próximo vuelo sale en 3 horas".
 */