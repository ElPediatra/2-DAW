/* Alberto Gómez Morales - 2º DAW - Libre Configuración
 * 
 * Escriba un método esPar que utilice el operador residuo (%) para determinar si un entero
 * dado es par. El método debe tomar un argumento entero y devolver true si el entero es
 * par, y false en caso contrario. Incorpore este método en una apliación que reciba como
 * entrada una secuencia de enteros (uno a la vez), y que determine si cada uno es par o
 * impar.
 */

/* Imports */
import java.util.Scanner;

public class Ejercicio_12_Ficha5 {
    public static void main(String[] args){
        /* Atributos */
        Scanner teclado = new Scanner(System.in);
        int numero;

        //Mando mensaje solicitando los datos al usuario
        System.out.println("Escribe números e iré comprobando si son pares o impares. Escribe 'fin' para terminar");

        //Indico que mientras que lo que escriba el usuario sea un int (número), ejecute este comando
        while(teclado.hasNextInt()) {
            numero = teclado.nextInt();
                if (esPar(numero)){
                    System.out.println("El número " + numero + " es par.");
                } else {
                    System.out.println("El número " + numero + " es impar.");
                }
        }

        teclado.close();
    }

    public static boolean esPar(int numero) {
        return numero % 2 == 0;
    }
}