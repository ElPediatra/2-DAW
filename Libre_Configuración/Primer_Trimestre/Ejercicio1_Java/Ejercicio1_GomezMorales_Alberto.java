//Alberto Gómez Morales - 2º DAW - Libre Configuración - 1º Ejercicio repaso Java (String y relacionados)

/* Imports */
import java.util.Scanner;

/*
 * Pedir por teclado una cadena:
 * Mostrar menú:
 *  - Mostrarla al revés
 *  - Contar el nº de vocales
 *  - Contar el nº de consonantes
 *  - Pasar todo a minúscula
 *  - Pasar todo a mayúscula
 *  - Decir si es palíndroma
 */

public class Ejercicio1_GomezMorales_Alberto {
    public static void main(String args[]){
        /* Variables */
        Scanner teclado = new Scanner(System.in);

        String palabra;
        int opcion;

        do{
            System.out.println("Escribe una palabra, o pon 'salir' para cerrar el programa");
            palabra = teclado.nextLine();

            if(!palabra.equalsIgnoreCase("salir")){
                System.out.println("Selecciona una de las opciones:");
                System.out.println("1) Mostar la palabra al revés.");
                System.out.println("2) Contar las vocales.");
                System.out.println("3) Contar las consonantes.");
                System.out.println("4) Pasar todo a minúsculas.");
                System.out.println("5) Pasar todo a mayúsculas.");
                System.out.println("6) Confirmar si es palíndroma.");

                opcion = teclado.nextInt();

                switch(opcion){
                    case 1: //Invertir la palabra
                        String palabraInvertida = "";
                        char letra1;

                        for (int i = palabra.length() - 1; i >= 0; i--) {
                            letra1 = palabra.charAt(i);
                            palabraInvertida += letra1;
                        }

                        System.out.println("La palabra '"+palabra+"' invertida es '"+palabraInvertida+"'.");
                    break;
                    
                    case 2:
                        int contador1 = 0;
                        String palabraAux1 = palabra.toLowerCase();

                        for(int i =0; i<palabra.length();i++){
                            if ((palabraAux1.charAt(i)=='a') || (palabraAux1.charAt(i)=='e') || (palabraAux1.charAt(i)=='i') || (palabraAux1.charAt(i)=='o') || (palabraAux1.charAt(i)=='u')){ 
                                contador1++;
                            }
                        }
                        System.out.println("En la palabra '"+palabra+"' hay "+contador1+" vocales.");
                    break;

                    case 3:
                        int contador2 = 0;
                        char letra2;
                        String palabraAux2 = palabra.toLowerCase();

                        for (int i = 0; i<palabra.length(); i++){
                            letra2 = palabraAux2.charAt(i);

                            if(esConsonante(letra2)) {
                                contador2++;
                            }
                        }

                        System.out.println("En la palabra '"+palabra+"' hay "+contador2+" consonantes.");
                    break;

                    case 4:
                    break;

                    case 5:
                    break;

                    case 6:
                    break;

                    default:
                        System.out.println("Opción no válida.");
                }
                teclado.nextLine(); //Borrar palabra para evitar bucle infinito
            }

        }while(!palabra.equalsIgnoreCase("salir"));
        
        System.out.println("Hasta la próxima!");
        teclado.close();
    }

    /* Métodos */
    public static boolean esConsonante (char letra){ //Comprobamos si la letra es consonante o no
        return "bcdfghjklmnñpqrstvwxyz".contains(String.valueOf(letra).toLowerCase());
    }
}