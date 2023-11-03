/* Alberto Gómez Morales - 2º DAW - Libre Conifguración
 * 
 * 6.- Un estacionamiento cobra una cuota mínima de 2,00€ por estacionarse hasta tres horas. El
 * estacionamiento cobra 0,50€ adicionales por cada hora o fracción que se pase de tres horas. El
 * cargo máximo para cualquier periodo dado de 24 horas es de 10,00€. Suponga que ningún
 * automóvil se estaciona durante mas de 24 horas a la vez. Escriba una aplicación que calcule y
 * muestre los pagos por estacionamiento para cada cliente que se haya estacionado ayer. Debe
 * introducir las horas de estacionamiento para cada cliente. EI programa debe mostrar el pago para el
 * cliente actual y debe calcular y mostrar el total corriente de los recibos de ayer. El programa debe
 * utilizar el método calcularPagos para determinar el pago para cada cliente.
 */

 import java.util.Scanner;
 
 public class Ejercicio_6_Ficha4 {
    public static void main(String[] args) {
        /* Atributos */
        Scanner teclado = new Scanner(System.in);
        double total = 0.0;
        double horas = 0;
        double pago;

        //Creo bucle para guardar el total hasta que el usuario quiera salir
        while (horas > -1) {
            System.out.print("Pon las horas de estacionamiento (o -1 para salir): ");
            horas = teclado.nextDouble();

            //Si no ha marcado la salida, calculo el cobro y lo añado al total
            if (horas != -1) {
                pago = calcularPagos(horas);
                total += pago;
                
                System.out.println("El cliente debe pagar: " + pago + "€");
            }
        }

        //Mando mensaje de cobro total al finalizar el bucle
        System.out.println("Cobro total de ayer: " + total + "€");

        teclado.close();
    }

    /* Métodos */
    public static double calcularPagos(double horas) {
        /* Atributos */
        double tarifaBase = 2.0;
        double tarifaPorHora = 0.5;
        double tarifaMaxima = 10.0;
        double pago = 0.0;

        //Calculamos que debe
        if (horas <= 3.0) {
            pago = tarifaBase;
        } else if (horas <= 24.0) {
            pago = tarifaBase + Math.ceil(horas - 3) * tarifaPorHora; //Uso Math.ceil para redondear
            pago = Math.min(pago, tarifaMaxima); //Aplico la tarifa máxima si se pasa
        } else {
            pago = tarifaMaxima;
        }

        return pago;
    }
 }