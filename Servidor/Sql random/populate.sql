/* CREATE TABLE CENTRO */
CREATE TABLE Centro(
	IdCentro INT not null,
	Nombre NVARCHAR(50),
	Calle NVARCHAR(50),
	Num INT,
	Cp INT,
	Ciudad NVARCHAR(50),
	Provincia NVARCHAR(50),
	constraint pk_idcentro primary key (IdCentro)
);

/* INSERT QUERY NO: 1 */
INSERT INTO Centro(IdCentro, Nombre, Calle, Num, Cp, Ciudad, Provincia)
VALUES
(
10, 'SEDE CENTRAL', 'C/ ALCALA', 820, 28004, 'MADRID', 'MADRID'
);

/* INSERT QUERY NO: 2 */
INSERT INTO Centro(IdCentro, Nombre, Calle, Num, Cp, Ciudad, Provincia)
VALUES
(
20, 'RELACIONES CON CLIENTES', 'C/ ATOCHA', 450, 28010, 'MADRID', 'MADRID'
);

/* INSERT QUERY NO: 3 */
INSERT INTO Centro(IdCentro, Nombre, Calle, Num, Cp, Ciudad, Provincia)
VALUES
(
30, 'INVESTIGACION Y DESARROLLO', 'C/ TORRES', 127, 28315, 'TRES CANTOS', 'MADRID'
);


/* CREATE TABLE DEPARTAMENTO */
CREATE TABLE Departamento(
	IdDepartamento INT not null,
	Nombre NVARCHAR(50),
	IdCentro INT,
	IdDirector INT,
	Tipo NVARCHAR(5),
	Presupuesto INT,
	IdSuperior INT,
	constraint pk_id_dept primary key (IdDepartamento),
	constraint fk_id_centr foreign key (IdCentro) references Centro(IdCentro),
	constraint fk_id_sup foreign key (IdSuperior) references Departamento(IdDepartamento)
);


/* INSERT QUERY NO: 1 */
INSERT INTO Departamento(IdDepartamento, Nombre, IdCentro, IdDirector, Tipo, Presupuesto, IdSuperior)
VALUES
(
100, 'DIRECCION GENERAL', 10, 260, 'P', 12, NULL
);

/* INSERT QUERY NO: 2 */
INSERT INTO Departamento(IdDepartamento, Nombre, IdCentro, IdDirector, Tipo, Presupuesto, IdSuperior)
VALUES
(
110, 'DIRECCION COMERCIAL', 20, 180, 'P', 15, 100
);

/* INSERT QUERY NO: 3 */
INSERT INTO Departamento(IdDepartamento, Nombre, IdCentro, IdDirector, Tipo, Presupuesto, IdSuperior)
VALUES
(
112, 'PUBLICIDAD Y VENTAS', 20, 180, 'F', 8, 110
);

/* INSERT QUERY NO: 4 */
INSERT INTO Departamento(IdDepartamento, Nombre, IdCentro, IdDirector, Tipo, Presupuesto, IdSuperior)
VALUES
(
120, 'PRODUCCION', 30, 180, 'F', 7, 100
);

/* INSERT QUERY NO: 5 */
INSERT INTO Departamento(IdDepartamento, Nombre, IdCentro, IdDirector, Tipo, Presupuesto, IdSuperior)
VALUES
(
122, 'SECCION INVESTIGACION', 30, 270, 'P', 11, 120
);

/* INSERT QUERY NO: 6 */
INSERT INTO Departamento(IdDepartamento, Nombre, IdCentro, IdDirector, Tipo, Presupuesto, IdSuperior)
VALUES
(
124, 'SECCION DESARROLLO', 30, 150, 'F', 13, 120
);

/* INSERT QUERY NO: 7 */
INSERT INTO Departamento(IdDepartamento, Nombre, IdCentro, IdDirector, Tipo, Presupuesto, IdSuperior)
VALUES
(
130, 'PERSONAL', 10, 150, 'P', 2, 100
);

