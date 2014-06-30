-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-06-2014 a las 01:25:18
-- Versión del servidor: 5.5.37
-- Versión de PHP: 5.3.10-1ubuntu3.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `crm_tfg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE IF NOT EXISTS `contactos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `apellidos` varchar(40),
  `nif` varchar(15),
  `direccion` varchar(200),
  `ciudad` varchar(40),
  `provincia` varchar(40),
  `cp` varchar(10),
  `pais` varchar(40),
  `telfOficina` varchar(15),
  `telfMovil` varchar(15),
  `fax` varchar(15),
  `otrosDatos` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nif` (`nif`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `nombre`, `apellidos`, `nif`, `direccion`, `ciudad`, `provincia`, `cp`, `pais`, `telfOficina`, `telfMovil`, `fax`, `otrosDatos`) VALUES
(1, 'Juan', 'Jiménez', NULL, '', '', '', '', '', '', '', '', ''),
(2, 'Alberto', 'Ávila', NULL, '', '', '', '', '', '', '', '', ''),
(3, 'Bárbara', 'Barcelona', NULL, '', '', '', '', '', '', '', '', ''),
(4, 'Carlos', 'Cifuentes', NULL, '', '', '', '', '', '', '', '', ''),
(5, 'Diego', 'Domínguez', NULL, '', '', '', '', '', '', '', '', ''),
(6, 'Elena', 'Estévez', NULL, '', '', '', '', '', '', '', '', ''),
(7, 'Fátima', 'Fernández', NULL, '', '', '', '', '', '', '', '', ''),
(8, 'Gonzalo', 'González', NULL, '', '', '', '', '', '', '', '', ''),
(9, 'Homer', 'Simpsom', NULL, '', '', '', '', '', '', '', '', ''),
(10, 'Ignacio', 'Iglesias', NULL, '', '', '', '', '', '', '', '', ''),
(11, 'Jorge', 'Jiménez', NULL, '', '', '', '', '', '', '', '', ''),
(12, 'Kiko', 'Klamstein', NULL, '', '', '', '', '', '', '', '', ''),
(13, 'Lucía', 'López', NULL, '', '', '', '', '', '', '', '', ''),
(14, 'Mario', 'Martínez', NULL, '', '', '', '', '', '', '', '', ''),
(15, 'Nuria', 'Navarro', NULL, '', '', '', '', '', '', '', '', ''),
(16, 'Óscar', 'Oviedo', NULL, '', '', '', '', '', '', '', '', ''),
(17, 'Pedro', 'Pérez', NULL, '', '', '', '', '', '', '', '', ''),
(18, 'Quintina', 'Quesada', NULL, '', '', '', '', '', '', '', '', ''),
(19, 'Rubén', 'Román', NULL, '', '', '', '', '', '', '', '', ''),
(20, 'Sandra', 'Sánchez', NULL, '', '', '', '', '', '', '', '', ''),
(21, 'Tomás', 'Tenorio', NULL, '', '', '', '', '', '', '', '', ''),
(22, 'Úrsula', 'Uriade', NULL, '', '', '', '', '', '', '', '', ''),
(23, 'Víctor', 'Valverde', NULL, '', '', '', '', '', '', '', '', ''),
(24, 'William', 'Wilson', NULL, '', '', '', '', '', '', '', '', ''),
(25, 'Xavier', 'Xabier', NULL, '', '', '', '', '', '', '', '', ''),
(26, 'Yago', 'Yagüe', NULL, '', '', '', '', '', '', '', '', ''),
(27, 'Zaina', 'Zamorano', NULL, '', '', '', '', '', '', '', '', ''),
(28, 'Agustín', 'Ruiz Linares', '15510111S', 'Calle Navas, 21<br />\nApetecán', 'Villacarrillo', 'Jaén', '23300', 'España', '999999999', '666666666', '-', 'Es un chico muy apañao<br />\nApetepórico<br />\nJanderklander');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correos`
--

CREATE TABLE IF NOT EXISTS `correos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_contacto` bigint(20) unsigned NOT NULL,
  `correo` varchar(50) NOT NULL,
  `principal` tinyint(1) NOT NULL,
  `noValido` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_contacto` (`id_contacto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `correos`
--

INSERT INTO `correos` (`id`, `id_contacto`, `correo`, `principal`, `noValido`) VALUES
(1, 28, 'agustinruizlinares@gmail.com', 1, 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `correos`
--
ALTER TABLE `correos`
  ADD CONSTRAINT `correos_ibfk_1` FOREIGN KEY (`id_contacto`) REFERENCES `contactos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
