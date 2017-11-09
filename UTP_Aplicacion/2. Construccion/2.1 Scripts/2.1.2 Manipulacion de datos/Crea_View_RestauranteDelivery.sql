-- -------------------------------------------------------------------------
-- Descripción			: Script de creación de Vistas								
-- Fecha Creación		: 10/08/2017                                         		
-- Fecha Modificación	: 															
-- Parámetros			:															
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios					
-- Versión				: Final 										
-- Cambios Importantes	:                                                         	
--                                                                           		
-- Propiedad de la UTP - Licencia GNU 
-- ------------------------------------------------------------------------
--
-- Base de datos: `restaurant`
--
-- ------------------------------------------------------------------------
USE `restaurant`;


DROP VIEW IF EXISTS `vista_empleados`;
CREATE  ALGORITHM=UNDEFINED DEFINER=`u432666304_resta`@`localhost` SQL SECURITY DEFINER VIEW `vista_empleados`
-- ------------------------------------------------------------------------
-- Descripcion         : Lista los datos del empleado					
-- Fecha Creación      : 10/08/2017													
-- Fecha Mododificación:																
-- Parámetros          :				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios					
-- Versión				: Final (Beta|Final)										
-- Cambios Importantes	:                                                         	
--                                                                              		
-- Propiedad                                          		
--                                                                              		
-- ------------------------------------------------------------------------
AS  	
	SELECT 
		`e`.`idEmpleados` AS `idEmpleados`
		,`e`.`Dni` AS `dni`
		,`e`.`Nombres` AS `Nombres`
		,`e`.`Apellidos` AS `Apellidos`
		,`t`.`Rol` AS `Rol`
		,`e`.`Fecha_Registro` AS `Fecha_Registro`
		,`e`.`Estado` AS `Estado`
		,`e`.`Sexo` AS `Sexo`
		,`e`.`TipoEmpleado_idTipoEmpleado` AS `TipoEmpleado_idTipoEmpleado` 
		FROM (`empleados` `e` join `tipoempleado` `t` 
		ON((`e`.`TipoEmpleado_idTipoEmpleado` = `t`.`idTipoEmpleado`)));


