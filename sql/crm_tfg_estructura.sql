-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-08-2014 a las 20:52:54
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
-- Estructura de tabla para la tabla `ci_actividades`
--

CREATE TABLE IF NOT EXISTS `ci_actividades` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `asunto` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `inicio` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `descripcion` text COLLATE latin1_spanish_ci NOT NULL,
  `resultado` text COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=35 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_actividades_estados`
--

CREATE TABLE IF NOT EXISTS `ci_actividades_estados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `estilo` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_actividades_prioridades`
--

CREATE TABLE IF NOT EXISTS `ci_actividades_prioridades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prioridad` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `estilo` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `estilo_icono` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `etiqueta_icono` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_actividades_tipos`
--

CREATE TABLE IF NOT EXISTS `ci_actividades_tipos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `estilo` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_alertas`
--

CREATE TABLE IF NOT EXISTS `ci_alertas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `asunto` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` text COLLATE latin1_spanish_ci NOT NULL,
  `fechaHora` datetime NOT NULL,
  `emergente` tinyint(1) NOT NULL DEFAULT '1',
  `visualizado` tinyint(1) NOT NULL DEFAULT '0',
  `email` tinyint(1) NOT NULL DEFAULT '0',
  `emailEnviado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_campanyas`
--

CREATE TABLE IF NOT EXISTS `ci_campanyas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL DEFAULT '0000-00-00',
  `objetivo` text COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` text COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_campanyas_estados`
--

CREATE TABLE IF NOT EXISTS `ci_campanyas_estados` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `estilo` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_campanyas_tipos`
--

