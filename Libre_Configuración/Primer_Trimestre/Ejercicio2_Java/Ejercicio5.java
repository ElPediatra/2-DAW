/* Alberto Gómez Morales - 2º DAW - Horas de Libre Configuración
 * 
 * 5.- Escriba una apliación que reciba como entrada una líena de texto
 * y un carácter de búsqueda, y que utilice el método indexOf de la
 * clase String para determinar el número de ocurrencias de ese
 * carácter en el texto.
 */

/* Imports */
import java.util.Scanner;

public class Ejercicio5 {
    public static void main(String[] args){
        /* Atributos */
        String frase;
        char letra;
        int contador = 0;
        int aux;

        Scanner teclado = new Scanner(System.in);

        //Solicitamos la frase
        System.out.println("Escribe una frase: ");
        frase = teclado.nextLine();
        frase = frase.toLowerCase();

        System.out.println("Escribe la letra que quieres buscar: ");
        letra = teclado.next().charAt(0);

        //Utilizamos el auxiliar para ir buscando en la frase y vamos aumentando el contador
        aux = frase.indexOf(letra);
        while(aux != -1){
            contador++;
            aux = frase.indexOf(letra, aux+1); //Iteramos en la frase
        }

        //Mostramos el restultado
        System.out.println("La letra " + letra + " está " + contador + " veces.");

        teclado.close();
    }
}