/* Alberto Gómez Morales - 2º DAW - Libre Configuración
 * 
 * 13.- Escriba una aplicación que lea una línea de texto e imprima una tabla que indique el número de
 * palabras de una letra, de dos letras, de tres letras, etcétera, que aparezcan en el texto. Por ejemplo,
 * en la siguiente tabla se muestra la cuenta para la frase
 */

/* Imports */
import java.util.Scanner;

public class Ejercicio13 {
    public static void main(String[] args){
        /* Atributos */
        String texto;
        String[] palabras;
        int[] contador;
        int longitud;

        Scanner teclado = new Scanner(System.in);

        //Pedimos la frase al usuario
        System.out.print("Escribe una frase: ");
        texto = teclado.nextLine();

        //Separo las frases mediante los espacios que deja el usuario en la frase y asigno el tamaño al array dependiendo del tamaño de la frase del usuario
        palabras = texto.split(" ");
        contador = new int[texto.length() + 1];

        //Creo un bucle for each para contar las palabras y su longitud
        for (String palabra : palabras) {
            longitud = palabra.length();
            contador[longitud]++;
        }

        //Creo otro bucle for each para mostrar la información
        System.out.println("Tabla de ocurrencias de palabras por longitud:");
        for (int i = 1; i < contador.length; i++) {
            int cantidad = contador[i];
            if (cantidad > 0) {
                System.out.println("Palabras de longitud " + i + ": " + cantidad);
            }
        }

        teclado.close();
    }
}