DROP VIEW IF EXISTS `vista_motos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`u432666304_resta`@`localhost` SQL SECURITY DEFINER VIEW `vista_motos`  
-- ------------------------------------------------------------------------
-- Descripcion         : Lista los datos del repartidor con moto					
-- Fecha Creación      : 10/08/2017													
-- Fecha Mododificación:																
-- Parámetros          :				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios					
-- Versión				: Final (Beta|Final)										
-- Cambios Importantes	:                                                         	
--                                                                              		
-- Propiedad                                          		
--                                                                              		
-- ------------------------------------------------------------------------
AS  
	SELECT 
		`m`.`idPlaca` AS `Placa`
		,`m`.`Marca_Moto` AS `Moto`
		,`m`.`Soat` AS `Soat`
		,`e`.`Nombres` AS `Nombres`
		,`e`.`Apellidos` AS `Apellidos` 
	FROM (`moto` `m` join `empleados` `e` 
	ON((`m`.`empleados_idEmpleados` = `e`.`idEmpleados`)));

DROP VIEW IF EXISTS `vista_listar_moto_empleado`;
CREATE ALGORITHM=UNDEFINED DEFINER=`u432666304_resta`@`localhost` SQL SECURITY DEFINER VIEW `vista_listar_moto_empleado`  
-- ------------------------------------------------------------------------
-- Descripcion         : Lista los empleados que son repartidores					
-- Fecha Creación      : 10/08/2017													
-- Fecha Mododificación:																
-- Parámetros          :				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios					
-- Versión				: Final (Beta|Final)										
-- Cambios Importantes	:                                                         	
--                                                                              		
-- Propiedad                                          		
--                                                                              		
-- ------------------------------------------------------------------------
AS  
	SELECT 
		`e`.`idEmpleados` AS `idEmpleados`
		,`e`.`Nombres` AS `Nombres`
		,`e`.`Apellidos` AS `Apellidos` 
		,`t`.`Rol` AS `Rol`
	from (`empleados` `e` join `tipoempleado` `t`
	on((`e`.`TipoEmpleado_idTipoEmpleado` = `t`.`idTipoEmpleado`))) 
	WHERE ( `t`.Rol='REPARTIDOR');
		

DROP VIEW IF EXISTS `vista_pedidos_por_hacer`;
CREATE ALGORITHM=UNDEFINED DEFINER=`u432666304_resta`@`localhost` SQL SECURITY DEFINER VIEW `vista_pedidos_por_hacer` 
-- ------------------------------------------------------------------------
-- Descripcion         : Lista los pedidos que se encuentran en recepcion					
-- Fecha Creación      : 10/08/2017													
-- Fecha Mododificación:																
-- Parámetros          :				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios						
-- Versión				: Final (Beta|Final)										
-- Cambios Importantes	:                                                         	
--                                                                              		
-- Propiedad                                          		
--                                                                              		
-- ------------------------------------------------------------------------
AS  
	SELECT 
		`p`.`Comanda` AS `Comanda`
		,`d`.`Cantidad` AS `Cantidad`
		,`pl`.`Nombres` AS `Platos`
		,`p`.`idPedidos` AS `idPedidos`
		,`p`.`Fecha` AS `Fecha`
		,`p`.`Hora_Pedido` AS `Hora_Pedido`
		,`p`.`Estado_Administrador` AS `Estado_Administrador`
		,`p`.`Estado_Cocinero` AS `Estado_Cocinero`
		,`p`.`Estado_Cajero` AS `Estado_Cajero`
		,`d`.`Observacion` AS `Observacion`
		,`d`.`idDetallePedido` AS `idDetallePedido`
		,`c`.`Nombres` AS `Nombres`
	FROM (((`pedidos` `p` 
	LEFT JOIN `detallepedido` `d` 
	ON((`p`.`idPedidos` = `d`.`Pedidos_idPedidos`))) 
	LEFT JOIN `platos` `pl` 
	ON((`d`.`Platos_idPlatos` = `pl`.`idPlatos`))) 
	LEFT JOIN `clientes` `c` 
	ON((`p`.`Clientes_idCliente` = `c`.`idCliente`))) 
	WHERE ((`p`.`Estado_Administrador` = 1) AND (`p`.`Estado_Cocinero` = 0) AND (`p`.`Estado_Cajero` = 0));

DROP VIEW IF EXISTS `vista_pedidos_en_progreso`;
CREATE ALGORITHM=UNDEFINED DEFINER=`u432666304_resta`@`localhost` SQL SECURITY DEFINER VIEW `vista_pedidos_en_progreso` 
-- ------------------------------------------------------------------------
-- Descripcion         : Lista los pedidos que se encuentran en cocina					
-- Fecha Creación      : 10/08/2017													
-- Fecha Mododificación:																
-- Parámetros          :				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios					
-- Versión				: Final (Beta|Final)										
-- Cambios Importantes	:                                                         	
--                                                                              		
-- Propiedad                                          		
--                                                                              		
-- ------------------------------------------------------------------------
 AS  
	SELECT 
		`p`.`Comanda` AS `Comanda`
		,`d`.`Cantidad` AS `Cantidad`
		,`pl`.`Nombres` AS `Platos`
		,`p`.`idPedidos` AS `idPedidos`
		,`p`.`Fecha` AS `Fecha`
		,`p`.`Hora_Pedido` AS `Hora_Pedido`
		,`p`.`Estado_Administrador` AS `Estado_Administrador`
		,`p`.`Estado_Cocinero` AS `Estado_Cocinero`
		,`p`.`Estado_Cajero` AS `Estado_Cajero`
		,`d`.`Observacion` AS `Observacion`
		,`d`.`idDetallePedido` AS `idDetallePedido` 
	FROM ((`pedidos` `p` 
	LEFT JOIN `detallepedido` `d` 
	ON((`p`.`idPedidos` = `d`.`Pedidos_idPedidos`))) 
	LEFT JOIN `platos` `pl` 
	ON((`d`.`Platos_idPlatos` = `pl`.`idPlatos`))) 
	WHERE ((`p`.`Estado_Administrador` = 1) AND (`p`.`Estado_Cocinero` = 1) AND (`p`.`Estado_Cajero` = 0));

DROP VIEW IF EXISTS `vista_pedidos_completados`;
CREATE ALGORITHM=UNDEFINED DEFINER=`u432666304_resta`@`localhost` SQL SECURITY DEFINER VIEW `vista_pedidos_completados`
-- ------------------------------------------------------------------------
-- Descripcion         : Lista los pedidos que se encuentran en caja para generar su comprobante					
-- Fecha Creación      : 10/08/2017													
-- Fecha Mododificación:																
-- Parámetros          :				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios						
-- Versión				: Final (Beta|Final)										
-- Cambios Importantes	:                                                         	
--                                                                              		
-- Propiedad                                          		
--                                                                              		
-- ------------------------------------------------------------------------  
AS  
	SELECT 
		`p`.`Comanda` AS `Comanda`
		,`d`.`Cantidad` AS `Cantidad`
		,`pl`.`Nombres` AS `Platos`
		,`p`.`idPedidos` AS `idPedidos`
		,`p`.`Fecha` AS `Fecha`
		,`p`.`Hora_Pedido` AS `Hora_Pedido`
		,`p`.`Estado_Administrador` AS `Estado_Administrador`
		,`p`.`Estado_Cocinero` AS `Estado_Cocinero`
		,`p`.`Estado_Cajero` AS `Estado_Cajero`
		,`d`.`Observacion` AS `Observacion`
		,`d`.`idDetallePedido` AS `idDetallePedido` 
	FROM ((`pedidos` `p` 
	LEFT JOIN `detallepedido` `d` 
	ON((`p`.`idPedidos` = `d`.`Pedidos_idPedidos`))) 
	LEFT JOIN `platos` `pl` 
	ON((`d`.`Platos_idPlatos` = `pl`.`idPlatos`))) 
	WHERE ((`p`.`Estado_Administrador` = 1) AND (`p`.`Estado_Cocinero` = 1) AND (`p`.`Estado_Cajero` = 1));
	

DROP VIEW IF EXISTS `vista_ver_pedidos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`u432666304_resta`@`localhost` SQL SECURITY DEFINER VIEW `vista_ver_pedidos`
-- ------------------------------------------------------------------------
-- Descripcion         : Lista los pedidos para poder generar su boleta					
-- Fecha Creación      : 10/08/2017													
-- Fecha Mododificación:																
-- Parámetros          :				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios						
-- Versión				: Final (Beta|Final)										
-- Cambios Importantes	:                                                         	
--                                                                              		
-- Propiedad                                          		
--                                                                              		
-- ------------------------------------------------------------------------
AS  
	select 
		`p`.`idPedidos` AS `idPedidos`
		,`p`.`Comanda` AS `Comanda`
		,`p`.`Fecha` AS `Fecha_Pedido`
		,`p`.`Hora_Pedido` AS `Hora_Pedido`
		,`c`.`Nombres` AS `Nombres`
		,`c`.`Dni` AS `Dni`
		,`c`.`Direccion` AS `Direccion`
		,`p`.`Total` AS `Total` 
	from (`pedidos` `p` join `clientes` `c`
	on((`p`.`Clientes_idCliente` = `c`.`idCliente`))) 
	where (`p`.`Estado_Cajero` = 1) ;


