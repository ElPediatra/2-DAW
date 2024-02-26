DROP DATABASE IF EXISTS Instituto;
CREATE DATABASE Instituto;
USE Instituto;

CREATE TABLE Profesores (
	Dni char(9),
	Nombre varchar(40) NOT NULL,
	Direccion varchar(50) NOT NULL,
	Tfno char(9) NOT NULL,
	CONSTRAINT pf_Profesores PRIMARY KEY (Dni)
);

CREATE TABLE Modulos (
	Codigo char(5),
	Nombre varchar(40) NOT NULL,
	Dni_profesor char(9) NOT NULL,
	CONSTRAINT pk_modulos PRIMARY KEY (Codigo),
	CONSTRAINT fk_modulosProfesores FOREIGN KEY (Dni_profesor)
		REFERENCES Profesores(Dni)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
);

#Creamos la tabla Alumnos sin declarar la clave ajena a Grupos
#porque aún no se ha creado esa tabla.
#Añadimos la clave ajena al final con ALTER TABLE
CREATE TABLE Alumnos (
	N_expdte char(5),
	Nombre varchar(40) NOT NULL,
	Apellidos varchar(40) NOT NULL,
	Fecha_nac date NOT NULL,
	Curso TINYINT UNSIGNED NOT NULL,
	Letra char(1) NOT NULL,
	CONSTRAINT pk_alumnos PRIMARY KEY (N_expdte)
);

CREATE TABLE Grupos (
	Curso TINYINT UNSIGNED,
	Letra char(1),
	Aula char(3) NOT NULL,
	Delegado char(5),
	CONSTRAINT pk_grupos PRIMARY KEY (Curso,Letra),
	CONSTRAINT fk_gruposAlumnos FOREIGN KEY (Delegado)
		REFERENCES Alumnos(N_expdte)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
);

CREATE TABLE Matriculas (
	Alumno char(5),
	Modulo char(5),
	CONSTRAINT pk_matriculas PRIMARY KEY (Alumno,Modulo),
	CONSTRAINT fk_matriculasAlumnos FOREIGN KEY (Alumno)
		REFERENCES Alumnos(N_expdte)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT fk_matriculasModulos FOREIGN KEY (Modulo)
		REFERENCES Modulos(Codigo)
		ON UPDATE CASCADE
		ON DELETE CASCADE
);

ALTER TABLE Alumnos
	ADD CONSTRAINT fk_alumnosGrupos FOREIGN KEY (Curso,Letra)
			REFERENCES Grupos(Curso,Letra)
			ON UPDATE CASCADE
			ON DELETE RESTRICT;

DROP USER IF EXISTS 'instituto';
CREATE USER 'instituto' IDENTIFIED BY 'instituto';

GRANT ALL ON Instituto.* to 'instituto';