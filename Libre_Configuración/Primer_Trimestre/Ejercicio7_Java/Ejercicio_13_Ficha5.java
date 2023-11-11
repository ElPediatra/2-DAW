/* Alberto Gómez Morales - 2º DAW - Libre Configuración
 * 
 * Escriba un método llamado cuadradoDeAsteriscos que muestre un cuadrado
 * relleno (el mismo número de filas y columnas) de asteriscos cuyo lado de especifique
 * en el parámetro entero lado. Por ejemplo, si lado es 4, el método debe mostrar:
 * 
 * ****
 * ****
 * ****
 * ****
 * 
 * Incorpore este método a una aplicaci´ón que lea un valor entero para el parámetro lado que teclea el usuario, y despliegue las asteríscos con el método cuadradoDeAsteriscos.
 */

/* Imports */
import java.util.Scanner;

public class Ejercicio_13_Ficha5 {
    public static void main(String[] args){
        /* Atributos */
        Scanner teclado = new Scanner(System.in);
        int lado;

        //Pido el valor del lado al usuario
        System.out.println("Escribe el valor de los lados del cuadrado: ");
        lado = teclado.nextInt();

        //Llamo al método para que imprima el cuadrado
        cuadradoDeAsteriscos(lado);

        teclado.close();
    }

    /* Métodos */
    public static void cuadradoDeAsteriscos(int lado){
        for (int i=0; i<lado; i++){ //Bucle para ir pintando el cuadrado
            for(int j=0; j<lado; j++){
                System.out.print("*");
            }
            System.out.println(); //Salto cuando se acaba la línea de "*"
        }
    }
}