/* INSERT QUERY NO: 8 */
INSERT INTO Departamento(IdDepartamento, Nombre, IdCentro, IdDirector, Tipo, Presupuesto, IdSuperior)
VALUES
(
140, 'PROCESO DE DATOS', 10, 350, 'P', 6, 100
);

/* INSERT QUERY NO: 9 */
INSERT INTO Departamento(IdDepartamento, Nombre, IdCentro, IdDirector, Tipo, Presupuesto, IdSuperior)
VALUES
(
150, 'FINANCIERO', 10, 310, 'P', 2, 100
);



/* CREATE TABLE EMPLE */
CREATE TABLE Empleado(
	IdEm_pleado INT not null,
	Apellido NVARCHAR(50),
	Nombre NVARCHAR(50),
	Sexo NVARCHAR(2),
	Num_Hijo INT,
	Calle NVARCHAR(50),
	Num INT,
	Cp INT,
	Ciudad NVARCHAR(50),
	Provincia NVARCHAR(50),
	Tlfno_Particular NVARCHAR(20),
	FNacimiento date,
	FIngreso date,
	Id_Depar_tamento INT,
	Tlfno_Ext INT,
	Salario INT,
	Comision INT,
	constraint pk_id_empl primary key (IdEm_pleado),
	constraint uniq_emp unique(Apellido, Nombre),
);

SET DATEFORMAT mdy;


