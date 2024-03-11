-- Creo la Base de Datos
CREATE DATABASE Tienda_Juegos;
-- Selecciono la base de datos para usarla
USE Tienda_Juegos;

-- Creación de la tabla de usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(255) NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    perfil ENUM('usuario', 'admin') NOT NULL
);

-- Inserto los usuarios principales en la tabla de usuarios (los que se piden por defecto en el proyecto)
INSERT INTO usuarios (nombre_usuario, contrasena, perfil)
VALUES
    ('usuario', 'usuario', 'usuario'),
    ('admin', 'admin', 'admin');

-- Creación de la tabla de juegos
CREATE TABLE juegos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    imagen VARCHAR(255) NOT NULL,
    descripcion TEXT
);

-- Inserto los datos
INSERT INTO juegos (nombre, imagen, descripcion)
VALUES
    ('The Legend of Zelda: Ocarina of Time', '/home/alberto/img/The-Legend-of-Zelda-Ocarnia-of-Time.avif', 'Legend of Zelda se lanzó en 1998. The Legend of Zelda: Ocarina of Time es un videojuego de acción, desarrollado por Nintendo EAD y publicado por Nintendo para la consola Nintendo 64. El protagonista es Link, que se adentra en el reino de Hyrule para detener a Ganondorf, rey de la tribu Gerudo.'),
    ('Tony Hawks Pro Skater 2', '/home/alberto/img/Tony-Hawks-Pro-Skater-2.avif', 'El protagonista se desplaza por un skate por diferentes entornos. Es el segundo título de la saga Tony Hawks. Fue desarrollado por Neversoft y distribuido por Activision . En esta edición se sumaron habilidades y la posibilidad de comprar accesorios para mejorar el skate del personaje.'),
    ('Grand Theft Auto IV', '/home/alberto/img/Grand-theft-auto-4.avif', 'Grand Theft Auto IV se lanzó en 2008. Grand Theft Auto IV es un videojuego de acción de mundo abierto creado por Rockstar North. El protagonista es Niko Bellic, un veterano de guerra de Europa del Este, que llegó a Estados Unidos en busca del sueño americano, pero que termina metido en un mundo criminal. El escenario de la historia es la ficticia ciudad de Liberty City.'),
    ('Soul Calibur', '/home/alberto/img/Soulcalibur.avif', 'SoulCalibur cuenta de 6 capítulos: el primero se lanzó en 1995. Soul Calibur es la segunda edición de la saga de este juego de pelea desarrollado por Namco y que consta de 6 capítulos. El primero surgió en 1995 y el más reciente es el Soul Calibur VI, lanzado en 2018.'),
    ('Super Mario Galaxy', '/home/alberto/img/Super-Mario-Galaxy.avif', 'Los hermanos Mario y Luigi tiene aventuras intergalácticas en su objetivo por rescatar a la princesa de las garras de Bowser. Super Mario Galaxy es un videojuego en 3D creado por Nintendo EAD Tokio y publicado por Nintendo para su consola Wii. Esta edición, que se presentó en 2007, sigue la misma trama que la de la serie: los hermanos tratan de salvar a la princesa de las garras del malvado Bowser.'),
    ('Super Mario Galaxy 2', '/home/alberto/img/Super-Mario-GAlaxy-2.avif', 'Es la segunda edición de Super Mario Galaxy. Fue anunciado en la conferencia de videojuegos E3 2009 y, tal como se puede deducir de su nombre, es la secuela de Super Mario Galaxy.'),
    ('Red Dead Redemption 2', '/home/alberto/img/Red-Dead-Redemption-2.avif', 'Es un western en mundo abierto. Es un videojuego de acción, un western, en un mundo abierto, con componentes para un jugador y multijugador. Fue desarrollado por Rockstar Games, el mismo estudio que lanzó entre otros la saga Grand Theft Auto. Se lanzó en 2018 y fue récord de ventas.'),
    ('Grand Theft Auto V', '/home/alberto/img/Grand-Theft-Auto-5.avif', 'Se estrenó en septiembre de 2013. Se lanzó en 2013 y es parte de la saga del popular videojuego de Rockstar Games.'),
    ('The Legend of Zelda: Breath of the Wild', '/home/alberto/img/The-Legend-of-Zelda-Breath-of-the-Wild.avif', 'The Legend of Zelda: Breath of the Wild fue destacado como el mejor juego del año en 2017. Es un juego de aventura en un mundo abierto. Fue premiado como el mejor juego del año en los Game Awards de 2017.'),
    ('Tony Hawks Pro Skater 3', '/home/alberto/img/Tony-Hawks-Pro-Skater-3.avif', 'Tony Hawk’s Pro Skater 3 se lanzó en 2001. Es la tercera entrega en la serie de Tony Hawks, y se lanzó en 2001.'),
    ('Perfect Dark', '/home/alberto/img/Perfect-Dark.avif', 'Joanna Dark es la protagonista de Perfect Dark. Es un videojuego de disparos en primera persona, desarrollado y publicado por Rare en mayo de 2000.'),
    ('Metroid Prime', '/home/alberto/img/Metroid-Prime.avif', 'Metroid Prime es una trilogía, que comenzó con la primera edición en 2002. Es un videojuego de acción en primera persona que se lanzó en 2002. Es el primer capítulo de una trilogía que lleva el mismo nombre.'),
    ('Grand Theft Auto III', '/home/alberto/img/GTA-3.avif', 'Es el tercer videojuego de la saga, que fue publicado por la compañía Rockstar Games en el año 2001. Es el tercer título de la popular saga que lleva el mismo nombre. Se lanzó en 2001.'),
    ('Super Mario Odyssey', '/home/alberto/img/Super-Mario-Oddesy.avif', 'Se lanzó para Nintendo Switch en 2017. Es un videojuego de mundo abierto para Nintendo Switch que se lanzó el 27 de octubre de 2017.'),
    ('Halo: Combat Evolved', '/home/alberto/img/Halo-Combat-Evolved.avif', 'Se publicó en 2001. Es un videojuego de disparos en primera persona publicado por Microsoft Game Studios el 15 de noviembre de 2001.'),
    ('NFL 2K1', '/home/alberto/img/NFL-2K1.avif', 'NFL 2K1 se lanzó el 7 de septiembre de 2000.'),
    ('Half-Life 2', '/home/alberto/img/Half-life-2.avif', 'En el juego, Gordon Freeman aceptó trabajar para G-Man luego de derrotar a Nihilanth, luego de lo cual quedó congelado en el tiempo.'),
    ('BioShock', '/home/alberto/img/Bioshock-videojuegos.avif', 'BioShock es un videojuego de disparos en primera persona, desarrollado por Irrational Games.'),
    ('GoldenEye 007', '/home/alberto/img/Golden-007.avif', 'Es un first-person shooter para la consola Nintendo 64 que se lanzó en 1997. Es un videojuego desarrollado por Rare y publicado por Nintendo para su consola Nintendo 64 en 1997.'),
    ('Uncharted 2: Among Thieves', '/home/alberto/img/Uncharted-2.avif', 'Es un videojuego de acción en tercera persona para PlayStation 3 y PlayStation 4 publicado por Sony Computer Entertainment en 2009.'),
    ('Resident Evil 4', '/home/alberto/img/Resident-Evil-4.avif', 'Es un juego de aventura y terror desarrollado por Capcom Production Studio 4 y distribuido por varias compañías de videojuegos. Se lanzó en enero de 2005.'),
    ('The Orange Box', '/home/alberto/img/The-Orange-Box.avif', 'Fue creado por Valve y es un paquete de videojuegos que incluye Portal, Half-Life 2, Half-Life 2: Episode One, Half-Life 2: Episode Two y Team Fortress 2.'),
    ('Batman: Arkham City', '/home/alberto/img/Batman-Arkhman-City.avif', 'Batman: Arkham City es un videojuego de acción y aventura, desarrollado por  Rocksteady Studios.'),
    ('Tekken 3', '/home/alberto/img/Tekken-3.avif', 'Tekken 3 es la tercera entrega de Tekken, la popular serie de juegos de lucha.'),
    ('Mass Effect 2', '/home/alberto/img/Electronic-Arts-2.avif', 'Mass Effect 2 fue publicado por Electronic Arts en 2010. Mass Effect 2 es un videojuego de rol de acción publicado por Electronic Arts en 2010.'),
    ('The Legend of Zelda: Twilight Princess', '/home/alberto/img/The-Legend-of-Zelda-twilight.avif', 'The Legend of Zelda: Twilight Princess es un videojuego de acción distribuido por Nintendo. Es el decimotercer lanzamiento de la saga The Legend of Zelda y se estrenó en noviembre de 2006.'),
    ('The Elder Scrolls V: Skyrim', '/home/alberto/img/The-elder-scrolls-V.avif', 'Es  un RPG del tipo mundo abierto desarrollado por Bethesda Game Studios.'),
    ('Half-Life', '/home/alberto/img/Half-Life.avif', 'Half-Life es una serie de juegos de disparos en primera persona desarrollados por Valve. El protagonista de las historias es el físico Gordon Freeman, que lucha contra una invasión alienígena.'),
    ('The Legend of Zelda: The Wind Waker', '/home/alberto/img/The-Legend-of-Zelda-the-wind.avif', 'The Legend of Zelda​: The Wind Waker es un videojuego de aventuras que se presentó en 2002.'),
    ('Gran Turismo', '/home/alberto/img/Gran-Turismo.avif', 'La primera edición de Gran Turismo se lanzó en 1998.'),
    ('Metal Gear Solid 2: Sons of Liberty', '/home/alberto/img/Metal-Gear-Solid-2.avif', 'Metal Gear solid 2 fue desarrollado por Konami. Metal Gear Solid 2: Sons of Liberty es la continuación del videojuegoMetal Gear Solid, desarrollado por Konami. Se lanzó el 13 de noviembre de 2001.'),
    ('Baldurs Gate II: Shadows of Amn', '/home/alberto/img/Baldurs-gate-2.avif', 'Se trata de un juego desarrollado para PC; en el año 2000.'),
    ('Grand Theft Auto: San Andreas', '/home/alberto/img/Grand-Theft-auto-san-andreas.avif', 'El videojuego fue estrenado en octubre de 2004.'),
    ('Grand Theft Auto: Vice City', '/home/alberto/img/GTA-Vice-City.avif', 'GTA Vice City.'),
    ('LittleBigPlanet', '/home/alberto/img/Little-Big-Planet-3.avif', 'Little Big Planet 3.'),
    ('The Legend of Zelda: Collectors Edition', '/home/alberto/img/the-Legend-of-Zelda-editors-collection.avif', 'Es un juego de Game Cube.'),
    ('Red Dead Redemption', '/home/alberto/img/Red-Dead-redemption.avif', 'Fue desarrollado por Rockstar y se estrenó en 2010.'),
    ('Gran Turismo 3: A-Spec', '/home/alberto/img/Gran-Turismo-3A.avif', 'Se publicó para PlayStation 2, en 2001.'),
    ('Halo 2', '/home/alberto/img/Halo-2.avif', 'Halo 2 fue lanzado para la consola Xbox en 2004. Halo 2 es un videojuego de disparos en primera persona desarrollado por Bungie Studios y lanzado para la consola Xbox en 2004.'),
    ('The Legend of Zelda: A Link to the Past', '/home/alberto/img/Zelda-a-link-to-the-past.avif', 'Se presentó en 2001.'),
    ('The Legend of Zelda: Majoras Mask', '/home/alberto/img/Legend-of-zelda-majora-mask.avif', 'Es una juego de acción y aventura como toda la saga de Leng of Zelda. The Legend of Zelda: Majoras Mask es un videojuego de acción.'),
    ('The Last of Us', '/home/alberto/img/The-Last-of-Us.avif', 'The Last of Us. Primera saga del videojuego.'),
    ('Madden NFL 2003', '/home/alberto/img/Madden-NFL.avif', 'Madden NFL se lanzó en 2002. Madden NFL 2003 es un juego de fútbol americano basado en la NFL, publicado por EA Sports y desarrollado por EA Tiburon y Budcat Creations. El título se lanzó en agosto de 2002.'),
    ('Portal 2', '/home/alberto/img/Portal-2.avif', 'Portal 2 es la segunda entrega de un juego de disparos en primera persona, desarrollado por Valve Corporation. La protagonista, llamada Chell, despierta, en una habitación, 50 días tras haber sido criogenizada. Ése es el comienzo de esta aventura.'),
    ('Metal Gear Solid V: The Phantom Pain', '/home/alberto/img/Metal-Gear-Solid-V-The-Phantom-Pain.avif', 'Metal Gear Solid V: The Phantom Pain es un videojuego de acción de la saga Metal Gear, creado por Kojima Productions y producido por Hideo Kojima. El juego se sitúa en 1984 y el protagonista es Punished "Venom" Snake, que se infiltra en la frontera entre Angola y Zaire, así como en Afganistán, en busca de venganza.'),
    ('World of Goo', '/home/alberto/img/World-of-Goo.avif', 'Se trata de un videojuego de lógica, producido por 2D Boy. El objetivo es crear grandes estructuras usando "bolas de goo". Está disponible para Windows, Mac OS X, Android y Linux.'),
    ('BioShock Infinite', '/home/alberto/img/Bioshock-Infinite.avif', 'BioShock Infinite es un videojuego de disparos en primera persona, creado por Irrational Games y distribuido por 2K Games. El escenario está planteado en 1912 y el personaje principal es Booker DeWitt, un ex agente de Pinkerton que busca rescatar a Elizabeth, que está atrapada en una ciudad a punto del colapso.'),
    ('Final Fantasy IX', '/home/alberto/img/Final-Fantasy-IX.avif', 'Final Fantasy IX es un videojuego de rol desarrollado por la empresa Squaresoft en 2000. Fue el último capítulo de la saga realizado para la consola PlayStation. El diseño y concepto los personajes estuvieron en manos de Yoshitaka Amano y luego se sumaron adaptaciones de parte de Toshiyuki Itahana.'),
    ('Call of Duty: Modern Warfare 2', '/home/alberto/img/Call-of-Duty-modern-warfare.avif', 'Call of Duty Modern Warfare se lanzó en 2009. Es un videojuego de acción, creado por Infinity Ward y distribuido por Activision. Es la sexta entrega de la saga y salió a la venta el 10 de noviembre de 2009. La historia comienza 5 años después de Modern Warfare, con Imran Zakhaev, que ahora fue declarado héroe de la nueva Rusia.'),
    ('God of War', '/home/alberto/img/God-of-war-edited.avif', 'God of War narra las aventuras del guerrero Kratos. Se basa en las aventuras de un todo poderoso Kratos, que se enfrenta a varios personajes de la mitología griega y nórdica. Fue desarrollado por Santa Monica Studio y publicado por Sony Interactive Entertainment (SIE). El año pasado ganó el premio al mejor videojuego del año en la gala The Game Awards, que se hizo en Los Ángeles.');

-- Asignación de permisos al usuario dwes
GRANT ALL PRIVILEGES ON Tienda_Juegos.* TO 'dwes'@'localhost';
FLUSH PRIVILEGES;