/* Alberto Gómez Morales - 2º DAW - Libre Configuración
 * 
/* 
 * Se dice que un número entero es un número perfecto si sus factores, incluyendo 1
 * (pero no el número entero), al sumarse dan como resultado el número entero. Por
 * ejemplo, 6 es un número perfecto ya que 6 = 1 + 2 + 3. Escriba un método llamado
 * perfecto que determine si el parámetro número es un número perfecto. Use este método
 * en una apliación que determine y muestre todos los números perfectos entre 1 y 1000.
 * Imprima los factores de cada número perfecto para confirmar que él número sea relamente
 * perfecto. Ponga a prueba el poder de su computadora, evaluando números más grande que
 * 1000. Muestre los resultados.
 */

/* Paquetes */
package Libre_Configuración.Primer_Trimestre.Ejercicio8_Java;

public class Ejercicio_19_Ficha6 {
        public static void main(String[] args) {
        for (int i = 1; i <= 1000; i++) {
            if (esPerfecto(i)) {
                System.out.print(i + ": ");
                for (int j = 1; j < i; j++) {
                    if (i % j == 0) {
                        System.out.print(j + " ");
                    }
                }
                System.out.println();
            }
        }
    }

    /* Métodos */
    public static boolean esPerfecto(int numero) {
        int suma = 0;
        for (int i = 1; i < numero; i++) {
            if (numero % i == 0) {
                suma += i;
            }
        }
        return suma == numero;
    }

}
