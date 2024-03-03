-- Curso: Despliegue de aplicaciones web
-- Alvaro García Sánchez 
-- Script para introducir peliculas de prueba en la tabla peliculas
-- NOTA: Para que se muestren las imagenes de las peliculas de prueba que tienen  es necesario 
-- que se copien los archivos de las images en img/   (Directorio situadoa a partir del directorio base de 
-- la aplicacion.



DELETE
FROM PELICULAS;


INSERT INTO `peliculas` (`codigo_pelicula`,`nombre`,`director`,`genero`,`estreno`,`publico`,`fecha_insercion`,`imagen`) VALUES 
  (1,'EL GOLPE','GEORGE ROY HILL','COMEDIA',0,1,'2007-05-27','El_golpe.jpg');
INSERT INTO `peliculas` (`codigo_pelicula`,`nombre`,`director`,`genero`,`estreno`,`publico`,`fecha_insercion`,`imagen`) VALUES 
  (2,'LOS PAJAROS','ALFRED HITCHOCK','TERROR',0,0,'2007-05-27','Los pajaros.jpg');
INSERT INTO `peliculas` (`codigo_pelicula`,`nombre`,`director`,`genero`,`estreno`,`publico`,`fecha_insercion`,`imagen`) VALUES 
  (3,'SOSPECHOSOS HABITUALES','BRYAN SINGER','SUSPENSE',0,0,'2007-05-27','sospechosos_habituales.jpg');
INSERT INTO `peliculas` (`codigo_pelicula`,`nombre`,`director`,`genero`,`estreno`,`publico`,`fecha_insercion`,`imagen`) VALUES 
  (4,'PIRATAS DEL CARIBE. EN EL FIN DEL MUNDO','GORE VERBINSKI','AVENTURAS',1,1,'2007-05-27','piratas3.jpg');
INSERT INTO `peliculas` (`codigo_pelicula`,`nombre`,`director`,`genero`,`estreno`,`publico`,`fecha_insercion`,`imagen`) VALUES 
  (5,'EL SEÑOR LOS DE LOS ANILLOS. LA COMUNIDAD DEL ANIL','PETER JACKSON','AVENTURAS',0,1,'2007-05-27','señor-anillos-1.jpg');
INSERT INTO `peliculas` (`codigo_pelicula`,`nombre`,`director`,`genero`,`estreno`,`publico`,`fecha_insercion`,`imagen`) VALUES
  (6,'WILLOW','RON HOWARD ','AVENTURAS',0,1,'2007-05-27','willow.jpg');
INSERT INTO `peliculas` (`codigo_pelicula`,`nombre`,`director`,`genero`,`estreno`,`publico`,`fecha_insercion`,`imagen`) VALUES 
  (7,'BRAVEHEART','MEL GIBSON','AVENTURAS',0,0,'2007-05-27','Braveheart.jpg');
INSERT INTO `peliculas` (`codigo_pelicula`,`nombre`,`director`,`genero`,`estreno`,`publico`,`fecha_insercion`,`imagen`) VALUES 
  (8,'ALIEN, EL OCTAVO PASAJERO','RIDLEY SCOTT ','TERROR',0,0,'2007-05-27','');
INSERT INTO `peliculas` (`codigo_pelicula`,`nombre`,`director`,`genero`,`estreno`,`publico`,`fecha_insercion`,`imagen`) VALUES 
  (9,'HOTEL RWANDA','TERRY GEORGE','DRAMA',0,0,'2007-05-27','');
INSERT INTO `peliculas` (`codigo_pelicula`,`nombre`,`director`,`genero`,`estreno`,`publico`,`fecha_insercion`,`imagen`) VALUES 
  (10,'CRASH (COLISIÓN)','PAUL HAGGIS','DRAMA',0,0,'2007-05-27','');
INSERT INTO `peliculas` (`codigo_pelicula`,`nombre`,`director`,`genero`,`estreno`,`publico`,`fecha_insercion`,`imagen`) VALUES 
  (11,'EL TEMIBLE BURLON','ROBERT SIODMAK','AVENTURAS',0,1,'2007-05-27','');
INSERT INTO `peliculas` (`codigo_pelicula`,`nombre`,`director`,`genero`,`estreno`,`publico`,`fecha_insercion`,`imagen`) VALUES 
  (12,'EL NUMERO 23','JOEL SCHUMACHER','SUSPENSE',1,1,'2007-05-27','');
INSERT INTO `peliculas` (`codigo_pelicula`,`nombre`,`director`,`genero`,`estreno`,`publico`,`fecha_insercion`,`imagen`) VALUES 
  (13,'BEN-HUR','WILLIAM WYLER ','DRAMA',0,0,'2007-05-27','');
INSERT INTO `peliculas` (`codigo_pelicula`,`nombre`,`director`,`genero`,`estreno`,`publico`,`fecha_insercion`,`imagen`) VALUES 
  (14,'SHREK 3','CHRIS MILLER','COMEDIA',1,1,'2007-05-27','');
INSERT INTO `peliculas` (`codigo_pelicula`,`nombre`,`director`,`genero`,`estreno`,`publico`,`fecha_insercion`,`imagen`) VALUES 
  (15,'LA LISTA DE SHILDER ','STEVEN SPIELBERG','DRAMA',0,0,'2007-05-27','');
INSERT INTO `peliculas` (`codigo_pelicula`,`nombre`,`director`,`genero`,`estreno`,`publico`,`fecha_insercion`,`imagen`) VALUES 
  (16,'LA GRAN EVASION','JOHN STURGES','BELICA',0,1,'2007-05-27','');
INSERT INTO `peliculas` (`codigo_pelicula`,`nombre`,`director`,`genero`,`estreno`,`publico`,`fecha_insercion`,`imagen`) VALUES 
  (17,'DOCE DEL PATIBULO','ROBERT ALDRICH','BELICA',0,0,'2007-05-27','');
INSERT INTO `peliculas` (`codigo_pelicula`,`nombre`,`director`,`genero`,`estreno`,`publico`,`fecha_insercion`,`imagen`) VALUES 
  (18,'DOCE MONOS','TERRY GILLIAM','SUSPENSE',1,0,'2007-05-27','');
INSERT INTO `peliculas` (`codigo_pelicula`,`nombre`,`director`,`genero`,`estreno`,`publico`,`fecha_insercion`,`imagen`) VALUES 
  (19,'AL ESTE DEL EDEN','ELIA KAZAN ','DRAMA',0,0,'2007-05-27','');
INSERT INTO `peliculas` (`codigo_pelicula`,`nombre`,`director`,`genero`,`estreno`,`publico`,`fecha_insercion`,`imagen`) VALUES 
  (20,'TIBURON','STEVEN SPIELBERG','TERROR',0,0,'2007-05-27','');
INSERT INTO `peliculas` (`codigo_pelicula`,`nombre`,`director`,`genero`,`estreno`,`publico`,`fecha_insercion`,`imagen`) VALUES 
  (21,'MATRIX',' LARRY Y ANDY WACHOWSKI','CIENCIA FICCION',0,1,'2007-05-27','');
INSERT INTO `peliculas` (`codigo_pelicula`,`nombre`,`director`,`genero`,`estreno`,`publico`,`fecha_insercion`,`imagen`) VALUES 
  (22,'AMERICAN HISTORY X','TONY KAYE','DRAMA',0,0,'2007-05-27','');
INSERT INTO `peliculas` (`codigo_pelicula`,`nombre`,`director`,`genero`,`estreno`,`publico`,`fecha_insercion`,`imagen`) VALUES 
  (24,'MOSNTER','SS','AVENTURAS',1,1,'2007-05-27','monstruos_sa_2001.jpg');


