-- --------------------------------------------------------
-- Descripcion			: Script de creación de Tablas	
-- Fecha Creación		: 01/08/2017                                         		
-- Fecha Modificación	: 01/08/2017
-- Parámetros		:
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios		
-- Versión				: Final										
-- Cambios Importantes	:                                                         	                                                                        		
-- Propiedad de Pepe Tiburon                                                 		
-- ---------------------------------------------------------

USE `restaurant`;

-- ---------------------------------------------------------
-- 1 Descripción: Creación de la Tabla tipoempleado
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`tipoempleado`;

CREATE TABLE `restaurant`.`tipoempleado` (
  `idTipoEmpleado` int(11) NOT NULL AUTO_INCREMENT
  ,`Rol` varchar(50) NOT NULL
  ,CONSTRAINT PK_TIPO_EMPLEADO PRIMARY KEY (`idTipoEmpleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- ---------------------------------------------------------
-- 2 Descripción: Creación de la Tabla distritos
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`distritos`;

CREATE TABLE `restaurant`.`distritos` (
  `idDistritos` int(11) NOT NULL AUTO_INCREMENT
  ,`Distrito` varchar(60) NOT NULL
  ,CONSTRAINT PK_DISTRITO PRIMARY KEY (`idDistritos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 3 Descripción: Creación de la Tabla categoriaplato
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`categoriaplato`;

CREATE TABLE `restaurant`.`categoriaplato` (
  `idCategoriaPlato` int(11) NOT NULL AUTO_INCREMENT
  ,`Categoria` varchar(50) NOT NULL
  ,CONSTRAINT PK_CATEGORIA_PLATO PRIMARY KEY (`idCategoriaPlato`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 4 Descripción: Creación de la Tabla estadoboleta
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`estadoboleta`;

CREATE TABLE `restaurant`.`estadoboleta` (
  `idEstadoPedido` int(11) NOT NULL AUTO_INCREMENT
  ,`Estado_Boleta` varchar(45) NOT NULL
  ,CONSTRAINT PK_ESTADO_BOLETA PRIMARY KEY (`idEstadoPedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 5 Descripción: Creación de la Tabla empleados
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`empleados`;

CREATE TABLE `restaurant`.`empleados` (
  `idEmpleados` int(11) NOT NULL AUTO_INCREMENT
  ,`Nombres` varchar(60) NOT NULL
  ,`Apellidos` varchar(60) NOT NULL
  ,`Dni` int(11) NOT NULL
  ,`Fecha_Nacimiento` date NOT NULL
  ,`Direccion` varchar(100) NOT NULL
  ,`Celular` int(11) DEFAULT NULL
  ,`Sexo` varchar(45) DEFAULT NULL
  ,`Fecha_Registro` date DEFAULT NULL
  ,`Estado` char(1) NOT NULL
  ,`Correo_Electronico` varchar(100) DEFAULT NULL
  ,`Usuario` varchar(50) NOT NULL
  ,`Contrasena` varchar(70) NOT NULL
  ,`TipoEmpleado_idTipoEmpleado` int(11) NOT NULL
  ,CONSTRAINT PK_EMPLEADO PRIMARY KEY (`idEmpleados`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 6 Descripción: Creación de la Tabla clientes
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`clientes`;

CREATE TABLE `restaurant`.`clientes` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT
  ,`Nombres` varchar(45) NOT NULL
  ,`Dni` int(11) NOT NULL
  ,`Sexo` varchar(1) DEFAULT NULL
  ,`Direccion` varchar(60) DEFAULT NULL
  ,`Referencia` varchar(100) DEFAULT NULL
  ,`Celular` int(11) DEFAULT NULL
  ,`Telefono` int(11) DEFAULT NULL
  ,`Estado` char(1) NOT NULL
  ,`Fecha_Registro` date DEFAULT NULL
  ,`Distritos_idDistritos` int(11) NOT NULL
  ,`latitud` decimal(18,18) NOT NULL
  ,`longitud` decimal(18,18) NOT NULL
  ,CONSTRAINT PK_CLIENTE PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 7 Descripción: Creación de la Tabla platos
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`platos`;

CREATE TABLE `restaurant`.`platos` (
  `idPlatos` int(11) NOT NULL AUTO_INCREMENT
  ,`Nombres` varchar(50) NOT NULL
  ,`Descripcion` varchar(150) NOT NULL
  ,`Imagen` varchar(300) NOT NULL
  ,`Precio` decimal(7,2) NOT NULL
  ,`Cantidad` int(11) NOT NULL
  ,`Estado` char(1) NOT NULL
  ,`CategoriaPlato_idCategoriaPlato` int(11) NOT NULL
  ,CONSTRAINT PK_PLATO PRIMARY KEY (`idPlatos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 8 Descripción: Creación de la Tabla usuario
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`usuario`;

CREATE TABLE `restaurant`.`usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT
  ,`CorreoElectronico` varchar(100) NOT NULL
  ,`Contrasena` varchar(150) NOT NULL
  ,`Cliente_idCliente` int(11) NOT NULL
  ,CONSTRAINT PK_USUARIO PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 9 Descripción: Creación de la Tabla moto
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`moto`;

CREATE TABLE `restaurant`.`moto` (
  `idPlaca` varchar(11) NOT NULL
  ,`Marca_Moto` varchar(50) DEFAULT NULL
  ,`Soat` varchar(40) DEFAULT NULL
  ,`Estado` char(1) DEFAULT NULL
  ,`empleados_idEmpleados` int(11) NOT NULL
  ,CONSTRAINT PK_MOTO PRIMARY KEY (`idPlaca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 10 Descripción: Creación de la Tabla detallepedido
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`detallepedido`;

CREATE TABLE `restaurant`.`detallepedido` (
  `idDetallePedido` int(11) NOT NULL AUTO_INCREMENT
  ,`Cantidad` varchar(45) NOT NULL
  ,`Observacion` varchar(100) NOT NULL
  ,`Pedidos_idPedidos` int(11) NOT NULL
  ,`Platos_idPlatos` int(11) NOT NULL
  ,CONSTRAINT PK_DETALLE_PEDIDO PRIMARY KEY (`idDetallePedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 11 Descripción: Creación de la Tabla pedidos
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`pedidos`;

CREATE TABLE `restaurant`.`pedidos` (
  `idPedidos` int(11) NOT NULL AUTO_INCREMENT
  ,`Fecha` date NOT NULL
  ,`Hora_Pedido` time DEFAULT NULL
  ,`Clientes_idCliente` int(11) NOT NULL
  ,`Total` decimal(7,2) NOT NULL
  ,`Estado_Administrador` tinyint(4) NOT NULL
  ,`Estado_Cocinero` tinyint(4) NOT NULL
  ,`Estado_Cajero` tinyint(4) NOT NULL
  ,`Comanda` varchar(200) NOT NULL
  ,`ObservacionAdministrador` varchar(200) DEFAULT NULL
  ,CONSTRAINT PK_PEDIDO PRIMARY KEY (`idPedidos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 12 Descripción: Creación de la Tabla asignacion
-- ---------------------------------------------------------
-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`asignacion`;

CREATE TABLE `restaurant`.`asignacion` (
  `idasignacion` int(11) NOT NULL AUTO_INCREMENT
  ,`empleados_idEmpleados` int(11) NOT NULL
  ,`pedidos_idPedidos` int(11) NOT NULL
  ,CONSTRAINT PK_ASIGNACION PRIMARY KEY (`idasignacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 13 Descripción: Creación de la Tabla detalledocumentoboleta
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`detalledocumentoboleta`;

CREATE TABLE `restaurant`.`detalledocumentoboleta` (
  `idDetalleDocumentoBoleta` int(11) NOT NULL AUTO_INCREMENT
  ,`Producto` varchar(50) NOT NULL
  ,`Cantidad` int(11) NOT NULL
  ,`Precio` decimal(7,2) NOT NULL
  ,`DocumentoBoleta_idDocumentoBoleta` int(11) NOT NULL
  ,CONSTRAINT PK_DETALLE_DOCUMENTO PRIMARY KEY (`idDetalleDocumentoBoleta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `restaurant`.`documentoboleta`;

-- ---------------------------------------------------------
-- 14 Descripción: Creación de la Tabla documentoboleta
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `restaurant`.`documentoboleta`;

CREATE TABLE `restaurant`.`documentoboleta` (
  `idDocumentoBoleta` int(11) NOT NULL AUTO_INCREMENT
  ,`Nombre` varchar(50) NOT NULL
  ,`Dni` int(11) NOT NULL
  ,`Total` decimal(7,2) NOT NULL
  ,`Fecha_Emision` date NOT NULL
  ,`Hora_Emision` varchar(10) NOT NULL
  ,`Pedidos_idPedidos` int(11) NOT NULL
  ,`EstadoBoleta_idEstadoPedido` int(11) NOT NULL
  ,`Empleados_idEmpleados` int(11) NOT NULL
  ,CONSTRAINT PK_DOCUMENTO PRIMARY KEY (`idDocumentoBoleta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones	
-- ---------------------------------------------------------

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `Restaurant`.`empleados`
-- ---------------------------------------------------------
  ALTER TABLE `restaurant`.`empleados`
  ADD CONSTRAINT `fk_Empleados_TipoEmpleado1` FOREIGN KEY (`TipoEmpleado_idTipoEmpleado`) REFERENCES `tipoempleado` (`idTipoEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `restaurant``clientes`
-- ---------------------------------------------------------
ALTER TABLE `restaurant`.`clientes`
  ADD CONSTRAINT `fk_Cliente_Distritos1` FOREIGN KEY (`Distritos_idDistritos`) REFERENCES `distritos` (`idDistritos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `restaurant`.`platos`
-- ---------------------------------------------------------
ALTER TABLE `restaurant`.`platos`
  ADD CONSTRAINT `fk_Platos_CategoriaPlato1` FOREIGN KEY (`CategoriaPlato_idCategoriaPlato`) REFERENCES `categoriaplato` (`idCategoriaPlato`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `restaurant`.`usuario`
-- ---------------------------------------------------------
ALTER TABLE `restaurant`.`usuario`
  ADD CONSTRAINT `fk_Usuario_Cliente1` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `clientes` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;
  
-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `restaurant`.`moto`
-- ---------------------------------------------------------
ALTER TABLE `restaurant`.`moto`
  ADD CONSTRAINT `fk_moto_empleados1` FOREIGN KEY (`empleados_idEmpleados`) REFERENCES `empleados` (`idEmpleados`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `restaurant`.`detallepedido`
-- ---------------------------------------------------------
ALTER TABLE `restaurant`.`detallepedido`
  ADD CONSTRAINT `fk_DetallePedido_Pedidos1` FOREIGN KEY (`Pedidos_idPedidos`) REFERENCES `pedidos` (`idPedidos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DetallePedido_Platos1` FOREIGN KEY (`Platos_idPlatos`) REFERENCES `platos` (`idPlatos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `restaurant`.`pedidos`
-- ---------------------------------------------------------
ALTER TABLE `restaurant`.`pedidos`
  ADD CONSTRAINT `fk_Pedidos_Clientes1` FOREIGN KEY (`Clientes_idCliente`) REFERENCES `clientes` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `restaurant`.`asignacion`
-- ---------------------------------------------------------
ALTER TABLE `restaurant`.`asignacion`
  ADD CONSTRAINT `fk_asignacion_empleados1` FOREIGN KEY (`empleados_idEmpleados`) REFERENCES `empleados` (`idEmpleados`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asignacion_pedidos1` FOREIGN KEY (`pedidos_idPedidos`) REFERENCES `pedidos` (`idPedidos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `restaurant`.`detalledocumentoboleta`
-- ---------------------------------------------------------
ALTER TABLE `restaurant`.`detalledocumentoboleta`
  ADD CONSTRAINT `fk_DetalleDocumentoBoleta_DocumentoBoleta1` FOREIGN KEY (`DocumentoBoleta_idDocumentoBoleta`) REFERENCES `documentoboleta` (`idDocumentoBoleta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `restaurant`.`documentoboleta`
-- ---------------------------------------------------------
ALTER TABLE `restaurant`.`documentoboleta`
  ADD CONSTRAINT `fk_DocumentoBoleta_Empleados1` FOREIGN KEY (`Empleados_idEmpleados`) REFERENCES `empleados` (`idEmpleados`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DocumentoBoleta_EstadoBoleta1` FOREIGN KEY (`EstadoBoleta_idEstadoPedido`) REFERENCES `estadoboleta` (`idEstadoPedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DocumentoBoleta_Pedidos1` FOREIGN KEY (`Pedidos_idPedidos`) REFERENCES `pedidos` (`idPedidos`) ON DELETE NO ACTION ON UPDATE NO ACTION;


