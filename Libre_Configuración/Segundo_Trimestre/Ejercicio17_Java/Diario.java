package Libre_Configuración.Segundo_Trimestre.Ejercicio17_Java;

/* Imports */
import java.io.*;
import java.util.*;


public class Diario {
    public static void main(String[] args) {
        /* Variables */
        Scanner teclado = new Scanner(System.in);
        String entrada;
        String fecha;

        //Solicito al usuario una fecha
        System.out.println("Introduce la fecha para la nueva entrada del diario (formato: dd-mm-yyyy):");
        fecha = teclado.nextLine();

        //Solicito al usuario una entrada para el diario
        System.out.println("Escribe tu entrada del diario. Pulsa INTRO cuando hayas terminado:");
        entrada = teclado.nextLine();

        try {
            //Creo un FileWriter para escribir en el archivo 'diario.txt'
            //El segundo argumento 'true' indica que se añadirán datos al final del archivo si ya existe
            FileWriter writer = new FileWriter("diario.txt", true);

            //Creo un BufferedWriter para escribir en el archivo
            BufferedWriter buffer = new BufferedWriter(writer);

            //Escribo la fecha y la entrada del diario en el archivo 'diario.txt'
            buffer.write("\n\nFecha: " + fecha + "\n");
            buffer.write(entrada);

            //Cierro el BufferedWriter
            buffer.close();

            //Aviso al usuario de que la entrada del diario se ha guardado correctamente
            System.out.println("Entrada del diario guardada con éxito.");
        } catch (IOException e) {
            //Informo al usuario de que ha ocurrido un error al guardar la entrada del diario
            System.out.println("Ha ocurrido un error al guardar la entrada del diario.");

            //Devuelvo el mensaje con la excepción que ha dado
            e.printStackTrace();
        }

        teclado.close();
    }
}
