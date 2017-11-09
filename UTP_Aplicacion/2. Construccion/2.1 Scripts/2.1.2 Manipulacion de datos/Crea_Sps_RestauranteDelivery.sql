-- -----------------------------------------------------------------------------------
-- Descripcion         : Creación de Procedimientos Almacenados restaurant	
-- Fecha Creación      : 10/08/2017  											
-- Parámetros          :															
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios															
-- Versión: Final 												
-- Cambios Importantes:															
--																				
-- Propiedad de Pepe Tiburon 													
-- -----------------------------------------------------------------------------------																	

USE `restaurant`;

-- EMPLEADO
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_insertar_empleado $$
CREATE PROCEDURE sp_insertar_empleado
(
	IN Nombres varchar(60) 
	,IN Apellidos varchar(60) 
	,IN Dni int(11)
	,IN Fecha_Nacimiento date 
	,IN Direccion varchar(100) 
	,IN Celular int(11) 
	,IN Sexo varchar(45) 
	,IN Fecha_Registro date 
	,IN Estado char(1) 
	,IN Correo_Electronico varchar(100)
	,IN Usuario varchar(50)
	,IN Contrasena varchar(70) 
	,IN TipoEmpleado_idTipoEmpleado int(11)
)
-- -----------------------------------------------------------------------------------
-- Descripcion         : Insertar los datos del empleado							
-- Fecha Creación      : 10/08/2017													
-- Fecha Mododificación:																
-- Parámetros          :																
--  	Nombres 						:Nombre del empleado
--  	Apellidos 						:Apellidos del empleado
--  	Dni 							:DNI del empleado
--  	Fecha_Nacimiento 				:fecha de nacimiento del empleado
--  	Direccion  						:direccion de domicilio del empleado
--  	Celular 						:numero de celular del empleado
--  	Sexo 							:sexo del empleado
--  	Fecha_Registro  				:fecha en que se registro el empleado
--  	Estado  						:el estado si esta activo o no del empleado
--  	Correo_Electronico 				:correo electronico del empleado
--  	Usuario 						:usuario con el que va ingresar al sistema
--  	Contrasena  					:contraseña con el que va ingresar al sistema 
--  	TipoEmpleado_idTipoEmpleado 	:tipo de empleado asignado					
-- 	Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- Versión				: Final 										
-- Cambios Importantes	:                                                         	
--                                                                              		
-- Propiedad                                          		
--                                                                             		
-- -----------------------------------------------------------------------------------
BEGIN
	INSERT INTO `empleados`
	(
		`Nombres` 
		,`Apellidos` 
		,`Dni`
		,`Fecha_Nacimiento` 
		,`Direccion` 
		,`Celular`
		,`Sexo`
		,`Fecha_Registro`
		,`Estado` 
		,`Correo_Electronico`
		,`Usuario`
		,`Contrasena` 
		,`TipoEmpleado_idTipoEmpleado` 		 
    )
    VALUES
    (
		Nombres
		,Apellidos 
		,Dni
		,Fecha_Nacimiento 
		,Direccion 
		,Celular
		,Sexo
		,Fecha_Registro
		,Estado
		,Correo_Electronico
		,Usuario
		,Contrasena
		,TipoEmpleado_idTipoEmpleado
    );
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_actualizar_empleado $$
CREATE PROCEDURE sp_actualizar_empleado
(
	IN idEmpleados int(11)
	,IN Nombres varchar(60) 
	,IN Apellidos varchar(60) 
	,IN Dni int(11)
	,IN Fecha_Nacimiento date 
	,IN Direccion varchar(100) 
	,IN Celular int(11) 
	,IN Sexo varchar(45) 
	,IN Fecha_Registro date 
	,IN Correo_Electronico varchar(100)
	,IN Usuario varchar(50)
	,IN Contrasena varchar(70) 
	,IN TipoEmpleado_idTipoEmpleado int(11)
)
-- -----------------------------------------------------------------------------------
-- Descripcion         : Actualizar los datos del empleado							
-- Fecha Creación      : 10/08/2017													
-- Fecha Mododificación:																
-- Parámetros          :	
--		idEmpleados						:Identificador del Empleado															
--  	Nombres 						:Nombre del empleado
--  	Apellidos 						:Apellidos del empleado
--  	Dni 							:DNI del empleado
--  	Fecha_Nacimiento 				:fecha de nacimiento del empleado
--  	Direccion  						:direccion de domicilio del empleado
--  	Celular 						:numero de celular del empleado
--  	Sexo 							:sexo del empleado
--  	Fecha_Registro  				:fecha en que se registro el empleado
--  	Estado  						:el estado si esta activo o no del empleado
--  	Correo_Electronico 				:correo electronico del empleado
--  	Usuario 						:usuario con el que va ingresar al sistema
--  	Contrasena  					:contraseña con el que va ingresar al sistema 
--  	TipoEmpleado_idTipoEmpleado 	:tipo de empleado asignado					
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- Versión				: Final 										
-- Cambios Importantes	:                                                         	
--                                                                              		
-- Propiedad                                          		
--                                                                              		
-- -----------------------------------------------------------------------------------
BEGIN
	UPDATE `empleados`
	SET 
		`Nombres` =  Nombres
		,`Apellidos` =  Apellidos
		,`Dni` = Dni
		,`Fecha_Nacimiento` = Fecha_Nacimiento
		,`Direccion` = Direccion
		,`Celular` = Celular
		,`Sexo` = Sexo
		,`Fecha_Registro` = Fecha_Registro
		,`Correo_Electronico` = Correo_Electronico
		,`Usuario` = Usuario
		,`Contrasena` = Contrasena
		,`TipoEmpleado_idTipoEmpleado` = TipoEmpleado_idTipoEmpleado	 
	WHERE `idEmpleados` = idEmpleados;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_eliminar_empleado $$
