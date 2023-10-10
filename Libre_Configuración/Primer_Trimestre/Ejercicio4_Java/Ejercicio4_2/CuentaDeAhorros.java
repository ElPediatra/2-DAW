/* Alberto Gómez Morales - 2º DAW - Libre Configuración
 *
 * 5.- (Clase cuenta de ahorros) Cree una clase llamada CuentaDeAhorros. Use una variable static
 * llamada tasaInteresAnual para almacenar la tasa de interés anual para todos los cuentahabientes.
 * Cada objeto de la clase debe contener una variable de instancia private llamada saldoAhorros, que
 * indique la cantidad que el ahorrador tiene actualmente en el depósito. Realice el método constructor
 * por defecto y otro con el saldo como parámetro. Realice también los métodos get y set del saldo.
 * Proporcione el método cualularInteresMensual para calcular el interés mensual, multiplicando el
 * saldoAhorros por la tasaInteresAnual dividida entre 12; este interés debe sumarse al saldoAhorros.
 * Proporcione un método static llamado modificarTasaInteres para establecer la tasaInteresAnual en
 * un nuevo valor. Escriba un programa para probar la clase CuentaDeAhorros. Cree dos instancias de
 * objetos CuentaDeAhorros, ahorrador1 y ahorrador2, con saldos de 2000.00€ y 3000.00€,
 * respectivamente. Establezca la tasaInteresAnual en 4%, después calcule el interés mensual e
 * imprima los nuevos saldos para ambos ahorradores. Luego establezca la tasaInteresAnual en 5%,
 * calcule el interés del siguiente mes e imprima los nuevos saldos para ambos ahorradores.
 */

public class CuentaDeAhorros {
    private static double tasaInteresAnual;
    private double saldoAhorros;

    public CuentaDeAhorros() {
        this.saldoAhorros = 0.0;
    }

    public CuentaDeAhorros(double saldoInicial) {
        this.saldoAhorros = saldoInicial;
    }

    public double getSaldo() {
        return saldoAhorros;
    }

    public void setSaldo(double saldo) {
        this.saldoAhorros = saldo;
    }

    public static void modificarTasaInteres(double nuevaTasa) {
        tasaInteresAnual = nuevaTasa;
    }

    public void calcularInteresMensual() {
        double interesMensual = saldoAhorros * (tasaInteresAnual / 12) / 100;
        saldoAhorros += interesMensual;
    }
}