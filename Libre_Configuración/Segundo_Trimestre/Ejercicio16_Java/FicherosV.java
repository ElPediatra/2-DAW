// Libre Configuración - 2DAW - Alberto Gómez Morales

/* Imports */
import java.io.*;
import java.util.*;

public class FicherosV {
    public static void main(String[] args) {
        Scanner teclado = new Scanner(System.in);
        System.out.println("Ingrese un número entero:");
        int num = teclado.nextInt();

        // Crear los archivos .txt
        for (int i = 1; i <= num; i++) {
            String nombreArchivo = i + ".txt";
            try {
                FileWriter escritorArchivo = new FileWriter(nombreArchivo);
                escritorArchivo.write("1\n5\n67\n45\n67");
                escritorArchivo.close();
            } catch (IOException e) {
                e.printStackTrace();
            }
        }

        // Menú
        int opcion;
        do {
            System.out.println("¿Qué quiere hacer con estos números?");
            System.out.println("1) Buscar el mayor (de entre todos los archivos)");
            System.out.println("2) Buscar el menor (de entre todos los archivos)");
            System.out.println("3) Buscar la media (de entre todos los archivos)");
            System.out.println("4) Buscar la suma (de entre todos los archivos)");
            System.out.println("5) Buscar un número concreto y decir en qué ficheros aparece");
            System.out.println("6) Salir");
            opcion = teclado.nextInt();

            switch (opcion) {
                case 1:
                    // Buscar el mayor
                    int max = Integer.MIN_VALUE;
                    for (int i = 1; i <= num; i++) {
                        try {
                            Scanner fileScanner = new Scanner(new File(i + ".txt"));
                            while (fileScanner.hasNextInt()) {
                                int number = fileScanner.nextInt();
                                if (number > max) {
                                    max = number;
                                }
                            }
                        } catch (FileNotFoundException e) {
                            e.printStackTrace();
                        }
                    }
                    System.out.println("El número mayor es: " + max);
                    break;
                case 2:
                    // Buscar el menor
                    int min = Integer.MAX_VALUE;
                    for (int i = 1; i <= num; i++) {
                        try {
                            Scanner fileScanner = new Scanner(new File(i + ".txt"));
                            while (fileScanner.hasNextInt()) {
                                int number = fileScanner.nextInt();
                                if (number < min) {
                                    min = number;
                                }
                            }
                        } catch (FileNotFoundException e) {
                            e.printStackTrace();
                        }
                    }
                    System.out.println("El número menor es: " + min);
                    break;
                case 3:
                    // Buscar la media
                    int sum = 0;
                    int count = 0;
                    for (int i = 1; i <= num; i++) {
                        try {
                            Scanner fileScanner = new Scanner(new File(i + ".txt"));
                            while (fileScanner.hasNextInt()) {
                                sum += fileScanner.nextInt();
                                count++;
                            }
                        } catch (FileNotFoundException e) {
                            e.printStackTrace();
                        }
                    }
                    double average = (double) sum / count;
                    System.out.println("La media es: " + average);
                    break;
                case 4:
                    // Buscar la suma
                    sum = 0;
                    for (int i = 1; i <= num; i++) {
                        try {
                            Scanner fileScanner = new Scanner(new File(i + ".txt"));
                            while (fileScanner.hasNextInt()) {
                                sum += fileScanner.nextInt();
                            }
                        } catch (FileNotFoundException e) {
                            e.printStackTrace();
                        }
                    }
                    System.out.println("La suma es: " + sum);
                    break;
                case 5:
                    // Buscar un número concreto y decir en qué ficheros aparece
                    System.out.println("Ingrese el número que desea buscar:");
                    int target = teclado.nextInt();
                    for (int i = 1; i <= num; i++) {
                        try {
                            Scanner fileScanner = new Scanner(new File(i + ".txt"));
                            while (fileScanner.hasNextInt()) {
                                if (fileScanner.nextInt() == target) {
                                    System.out.println("El número " + target + " aparece en el archivo " + i + ".txt");
                                    break;
                                }
                            }
                        } catch (FileNotFoundException e) {
                            e.printStackTrace();
                        }
                    }
                    break;
                case 6:
                    System.out.println("Saliendo del programa...");
                    break;
                default:
                    System.out.println("Opción no válida");
            }
        } while (opcion != 6);

        teclado.close();
    }
}