DROP VIEW IF EXISTS `vista_por_cancelar_documento`;
CREATE ALGORITHM=UNDEFINED DEFINER=`u432666304_resta`@`localhost` SQL SECURITY DEFINER VIEW `vista_por_cancelar_documento`  
-- ------------------------------------------------------------------------
-- Descripcion         : Lista los pedidos que se genero su boleta y esta a la espera de recibir el dinero					
-- Fecha Creación      : 10/08/2017													
-- Fecha Mododificación:																
-- Parámetros          :				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios						
-- Versión				: Final (Beta|Final)										
-- Cambios Importantes	:                                                         	
--                                                                              		
-- Propiedad                                          		
--                                                                              		
-- ------------------------------------------------------------------------
AS  
	SELECT 
		`d`.`idDocumentoBoleta` AS `idDocumentoBoleta`
		,`d`.`Fecha_Emision` AS `Fecha_Emision`
		,`d`.`Nombre` AS `Nombre`
		,`d`.`Dni` AS `Dni`
		,`d`.`Total` AS `Total`
		,`e`.`Estado_Boleta` AS `Estado_Boleta` 
	FROM (`documentoboleta` `d` join `estadoboleta` `e` 
	ON((`d`.`EstadoBoleta_idEstadoPedido` = `e`.`idEstadoPedido`))) 
	WHERE (`e`.`Estado_Boleta` = 'Por Cancelar') ;


