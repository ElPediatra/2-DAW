/* Alberto Gómez Morales - 2º DAW - Horas de Libre Configuración
 * 
 * 3.- Escriba una aplicación que utilice el método compareTo de la
 * clase String para comparar dos cadenas introducidas por el usuario.
 * Muestre si la primera cadena es menor, igual o mayor que la segunda.
 */

/* Imports */
import java.util.Scanner;

public class Ejercicio3 {
    public static void main (String[] args){
        /* Atributos */
        String frase1;
        String frase2;
        int resultado;
        
        Scanner teclado = new Scanner(System.in);

        //Pedimos las cadenas
        System.out.println("Escribe la primera frase:");
        frase1 = teclado.nextLine();
        System.out.println("Escribe la segunda frase:");
        frase2 = teclado.nextLine();

        //Hacemos la comparación con compareTo
        resultado = frase1.compareTo(frase2);

        //Dependiendo del resultado indicamos si es menor, igual o mayor
        if (resultado < 0){
            System.out.println("La primera frase es más larga.");
        } else if (resultado > 0) {
            System.out.println("La primera frase es más pequeña.");
        } else {
            System.out.println("Las 2 frases son iguales.");
        }

        teclado.close();
    }
}