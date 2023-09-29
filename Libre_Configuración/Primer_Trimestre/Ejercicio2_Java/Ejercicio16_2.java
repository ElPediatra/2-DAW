/* Alberto Gómez Morales - 2º DAW - Libre Configuración
 * 
 * 16.- (Clave Morse) Quizá el más famoso de todos los esquemas de codificación es el código Morse,
 * desarrollado por Samuel Morse en 1832 para usarlo con el sistema telegráfico. El código Morse
 * asigna una serie de puntos y guiones a cada letra del alfabeto, cada dígito y algunos caracteres
 * especiales (tales como el punto, la coma, los dos puntos y el punto y coma). En los sistemas
 * orientados a sonidos, el punto representa un sonido corto y el guión representa un sonido largo.
 * Otras representaciones de puntos y guiones se utilizan en los sistemas orientados a luces y sistemas
 * de señalización con banderas. La separación entre palabras se indica mediante un espacio o,
 * simplemente, con la ausencia de un punto o un guión. En un sistema orientado a sonidos, un espacio
 * se indica por un tiempo breve durante el cual no se transmite sonido alguno.
 * 
 * Escriba una aplicación que lea una frase en español y que codifique la frase en clave Morse.
 * Además, escriba una aplicación que lea una frase en código Morse y que la convierta en su
 * equivalente en español. Use un espacio en blanco entre cada letra en clave Morse, y tres espacios en
 * blanco entre cada palabra en clave Morse.
 * 
 */

import java.util.Scanner;

public class Ejercicio16_2 {
    public static void main(String[] args){

        /* Atributos */
        String[] morse = { //Creo un array con el código Morse para cada letra y dígito (0-9)
            ".-", "-...", "-.-.", "-..", ".", "..-.", "--.", "....", "..", ".---",
            "-.-", ".-..", "--", "-.", "---", ".--.", "--.-", ".-.", "...", "-",
            "..-", "...-", ".--", "-..-", "-.--", "--..", "-----", ".----", "..---", "...--", "....-", "....."
        };
        String fraseMorse;
        String[] palabras;
        String[] letras;

        Scanner teclado = new Scanner(System.in);

        //Pedimos la frase en morse al usuario
        System.out.print("Escribe el código Morse para decodificar: ");
        fraseMorse = teclado.nextLine();

        // Decodificar el código Morse en texto
        StringBuilder frase = new StringBuilder();
        palabras = fraseMorse.split("   "); //Añado la separación de 3 espacios entre palabras
        for (String palabra : palabras) {
            letras = palabra.split(" "); //Separamos cada letra con espacios
            for (String letra : letras) {
                for (int i = 0; i < morse.length; i++) {
                    if (letra.equals(morse[i])) {
                        if (i < 26) {
                            frase.append((char) ('A' + i));
                        } else {
                            frase.append((char) ('0' + i - 26));
                        }
                        break; //Necesito romper el bucle
                    }
                }
            }
            frase.append(" "); //Añado espacios entre las palabras
        }

        //Devuelvo la frase en español
        System.out.println("Frase en español: " + frase.toString());

        teclado.close();
    }
}