DROP VIEW IF EXISTS vista_documento_cancelado;
CREATE ALGORITHM=UNDEFINED DEFINER=`u432666304_resta`@`localhost` SQL SECURITY DEFINER VIEW vista_documento_cancelado 
-- ------------------------------------------------------------------------
-- Descripcion         : Lista los documentos de pago (boletas) cancelados					
-- Fecha Creación      : 10/08/2017													
-- Fecha Mododificación:																
-- Parámetros          :				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios					
-- Versión				: Final (Beta|Final)										
-- Cambios Importantes	:                                                         	
--                                                                              		
-- Propiedad                                          		
--                                                                              		
-- ------------------------------------------------------------------------
AS  
	SELECT 
		`d`.`idDocumentoBoleta` AS `idDocumentoBoleta`
		,`d`.`Pedidos_idPedidos` AS `Pedidos_idPedidos`
		,`d`.`Fecha_Emision` AS `Fecha_Emision`
		,`d`.`Nombre` AS `Nombre`
		,`d`.`Dni` AS `Dni`
		,`d`.`Total` AS `Total`
		,`e`.`Estado_Boleta` AS `Estado_Boleta` 
	FROM (`documentoboleta` `d` join `estadoboleta` `e` 
	ON((`d`.`EstadoBoleta_idEstadoPedido` = `e`.`idEstadoPedido`))) 
	WHERE (`e`.`Estado_Boleta` = 'Cancelado') ;

	
DROP VIEW IF EXISTS vista_documento_anulados;
CREATE ALGORITHM=UNDEFINED DEFINER=`u432666304_resta`@`localhost` SQL SECURITY DEFINER VIEW `vista_documento_anulados` 
-- ------------------------------------------------------------------------
-- Descripcion         : Lista los documentos de pagos anulados (boletas) los que fueron rechazados					
-- Fecha Creación      : 10/08/2017													
-- Fecha Mododificación: 03/10/2017																
-- Parámetros          :				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios				
-- Versión				: Final (Beta|Final)										
-- Cambios Importantes	:                                                         	
--                                                                              		
-- Propiedad                                          		
--                                                                              		
-- ------------------------------------------------------------------------
AS  
	SELECT 
		`d`.`idDocumentoBoleta` AS `idDocumentoBoleta`
		,`d`.`Pedidos_idPedidos` AS `Pedidos_idPedidos`
		,`d`.`Fecha_Emision` AS `Fecha_Emision`
		,`d`.`Nombre` AS `Nombre`
		,`d`.`Dni` AS `Dni`
		,`d`.`Total` AS `Total`
		,`e`.`Estado_Boleta` AS `Estado_Boleta` 
	FROM (`documentoboleta` `d` JOIN `estadoboleta` `e`
	ON((`d`.`EstadoBoleta_idEstadoPedido` = `e`.`idEstadoPedido`))) 
	WHERE (`e`.`Estado_Boleta` = 'Anulado') ;



