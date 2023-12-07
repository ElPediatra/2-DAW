package Libre_Configuración.Primer_Trimestre.Ejercicio9_Java;

public class Comercial extends Empleado {
    private double comision;

    public Comercial(String nombre, int edad, double salario, double comision) {
        super(nombre, edad, salario);
        this.comision = comision;
    }

    @Override
    public boolean plus() {
        if (edad > 30 && comision > 200) {
            salario += PLUS;
            return true;
        }
        return false;
    }

    public double getComision() {
        return comision;
    }

    public void setComision(double comision) {
        this.comision = comision;
    }

    @Override
    public String toString() {
        return "Comercial{" +
                "comision=" + comision +
                "} " + super.toString();
    }
}