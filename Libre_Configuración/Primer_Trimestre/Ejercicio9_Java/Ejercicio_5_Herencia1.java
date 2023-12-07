package Libre_Configuración.Primer_Trimestre.Ejercicio9_Java;

public class Ejercicio_5_Herencia1 {
    public static void main(String[] args) {
        Comercial comercial = new Comercial("Juan", 31, 1000, 250);
        Repartidor repartidor = new Repartidor("Ana", 24, 800, "zona 3");

        if (comercial.plus()) {
            System.out.println("Se ha aplicado el plus al salario del comercial");
        }

        if (repartidor.plus()) {
            System.out.println("Se ha aplicado el plus al salario del repartidor");
        }
    }
}