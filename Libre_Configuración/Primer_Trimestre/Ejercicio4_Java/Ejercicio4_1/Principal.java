/* Alberto Gómez Morales - 2º DAW - Libre Configuración
 * 
 * 3.- (Clase Rectángulo) Cree una clase llamada Rectangulo. La clase debe tener los atributos
 * longitud y anchura, cada uno con un valor predeterminado de 1. Debe tener métodos para calcular el
 * perímetro y el área del rectángulo. Debe tener métodos establecer y obtener para longitud y
 * anchura. Los métodos establecer deben verificar que longitud y anchura sean números de punto
 * flotante mayores de 0.0 y menores de 20.0. Escriba un programa para probar la clase Rectangulo.
*/

/* Paquetes */
package Libre_Configuración.Primer_Trimestre.Ejercicio4_Java.Ejercicio4_1;

public class Principal {
    public static void main(String[] args) {
        /* Creo un rectangulo mediante el constructor */
        Rectangulo miRectangulo = new Rectangulo();

        /* Asigno Longitud y Anchura */
        miRectangulo.setLongitud(5.0);
        miRectangulo.setAnchura(3.0);

        /* Cargo la longitud y Anchura en los atributos */
        double longitud = miRectangulo.getLongitud();
        double anchura = miRectangulo.getAnchura();

        /* Saco el perímetro y el área */
        double perimetro = miRectangulo.calcularPerimetro();
        double area = miRectangulo.calcularArea();

        /* Muestro los datos */
        System.out.println("Longitud: " + longitud);
        System.out.println("Anchura: " + anchura);
        System.out.println("Perímetro: " + perimetro);
        System.out.println("Área: " + area);
    }
}