/* Alberto Gómez Morales
 *
 * 15.- - (Protección de cheques) Para evitar la alteración de una cantidad en un cheque, la mayoría de
 * los sistemas computarizados que emiten cheques emplean una técnica llamada protección de
 * cheques. Los cheques diseñados para impresión por computadora contienen un número fijo de
 * espacios en los cuales la computadora puede imprimir una cantidad. Suponga que un cheque
 * contiene ocho espacios en blanco en los cuales la computadora puede imprimir la cantidad de un
 * cheque de nómina. Si la cantidad es grande, entonces se llenarán los ocho espacios. Por ejemplo:
 *      1,230.60 (cantidad del cheque)
 *      --------
 *      12345678 (números de posición)
 * 
 * Por otra parte, si la cantidad es menor de $1,000, entonces varios espacios quedarían vacíos. Por 
 * ejemplo:
 *      99.87
 *      --------
 *      12345678
 * contiene tres espacios en blanco. Si se imprime un cheque con espacios en blanco, es más fácil para 
 * alguien alterar la cantidad del cheque. Para evitar que se altere el cheque, muchos sistemas de
 * escritura de cheques insertan asteriscos al principio para proteger la cantidad, como se muestra a
 * continuación:
 *      ***99.87
 *      --------
 *      12345678
 * Escriba una aplicación que reciba como entrada una cantidad a imprimir sobre un cheque y que lo
 * escriba mediante el formato de protección de cheques, con asteriscos al principio si es necesario.
 * Suponga que existen nueve espacios disponibles para imprimir la cantidad.
 * 
 */

/* Import */
import java.util.Scanner;

public class Ejercicio15 {
    public static void main(String[] args){

        /* Atributos */
        double cantidad;
        String cantidadF;

        Scanner teclado = new Scanner(System.in);

        //Le pedimos la cantidad al usuario
        System.out.print("Escribe la cantidad a imprimir en el cheque: ");
        cantidad = teclado.nextDouble();

        //Llamamos al método para formatear la cantidad que han escrito
        cantidadF = formatearCantidad(cantidad);
        System.out.println("Cantidad en formato de protección de cheques: " + cantidadF);

        teclado.close();
    }

    /* Métodos */
    public static String formatearCantidad(double cantidad) {
        String cantidadS = String.format("%.2f", cantidad); //Pasamos la cantidad a decimales
        int longitud = cantidadS.length();

        if (longitud < 9) {
            int asteriscos = 9 - longitud;
            StringBuilder cantidadFormateada = new StringBuilder();

            for (int i = 0; i < asteriscos; i++) {
                cantidadFormateada.append('*');
            }

            cantidadFormateada.append(cantidadS);
            return cantidadFormateada.toString();
        } else if (longitud == 9) {
            return cantidadS;
        } else {
            return cantidadS.substring(0, 9); //Tope por si es muy largo
        }
    }
}
