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

public class Rectangulo {
    private double longitud;
    private double anchura;

    // Constructor que establece los valores predeterminados
    public Rectangulo() {
        this.longitud = 1.0;
        this.anchura = 1.0;
    }

    // Métodos establecer y obtener para longitud
    public void setLongitud(double longitud) {
        if (longitud > 0.0 && longitud < 20.0) {
            this.longitud = longitud;
        } else {
            System.out.println("Longitud fuera de rango.");
        }
    }

    public double getLongitud() {
        return longitud;
    }

    // Métodos establecer y obtener para anchura
    public void setAnchura(double anchura) {
        if (anchura > 0.0 && anchura < 20.0) {
            this.anchura = anchura;
        } else {
            System.out.println("Anchura fuera de rango.");
        }
    }

    public double getAnchura() {
        return anchura;
    }

    // Método para calcular el perímetro del rectángulo
    public double calcularPerimetro() {
        return 2 * (longitud + anchura);
    }

    // Método para calcular el área del rectángulo
    public double calcularArea() {
        return longitud * anchura;
    }
}
