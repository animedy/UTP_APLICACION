-- --------------------------------------------------------
-- Descripcion			: Script de creación de Tablas	
-- Fecha Creación		: 10/08/2017                                         		
-- Fecha Modificación	: 10/08/2017  
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
DROP TABLE IF EXISTS `tipoempleado`;

CREATE TABLE `tipoempleado` (
  `idTipoEmpleado` int(11) NOT NULL AUTO_INCREMENT
  ,`Rol` varchar(50) NOT NULL
  ,CONSTRAINT PK_TIPOEMPLEADO PRIMARY KEY (`idTipoEmpleado`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ---------------------------------------------------------
-- 2 Descripción: Creación de la Tabla distritos
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `distritos`;

CREATE TABLE `distritos` (
  `idDistritos` int(11) NOT NULL AUTO_INCREMENT
  ,`Distrito` varchar(60) NOT NULL
  ,CONSTRAINT PK_DISTRITOS PRIMARY KEY (`idDistritos`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 3 Descripción: Creación de la Tabla categoriaplato
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `categoriaplato`;

CREATE TABLE `categoriaplato` (
 `idCategoriaPlato` int(11) NOT NULL AUTO_INCREMENT
 ,`Categoria` varchar(50) NOT NULL
 ,CONSTRAINT PK_CATEGORIAPLATO PRIMARY KEY (`idCategoriaPlato`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 4 Descripción: Creación de la Tabla estadoboleta
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `estadoboleta`;

CREATE TABLE `estadoboleta` (
  `idEstadoPedido` int(11) NOT NULL AUTO_INCREMENT
  ,`Estado_Boleta` varchar(45) NOT NULL
  ,CONSTRAINT PK_ESTADOBOLETA PRIMARY KEY (`idEstadoPedido`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 5 Descripción: Creación de la Tabla empleados
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `empleados`;

CREATE TABLE `empleados` (
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
  ,`Contrasena` varchar(100) NOT NULL
  ,`TipoEmpleado_idTipoEmpleado` int(11) NOT NULL
  ,CONSTRAINT PK_EMPLEADOS PRIMARY KEY (`idEmpleados`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 6 Descripción: Creación de la Tabla clientes
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
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
  ,CONSTRAINT PK_CLIENTES PRIMARY KEY (`idCliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 7 Descripción: Creación de la Tabla platos
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `platos`;

CREATE TABLE `platos` (
  `idPlatos` int(11) NOT NULL AUTO_INCREMENT
  ,`Nombres` varchar(50) NOT NULL
  ,`Descripcion` varchar(150) NOT NULL
  ,`Imagen` varchar(300) NOT NULL
  ,`Precio` decimal(7,2) NOT NULL
  ,`Cantidad` int(11) NOT NULL
  ,`Estado` char(1) NOT NULL
  ,`CategoriaPlato_idCategoriaPlato` int(11) NOT NULL
  ,CONSTRAINT PK_PLATOS PRIMARY KEY (`idPlatos`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 8 Descripción: Creación de la Tabla usuario
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT
  ,`CorreoElectronico` varchar(100) NOT NULL
  ,`Contrasena` varchar(150) NOT NULL
  ,`Cliente_idCliente` int(11) NOT NULL
  ,CONSTRAINT PK_USUARIO PRIMARY KEY (`idUsuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 9 Descripción: Creación de la Tabla moto
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `moto`;

CREATE TABLE `moto` (
  `idPlaca` varchar(11) NOT NULL
  ,`Marca_Moto` varchar(50) DEFAULT NULL
  ,`Soat` varchar(40) DEFAULT NULL
  ,`Estado` char(1) DEFAULT NULL
  ,`empleados_idEmpleados` int(11) NOT NULL
  ,CONSTRAINT PK_MOTO PRIMARY KEY (`idPlaca`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 10 Descripción: Creación de la Tabla detallepedido
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `detallepedido`;

CREATE TABLE `detallepedido` (
  `idDetallePedido` int(11) NOT NULL AUTO_INCREMENT
  ,`Cantidad` varchar(45) NOT NULL
  ,`Observacion` varchar(100) NOT NULL
  ,`Pedidos_idPedidos` int(11) NOT NULL
  ,`Platos_idPlatos` int(11) NOT NULL
  ,CONSTRAINT PK_DETALLE_PEDIDO PRIMARY KEY (`idDetallePedido`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 11 Descripción: Creación de la Tabla pedidos
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `pedidos`;

CREATE TABLE `pedidos` (
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
  ,`emitido` varchar(20) DEFAULT NULL
  ,CONSTRAINT PK_PEDIDOS PRIMARY KEY (`idPedidos`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 12 Descripción: Creación de la Tabla asignacion
-- ---------------------------------------------------------
-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `asignacion`;

CREATE TABLE `asignacion` (
  `idasignacion` int(11) NOT NULL AUTO_INCREMENT
  ,`empleados_idEmpleados` int(11) NOT NULL
  ,`pedidos_idPedidos` int(11) NOT NULL
  ,CONSTRAINT PK_ASIGNACION PRIMARY KEY (`idasignacion`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------
-- 13 Descripción: Creación de la Tabla detalledocumentoboleta
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `detalledocumentoboleta`;

CREATE TABLE `detalledocumentoboleta` (
  `idDetalleDocumentoBoleta` int(11) NOT NULL AUTO_INCREMENT
  ,`Nro` int(11) NOT NULL
  ,`Producto` varchar(50) COLLATE utf8_unicode_ci NOT NULL
  ,`Cantidad` int(11) NOT NULL
  ,`Precio` decimal(7,2) NOT NULL
  ,`DocumentoBoleta_idDocumentoBoleta` int(11) NOT NULL
  ,CONSTRAINT PK_DETALLE_DOCUMENTO PRIMARY KEY (`idDetalleDocumentoBoleta`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ---------------------------------------------------------
-- 14 Descripción: Creación de la Tabla documentoboleta
-- ---------------------------------------------------------

-- Eliminación de la tabla si es que existe previamente
DROP TABLE IF EXISTS `documentoboleta`;

CREATE TABLE `documentoboleta` (
  `idDocumentoBoleta` int(11) NOT NULL AUTO_INCREMENT
  ,`Nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL
  ,`Dni` int(11) NOT NULL
  ,`Total` decimal(7,2) NOT NULL
  ,`Fecha_Emision` date NOT NULL
  ,`Hora_Emision` varchar(10) COLLATE utf8_unicode_ci NOT NULL
  ,`Pedidos_idPedidos` int(11) NOT NULL
  ,`EstadoBoleta_idEstadoPedido` int(11) NOT NULL
  ,`Empleados_idEmpleados` int(11) NOT NULL
  ,CONSTRAINT PK_DOCUMENTOBOLETA PRIMARY KEY (`idDocumentoBoleta`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones	
-- ---------------------------------------------------------

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `empleados`
-- ---------------------------------------------------------
  ALTER TABLE `empleados`
  ADD CONSTRAINT `fk_Empleados_TipoEmpleado` FOREIGN KEY (`TipoEmpleado_idTipoEmpleado`) REFERENCES `tipoempleado` (`idTipoEmpleado`);

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `clientes`
-- ---------------------------------------------------------
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_Cliente_Distritos` FOREIGN KEY (`Distritos_idDistritos`) REFERENCES `distritos` (`idDistritos`);

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `platos`
-- ---------------------------------------------------------
ALTER TABLE `platos`
  ADD CONSTRAINT `fk_Platos_CategoriaPlato` FOREIGN KEY (`CategoriaPlato_idCategoriaPlato`) REFERENCES `categoriaplato` (`idCategoriaPlato`);

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `usuario`
-- ---------------------------------------------------------
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Cliente` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `clientes` (`idCliente`);
  
-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `moto`
-- ---------------------------------------------------------
ALTER TABLE `moto`
  ADD CONSTRAINT `fk_moto_empleados` FOREIGN KEY (`empleados_idEmpleados`) REFERENCES `empleados` (`idEmpleados`);

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `detallepedido`
-- ---------------------------------------------------------
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `fk_DetallePedido_Pedidos` FOREIGN KEY (`Pedidos_idPedidos`) REFERENCES `pedidos` (`idPedidos`);
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `fk_DetallePedido_Platos` FOREIGN KEY (`Platos_idPlatos`) REFERENCES `platos` (`idPlatos`);

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `pedidos`
-- ---------------------------------------------------------
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_Pedidos_Clientes` FOREIGN KEY (`Clientes_idCliente`) REFERENCES `clientes` (`idCliente`);

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `asignacion`
-- ---------------------------------------------------------
ALTER TABLE `asignacion`
  ADD CONSTRAINT `fk_asignacion_empleados` FOREIGN KEY (`empleados_idEmpleados`) REFERENCES `empleados` (`idEmpleados`);
ALTER TABLE `asignacion`
  ADD CONSTRAINT `fk_asignacion_pedidos` FOREIGN KEY (`pedidos_idPedidos`) REFERENCES `pedidos` (`idPedidos`);

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `detalledocumentoboleta`
-- ---------------------------------------------------------
ALTER TABLE `detalledocumentoboleta`
  ADD CONSTRAINT `fk_DetalleDocumentoBoleta_DocumentoBoleta` FOREIGN KEY (`DocumentoBoleta_idDocumentoBoleta`) REFERENCES `documentoboleta` (`idDocumentoBoleta`);

-- ---------------------------------------------------------
-- Descripción: Creación de la Restricciones `documentoboleta`
-- ---------------------------------------------------------
ALTER TABLE `documentoboleta`
  ADD CONSTRAINT `fk_DocumentoBoleta_Empleados` FOREIGN KEY (`Empleados_idEmpleados`) REFERENCES `empleados` (`idEmpleados`);
ALTER TABLE `documentoboleta`  
  ADD CONSTRAINT `fk_DocumentoBoleta_EstadoBoleta` FOREIGN KEY (`EstadoBoleta_idEstadoPedido`) REFERENCES `estadoboleta` (`idEstadoPedido`);
ALTER TABLE `documentoboleta`  
  ADD CONSTRAINT `fk_DocumentoBoleta_Pedidos` FOREIGN KEY (`Pedidos_idPedidos`) REFERENCES `pedidos` (`idPedidos`);


