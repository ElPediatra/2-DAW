/* Alberto Gómez Morales - 2º DAW - Libre Configuración
 * 
 * Modifique el método creado en el ejercicio anterior para formar el cuadrado de
 * cualquier carácter que este contenido en el parámetro tipo carácter caracterRelleno.
 * Por ejemplo, si lado es 5 y caracterRelleno es "#", el método debe imprimir:
 * 
 * #####
 * #####
 * #####
 * #####
 * #####
 */

/* Imports */
import java.util.Scanner;

public class Ejercicio_14_Ficha5 {
    public static void main(String[] args){
        /* Atributos */
        Scanner teclado = new Scanner(System.in);
        int lado;
        char caracterRelleno;

        //Pido el valor del lado al usuario y con lo que quiere que se dibuje el cuadrado
        System.out.println("Escribe el valor de los lados del cuadrado: ");
        lado = teclado.nextInt();
        System.out.println("Escribe el carácter con el que quieres que lo imprimamos: ");
        caracterRelleno = teclado.next().charAt(0);

        //Llamo al método para que imprima el cuadrado
        cuadradoDeAsteriscos(lado, caracterRelleno);

        teclado.close();
    }

    /* Métodos */
    public static void cuadradoDeAsteriscos(int lado, char caracterRelleno){
        for (int i=0; i<lado; i++){ //Bucle para ir pintando el cuadrado
            for(int j=0; j<lado; j++){
                System.out.print(caracterRelleno);
            }
            System.out.println(); //Salto cuando se acaba la línea de "*"
        }
    }
}