DROP VIEW IF EXISTS `vista_reporte_completado`;
CREATE ALGORITHM=UNDEFINED DEFINER=`u432666304_resta`@`localhost` SQL SECURITY DEFINER VIEW `vista_reporte_completado` 
-- ------------------------------------------------------------------------
-- Descripcion         : Lista de pedidos completados para el reporte					
-- Fecha Creación      : 10/08/2017													
-- Fecha Mododificación: 03/10/2017																	
-- Parámetros          :				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios						
-- Versión				: Final (Beta|Final)										
-- Cambios Importantes	:                                                         	
--                                                                              		
-- Propiedad                                          		
--                                                                              		
-- ------------------------------------------------------------------------
AS  
	select 
		`p`.`Comanda` AS `Comanda`
		,`c`.`Nombres` AS `Nombre_Cliente`
		,`p`.`Total` AS `Total`
		,`p`.`Fecha` AS `Fecha`
		,`p`.`Hora_Pedido` AS `Hora_Pedido`
		,`p`.`Estado_Administrador` AS `Estado_Administrador`
		,`p`.`Estado_Cocinero` AS `Estado_Cocinero`
		,`p`.`Estado_Cajero` AS `Estado_Cajero` 
	from (`pedidos` `p` left join `clientes` `c` 
	on((`c`.`idCliente` = `p`.`Clientes_idCliente`))) 
	where ((`p`.`Estado_Administrador` = 1) and (`p`.`Estado_Cocinero` = 1) and (`p`.`Estado_Cajero` = 1)) 
	order by `p`.`Fecha` desc ;


DROP VIEW IF EXISTS `vista_reporte_devueltos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`u432666304_resta`@`localhost` SQL SECURITY DEFINER VIEW `vista_reporte_devueltos`  
-- ------------------------------------------------------------------------
-- Descripcion         : Lista de pedidos devueltos para el reporte 					
-- Fecha Creación      : 10/08/2017													
-- Fecha Mododificación:																
-- Parámetros          :				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios						
-- Versión				: Final (Beta|Final)										
-- Cambios Importantes	:                                                         	
--                                                                              		
-- Propiedad                                          		
--                                                                              		
-- ------------------------------------------------------------------------
AS  	
	select 
		`p`.`Comanda` AS `Comanda`
		,`c`.`Nombres` AS `Nombre_Cliente`
		,`p`.`Total` AS `Total`
		,`p`.`Fecha` AS `Fecha`
		,`p`.`Hora_Pedido` AS `Hora_Pedido`
		,`p`.`Estado_Administrador` AS `Estado_Administrador`
		,`p`.`Estado_Cocinero` AS `Estado_Cocinero`
		,`p`.`Estado_Cajero` AS `Estado_Cajero` 
	from (`pedidos` `p` 
	left join `clientes` `c`
    on(`c`.`idCliente` = `p`.`Clientes_idCliente`) 
    left join `documentoboleta` `d`
	on(`d`.`Pedidos_idPedidos` = `p`.`idPedidos`)
    join `estadoboleta` `e`
    ON(`d`.`EstadoBoleta_idEstadoPedido` = `e`.`idEstadoPedido`)) 
    WHERE (`e`.`Estado_Boleta` = 'Anulado') 
	order by `p`.`Fecha` desc ;


DROP VIEW IF EXISTS `vista_reporte_pedidos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`u432666304_resta`@`localhost` SQL SECURITY DEFINER VIEW `vista_reporte_pedidos` 
-- ------------------------------------------------------------------------
-- Descripcion         : Lista de pedidos aceptados para el reporte					
-- Fecha Creación      : 10/08/2017													
-- Fecha Mododificación:																
-- Parámetros          :				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios						
-- Versión				: Final (Beta|Final)										
-- Cambios Importantes	:                                                         	
--                                                                              		
-- Propiedad                                          		
--                                                                              		
-- ------------------------------------------------------------------------
AS  
	select 
		`p`.`Comanda` AS `Comanda`
		,ucase(`c`.`Nombres`) AS `Nombre_Cliente`
		,`p`.`Total` AS `Total`
		,`p`.`Fecha` AS `Fecha`
		,`p`.`Hora_Pedido` AS `Hora_Pedido`
		,`p`.`Estado_Administrador` AS `Estado_Administrador`
		,`p`.`Estado_Cocinero` AS `Estado_Cocinero`
		,`p`.`Estado_Cajero` AS `Estado_Cajero` 
	from (`pedidos` `p` left join `clientes` `c` 
	on((`c`.`idCliente` = `p`.`Clientes_idCliente`))) 
	order by `p`.`Fecha` desc ;