CREATE PROCEDURE sp_eliminar_empleado
(
	IN idEmpleados int(11) 
	,IN Estado char(1) 
)
-- -----------------------------------------------------------------------------------
-- *Descripcion         : Elimina los datos del empleado 						
-- *Fecha Creación      : 10/08/2017													
-- *Fecha Mododificación:																
-- *Parámetros          :	
--		idEmpleados						:Identificador del Empleado															
--  	Estado  						:el estado si esta activo o no del empleado				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- * Versión				: Final 										
-- * Cambios Importantes	:                                                         	
-- *                                                                             		
-- * Propiedad                                          		
-- *                                                                             		
-- -----------------------------------------------------------------------------------
BEGIN
	UPDATE `empleados`
	SET 
		`Estado` = Estado	 
	WHERE `idEmpleados` = idEmpleados;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_listar_empleado_por_id $$
CREATE PROCEDURE sp_listar_empleado_por_id(
	IN idEmpleados int(11) 
)
-- /************************************************************************************
-- *Descripcion         : Lista los datos del empleado									*
-- *Fecha Creación      : 10/08/2017													*
-- *Fecha Mododificación: 11/08/2017																*
-- *Parámetros          :					
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- * Versión				: Final 													*
-- * Cambios Importantes	:                                                         	*
-- *                                                                             		*
-- * Propiedad                                          								*
-- *                                                                             		*
-- *************************************************************************************/
BEGIN
	SELECT
		`empleados`.idEmpleados
		,`empleados`.Nombres
		,`empleados`.Apellidos 
		,`empleados`.Dni
		,`empleados`.Fecha_Registro
		,`tipoempleado`.Rol
	FROM `empleados` JOIN `tipoempleado`
	ON `empleados`.TipoEmpleado_idTipoEmpleado = `tipoempleado`.idTipoEmpleado
		WHERE `empleados`.idEmpleados = idEmpleados;
END$$
DELIMITER ;


DELIMITER $$
DROP PROCEDURE IF EXISTS sp_listar_empleados $$
CREATE PROCEDURE sp_listar_empleados()
-- /************************************************************************************
-- *Descripcion         : Lista los datos del empleado por ID							*
-- *Fecha Creación      : 10/08/2017													*
-- *Fecha Mododificación:																*
-- *Parámetros          :
-- 		idEmpleados		:Identificador del empleado				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- * Versión				: Final 													*
-- * Cambios Importantes	:                                                         	*
-- *                                                                             		*
-- * Propiedad                                          								*
-- *                                                                             		*
-- *************************************************************************************/
BEGIN
	SELECT
		`empleados`.idEmpleados
		,`empleados`.Nombres
		,`empleados`.Apellidos 
		,`empleados`.Dni
		,`empleados`.Fecha_Registro
		,`tipoempleado`.Rol
	FROM `empleados` JOIN `tipoempleado`
	ON `empleados`.TipoEmpleado_idTipoEmpleado = `tipoempleado`.idTipoEmpleado
	ORDER BY(`empleados`.idEmpleados);
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_loguearse_empleado $$
CREATE PROCEDURE sp_loguearse_empleado(
	IN usuario
	,IN contrasena
)
-- /************************************************************************************
-- *Descripcion         : Loguearse														*
-- *Fecha Creación      : 10/08/2017													*
-- *Fecha Mododificación:																*
-- *Parámetros          :	
--	IN usuario varchar(50)
--	IN contrasena varchar(70) 			
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- * Versión				: Final 													*
-- * Cambios Importantes	:                                                         	*
-- *                                                                             		*
-- * Propiedad                                          								*
-- *                                                                             		*
-- *************************************************************************************/
BEGIN
	SELECT 
		`e`.idEmpleados
		,`e`.dni
		,`e`.Nombres
		,`e`.Apellidos
		,`t`.Rol
		,`e`.Fecha_Registro
		,`e`.Estado
		,`e`.Sexo 
	FROM empleados `e` INNER JOIN tipoempleado `t` 
	ON `e`.TipoEmpleado_idTipoEmpleado = `t`.idTipoEmpleado 
	WHERE usuario = usuario AND contrasena = contrasena

END$$
DELIMITER ;

-- TIPO EMPLEADO
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_listar_tipo_empleado $$
CREATE PROCEDURE sp_listar_tipo_empleado()
-- /************************************************************************************
-- *Descripcion         : Lista los datos del tipo empleado								*
-- *Fecha Creación      : 10/08/2017													*
-- *Fecha Mododificación:																*
-- *Parámetros          :
-- 		idEmpleados		:Identificador del empleado				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- * Versión				: Final 													*
-- * Cambios Importantes	:                                                         	*
-- *                                                                             		*
-- * Propiedad                                          								*
-- *                                                                             		*
-- *************************************************************************************/
BEGIN
	SELECT 
		`tipoempleado`.idTipoEmpleado
		,`tipoempleado`.Rol
	FROM tipoempleado
	ORDER BY(`tipoempleado`.idTipoEmpleado);
END$$
DELIMITER ;

