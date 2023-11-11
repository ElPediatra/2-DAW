/* Alberto Gómez Morales - 2º DAW - Libre Configuración
 * 
 * Escribe una apliación que pida el usuario el radio de un círculo y que utilice
 * un método llamado circuloArea para calcular e imprimir el área de ese círculo.
 */

/* Imports */
import java.util.Scanner;

public class Ejercicio_15_Ficha5 {
    public static void main(String[] args){
        /* Atributos */
        Scanner teclado = new Scanner(System.in);
        double radio;
        double area;

        //Pido el radio al usuario
        System.out.println("Escribe el radio del círculo: ");
        radio = teclado.nextDouble();

        //Llamo al método para calcular el área
        area = circuloArea(radio);

        System.out.println("El área del círculo es: " + area);

        teclado.close();
    }

    /* Métodos */
    public static double circuloArea(double radio) {
        return Math.PI * Math.pow(radio, 2);
    }
}
