/* Alberto Gómez Morales - 2º DAW - Libre Configuración
 *
 * 14.- (DNI) Se desea crear una clase que represente un DNI español y que tenga las siguientes
 * características:
 * 
 * • La clase almacenará el número de DNI en un int, sin guardar la letra, pues se puede calcular
 * a partir del número. Este atributo será privado a la clase. Formato del atributo: private int
 * numeroDni.
 * 
 * • Para acceder al DNI se dispondrá de dos métodos get, uno que proporcionará el número de
 * DNI (sólo las cifras numéricas) y Otro que devolverá el NIF completo (incluida la letra). EI
 * formato del método será:
 *  public int getNumeroDni ()
 *  public String getNif O
 *
 * • Para modificar el DNI se dispondrá de dos métodos set, que permitirán modificar el DNI.
 * Uno en el que habrá que proporcionar el NIF completo (número y letra). Y otro en el que
 * únicamente será necesario proporcionar el DNI (las siete u ocho cifras). Si el DNI/NIF es
 * incorrecto se debería lanzar algún tipo de excepción. EI formato de los métodos
 * (sobrecargados) será:
 *  public void setDni (String nif) throws
 *  public void setDni (int numeroDni) throws
 * 
 * • La clase dispondrá de algunos métodos internos privados para calcular la letra de un número
 * de DNI cualquiera, para comprobar Si un DNI con Su letra es válido, para extraer la letra de
 * un NIF, Aquellos métodos que no utilicen ninguna variable de objeto podrían declararse
 * como estáticos (pertenecientes a la clase). Formato de los métodos:
 *  private static char calcularLetraNIF(int numeroDni)
 *  private static boolean validarNif (String nif)
 *  private Static Char extraerLetraNif (String nif)
 *  private static int extraerNumeroDni (String nif)
*/

/* Paquetes */
package Libre_Configuración.Primer_Trimestre.Ejercicio5_Java.Ejercicio5_14;

public class Principal {
    public static void main(String[] args){
        try { //Uso el try and catch para que no pete el programa al intentar cambiar el DNI a NIF
            //Creo un DNI por el número y lo muestro
            DNI dni1 = new DNI(12345678);
            System.out.println("Número de DNI: " + dni1.getNumeroDni());
            System.out.println("NIF: " + dni1.getNif());

            // Cambio el DNI por un NIF
            dni1.setDNI("87654321H");
            System.out.println("Número de DNI modificado: " + dni1.getNumeroDni());
            System.out.println("NIF modificado: " + dni1.getNif());

            //Intento mostar un DNI erroneo
            dni1.setDNI("87654321X"); // Genera una excepción
        } catch (IllegalArgumentException e) {
            System.out.println("Error: " + e.getMessage());
        }
    }
}