USE Tienda_Juegos;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(255) NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    perfil ENUM('usuario', 'admin') NOT NULL
);

INSERT INTO usuarios (nombre_usuario, contrasena, perfil)
VALUES
    ('usuario', 'usuario', 'usuario'),
    ('admin', 'admin', 'admin');