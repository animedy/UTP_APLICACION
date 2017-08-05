-- --------------------------------------------------------
-- Descripcion			: Script de creación de Tablas	
-- Fecha Creación		: 01/08/2017                                         		
-- Fecha Modificación	: 01/08/2017
-- Parámetros		:
-- Autor					: Carlos Alberto Sanchez Aquino		
-- Versión				: Final										
-- Cambios Importantes	:                                                         	                                                                        		
-- Propiedad de Pepe Tiburon                                                 		
-- ---------------------------------------------------------

USE `restaurant`;

-- ---------------------------------------------------------
-- 1 Descripción: Creación de la Tabla Documento Pago
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`DOCUMENTO_PAGO`;

CREATE TABLE `restaurant`.`DOCUMENTO_PAGO` (
	`DOCU_PAGO_ID` 			INT(11) NOT NULL AUTO_INCREMENT
	,`PEDIDO_ID` 			INT(11) NOT NULL
	,`EMPLEADO_ID` 			INT(11) NOT NULL
	,`ESTADO_DOCU_ID` 		INT(11) NOT NULL
	,`NOMBRES` 				VARCHAR(50) NOT NULL
	,`DNI` 					INT(11) NOT NULL
	,`TOTAL` 				DECIMAL(7,2) NOT NULL
	,`FECHA_EMISION` 		DATE NOT NULL
	,`HORA_EMISION` 		VARCHAR(10) NOT NULL
	,CONSTRAINT PK_DOCUMENTO_PAGO PRIMARY KEY (`DOCU_PAGO_ID`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 2 Descripción: Creación de la Tabla Pedidos
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`PEDIDOS`;

CREATE TABLE `restaurant`.`PEDIDOS` (
	`PEDIDO_ID` 			INT(11) NOT NULL AUTO_INCREMENT
	,`CLIENTE_ID` 			INT(11) NOT NULL
	,`FECHA_Y_HORA` 		DATETIME NOT NULL 
	,`TOTAL` 				DECIMAL(17,2) NOT NULL
	,`ESTADO_ADMI` 			CHAR(1) NOT NULL
	,`ESTADO_COCI` 			CHAR(1) NOT NULL
	,`ESTADO_CAJE` 			CHAR(1) NOT NULL 
	,`COMANDA` 				VARCHAR(200) NOT NULL  
	,`COMENTARIO` 			VARCHAR(200) DEFAULT NULL
	,CONSTRAINT PK_PEDIDOS PRIMARY KEY (`PEDIDO_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 3 Descripción: Creación de la Tabla Usuario
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`USUARIO`;

CREATE TABLE `restaurant`.`USUARIO` (
	`USUARIO_ID` 			INT(11) NOT NULL AUTO_INCREMENT
	,`CLIENTE_ID` 			INT(11) NOT NULL
	,`CORREO_ELECTRONICO` 	VARCHAR(100) NOT NULL
	,`CONTRASENIA` 			VARCHAR(150) NOT NULL
	,CONSTRAINT PK_USUARIO PRIMARY KEY (`USUARIO_ID`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 4 Descripción: Creación de la Tabla Clientes
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`CLIENTES`;

CREATE TABLE `restaurant`.`CLIENTES` (
	`CLIENTE_ID` 			INT(11) NOT NULL AUTO_INCREMENT
	,`DISTRITO_ID` 			INT(11) NOT NULL
	,`NOMBRES`				VARCHAR(45) NOT NULL
	,`DNI` 					INT(11) NOT NULL
	,`SEXO` 				VARCHAR(1) DEFAULT NULL
	,`DIRECCION` 			VARCHAR(60) DEFAULT NULL
	,`REFERENCIA` 			VARCHAR(100) DEFAULT NULL
	,`CELULAR` 				INT(11) DEFAULT NULL
	,`TELEFONO` 			INT(11) DEFAULT NULL
	,`ESTADO` 				CHAR(1) NOT NULL
	,`FECHA_REGISTRO` 	 	DATE DEFAULT NULL
	,`LATITUD` 				DECIMAL(18,18) NOT NULL
	,`LONGITUD` 			DECIMAL(18,18) NOT NULL
	,CONSTRAINT PK_CLIENTES PRIMARY KEY (`CLIENTE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 5 Descripción: Creación de la Tabla Distritos
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`DISTRITOS`;

CREATE TABLE `restaurant`.`DISTRITOS` (
	`DISTRITO_ID` 			INT(11) NOT NULL AUTO_INCREMENT
	,`DISTRITO` 			VARCHAR(60) NOT NULL
	,CONSTRAINT PK_DISTRITOS PRIMARY KEY (`DISTRITO_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 6 Descripción: Creación de la Tabla Detalle Pedido
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`DETALLE_PEDIDO`;

CREATE TABLE `restaurant`.`DETALLE_PEDIDO` (
	`DET_PEDIDO_ID` 		INT(11) NOT NULL AUTO_INCREMENT
	,`PEDIDO_ID` 			INT(11) NOT NULL
	,`PLATO_ID` 			INT(11) NOT NULL
	,`CANTIDAD` 			INT(11) NOT NULL
	,`OBSERVACION` 			VARCHAR(150) NULL
	,CONSTRAINT PK_DETALLE_PEDIDO PRIMARY KEY (`DET_PEDIDO_ID`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 7 Descripción: Creación de la Tabla Platos
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`PLATOS`;

CREATE TABLE `restaurant`.`PLATOS` (
	`PLATO_ID` 				INT(11) NOT NULL AUTO_INCREMENT
	,`CATE_PLATO_ID` 		INT(11) NOT NULL
	,`NOMBRES` 				VARCHAR(50) NOT NULL
	,`DESCRIPCION` 			VARCHAR(150) NOT NULL
	,`IMAGEN` 				VARCHAR(300) NOT NULL
	,`PRECIO` 				DECIMAL(7,2) NOT NULL
	,`ESTADO` 				CHAR(1) NOT NULL
	,`CANTIDAD_CARTA` 		INT(11) NOT NULL
	,`ESTADO_CARTA` 		CHAR(1) NOT NULL
	,CONSTRAINT PK_PLATOS PRIMARY KEY (`PLATO_ID`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 8 Descripción: Creación de la Tabla Categoria Plato
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`CATEGORIA_PLATO`;

CREATE TABLE `restaurant`.`CATEGORIA_PLATO` (
	`CATE_PLATO_ID` 		INT(11) NOT NULL AUTO_INCREMENT
	,`CATEGORIA` 			VARCHAR(50) NOT NULL
	,CONSTRAINT PK_CATEGORIA_PLATO PRIMARY KEY (`CATE_PLATO_ID`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 9 Descripción: Creación de la Tabla Detalle Documento Pago
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`DETALLE_DOCUMENTO_PAGO`;

CREATE TABLE `restaurant`.`DETALLE_DOCUMENTO_PAGO` (
	`DET_DOCU_PAGO_ID` 		INT(11) NOT NULL AUTO_INCREMENT
	,`DOCU_PAGO_ID` 		INT(11) NOT NULL
	,`PRODUCTO` 			VARCHAR(50) NOT NULL
	,`CANTIDAD` 			INT(11) NOT NULL
	,`PRECIO` 				DECIMAL(7,2) NOT NULL
	,CONSTRAINT PK_DOCUMENTO_PAGO PRIMARY KEY (`DET_DOCU_PAGO_ID`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 10 Descripción: Creación de la Tabla Asignacion
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`ASIGNACION`;

CREATE TABLE `restaurant`.`ASIGNACION` (
	`ASIGNACION_ID` 		INT(11) NOT NULL AUTO_INCREMENT
	,`PEDIDO_ID` 			INT(11) NOT NULL
	,`EMPLEADO_ID` 			INT(11) NOT NULL
	,`OBSERVACION` 			VARCHAR(150) NULL
	,`CANTIDAD` 			INT(11) NULL
	,CONSTRAINT PK_ASIGNACION PRIMARY KEY (`ASIGNACION_ID`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 11 Descripción: Creación de la Tabla Moto
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`MOTO`;

CREATE TABLE `restaurant`.`MOTO` (
	`PLACA_ID` 				VARCHAR(20) NOT NULL
	,`EMPLEADO_ID` 			INT(11) NOT NULL
	,`MARCA_MOTO` 			VARCHAR(50) DEFAULT NULL
	,`SOAT` 				VARCHAR(40) DEFAULT NULL
	,`ESTADO` 				CHAR(1) DEFAULT NULL
	,CONSTRAINT PK_EMPLEADOS PRIMARY KEY (`PLACA_ID`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 12 Descripción: Creación de la Tabla Empleados
-- ---------------------------------------------------------
-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`EMPLEADOS`;

CREATE TABLE `restaurant`.`EMPLEADOS` (
	`EMPLEADO_ID` 			INT(11) NOT NULL AUTO_INCREMENT
	,`TIPO_EMPLE_ID` 		INT(11) NOT NULL
	,`NOMBRES` 				VARCHAR(60) NOT NULL
	,`APELLIDOS` 			VARCHAR(60) NOT NULL
	,`DNI` 					INT(11) NOT NULL
	,`FECHA_NACI` 			DATE NOT NULL
	,`DIRECCION` 			VARCHAR(100) NOT NULL
	,`CELULAR` 				INT(11) DEFAULT NULL
	,`SEXO` 				VARCHAR(45) DEFAULT NULL
	,`FECHA_REGISTRO` 		DATE DEFAULT NULL
	,`ESTADO` 				CHAR(1) NOT NULL
	,`CORREO_ELECTRONICO` 	VARCHAR(100) DEFAULT NULL
	,`USUARIO` 				VARCHAR(50) NOT NULL
	,`CONTRASENIA` 			VARCHAR(70) NOT NULL
	,CONSTRAINT PK_EMPLEADOS PRIMARY KEY (`EMPLEADO_ID`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 13 Descripción: Creación de la Tabla Tipo Empleado
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`TIPO_EMPLEADO`;

CREATE TABLE `restaurant`.`TIPO_EMPLEADO` (
	`TIPO_EMPLE_ID` 		INT(11) NOT NULL AUTO_INCREMENT
	,`ROL` 					VARCHAR(50) NOT NULL
	,CONSTRAINT PK_TIPO_EMPLEADO PRIMARY KEY (`TIPO_EMPLE_ID`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 14 Descripción: Creación de la Tabla Estado Documento
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`ESTADO_DOCUMENTO`;

CREATE TABLE `restaurant`.`ESTADO_DOCUMENTO` (
	`ESTADO_DOCU_ID` 		INT(11) NOT NULL AUTO_INCREMENT
	,`ESTADO_DOCUMENTO` 		VARCHAR(30) NOT NULL
	,CONSTRAINT PK_ESTADO_DOCUMENTO PRIMARY KEY (`ESTADO_DOCU_ID`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones	
-- ---------------------------------------------------------

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `Restaurant`.`DOCUMENTO_PAGO`
-- ---------------------------------------------------------
ALTER TABLE `restaurant`.`DOCUMENTO_PAGO`
  ADD CONSTRAINT `FK_DOCUMENTO_PAGO_EMPLEADOS` FOREIGN KEY (`EMPLEADO_ID`) REFERENCES `restaurant`.`EMPLEADOS` (`EMPLEADO_ID`);
ALTER TABLE `restaurant`.`DOCUMENTO_PAGO`
  ADD CONSTRAINT `FK_DOCUMENTO_PAGO_ESTADO_DOCUMENTO` FOREIGN KEY (`ESTADO_DOCU_ID`) REFERENCES `restaurant`.`ESTADO_DOCUMENTO` (`ESTADO_DOCU_ID`);
ALTER TABLE `restaurant`.`DOCUMENTO_PAGO`
  ADD CONSTRAINT `FK_DOCUMENTO_PAGO_PEDIDOS` FOREIGN KEY (`PEDIDO_ID`) REFERENCES `restaurant`.`PEDIDOS` (`PEDIDO_ID`);

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `Restaurant`.`PEDIDOS`
-- ---------------------------------------------------------
ALTER TABLE `restaurant`.`PEDIDOS`  
  ADD CONSTRAINT `FK_PEDIDOS_CLIENTE` FOREIGN KEY (`CLIENTE_ID`) REFERENCES `restaurant`.`CLIENTES` (`CLIENTE_ID`);

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `Restaurant`.`USUARIO`
-- ---------------------------------------------------------
ALTER TABLE `restaurant`.`USUARIO`
  ADD CONSTRAINT `FK_USUARIO_CLIENTES` FOREIGN KEY (`CLIENTE_ID`) REFERENCES `restaurant`.`CLIENTES` (`CLIENTE_ID`);

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `Restaurant`.`CLIENTES`
-- ---------------------------------------------------------
ALTER TABLE `restaurant`.`CLIENTES`
  ADD CONSTRAINT `FK_CLIENTES_DISTRITOS` FOREIGN KEY (`DISTRITO_ID`) REFERENCES `restaurant`.`DISTRITOS` (`DISTRITO_ID`);
  
-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `Restaurant`.`DETALLE_PEDIDO`
-- ---------------------------------------------------------
ALTER TABLE `restaurant`.`DETALLE_PEDIDO`
  ADD CONSTRAINT `FK_DETALLE_PEDIDO_PEDIDO` FOREIGN KEY (`PEDIDO_ID`) REFERENCES `restaurant`.`PEDIDOS` (`PEDIDO_ID`);  
ALTER TABLE `restaurant`.`DETALLE_PEDIDO`
  ADD CONSTRAINT `FK_DETALLE_PEDIDO_PLATOS` FOREIGN KEY (`PLATO_ID`) REFERENCES `restaurant`.`PLATOS` (`PLATO_ID`);

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `Restaurant`.`PLATOS`
-- ---------------------------------------------------------
ALTER TABLE `restaurant`.`PLATOS`  
  ADD CONSTRAINT `FK_PLATOS_CATEGORIA_PLATO` FOREIGN KEY (`CATE_PLATO_ID`) REFERENCES `restaurant`.`CATEGORIA_PLATO` (`CATE_PLATO_ID`);

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `Restaurant`.`DETALLE_DOCUMENTO_PAGO`
-- ---------------------------------------------------------
ALTER TABLE `restaurant`.`DETALLE_DOCUMENTO_PAGO`  
  ADD CONSTRAINT `FK_DETALLE_DOCUMENTO_PAGO_DOCUMENTO_PAGO` FOREIGN KEY (`DOCU_PAGO_ID`) REFERENCES `restaurant`.`DOCUMENTO_PAGO` (`DOCU_PAGO_ID`);

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `Restaurant`.`ASIGNACION`
-- ---------------------------------------------------------
ALTER TABLE `restaurant`.`ASIGNACION`
  ADD CONSTRAINT `FK_ASIGNACION_EMPLEADOS` FOREIGN KEY (`EMPLEADO_ID`) REFERENCES `restaurant`.`EMPLEADOS` (`EMPLEADO_ID`);
  
ALTER TABLE `restaurant`.`ASIGNACION`
  ADD CONSTRAINT `FK_ASIGNACION_PEDIDOS` FOREIGN KEY (`PEDIDO_ID`) REFERENCES `restaurant`.`PEDIDOS` (`PEDIDO_ID`);

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `Restaurant`.`MOTO`
-- ---------------------------------------------------------
ALTER TABLE `restaurant`.`MOTO`  
  ADD CONSTRAINT `fk_MOTO_EMPLEADOS` FOREIGN KEY (`EMPLEADO_ID`) REFERENCES `restaurant`.`EMPLEADOS` (`EMPLEADO_ID`);

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `Restaurant`.`EMPLEADOS`
-- ---------------------------------------------------------
ALTER TABLE `restaurant`.`EMPLEADOS`  
  ADD CONSTRAINT `FK_EMPLEADOS_TIPO_EMPLEADO` FOREIGN KEY (`TIPO_EMPLE_ID`) REFERENCES `restaurant`.`TIPO_EMPLEADO` (`TIPO_EMPLE_ID`);


