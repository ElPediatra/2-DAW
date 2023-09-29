/* Alberto Gómez Morales - 2º DAW - Libre Configuración
 *
 * 11.- Escriba sus propias versiones de los métodos de búsqueda indexOf y lastIndexOf
 * de la clase String.
 */

public class Ejercicio11 {
    public static void main(String[] args){
        /* Atributos */
        String frase = "Esta es una frase de ejemplo o puede que no lo sea, eso es algo que nadie sabe";
        String buscar = "es";
        int primero;
        int ultimo;

        //Llamo a mis métodos de indexOf y lastIndexOf
        primero = miIndexOf(frase, buscar);
        ultimo = miLastIndexOf(frase, buscar);

        System.out.println("Posición de la primera vez que se encuentra 'es': " + primero);
        System.out.println("Posición de la última vez que se encuentra 'es': " + ultimo);
    }

    /* Métodos */
    public static int miIndexOf(String frase, String buscar) {
        //Creo bucle para comparar las palabras y ver si está la que busco
        for (int i = 0; i <= frase.length() - buscar.length(); i++) {
            boolean aux = true; //Auxiliar verificador

            for (int j = 0; j < buscar.length(); j++) {
                if (frase.charAt(i + j) != buscar.charAt(j)) {
                    aux = false;
                    break;
                }
            }
            if (aux) {
                return i;
            }
        }
        return -1; //No está la palabra
    }

    public static int miLastIndexOf(String frase, String buscar) {
        //Creo bucle para comparar las palabras y ver si está la que busco
        for (int i = frase.length() - buscar.length(); i >= 0; i--) {
            boolean aux = true; //Auxiliar verificador

            for (int j = 0; j < buscar.length(); j++) {
                if (frase.charAt(i + j) != buscar.charAt(j)) {
                    aux = false;
                    break;
                }
            }
            if (aux) {
                return i;
            }
        }
        return -1; //No está la palabra
    }
}
