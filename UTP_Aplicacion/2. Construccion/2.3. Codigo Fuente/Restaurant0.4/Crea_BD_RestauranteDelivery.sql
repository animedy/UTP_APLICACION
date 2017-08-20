-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-08-2017 a las 10:38:31
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurant`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `idasignacion` int(11) NOT NULL,
  `empleados_idEmpleados` int(11) NOT NULL,
  `pedidos_idPedidos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriaplato`
--

CREATE TABLE `categoriaplato` (
  `idCategoriaPlato` int(11) NOT NULL,
  `Categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoriaplato`
--

INSERT INTO `categoriaplato` (`idCategoriaPlato`, `Categoria`) VALUES
(1, 'Ceviches'),
(2, 'Combinados'),
(3, 'Platos Variados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `Nombres` varchar(45) NOT NULL,
  `Dni` int(11) NOT NULL,
  `Sexo` varchar(1) DEFAULT NULL,
  `Direccion` varchar(60) DEFAULT NULL,
  `Referencia` varchar(100) DEFAULT NULL,
  `Celular` int(11) DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Estado` char(1) NOT NULL,
  `Fecha_Registro` date DEFAULT NULL,
  `Distritos_idDistritos` int(11) NOT NULL,
  `latitud` decimal(18,18) NOT NULL,
  `longitud` decimal(18,18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `Nombres`, `Dni`, `Sexo`, `Direccion`, `Referencia`, `Celular`, `Telefono`, `Estado`, `Fecha_Registro`, `Distritos_idDistritos`, `latitud`, `longitud`) VALUES
