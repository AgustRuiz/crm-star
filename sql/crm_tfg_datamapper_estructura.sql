-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-08-2014 a las 20:41:51
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
