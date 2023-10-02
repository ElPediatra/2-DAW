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

/* Imports */
import java.util.Scanner;

public class Ejercicio15 {
    public static void main(String[] args) {
        /* Atributos */
        boolean[] asientos = new boolean[11]; //Se inicializa en false
        int asientosOcupados = 0; //Contador para el bucle
        int eleccion;
        int asiento;
        String respuesta;

        Scanner teclado = new Scanner(System.in);


        //Bucle para solicitud de asientos
        while (asientosOcupados < 10) {
            System.out.println("Selecciona el ticket que quieres, escribe '1' para Primera Clase o '2' para Económico:");
            eleccion = teclado.nextInt();

            if (eleccion == 1) {
                asiento = asignarAsiento(asientos, 1, 5);
                if (asiento != -1) {
                    imprimirTarjetaEmbarque(asiento, "Primera Clase");
                    asientosOcupados++;
                } else {
                    System.out.println("La sección de Primera Clase está llena. ¿Desea ser colocado en Económico? (Sí/No)");
                    respuesta = teclado.next();
                    if (respuesta.equalsIgnoreCase("Sí")) {
                        asiento = asignarAsiento(asientos, 6, 10);
                        if (asiento != -1) {
                            imprimirTarjetaEmbarque(asiento, "Económico");
                            asientosOcupados++;
                        } else {
                            System.out.println("Lo siento, el avión está lleno. El próximo vuelo sale en 3 horas.");
                            break;
                        }
                    } else {
                        System.out.println("El próximo vuelo sale en 3 horas.");
                        break;
                    }
                }
            } else if (eleccion == 2) {
                asiento = asignarAsiento(asientos, 6, 10);
                if (asiento != -1) {
                    imprimirTarjetaEmbarque(asiento, "Económico");
                    asientosOcupados++;
                } else {
                    System.out.println("La sección Económica está llena. ¿Desea ser colocado en Primera Clase? (Sí/No)");
                    respuesta = teclado.next();
                    if (respuesta.equalsIgnoreCase("Sí")) {
                        asiento = asignarAsiento(asientos, 1, 5);
                        if (asiento != -1) {
                            imprimirTarjetaEmbarque(asiento, "Primera Clase");
                            asientosOcupados++;
                        } else {
                            System.out.println("Lo siento, el avión está lleno. El próximo vuelo sale en 3 horas.");
                            break;
                        }
                    } else {
                        System.out.println("El próximo vuelo sale en 3 horas.");
                        break;
                    }
                }
            } else {
                System.out.println("Opción no válida. Por favor, seleccione 1 para Primera Clase o 2 para Económico.");
            }
        }

        teclado.close();
    }

    /* Métodos */
    public static int asignarAsiento(boolean[] asientos, int inicio, int fin) { //Asignamos asientos si hay disponibles
        for (int i = inicio; i <= fin; i++) {
            if (!asientos[i]) {
                asientos[i] = true;
                return i;
            }
        }
        return -1;
    }

    public static void imprimirTarjetaEmbarque(int asiento, String clase) { //"Imprimimos" el ticket del usuario
        System.out.println("¡Felicitaciones! Ha sido asignado al asiento número " + asiento + " en la sección de " + clase + ".");
    }
}