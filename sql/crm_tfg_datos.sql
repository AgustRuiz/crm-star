-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-08-2014 a las 01:36:15
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

--
-- Volcado de datos para la tabla `ci_actividades`
--

INSERT INTO `ci_actividades` (`id`, `asunto`, `inicio`, `fin`, `descripcion`, `resultado`) VALUES
(30, 'Actividad completa', '2014-09-24 11:30:00', '2014-09-24 11:30:00', 'Aquí está la descripción de la tarea realizada', 'Aquí está el resultado de la actividad realizada'),
(31, 'Actividad de Agustín', '2014-08-08 00:25:00', '2014-08-08 00:55:00', 'Correo electrónico a Agustín', ''),
(32, 'Otra', '2014-11-13 13:30:00', '2014-11-13 13:30:00', 'Descripción', ''),
(33, 'Otra más', '2014-05-14 13:32:00', '2014-05-14 14:02:00', 'asdf', ''),
(34, 'Aún estás a tiempo', '2014-08-08 13:56:00', '2014-08-08 14:26:00', 'fbfbf', '');

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

--
-- Volcado de datos para la tabla `ci_actividades_estados`
--

INSERT INTO `ci_actividades_estados` (`id`, `estado`, `estilo`) VALUES
(1, 'No iniciada', 'estado-actividades-noIniciada'),
(2, 'En progreso', 'estado-actividades-enProgreso'),
(3, 'Completada', 'estado-actividades-completada'),
(4, 'Pendiente información', 'estado-actividades-pendienteIn'),
(5, 'Aplazada', 'estado-actividades-aplazada'),
(6, 'Cancelada', 'estado-actividades-cancelada');

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

--
-- Volcado de datos para la tabla `ci_actividades_prioridades`
--

INSERT INTO `ci_actividades_prioridades` (`id`, `prioridad`, `estilo`, `estilo_icono`, `etiqueta_icono`) VALUES
(1, 'Baja', 'prioridad-actividades-baja', 'glyphicon glyphicon-circle-arrow-down prioridad-actividades-baja-icono', 'Prioridad baja'),
(2, 'Media', 'prioridad-actividades-media', '', 'Prioridad media'),
(3, 'Alta', 'prioridad-actividades-alta', 'glyphicon glyphicon-exclamation-sign prioridad-actividades-alta-icono', 'Prioridad alta');

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

--
-- Volcado de datos para la tabla `ci_actividades_tipos`
--

INSERT INTO `ci_actividades_tipos` (`id`, `tipo`, `estilo`) VALUES
(1, 'Llamada telefónica', 'tipo-actividades-llamada'),
(2, 'Correo electrónico', 'tipo-actividades-correo'),
(3, 'Carta', 'tipo-actividades-carta'),
(4, 'Fax', 'tipo-actividades-fax'),
(5, 'Tarea', 'tipo-actividades-tarea'),
(6, 'Reunión', 'tipo-actividades-reunion');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `ci_alertas`
--

