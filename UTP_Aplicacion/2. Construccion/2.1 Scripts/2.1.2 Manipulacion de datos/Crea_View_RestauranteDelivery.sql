-- -------------------------------------------------------------------------
-- Descripción			: Script de creación de Vistas								
-- Fecha Creación		: 10/08/2017                                         		
-- Fecha Modificación	: 															
-- Parámetros			:															
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios					
-- Versión				: Final (Beta|Final)										
-- Cambios Importantes	:                                                         	
--                                                                           		
-- Propiedad de la UTP - Licencia GNU 
-- ------------------------------------------------------------------------
--
-- Base de datos: `restaurant`
--
-- ------------------------------------------------------------------------
USE `restaurant`;


DROP VIEW IF EXISTS VISTA_LISTAR_EMPLEADOS;
CREATE VIEW VISTA_LISTAR_EMPLEADOS
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
		,`e`.`Dni` AS `Dni`
		,CONCAT_WS(' ', `e`.`Nombres`, `e`.`Apellidos`) AS `Nombres`
		,`t`.`Rol` AS `Rol`
		,`e`.`Fecha_Registro` AS `Fecha_Registro`
	FROM (`empleados` `e` join `tipoempleado` `t` 
	ON((`e`.`TipoEmpleado_idTipoEmpleado` = `t`.`idTipoEmpleado`))) 
	WHERE `e`.Estado='A'
	ORDER BY(`e`.`idEmpleados`) DESC;

DROP VIEW IF EXISTS VISTA_LISTAR_TIPO_EMPLEADO;
CREATE VIEW VISTA_LISTAR_TIPO_EMPLEADO
-- ------------------------------------------------------------------------
-- Descripcion         : Lista los datos del tipo de empleado					
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
		`t`.idTipoEmpleado
		,`t`.Rol
	FROM `tipoempleado` `t`
	ORDER BY(`t`.idTipoEmpleado);
	
DROP VIEW IF EXISTS VISTA_LISTAR_EMPLEADOS_REPARTIDOR;
CREATE VIEW VISTA_LISTAR_EMPLEADOS_REPARTIDOR
-- ------------------------------------------------------------------------
-- Descripcion         : Lista los datos del empleado que son repartidores					
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
		,CONCAT_WS(' ', `e`.`Nombres`, `e`.`Apellidos`) AS `Nombres`
		,`e`.`Dni` AS `Dni`
	FROM (`empleados` `e` join `tipoempleado` `t` 
	ON((`e`.`TipoEmpleado_idTipoEmpleado` = `t`.`idTipoEmpleado`))) 
	WHERE `e`.Estado='A' 
		AND `t`.Rol='MOTO'
	ORDER BY(`e`.`idEmpleados`);

DROP VIEW IF EXISTS VISTA_LISTAR_CLIENTES;
CREATE VIEW VISTA_LISTAR_CLIENTES
-- ------------------------------------------------------------------------
-- Descripcion         : Lista los datos del cliente					
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
		`c`.idCliente AS `idCliente` 
		,`c`.Nombres AS `Nombres`
		,`c`.Dni AS `Dni` 
		,`c`.Sexo AS `Sexo`
		,`c`.Direccion AS `Direccion`
		,`c`.Estado AS `Estado`
		,`c`.Celular AS `Celular`
		,`c`.Referencia AS `Referencia`
	FROM `clientes` `c` 
	WHERE `c`.Estado='A'
	ORDER BY(`c`.idCliente) DESC;

DROP VIEW IF EXISTS VISTA_LISTAR_DISTRITO;
CREATE VIEW VISTA_LISTAR_DISTRITO
-- ------------------------------------------------------------------------
-- Descripcion         : Lista los datos del distrito					
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
		`d`.idDistritos
		,`d`.Distrito
	FROM `distritos` `d`
	ORDER BY(`d`.idDistritos);

	
DROP VIEW IF EXISTS VISTA_LISTAR_MOTOS;
CREATE VIEW VISTA_LISTAR_MOTOS  
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
		`m`.`idPlaca` AS `idPlaca`
		,`m`.`Marca_Moto` AS `Marca_Moto`
		,`m`.`Soat` AS `Soat`
		,`e`.`Nombres` AS `Nombres`
		,`e`.`Apellidos` AS `Apellidos` 
	from (`moto` `m` join `empleados` `e` 
	on((`m`.`empleados_idEmpleados` = `e`.`idEmpleados`))) ;


DROP VIEW IF EXISTS VISTA_PEDIDOS_POR_HACER;
CREATE VIEW VISTA_PEDIDOS_POR_HACER 
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
		,`p`.`Fecha` AS `Fecha_Pedido`
		,`p`.`Hora_Pedido` AS `Hora_Pedido`
		,`p`.`Estado_Administrador` AS `Estado_Administrador`
		,`p`.`Estado_Cocinero` AS `Estado_Cocinero`
		,`p`.`Estado_Cajero` AS `Estado_Cajero`
		,`d`.`Observacion` AS `Observacion`
		,`d`.`idDetallePedido` AS `idDetallePedido` 
	FROM ((`pedidos` `p` LEFT JOIN `detallepedido` `d` 
	ON((`p`.`idPedidos` = `d`.`Pedidos_idPedidos`))) 
	LEFT JOIN `platos` `pl` on((`d`.`Platos_idPlatos` = `pl`.`idPlatos`))) 
	WHERE ((`p`.`Estado_Administrador` = 1) AND (`p`.`Estado_Cocinero` = 0) AND (`p`.`Estado_Cajero` = 0)) ;


