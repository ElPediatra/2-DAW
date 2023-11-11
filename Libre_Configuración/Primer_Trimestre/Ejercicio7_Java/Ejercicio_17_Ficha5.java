/* Alberto Gómez Morales - 2º DAW - Libre Configuración
 * 
 * Implementa los siguientes métodos enteros:
 * 
 * a) El método centígrados que devuelve la equivalencia en grados centígrados de una
 * temperatura en grados fahrenheit, utilizando el cálculo:
 *      centigrados = 5.0 / 9.0 * (fahrenheit - 32);
 * 
 *      public static double centigrados(double fahrenheit) {
 *          return 5.0 / 9.0 * (fahrenheit - 32);
 *      }

 * 
 * b) El método fahrenheit que devuelve la equivalencia en grados fahrenheit de una
 * temperatura en grados centígrados, utilizando el cálculo:
 *      fahrenheit = 9.0 / 5.0 * centigrados + 32;
 * 
 *      public static double fahrenheit(double centigrados) {
 *           return 9.0 / 5.0 * centigrados + 32;
 *      }
 * 
 * c) Utilice los métodos de las partes a) y b) para escribir una aplicación que
 * permita el usuario, ya sea escribir una temperatura en grados fahrenheit y mostrar
 * su equivalente en grados centígrados, o escribir una temperatura en grados centígrados
 * y mostrar su equivalente en grados fahrenheit.
 */

/* Imports */
import java.util.Scanner;

public class Ejercicio_17_Ficha5 {
    public static void main(String[] args){
        /* Atributos */
        Scanner teclado = new Scanner(System.in);
        double temperatura;
        int opcion;

        //Le pido la temperatura al usuario
        System.out.println("Escribe una temperatura: ");
        temperatura=teclado.nextDouble();

        //Le pido que me indique si es centígrados o fahrenheit
        System.out.println("¿La temperatura está en grados (1) Fahrenheit o (2) Centígrados?: ");
        opcion=teclado.nextInt();

        //Llamo a los métodos dependiendo del resultado o indico que no es correcto
        if (opcion == 1) {
            System.out.println("La temperatura en grados Centígrados es: " + centigrados(temperatura));
        } else if (opcion == 2) {
            System.out.println("La temperatura en grados Fahrenheit es: " + fahrenheit(temperatura));
        } else {
            System.out.println("Opción no válida.");
        }

        teclado.close();
    }

    /* Métodos */
    public static double centigrados(double fahrenheit) { //Calcular centígrados
        return 5.0 / 9.0 * (fahrenheit - 32);
    }

    public static double fahrenheit(double centigrados) { //Calcular fahrenheit
        return 9.0 / 5.0 * centigrados + 32;
    }
}