-- CLIENTE 
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_insertar_cliente $$
CREATE PROCEDURE sp_insertar_cliente(
   IN Nombres 			VARCHAR(45)
  ,IN Dni			INT(11)
  ,IN Sexo 			VARCHAR(1)
  ,IN Direccion 		VARCHAR(60)
  ,IN Referencia 		VARCHAR(100)
  ,IN Celular 			INT(11)
  ,IN Telefono 			INT(11)
  ,IN Estado 			CHAR(1)
  ,IN Fecha_Registro		DATE
  ,IN Distritos_idDistritos 	INT(11)
  ,IN latitud			DECIMAL(18,18) 
  ,IN longitud 			DECIMAL(18,18)
  ,IN CorreoElectronico 	VARCHAR(100)
  ,IN Contrasena		VARCHAR(150)
)
-- -----------------------------------------------------------------------------------
-- Descripcion: Agrega un registro a la tabla Clientes y a la tabla Usuario
-- Fecha Crea: 01/08/2017
-- Fecha Mod: 01/08/2017
-- Parametros:	

--   Nombres				: nombre del cliente
--   Dni 					: dni del cliente
--   Sexo 					: sexo del cliente
--   Direccion 				: direccion del cliente
--   Referencia 			: referencia de la direccion del cliente
--   Celular 				: celular del cliente
--   Telefono 				: telefono del  cliente 
--   Estado					: estado del cliente
--   Fecha_Registro 		: fecha de registro del cliente
--   Distritos_idDistritos  : id del distrito
--   latitud				: latitud para la ubicacion de la direcion cliente
--   longitud 				: longitud para la ubicacion de la direcion cliente
--	 CorreoElectronico		: correo electrnico del cliente para loguearse
--	 Contrasena				: contraseña del cliente para loguearse
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- Versión: Final 
-- Cambios Importantes:                    
-- -----------------------------------------------------------------------------------

BEGIN
	DECLARE last_id_table1 INT;
	INSERT INTO `clientes` 
	(
		`Nombres` 			
		,`Dni`			    
		,`Sexo` 				
		,`Direccion` 		
		,`Referencia` 		
		,`Celular` 			
		,`Telefono` 			
		,`Estado` 			
		,`Fecha_Registro`	
		,`Distritos_idDistritos` 	
		,`latitud`			
		,`longitud`
	) 			
	VALUES
	(
		 Nombres 			
		,Dni			    
		,Sexo				
		,Direccion 		
		,Referencia 		
		,Celular 			
		,Telefono 			
		,Estado 			
		,Fecha_Registro	
		,Distritos_idDistritos 	
		,latitud			
		,longitud
     	);
    
    SET last_id_table1 := (SELECT MAX(idCliente) FROM clientes);
    INSERT INTO `usuario`
    	(
		`CorreoElectronico`
		,`Contrasena`
		,`Cliente_idCliente`
	)
	VALUES
	(
		CorreoElectronico
		,Contrasena
		,last_id_table1
	);
END $$
DELIMITER ;


DELIMITER $$
DROP PROCEDURE IF EXISTS sp_actualizar_cliente $$
CREATE PROCEDURE sp_actualizar_cliente(
	IN idCliente 			INT(11)
	,IN Nombres 			VARCHAR(45)
	,IN Dni			INT(11)
	,IN Sexo 			VARCHAR(1)
	,IN Direccion 		VARCHAR(60)
	,IN Referencia 		VARCHAR(100)
	,IN Celular 			INT(11)
	,IN Telefono 			INT(11)
	,IN Fecha_Registro		DATE
	,IN Distritos_idDistritos 	INT(11)
	,IN latitud			DECIMAL(18,18) 
	,IN longitud 			DECIMAL(18,18)
	,IN CorreoElectronico 	VARCHAR(100)
	,IN Contrasena		VARCHAR(150)
)
-- -----------------------------------------------------------------------------------
-- Descripcion: Actualiza un registro a la tabla Clientes y a la tabla Usuario 
-- Fecha Crea: 01/08/2017
-- Fecha Mod: 01/08/2017
-- Parametros:
--	 idCliente				: identificador del cliente	
--   Nombres				: nombre del cliente
--   Dni 					: dni del cliente
--   Sexo 					: sexo del cliente
--   Direccion 				: direccion del cliente
--   Referencia 			: referencia de la direccion del cliente
--   Celular 				: celular del cliente
--   Telefono 				: telefono del  cliente 
--   Fecha_Registro 		: fecha de registro del cliente
--   Distritos_idDistritos  : id del distrito
--   latitud				: latitud para la ubicacion de la direcion cliente
--   longitud 				: longitud para la ubicacion de la direcion cliente
--	 CorreoElectronico		: correo electrnico del cliente para loguearse
--	 Contrasena				: contraseña del cliente para loguearse
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- Versión: Final 
-- Cambios Importantes:                    
-- -----------------------------------------------------------------------------------

BEGIN
	UPDATE `clientes`
	JOIN `usuario`
	ON `clientes`.`idCliente` = `usuario`.`Cliente_idCliente`
	SET
		`Nombres` = Nombres			
		,`Dni` = Dni		    
		,`Sexo` = Sexo				
		,`Direccion` = Direccion 		
		,`Referencia` = Referencia 		
		,`Celular` = Celular			
		,`Telefono` = Telefono						
		,`Fecha_Registro` = Fecha_Registro	
		,`Distritos_idDistritos` = Distritos_idDistritos	
		,`latitud` = latitud		
		,`longitud` = longitud
		,`CorreoElectronico` = CorreoElectronico
		,`Contrasena` = Contrasena
	
	WHERE `idCliente` = idCliente;
	-- UPDATE `restaurant`.`usuario`
	-- SET
	--	`CorreoElectronico` = CorreoElectronico
	--	,`Contrasena` = Contrasena
	-- WHERE `Cliente_idCliente` = idCliente;	
