/* Alberto Gómez Morales - 1º DAW - Libre Configuración
 * 
 * 11.- Escriba un método llamado múltiplo que determine, para un par de enteros, si el segundo entero
 * es múltiplo del primero. EI método debe tomar dos argumentos enteros y devolver true si el
 * segundo es múltiplo del primero, y false en caso contrario. [Sugerencia: utilice el operador residuo].
 * Incorpore este método en una aplicación que reciba como entrada una serie de pares de enteros y
 * determine si el segundo valor en cada par es un múltiplo del primero.
 */

/* Imports */
import java.util.Scanner;

public class Ejercicio_11_Ficha4 {
    public static void main(String[] args) {
        /* Atributos */
        Scanner teclado = new Scanner(System.in);
        int numero1;
        int numero2;
        boolean resultado;

        //Le pido los números al usuario
        System.out.print("Escribe el primer número entero: ");
        numero1 = teclado.nextInt();
        System.out.print("Escribe el segundo número entero: ");
        numero2 = teclado.nextInt();

        //Llamo al método para comprobar si es múltiplo o no
        resultado = esMultiplo(numero1, numero2);

        //Depende del resultado devuelvo un menaje u otro
        if (resultado) {
            System.out.println(numero2 + " es múltiplo de " + numero1);
        } else {
            System.out.println(numero2 + " no es múltiplo de " + numero1);
        }

        teclado.close();
    }

    /* Métodos */
    public static boolean esMultiplo(int numero1, int numero2) {
        return numero2 % numero1 == 0;
    }
}

