/* Alberto Gómez Morales - 2º DAW - Libre Configuración
 * 
 *  14.- (Impresión de fechas en varios formatos) Las fechas se imprimen en varios formatos comunes.
 * Dos de los formatos más utilizados son:
 * 
 *      25/05/2020 y 25 de abril de 2020
 * 
 * Escriba una aplicación que lea una fecha en el primer formato e imprima dicha fecha en el segundo
 * formato.
 * 
 */

/* Imports */
import java.time.LocalDate; //Fecha actual
import java.time.format.DateTimeFormatter; //Formateador de fecha
import java.util.Scanner;

public class Ejercicio14 {
    public static void main(String[] args){
        /* Atributos */
        String fecha1;
        String fecha2;
        DateTimeFormatter formato1;
        DateTimeFormatter formato2;
        LocalDate fecha; //Import para aplicar fecha y formato


        Scanner teclado = new Scanner(System.in);

        //Le pido al usuario la fecha en el formato "dd/MM/yyyy"
        System.out.print("Escribe una fecha (en formato dd/MM/yyyy): ");
        fecha1 = teclado.nextLine();

        //Creo los 2 formatos de fecha que necesito
        formato1 = DateTimeFormatter.ofPattern("dd/MM/yyyy");
        formato2 = DateTimeFormatter.ofPattern("dd 'de' MMMM 'de' yyyy");


        //Try and Catch para verificar la fecha, asignar el 2º formato  y que no se bloquee
        try {
            fecha = LocalDate.parse(fecha1, formato1);
            fecha2 = fecha.format(formato2);

            System.out.println("La fecha en el segundo formato es: " + fecha2);
        } catch (Exception e) {
            System.out.println("Formato de fecha no válido. Escribelo de esta manera dd/MM/yyyy.");
        }

        teclado.close();
    }
}
