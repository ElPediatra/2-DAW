/* Alberto Gómez Morales - 2º DAW - Libre Configuración
 *
 * 7.- Escriba una aplicación que lea una línea de texto y que imprima sólo aquellas palabras que
 * comiencen con la letra "b".
 */

import java.util.Scanner;

public class Ejercicio7 {
        public static void main(String[] args) {
        
        /* Atributos */
        String lineaTexto;
        String[] palabras;
        Scanner scanner = new Scanner(System.in);

        //Pedimos una frase
        System.out.print("Escribe una frase: ");
        lineaTexto = scanner.nextLine();

        //Separo la frase en el array por los espacios
        palabras = lineaTexto.split(" ");

        //Creo un bucle para revisar todas las palabras del array y mnuestro las que empiecen por b
        System.out.println("Palabras que comienzan con 'b':");
        for (String palabra : palabras) {
            //Quito los caracteres innecesarios y la pasamos a minúscula
            palabra = palabra.replaceAll("[^a-zA-Z]+$", "");
            palabra = palabra.toLowerCase();

            if (palabra.startsWith("b")) {
                System.out.println(palabra);
            }
        }
    }
}