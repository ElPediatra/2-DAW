/* Paquetes */
package Libre_Configuración.Segundo_Trimestre.Ejercicio15_Java;

/* Imports */
import java.io.*;

public class FicherosIV {
    public static void main(String[] args) {

        System.out.println("Directorio de trabajo actual: " + System.getProperty("user.dir"));


        String nombreFichero = "C:\\Users\\alber\\OneDrive\\Documentos\\2-DAW\\Libre_Configuración\\Segundo_Trimestre\\Ejercicio15_Java\\texto.txt"; //Ruta del archivo de texto
        String palabraBuscada = "chaval"; //Tenemos que poner la palabra que queremos buscar

        try {
            BufferedReader lector = new BufferedReader(new FileReader(nombreFichero));
            String linea;
            int numeroLinea = 1;

            while ((linea = lector.readLine()) != null) {
                if (linea.contains(palabraBuscada)) {
                    System.out.println("La palabra '" + palabraBuscada + "' está en la línea " + numeroLinea);
                }
                numeroLinea++;
            }

            lector.close();
        } catch (FileNotFoundException e) {
            System.out.println("No encuentro el fichero '" + nombreFichero + "'.");
        } catch (IOException e) {
            System.out.println("Error al leer el fichero '" + nombreFichero + "'.");
        }
    }
}