END $$
DELIMITER ;
	
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_actualizar_cliente_contrasena $$
CREATE PROCEDURE sp_actualizar_cliente_contrasena(
	IN CorreoElectronico 	VARCHAR(100)
	,IN Contrasena		VARCHAR(150)
)
-- -----------------------------------------------------------------------------------
-- Descripcion: Actualiza la contrasena de la tabla usuario
-- Fecha Crea: 01/08/2017
-- Fecha Mod: 01/08/2017
-- Parametros:
--	 CorreoElectronico		: correo electrnico del cliente para loguearse
--	 Contrasena				: contraseña del cliente para loguearse
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- Versión: Final 
-- Cambios Importantes:                    
-- -----------------------------------------------------------------------------------

BEGIN
	UPDATE `usuario`
	SET
		`Contrasena` = Contrasena
	WHERE `CorreoElectronico` = CorreoElectronico;	
END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_eliminar_cliente $$
CREATE PROCEDURE sp_eliminar_cliente
(
	IN idCliente int(11) 
	,IN Estado char(1) 
)
-- /************************************************************************************
-- *Descripcion         : Elimina los datos del Cliente									*
-- *Fecha Creación      : 10/08/2017													*
-- *Fecha Mododificación:																*
-- *Parámetros          :	
--		idEmpleados						:Identificador del Empleado															*
--  	Estado  						:el estado si esta activo o no del empleado				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- * Versión				: Final 													*
-- * Cambios Importantes	:                                                         	*
-- *                                                                             		*
-- * Propiedad                                          								*
-- *                                                                             		*
-- *************************************************************************************/
BEGIN
	UPDATE `clientes`
	SET 
		`Estado` = Estado	 
	WHERE `idEmpleados` = idEmpleados;
END$$
DELIMITER ;


DELIMITER $$
DROP PROCEDURE IF EXISTS sp_listar_cliente_por_id $$
CREATE PROCEDURE sp_listar_cliente_por_id(
	IN idCliente 			INT(11)
)
-- /************************************************************************************
-- *Descripcion         : Lista los datos del Cliente por ID							*
-- *Fecha Creación      : 10/08/2017													*
-- *Fecha Mododificación:																*
-- *Parámetros          :	
-- 		idCliente		:Identificador del cliente				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- * Versión				: Final 													*
-- * Cambios Importantes	:                                                         	*
-- *                                                                             		*
-- * Propiedad                                          								*
-- *                                                                             		*
-- *************************************************************************************/
BEGIN
	SELECT
		`clientes`.idCliente
		,`clientes`.Nombres
		,`clientes`.Dni 
		,`clientes`.Sexo
		,`clientes`.Direccion
		,`clientes`.Estado
		,`clientes`.Celular
		,`clientes`.Referencia
	FROM `clientes` 
	WHERE `clientes`.idCliente = idCliente AND `clientes`.Estado='A';
END$$
DELIMITER ;


DELIMITER $$
DROP PROCEDURE IF EXISTS sp_listar_clientes $$
CREATE PROCEDURE sp_listar_clientes()
-- /************************************************************************************
-- *Descripcion         : Lista los datos del cliente									*
-- *Fecha Creación      : 10/08/2017													*
-- *Fecha Mododificación:																*
-- *Parámetros          :				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- * Versión				: Final 													*
-- * Cambios Importantes	:                                                         	*
-- *                                                                             		*
-- * Propiedad                                          								*
-- *                                                                             		*
-- *************************************************************************************/
BEGIN
	SELECT
		`clientes`.idCliente
		,`clientes`.Nombres
		,`clientes`.Dni 
		,`clientes`.Sexo
		,`clientes`.Direccion
		,`clientes`.Estado
		,`clientes`.Celular
		,`clientes`.Referencia
	FROM `clientes` 
	WHERE `clientes`.Estado='A'
	ORDER BY(`clientes`.idCliente);
END$$
DELIMITER ;

