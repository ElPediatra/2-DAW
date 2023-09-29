/* Alberto Gómez Morales - 2º DAW - Horas de Libre Configuración
 * 
 * 6.- Escriba una aplicación con base en el programa del ejercicio
 * anterior, que reciba como entrada una línea de texto y utilice
 * el método indexOf de la case String para determinar el número
 * total de ocurrencias de cada letra del alfabeto en ese texto.
 * Las letras mayúsculas y minúsculas deben contarse como una sola.
 * Imprima los valores en formato tabular.
 */

/* Imports */
import java.util.Scanner;

public class Ejercicio6 {
    public static void main(String[] args){
        /* Atributos */
        String frase;
        int[] contador = new int[28]; //27 letras del abecedario y el espacio
        int aux;
        char letra;

        Scanner teclado = new Scanner(System.in);

        //Pedimos la frase
        System.out.println("Escribe una frase: ");
        frase = teclado.nextLine();
        frase = frase.toLowerCase();

        //Creo un bucle para contar las letras
        for (int i = 0; i < frase.length(); i++) {
            letra = frase.charAt(i);
            if (letra >= 'a' && letra <= 'z') {
                aux = letra - 'a';
                contador[aux]++;
            }
        }

        //Creo un bucle para ir mostrando las letras en orden y su cantidad
        System.out.println("Letra\tCantidad");
        for (char aux2 = 'a'; aux2 <= 'z'; aux2++) {
            int indice = aux2 - 'a';
            int cantidad = contador[indice];
            if (cantidad > 0) {
                System.out.println(aux2 + "\t" + cantidad);
            }
        }

        teclado.close();
    }    
}