/* INSERT QUERY NO: 1 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
110, 'PONS GIL', 'CESAR', 'H', 3, 'DAROCA', 25, 28360, 'TRES CANTOS', 'MADRID', 912347636, '11/10/39', '2/10/54', 140, 350, 1310, NULL
);

/* INSERT QUERY NO: 2 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
120, 'LASA PEREZ', 'MARIO', 'H', 1, 'LIBERTAD', 100, 28537, 'PINTO', 'MADRID', 915543875, '6/9/45', '10/1/68', 120, 840, 1350, 110
);

/* INSERT QUERY NO: 3 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
130, 'TEROL SANZ', 'LUCIANO', 'H', 2, 'CANCILLER', 38, 28215, 'PARLA', 'MADRID', 912355633, '11/9/55', '2/1/70', 112, 810, 1290, 110
);

/* INSERT QUERY NO: 4 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
150, 'PEREZ RUIZ', 'JULIO', 'H', 0, 'GRAN VIA', 25, 28005, 'MADRID', 'MADRID', 914355319, '8/10/40', '1/15/59', 130, 340, 1440, NULL
);

/* INSERT QUERY NO: 5 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
160, 'SMITH', 'PHILIP', 'H', 2, 'MOLINER', 26, 28463, 'LAS ROZAS', 'MADRID', 913574431, '7/9/49', '11/11/68', 112, 740, 1310, 110
);

/* INSERT QUERY NO: 6 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
180, 'PEREZ LASA', 'MARCOS', 'H', 2, 'PRESA', 99, 28210, 'PARLA', 'MADRID', 916424734, '10/18/44', '3/18/60', 110, 508, 1480, 50
);

/* INSERT QUERY NO: 7 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
190, 'VEIGA SAINZ', 'JULIANA', 'M', 4, 'GRAN VIA', 48, 28345, 'TRES CANTOS', 'MADRID', 914326349, '5/12/42', '2/11/62', 140, 350, 1300, NULL
);

/* INSERT QUERY NO: 8 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
210, 'GALVEZ', 'PILAR', 'M', 2, 'BARANDA', 33, 28014, 'MADRID', 'MADRID', 0, '9/28/50', '1/22/69', 100, 200, 1380, NULL
);

/* INSERT QUERY NO: 9 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
240, 'SANZ RUIZ', 'LAVINIA', 'M', 3, 'RASTRO', 47, 28614, 'COSLADA', 'MADRID', 912645488, '2/26/52', '2/27/66', 112, 760, 1280, 100
);

/* INSERT QUERY NO: 10 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
250, 'ALBA CARMONA', 'ADRIANA', 'M', 0, 'ALIVIO', 25, 28142, 'GETAFE', 'MADRID', 912754376, '10/27/56', '3/1/73', 120, 250, 1450, NULL
);

/* INSERT QUERY NO: 11 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
260, 'LOPEZ PEREZ', 'ANTONIO', 'H', 6, 'FLAUTA', 14, 28314, 'TRES CANTOS', 'MADRID', 911245663, '12/3/53', '7/12/68', 100, 220, 1720, NULL
);

/* INSERT QUERY NO: 12 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
270, 'GARCIA TORO', 'OCTAVIO', 'H', 3, 'MOLINEROS', 10, 28399, 'ILLESCAS', 'MADRID', 910563775, '5/21/55', '9/10/71', 122, 800, 1380, NULL
);

/* INSERT QUERY NO: 13 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
280, 'FLOR PASTOR', 'DOROTEA', 'M', 5, 'RASTRO', 18, 28236, 'PARLA', 'MADRID', 0, '1/11/58', '10/8/74', 150, 410, 1290, NULL
);

/* INSERT QUERY NO: 14 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
285, 'POLO CARNERO', 'OTILIA', 'M', 0, 'MIRANDA', 243, 28314, 'TRES CANTOS', 'MADRID', 919742454, '10/25/59', '2/15/78', 140, 620, 1380, NULL
);

/* INSERT QUERY NO: 15 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
290, 'GIL DIEZ', 'ANA', 'M', 3, 'PLATA', 132, 28245, 'PARLA', 'MADRID', 912884438, '11/30/57', '2/14/78', 120, 910, 1270, NULL
);

/* INSERT QUERY NO: 16 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
310, 'GARCIA TOMAS', 'AUGUSTO', 'H', 0, 'JIMENEZ', 38, 28415, 'LAS ROZAS', 'MADRID', 918534672, '11/21/56', '1/15/71', 150, 480, 1420, NULL
);

/* INSERT QUERY NO: 17 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
320, 'SANZ TORRES', 'CORNELIO', 'H', 2, 'CLAUDIO', 66, 28119, 'GETAFE', 'MADRID', 913903320, '12/25/67', '2/5/82', 140, 620, 1405, NULL
);

/* INSERT QUERY NO: 18 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
330, 'DIEZ BARCA', 'AMELIA', 'M', 0, 'ARANDA', 95, 28007, 'MADRID', 'MADRID', 913532841, '8/19/58', '3/1/73', 112, 850, 1280, 90
);

/* INSERT QUERY NO: 19 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
350, 'CAMPOS PEREZ', 'AURELIO', 'H', 1, 'GOYA', 14, 28132, 'GETAFE', 'MADRID', 916437720, '4/13/59', '9/10/84', 140, 610, 1450, NULL
);

/* INSERT QUERY NO: 20 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
360, 'LARA CAMPOS', 'DORINDA', 'M', 2, 'VELAZQUEZ', 58, 28006, 'MADRID', 'MADRID', 918543462, '10/29/58', '10/10/78', 112, 750, 1250, 100
);

/* INSERT QUERY NO: 21 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
370, 'RUIZ GARCIA', 'FABIOLA', 'M', 1, 'MURCIA', 33, 28390, 'ILLESCAS', 'MADRID', 912346343, '6/22/77', '1/20/94', 130, 360, 1190, NULL
);

/* INSERT QUERY NO: 22 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
380, 'MARTIN ROCA', 'MICAELA', 'M', 0, 'ROBLE', 47, 28436, 'LAS ROZAS', 'MADRID', 914793731, '3/30/78', '1/1/95', 122, 880, 1180, NULL
);

/* INSERT QUERY NO: 23 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
390, 'MORAN RICO', 'CARMEN', 'M', 1, 'LEGION', 28, 28418, 'LAS ROZAS', 'MADRID', 0, '2/19/76', '10/8/94', 110, 500, 1305, NULL
);

/* INSERT QUERY NO: 24 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
400, 'LARA PASTOR', 'LUCRECIA', 'M', 0, 'HERRERO', 62, 28217, 'PARLA', 'MADRID', 913800220, '8/18/79', '11/1/95', 112, 780, 1185, NULL
);

/* INSERT QUERY NO: 25 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
410, 'MUÑOZ FRANCO', 'AZUCENA', 'M', 0, 'HAYA', 67, 28007, 'MADRID', 'MADRID', 916649929, '7/14/78', '10/13/94', 140, 660, 1175, NULL
);

/* INSERT QUERY NO: 26 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
420, 'FIERRO FERNAN', 'CLAUDIA', 'M', 0, 'PESCADER', 38, 28418, 'LAS ROZAS', 'MADRID', 916520340, '10/22/66', '11/19/88', 150, 450, 1400, NULL
);

/* INSERT QUERY NO: 27 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
430, 'MORA DIAZ', 'MARIA', 'M', 1, 'OSTOS', 18, 28610, 'COSLADA', 'MADRID', 917483225, '10/26/67', '11/19/88', 140, 650, 1300, NULL
);

/* INSERT QUERY NO: 28 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
440, 'DURAN HORNOS', 'ESTER', 'M', 0, 'ESPERANZA', 79, 28328, 'TRES CANTOS', 'MADRID', 917442228, '9/27/66', '2/28/86', 112, 760, 1300, 100
);

/* INSERT QUERY NO: 29 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
450, 'PEREZ RISCO', 'SABINA', 'M', 0, 'BARANDA', 10, 28211, 'PARLA', 'MADRID', 916649337, '10/21/66', '2/28/86', 112, 880, 1300, 100
);

/* INSERT QUERY NO: 30 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
480, 'PINO NEILA', 'DIANA', 'M', 1, 'GOYA', 155, 28001, 'MADRID', 'MADRID', 911872220, '4/4/75', '2/28/92', 112, 760, 1300, 100
);

/* INSERT QUERY NO: 31 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
490, 'DOUGLAS', 'DUGAN', 'H', 0, 'APARICIO', 38, 28419, 'LAS ROZAS', 'MADRID', 915633025, '6/6/74', '1/1/91', 112, 880, 1180, 100
);

/* INSERT QUERY NO: 32 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
500, 'VAZQUEZ RUIZ', 'HONORIA', 'M', 0, 'ROBLEDO', 54, 28532, 'PINTO', 'MADRID', 914236624, '10/8/75', '1/1/92', 112, 750, 1200, 100
);

/* INSERT QUERY NO: 33 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
510, 'CAMPOS PEREZ', 'LUCAS', 'H', 1, 'CAPITAN', 7, 28007, 'MADRID', 'MADRID', 0, '5/4/76', '11/1/92', 110, 550, 1200, NULL
);

/* INSERT QUERY NO: 34 */
INSERT INTO Empleado(IdEm_pleado, Apellido, Nombre, Sexo, Num_Hijo, Calle, Num, Cp, Ciudad, Provincia, Tlfno_Particular, FNacimiento, FIngreso, Id_Depar_tamento, Tlfno_Ext, Salario, Comision)
VALUES
(
550, 'SANTOS GARCIA', 'SANCHO', 'H', 0, 'LERMA', 11, 28530, 'PINTO', 'MADRID', 913792236, '1/10/80', '1/21/96', 112, 780, 1100, 120
);

alter table Empleado add constraint fk_id_dept foreign key (Id_Depar_tamento) references Departamento(IdDepartamento);
alter table Departamento add constraint fk_id_direct foreign key (IdDirector) references Empleado(IdEm_pleado);