-- PLATO
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_insertar_plato $$
CREATE PROCEDURE sp_insertar_plato
(
	IN Nombres varchar(60) 
	,IN Descripcion varchar(150) 
	,IN Imagen varchar(300)
	,IN Precio decimal(7,2)
	,IN Cantidad int(11) 
	,IN Estado char(1) 
	,IN CategoriaPlato_idCategoriaPlato int(11) 
)
-- /************************************************************************************
-- *Descripcion         : Insertar los datos del plato									*
-- *Fecha Creación      : 10/08/2017													*
-- *Fecha Mododificación:																*
-- *Parámetros          :																*
--  	Nombres 						:Nombre del plato
--  	Descripcion 					:Descripcion del plato
--  	Imagen 							:direccion donde se encuentra la imagen plato
--  	Precio 							:precio del plato
--  	Cantidad  						:cantidad del plato para servir
--  	Estado 							:estado del plato
--  	CategoriaPlato_idCategoriaPlato	:identificador de categoria del plato				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- * Versión				: Final 													*
-- * Cambios Importantes	:                                                         	*
-- *                                                                             		*
-- * Propiedad                                          								*
-- *                                                                             		*
-- *************************************************************************************/
BEGIN
	INSERT INTO `platos`
	(
		`Nombres` 
		,`Descripcion` 
		,`Imagen`
		,`Precio` 
		,`Cantidad` 
		,`Estado`
		,`CategoriaPlato_idCategoriaPlato`		 
    )
    VALUES
    (
		Nombres
		,Descripcion 
		,Imagen
		,Precio 
		,Cantidad 
		,Estado
		,CategoriaPlato_idCategoriaPlato
    );
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_actualizar_plato $$
CREATE PROCEDURE sp_actualizar_plato
(
	IN idPlatos int(11)
	,IN Nombres varchar(60) 
	,IN Descripcion varchar(60) 
	,IN Imagen int(11)
	,IN Precio date 
	,IN Cantidad varchar(100) 
	,IN Estado int(11) 
	,IN CategoriaPlato_idCategoriaPlato varchar(45) 
)
-- /************************************************************************************
-- *Descripcion         : Actualizar los datos del plato								*
-- *Fecha Creación      : 10/08/2017													*
-- *Fecha Mododificación:																*
-- *Parámetros          :	
--      idPlatos						:Identificador del plato
--  	Nombres 						:Nombre del plato
--  	Descripcion 					:Descripcion del plato
--  	Imagen 							:direccion donde se encuentra la imagen plato
--  	Precio 							:precio del plato
--  	Cantidad  						:cantidad del plato para servir
--  	Estado 							:estado del plato
--  	CategoriaPlato_idCategoriaPlato	:identificador de categoria del plato				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- * Versión				: Final 													*
-- * Cambios Importantes	:                                                         	*
-- *                                                                             		*
-- * Propiedad                                          								*
-- *                                                                             		*
-- *************************************************************************************/
BEGIN
	UPDATE `platos`
	SET 
		`Nombres` =  Nombres
		,`Descripcion` =  Descripcion
		,`Imagen` = Imagen
		,`Precio` = Precio
		,`Cantidad` = Cantidad
		,`Estado` = Estado
		,`CategoriaPlato_idCategoriaPlato` = CategoriaPlato_idCategoriaPlato	 
	WHERE `idPlatos` = idPlatos;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_eliminar_plato $$
CREATE PROCEDURE sp_eliminar_plato
(
	IN idPlatos int(11) 
	,IN Estado char(1) 
)
-- /************************************************************************************
-- *Descripcion         : Elimina los datos del plato 									*
-- *Fecha Creación      : 10/08/2017													*
-- *Fecha Mododificación:																*
-- *Parámetros          :	
--      idPlatos						:Identificador del plato
--  	Estado 							:estado del plato													*				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- * Versión				: Final 													*
-- * Cambios Importantes	:                                                         	*
-- *                                                                             		*
-- * Propiedad                                          								*
-- *                                                                             		*
-- *************************************************************************************/
BEGIN
	UPDATE `platos`
	SET 
		`Estado` = Estado	 
	WHERE `idPlatos` = idPlatos;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_listar_plato_por_id $$
CREATE PROCEDURE sp_listar_plato_por_id(
	IN idPlatos int(11)  
)
-- /************************************************************************************
-- *Descripcion         : Lista los datos del plato por id								*
-- *Fecha Creación      : 10/08/2017													*
-- *Fecha Mododificación:																*
-- *Parámetros          :	
--      idPlatos						:Identificador del plato				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- * Versión				: Final 													*
-- * Cambios Importantes	:                                                         	*
-- *                                                                             		*
-- * Propiedad                                          								*
-- *                                                                             		*
-- *************************************************************************************/
BEGIN
	SELECT 
		`platos`.idPlatos
		,`platos`.Nombres
		,`platos`.Descripcion
		,`platos`.Imagen
		,`platos`.Precio
		,`platos`.Cantidad
		,`platos`.Estado
		,`categoriaplato`.Categoria 
	FROM platos JOIN categoriaplato 
	ON `platos`.CategoriaPlato_idCategoriaPlato = `categoriaplato`.idCategoriaPlato
	WHERE `platos`.idPlatos = idPlatos;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_listar_plato $$
CREATE PROCEDURE sp_listar_plato()
-- /************************************************************************************
-- *Descripcion         : Lista los datos del plato										*
-- *Fecha Creación      : 10/08/2017													*
-- *Fecha Mododificación:																*
-- *Parámetros          :			
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- * Versión				: Final 													*
-- * Cambios Importantes	:                                                         	*
-- *                                                                             		*
-- * Propiedad                                          								*
-- *                                                                             		*
-- *************************************************************************************/
BEGIN
	SELECT 
		`platos`.idPlatos
		,`platos`.Nombres
		,`platos`.Descripcion
		,`platos`.Imagen
		,`platos`.Precio
		,`platos`.Cantidad
		,`platos`.Estado
		,`categoriaplato`.Categoria 
	FROM platos JOIN categoriaplato 
	ON `platos`.CategoriaPlato_idCategoriaPlato = `categoriaplato`.idCategoriaPlato
	ORDER BY(`platos`.idPlatos);
END$$
DELIMITER ;