INSERT INTO `ci_alertas` (`id`, `asunto`, `descripcion`, `fechaHora`, `emergente`, `visualizado`, `email`, `emailEnviado`) VALUES
(7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Praesent non mattis ante, ut tincidunt augue. Maecenas feugiat lorem mattis ornare dignissim. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec faucibus vel elit nec aliquam. Aenean quis ipsum vitae eros malesuada porta. Maecenas enim velit, eleifend vel sem at, fermentum ornare turpis. Duis facilisis lorem tortor, at faucibus tellus sollicitudin a. Integer eu metus nunc. Nam velit purus, viverra aliquet quam nec, imperdiet feugiat massa. Ut lobortis vulputate mauris. Praesent urna lectus, consequat vitae tellus sit amet, condimentum ultricies arcu. Donec vel dignissim tellus.', '2014-08-12 19:07:00', 1, 1, 1, 0),
(8, 'Hola', 'Si lees esto es que has entrado después de las 22:45 del martes 12 de agosto de 2014.<br />\n¡Qué suerte tienes!', '2014-08-12 22:45:00', 1, 1, 1, 0),
(9, 'Muy viejo', '', '2014-08-12 14:29:00', 1, 1, 0, 0),
(10, 'Aún tienes tiempo de atender esta alerta, así que date prisa', '', '2014-08-12 23:16:00', 1, 1, 0, 0),
(11, 'Para el lunes', '', '2014-08-12 14:14:00', 1, 1, 0, 0),
(12, 'Nueva alerta', 'Descripción de la alerta', '2014-08-11 03:11:00', 0, 0, 0, 0);

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

--
-- Volcado de datos para la tabla `ci_campanyas`
--

INSERT INTO `ci_campanyas` (`id`, `nombre`, `fechaInicio`, `fechaFin`, `objetivo`, `descripcion`) VALUES
(1, 'Campaña de Agustín', '2014-08-01', '2014-08-31', 'Objetivo de la campaña', 'Descripción de la campaña'),
(3, 'Campaña activa', '0000-00-00', '0000-00-00', '', ''),
(4, 'Campaña inactiva', '0000-00-00', '0000-00-00', '', ''),
(5, 'Campaña completada', '0000-00-00', '0000-00-00', '', ''),
(6, 'Campaña suspendida', '0000-00-00', '0000-00-00', '', ''),
(7, 'Campaña aplazada', '0000-00-00', '0000-00-00', '', ''),
(8, 'Campaña en planificación', '0000-00-00', '0000-00-00', '', '');

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

--
-- Volcado de datos para la tabla `ci_campanyas_estados`
--

INSERT INTO `ci_campanyas_estados` (`id`, `estado`, `estilo`) VALUES
(1, 'En planificación', 'estado-campanya-planificacion'),
(2, 'Activa', 'estado-campanya-activa'),
(3, 'Inactiva', 'estado-campanya-inactiva'),
(4, 'Completada', 'estado-campanya-completada'),
(5, 'Suspendida', 'estado-campanya-suspendida'),
(6, 'Aplazada', 'estado-campanya-aplazada');

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

--
-- Volcado de datos para la tabla `ci_campanyas_tipos`
--

INSERT INTO `ci_campanyas_tipos` (`id`, `tipo`, `estilo`) VALUES
(1, 'Ventas', 'tipo-campanya-ventas'),
(2, 'Correo', 'tipo-campanya-correo'),
(3, 'Email', 'tipo-campanya-email'),
(4, 'Web', 'tipo-campanya-web'),
(5, 'Radio', 'tipo-campanya-radio'),
(6, 'Televisión', 'tipo-campanya-television'),
(7, 'Boletín de noticias', 'tipo-campanya-noticias');

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

--
-- Volcado de datos para la tabla `ci_contactos`
--

INSERT INTO `ci_contactos` (`id`, `nombre`, `apellidos`, `nif`, `direccion`, `ciudad`, `provincia`, `cp`, `pais`, `telfOficina`, `telfMovil`, `fax`, `otrosDatos`) VALUES
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

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
  `estilo` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `estado` (`estado`,`estilo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `ci_contactos_estados`
--

INSERT INTO `ci_contactos_estados` (`id`, `estado`, `estilo`) VALUES
(3, 'Activo', 'estado-contacto-activo'),
(4, 'Agotado', 'estado-contacto-agotado'),
(1, 'No especificado', 'estado-contacto-indeterminado'),
(2, 'Potencial', 'estado-contacto-potencial');

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

--
-- Volcado de datos para la tabla `ci_join_actividades_actividades_estados`
--

INSERT INTO `ci_join_actividades_actividades_estados` (`id`, `actividad_id`, `actividades_estado_id`) VALUES
(14, 30, 1),
(15, 31, 1),
(16, 32, 1),
(17, 33, 1),
(18, 34, 1);

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

--
-- Volcado de datos para la tabla `ci_join_actividades_actividades_prioridades`
--

INSERT INTO `ci_join_actividades_actividades_prioridades` (`id`, `actividad_id`, `actividades_prioridad_id`) VALUES
(15, 30, 1),
(16, 31, 3),
(17, 32, 2),
(18, 33, 2),
(19, 34, 2);

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

--
-- Volcado de datos para la tabla `ci_join_actividades_actividades_tipos`
--

INSERT INTO `ci_join_actividades_actividades_tipos` (`id`, `actividad_id`, `actividades_tipo_id`) VALUES
(23, 30, 6),
(24, 31, 2),
(25, 32, 1),
(26, 33, 1),
(27, 34, 1);

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

--
-- Volcado de datos para la tabla `ci_join_actividades_campanyas`
--

INSERT INTO `ci_join_actividades_campanyas` (`id`, `actividad_id`, `campanya_id`) VALUES
(5, 30, 1),
(6, 32, 1),
(7, 34, 1);

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

--
-- Volcado de datos para la tabla `ci_join_actividades_contactos`
--

INSERT INTO `ci_join_actividades_contactos` (`id`, `actividad_id`, `contacto_id`) VALUES
(14, 30, 28),
(15, 31, 28),
(16, 32, 3),
(17, 33, 28),
(18, 34, 28);

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

--
-- Volcado de datos para la tabla `ci_join_actividades_usuarios`
--

INSERT INTO `ci_join_actividades_usuarios` (`id`, `actividad_id`, `usuario_id`) VALUES
(13, 30, 1),
(14, 31, 13),
(15, 32, 1),
(16, 33, 1),
(17, 34, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `ci_join_alertas_usuarios`
--

INSERT INTO `ci_join_alertas_usuarios` (`id`, `alerta_id`, `usuario_id`) VALUES
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 13);

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

--
-- Volcado de datos para la tabla `ci_join_campanyas_campanyas_estados`
--

INSERT INTO `ci_join_campanyas_campanyas_estados` (`id`, `campanya_id`, `campanyas_estado_id`) VALUES
(1, 1, 1),
(2, 3, 2),
(3, 4, 3),
(4, 5, 4),
(5, 6, 5),
(6, 7, 6),
(7, 8, 1);

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

--
-- Volcado de datos para la tabla `ci_join_campanyas_campanyas_tipos`
--

INSERT INTO `ci_join_campanyas_campanyas_tipos` (`id`, `campanya_id`, `campanyas_tipo_id`) VALUES
(1, 1, 4),
(2, 3, 1),
(3, 4, 3),
(4, 5, 4),
(5, 6, 5),
(6, 7, 6),
(7, 8, 7);

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

--
-- Volcado de datos para la tabla `ci_join_campanyas_usuarios`
--

INSERT INTO `ci_join_campanyas_usuarios` (`id`, `campanya_id`, `usuario_id`) VALUES
(8, 1, 13),
(9, 3, 13),
(10, 4, 1),
(11, 5, 1),
(12, 6, 1),
(13, 7, 1),
(14, 8, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=89 ;

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
(87, 101, 1),
(88, 29, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `ci_join_perfiles_usuarios`
--

INSERT INTO `ci_join_perfiles_usuarios` (`id`, `usuario_id`, `perfil_id`) VALUES
(1, 1, 1),
(2, 13, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `ci_perfiles`
--

INSERT INTO `ci_perfiles` (`id`, `nombre`, `contactos_listar`, `contactos_crear`, `contactos_editar`, `contactos_eliminar`, `campanyas_listar_todas`, `campanyas_listar_propias`, `campanyas_crear`, `campanyas_editar`, `campanyas_eliminar`, `actividades_listar_todas`, `actividades_listar_propias`, `actividades_crear_propias`, `actividades_editar_propias`, `actividades_eliminar_propias`, `actividades_crear_todas`, `actividades_editar_todas`, `actividades_eliminar_todas`, `usuarios_listar`, `usuarios_crear`, `usuarios_editar`, `usuarios_eliminar`) VALUES
(1, 'Administración', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
