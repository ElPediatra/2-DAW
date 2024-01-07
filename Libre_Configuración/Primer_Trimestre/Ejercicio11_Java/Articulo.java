public class Articulo implements ArticuloConIVA {
    private String nombre;
    private double precio;

    // Constructor
    public Articulo(String nombre, double precio) {
        this.nombre = nombre;
        this.precio = precio;
    }

    // Métodos de acceso y modificación
    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public double getPrecio() {
        return precio;
    }

    @Override
    public double getPrecioConIVA() {
        return getPrecio() + getParteIVA();
    }
}