-- CATEGORIA PLATO
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_insertar_categoria_plato $$
CREATE PROCEDURE sp_insertar_categoria_plato
(
	IN Categoria varchar(50) 
)
-- /************************************************************************************
-- *Descripcion         : Insertar los datos de una categoria de plato					*
-- *Fecha Creación      : 10/08/2017													*
-- *Fecha Mododificación:																*
-- *Parámetros          :																*
--  	Categoria 						:Nombre de la categoria				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- * Versión				: Final 													*
-- * Cambios Importantes	:                                                         	*
-- *                                                                             		*
-- * Propiedad                                          								*
-- *                                                                             		*
-- *************************************************************************************/
BEGIN
	INSERT INTO `categoriaplato`
	(
		`Categoria` 		 
    )
    VALUES
    (
		Categoria
    );
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_listar_categoria_plato $$
CREATE PROCEDURE sp_listar_categoria_plato()
-- /************************************************************************************
-- *Descripcion         : Lista los datos de la categoria del plato						*
-- *Fecha Creación      : 10/08/2017													*
-- *Fecha Mododificación:																*
-- *Parámetros          :
-- 		idEmpleados		:Identificador del empleado				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- * Versión				: Final 													*
-- * Cambios Importantes	:                                                         	*
-- *                                                                             		*
-- * Propiedad                                          								*
-- *                                                                             		*
-- *************************************************************************************/
BEGIN
	SELECT 
		`categoriaplato`.idCategoriaPlato
		,`categoriaplato`.Categoria
	FROM categoriaplato
	ORDER BY(`categoriaplato`.idCategoriaPlato);
END$$
DELIMITER ;

-- DISTRITO
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_listar_distrito $$
CREATE PROCEDURE sp_listar_distrito()
-- /************************************************************************************
-- *Descripcion         : Lista los datos del distrito									*
-- *Fecha Creación      : 10/08/2017													*
-- *Fecha Mododificación:																*
-- *Parámetros          :
-- 		idEmpleados		:Identificador del empleado				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- * Versión				: Final 													*
-- * Cambios Importantes	:                                                         	*
-- *                                                          	                   		*
-- * Propiedad                                          								*
-- *                                                                             		*
-- *************************************************************************************/
BEGIN
	SELECT 
		`distritos`.idDistritos
		,`distritos`.Distrito
	FROM distritos
	ORDER BY(`distritos`.idDistritos);
END$$
DELIMITER ;

-- MOTO
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_insertar_moto $$
CREATE PROCEDURE sp_insertar_moto
(
	IN Marca_Moto varchar(50) 
	,IN Soat varchar(40) 
	,IN Estado char(1)
	,IN empleados_idEmpleados int(11)   
)
-- /************************************************************************************
-- *Descripcion         : Insertar los datos de la moto									*
-- *Fecha Creación      : 10/08/2017													*
-- *Fecha Mododificación:																*
-- *Parámetros          :																*
--  	Marca_Moto 						:marca de la moto
--  	Soat 							:soat de la moto
--  	Estado 							:estado de la moto
--  	empleados_idEmpleados 			:identificador del empleado				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- * Versión				: Final 													*
-- * Cambios Importantes	:                                                         	*
-- *                                                                             		*
-- * Propiedad                                          								*
-- *                                                                             		*
-- *************************************************************************************/
BEGIN
	INSERT INTO `moto`
	(
		`Marca_Moto` 
		,`Soat` 
		,`Estado`
		,`empleados_idEmpleados` 	 
    )
    VALUES
    (
		Marca_Moto
		,Soat 
		,Estado
		,empleados_idEmpleados 
    );
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_actualizar_moto $$
CREATE PROCEDURE sp_actualizar_moto
(
	IN idPlaca varchar(11)
	,IN Marca_Moto varchar(50) 
	,IN Soat varchar(40) 
	,IN Estado char(1)
	,IN empleados_idEmpleados int(11)  
)
-- /************************************************************************************
-- *Descripcion         : Actualizar los datos de la moto								*
-- *Fecha Creación      : 10/08/2017													*
-- *Fecha Mododificación:																*
-- *Parámetros          :	
--      idPlaca						:Identificador de la moto
--  	Marca_Moto 					:Marca de la moto
--  	Soat 						:Soat de la Moto
--  	Estado 						:estado de la moto
--  	empleados_idEmpleados 		:identificador del empleado				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- * Versión				: Final 													*
-- * Cambios Importantes	:                                                         	*
-- *                                                                             		*
-- * Propiedad                                          								*
-- *                                                                             		*
-- *************************************************************************************/
BEGIN
	UPDATE `moto`
	SET 
		`Marca_Moto` =  Marca_Moto
		,`Soat` =  Soat
		,`Estado` = Estado
		,`empleados_idEmpleados` = empleados_idEmpleados	 
	WHERE `idPlaca` = idPlaca;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_eliminar_moto $$
CREATE PROCEDURE sp_eliminar_moto
(
	IN idPlaca int(11) 
	,IN Estado char(1) 
)
-- /************************************************************************************
-- *Descripcion         : Elimina los datos de la moto									*
-- *Fecha Creación      : 10/08/2017													*
-- *Fecha Mododificación:																*
-- *Parámetros          :	
--      idPlaca						:Identificador del plato
--  	Estado 							:estado del plato													*				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- * Versión				: Final 										*
-- * Cambios Importantes	:                                                         	*
-- *                                                                             		*
-- * Propiedad                                          								*
-- *                                                                             		*
-- *************************************************************************************/
BEGIN
	UPDATE `moto`
	SET 
		`Estado` = Estado	 
	WHERE `idPlaca` = idPlaca;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_listar_moto_por_id $$
