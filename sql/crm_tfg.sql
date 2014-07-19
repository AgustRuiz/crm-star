-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-07-2014 a las 22:50:31
-- Versión del servidor: 5.5.37
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
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE IF NOT EXISTS `actividades` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `inicio` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `tipo` int(10) unsigned NOT NULL,
  `prioridad` int(10) unsigned NOT NULL,
  `estado` int(10) unsigned NOT NULL,
  `usuario` bigint(20) unsigned NOT NULL,
  `campanya` bigint(20) unsigned DEFAULT NULL,
  `contacto` bigint(20) unsigned NOT NULL,
  `descripcion` text COLLATE latin1_spanish_ci NOT NULL,
  `resultado` text COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `prioridad` (`prioridad`),
  KEY `estado` (`estado`),
  KEY `usuario` (`usuario`),
  KEY `campanya` (`campanya`),
  KEY `contacto` (`contacto`),
  KEY `tipo` (`tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=59 ;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id`, `nombre`, `inicio`, `fin`, `tipo`, `prioridad`, `estado`, `usuario`, `campanya`, `contacto`, `descripcion`, `resultado`) VALUES
(5, 'Primera actividad', '2014-07-21 12:30:00', '2014-07-21 13:00:00', 4, 1, 1, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(6, 'Primera actividad', '2014-07-21 12:30:00', '2014-07-21 13:00:00', 4, 2, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(7, 'Primera actividad', '2014-07-21 12:30:00', '2014-07-21 13:00:00', 4, 3, 3, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(8, 'Primera actividad', '2014-07-21 12:30:00', '2014-07-21 13:00:00', 4, 3, 4, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(9, 'Primera actividad', '2014-07-21 12:30:00', '2014-07-21 13:00:00', 4, 3, 5, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(10, 'Primera actividad', '2014-07-21 12:30:00', '2014-07-21 13:00:00', 4, 3, 6, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(11, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(12, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(13, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(14, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(15, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(16, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(17, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(18, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(19, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(20, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(21, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(22, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(23, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(24, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(29, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(30, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(31, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(32, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(33, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(34, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(35, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(36, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(37, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(38, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(39, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(40, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(41, 'Primera actividad', '2014-07-18 20:53:00', '2014-07-18 21:23:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(42, 'Primera actividad', '2014-07-18 20:53:00', '2014-07-18 21:23:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(43, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(44, 'Primera actividad', '2014-07-19 13:30:00', '2014-07-19 14:00:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(45, 'Primera actividad', '1970-01-01 01:33:00', '1970-01-01 01:33:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(46, 'Primera actividad', '1970-01-01 01:33:00', '1970-01-01 01:33:00', 4, 3, 2, 13, 1, 9, 'Ésta es la primera actividad que registro', 'El resultado no lo sabremos hasta que no comprobemos que se inserta correctamente'),
(47, 'Actividad nueva 2', '2014-07-19 20:57:00', '2014-07-19 21:27:00', 1, 2, 1, 13, 1, 1, 'asdfasdgfasdg', 'htrhdfndftndfgn'),
(48, 'Actividad nueva 2', '2014-07-19 20:57:00', '2014-07-19 21:27:00', 1, 2, 1, 13, 1, 1, 'asdfasdgfasdg', 'htrhdfndftndfgn'),
(49, 'Actividad nueva 2', '2014-07-19 20:57:00', '2014-07-19 21:27:00', 1, 2, 1, 13, 1, 1, 'asdfasdgfasdg', 'htrhdfndftndfgn'),
(50, 'Actividad nueva 2', '2014-07-19 20:57:00', '2014-07-19 21:27:00', 1, 2, 1, 13, 1, 1, 'asdfasdgfasdg', 'htrhdfndftndfgn'),
(51, 'Actividad nueva 2', '2014-07-19 20:57:00', '2014-07-19 21:27:00', 1, 2, 1, 13, 1, 1, 'asdfasdgfasdg', 'htrhdfndftndfgn'),
(52, 'Actividad nueva 2', '2014-07-19 20:57:00', '2014-07-19 21:27:00', 1, 2, 1, 13, 1, 1, 'asdfasdgfasdg', 'htrhdfndftndfgn'),
(53, 'Actividad nueva 2', '2014-07-19 20:57:00', '2014-07-19 21:27:00', 1, 2, 1, 13, 1, 1, 'asdfasdgfasdg', 'htrhdfndftndfgn'),
(54, 'Actividad nueva 2', '2014-07-19 20:57:00', '2014-07-19 21:27:00', 1, 2, 1, 13, 1, 1, 'asdfasdgfasdg', 'htrhdfndftndfgn'),
(55, 'Actividad nueva 2', '2014-07-19 20:57:00', '2014-07-19 21:27:00', 4, 3, 3, 13, 1, 1, 'asdfasdgfasdg', 'htrhdfndftndfgn'),
(56, 'Actividad nueva 2', '2014-07-19 20:57:00', '2014-07-19 21:27:00', 4, 3, 3, 13, 1, 1, 'asdfasdgfasdg', 'htrhdfndftndfgn'),
(57, 'Actividad jorl', '2014-07-19 13:10:00', '2014-07-19 13:40:00', 4, 3, 3, 13, NULL, 1, 'asdfasdgfasdg', 'htrhdfndftndfgn'),
(58, 'Actividad jorl', '2014-07-19 13:10:00', '2014-07-19 13:40:00', 4, 3, 3, 13, NULL, 1, 'asdfasdgfasdg', 'htrhdfndftndfgn');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades_estado`
--

CREATE TABLE IF NOT EXISTS `actividades_estado` (
  `id_estado` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `estilo_estado` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `actividades_estado`
--

INSERT INTO `actividades_estado` (`id_estado`, `estado`, `estilo_estado`) VALUES
(1, 'No iniciada', 'estado-actividades-noIniciada'),
(2, 'En progreso', 'estado-actividades-enProgreso'),
(3, 'Completada', 'estado-actividades-completada'),
(4, 'Pendiente información', 'estado-actividades-pendienteIn'),
(5, 'Aplazada', 'estado-actividades-aplazada'),
(6, 'Cancelada', 'estado-actividades-cancelada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades_prioridad`
--

CREATE TABLE IF NOT EXISTS `actividades_prioridad` (
  `id_prioridad` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prioridad` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `estilo_prioridad` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_prioridad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `actividades_prioridad`
--

INSERT INTO `actividades_prioridad` (`id_prioridad`, `prioridad`, `estilo_prioridad`) VALUES
(1, 'Baja', 'prioridad-actividades-baja'),
(2, 'Media', 'prioridad-actividades-media'),
(3, 'Alta', 'prioridad-actividades-alta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades_tipo`
--

CREATE TABLE IF NOT EXISTS `actividades_tipo` (
  `id_tipo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `estilo_tipo` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `actividades_tipo`
--

INSERT INTO `actividades_tipo` (`id_tipo`, `tipo`, `estilo_tipo`) VALUES
(1, 'Llamada telefónica', 'tipo-actividades-llamada'),
(2, 'Correo electrónico', 'tipo-actividades-correo'),
(3, 'Carta', 'tipo-actividades-carta'),
(4, 'Fax', 'tipo-actividades-fax'),
(5, 'Tarea', 'tipo-actividades-tarea'),
(6, 'Reunión', 'tipo-actividades-reunion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campanyas`
--

CREATE TABLE IF NOT EXISTS `campanyas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL DEFAULT '0000-00-00',
  `estado` int(10) unsigned NOT NULL,
  `tipo` int(10) unsigned NOT NULL,
  `objetivo` text COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` text COLLATE latin1_spanish_ci NOT NULL,
  `usuario` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `estado` (`estado`),
  KEY `tipo` (`tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `campanyas`
--

INSERT INTO `campanyas` (`id`, `nombre`, `fechaInicio`, `fechaFin`, `estado`, `tipo`, `objetivo`, `descripcion`, `usuario`) VALUES
(1, 'Campaña de Agustín', '0000-00-00', '0000-00-00', 4, 1, '', '', 13),
(3, 'Campaña sin asignar', '0000-00-00', '0000-00-00', 1, 1, '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campanyas_estado`
--

CREATE TABLE IF NOT EXISTS `campanyas_estado` (
  `id_estado` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `estilo_estado` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `campanyas_estado`
--

INSERT INTO `campanyas_estado` (`id_estado`, `estado`, `estilo_estado`) VALUES
(1, 'En planificación', 'estado-campanya-planificacion'),
(2, 'Activa', 'estado-campanya-activa'),
(3, 'Inactiva', 'estado-campanya-inactiva'),
(4, 'Completada', 'estado-campanya-completada'),
(5, 'Suspendida', 'estado-campanya-suspendida'),
(6, 'Aplazada', 'estado-contacto-aplazada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campanyas_tipo`
--

CREATE TABLE IF NOT EXISTS `campanyas_tipo` (
  `id_tipo` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `estilo_tipo` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `campanyas_tipo`
--

INSERT INTO `campanyas_tipo` (`id_tipo`, `tipo`, `estilo_tipo`) VALUES
(1, 'Ventas', 'tipo-campanya-ventas'),
(2, 'Correo', 'tipo-campanya-correo'),
(3, 'Email', 'tipo-campanya-email'),
(4, 'Web', 'tipo-campanya-web'),
(5, 'Radio', 'tipo-campanya-radio'),
(6, 'Televisión', 'tipo-campanya-television'),
(7, 'Boletín de noticias', 'tipo-campanya-noticias');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `nombre`, `apellidos`, `nif`, `id_estado`, `direccion`, `ciudad`, `provincia`, `cp`, `pais`, `telfOficina`, `telfMovil`, `fax`, `otrosDatos`) VALUES
(1, 'Juan', 'Jiménez', NULL, 2, '', '', '', '', '', '', '', '', ''),
(2, 'Alberto', 'Ávila', NULL, 1, '', '', '', '', '', '', '', '', ''),
(3, 'Bárbara', 'Barcelona', NULL, 3, '', '', '', '', '', '', '', '', ''),
(4, 'Carlos', 'Cifuentes', NULL, 1, '', '', '', '', '', '', '', '', ''),
(5, 'Diego', 'Domínguez', NULL, 1, '', '', '', '', '', '', '', '', ''),
(6, 'Elena', 'Estévez', NULL, 3, '', '', '', '', '', '', '', '', ''),
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
(28, 'Agustín', 'Ruiz Linares', '15510111S', 2, '', '', '', '', '', '', '', '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `contactos_correos`
--

INSERT INTO `contactos_correos` (`id`, `id_contacto`, `correo`, `principal`, `noValido`) VALUES
(1, 28, 'agustinruizlinares@gmail.com', 1, 0),
(2, 28, 'agustinruizlinares@hotmail.com', 0, 1),
(3, 28, 'arl00029@red.ujaen.es', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos_estado`
--

CREATE TABLE IF NOT EXISTS `contactos_estado` (
  `id_estado` int(10) unsigned NOT NULL,
  `estado` varchar(30) NOT NULL,
  `estilo_estado` varchar(30) NOT NULL,
  PRIMARY KEY (`id_estado`),
  UNIQUE KEY `estado` (`estado`,`estilo_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contactos_estado`
--

INSERT INTO `contactos_estado` (`id_estado`, `estado`, `estilo_estado`) VALUES
(2, 'Activo', 'estado-contacto-activo'),
(3, 'Agotado', 'estado-contacto-agotado'),
(0, 'No especificado', 'estado-contacto-indeterminado'),
(1, 'Potencial', 'estado-contacto-potencial');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nick`, `password`, `nombre`, `apellidos`, `nif`, `email`, `telfOficina`, `telfMovil`, `fax`, `otrosDatos`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Administrador', '', NULL, 'arl00029@red.ujaen.es', '', '', '', ''),
(13, 'aruiz', 'e10adc3949ba59abbe56e057f20f883e', 'Agustín', 'Ruiz Linares', '15510111S', 'agustinruizlinares@gmail.com', '999999999', '666666666', '', 'Primer usuario'),
(14, 'uno', 'e10adc3949ba59abbe56e057f20f883e', 'Uno', '', NULL, 'uno@uno.com', '', '', '', ''),
(15, 'dos', 'e10adc3949ba59abbe56e057f20f883e', 'Dos', '', NULL, 'dos@dos.com', '', '', '', ''),
(16, 'tres', 'e10adc3949ba59abbe56e057f20f883e', 'tres', '', NULL, 'tres@tres.com', '', '', '', ''),
(17, 'cuatro', 'e10adc3949ba59abbe56e057f20f883e', 'cuatro', '', NULL, 'cuatro@cuatro.com', '', '', '', ''),
(18, 'cinco', 'e10adc3949ba59abbe56e057f20f883e', 'cinco', '', NULL, 'cinco@cinco.com', '', '', '', ''),
(19, 'seis', 'e10adc3949ba59abbe56e057f20f883e', 'seis', '', NULL, 'seis@seis.com', '', '', '', ''),
(20, 'siete', 'e10adc3949ba59abbe56e057f20f883e', 'siete', '', NULL, 'siete@siete.com', '', '', '', ''),
(21, 'ocho', 'e10adc3949ba59abbe56e057f20f883e', 'ocho', '', NULL, 'ocho@ocho.com', '', '', '', ''),
(22, 'nueve', 'e10adc3949ba59abbe56e057f20f883e', 'nueve', '', NULL, 'nueve@nueve.com', '', '', '', ''),
(23, 'diez', 'e10adc3949ba59abbe56e057f20f883e', 'diez', '', NULL, 'diez@diez.com', '', '', '', ''),
(24, 'once', 'e10adc3949ba59abbe56e057f20f883e', 'once', '', NULL, 'once@once.com', '', '', '', ''),
(25, 'doce', 'e10adc3949ba59abbe56e057f20f883e', 'doce', '', NULL, 'doce@doce.com', '', '', '', ''),
(26, 'trece', 'e10adc3949ba59abbe56e057f20f883e', 'trece', '', NULL, 'trece@trece.com', '', '', '', ''),
(27, 'catorce', 'e10adc3949ba59abbe56e057f20f883e', 'catorce', '', NULL, 'catorce@catorce.com', '', '', '', ''),
(28, 'quince', 'e10adc3949ba59abbe56e057f20f883e', 'quince', '', NULL, 'quince@quince.com', '', '', '', '');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `actividades_ibfk_2` FOREIGN KEY (`campanya`) REFERENCES `campanyas` (`id`),
  ADD CONSTRAINT `actividades_ibfk_3` FOREIGN KEY (`contacto`) REFERENCES `contactos` (`id`),
  ADD CONSTRAINT `actividades_ibfk_4` FOREIGN KEY (`prioridad`) REFERENCES `actividades_prioridad` (`id_prioridad`),
  ADD CONSTRAINT `actividades_ibfk_5` FOREIGN KEY (`estado`) REFERENCES `actividades_estado` (`id_estado`),
  ADD CONSTRAINT `actividades_ibfk_6` FOREIGN KEY (`tipo`) REFERENCES `actividades_tipo` (`id_tipo`);

--
-- Filtros para la tabla `campanyas`
--
ALTER TABLE `campanyas`
  ADD CONSTRAINT `campanyas_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `campanyas_estado` (`id_estado`),
  ADD CONSTRAINT `campanyas_ibfk_2` FOREIGN KEY (`tipo`) REFERENCES `campanyas_tipo` (`id_tipo`);

--
-- Filtros para la tabla `contactos_correos`
--
ALTER TABLE `contactos_correos`
  ADD CONSTRAINT `contactos_correos_ibfk_1` FOREIGN KEY (`id_contacto`) REFERENCES `contactos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
