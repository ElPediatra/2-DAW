/* Paquetes */
package Libre_Configuración.Primer_Trimestre.Ejercicio5_Java.Ejercicio5_11;

public class Fecha {
    /* Atributos */
    private int mes;
    private int dia;
    private int anio;

    /* Sub-clase meses */
    private static final String[] MESES = {
        "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
    };

    /* Constructores */
    public Fecha(int mes, int dia, int anio) {
        this.mes = mes;
        this.dia = dia;
        this.anio = anio;
    }

    public Fecha(String mesStr, int dia, int anio) {
        this.mes = convertirMesStringAMesNumero(mesStr);
        this.dia = dia;
        this.anio = anio;
    }

    public Fecha(int diaDelAnio, int anio) {
        this.anio = anio;
        //int dia = 1;
        int mes = 0;
        while (diaDelAnio > diasEnMes(mes, anio)) {
            diaDelAnio -= diasEnMes(mes, anio);
            mes++;
        }
        this.mes = mes;
        this.dia = diaDelAnio;
    }

    /* Métodos */

    //"to Strings" dependiendo del formato
    public void imprimirFormato1() {
        System.out.printf("%s %d, %d%n", MESES[mes - 1], dia, anio);
    }

    public void imprimirFormato2() {
        System.out.printf("%s %d%n", obtenerNombreDiaDeLaSemana(), anio);
    }

    //Sacar el día por texto
    private String obtenerNombreDiaDeLaSemana() {
        int diaDeLaSemana = diaDeLaSemana();
        String[] diasSemana = {"Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"};
        return diasSemana[diaDeLaSemana];
    }

    //Sacar el día de la semana
    private int diaDeLaSemana() {
        int a = (14 - mes) / 12;
        int y = anio - a;
        int m = mes + 12 * a - 2;
        return (dia + y + y / 4 - y / 100 + y / 400 + (31 * m) / 12) % 7;
    }

    //Confirmar los días que tiene un mes
    private int diasEnMes(int mes, int anio) {
        if (mes == 1) {
            if (esBisiesto(anio)) {
                return 29;
            } else {
                return 28;
            }
        } else {
            return new int[] { 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 }[mes];
        }
    }

    //Confirmar si es bisiesto
    private boolean esBisiesto(int anio) {
        return (anio % 4 == 0 && anio % 100 != 0) || (anio % 400 == 0);
    }

    //Pasar string de mes a numero
    private int convertirMesStringAMesNumero(String mesStr) {
        for (int i = 0; i < MESES.length; i++) {
            if (MESES[i].equalsIgnoreCase(mesStr)) {
                return i + 1; //es +1 porque empieza en 0
            }
        }
        return -1; //Devuelvo -1 si el mes no existe
    }
}
