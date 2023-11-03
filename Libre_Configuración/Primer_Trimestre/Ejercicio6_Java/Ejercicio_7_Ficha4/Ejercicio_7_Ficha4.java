/* Alberto Gómez Morales - 2º DAW - Libre Configuración
 * 
 * 7.- Una aplicación del método Math.floor es redondear un valor al siguiente entero. La instrucción
 *                  y Math.floor( x + 0.5
 * redondea el numero x al entero mas cercano y asigna el resultado a y. Escriba una aplicación que lea
 * valores double y que utilice la instrucción anterior para redondear cada uno de los números a su
 * entero mas cercano. Para cada numero procesado, muestre tanto el numero original como el
 * redondeado.
 */

/* Imports */
import java.util.Scanner;

public class Ejercicio_7_Ficha4 {
    public static void main(String[] args) {
        /* Atributos */
        Scanner teclado = new Scanner(System.in);
        double numero = 0;
        int redondeo;

        while (numero > -1) {
            System.out.print("Escribe un número decimal (o -1 para salir): ");
            numero = teclado.nextDouble();

            if (numero > -1) {
                redondeo = (int) Math.floor(numero + 0.5); //Uso Math.Floor para redondear a la baja

                System.out.println("Número original: " + numero);
                System.out.println("Número redondeado: " + redondeo);
            }
        }

        teclado.close();
    }
}