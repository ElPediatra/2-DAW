/* Alberto Gómez Morales - 2º DAW - Libre Configuración
 *
 * 10.- Modifique la aplicación anterior de manera que genere todos los posibles códigos de tres
 * dígitos en el rango de 000 a 255, y que intente imprimir los caracteres correspondientes.
 */

public class Ejercicio10 {
    public static void main(String[] args){
        /* Atributos */
        int codigo;
        char letra;

        //Creo un bucle para ir transformando todos los números del 0 al 255 y mostrando su letra correspondiente
        for (codigo = 0; codigo <= 255; codigo++) {
            if (codigo >= 0 && codigo <= Character.MAX_CODE_POINT) {
                letra = Character.toChars(codigo)[0];
                
                System.out.println("Código: " + codigo + " - Carácter: " + letra);
            }
        }
    }
}