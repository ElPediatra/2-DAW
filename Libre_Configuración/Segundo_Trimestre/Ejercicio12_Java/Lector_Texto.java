/* Alberto Gómez Morales - 2º DAW - Libre Configuración */

//IMPORTANTE - Abrir solo esta carpeta, no tenerla como subcarpeta

/* Imports */
import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;

//Clase Principal
public class Lector_Texto{
    public static void main(String[] args) {
        //Try & catch para errores
        try {
           //Se crea un lector para el texto
            BufferedReader lector = new BufferedReader(new FileReader("texto.txt"));
            //Cadena para capturar las frases del texto
            String linea;
            //Bucle para capturar las líneas e imprimirlas
            while ((linea = lector.readLine()) != null) {
                System.out.println(linea);
            }
            lector.close();
        //Captura de errores
        } catch (IOException e) {
            // Si hay un error enviamos un mensaje diciendo que hay un error.
            System.out.println("Revisa el archivo. Código de ayuda: " + e.getMessage());
        }
    }
}
