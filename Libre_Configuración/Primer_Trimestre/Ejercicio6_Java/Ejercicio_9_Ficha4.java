/* Alberto Gómez Morales - 2º DAW - Libre Configuración
 * 
 * 9.- Escriba un método llamado enteroPotencia( base, exponente ) que devuelva el valor de base(elevado a exponente)
 * Por ejemplo, enteroPotencia( 3, 4 ) calcula 34 (0 3 * 3 * 3 * 3 ). Suponga que exponente es un entero
 * positivo distinto de cero y que base es un entero. El método enteroPotencia debe utilizar un ciclo for
 * o while para controlar el calculo. No utilice ningún método de la biblioteca de matemáticas.
 * Incorpore este método en una aplicación que lea valores enteros para base y exponente, y que
 * realice el calculo con el método enteroPotencia. Realice ahora el método enteroPotenciaRecursivo
 * que realizará el mismo cálculo pero de forma recursiva.
 */

/* Imports */
import java.util.Scanner;

public class Ejercicio_9_Ficha4 {
    public static void main(String[] args) {
        /* Atributos */
        Scanner teclado = new Scanner(System.in);
        int base;
        int exponente;
        int resultado;
        int resultadoRecursivo;

        //Pido la base y el exponente al usuario
        System.out.print("Escribe la base: ");
        base = teclado.nextInt();

        System.out.print("Escribe el exponente: ");
        exponente = teclado.nextInt();

        //Llamo a los método para calcular el resultado y lo muestro
        resultado = enteroPotencia(base, exponente);
        resultadoRecursivo = enteroPotenciaRecursivo(base, exponente);

        System.out.println(base + " elevado a " + exponente + " (iterativo) es igual a " + resultado);
        System.out.println(base + " elevado a " + exponente + " (recursivo) es igual a " + resultadoRecursivo);

        teclado.close();
    }

    /* Métodos */
    public static int enteroPotencia(int base, int exponente) {
        int resultado = 1;

        for (int i = 0; i < exponente; i++) {
            resultado *= base;
        }

        return resultado;
    }

    public static int enteroPotenciaRecursivo(int base, int exponente) {
        if (exponente == 0) {
            return 1;
        } else {
            return base * enteroPotenciaRecursivo(base, exponente - 1);
        }
    }
}