(2, 'Juan Perez', 56589655, 'M', '123123', 'Mall Aventura', 2147483647, 2147483647, 'A', '2017-08-01', 19, '0.000000000000000000', '0.000000000000000000'),
(3, 'Juan Mamani', 56589655, 'M', 'Av. Ejercito', '', 982926014, 2147483647, 'A', '2017-08-01', 17, '0.000000000000000000', '0.000000000000000000'),
(4, 'ADRIANA MILAGROS', 71834096, 'F', 'AV. DOLORES N° 177 JLBYRIVERO', 'SAUNAS DE LA DOLORES', 951151792, 348310, 'A', '2017-08-03', 17, '0.000000000000000000', '0.000000000000000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalledocumentoboleta`
--

CREATE TABLE `detalledocumentoboleta` (
  `idDetalleDocumentoBoleta` int(11) NOT NULL,
  `Producto` varchar(50) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` decimal(7,2) NOT NULL,
  `DocumentoBoleta_idDocumentoBoleta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `idDetallePedido` int(11) NOT NULL,
  `Cantidad` varchar(45) NOT NULL,
  `Observacion` varchar(100) NOT NULL,
  `Pedidos_idPedidos` int(11) NOT NULL,
  `Platos_idPlatos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detallepedido`
--

INSERT INTO `detallepedido` (`idDetallePedido`, `Cantidad`, `Observacion`, `Pedidos_idPedidos`, `Platos_idPlatos`) VALUES
(1, '1', 'Bastante', 3, 1),
(2, '1', 'Sin aji', 3, 3),
(3, '1', 'Con papas en vez de arroz', 3, 2),
(8, '1', 'Bastante Arroz', 4, 1),
(9, '2', 'bastante chicharrón de camarón', 5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distritos`
--

CREATE TABLE `distritos` (
  `idDistritos` int(11) NOT NULL,
  `Distrito` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `distritos`
--

INSERT INTO `distritos` (`idDistritos`, `Distrito`) VALUES
(1, 'Alto Selva Alegre'),
(2, 'Arequipa'),
(3, 'Cayma'),
(4, 'Cerro Colorado'),
(5, 'Characato'),
(6, 'Chiguata'),
(7, 'Jacobo Hunter'),
(8, 'José Luis Bustamante y Rivero'),
(9, 'La Joya'),
(10, 'Mariano Melgar'),
(11, 'Miraflores'),
(12, 'Mollebaya'),
(13, 'Paucarpata'),
(14, 'Pocsi'),
(15, 'Polobaya'),
(16, 'Quequeña'),
(17, 'Sabandía'),
(18, 'Sachaca'),
(19, 'San Juan de Tarucani'),
(20, 'Santa Isabel de Siguas'),
(21, 'Santa Rita de Siguas'),
(22, 'San Juan de Siguas'),
(23, 'Socabaya'),
(24, 'Tiabaya'),
(25, 'Uchumayo'),
(26, 'Vítor'),
(27, 'Yanahuara'),
(28, 'Yarabamba'),
(29, 'Yura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentoboleta`
--

CREATE TABLE `documentoboleta` (
  `idDocumentoBoleta` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Dni` int(11) NOT NULL,
  `Total` decimal(7,2) NOT NULL,
  `Fecha_Emision` date NOT NULL,
  `Hora_Emision` varchar(10) NOT NULL,
  `Pedidos_idPedidos` int(11) NOT NULL,
  `EstadoBoleta_idEstadoPedido` int(11) NOT NULL,
  `Empleados_idEmpleados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento_pago`
--

CREATE TABLE `documento_pago` (
  `DOCU_PAGO_ID` int(11) NOT NULL,
  `PEDIDO_ID` int(11) NOT NULL,
  `EMPLEADO_ID` int(11) NOT NULL,
  `ESTADO_DOCU_ID` int(11) NOT NULL,
  `NOMBRES` varchar(50) NOT NULL,
  `DNI` int(11) NOT NULL,
  `TOTAL` decimal(7,2) NOT NULL,
  `FECHA_EMISION` date NOT NULL,
  `HORA_EMISION` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `idEmpleados` int(11) NOT NULL,
  `Nombres` varchar(60) NOT NULL,
  `Apellidos` varchar(60) NOT NULL,
  `Dni` int(11) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Celular` int(11) DEFAULT NULL,
  `Sexo` varchar(45) DEFAULT NULL,
  `Fecha_Registro` date DEFAULT NULL,
  `Estado` char(1) NOT NULL,
  `Correo_Electronico` varchar(100) DEFAULT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Contrasena` varchar(70) NOT NULL,
  `TipoEmpleado_idTipoEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`idEmpleados`, `Nombres`, `Apellidos`, `Dni`, `Fecha_Nacimiento`, `Direccion`, `Celular`, `Sexo`, `Fecha_Registro`, `Estado`, `Correo_Electronico`, `Usuario`, `Contrasena`, `TipoEmpleado_idTipoEmpleado`) VALUES
(1, 'Ricardo Alonso', 'Palacios Arce', 70000397, '1991-07-11', 'Los Portales de la Megariana A4', 982939046, 'M', '2017-07-29', 'A', 'rrapa10@hotmail.com', 'rpalacios', 'c63c14a55d89f9ccf3ab3be0c1104b1e', 1),
(3, 'Carlos', 'Sanchez Aquino', 70000397, '1969-12-31', '123123', 454545454, 'M', '0000-00-00', 'A', 'ff@dfdf.d', 'csanchez', '202cb962ac59075b964b07152d234b70', 3),
(4, 'Juan ', 'Paz Chalco', 71585469, '1993-11-05', 'Av. El chistoso 54', 999885255, 'M', '0000-00-00', 'A', 'jpaz@hotmail.com', 'jpaz', 'jpaz', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoboleta`
--

CREATE TABLE `estadoboleta` (
  `idEstadoPedido` int(11) NOT NULL,
  `Estado_Boleta` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moto`
--

CREATE TABLE `moto` (
  `idPlaca` varchar(11) NOT NULL,
  `Marca_Moto` varchar(50) DEFAULT NULL,
  `Soat` varchar(40) DEFAULT NULL,
  `Estado` char(1) DEFAULT NULL,
  `empleados_idEmpleados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `moto`
--

INSERT INTO `moto` (`idPlaca`, `Marca_Moto`, `Soat`, `Estado`, `empleados_idEmpleados`) VALUES
('EH-7720', 'KIA', '323464678', 'A', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedidos` int(11) NOT NULL,
  `Fecha_y_Hora_Pedido` datetime NOT NULL,
  `Clientes_idCliente` int(11) NOT NULL,
  `Total` decimal(7,2) NOT NULL,
  `Estado_Administrador` tinyint(4) NOT NULL,
  `Estado_Cocinero` tinyint(4) NOT NULL,
  `Estado_Cajero` tinyint(4) NOT NULL,
  `Comanda` varchar(200) NOT NULL,
  `ObservacionAdministrador` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedidos`, `Fecha_y_Hora_Pedido`, `Clientes_idCliente`, `Total`, `Estado_Administrador`, `Estado_Cocinero`, `Estado_Cajero`, `Comanda`, `ObservacionAdministrador`) VALUES
(3, '2017-08-01 03:11:21', 2, '12.00', 0, 0, 0, '0301022017', NULL),
(4, '2017-08-01 06:11:16', 3, '10.00', 0, 0, 0, '0402022017', NULL),
(5, '2017-08-03 05:18:27', 4, '54.90', 0, 0, 0, '0503082017', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE `platos` (
  `idPlatos` int(11) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Descripcion` varchar(150) NOT NULL,
  `Imagen` varchar(300) NOT NULL,
  `Precio` decimal(7,2) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Estado` char(1) NOT NULL,
  `CategoriaPlato_idCategoriaPlato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `platos`
--

INSERT INTO `platos` (`idPlatos`, `Nombres`, `Descripcion`, `Imagen`, `Precio`, `Cantidad`, `Estado`, `CategoriaPlato_idCategoriaPlato`) VALUES
(1, 'Arroz Chaufa de Mariscos', 'Un arroz chaufa preparado con una gran variedad de mariscos, con un toque más peruano que el arroz chaufa tradicional.', 'assets/img/catalogo/arroz-chauf-de-mariscos.jpg', '10.00', 2, 'A', 3),
(2, 'Arroz con Mariscos', 'gran mixtura de mariscos (lapas, pulpo, conchas, erizo, choros, caracoles, calamares, langostinos, camarones etc.)', 'assets/img/catalogo/arroz-con-mariscos.jpg', '20.00', 0, 'A', 3),
(3, 'Jalea Mixta', 'Este plato lleva el mundo marino a la crocantez de sus ingredientes, pescado y mariscos bien fritos, acompañados de una salsa de cebolla y yucas o pap', 'assets/img/catalogo/jalea-mixta.jpg', '23.50', 2, 'A', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoempleado`
--

CREATE TABLE `tipoempleado` (
  `idTipoEmpleado` int(11) NOT NULL,
  `Rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipoempleado`
--

INSERT INTO `tipoempleado` (`idTipoEmpleado`, `Rol`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'CAJERO'),
(3, 'COCINA'),
(4, 'REPARTIDOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `CorreoElectronico` varchar(100) NOT NULL,
  `Contrasena` varchar(150) NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `CorreoElectronico`, `Contrasena`, `Cliente_idCliente`) VALUES
(4, 'jperez@gmail.com', '123', 2),
(5, 'papspsp@sd.s', '7879', 3);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_empleados`
--
CREATE TABLE `vista_empleados` (
`idEmpleados` int(11)
,`dni` int(11)
,`Nombres` varchar(60)
,`Apellidos` varchar(60)
,`Rol` varchar(50)
,`Fecha_Registro` date
,`Estado` char(1)
,`Sexo` varchar(45)
,`TipoEmpleado_idTipoEmpleado` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_motos`
--
CREATE TABLE `vista_motos` (
`Placa` varchar(11)
,`Moto` varchar(50)
,`Soat` varchar(40)
,`Nombres` varchar(60)
,`Apellidos` varchar(60)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_pedidos_completados`
--
CREATE TABLE `vista_pedidos_completados` (
`Comanda` varchar(200)
,`Cantidad` varchar(45)
,`Platos` varchar(50)
,`idPedidos` int(11)
,`Fecha_y_hora_Pedido` datetime
,`Estado_Administrador` tinyint(4)
,`Estado_Cocinero` tinyint(4)
,`Estado_Cajero` tinyint(4)
,`Observacion` varchar(100)
,`idDetallePedido` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_pedidos_en_progreso`
--
CREATE TABLE `vista_pedidos_en_progreso` (
`Comanda` varchar(200)
,`Cantidad` varchar(45)
,`Platos` varchar(50)
,`idPedidos` int(11)
,`Fecha_y_hora_Pedido` datetime
,`Estado_Administrador` tinyint(4)
,`Estado_Cocinero` tinyint(4)
,`Estado_Cajero` tinyint(4)
,`Observacion` varchar(100)
,`idDetallePedido` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_pedidos_por_hacer`
--
CREATE TABLE `vista_pedidos_por_hacer` (
`Comanda` varchar(200)
,`Cantidad` varchar(45)
,`Platos` varchar(50)
,`idPedidos` int(11)
,`Fecha_y_hora_Pedido` datetime
,`Estado_Administrador` tinyint(4)
,`Estado_Cocinero` tinyint(4)
,`Estado_Cajero` tinyint(4)
,`Observacion` varchar(100)
,`idDetallePedido` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_reporte_completado`
--
CREATE TABLE `vista_reporte_completado` (
`Comanda` varchar(200)
,`Nombre_Cliente` varchar(45)
,`Total` decimal(7,2)
,`Fecha_y_hora_Pedido` datetime
,`Estado_Administrador` tinyint(4)
,`Estado_Cocinero` tinyint(4)
,`Estado_Cajero` tinyint(4)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_reporte_devueltos`
--
CREATE TABLE `vista_reporte_devueltos` (
`Comanda` varchar(200)
,`Nombre_Cliente` varchar(45)
,`Total` decimal(7,2)
,`Fecha_y_hora_Pedido` datetime
,`Estado_Administrador` tinyint(4)
,`Estado_Cocinero` tinyint(4)
,`Estado_Cajero` tinyint(4)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_empleados`
--
DROP TABLE IF EXISTS `vista_empleados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u432666304_resta`@`localhost` SQL SECURITY DEFINER VIEW `vista_empleados`  AS  select `e`.`idEmpleados` AS `idEmpleados`,`e`.`Dni` AS `dni`,`e`.`Nombres` AS `Nombres`,`e`.`Apellidos` AS `Apellidos`,`t`.`Rol` AS `Rol`,`e`.`Fecha_Registro` AS `Fecha_Registro`,`e`.`Estado` AS `Estado`,`e`.`Sexo` AS `Sexo`,`e`.`TipoEmpleado_idTipoEmpleado` AS `TipoEmpleado_idTipoEmpleado` from (`empleados` `e` join `tipoempleado` `t` on((`e`.`TipoEmpleado_idTipoEmpleado` = `t`.`idTipoEmpleado`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_motos`
--
DROP TABLE IF EXISTS `vista_motos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u432666304_resta`@`localhost` SQL SECURITY DEFINER VIEW `vista_motos`  AS  select `m`.`idPlaca` AS `Placa`,`m`.`Marca_Moto` AS `Moto`,`m`.`Soat` AS `Soat`,`e`.`Nombres` AS `Nombres`,`e`.`Apellidos` AS `Apellidos` from (`moto` `m` join `empleados` `e` on((`m`.`empleados_idEmpleados` = `e`.`idEmpleados`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_pedidos_completados`
--
DROP TABLE IF EXISTS `vista_pedidos_completados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u432666304_resta`@`localhost` SQL SECURITY DEFINER VIEW `vista_pedidos_completados`  AS  select `p`.`Comanda` AS `Comanda`,`d`.`Cantidad` AS `Cantidad`,`pl`.`Nombres` AS `Platos`,`p`.`idPedidos` AS `idPedidos`,`p`.`Fecha_y_Hora_Pedido` AS `Fecha_y_hora_Pedido`,`p`.`Estado_Administrador` AS `Estado_Administrador`,`p`.`Estado_Cocinero` AS `Estado_Cocinero`,`p`.`Estado_Cajero` AS `Estado_Cajero`,`d`.`Observacion` AS `Observacion`,`d`.`idDetallePedido` AS `idDetallePedido` from ((`pedidos` `p` left join `detallepedido` `d` on((`p`.`idPedidos` = `d`.`Pedidos_idPedidos`))) left join `platos` `pl` on((`d`.`Platos_idPlatos` = `pl`.`idPlatos`))) where ((`p`.`Estado_Administrador` = 1) and (`p`.`Estado_Cocinero` = 1) and (`p`.`Estado_Cajero` = 1)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_pedidos_en_progreso`
--
DROP TABLE IF EXISTS `vista_pedidos_en_progreso`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u432666304_resta`@`localhost` SQL SECURITY DEFINER VIEW `vista_pedidos_en_progreso`  AS  select `p`.`Comanda` AS `Comanda`,`d`.`Cantidad` AS `Cantidad`,`pl`.`Nombres` AS `Platos`,`p`.`idPedidos` AS `idPedidos`,`p`.`Fecha_y_Hora_Pedido` AS `Fecha_y_hora_Pedido`,`p`.`Estado_Administrador` AS `Estado_Administrador`,`p`.`Estado_Cocinero` AS `Estado_Cocinero`,`p`.`Estado_Cajero` AS `Estado_Cajero`,`d`.`Observacion` AS `Observacion`,`d`.`idDetallePedido` AS `idDetallePedido` from ((`pedidos` `p` left join `detallepedido` `d` on((`p`.`idPedidos` = `d`.`Pedidos_idPedidos`))) left join `platos` `pl` on((`d`.`Platos_idPlatos` = `pl`.`idPlatos`))) where ((`p`.`Estado_Administrador` = 1) and (`p`.`Estado_Cocinero` = 1) and (`p`.`Estado_Cajero` = 0)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_pedidos_por_hacer`
--
DROP TABLE IF EXISTS `vista_pedidos_por_hacer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u432666304_resta`@`localhost` SQL SECURITY DEFINER VIEW `vista_pedidos_por_hacer`  AS  select `p`.`Comanda` AS `Comanda`,`d`.`Cantidad` AS `Cantidad`,`pl`.`Nombres` AS `Platos`,`p`.`idPedidos` AS `idPedidos`,`p`.`Fecha_y_Hora_Pedido` AS `Fecha_y_hora_Pedido`,`p`.`Estado_Administrador` AS `Estado_Administrador`,`p`.`Estado_Cocinero` AS `Estado_Cocinero`,`p`.`Estado_Cajero` AS `Estado_Cajero`,`d`.`Observacion` AS `Observacion`,`d`.`idDetallePedido` AS `idDetallePedido` from ((`pedidos` `p` left join `detallepedido` `d` on((`p`.`idPedidos` = `d`.`Pedidos_idPedidos`))) left join `platos` `pl` on((`d`.`Platos_idPlatos` = `pl`.`idPlatos`))) where ((`p`.`Estado_Administrador` = 1) and (`p`.`Estado_Cocinero` = 0) and (`p`.`Estado_Cajero` = 0)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_reporte_completado`
--
DROP TABLE IF EXISTS `vista_reporte_completado`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u432666304_resta`@`localhost` SQL SECURITY DEFINER VIEW `vista_reporte_completado`  AS  select `p`.`Comanda` AS `Comanda`,`c`.`Nombres` AS `Nombre_Cliente`,`p`.`Total` AS `Total`,`p`.`Fecha_y_Hora_Pedido` AS `Fecha_y_hora_Pedido`,`p`.`Estado_Administrador` AS `Estado_Administrador`,`p`.`Estado_Cocinero` AS `Estado_Cocinero`,`p`.`Estado_Cajero` AS `Estado_Cajero` from (`pedidos` `p` left join `clientes` `c` on((`c`.`idCliente` = `p`.`Clientes_idCliente`))) where ((`p`.`Estado_Administrador` = 1) and (`p`.`Estado_Cocinero` = 1) and (`p`.`Estado_Cajero` = 1)) order by `p`.`Fecha_y_Hora_Pedido` desc ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_reporte_devueltos`
--
DROP TABLE IF EXISTS `vista_reporte_devueltos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u432666304_resta`@`localhost` SQL SECURITY DEFINER VIEW `vista_reporte_devueltos`  AS  select `p`.`Comanda` AS `Comanda`,`c`.`Nombres` AS `Nombre_Cliente`,`p`.`Total` AS `Total`,`p`.`Fecha_y_Hora_Pedido` AS `Fecha_y_hora_Pedido`,`p`.`Estado_Administrador` AS `Estado_Administrador`,`p`.`Estado_Cocinero` AS `Estado_Cocinero`,`p`.`Estado_Cajero` AS `Estado_Cajero` from (`pedidos` `p` left join `clientes` `c` on((`c`.`idCliente` = `p`.`Clientes_idCliente`))) where ((`p`.`Estado_Administrador` = 0) and (`p`.`Estado_Cocinero` = 0) and (`p`.`Estado_Cajero` = 0)) order by `p`.`Fecha_y_Hora_Pedido` desc ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD PRIMARY KEY (`idasignacion`),
  ADD KEY `fk_asignacion_empleados1_idx` (`empleados_idEmpleados`),
  ADD KEY `fk_asignacion_pedidos1_idx` (`pedidos_idPedidos`);

--
-- Indices de la tabla `categoriaplato`
--
ALTER TABLE `categoriaplato`
  ADD PRIMARY KEY (`idCategoriaPlato`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `fk_Cliente_Distritos1` (`Distritos_idDistritos`);

--
-- Indices de la tabla `detalledocumentoboleta`
--
ALTER TABLE `detalledocumentoboleta`
  ADD PRIMARY KEY (`idDetalleDocumentoBoleta`),
  ADD KEY `fk_DetalleDocumentoBoleta_DocumentoBoleta1` (`DocumentoBoleta_idDocumentoBoleta`);

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`idDetallePedido`),
  ADD KEY `fk_DetallePedido_Pedidos1` (`Pedidos_idPedidos`),
  ADD KEY `fk_DetallePedido_Platos1` (`Platos_idPlatos`);

--
-- Indices de la tabla `distritos`
--
ALTER TABLE `distritos`
  ADD PRIMARY KEY (`idDistritos`);

--
-- Indices de la tabla `documentoboleta`
--
ALTER TABLE `documentoboleta`
  ADD PRIMARY KEY (`idDocumentoBoleta`),
  ADD KEY `fk_DocumentoBoleta_Pedidos1` (`Pedidos_idPedidos`),
  ADD KEY `fk_DocumentoBoleta_EstadoBoleta1` (`EstadoBoleta_idEstadoPedido`),
  ADD KEY `fk_DocumentoBoleta_Empleados1` (`Empleados_idEmpleados`);

--
-- Indices de la tabla `documento_pago`
--
ALTER TABLE `documento_pago`
  ADD PRIMARY KEY (`DOCU_PAGO_ID`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`idEmpleados`),
  ADD KEY `fk_Empleados_TipoEmpleado1` (`TipoEmpleado_idTipoEmpleado`);

--
-- Indices de la tabla `estadoboleta`
--
ALTER TABLE `estadoboleta`
  ADD PRIMARY KEY (`idEstadoPedido`);

--
-- Indices de la tabla `moto`
--
ALTER TABLE `moto`
  ADD PRIMARY KEY (`idPlaca`),
  ADD KEY `fk_moto_empleados1_idx` (`empleados_idEmpleados`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedidos`),
  ADD KEY `fk_Pedidos_Clientes1` (`Clientes_idCliente`);

--
-- Indices de la tabla `platos`
--
ALTER TABLE `platos`
  ADD PRIMARY KEY (`idPlatos`),
  ADD KEY `fk_Platos_CategoriaPlato1` (`CategoriaPlato_idCategoriaPlato`);

--
-- Indices de la tabla `tipoempleado`
--
ALTER TABLE `tipoempleado`
  ADD PRIMARY KEY (`idTipoEmpleado`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_Usuario_Cliente1` (`Cliente_idCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `idasignacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `detalledocumentoboleta`
--
ALTER TABLE `detalledocumentoboleta`
  MODIFY `idDetalleDocumentoBoleta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  MODIFY `idDetallePedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `distritos`
--
ALTER TABLE `distritos`
  MODIFY `idDistritos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `documentoboleta`
--
ALTER TABLE `documentoboleta`
  MODIFY `idDocumentoBoleta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `documento_pago`
--
ALTER TABLE `documento_pago`
  MODIFY `DOCU_PAGO_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `idEmpleados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `platos`
--
ALTER TABLE `platos`
  MODIFY `idPlatos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipoempleado`
--
ALTER TABLE `tipoempleado`
  MODIFY `idTipoEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD CONSTRAINT `fk_asignacion_empleados1` FOREIGN KEY (`empleados_idEmpleados`) REFERENCES `empleados` (`idEmpleados`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asignacion_pedidos1` FOREIGN KEY (`pedidos_idPedidos`) REFERENCES `pedidos` (`idPedidos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_Cliente_Distritos1` FOREIGN KEY (`Distritos_idDistritos`) REFERENCES `distritos` (`idDistritos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalledocumentoboleta`
--
ALTER TABLE `detalledocumentoboleta`
  ADD CONSTRAINT `fk_DetalleDocumentoBoleta_DocumentoBoleta1` FOREIGN KEY (`DocumentoBoleta_idDocumentoBoleta`) REFERENCES `documentoboleta` (`idDocumentoBoleta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `fk_DetallePedido_Pedidos1` FOREIGN KEY (`Pedidos_idPedidos`) REFERENCES `pedidos` (`idPedidos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DetallePedido_Platos1` FOREIGN KEY (`Platos_idPlatos`) REFERENCES `platos` (`idPlatos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `documentoboleta`
--
ALTER TABLE `documentoboleta`
  ADD CONSTRAINT `fk_DocumentoBoleta_Empleados1` FOREIGN KEY (`Empleados_idEmpleados`) REFERENCES `empleados` (`idEmpleados`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DocumentoBoleta_EstadoBoleta1` FOREIGN KEY (`EstadoBoleta_idEstadoPedido`) REFERENCES `estadoboleta` (`idEstadoPedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DocumentoBoleta_Pedidos1` FOREIGN KEY (`Pedidos_idPedidos`) REFERENCES `pedidos` (`idPedidos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `fk_Empleados_TipoEmpleado1` FOREIGN KEY (`TipoEmpleado_idTipoEmpleado`) REFERENCES `tipoempleado` (`idTipoEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `moto`
--
ALTER TABLE `moto`
  ADD CONSTRAINT `fk_moto_empleados1` FOREIGN KEY (`empleados_idEmpleados`) REFERENCES `empleados` (`idEmpleados`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_Pedidos_Clientes1` FOREIGN KEY (`Clientes_idCliente`) REFERENCES `clientes` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `platos`
--
ALTER TABLE `platos`
  ADD CONSTRAINT `fk_Platos_CategoriaPlato1` FOREIGN KEY (`CategoriaPlato_idCategoriaPlato`) REFERENCES `categoriaplato` (`idCategoriaPlato`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Cliente1` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `clientes` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