DROP VIEW IF EXISTS VISTA_PEDIDOS_EN_PROGRESO;
CREATE VIEW VISTA_PEDIDOS_EN_PROGRESO 
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
	select 
		`p`.`Comanda` AS `Comanda`
		,`d`.`Cantidad` AS `Cantidad`
		,`pl`.`Nombres` AS `Platos`
		,`p`.`idPedidos` AS `idPedidos`
		,`p`.`Fecha` AS `Fecha_Pedido`
		,`p`.`Hora_Pedido` AS `Hora_Pedido`
		,`p`.`Estado_Administrador` AS `Estado_Administrador`
		,`p`.`Estado_Cocinero` AS `Estado_Cocinero`
		,`p`.`Estado_Cajero` AS `Estado_Cajero`
		,`d`.`Observacion` AS `Observacion`
		,`d`.`idDetallePedido` AS `idDetallePedido` 
	from ((`pedidos` `p` left join `detallepedido` `d` 
	on((`p`.`idPedidos` = `d`.`Pedidos_idPedidos`))) 
	left join `platos` `pl` 
	on((`d`.`Platos_idPlatos` = `pl`.`idPlatos`))) 
	where ((`p`.`Estado_Administrador` = 1) and (`p`.`Estado_Cocinero` = 1) and (`p`.`Estado_Cajero` = 0)) ;


DROP VIEW IF EXISTS VISTA_PEDIDOS_COMPLETADOS;
CREATE VIEW VISTA_PEDIDOS_COMPLETADOS
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
	select 
		`p`.`Comanda` AS `Comanda`
		,`d`.`Cantidad` AS `Cantidad`
		,`pl`.`Nombres` AS `Platos`
		,`p`.`idPedidos` AS `idPedidos`
		,`p`.`Fecha` AS `Fecha_Pedido`
		,`p`.`Hora_Pedido` AS `Hora_Pedido`
		,`p`.`Estado_Administrador` AS `Estado_Administrador`
		,`p`.`Estado_Cocinero` AS `Estado_Cocinero`
		,`p`.`Estado_Cajero` AS `Estado_Cajero`
		,`d`.`Observacion` AS `Observacion`
		,`d`.`idDetallePedido` AS `idDetallePedido` 
	from ((`pedidos` `p` left join `detallepedido` `d` 
	on((`p`.`idPedidos` = `d`.`Pedidos_idPedidos`))) 
	left join `platos` `pl` 
	on((`d`.`Platos_idPlatos` = `pl`.`idPlatos`))) 
	where ((`p`.`Estado_Administrador` = 1) and (`p`.`Estado_Cocinero` = 1) and (`p`.`Estado_Cajero` = 1)) ;

	

DROP VIEW IF EXISTS VISTA_VER_PEDIDOS;
CREATE VIEW VISTA_VER_PEDIDOS
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
		,`p`.`Fecha` AS `Fecha_Pedido`
		,`p`.`Hora_Pedido` AS `Hora_Pedido`
		,`c`.`Nombres` AS `Nombres`
		,`c`.`Dni` AS `Dni`
		,`c`.`Direccion` AS `Direccion`
		,`p`.`Total` AS `Total` 
	from (`pedidos` `p` join `clientes` `c`
	on((`p`.`Clientes_idCliente` = `c`.`idCliente`))) 
	where (`p`.`Estado_Cajero` = 1) ;


DROP VIEW IF EXISTS VISTA_POR_CANCELAR_DOCUMENTO;
CREATE VIEW VISTA_POR_CANCELAR_DOCUMENTO  
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
	select 
		`d`.`idDocumentoBoleta` AS `idDocumentoBoleta`
		,`d`.`Fecha_Emision` AS `Fecha_Emision`
		,`d`.`Nombre` AS `Nombre`
		,`d`.`Dni` AS `Dni`
		,`d`.`Total` AS `Total`
		,`e`.`Estado_Boleta` AS `Estado_Boleta` 
	from (`documentoboleta` `d` join `estadoboleta` `e` 
	on((`d`.`EstadoBoleta_idEstadoPedido` = `e`.`idEstadoPedido`))) 
	where (`e`.`Estado_Boleta` = 'Por Cancelar') ;


DROP VIEW IF EXISTS VISTA_DOCUMENTO_CANCELADO;
CREATE VIEW VISTA_DOCUMENTO_CANCELADO 
-- ------------------------------------------------------------------------
-- Descripcion         : Lista los documentos de pago cancelados					
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
	WHERE (`e`.`Estado_Boleta` = 'Cancelado') ;

	
