//Alberto Gómez Morales - 2º DAW - Libre Configuración - 1º Ejercicio repaso Java (String y relacionados)

/* Imports */
import java.util.Scanner;

/*
 * Pedir por teclado una cadena:
 * Mostrar menú:
 *  - Mostrarla al revés
 *  - Contar el nº de vocales
 *  - Contar el nº de consonantes
 *  - Pasar todo a minúscula
 *  - Pasar todo a mayúscula
 *  - Decir si es palíndroma
 */

public class Ejercicio1_GomezMorales_Alberto {
    public static void main(String args[]){
        /* Variables */
        Scanner teclado = new Scanner(System.in);

        String palabra;
        int opcion;


        do{
            System.out.println("Escribe una palabra, o pon 'salir' para cerrar el programa");
            palabra = teclado.nextLine();

            if(!palabra.equalsIgnoreCase("salir")){
                System.out.println("Selecciona una de las opciones:");
                System.out.println("1) Mostar la palabra al revés.");
                System.out.println("2)");

            }

        }while(!palabra.equalsIgnoreCase("salir"));
        
        System.out.println("Hasta la próxima!");
    }
}