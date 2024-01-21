//Alberto Gómez Morales - 2º DAW - Libre Configuración

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;

public class Lector_Textos {
    //Creamos un string 
    public static void main(String[] args) {
        // Definimos el nombre del archivo de entrada y el archivo de salida
        String archivoEntrada = "fichero-a.txt";
        String archivoSalida = "ficherob.txt";
//Hacemos un try catch con los buffers
        try (BufferedReader br = new BufferedReader(new FileReader(archivoEntrada));
             BufferedWriter bw = new BufferedWriter(new FileWriter(archivoSalida))) {
            String linea;
            // Leemos línea por línea del archivo de entrada
            //Mientras que la línea no este vacía
            while ((linea = br.readLine()) != null) {
                // Quitamos las vocales de la línea y la guardamos en el archivo de salida
                String lineaSinVocales = quitarVocales(linea);
                //Escribimos la linea
                bw.write(lineaSinVocales);
                //Y seguimos a la siguiente
                bw.newLine();
            }
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    // Método para quitar las vocales de una cadena de texto
    private static String quitarVocales(String input) {
        return input.replaceAll("[aeiouAEIOU]", "");
    }
}