CREATE PROCEDURE sp_listar_moto_por_id(
	IN idPlaca int(11)  
)
-- /************************************************************************************
-- *Descripcion         : Lista los datos de la moto									*
-- *Fecha Creación      : 10/08/2017													*
-- *Fecha Mododificación:																*
-- *Parámetros          :	
--      idPlaca						:Identificador del plato				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- * Versión				: Final 													*
-- * Cambios Importantes	:                                                         	*
-- *                                                                             		*
-- * Propiedad                                          								*
-- *                                                                             		*
-- *************************************************************************************/
BEGIN
	SELECT 
		`moto`.idPlaca
		,`moto`.Marca_Moto
		,`moto`.Soat
		,`empleados`.Nombres
		,`empleados`.Apellidos 
	FROM moto JOIN empleados 
	ON `moto`.empleados_idEmpleados = `empleados`.idEmpleados
	WHERE `moto`.idPlaca = idPlaca;
END$$
DELIMITER ;


DELIMITER $$
DROP PROCEDURE IF EXISTS sp_listar_moto $$
CREATE PROCEDURE sp_listar_moto()
-- /************************************************************************************
-- *Descripcion         : Lista los datos de la moto 									*
-- *Fecha Creación      : 10/08/2017													*
-- *Fecha Mododificación:																*
-- *Parámetros          :			
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- * Versión				: Final 													*
-- * Cambios Importantes	:                                                         	*
-- *                                                                             		*
-- * Propiedad                                          								*
-- *                                                                             		*
-- *************************************************************************************/
BEGIN
	SELECT 
		`moto`.idPlaca
		,`moto`.Marca_Moto
		,`moto`.Soat
		,`empleados`.Nombres
		,`empleados`.Apellidos 
	FROM moto JOIN empleados 
	ON `moto`.empleados_idEmpleados = `empleados`.idEmpleados
	ORDER BY (`moto`.idPlaca);
END$$
DELIMITER ;

-- PEDIDOS
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_insertar_pedido $$
CREATE PROCEDURE sp_insertar_pedido
(
	IN Fecha date 
	,IN Hora_Pedido time 
	,IN Clientes_idCliente int(11)
	,IN Total decimal(7,2) 
	,IN Estado_Administrador tinyint(4)
	,IN Estado_Cocinero tinyint(4) 
	,IN Estado_Cajero tinyint(4)
	,IN Comanda varchar(200) 
	,IN ObservacionAdministrador varchar(200) 
)
-- /************************************************************************************
-- *Descripcion         : Insertar los datos del pedido									*
-- *Fecha Creación      : 10/08/2017													*
-- *Fecha Mododificación:																*
-- *Parámetros          :																*
--  	Fecha 						:fecha de recepcion del pedido 
--  	Hora_Pedido 				:hora de recepcion del pedido
--  	Clientes_idCliente 			:identificador del cliente
--  	Total 						:total del pedido
--  	Estado_Administrador  		:primer estado que pasa el pedido por el administrador
--  	Estado_Cocinero 			:segundo estado que pasa por el usuario cocina
--  	Estado_Cajero 				:tercer estado cuando el pedido se va enviar
--  	Comanda  					:numero de comanda con el que se maneja para el proceso del pedido
--  	ObservacionAdministrador  	:observacion que el administrador ponga					
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- * Versión				: Final 													*
-- * Cambios Importantes	:                                                         	*
-- *                                                                             		*
-- * Propiedad                                          								*
-- *                                                                             		*
-- *************************************************************************************/
BEGIN
	INSERT INTO `pedidos`
	(
		`Fecha` 
		,`Hora_Pedido` 
		,`Clientes_idCliente`
		,`Total` 
		,`Estado_Administrador` 
		,`Estado_Cocinero`
		,`Estado_Cajero`
		,`Comanda`
		,`ObservacionAdministrador`  		 
    )
    VALUES
    (
		Fecha
		,Hora_Pedido 
		,Clientes_idCliente
		,Total 
		,Estado_Administrador 
		,Estado_Cocinero
		,Estado_Cajero
		,Comanda
		,ObservacionAdministrador
    );
END$$
DELIMITER ;


-- DETALLE PEDIDOS
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_insertar_detalle_pedido $$
CREATE PROCEDURE sp_insertar_detalle_pedido
(
	IN Cantidad date 
	,IN Observacion time 
	,IN Pedidos_idPedidos int(11)
	,IN Platos_idPlatos decimal(7,2) 
)
-- /************************************************************************************
-- *Descripcion         : Insertar los datos del detalle pedido							*
-- *Fecha Creación      : 10/08/2017													*
-- *Fecha Mododificación:																*
-- *Parámetros          :																*
--  	Cantidad 					:cantidad de platos por cada item  
--  	Observacion 				:observacion del plato por cada item
--  	Pedidos_idPedidos 			:identificador del pedido
--  	Platos_idPlatos 			:identificador del plato
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- * Versión				: Final 													*
-- * Cambios Importantes	:                                                         	*
-- *                                                                             		*
-- * Propiedad                                          		*
-- *                                                                             		*
-- *************************************************************************************/
BEGIN
	INSERT INTO `detallepedido`
	(
		`Cantidad` 
		,`Observacion` 
		,`Pedidos_idPedidos`
		,`Platos_idPlatos`  		 
    )
    VALUES
    (
		Cantidad
		,Observacion 
		,Pedidos_idPedidos
		,Platos_idPlatos 
    );
END$$
DELIMITER ;

