/* Alberto Gómez Morales - 2º DAW - Libre configuración
 * 
 * 12.- Escriba una aplicación que lea una línea de texto desde el teclado e imprima una tabla que
 *  indique el número de ocurrencias de cada letra del alfabeto en el texto. Por ejemplo, la frase:
 *      Ser o no ser: ése es el dilema:
 *      contiene una “a”, ninguna “b”, ninguna “c”, etcétera.
 */

/* Imports */
import java.util.Scanner;

public class Ejercicio12 {
    public static void main(String[] args){
        /* Atributos */
        String texto;
        char letra;
        int aux;
        int[] contador = new int[26];

        Scanner teclado = new Scanner(System.in);

        // Solicitar al usuario que introduzca una línea de texto
        System.out.print("Introduce una línea de texto: ");
        texto = teclado.nextLine();

        // Convertir el texto a minúsculas para contar letras sin distinción de mayúsculas/minúsculas
        texto = texto.toLowerCase();

        // Iterar sobre el texto para contar las ocurrencias de letras
        for (int i = 0; i < texto.length(); i++) {
            letra = texto.charAt(i);
            if (letra >= 'a' && letra <= 'z') {
                aux = letra - 'a';
                contador[aux]++;
            }
        }

        // Imprimir la tabla de ocurrencias de letras
        System.out.println("Letras y su cantidad:");
        for (char aux2 = 'a'; aux2 <= 'z'; aux2++) {
            int aux3 = aux2 - 'a';
            int cantidad = contador[aux3];
            System.out.println("'" + aux2 + "': " + cantidad);
        }

        teclado.close();
    }    
}