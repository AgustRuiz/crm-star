-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-08-2014 a las 20:42:19
-- Versión del servidor: 5.5.38
-- Versión de PHP: 5.3.10-1ubuntu3.13

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
-- Estructura de tabla para la tabla `ci_contactos`
--

CREATE TABLE IF NOT EXISTS `ci_contactos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `apellidos` varchar(40) DEFAULT NULL,
  `nif` varchar(15) DEFAULT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Volcado de datos para la tabla `ci_contactos`
--

INSERT INTO `ci_contactos` (`id`, `nombre`, `apellidos`, `nif`, `direccion`, `ciudad`, `provincia`, `cp`, `pais`, `telfOficina`, `telfMovil`, `fax`, `otrosDatos`) VALUES
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
(28, 'Agustín', 'Ruiz Linares', '15510111S', 'C/ Navas, 21', 'Villacarrillo', 'Jaén', '23300', 'España', '953442061', '600798782', '953442053', 'Editado<br />\nBien');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_contactos_email`
--

CREATE TABLE IF NOT EXISTS `ci_contactos_email` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `correo` varchar(50) NOT NULL,
  `principal` tinyint(1) NOT NULL,
  `noValido` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Volcado de datos para la tabla `ci_contactos_email`
--

INSERT INTO `ci_contactos_email` (`id`, `correo`, `principal`, `noValido`) VALUES
(39, 'agustinruizlinares@gmail.com', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_contactos_estados`
--

CREATE TABLE IF NOT EXISTS `ci_contactos_estados` (
  `id` int(10) unsigned NOT NULL,
  `estado` varchar(30) CHARACTER SET latin1 NOT NULL,
  `estilo_estado` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `estado` (`estado`,`estilo_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `ci_contactos_estados`
--

INSERT INTO `ci_contactos_estados` (`id`, `estado`, `estilo_estado`) VALUES
(3, 'Activo', 'estado-contacto-activo'),
(4, 'Agotado', 'estado-contacto-agotado'),
(1, 'No especificado', 'estado-contacto-indeterminado'),
(2, 'Potencial', 'estado-contacto-potencial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_join_contactos_contactos_email`
--

CREATE TABLE IF NOT EXISTS `ci_join_contactos_contactos_email` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contacto_id` bigint(20) unsigned NOT NULL,
  `contactos_email_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `contacto_id` (`contacto_id`),
  KEY `contactos_email_id` (`contactos_email_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=53 ;

--
-- Volcado de datos para la tabla `ci_join_contactos_contactos_email`
--

INSERT INTO `ci_join_contactos_contactos_email` (`id`, `contacto_id`, `contactos_email_id`) VALUES
(34, 28, 39);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_join_contactos_contactos_estados`
--

CREATE TABLE IF NOT EXISTS `ci_join_contactos_contactos_estados` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contacto_id` bigint(20) unsigned NOT NULL,
  `contactos_estado_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `contacto_id` (`contacto_id`),
  KEY `contactos_estado_id` (`contactos_estado_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=88 ;

--
-- Volcado de datos para la tabla `ci_join_contactos_contactos_estados`
--

INSERT INTO `ci_join_contactos_contactos_estados` (`id`, `contacto_id`, `contactos_estado_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 1),
(6, 6, 2),
(7, 7, 3),
(8, 8, 4),
(9, 9, 1),
(10, 10, 2),
(11, 11, 3),
(12, 12, 4),
(13, 13, 1),
(14, 14, 2),
(15, 15, 3),
(16, 16, 4),
(17, 17, 2),
(18, 18, 1),
(19, 19, 1),
(20, 20, 1),
(21, 21, 1),
(22, 22, 1),
(23, 23, 1),
(24, 24, 1),
(25, 25, 1),
(26, 26, 1),
(27, 27, 1),
(28, 28, 2),
(29, 35, 3),
(30, 39, 4),
(31, 42, 2),
(32, 43, 1),
(33, 44, 1),
(34, 46, 1),
(35, 47, 1),
(36, 48, 1),
(37, 49, 1),
(38, 50, 1),
(39, 51, 1),
(40, 52, 1),
(41, 55, 1),
(42, 56, 2),
(43, 57, 3),
(44, 58, 1),
(45, 59, 1),
(46, 60, 2),
(47, 61, 1),
(48, 62, 1),
(49, 63, 2),
(50, 64, 4),
(51, 65, 3),
(52, 66, 1),
(53, 67, 1),
(54, 68, 1),
(55, 69, 1),
(56, 70, 3),
(57, 71, 2),
(58, 72, 4),
(59, 73, 4),
(60, 74, 1),
(61, 75, 1),
(62, 76, 1),
(63, 77, 1),
(64, 78, 1),
(65, 79, 1),
(66, 80, 1),
(71, 85, 1),
(79, 93, 1),
(81, 95, 1),
(82, 96, 3),
(83, 97, 1),
(84, 98, 1),
(85, 99, 1),
(86, 100, 1),
(87, 101, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_usuarios`
--

CREATE TABLE IF NOT EXISTS `ci_usuarios` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `ci_usuarios`
--

INSERT INTO `ci_usuarios` (`id`, `nick`, `password`, `nombre`, `apellidos`, `nif`, `email`, `telfOficina`, `telfMovil`, `fax`, `otrosDatos`) VALUES
(1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Administrador', '', NULL, 'arl00029@red.ujaen.es', '', '', '', ''),
(13, 'aruiz', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Agustín', 'Ruiz Linares', '15510111S', 'agustinruizlinares@gmail.com', '999999999', '666666666', '912345678', 'Primer usuario'),
(14, 'uno', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Uno', '', NULL, 'uno@uno.com', '', '', '', ''),
(15, 'dos', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Dos', '', NULL, 'dos@dos.com', '', '', '', ''),
(16, 'tres', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'tres', '', NULL, 'tres@tres.com', '', '', '', ''),
(17, 'cuatro', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'cuatro', '', NULL, 'cuatro@cuatro.com', '', '', '', ''),
(18, 'cinco', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'cinco', '', NULL, 'cinco@cinco.com', '', '', '', ''),
(19, 'seis', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'seis', '', NULL, 'seis@seis.com', '', '', '', ''),
(20, 'siete', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'siete', '', NULL, 'siete@siete.com', '', '', '', ''),
(21, 'ocho', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'ocho', '', NULL, 'ocho@ocho.com', '', '', '', ''),
(22, 'nueve', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'nueve', '', NULL, 'nueve@nueve.com', '', '', '', ''),
(23, 'diez', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'diez', '', NULL, 'diez@diez.com', '', '', '', ''),
(24, 'once', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'once', '', NULL, 'once@once.com', '', '', '', ''),
(25, 'doce', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'doce', '', NULL, 'doce@doce.com', '', '', '', ''),
(26, 'trece', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'trece', '', NULL, 'trece@trece.com', '', '', '', ''),
(27, 'catorce', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'catorce', '', NULL, 'catorce@catorce.com', '', '', '', ''),
(28, 'quince', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'quince', '', NULL, 'quince@quince.com', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_usuarios_test`
--

CREATE TABLE IF NOT EXISTS `ci_usuarios_test` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nick` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nif` varchar(15) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `telfOficina` varchar(15) COLLATE latin1_spanish_ci DEFAULT NULL,
  `telfMovil` varchar(15) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fax` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `otrosDatos` text COLLATE latin1_spanish_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `ci_usuarios_test`
--

INSERT INTO `ci_usuarios_test` (`id`, `nick`, `password`, `nombre`, `apellidos`, `nif`, `email`, `telfOficina`, `telfMovil`, `fax`, `otrosDatos`) VALUES
(2, 'admin', '08218663ff9949b0495401119a645f67d930a41e', 'Administrador', '', '', 'arl00029@red.ujaen.es', '', '', '', ''),
(4, 'aruiz', '5ef1cc57930f11976ae81070ddb2fac9063ede5e', 'Agustín', 'Ruiz Linares', '15510111S', 'agustinruizlinares@gmail.com', '953442061', '600798782', '953442053', 'Es un usuario muy bonico<br />\nEsto es otra línea<br />\nY esta la úlitma');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ci_join_contactos_contactos_email`
--
ALTER TABLE `ci_join_contactos_contactos_email`
  ADD CONSTRAINT `ci_join_contactos_contactos_email_ibfk_2` FOREIGN KEY (`contactos_email_id`) REFERENCES `ci_contactos_email` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ci_join_contactos_contactos_email_ibfk_1` FOREIGN KEY (`contacto_id`) REFERENCES `ci_contactos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ci_join_contactos_contactos_estados`
--
ALTER TABLE `ci_join_contactos_contactos_estados`
  ADD CONSTRAINT `ci_join_contactos_contactos_estados_ibfk_1` FOREIGN KEY (`contactos_estado_id`) REFERENCES `ci_contactos_estados` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
