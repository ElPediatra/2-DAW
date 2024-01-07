public class Tipo16 extends Articulo {
    private static final double TIPO = 16.0;

    public Tipo16(String nombre, double precio) {
        super(nombre, precio);
    }

    public double getParteIVA() {
        return getPrecio() * TIPO / 100;
    }

    @Override
    public double getPrecio() {
        return super.getPrecio() * (1 + TIPO / 100);
    }
}