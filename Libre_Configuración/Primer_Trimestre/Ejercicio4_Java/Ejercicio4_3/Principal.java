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

public class Principal {
    public static void main(String[] args) {

        /* Constructores */
        ConjuntoEnteros conjunto1 = new ConjuntoEnteros();
        conjunto1.insertarElemento(5);
        conjunto1.insertarElemento(10);
        conjunto1.insertarElemento(20);

        ConjuntoEnteros conjunto2 = new ConjuntoEnteros();
        conjunto2.insertarElemento(10);
        conjunto2.insertarElemento(30);

        /* Muestro mis 2 conjuntos de números */
        System.out.println("Conjunto 1: " + conjunto1.aStringConjunto());
        System.out.println("Conjunto 2: " + conjunto2.aStringConjunto());

        /* Junto los 2 objetos */
        ConjuntoEnteros union = ConjuntoEnteros.union(conjunto1, conjunto2);
        System.out.println("Unimos el Conjunto 1 y el Conjunto 2: " + union.aStringConjunto());

        /* Inserto el objeto 2 en el objeto 1 */
        ConjuntoEnteros interseccion = ConjuntoEnteros.interseccion(conjunto1, conjunto2);
        System.out.println("Insert del Conjunto 1 y el Conjunto 2: " + interseccion.aStringConjunto());

        /* Creo el objeto 3 y lo muestro */
        ConjuntoEnteros conjunto3 = new ConjuntoEnteros();
        System.out.println("Conjunto 3: " + conjunto3.aStringConjunto());

        /* Comparo el objeto 1 con el objeto 2 */
        System.out.println("¿El Conjunto 1 es igual al Conjunto 2? " + conjunto1.esIgualA(conjunto2));
    }
}
