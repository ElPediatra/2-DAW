/* Alberto Gómez Morales - 2º DAW - Libre Configuración
 * 
 * 9.- Escriba una aplicación que reciba como entrada un código entero para un carácter y que muestre
 * el carácter correspondiente.
 */

/* Imports */
import java.util.Scanner;

public class Ejercicio9 {
    public static void main(String[] args){
        /* Atributos */
        int codigo;
        char letra;

        Scanner teclado = new Scanner(System.in);

        //Pedimos el número a transformar
        System.out.print("Escribe un número entero para una letra: ");
        codigo = teclado.nextInt();

        //Revisamos si el número está en el rango y lo transformamos
        if (codigo >= 0 && codigo <= Character.MAX_CODE_POINT) {
            letra = Character.toChars(codigo)[0];

            System.out.println("La letra/simbolo que corresponde al número " + codigo + " es: " + letra);
        } else {
            System.out.println("El número indicado no es válido.");
        }

        teclado.close();
    }
}