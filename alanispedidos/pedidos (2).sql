-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-08-2013 a las 22:48:09
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
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `pedido` varchar(45) DEFAULT NULL,
  `descripcion` text,
  `activo` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL,
  `idProveedor` int(11) NOT NULL,
  `fechaPedido` date NOT NULL,
  `fechaRecepcion` date NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `contactoProveedor` varchar(145) DEFAULT NULL,
  `metodoPedido` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPedido`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='almacena los pedidos' AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `pedido`, `descripcion`, `activo`, `idEstado`, `idProveedor`, `fechaPedido`, `fechaRecepcion`, `idUsuario`, `contactoProveedor`, `metodoPedido`) VALUES
(1, '1er pedidodsad', '2S31DSA', 1, 3, 110, '2013-06-12', '2013-06-22', 0, 'lucho', 'email'),
(2, '1er pedido', 'SADASD', 1, 2, 110, '2013-06-12', '2013-06-26', 0, 'lucho', 'email'),
(3, '3ER', '3ER PEDIDO', 1, 1, 110, '2013-06-12', '2013-06-26', 0, 'lucho', 'email'),
(10, 'NUEVO PEDIDO', 'ESTE ES UN NUEVO PEDIDO', 1, 1, 110, '2013-06-12', '2013-07-26', 0, 'TOMAS', 'email'),
(11, 'pedido 5', 'dsadasdsa', 1, 1, 111, '2013-06-12', '2013-06-26', 0, '123', 'email'),
(12, 'pedido 6', 'prueba pedido', 1, 2, 122, '2013-08-07', '2013-08-22', 0, 'dsa123', 'email');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
