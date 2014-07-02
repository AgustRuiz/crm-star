-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-07-2014 a las 22:10:34
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
  `apellidos` varchar(40) DEFAULT NULL,
  `nif` varchar(15) DEFAULT NULL,
  `id_estado` int(10) unsigned NOT NULL DEFAULT '0',
  `direccion` varchar(200) DEFAULT NULL,
  `ciudad` varchar(40) DEFAULT NULL,
  `provincia` varchar(40) DEFAULT NULL,
  `cp` varchar(10) DEFAULT NULL,
  `pais` varchar(40) DEFAULT NULL,
  `telfOficina` varchar(15) DEFAULT NULL,
  `telfMovil` varchar(15) DEFAULT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `otrosDatos` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nif` (`nif`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `nombre`, `apellidos`, `nif`, `id_estado`, `direccion`, `ciudad`, `provincia`, `cp`, `pais`, `telfOficina`, `telfMovil`, `fax`, `otrosDatos`) VALUES
(1, 'Juan', 'Jiménez', NULL, 2, '', '', '', '', '', '', '', '', ''),
(2, 'Alberto', 'Ávila', NULL, 1, '', '', '', '', '', '', '', '', ''),
(3, 'Bárbara', 'Barcelona', NULL, 3, '', '', '', '', '', '', '', '', ''),
(4, 'Carlos', 'Cifuentes', NULL, 1, '', '', '', '', '', '', '', '', ''),
(5, 'Diego', 'Domínguez', NULL, 1, '', '', '', '', '', '', '', '', ''),
(6, 'Elena', 'Estévez', NULL, 0, '', '', '', '', '', '', '', '', ''),
(7, 'Fátima', 'Fernández', NULL, 0, '', '', '', '', '', '', '', '', ''),
(8, 'Gonzalo', 'González', NULL, 0, '', '', '', '', '', '', '', '', ''),
(9, 'Homer', 'Simpsom', NULL, 0, '', '', '', '', '', '', '', '', ''),
(10, 'Ignacio', 'Iglesias', NULL, 0, '', '', '', '', '', '', '', '', ''),
(11, 'Jorge', 'Jiménez', NULL, 0, '', '', '', '', '', '', '', '', ''),
(12, 'Kiko', 'Klamstein', NULL, 0, '', '', '', '', '', '', '', '', ''),
(13, 'Lucía', 'López', NULL, 0, '', '', '', '', '', '', '', '', ''),
(14, 'Mario', 'Martínez', NULL, 0, '', '', '', '', '', '', '', '', ''),
(15, 'Nuria', 'Navarro', NULL, 0, '', '', '', '', '', '', '', '', ''),
(16, 'Óscar', 'Oviedo', NULL, 0, '', '', '', '', '', '', '', '', ''),
(17, 'Pedro', 'Pérez', NULL, 0, '', '', '', '', '', '', '', '', ''),
(18, 'Quintina', 'Quesada', NULL, 0, '', '', '', '', '', '', '', '', ''),
(19, 'Rubén', 'Román', NULL, 0, '', '', '', '', '', '', '', '', ''),
(20, 'Sandra', 'Sánchez', NULL, 0, '', '', '', '', '', '', '', '', ''),
(21, 'Tomás', 'Tenorio', NULL, 0, '', '', '', '', '', '', '', '', ''),
(22, 'Úrsula', 'Uriade', NULL, 0, '', '', '', '', '', '', '', '', ''),
(23, 'Víctor', 'Valverde', NULL, 0, '', '', '', '', '', '', '', '', ''),
(24, 'William', 'Wilson', NULL, 0, '', '', '', '', '', '', '', '', ''),
(25, 'Xavier', 'Xabier', NULL, 0, '', '', '', '', '', '', '', '', ''),
(26, 'Yago', 'Yagüe', NULL, 0, '', '', '', '', '', '', '', '', ''),
(27, 'Zaina', 'Zamorano', NULL, 0, '', '', '', '', '', '', '', '', ''),
(28, 'Agustín', 'Ruiz Linares', '15510111S', 1, '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos_correos`
--

CREATE TABLE IF NOT EXISTS `contactos_correos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_contacto` bigint(20) unsigned NOT NULL,
  `correo` varchar(50) NOT NULL,
  `principal` tinyint(1) NOT NULL,
  `noValido` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_contacto` (`id_contacto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos_estado`
--

CREATE TABLE IF NOT EXISTS `contactos_estado` (
  `id_estado` int(10) unsigned NOT NULL,
  `estado` varchar(30) NOT NULL,
  `estilo_estado` varchar(20) NOT NULL,
  PRIMARY KEY (`id_estado`),
  UNIQUE KEY `estado` (`estado`,`estilo_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contactos_estado`
--

INSERT INTO `contactos_estado` (`id_estado`, `estado`, `estilo_estado`) VALUES
(2, 'Activo', 'activo'),
(3, 'Agotado', 'agotado'),
(0, 'No especificado', 'indeterminado'),
(1, 'Potencial', 'potencial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nick` varchar(15) NOT NULL,
  `password` varchar(98) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellidos` varchar(40) DEFAULT NULL,
  `nif` varchar(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `telfOficina` varchar(15) DEFAULT NULL,
  `telfMovil` varchar(15) DEFAULT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `otrosDatos` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nick` (`nick`),
  UNIQUE KEY `nif` (`nif`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nick`, `password`, `nombre`, `apellidos`, `nif`, `email`, `telfOficina`, `telfMovil`, `fax`, `otrosDatos`) VALUES
(0, 'admin', '123456', 'Administrador', '', NULL, 'arl00029@red.ujaen.es', '', '', '', ''),
(13, 'aruiz', '$6$mKk2D3sj$YdM6l2jyb2XrSPgalZc9mb8kb7WooUVT5vP9Ob0nl5ynX5UkCz5.ijat7voCIE04Qs4OlqNWM.0cgPeSn9gd90', 'Agustín', 'Ruiz Linares', '15510111S', 'agustinruizlinares@gmail.com', '999999999', '666666666', '', 'Primer usuario');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contactos_correos`
--
ALTER TABLE `contactos_correos`
  ADD CONSTRAINT `contactos_correos_ibfk_1` FOREIGN KEY (`id_contacto`) REFERENCES `contactos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