DROP VIEW IF EXISTS `vista_reporte_platos_mas_vendidos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`u432666304_resta`@`localhost` SQL SECURITY DEFINER VIEW `vista_reporte_platos_mas_vendidos`  
-- ------------------------------------------------------------------------
-- Descripcion         : Lista de platos mas vendidos para el reporte 				
-- Fecha Creación      : 10/08/2017													
-- Fecha Mododificación:																
-- Parámetros          :				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios					
-- Versión				: Final (Beta|Final)										
-- Cambios Importantes	:                                                         	
--                                                                              		
-- Propiedad                                          		
--                                                                              		
-- ------------------------------------------------------------------------
AS  
	select 
		count(0) AS `Cantidad`
		,`p`.`Nombres` AS `nombres` 
	from (`detallepedido` `d` left join `platos` `p` 
	on((`d`.`Platos_idPlatos` = `p`.`idPlatos`))) 
	group by `p`.`Nombres` ;


DROP VIEW IF EXISTS `vista_ventas_dia`;
CREATE ALGORITHM=UNDEFINED DEFINER=`u432666304_resta`@`localhost` SQL SECURITY DEFINER VIEW `vista_ventas_dia`  
-- ------------------------------------------------------------------------
-- Descripcion         : Lista de ventas del dia para el reporte 				
-- Fecha Creación      : 10/08/2017													
-- Fecha Mododificación:																
-- Parámetros          :				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios					
-- Versión				: Final (Beta|Final)										
-- Cambios Importantes	:                                                         	
--                                                                              		
-- Propiedad                                          		
--                                                                              		
-- ------------------------------------------------------------------------
AS  
	select 
		`documentoboleta`.`idDocumentoBoleta` AS `idDocumentoBoleta`
		,`documentoboleta`.`Nombre` AS `Nombre`
		,`documentoboleta`.`Dni` AS `Dni`
		,`documentoboleta`.`Total` AS `Total`
		,`documentoboleta`.`Fecha_Emision` AS `Fecha_Emision`
		,`documentoboleta`.`Hora_Emision` AS `Hora_Emision`
		,`documentoboleta`.`Pedidos_idPedidos` AS `Pedidos_idPedidos`
		,`documentoboleta`.`EstadoBoleta_idEstadoPedido` AS `EstadoBoleta_idEstadoPedido`
		,`documentoboleta`.`Empleados_idEmpleados` AS `Empleados_idEmpleados` 
	from `documentoboleta` 
	where ((`documentoboleta`.`EstadoBoleta_idEstadoPedido` = 1) and (`documentoboleta`.`Fecha_Emision` = curdate()));
	

DROP VIEW IF EXISTS `vista_ventas_mes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`u432666304_resta`@`localhost` SQL SECURITY DEFINER VIEW `vista_ventas_mes`  
-- ------------------------------------------------------------------------
-- Descripcion         : Lista de ventas del mes para el reporte 				
-- Fecha Creación      : 10/08/2017													
-- Fecha Mododificación:																
-- Parámetros          :				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios					
-- Versión				: Final (Beta|Final)										
-- Cambios Importantes	:                                                         	
--                                                                              		
-- Propiedad                                          		
--                                                                              		
-- ------------------------------------------------------------------------
AS  
	select 
		`documentoboleta`.`idDocumentoBoleta` AS `idDocumentoBoleta`
		,`documentoboleta`.`Nombre` AS `Nombre`
		,`documentoboleta`.`Dni` AS `Dni`
		,`documentoboleta`.`Total` AS `Total`
		,`documentoboleta`.`Fecha_Emision` AS `Fecha_Emision`
		,`documentoboleta`.`Hora_Emision` AS `Hora_Emision`
		,`documentoboleta`.`Pedidos_idPedidos` AS `Pedidos_idPedidos`
		,`documentoboleta`.`EstadoBoleta_idEstadoPedido` AS `EstadoBoleta_idEstadoPedido`
		,`documentoboleta`.`Empleados_idEmpleados` AS `Empleados_idEmpleados` 
	from `documentoboleta` 
	where (`documentoboleta`.`EstadoBoleta_idEstadoPedido` = 1);


