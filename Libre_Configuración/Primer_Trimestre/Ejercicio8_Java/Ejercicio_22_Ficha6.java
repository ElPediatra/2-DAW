/* Alberto Gómez Morales - 2º DAW - Libre Configuración
 * 
 * Escriba una apliación que simule el lanzamiento de monedas. Deje que el programa
 * lance una moneda cada vez que el usuario seleccione la opción del menú "Lanzar
 * moneda". Cuente el número de veces que aparezca cada uno de los lados de la moneda.
 * Muestr los reulstados. El programa debe llamar a un método separado, llamado tirar,
 * que no tome argumentos y devuelva false en caso de cara, y true en caso de cruz. [Nota:
 * si el programa simula en forma realista el lanzamiento de monedas, cada lado de la moneda
 * deve aparecer aproximadamente la mitdad del tiempo.]
 */


/* Paquetes */
package Libre_Configuración.Primer_Trimestre.Ejercicio8_Java;

/* Import */
import java.util.Scanner;

public class Ejercicio_22_Ficha6 {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        int caraCount = 0;
        int cruzCount = 0;
        
        System.out.println("Bienvenido al simulador de lanzamiento de monedas");
        
        while (true) {
            System.out.println("Selecciona una opción:");
            System.out.println("1. Lanzar moneda");
            System.out.println("2. Salir");
            
            int opcion = scanner.nextInt();
            
            if (opcion == 1) {
                boolean resultado = tirar();
                
                if (resultado) {
                    cruzCount++;
                    System.out.println("Ha salido Cruz.");
                } else {
                    caraCount++;
                    System.out.println("Ha salido Cara.");
                }
            } else if (opcion == 2) {
                break;
            } else {
                System.out.println("Opción inválida. Intentalo de nuevo.");
            }
        }
        
        System.out.println("Resultados:");
        System.out.println("Cara: " + caraCount + " veces");
        System.out.println("Cruz: " + cruzCount + " veces");
        
        scanner.close();
    }
    
    public static boolean tirar() {
        double random = Math.random();
        
        if (random >= 0.5) {
            return true; // Cruz
        } else {
            return false; // Cara
        }
    }
}