DROP VIEW IF EXISTS VISTA_DOCUMENTO_ANULADOS;
CREATE VIEW VISTA_DOCUMENTO_ANULADOS  
-- ------------------------------------------------------------------------
-- Descripcion         : Lista los documentos de pagos anulados los que fueron rechazados					
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
		`d`.`idDocumentoBoleta` AS `NroDocumentoBoleta`
		,`d`.`Fecha_Emision` AS `Fecha Emision`
		,`d`.`Nombre` AS `Nombre`
		,`d`.`Dni` AS `Dni`
		,`d`.`Total` AS `Total`
		,`e`.`Estado_Boleta` AS `Estado_Boleta` 
	FROM (`documentoboleta` `d` JOIN `estadoboleta` `e`
	ON((`d`.`EstadoBoleta_idEstadoPedido` = `e`.`idEstadoPedido`))) 
	WHERE (`e`.`Estado_Boleta` = 'Anulado') ;



DROP VIEW IF EXISTS VISTA_REPORTE_COMPLETADO;
CREATE VIEW VISTA_REPORTE_COMPLETADO 
-- ------------------------------------------------------------------------
-- Descripcion         : Lista de pedidos completados para el reporte					
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
	from (`pedidos` `p` left join `clientes` `c` 
	on((`c`.`idCliente` = `p`.`Clientes_idCliente`))) 
	where ((`p`.`Estado_Administrador` = 1) and (`p`.`Estado_Cocinero` = 1) and (`p`.`Estado_Cajero` = 1)) 
	order by `p`.`Fecha` desc ;


DROP VIEW IF EXISTS VISTA_REPORTE_DEVUELTOS;
CREATE VIEW VISTA_REPORTE_DEVUELTOS  
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
	on((`c`.`idCliente` = `p`.`Clientes_idCliente`))) 
	where ((`p`.`Estado_Administrador` = 0) and (`p`.`Estado_Cocinero` = 0) and (`p`.`Estado_Cajero` = 0)) 
	order by `p`.`Fecha` desc ;


DROP VIEW IF EXISTS VISTA_REPORTE_PEDIDOS;
CREATE VIEW VISTA_REPORTE_PEDIDOS 
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


DROP VIEW IF EXISTS VISTA_REPORTE_PLATOS_MAS_VENDIDOS;
CREATE VIEW VISTA_REPORTE_PLATOS_MAS_VENDIDOS  
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


DROP VIEW IF EXISTS VISTA_VENTAS_MES;
CREATE VIEW VISTA_VENTAS_MES  
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
		`d`.`idDocumentoBoleta` AS `idDocumentoBoleta`
		,`d`.`Nombre` AS `Nombre`
		,`d`.`Dni` AS `Dni`
		,`d`.`Total` AS `Total`
		,`d`.`Fecha_Emision` AS `Fecha_Emision`
		,`d`.`Hora_Emision` AS `Hora_Emision`
		,`d`.`Pedidos_idPedidos` AS `Pedidos_idPedidos`
		,`d`.`EstadoBoleta_idEstadoPedido` AS `EstadoBoleta_idEstadoPedido`
		,`d`.`Empleados_idEmpleados` AS `Empleados_idEmpleados` 
	from `documentoboleta` `d`
	where ((`d`.`EstadoBoleta_idEstadoPedido` = 0) and (`d`.`Fecha_Emision` = curdate())) ;
	

DROP VIEW IF EXISTS VISTA_PEDIDOS;
CREATE VIEW VISTA_PEDIDOS 
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
	select 
		`p`.`idPedidos` AS `idPedidos`
		,`p`.`Fecha` AS `Fecha`
		,`p`.`Hora_Pedido` AS `Hora_Pedido`
		,`c`.`idCliente` AS `idCliente`
		,`c`.`Nombres` AS `Nombres`
		,`c`.`Dni` AS `Dni`
		,`c`.`Direccion` AS `Direccion`
		,`p`.`Total` AS `Total`
		,`d`.`idDetallePedido` AS `idDetallePedido`
		,`d`.`Cantidad` AS `Cantidad`
		,`pl`.`Nombres` AS `Nombre`
		,`pl`.`Precio` AS `Precio` 
	from (((`pedidos` `p` join `clientes` `c` 
	on((`p`.`Clientes_idCliente` = `c`.`idCliente`))) 
	join `detallepedido` `d`  
	on((`d`.`Pedidos_idPedidos` = `p`.`idPedidos`))) 
	join `platos` `pl`
	on((`d`.`Platos_idPlatos` = `pl`.`idPlatos`))) ;


DROP VIEW IF EXISTS VISTA_PEDIDOSDETALLE;
CREATE VIEW VISTA_PEDIDOSDETALLE  
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
select 
	`d`.`idDetallePedido` AS `idDetallePedido`
	,`d`.`Pedidos_idPedidos` AS `Pedidos_idPedidos`
	,`d`.`Cantidad` AS `Cantidad`
	,`pl`.`Nombres` AS `Nombres`
	,`pl`.`Precio` AS `Precio` 
	from (`detallepedido` `d` join `platos` `pl` 
	on((`d`.`Platos_idPlatos` = `pl`.`idPlatos`))) ;



