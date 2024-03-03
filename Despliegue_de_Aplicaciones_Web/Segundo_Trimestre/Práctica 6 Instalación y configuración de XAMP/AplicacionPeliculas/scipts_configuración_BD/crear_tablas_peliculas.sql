
drop table if exists puntuaciones;
drop table if exists usuarios;
drop table if exists peliculas;


create table peliculas (
	codigo_pelicula int not null auto_increment,
	nombre varchar(170) not null,
	director varchar(50) not null,
	genero varchar(15) not null,
	estreno bool not null,
	publico bool not null,
	fecha_insercion date not null,
	imagen varchar(200),
	unique (nombre),
 primary key (codigo_pelicula)) engine = innodb;

create table usuarios (
	login varchar(10) not null,
	password varchar(32) not null,
	nombre varchar(25) not null,
	apellidos char(30) not null,
	email varchar(30) not null,
	tipo int not null,
 primary key (login)) engine = innodb;

create table puntuaciones (
	codigo_pelicula int not null,
	login varchar(10) not null,
	puntuacion float not null,
	comentario text,
 primary key (codigo_pelicula,login)) engine = innodb;


alter table puntuaciones 
	add foreign key (codigo_pelicula) references peliculas (codigo_pelicula) 
		on delete  restrict 
		on update  restrict;
alter table puntuaciones 
	add foreign key (login) references usuarios (login) 
		on delete  restrict 
		on update  restrict;






