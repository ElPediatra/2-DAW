/* Alberto Gómez Morales
 * 
 * 16.- (Ventas totales) Use un array bidimensional para resolver el siguiente problema: una compañía
 * tiene cuatro vendedores (1 a 4) que venden cinco productos distintos (1 a 5). Una vez al día, cada
 * vendedor pasa una nota por cada tipo de producto vendido. Cada nota contiene lo siguente:
 *      a) El número del vendedor.
 *      b) El número del producto.
 *      c) El valor total en euros de ese producto vendido ese día.
 * Así, cada vendedor pasa entre 0 y 5 notas de venta por día. Suponga que esta disponible la
 * información sobre todas las notas del mes pasado. Escriba una aplicación que lea toda esta
 * información para las ventas del último mes y que resuma las ventas totales por vendedor, por
 * producto. Todos los totales deben guardarse en el array bidimensional ventas.
 * 
 * Después de procesar toda la información del mes pasado, muestre los resultados en formato tabular,
 * en donde cada columna represente a un vendedor específico y cada fila represente a un producto.
 * Saque el total de cada fila para obtener las ventas totales de cada producto durante el último mes.
 * Saque el total de cada columna para obtener las ventas totales de cada vendedor durante el último
 * mes. Su impresión tabular debe incluir estos totales cruzados a la dereca de las filas totalizadas, y
 * en la parte inferior de las columnas totalizadas.
 */

/* Imports */
import java.util.Scanner;

public class Ejercicio3_16 {
    public static void main(String[] args) {
        /* Atributos */
        double[][] ventas = new double[5][4]; // 5productos y 4 vendedores
        boolean continuar = true;
        int vendedor;
        int producto;
        double[] totalPorVendedor = new double[4];
        double[] totalPorProducto = new double[5];
        Scanner teclado = new Scanner(System.in);

        while (continuar) {
            System.out.print("Escribe el número del vendedor (1-4, o 0 para salir): ");
            vendedor = teclado.nextInt();

            if (vendedor == 0) {
                continuar = false;
                continue;
            }

            System.out.print("Escribe el número del producto (1-5): ");
            producto = teclado.nextInt();

            if (vendedor >= 1 && vendedor <= 4 && producto >= 1 && producto <= 5) {
                System.out.print("Escribe la cantidad vendida para el vendedor " + vendedor + " y el producto " + producto + ": ");
                ventas[producto - 1][vendedor - 1] += teclado.nextDouble();
            } else {
                System.out.println("Error en el producto/vendedor. Por favor, ingrese valores válidos.");
            }
        }

        // Calcular los totales por vendedor y por producto
        for (vendedor = 0; vendedor < 4; vendedor++) {
            for (producto = 0; producto < 5; producto++) {
                totalPorVendedor[vendedor] += ventas[producto][vendedor];
                totalPorProducto[producto] += ventas[producto][vendedor];
            }
        }

        // Mostrar los resultados en formato tabular como pide el ejercicio
        System.out.println("Ventas Totales:");
        System.out.println("Producto\tVendedor 1\tVendedor 2\tVendedor 3\tVendedor 4\tTotal Producto");
        for (producto = 0; producto < 5; producto++) {
            System.out.print((producto + 1) + "\t\t");
            for (vendedor = 0; vendedor < 4; vendedor++) {
                System.out.print(ventas[producto][vendedor] + "\t\t");
            }
            System.out.println(totalPorProducto[producto]);
        }

        // Mostrar los totales por vendedor y el total general
        System.out.print("Total Vendedor\t");
        double totalGeneral = 0;
        for (vendedor = 0; vendedor < 4; vendedor++) {
            System.out.print(totalPorVendedor[vendedor] + "\t\t");
            totalGeneral += totalPorVendedor[vendedor];
        }
        System.out.println(totalGeneral);

        teclado.close();
    }
}