CREATE TABLE IF NOT EXISTS `ci_campanyas_tipos` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `estilo` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=8 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_contactos_estados`
--

CREATE TABLE IF NOT EXISTS `ci_contactos_estados` (
  `id` int(10) unsigned NOT NULL,
  `estado` varchar(30) CHARACTER SET latin1 NOT NULL,
  `estilo` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `estado` (`estado`,`estilo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_join_actividades_actividades_estados`
--

CREATE TABLE IF NOT EXISTS `ci_join_actividades_actividades_estados` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `actividad_id` bigint(20) unsigned NOT NULL,
  `actividades_estado_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `actividad_id` (`actividad_id`),
  KEY `actividades_estado_id` (`actividades_estado_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_join_actividades_actividades_prioridades`
--

CREATE TABLE IF NOT EXISTS `ci_join_actividades_actividades_prioridades` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `actividad_id` bigint(20) unsigned NOT NULL,
  `actividades_prioridad_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `actividad_id` (`actividad_id`),
  KEY `actividades_prioridad_id` (`actividades_prioridad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_join_actividades_actividades_tipos`
--

CREATE TABLE IF NOT EXISTS `ci_join_actividades_actividades_tipos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `actividad_id` bigint(20) unsigned NOT NULL,
  `actividades_tipo_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `actividad_id` (`actividad_id`),
  KEY `actividades_tipo_id` (`actividades_tipo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_join_actividades_alertas`
--

CREATE TABLE IF NOT EXISTS `ci_join_actividades_alertas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `alerta_id` bigint(20) unsigned NOT NULL,
  `actividad_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `alerta_id` (`alerta_id`,`actividad_id`),
  KEY `actividad_id` (`actividad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_join_actividades_campanyas`
--

CREATE TABLE IF NOT EXISTS `ci_join_actividades_campanyas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `actividad_id` bigint(20) unsigned NOT NULL,
  `campanya_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `actividad_id` (`actividad_id`,`campanya_id`),
  KEY `campanya_id` (`campanya_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_join_actividades_contactos`
--

CREATE TABLE IF NOT EXISTS `ci_join_actividades_contactos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `actividad_id` bigint(20) unsigned NOT NULL,
  `contacto_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `actividad_id` (`actividad_id`,`contacto_id`),
  KEY `contacto_id` (`contacto_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_join_actividades_usuarios`
--

CREATE TABLE IF NOT EXISTS `ci_join_actividades_usuarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `actividad_id` bigint(20) unsigned NOT NULL,
  `usuario_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `actividad_id` (`actividad_id`,`usuario_id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_join_alertas_usuarios`
--

CREATE TABLE IF NOT EXISTS `ci_join_alertas_usuarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `alerta_id` bigint(20) unsigned NOT NULL,
  `usuario_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `alerta_id` (`alerta_id`,`usuario_id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_join_campanyas_campanyas_estados`
--

CREATE TABLE IF NOT EXISTS `ci_join_campanyas_campanyas_estados` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `campanya_id` bigint(20) unsigned NOT NULL,
  `campanyas_estado_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `campanya_id` (`campanya_id`),
  KEY `campanyas_estado_id` (`campanyas_estado_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_join_campanyas_campanyas_tipos`
--

CREATE TABLE IF NOT EXISTS `ci_join_campanyas_campanyas_tipos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `campanya_id` bigint(20) unsigned NOT NULL,
  `campanyas_tipo_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `campanya_id` (`campanya_id`),
  KEY `campanyas_tipo_id` (`campanyas_tipo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_join_campanyas_usuarios`
--

CREATE TABLE IF NOT EXISTS `ci_join_campanyas_usuarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `campanya_id` bigint(20) unsigned NOT NULL,
  `usuario_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `campanya_id` (`campanya_id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=15 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=35 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=89 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_join_perfiles_usuarios`
--

CREATE TABLE IF NOT EXISTS `ci_join_perfiles_usuarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` bigint(20) unsigned NOT NULL,
  `perfil_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `perfil_id` (`perfil_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_join_usuarios_usuarios_estados`
--

CREATE TABLE IF NOT EXISTS `ci_join_usuarios_usuarios_estados` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` bigint(20) unsigned NOT NULL,
  `usuarios_estado_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `usuarios_perfil_id` (`usuarios_estado_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_perfiles`
--

CREATE TABLE IF NOT EXISTS `ci_perfiles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `contactos_listar` tinyint(1) NOT NULL DEFAULT '0',
  `contactos_crear` tinyint(1) NOT NULL DEFAULT '0',
  `contactos_editar` tinyint(1) NOT NULL DEFAULT '0',
  `contactos_eliminar` tinyint(1) NOT NULL DEFAULT '0',
  `campanyas_listar_todas` tinyint(1) NOT NULL DEFAULT '0',
  `campanyas_listar_propias` tinyint(1) NOT NULL DEFAULT '0',
  `campanyas_crear` tinyint(1) NOT NULL DEFAULT '0',
  `campanyas_editar` tinyint(1) NOT NULL DEFAULT '0',
  `campanyas_eliminar` tinyint(1) NOT NULL DEFAULT '0',
  `actividades_listar_todas` tinyint(1) NOT NULL DEFAULT '0',
  `actividades_listar_propias` tinyint(1) NOT NULL DEFAULT '0',
  `actividades_crear_propias` tinyint(1) NOT NULL DEFAULT '0',
  `actividades_editar_propias` tinyint(1) NOT NULL DEFAULT '0',
  `actividades_eliminar_propias` tinyint(1) NOT NULL DEFAULT '0',
  `actividades_crear_todas` tinyint(1) NOT NULL DEFAULT '0',
  `actividades_editar_todas` tinyint(1) NOT NULL DEFAULT '0',
  `actividades_eliminar_todas` tinyint(1) NOT NULL DEFAULT '0',
  `usuarios_listar` tinyint(1) NOT NULL DEFAULT '0',
  `usuarios_crear` tinyint(1) NOT NULL DEFAULT '0',
  `usuarios_editar` tinyint(1) NOT NULL DEFAULT '0',
  `usuarios_eliminar` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=5 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_usuarios_estados`
--

CREATE TABLE IF NOT EXISTS `ci_usuarios_estados` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `estilo` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=4 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ci_join_actividades_actividades_estados`
--
ALTER TABLE `ci_join_actividades_actividades_estados`
  ADD CONSTRAINT `ci_join_actividades_actividades_estados_ibfk_1` FOREIGN KEY (`actividad_id`) REFERENCES `ci_actividades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ci_join_actividades_actividades_estados_ibfk_2` FOREIGN KEY (`actividades_estado_id`) REFERENCES `ci_actividades_estados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ci_join_actividades_actividades_prioridades`
--
ALTER TABLE `ci_join_actividades_actividades_prioridades`
  ADD CONSTRAINT `ci_join_actividades_actividades_prioridades_ibfk_1` FOREIGN KEY (`actividad_id`) REFERENCES `ci_actividades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ci_join_actividades_actividades_prioridades_ibfk_2` FOREIGN KEY (`actividades_prioridad_id`) REFERENCES `ci_actividades_prioridades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ci_join_actividades_actividades_tipos`
--
ALTER TABLE `ci_join_actividades_actividades_tipos`
  ADD CONSTRAINT `ci_join_actividades_actividades_tipos_ibfk_1` FOREIGN KEY (`actividad_id`) REFERENCES `ci_actividades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ci_join_actividades_actividades_tipos_ibfk_2` FOREIGN KEY (`actividades_tipo_id`) REFERENCES `ci_actividades_tipos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ci_join_actividades_alertas`
--
ALTER TABLE `ci_join_actividades_alertas`
  ADD CONSTRAINT `ci_join_actividades_alertas_ibfk_1` FOREIGN KEY (`alerta_id`) REFERENCES `ci_alertas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ci_join_actividades_alertas_ibfk_3` FOREIGN KEY (`actividad_id`) REFERENCES `ci_actividades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ci_join_actividades_campanyas`
--
ALTER TABLE `ci_join_actividades_campanyas`
  ADD CONSTRAINT `ci_join_actividades_campanyas_ibfk_1` FOREIGN KEY (`actividad_id`) REFERENCES `ci_actividades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ci_join_actividades_campanyas_ibfk_2` FOREIGN KEY (`campanya_id`) REFERENCES `ci_campanyas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ci_join_actividades_contactos`
--
ALTER TABLE `ci_join_actividades_contactos`
  ADD CONSTRAINT `ci_join_actividades_contactos_ibfk_1` FOREIGN KEY (`actividad_id`) REFERENCES `ci_actividades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ci_join_actividades_contactos_ibfk_2` FOREIGN KEY (`contacto_id`) REFERENCES `ci_contactos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ci_join_actividades_usuarios`
--
ALTER TABLE `ci_join_actividades_usuarios`
  ADD CONSTRAINT `ci_join_actividades_usuarios_ibfk_1` FOREIGN KEY (`actividad_id`) REFERENCES `ci_actividades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ci_join_actividades_usuarios_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `ci_usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ci_join_alertas_usuarios`
--
ALTER TABLE `ci_join_alertas_usuarios`
  ADD CONSTRAINT `ci_join_alertas_usuarios_ibfk_1` FOREIGN KEY (`alerta_id`) REFERENCES `ci_alertas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ci_join_alertas_usuarios_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `ci_usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ci_join_campanyas_campanyas_estados`
--
ALTER TABLE `ci_join_campanyas_campanyas_estados`
  ADD CONSTRAINT `ci_join_campanyas_campanyas_estados_ibfk_1` FOREIGN KEY (`campanya_id`) REFERENCES `ci_campanyas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ci_join_campanyas_campanyas_estados_ibfk_2` FOREIGN KEY (`campanyas_estado_id`) REFERENCES `ci_campanyas_estados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ci_join_campanyas_campanyas_tipos`
--
ALTER TABLE `ci_join_campanyas_campanyas_tipos`
  ADD CONSTRAINT `ci_join_campanyas_campanyas_tipos_ibfk_1` FOREIGN KEY (`campanya_id`) REFERENCES `ci_campanyas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ci_join_campanyas_campanyas_tipos_ibfk_2` FOREIGN KEY (`campanyas_tipo_id`) REFERENCES `ci_campanyas_tipos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ci_join_campanyas_usuarios`
--
ALTER TABLE `ci_join_campanyas_usuarios`
  ADD CONSTRAINT `ci_join_campanyas_usuarios_ibfk_1` FOREIGN KEY (`campanya_id`) REFERENCES `ci_campanyas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ci_join_contactos_contactos_email`
--
ALTER TABLE `ci_join_contactos_contactos_email`
  ADD CONSTRAINT `ci_join_contactos_contactos_email_ibfk_1` FOREIGN KEY (`contacto_id`) REFERENCES `ci_contactos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ci_join_contactos_contactos_email_ibfk_2` FOREIGN KEY (`contactos_email_id`) REFERENCES `ci_contactos_email` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ci_join_contactos_contactos_estados`
--
ALTER TABLE `ci_join_contactos_contactos_estados`
  ADD CONSTRAINT `ci_join_contactos_contactos_estados_ibfk_2` FOREIGN KEY (`contactos_estado_id`) REFERENCES `ci_contactos_estados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ci_join_perfiles_usuarios`
--
ALTER TABLE `ci_join_perfiles_usuarios`
  ADD CONSTRAINT `ci_join_perfiles_usuarios_ibfk_2` FOREIGN KEY (`perfil_id`) REFERENCES `ci_perfiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ci_join_perfiles_usuarios_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `ci_usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ci_join_usuarios_usuarios_estados`
--
ALTER TABLE `ci_join_usuarios_usuarios_estados`
  ADD CONSTRAINT `ci_join_usuarios_usuarios_estados_ibfk_2` FOREIGN KEY (`usuarios_estado_id`) REFERENCES `ci_usuarios_estados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ci_join_usuarios_usuarios_estados_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `ci_usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
