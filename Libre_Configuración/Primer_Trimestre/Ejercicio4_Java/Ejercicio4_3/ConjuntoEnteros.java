/* Alberto Gómez Morales - 2º DAW - Libre Configuración
 * 
 * 10.- (Conjunto de enteros) Cree la clase ConjuntoEnteros. Cada objeto ConjuntoEnteros puede
 * almacenar enteros en el rango de 0 a 100. El conjunto se representa mediante un array de valores
 * boolean. El elemento del array a[i] es true si el entero i se encuentra en el conjunto. El elemento del
 * array a[j] es false si el entero j no se encuentra dentro del conjunto. El constructor sin argumentos
 * inicializa el array de Java con el "conjunto vacío" (es decir, un conjunto cuya representación de
 * array contiene sólo valores false). Implemente el método esta que devolverá true si el número que
 * se pasa por argumento pertenece al conjunto o false en caso contrario. También se deben
 * implementar los métodos: insertarElemento debe eliminar el entero m (estableciendo a[m] en
 * false), aStringConjunto debe devolver una cadena que contenga un conjunto como una lista de
 * números separados por espacios. Incluya sólo aquellos elementos que estén presentes en el
 * conjunto. Use - - - para representar un conjunto vacío. El método esIgualA debe determinar si dos
 * conjuntos son iguales. Proporcione los siguientes métodos estáticos: el método union debe crear y
 * devolver un tercer conjunto que sea la unión teórica de conjuntos para los dos conjuntos que se
 * pasan por argumento (es decir, un elemento del tercer array se establece en true si ese elemento es
 * true en cualquiera o en ambos de los conjuntos existentes; en caso contrario, el elemento del tercer
 * conjunto se establece en false). El método intersección debe crear un tercer conjunto que sea la
 * intersección teórica de conjuntos para los dos conjuntos pasados por argumento (es decir, un
 * elemento del array del tercer conjunto se establece en false si ese elemento es false en uno o ambos
 * de los conjuntos existentes; en caso contrario, el elemento del tercer conjunto se establece en true).
 * Escriba un programa para probar la case ConjuntoEnteros. Cree instancias de varios objetos
 * ConjuntoEnteros. Pruebe que todos sus métodos funcionen correctamente.
 */

/* Paquetes */
package Libre_Configuración.Primer_Trimestre.Ejercicio4_Java.Ejercicio4_3;

public class ConjuntoEnteros {
    /* Atributos */
    private boolean[] conjunto;

    /* Constructor */
    public ConjuntoEnteros() {
        conjunto = new boolean[101]; // Inicializa el conjunto con 101 elementos (0 a 100)
    }

    /* Métodos */
    public boolean esta(int numero) {
        if (numero >= 0 && numero <= 100) {
            return conjunto[numero];
        } else {
            return false;
        }
    }

    public void insertarElemento(int numero) {
        if (numero >= 0 && numero <= 100) {
            conjunto[numero] = true;
        }
    }

    public String aStringConjunto() {
        StringBuilder resultado = new StringBuilder();
        boolean primerElemento = true;

        for (int i = 0; i <= 100; i++) {
            if (conjunto[i]) {
                if (!primerElemento) {
                    resultado.append(" ");
                }
                resultado.append(i);
                primerElemento = false;
            }
        }

        if (primerElemento) {
            resultado.append("---"); // Conjunto vacío
        }

        return resultado.toString();
    }

    public boolean esIgualA(ConjuntoEnteros otroConjunto) {
        for (int i = 0; i <= 100; i++) {
            if (conjunto[i] != otroConjunto.esta(i)) {
                return false;
            }
        }
        return true;
    }

    public static ConjuntoEnteros union(ConjuntoEnteros conjunto1, ConjuntoEnteros conjunto2) {
        ConjuntoEnteros resultado = new ConjuntoEnteros();
        for (int i = 0; i <= 100; i++) {
            resultado.conjunto[i] = conjunto1.conjunto[i] || conjunto2.conjunto[i];
        }
        return resultado;
    }

    public static ConjuntoEnteros interseccion(ConjuntoEnteros conjunto1, ConjuntoEnteros conjunto2) {
        ConjuntoEnteros resultado = new ConjuntoEnteros();
        for (int i = 0; i <= 100; i++) {
            resultado.conjunto[i] = conjunto1.conjunto[i] && conjunto2.conjunto[i];
        }
        return resultado;
    }
}
