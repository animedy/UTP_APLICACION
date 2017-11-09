-- --------------------------------------------------------------------------------
-- Descripcion         : Carga Inicial de las tablas								
-- Fecha Creación      : 01/08/2017												
-- Parámetros          :															
-- Autor					: Carlos Sanchez	
-- -							: Juan Paz Chalco
-- -							: Ricardo Palacios					
-- Versión: Final (Beta|Final)													
-- Cambios Importantes:														
																			
-- Propiedad de de Pepe Tiburon  													
-- ---------------------------------------------------------------------------------																			


USE `restaurant`;

-- ---------------------------------------
-- CARGA DE TABLA TIPO EMPLEADO
-- ---------------------------------------
INSERT INTO `restaurant`.`tipoempleado` (`Rol`) VALUES('ADMINISTRADOR');
INSERT INTO `restaurant`.`tipoempleado` (`Rol`) VALUES('CAJERO');
INSERT INTO `restaurant`.`tipoempleado` (`Rol`) VALUES('COCINA');
INSERT INTO `restaurant`.`tipoempleado` (`Rol`) VALUES('REPARTIDOR');

-- ---------------------------------------
-- CARGA DE TABLA DISTRITO
-- ---------------------------------------
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('Alto Selva Alegre');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('Arequipa');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('Cayma');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('Cerro Colorado');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('Characato');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('Chiguata');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('Jacobo Hunter');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('José Luis Bustamante y Rivero');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('La Joya');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('Mariano Melgar');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('Miraflores');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('Mollebaya');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('Paucarpata');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('Pocsi');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('Polobaya');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('Quequeña');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('Sabandía');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('Sachaca');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('San Juan de Tarucani');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('Santa Isabel de Siguas');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('Santa Rita de Siguas');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('San Juan de Siguas');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('Socabaya');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('Tiabaya');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('Uchumayo');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('Vítor');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('Yanahuara');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('Yarabamba');
INSERT INTO `restaurant`.`DISTRITOS` (`DISTRITO`) VALUES('Yura');

-- ---------------------------------------
-- CARGA DE TABLA TIPO ESTADO BOLETA
-- ---------------------------------------
INSERT INTO `restaurant`.`estadoboleta` (`Estado_Boleta`) VALUES('Por Cancelar');
INSERT INTO `restaurant`.`estadoboleta` (`Estado_Boleta`) VALUES('Cancelado');
INSERT INTO `restaurant`.`estadoboleta` (`Estado_Boleta`) VALUES('Anulado');

-- --------------------------------------------
-- CARGA DE TABLA CATEGORIA PLATO
-- --------------------------------------------
INSERT INTO `restaurant`.`categoriaplato` (`Categoria`) VALUES('Ceviches');
INSERT INTO `restaurant`.`categoriaplato` (`Categoria`) VALUES('Combinados');
INSERT INTO `restaurant`.`categoriaplato` (`Categoria`) VALUES('Platos Variados');

-- --------------------------------------------
-- CARGA DE TABLA EMPLEADOS
-- --------------------------------------------
INSERT INTO `empleados` (`idEmpleados`, `Nombres`, `Apellidos`, `Dni`, `Fecha_Nacimiento`, `Direccion`, `Celular`, `Sexo`, `Fecha_Registro`, `Estado`, `Correo_Electronico`, `Usuario`, `Contrasena`, `TipoEmpleado_idTipoEmpleado`) VALUES
('Ricardo Alonso', 'Palacios Arce', 70000397, '1991-07-11', 'Los Portales de la Megariana A4', 982838046, 'M', '2017-09-29', 'A', 'rrapa10@hotmail.com', 'rpalacios', 'YGp8q/UoUtccgmdocvjPTyfoOr4oCvKUgxGgLEYG5Nk=', 1);
INSERT INTO `empleados` (`idEmpleados`, `Nombres`, `Apellidos`, `Dni`, `Fecha_Nacimiento`, `Direccion`, `Celular`, `Sexo`, `Fecha_Registro`, `Estado`, `Correo_Electronico`, `Usuario`, `Contrasena`, `TipoEmpleado_idTipoEmpleado`) VALUES
('Carlos', 'Sanchez Aquino', 78955678, '1969-12-31', '123123', 454545454, 'M', '2017-08-17', 'A', 'ff@dfdf.da', 'csanchez', 'ziLeH5PL6oiPvqpGsFeq/SosEl3if4C4ApEyQfeJlDV/cIragRI+HLM/8hV0y0MohrxiHfmLafw582XMtgS5fQ==', 4);
INSERT INTO `empleados` (`idEmpleados`, `Nombres`, `Apellidos`, `Dni`, `Fecha_Nacimiento`, `Direccion`, `Celular`, `Sexo`, `Fecha_Registro`, `Estado`, `Correo_Electronico`, `Usuario`, `Contrasena`, `TipoEmpleado_idTipoEmpleado`) VALUES
('carlos', 'sanchez', 12345678, '2017-09-20', 'los arces 1234', 987653210, 'M', '2017-09-29', 'A', 'carlos123@gmail.com', 'carlos', 'YHDHAwX4AcjluFCNFRxYFJbskPn4KoNbVTKukeAb3zo=', 2);
INSERT INTO `empleados` (`idEmpleados`, `Nombres`, `Apellidos`, `Dni`, `Fecha_Nacimiento`, `Direccion`, `Celular`, `Sexo`, `Fecha_Registro`, `Estado`, `Correo_Electronico`, `Usuario`, `Contrasena`, `TipoEmpleado_idTipoEmpleado`) VALUES
('Anibal ', 'Sardon', 12365489, '2017-09-17', 'los 123', 789654235, 'M', '2017-09-29', 'A', 'cocina123@gmail.com', 'cocina', 'BB55jcF8GnAbYIgvfNSMDTSye3sHjFFSdVgs6PW8gVI=', 3);
INSERT INTO `empleados` (`idEmpleados`, `Nombres`, `Apellidos`, `Dni`, `Fecha_Nacimiento`, `Direccion`, `Celular`, `Sexo`, `Fecha_Registro`, `Estado`, `Correo_Electronico`, `Usuario`, `Contrasena`, `TipoEmpleado_idTipoEmpleado`) VALUES
('JUAN', 'Perez Carpio', 12345678, '1990-09-24', 'SU CASA', 999999999, 'M', '2017-11-14', 'A', 'jperez@hotmail.com', 'jperez', 'BB55jcF8GnAbYIgvfNSMDTSye3sHjFFSdVgs6PW8gVI=', 4);
