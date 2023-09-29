/* Alberto Gómez Morales - 2º DAW - Libre Configuración
 *
 * 8.- Escriba una aplicación que lea una línea de texto y que imprima sólo aquellas palabras que
 * comiencen con las letras "ED".
 */

import java.util.Scanner;

public class Ejercicio8 {
        public static void main(String[] args) {
        
        /* Atributos */
        String frase;
        String[] palabras;
        Scanner teclado = new Scanner(System.in);

        //Pedimos una frase
        System.out.print("Escribe una frase: ");
        frase = teclado.nextLine();

        //Separo la frase en el array por los espacios
        palabras = frase.split(" ");

        //Creo un bucle para revisar todas las palabras del array y mnuestro las que empiecen por ed
        System.out.println("Palabras que comienzan con 'ED':");
        for (String palabra : palabras) {
            //Quito los caracteres innecesarios y la pasamos a minúscula
            palabra = palabra.replaceAll("[^a-zA-Z]+$", "");
            palabra = palabra.toUpperCase();

            if (palabra.startsWith("ED")) {
                System.out.println(palabra);
            }
        }
        
        teclado.close();
    }
}