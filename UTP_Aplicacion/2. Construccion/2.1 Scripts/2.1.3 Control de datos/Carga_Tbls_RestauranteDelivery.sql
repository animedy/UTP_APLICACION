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