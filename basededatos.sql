-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.11-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para db_ventas_productos
CREATE DATABASE IF NOT EXISTS `db_ventas_productos` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_ventas_productos`;

-- Volcando estructura para tabla db_ventas_productos.codigos_db
CREATE TABLE IF NOT EXISTS `codigos_db` (
  `id_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) DEFAULT NULL,
  `codigo_venta` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  PRIMARY KEY (`id_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_ventas_productos.codigos_db: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `codigos_db` DISABLE KEYS */;
INSERT INTO `codigos_db` (`id_codigo`, `usuario`, `codigo_venta`, `estado`, `fecha_creacion`) VALUES
	(1, 'yordis', 'V000000001', 'INACTIVO', '2021-04-17'),
	(2, 'dairo', 'V000000002', 'INACTIVO', '2021-04-17'),
	(3, 'yordis', 'V000000003', 'INACTIVO', '2021-04-17'),
	(4, 'dairo', 'V000000004', 'INACTIVO', '2021-04-17'),
	(5, 'yordis', 'V000000005', 'INACTIVO', '2021-04-19'),
	(6, 'yordis', 'V000000006', 'INACTIVO', '2021-04-23'),
	(7, 'yordis', 'V000000007', 'INACTIVO', '2021-04-26'),
	(8, 'yordis', 'V000000008', 'INACTIVO', '2021-04-28');
/*!40000 ALTER TABLE `codigos_db` ENABLE KEYS */;

-- Volcando estructura para procedimiento db_ventas_productos.finalizar_venta
DELIMITER //
CREATE PROCEDURE `finalizar_venta`(
	IN `usuario_venta_y` VARCHAR(50)
)
    COMMENT 'finalizar la venta '
BEGIN

-- actualizar la lista de los productos con la cantidad
UPDATE productos_db p
INNER JOIN venta_tmp_db v ON p.codigo = v.codigo
SET p.stock = p.stock - v.cantidad;

-- actualizar estado del producto
UPDATE codigos_db c
INNER JOIN venta_tmp_db v ON c.codigo_venta = v.codigo_venta
SET c.estado = 'INACTIVO';

-- insertar en la tabla ventas realizadas el producto de la tabla temporal

INSERT INTO db_ventas_productos.ventas_realizadas (id_cliente, codigo_venta, tipo, cantidad, producto, usuario_venta, precio,fecha_venta)
SELECT id_cliente, codigo_venta, tipo, cantidad, producto, usuario_venta, precio,fecha_venta 
from db_ventas_productos.venta_tmp_db 
WHERE usuario_venta = usuario_venta_y;
DELETE FROM   venta_tmp_db  WHERE usuario_venta = usuario_venta_y;

END//
DELIMITER ;

-- Volcando estructura para tabla db_ventas_productos.productos_db
CREATE TABLE IF NOT EXISTS `productos_db` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `producto` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `distribuidor` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `stock` varchar(50) DEFAULT NULL,
  `total_productos` varchar(50) DEFAULT NULL,
  `precio_venta` int(11) DEFAULT NULL,
  `precio_compra` int(11) DEFAULT NULL,
  `vendido` varchar(50) DEFAULT NULL,
  `ganancias` varchar(50) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_actualizacion` date DEFAULT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_ventas_productos.productos_db: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `productos_db` DISABLE KEYS */;
INSERT INTO `productos_db` (`id_producto`, `codigo`, `imagen`, `producto`, `tipo`, `distribuidor`, `estado`, `stock`, `total_productos`, `precio_venta`, `precio_compra`, `vendido`, `ganancias`, `fecha_ingreso`, `fecha_actualizacion`) VALUES
	(1, 'P0001', 'WhatsApp Image 2021-04-12 at 13.57.10 (2).jpeg', 'PALETA DE CONTORNO RUBOR E ILUMINADOR', 'UNIDAD', 'COMCEL', 'ACTIVO', '27', NULL, 12000, 10000, NULL, NULL, NULL, NULL),
	(2, 'P0002', 'WhatsApp Image 2021-04-12 at 13.57.10 (1).jpeg', 'BRILLO MAGICO ORO', 'UNIDAD', 'COMCEL', 'ACTIVO', '46', NULL, 6000, 5000, NULL, NULL, NULL, NULL),
	(3, 'P0003', 'WhatsApp Image 2021-04-12 at 13.57.10.jpeg', 'TINTA ICE CREAM', 'UNIDAD', 'COMCEL', 'ACTIVO', '3', NULL, 6000, 5000, NULL, NULL, NULL, NULL),
	(4, 'P0004', 'WhatsApp Image 2021-04-12 at 13.57.09 (3).jpeg', 'BALACA GATICO', 'UNIDAD', 'COMCEL', 'ACTIVO', '88', NULL, 6000, 5000, NULL, NULL, NULL, NULL),
	(5, 'P0005', 'WhatsApp Image 2021-04-12 at 13.57.09 (2).jpeg', 'BEAUTY BLENDER', 'UNIDAD', 'COMCEL', 'ACTIVO', '46', NULL, 10000, 8000, NULL, NULL, NULL, NULL),
	(6, 'P0006', 'WhatsApp Image 2021-04-12 at 13.57.09 (1).jpeg', 'SERUM HIDRATANTE COLAGENO', 'UNIDAD', 'COMCEL', 'ACTIVO', '18', NULL, 12000, 10000, NULL, NULL, NULL, NULL),
	(7, 'P0007', 'WhatsApp Image 2021-04-12 at 13.57.09.jpeg', 'MASCARILLA PARA PUNTOS NEGROS', 'UNIDAD', 'COMCEL', 'ACTIVO', '62', NULL, 8000, 6000, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `productos_db` ENABLE KEYS */;

-- Volcando estructura para tabla db_ventas_productos.proveedor_db
CREATE TABLE IF NOT EXISTS `proveedor_db` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) DEFAULT NULL,
  `proveedor` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `nit` varchar(100) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla db_ventas_productos.proveedor_db: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `proveedor_db` DISABLE KEYS */;
INSERT INTO `proveedor_db` (`id_producto`, `codigo`, `proveedor`, `tipo`, `nombre`, `apellido`, `nit`, `imagen`, `estado`) VALUES
	(36, 'E2', 'COMCEL', 'TELECOMUNICACIONES', 'JUAN', 'PEREZ', '654321', 'prueba1.jpg', 'INACTIVO'),
	(37, 'E3', 'TIGO', 'TELECOMUNICACIONES', 'DIEGO', 'LEON', '987654', 'prueba2.jpg', 'ACTIVO'),
	(42, 'E10', 'CAJA', 'UNIDAD', 'YORDIS', 'REALEZ', '123987', 'PRUEBA.JPG', 'ACTIVO');
/*!40000 ALTER TABLE `proveedor_db` ENABLE KEYS */;

-- Volcando estructura para tabla db_ventas_productos.usuarios_db
CREATE TABLE IF NOT EXISTS `usuarios_db` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `editado` datetime DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_ventas_productos.usuarios_db: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios_db` DISABLE KEYS */;
INSERT INTO `usuarios_db` (`id_admin`, `usuario`, `nombre`, `password`, `editado`, `nivel`) VALUES
	(1, 'yordis', 'Andres Escorcia', '$2y$12$JyUl.ziGLFXpHbiQwD2PQ.yntLbM4A/XRO7vNj9cqZHbuXDWY51Si', NULL, 1),
	(56, 'dairo', 'Dairo Barrios Ramos', '$2y$12$IExi3HeqhIPvimq2jKwU..IAsGLFYP1qQloXvTcPfZ0kxvKUxwCk6', '2021-02-13 09:54:52', NULL),
	(57, 'elimileth', 'Elimileth Martinez ALSINA', '$2y$12$FOvDS1EOxzlGyy1ryB1zxOnJHcu64b7hqKORyegIXlG5HpC07cVRS', '2021-02-15 20:51:45', NULL),
	(60, 'carlos12', 'cortes dias', '$2y$12$aIpNsMUf5NZjFSNZWRJ4NuyhQQaG7EaWPZiqGBYKBflkPEf5aAEoa', '2021-04-13 17:41:27', NULL),
	(61, 'nuevo', 'nuevoproyecto', '$2y$12$z/NWLWwZC8dgPLhUHR/0xOpKDPmYJ1QzCIQ6/oG9zUyuDyR.2fwkq', NULL, NULL),
	(68, 'nueva', 'test_nuevo_nuevo', '$2y$12$4/c6R3agSLdXc1qyav2kJe8rMldSI.azxGUTDX724BPGwQCuWHsKq', '2021-02-07 13:50:27', NULL),
	(69, 'pedro', 'dragon ball z', '$2y$12$1/FQS.NlCvE6gHBGM7BDbO4gc7fwcR9K2kH3bw6dfM3Xlpd1xJUzG', NULL, NULL),
	(70, 'nuevo222', 'dragon aaa', '$2y$12$wvBptucbKaUUr2LxijsKdOQ86qGiiL2LHvGh.d/uQRFF2ecNMis8a', NULL, NULL),
	(71, 'avis', 'Silviadfgdg', '$2y$12$U9X.Ru7ZJumBQ/RNQ/w61eq5H6/taOVgTGCkyXvDT1NWD8KN749ea', NULL, NULL),
	(72, 'carlosnuevo', 'yortr', '$2y$12$qSku8qu0NJiTRCFJpym/cu3uutYwOpRTkafMsZHKyTkvbyeEdEnKe', NULL, NULL),
	(73, 'barrios', 'Diego Barrios', '$2y$12$3AwKAhLPXw09LPaXP/xgMeKFlSwNkccme0HJCSyfE.XWfjcoSK8k6', '2021-02-11 21:07:04', NULL);
/*!40000 ALTER TABLE `usuarios_db` ENABLE KEYS */;

-- Volcando estructura para tabla db_ventas_productos.ventas_realizadas
CREATE TABLE IF NOT EXISTS `ventas_realizadas` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` varchar(50) DEFAULT NULL,
  `codigo_venta` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `cantidad` varchar(50) DEFAULT NULL,
  `producto` varchar(50) DEFAULT NULL,
  `usuario_venta` varchar(50) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `fecha_venta` date DEFAULT NULL,
  PRIMARY KEY (`id_venta`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla db_ventas_productos.ventas_realizadas: ~26 rows (aproximadamente)
/*!40000 ALTER TABLE `ventas_realizadas` DISABLE KEYS */;
INSERT INTO `ventas_realizadas` (`id_venta`, `id_cliente`, `codigo_venta`, `tipo`, `cantidad`, `producto`, `usuario_venta`, `precio`, `fecha_venta`) VALUES
	(2, NULL, 'V000000002', 'UNIDAD', '2', 'BRILLO MAGICO ORO', 'dairo', 6000, '2021-04-17'),
	(3, NULL, 'V000000002', 'UNIDAD', '2', 'MASCARILLA PARA PUNTOS NEGROS', 'dairo', 8000, '2021-04-17'),
	(9, NULL, 'V000000001', 'UNIDAD', '4', 'BEAUTY BLENDER', 'yordis', 10000, '2021-04-17'),
	(10, NULL, 'V000000001', 'UNIDAD', '1', 'BRILLO MAGICO ORO', 'yordis', 6000, '2021-04-17'),
	(15, NULL, 'V000000003', 'UNIDAD', '3', 'BALACA GATICO', 'yordis', 6000, '2021-04-17'),
	(16, NULL, 'V000000003', 'UNIDAD', '2', 'BEAUTY BLENDER', 'yordis', 10000, '2021-04-17'),
	(17, NULL, 'V000000003', 'UNIDAD', '1', 'BRILLO MAGICO ORO', 'yordis', 6000, '2021-04-17'),
	(19, NULL, 'V000000004', 'UNIDAD', '1', 'BRILLO MAGICO ORO', 'dairo', 6000, '2021-04-17'),
	(20, NULL, 'V000000004', 'UNIDAD', '1', 'MASCARILLA PARA PUNTOS NEGROS', 'dairo', 8000, '2021-04-17'),
	(21, NULL, 'V000000004', 'UNIDAD', '1', 'PALETA DE CONTORNO RUBOR E ILUMINADOR', 'dairo', 12000, '2021-04-17'),
	(22, NULL, 'V000000004', 'UNIDAD', '2', 'SERUM HIDRATANTE COLAGENO', 'dairo', 12000, '2021-04-17'),
	(24, NULL, 'V000000005', 'UNIDAD', '2', 'BEAUTY BLENDER', 'yordis', 10000, '2021-04-19'),
	(25, NULL, 'V000000005', 'UNIDAD', '1', 'BRILLO MAGICO ORO', 'yordis', 6000, '2021-04-19'),
	(26, NULL, 'V000000005', 'UNIDAD', '3', 'BALACA GATICO', 'yordis', 6000, '2021-04-19'),
	(27, NULL, 'V000000006', 'UNIDAD', '4', 'BALACA GATICO', 'yordis', 6000, '2021-04-23'),
	(28, NULL, 'V000000006', 'UNIDAD', '1', 'BEAUTY BLENDER', 'yordis', 10000, '2021-04-23'),
	(29, NULL, 'V000000006', 'UNIDAD', '1', 'BRILLO MAGICO ORO', 'yordis', 6000, '2021-04-23'),
	(30, NULL, 'V000000007', 'UNIDAD', '3', 'BALACA GATICO', 'yordis', 6000, '2021-04-26'),
	(31, NULL, 'V000000007', 'UNIDAD', '2', 'BEAUTY BLENDER', 'yordis', 10000, '2021-04-26'),
	(32, NULL, 'V000000007', 'UNIDAD', '1', 'BRILLO MAGICO ORO', 'yordis', 6000, '2021-04-26'),
	(33, NULL, 'V000000007', 'UNIDAD', '1', 'MASCARILLA PARA PUNTOS NEGROS', 'yordis', 8000, '2021-04-26'),
	(35, NULL, 'V000000008', 'UNIDAD', '4', 'BALACA GATICO', 'yordis', 6000, '2021-04-28'),
	(36, NULL, 'V000000008', 'UNIDAD', '4', 'BEAUTY BLENDER', 'yordis', 10000, '2021-04-28'),
	(37, NULL, 'V000000008', 'UNIDAD', '1', 'BRILLO MAGICO ORO', 'yordis', 6000, '2021-04-28'),
	(38, NULL, 'V000000008', 'UNIDAD', '1', 'MASCARILLA PARA PUNTOS NEGROS', 'yordis', 8000, '2021-04-28'),
	(39, NULL, 'V000000008', 'UNIDAD', '1', 'PALETA DE CONTORNO RUBOR E ILUMINADOR', 'yordis', 12000, '2021-04-28');
/*!40000 ALTER TABLE `ventas_realizadas` ENABLE KEYS */;

-- Volcando estructura para tabla db_ventas_productos.venta_tmp_db
CREATE TABLE IF NOT EXISTS `venta_tmp_db` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) DEFAULT NULL,
  `id_cliente` varchar(50) DEFAULT NULL,
  `codigo_venta` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `cantidad` varchar(50) DEFAULT NULL,
  `producto` varchar(50) DEFAULT NULL,
  `usuario_venta` varchar(50) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `fecha_venta` date DEFAULT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_ventas_productos.venta_tmp_db: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `venta_tmp_db` DISABLE KEYS */;
/*!40000 ALTER TABLE `venta_tmp_db` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
