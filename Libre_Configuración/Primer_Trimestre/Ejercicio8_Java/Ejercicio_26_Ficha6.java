/* Alberto Gómez Morales - 2º DAW - Libre Configuración
 * 
 * Escriba una apliación que juege a "adivina el número" de la siguiente manera: su
 * programa elige un número a adivinar, seleccionando un entero aleatorio en el rango
 * de 1 a 1000. El jugador escribe su primer intento. Si la respuesta del jugador es
 * incorrecta, su programa debe mostrar el mensaje "Demasiado alto. Intente de nuevo" o
 * "Demasiado bajo. Intente de nuevo", para ayudar a que el jugador se acerque a la
 * respuesta correcta. El programa debe pedir al usuario que escriba su siguiene intento.
 * Cual el usuario escriba la respuesta correcta, muestre el mensaje "Felicidades. Adivinó
 * el número!". Y premita que el usuario elija si desea jugar otra vez.
 */


/* Paquetes */
package Libre_Configuración.Primer_Trimestre.Ejercicio8_Java;

/* Imports */
import java.util.Scanner;

public class Ejercicio_26_Ficha6 {
        public static void main(String[] args) {
        Scanner teclado = new Scanner(System.in);
        String respuesta;

        do {
            int numeroAdivinar = (int) (Math.random() * 1000) + 1;
            int intento;
            boolean adivinado = false;

            System.out.println("¡Bienvenido a 'Adivina el número'!");
            System.out.println("Hemos generado un número entre 1 y 1000. ¡Adivina cuál es!");

            while (!adivinado) {
                System.out.print("Escribe un número: ");
                intento = teclado.nextInt();

                if (intento == numeroAdivinar) {
                    System.out.println("¡Felicidades! Adivinaste el número.");
                    adivinado = true;
                } else if (intento > numeroAdivinar) {
                    System.out.println("Demasiado alto. Inténtalo de nuevo.");
                } else {
                    System.out.println("Demasiado bajo. Inténtalo de nuevo.");
                }
            }

            System.out.print("¿Deseas jugar otra vez? (s/n): ");
            respuesta = teclado.next();
        } while (respuesta.equalsIgnoreCase("s"));

        System.out.println("¡Gracias por jugar! Hasta luego.");
        teclado.close();
    }
}
