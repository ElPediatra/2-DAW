/* Alberto Gómez Morales - 2º DAW - Libre Configuración
 * 
 * 11.- (Clase Fecha) Cree la clase Fecha con las siguientes capacidades:
 *  a) Imprimir la fecha en varios formatos, como
 *      MM,'DD/AAAA
 *      Junio 15, 1992
 *      DDD AAAA
 *  b) Usar constructores sobrecargados para crear objetos Fecha inicializados con fechas de los
 * formatos en la parte (a). En el primer caso, el constructor debe recibir tres valores enteros.
 * En el segundo caso, debe recibir un objeto String y dos valores enteros. En el tercer caso
 * debe recibir dos valores enteros, eI primero de los cuales representa eI número de día en eI
 * año, [Sugerencia: para convertir la representación de cadena del mes a un valor numérico,
 * compare las cadenas usando el método equals . Por ejemplo, Si SI y s2 son cadenas, la
 * llamada al método sl .equals( s2 ) devuelve true si las cadenas son idénticas y devuelve false
 * en cualquier otro caso].
 */

/* Paquetes */
package Libre_Configuración.Primer_Trimestre.Ejercicio5_Java.Ejercicio5_11;

public class Principal {
    public static void main(String[] args) {

        /* Creo los objetos Fecha y los muestro de las 2 maneras que faltan */
        Fecha fecha1 = new Fecha(6, 15, 1992);
        fecha1.imprimirFormato1();
        fecha1.imprimirFormato2();

        Fecha fecha2 = new Fecha("Junio", 15, 1992);
        fecha2.imprimirFormato1();
        fecha2.imprimirFormato2();

        Fecha fecha3 = new Fecha(167, 1992);
        fecha3.imprimirFormato1();
        fecha3.imprimirFormato2();
    }
}