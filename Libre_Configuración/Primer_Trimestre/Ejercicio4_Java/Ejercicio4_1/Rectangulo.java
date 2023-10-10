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
    /* Atributos */
    private double longitud;
    private double anchura;

    /* Constructor */
    public Rectangulo() {
        this.longitud = 1.0;
        this.anchura = 1.0;
    }

    /* Setter y Getter */
    public void setLongitud(double longitud) {
        if (longitud > 0.0 && longitud < 20.0) {
            this.longitud = longitud;
        } else {
            System.out.println("Error: Longitud fuera de rango.");
        }
    }

    public double getLongitud() {
        return longitud;
    }

    public void setAnchura(double anchura) {
        if (anchura > 0.0 && anchura < 20.0) {
            this.anchura = anchura;
        } else {
            System.out.println("Error: Anchura fuera de rango.");
        }
    }

    public double getAnchura() {
        return anchura;
    }

    /* Métodos */
    public double calcularPerimetro() {
        return 2 * (longitud + anchura);
    }
    
    public double calcularArea() {
        return longitud * anchura;
    }
}
