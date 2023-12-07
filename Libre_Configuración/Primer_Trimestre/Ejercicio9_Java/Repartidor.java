package Libre_Configuración.Primer_Trimestre.Ejercicio9_Java;

public class Repartidor extends Empleado {
    private String zona;

    public Repartidor(String nombre, int edad, double salario, String zona) {
        super(nombre, edad, salario);
        this.zona = zona;
    }

    @Override
    public boolean plus() {
        if (edad < 25 && "zona 3".equals(zona)) {
            salario += PLUS;
            return true;
        }
        return false;
    }

    public String getZona() {
        return zona;
    }

    public void setZona(String zona) {
        this.zona = zona;
    }

    @Override
    public String toString() {
        return "Repartidor{" +
                "zona='" + zona + '\'' +
                "} " + super.toString();
    }
}