/* Alberto Gómez Morales - 2º DAW - Libre Configuración */

// Importamos las clases necesarias
import java.io.*; 
import java.util.Scanner;  

public class FicherosIII {
    public static void main(String[] args) {
        Scanner teclado = new Scanner(System.in); 
         // Mostramos el menú al usuario
        System.out.println("Elige una opción:"); 
        System.out.println("1. Leer y mostrar el archivo");
        System.out.println("2. Escribir al final del archivo");
        System.out.println("3. Sobrescribir el archivo");
        int opcion = teclado.nextInt();  
        teclado.nextLine(); 

        //Dependiendo de opcion
        switch (opcion) {  
            case 1:
             // Lee y muestra el contenido del archivo
                leerArchivo(); 
                break;
            case 2:
                System.out.println("Escribe la frase que quieres añadir al final del archivo:");
                String frase = teclado.nextLine(); 
                // Añade la frase al final del archivo
                escribirAlFinal(frase);  
                break;
            case 3:
                System.out.println("Escribe la frase con la que quieres sobrescribir el archivo:");
                frase = teclado.nextLine();  
                // Sobrescribe el archivo con la nueva frase
                sobrescribirArchivo(frase);  
                break;
            default:
                System.out.println("Opción no válida");  
        }
    }
// Método para leer y mostrar el contenido de un archivo
    public static void leerArchivo() {  
        try {
              // Crea un objeto File para el archivo
            File archivo = new File("archivo.txt");
            Scanner lector = new Scanner(archivo); 
            // Mientras haya más líneas en el archivo
            while (lector.hasNextLine()) {  
                 // Lee la siguiente línea del archivo
                String data = lector.nextLine(); 
                System.out.println(data);
            }
            // Cierra el objeto Scanner después de leer el archivo
            lector.close();  
            // Captura la excepción si el archivo no se encuentra
        } catch (FileNotFoundException e) {  
            System.out.println("Ha ocurrido un error.");  
            // Muestra la traza de la excepción
            e.printStackTrace();  
        }
    }

     // Método para añadir una frase al final de un archivo
    public static void escribirAlFinal(String frase) { 
        try {
             // Creamos un objeto FileWriter para escribir en el archivo
            FileWriter escritor = new FileWriter("archivo.txt", true); 
             // Escribe la frase al final del archivo
            escritor.write("\n" + frase); 
             // Cierra el objeto FileWriter después de escribir en el archivo
            escritor.close(); 
             // Informa al usuario de que la frase ha sido añadida
            System.out.println("La frase ha sido añadida al final del archivo."); 
             // Captura la excepción si ocurre un error de entrada/salida
        } catch (IOException e) { 
            System.out.println("Ha ocurrido un error."); 
            e.printStackTrace();  
        }
    }
 // Método para sobrescribir un archivo con una nueva frase
    public static void sobrescribirArchivo(String frase) { 
        try {
            FileWriter escritor = new FileWriter("archivo.txt");  
             // Escribe la frase en el archivo, sobrescribiendo su contenido anterior
            escritor.write(frase); 
            // Cierra el objeto FileWriter después de escribir en el archivo
            escritor.close();  
             // Informa al usuario de que el archivo ha sido sobrescrito
            System.out.println("El archivo ha sido sobrescrito con la nueva frase."); 
        } catch (IOException e) {  
            System.out.println("Ha ocurrido un error.");  
            e.printStackTrace(); 
        }
    }
}
