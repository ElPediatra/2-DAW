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

 /* Imports */
import java.util.Scanner;

public class Ejercicio16_1 {
    public static void main(String[] args){
        /* Atributos */
        String[] morse = { //Creo un array con el código Morse para cada letra y dígito (0-9)
            ".-", "-...", "-.-.", "-..", ".", "..-.", "--.", "....", "..", ".---",
            "-.-", ".-..", "--", "-.", "---", ".--.", "--.-", ".-.", "...", "-",
            "..-", "...-", ".--", "-..-", "-.--", "--..", "-----", ".----", "..---", "...--", "....-", "....."
        };
        String frase;
        int aux;

        Scanner teclado = new Scanner(System.in);

        //Pedimos la frase en español al usuario
        System.out.print("Escribe una frase para codificar en clave Morse: ");
        frase = teclado.nextLine().toUpperCase();

        //Pasamos la frase a Código Morse
        StringBuilder codigoMorse = new StringBuilder();
        for (char letra : frase.toCharArray()) {
            if (letra >= 'A' && letra <= 'Z') {
                aux = letra - 'A';
                codigoMorse.append(morse[aux]).append(" ");
            } else if (letra >= '0' && letra <= '9') {
                aux = letra - '0' + 26;
                codigoMorse.append(morse[aux]).append(" ");
            } else if (letra == ' ') {
                codigoMorse.append(" ");
            }
        }

        //Devolvemos la frase en morse
        System.out.println("Frase en clave Morse: " + codigoMorse.toString());

        teclado.close();
    }
}
