/* Alberto Gómez Morales - 2º DAW - Horas de Libre Configuración
 * 
 * 4.- Escriba una aplicación que reciba como entrada una línea de
 * texto y que la imprima dos veces; una vez en letras mayúsculas y
 * otra en letras minúsculas.
 */

import java.util.Scanner;

public class Ejercicio4 {
    public static void main(String[] args)    {
        /* Atributos */
        String frase;
        String mayuscula;
        String minuscula;
        
        Scanner teclado = new Scanner(System.in);

        //Pedimos la frase
        System.out.println("Indicame la frase por favor:");
        frase = teclado.nextLine();

        mayuscula = frase.toUpperCase();
        minuscula = frase.toLowerCase();

        System.out.println("La frase es mayúsculas es: '"+mayuscula+"'.");
        System.out.println("La frase en minúsculas es: '"+minuscula+"'.");
    }
}