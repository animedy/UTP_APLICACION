-- -------------------------------------------------------------------------
-- Descripción			: Crea usuario para la base restaurant								
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

DROP USER 'u432666304_resta`@`localhost';
CREATE USER 'u432666304_resta`@`localhost' IDENTIFIED BY 'u432666304_resta';
GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP,CREATE ROUTINE,ALTER ROUTINE,CREATE VIEW,EXECUTE, ON restaurant.* TO 'u432666304_resta`@`localhost';
