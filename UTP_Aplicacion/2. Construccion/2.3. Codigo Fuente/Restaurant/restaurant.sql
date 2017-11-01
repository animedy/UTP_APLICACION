-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-07-2017 a las 22:38:06
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
-- Estructura de tabla para la tabla `boleta`
--

CREATE TABLE `boleta` (
  `idboleta` int(11) NOT NULL,
  `IGV` varchar(45) DEFAULT NULL,
  `total` varchar(45) DEFAULT NULL,
  `Pedido_idPedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `id` int(11) NOT NULL,
  `sucursal_id` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `empleado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `idDetalle_pedido` int(11) NOT NULL,
  `Pedido_idPedido` int(11) NOT NULL,
  `Platos_idPlatos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`idDetalle_pedido`, `Pedido_idPedido`, `Platos_idPlatos`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `rol_idrol` int(11) NOT NULL,
  `sueldo` decimal(7,2) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `dni` bigint(20) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `celular` int(11) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `estado` char(1) NOT NULL,
  `login` varchar(45) NOT NULL,
  `sexo` char(1) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `nombre`, `apellido`, `rol_idrol`, `sueldo`, `fecha_nacimiento`, `dni`, `direccion`, `telefono`, `celular`, `email`, `fecha_ingreso`, `fecha_salida`, `estado`, `login`, `sexo`, `password`) VALUES
(3, 'Ricardo', 'Palacios', 1, '0.00', '1991-07-11', 70000397, 'Los Portales de la Melgariana A-4', NULL, 982939046, 'rrapa10@hotmail.com', '2017-07-07', NULL, 'A', 'rpalacios', 'M', '545fee2ae54232c0dcaf2b250f1a3023'),
(4, 'Juan', 'Paz Chalco', 2, '1300.00', '1993-03-05', 73669854, 'Cayma 354', NULL, 956314526, 'juanpaz@hotmasil.com', '2017-07-07', NULL, 'A', 'jpaz', 'M', 'efe512d241f4bbe25409cde6835d076d'),
(5, 'Juan', 'Perez', 4, '750.00', '1997-07-12', 72556345, 'Av. Los Floripondios', 0, 0, '', '0000-00-00', NULL, 'A', 'jperez', 'M', 'ebde0645e6d2a650fb009be4dae6694e'),
(6, 'Carlos ', 'Sanchez Aquino', 3, '1000.00', '2017-07-05', 73554125, 'Av. ejercito 210', NULL, NULL, NULL, '2017-07-10', NULL, 'A', 'csanchez', 'M', '054ef4bbc3f2bebec34933abaca0d1fd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moto`
--

CREATE TABLE `moto` (
  `idPlaca` varchar(7) NOT NULL,
  `marca_moto` varchar(45) DEFAULT NULL,
  `Soat` varchar(30) DEFAULT NULL,
  `empleado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `moto`
--

INSERT INTO `moto` (`idPlaca`, `marca_moto`, `Soat`, `empleado_id`) VALUES
('1234-1A', 'Yamaha', '05-05582975', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `cantidad` varchar(45) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `empleado_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(45) NOT NULL,
  `total` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idPedido`, `cantidad`, `Usuario_idUsuario`, `estado`, `empleado_id`, `fecha`, `hora`, `total`) VALUES
(1, '1', 1, 'A', 3, '2017-07-09', '01:53 a.m', '8.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE `platos` (
  `idPlatos` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `categoria` varchar(45) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `precio` varchar(45) DEFAULT NULL,
  `valoracion` decimal(2,0) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `platos`
--

INSERT INTO `platos` (`idPlatos`, `nombre`, `categoria`, `descripcion`, `precio`, `valoracion`, `Estado`, `cantidad`) VALUES
(1, 'Ceviche Clasico', NULL, 'Pescado, limón, cebolla', '8.00', '5', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `rol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `rol`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'CAJERO'),
(3, 'COCINA'),
(4, 'MOTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `distrito` varchar(100) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `observacion` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id`, `nombre`, `departamento`, `provincia`, `distrito`, `direccion`, `observacion`) VALUES
(3, 'Pepe Tiburon', 'Arequipa', 'Arequipa', 'Cayma', 'Cayma ', 'Ceviches y más');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `DNI` int(8) NOT NULL,
  `Sexo` varchar(9) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `contrasena` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `distrito` varchar(45) NOT NULL,
  `referencia` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `DNI`, `Sexo`, `direccion`, `correo`, `contrasena`, `telefono`, `distrito`, `referencia`) VALUES
(1, 'Juan Arce', 29610200, 'Masculino', 'Av. Nilo 209 Coop. 58', 'juanarce88@hotmail.com', 'jarce', '95339689', 'J.L.B. y Rivero', 'Mall Aventura');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_empleados`
--
CREATE TABLE `vista_empleados` (
`id` int(11)
,`dni` bigint(20)
,`nombre` varchar(45)
,`apellido` varchar(45)
,`rol` varchar(45)
,`sueldo` decimal(7,2)
,`fecha_ingreso` date
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_motos`
--
CREATE TABLE `vista_motos` (
`idPlaca` varchar(7)
,`marca_moto` varchar(45)
,`Soat` varchar(30)
,`nombre` varchar(45)
,`apellido` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_empleados`
--
DROP TABLE IF EXISTS `vista_empleados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_empleados`  AS  select `empleado`.`id` AS `id`,`empleado`.`dni` AS `dni`,`empleado`.`nombre` AS `nombre`,`empleado`.`apellido` AS `apellido`,`rol`.`rol` AS `rol`,`empleado`.`sueldo` AS `sueldo`,`empleado`.`fecha_ingreso` AS `fecha_ingreso` from (`empleado` join `rol` on((`empleado`.`rol_idrol` = `rol`.`idrol`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_motos`
--
DROP TABLE IF EXISTS `vista_motos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_motos`  AS  select `moto`.`idPlaca` AS `idPlaca`,`moto`.`marca_moto` AS `marca_moto`,`moto`.`Soat` AS `Soat`,`empleado`.`nombre` AS `nombre`,`empleado`.`apellido` AS `apellido` from (`moto` join `empleado` on((`moto`.`empleado_id` = `empleado`.`id`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boleta`
--
ALTER TABLE `boleta`
  ADD PRIMARY KEY (`idboleta`),
  ADD KEY `fk_boleta_Pedido1_idx` (`Pedido_idPedido`);

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_caja_sucursal_idx` (`sucursal_id`),
  ADD KEY `fk_caja_empleado1_idx` (`empleado_id`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`idDetalle_pedido`),
  ADD KEY `fk_Detalle_pedido_Pedido1_idx` (`Pedido_idPedido`),
  ADD KEY `fk_Detalle_pedido_Platos1_idx` (`Platos_idPlatos`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_empleado_rol1_idx` (`rol_idrol`);

--
-- Indices de la tabla `moto`
--
ALTER TABLE `moto`
  ADD PRIMARY KEY (`idPlaca`),
  ADD KEY `fk_Moto_empleado_idx` (`empleado_id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `fk_Pedido_Usuario1_idx` (`Usuario_idUsuario`),
  ADD KEY `fk_Pedido_empleado1_idx` (`empleado_id`);

--
-- Indices de la tabla `platos`
--
ALTER TABLE `platos`
  ADD PRIMARY KEY (`idPlatos`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `boleta`
--
ALTER TABLE `boleta`
  ADD CONSTRAINT `fk_boleta_Pedido1` FOREIGN KEY (`Pedido_idPedido`) REFERENCES `pedido` (`idPedido`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `caja`
--
ALTER TABLE `caja`
  ADD CONSTRAINT `fk_caja_empleado1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_caja_sucursal` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `fk_Detalle_pedido_Pedido1` FOREIGN KEY (`Pedido_idPedido`) REFERENCES `pedido` (`idPedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Detalle_pedido_Platos1` FOREIGN KEY (`Platos_idPlatos`) REFERENCES `platos` (`idPlatos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_empleado_rol1` FOREIGN KEY (`rol_idrol`) REFERENCES `rol` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `moto`
--
ALTER TABLE `moto`
  ADD CONSTRAINT `fk_Moto_empleado` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_Pedido_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pedido_empleado1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
