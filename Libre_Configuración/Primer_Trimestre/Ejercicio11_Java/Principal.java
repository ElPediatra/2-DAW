public class Principal {
    public static void main(String[] args) {
        // Crear instancias de las clases Tip04, Tip07 y Tip016
        Tipo4 articuloTipo4 = new Tipo4("Producto A", 100.0);
        Tipo7 articuloTipo7 = new Tipo7("Producto B", 150.0);
        Tipo16 articuloTipo16 = new Tipo16("Producto C", 200.0);

        // Mostrar información sobre cada artículo
        mostrarInformacion(articuloTipo4);
        mostrarInformacion(articuloTipo7);
        mostrarInformacion(articuloTipo16);
    }

    // Método para mostrar información sobre un artículo
    private static void mostrarInformacion(Articulo articulo) {
        System.out.println("Nombre: " + articulo.getNombre());
        System.out.println("Precio sin IVA: €" + articulo.getPrecio());
        System.out.println("IVA: €" + ((ArticuloConIVA) articulo).getParteIVA());
        System.out.println("Precio con IVA: €" + articulo.getPrecioConIVA());
        System.out.println();
    }
}

// Interfaz para Articulo con IVA
interface ArticuloConIVA {
    double getParteIVA();
    double getPrecioConIVA();
}