-- ASIGNACION
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_insertar_asignacion $$
CREATE PROCEDURE sp_insertar_asignacion
(
	IN empleados_idEmpleados int(11) 
	,IN pedidos_idPedidos int(11)  
)
-- /************************************************************************************
-- *Descripcion         : Insertar los datos de la asignacion							*
-- *Fecha Creación      : 10/08/2017													*
-- *Fecha Mododificación:																*
-- *Parámetros          :																*
--  	empleados_idEmpleados 		:identificador del empleado 
--  	pedidos_idPedidos 			:identificador del pedido
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- * Versión				: Final 													*
-- * Cambios Importantes	:                                                         	*
-- *                                                                             		*
-- * Propiedad                                          								*
-- *                                                                             		*
-- *************************************************************************************/
BEGIN
	INSERT INTO `asignacion`
	(
		`empleados_idEmpleados` 
		,`pedidos_idPedidos`   		 
    )
    VALUES
    (
		empleados_idEmpleados
		,pedidos_idPedidos 
    );
END$$
DELIMITER ;

-- DOCUMENTO BOLETA
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_insertar_documento_boleta $$
CREATE PROCEDURE sp_insertar_documento_boleta
(
	IN Nombre varchar(50) 
	,IN Dni int(11) 
	,IN Total decimal(7,2)
	,IN Fecha_Emision date 
	,IN Hora_Emision varchar(10)
	,IN Pedidos_idPedidos int(11) 
	,IN EstadoBoleta_idEstadoPedido int(11)
	,IN Empleados_idEmpleados int(11) 
)
-- /************************************************************************************
-- *Descripcion         : Insertar los datos del documento boleta						*
-- *Fecha Creación      : 10/08/2017													*
-- *Fecha Mododificación:																*
-- *Parámetros          :																*
--  	Nombre 						:nombre del cliente a quien se realiza la boleta 
--  	Dni 						:dni del cliente a quien se realiza la boleta
--  	Total 						:total de la boleta a pagar 
--  	Fecha_Emision 				:fecha de emision de la boleta
--  	Hora_Emision  				:hora de emision de la boleta
--  	Pedidos_idPedidos 			:identificador del pedido
--  	EstadoBoleta_idEstadoPedido :identificador del estado del documento 
--  	Empleados_idEmpleados  		:identificador del empleado 
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- * Versión				: Final 													*
-- * Cambios Importantes	:                                                         	*
-- *                                                                             		*
-- * Propiedad                                          								*
-- *                                                                             		*
-- *************************************************************************************/
BEGIN
	INSERT INTO `documentoboleta`
	(
		`Nombre` 
		,`Dni` 
		,`Total`
		,`Fecha_Emision` 
		,`Hora_Emision` 
		,`Pedidos_idPedidos`
		,`EstadoBoleta_idEstadoPedido`
		,`Empleados_idEmpleados` 		 
    )
    VALUES
    (
		Nombre
		,Dni 
		,Total
		,Fecha_Emision 
		,Hora_Emision 
		,Pedidos_idPedidos
		,EstadoBoleta_idEstadoPedido
		,Empleados_idEmpleados
    );
END$$
DELIMITER ;

-- DETALLE DOCUMENTO BOLETA 
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_insertar_detalle_documento_boleta $$
CREATE PROCEDURE sp_insertar_detalle_documento_boleta
(
	IN Nro int(11)
	,IN Producto varchar(50) 
	,IN Cantidad int(11) 
	,IN Precio decimal(7,2)
	,IN DocumentoBoleta_idDocumentoBoleta int(11) 
)
-- /************************************************************************************
-- *Descripcion         : Insertar los datos del detalle documento boleta							*
-- *Fecha Creación      : 10/08/2017													*
-- *Fecha Mododificación:																*
-- *Parámetros          :	
--		Nro									:numero de items que tiene el detalle															*
--  	Producto 							:nombre del producto  
--  	Cantidad 							:cantidad del producto
--  	Precio 								:precio del producto
--  	DocumentoBoleta_idDocumentoBoleta 	:identificador de la boleta 
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- * Versión				: Final 													*
-- * Cambios Importantes	:                                                         	*
-- *                                                                             		*
-- * Propiedad                                          								*
-- *                                                                             		*
-- *************************************************************************************/
BEGIN
	INSERT INTO `detalledocumentoboleta`
	(
		`Nro`
		,`Producto` 
		,`Cantidad` 
		,`Precio`
		,`DocumentoBoleta_idDocumentoBoleta`  		 
    )
    VALUES
    (
		Nro
		,Producto
		,Cantidad 
		,Precio
		,DocumentoBoleta_idDocumentoBoleta 
    );
END$$
DELIMITER ;


-- ESTADO BOLETA 
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_listar_estado_boleta $$
CREATE PROCEDURE sp_listar_estado_boleta()
-- /************************************************************************************
-- *Descripcion         : Lista los datos del estado boleta								*
-- *Fecha Creación      : 10/08/2017													*
-- *Fecha Mododificación:																*
-- *Parámetros          :
-- 		idEmpleados		:Identificador del empleado				
-- Autor					: Carlos Sanchez	
--							: Juan Paz Chalco
--							: Ricardo Palacios	
-- * Versión				: Final 													*
-- * Cambios Importantes	:                                                         	*
-- *                                                                             		*
-- * Propiedad                                          								*
-- *                                                                             		*
-- *************************************************************************************/
BEGIN
	SELECT 
		`estadoboleta`.idEstadoPedido
		,`estadoboleta`.Estado_Boleta
	FROM estadoboleta
	ORDER BY(`estadoboleta`.idEstadoPedido);
END$$
DELIMITER ;










