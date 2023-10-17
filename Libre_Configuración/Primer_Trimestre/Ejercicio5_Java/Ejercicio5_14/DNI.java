/* Paquetes */
package Libre_Configuración.Primer_Trimestre.Ejercicio5_Java.Ejercicio5_14;

public class DNI {
    /* Atributos */
    private int numeroDni;

    /* Constructores */
    public DNI() {
        //Constructor vacío
    }

    public DNI(int numeroDni) throws IllegalArgumentException {
        if (validarNumeroDNI(numeroDni)) {
            this.numeroDni = numeroDni;
        } else {
            throw new IllegalArgumentException("Número de DNI incorrecto.");
        }
    }

    public DNI(String nif) throws IllegalArgumentException {
        if (validarNIF(nif)) {
            this.numeroDni = extraerNumeroDNI(nif);
        } else {
            throw new IllegalArgumentException("NIF incorrecto.");
        }
    }

    /* Setter y Getters */
    public void setDNI(int numeroDni) throws IllegalArgumentException {
        if (validarNumeroDNI(numeroDni)) {
            this.numeroDni = numeroDni;
        } else {
            throw new IllegalArgumentException("Número de DNI incorrecto.");
        }
    }

    public void setDNI(String nif) throws IllegalArgumentException {
        if (validarNIF(nif)) {
            this.numeroDni = extraerNumeroDNI(nif);
        } else {
            throw new IllegalArgumentException("NIF incorrecto.");
        }
    }

    public int getNumeroDni() {
        return numeroDni;
    }

    public String getNif() {
        return calcularNIF(numeroDni);
    }

    /* Métodos */

    //Confirmar la letra del DNI
    private static char calcularLetraNIF(int numeroDni) {
        String letras = "TRWAGMYFPDXBNJZSQVHLCKE";
        int indice = numeroDni % 23;
        return letras.charAt(indice);
    }

    //Validar número del DNI
    private static boolean validarNumeroDNI(int numeroDni) {
        return numeroDni >= 0 && numeroDni <= 99999999;
    }

    //Validar DNI completo
    private static boolean validarNIF(String nif) {
        if (nif.length() == 9) {
            char letraCalculada = calcularLetraNIF(extraerNumeroDNI(nif));
            char letraNIF = nif.charAt(8);
            return letraCalculada == letraNIF;
        }
        return false;
    }

    //Obtener la letra del NIF
    private static char extraerLetraNIF(String nif) {
        if (nif.length() == 9) {
            return nif.charAt(8);
        }
        return ' ';
    }

    //Obtener el número del DNI
    private static int extraerNumeroDNI(String nif) {
        if (nif.length() == 9) {
            try {
                return Integer.parseInt(nif.substring(0, 8));
            } catch (NumberFormatException e) {
                return -1;
            }
        }
        return -1;
    }

    //Sacar el DNI completo
    private String calcularNIF(int numeroDni) {
        char letraNIF = calcularLetraNIF(numeroDni);
        return String.format("%08d%c", numeroDni, letraNIF);
    }
}