/* Alberto Gómmez Morales - 2º DAW - Libre Configuración
 * 
 * 10.- Defina un método llamado hipotenusa que calcule la longitud de la hipotenusa de un triangulo
 * rectángulo, cuando se proporcionen las longitudes de los otros dos lados. EI método debe tomar dos
 * argumentos de tipo double y devolver la hipotenusa como un valor double. Incorpore este método
 * en una aplicación que lea los valores para lado1 y lado2, y que realice el calculo con el método
 * hipotenusa. Determine la longitud de la hipotenusa para cada uno de los triángulos siguientes:
 * Triángulo    Lado1   Lado2
 *     1        0       0
 *     2        0       12.0
 *     3        8.0     15.0
 */

public class Ejercicio_10_Ficha4 {
    public static void main(String[] args) {
        /* Atributos */
        //Triangulo 1
        double lado1_1 = 0;
        double lado2_1 = 0;
        double hipotenusa_1;

        //Triangulo 2
        double lado1_2 = 0;
        double lado2_2 = 12.0;
        double hipotenusa_2;

        //Triángulo
        double lado1_3 = 8.0;
        double lado2_3 = 15.0;
        double hipotenusa_3;

        /* Mando a calcular las hipotenusas y las muestro */
        //Triángulo 1
        System.out.println("Triángulo 1");
        hipotenusa_1 = hipotenusa(lado1_1, lado2_1);
        System.out.println("La longitud de la hipotenusa es: " + hipotenusa_1);

        //Triángulo 2
        System.out.println("Triángulo 2");
        hipotenusa_2 = hipotenusa(lado1_2, lado2_2);
        System.out.println("La longitud de la hipotenusa es: " + hipotenusa_2);

        //Triángulo 3
        System.out.println("Triángulo 3");
        hipotenusa_3 = hipotenusa(lado1_3, lado2_3);
        System.out.println("La longitud de la hipotenusa es: " + hipotenusa_3);
    }

    /* Métodos */
    public static double hipotenusa(double lado1, double lado2) {
        return Math.sqrt(lado1 * lado1 + lado2 * lado2);
    }
}
