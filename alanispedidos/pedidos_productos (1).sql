-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-08-2013 a las 22:48:23
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `control_alanis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_productos`
--

CREATE TABLE IF NOT EXISTS `pedidos_productos` (
  `idPedido_producto` int(11) NOT NULL AUTO_INCREMENT,
  `idPedido` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `producto` text,
  `producto_relacion` int(11) NOT NULL,
  `cantidad` varchar(45) DEFAULT NULL,
  `activo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPedido_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='estos son los productos que corresponden a un pedido	' AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `pedidos_productos`
--

INSERT INTO `pedidos_productos` (`idPedido_producto`, `idPedido`, `idProducto`, `producto`, `producto_relacion`, `cantidad`, `activo`) VALUES
(1, 2, 68, '', 1, '1', '1'),
(2, 2, 9, '', 1, '1', '1'),
(3, 3, 637, 'AMOLADORA', 1, '1', '1'),
(4, 3, 0, 'PRUEBA', 0, '1', '1'),
(5, 7, 751, 'DREMEL DR 456 S-SPEEDCLIC-KIT DE 5 UNIDADES DE DISCOS DE CORTE P/METAL-1 1/2"-', 1, '1', '1'),
(6, 7, 0, 'prueba de los mych', 0, '1', '1'),
(7, 8, 1759, 'ADONIS C/CERAMICO 2 LLAVES Y LLUVIA-ACERO P/P- 80-555-C', 1, '1', '1'),
(8, 8, 0, 'algo para sss', 0, '1', '1'),
(9, 10, 230, 'AMOLADORA ANGULAR 4.5" ARGENTEC AS 85-800 W-DISCO 115mm-10000 RPM-', 1, '1', '1'),
(10, 11, 646, 'ACANALADORA DE MURO BOSCH MOD GNF 35 CA-1400 W-9300 RPM-', 1, '1', '1'),
(11, 11, 18825, 'ADAPTADOR AUMENTADOR BAHCO - MACHO 3/4" A CUADRO HEMBRA 1" - 9564', 1, '1', '1'),
(12, 12, 13628, 'ACEITE MULTIUSO X 110 GRS EFLO - EFL0250', 1, '1', '1'),
(13, 12, 0, 'muchacho', 0, '10', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