DROP TABLE IF EXISTS `vista_venta_completada`;
CREATE ALGORITHM=UNDEFINED DEFINER=`u432666304_resta`@`localhost` SQL SECURITY DEFINER VIEW `vista_venta_completada` 
-- ------------------------------------------------------------------------
-- Descripcion         : Lista de ventas para el reporte 				
-- Fecha Creación      : 10/08/2017													
-- Fecha Mododificación:																
-- Parámetros          :				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios					
-- Versión				: Final (Beta|Final)										
-- Cambios Importantes	:                                                         	
--                                                                              		
-- Propiedad                                          		
--                                                                              		
-- ------------------------------------------------------------------------
AS 
	select 
		unix_timestamp(time_format(concat_ws(' ',`documentoboleta`.`Fecha_Emision`,`documentoboleta`.`Hora_Emision`),'%Y-%m-%d %H:%m:%s')) AS `Fecha`
		,`documentoboleta`.`Total` AS `Total`
		,time_format(`documentoboleta`.`Fecha_Emision`,'%m') AS `Mes`
		,`documentoboleta`.`Fecha_Emision` AS `Fecha_Dia` 
	from `documentoboleta` 
	where (`documentoboleta`.`EstadoBoleta_idEstadoPedido` = 2);


DROP VIEW IF EXISTS `vista_pedidos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`u432666304_resta`@`localhost` SQL SECURITY DEFINER VIEW VISTA_PEDIDOS 
 -- ------------------------------------------------------------------------
-- Descripcion         : muestra el pedido 				
-- Fecha Creación      : 10/08/2017													
-- Fecha Mododificación:																
-- Parámetros          :				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios					
-- Versión				: Final (Beta|Final)										
-- Cambios Importantes	:                                                         	
--                                                                              		
-- Propiedad                                          		
--                                                                              		
-- ------------------------------------------------------------------------
AS  
	SELECT 
		`p`.`idPedidos` AS `idPedidos`
		,`p`.`Fecha` AS `Fecha`
		,`p`.`Hora_Pedido` AS `Hora_Pedido`
		,`p`.`Estado_Administrador` AS `Estado_Administrador`
		,`p`.`Estado_Cocinero` AS `Estado_Cocinero`
		,`p`.`Estado_Cajero` AS `Estado_Cajero`
		,`p`.`Comanda` AS `Comanda`
		,`p`.`ObservacionAdministrador` AS `ObservacionAdministrador`
		,`p`.`emitido` AS `emitido`
		,`p`.`Total` AS `Total`
		,`c`.`Nombres` AS `Nombres`
		,`c`.`Dni` AS `Dni`
		,`c`.`Direccion` AS `Direccion` 
	FROM (`pedidos` `p` join `clientes` `c` 
	ON((`p`.`Clientes_idCliente` = `c`.`idCliente`))) 
	WHERE (`p`.`Fecha` = curdate());


DROP VIEW IF EXISTS `vista_pedidosdetalle`;
CREATE ALGORITHM=UNDEFINED DEFINER=`u432666304_resta`@`localhost` SQL SECURITY DEFINER VIEW `vista_pedidosdetalle`  
 -- ------------------------------------------------------------------------
-- Descripcion         : muestra el detalle de pedido 				
-- Fecha Creación      : 10/08/2017													
-- Fecha Mododificación:																
-- Parámetros          :				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios					
-- Versión				: Final (Beta|Final)										
-- Cambios Importantes	:                                                         	
--                                                                              		
-- Propiedad                                          		
--                                                                              		
-- ------------------------------------------------------------------------
AS  
	SELECT 
		`d`.`idDetallePedido` AS `idDetallePedido`
		,`d`.`Pedidos_idPedidos` AS `Pedidos_idPedidos`
		,`d`.`Cantidad` AS `Cantidad`
		,`pl`.`Nombres` AS `Nombres`
		,`pl`.`Precio` AS `Precio`
		,(`d`.`Cantidad` * `pl`.`Precio`) AS `Total` 
	FROM (`detallepedido` `d` join `platos` `pl` 
	ON((`d`.`Platos_idPlatos` = `pl`.`idPlatos`)));

