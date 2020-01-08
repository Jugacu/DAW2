create database xd;

use xd;

create table centro (
	IdCentro int identity(1,1) not null,
	Nombre varchar(10),
	Calle varchar(10),
	Num int,
	Cp int,
	Ciudad varchar(10),
	Provincia varchar(10),
	constraint pk_idcentro IdCentro primary key
)

create table departamento(
	IdDepartamento int identity(1,1) not null,
	Nombre varchar(10),
	IdCentro int,
	-- Fk off
)