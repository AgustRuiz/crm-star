-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-06-2014 a las 02:53:53
-- Versión del servidor: 5.5.37
-- Versión de PHP: 5.3.10-1ubuntu3.11

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `nif` (`nif`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `nombre`, `apellidos`, `nif`) VALUES
(1, 'Juan', 'Jiménez', NULL),
(2, 'Alberto', 'Ávila', NULL),
(3, 'Bárbara', 'Barcelona', NULL),
(4, 'Carlos', 'Cifuentes', NULL),
(5, 'Diego', 'Domínguez', NULL),
(6, 'Elena', 'Estévez', NULL),
(7, 'Fátima', 'Fernández', NULL),
(8, 'Gonzalo', 'González', NULL),
(9, 'Homer', 'Simpsom', NULL),
(10, 'Ignacio', 'Iglesias', NULL),
(11, 'Jorge', 'Jiménez', NULL),
(12, 'Kiko', 'Klamstein', NULL),
(13, 'Lucía', 'López', NULL),
(14, 'Mario', 'Martínez', NULL),
(15, 'Nuria', 'Navarro', NULL),
(16, 'Óscar', 'Oviedo', NULL),
(17, 'Pedro', 'Pérez', NULL),
(18, 'Quintina', 'Quesada', NULL),
(19, 'Rubén', 'Román', NULL),
(20, 'Sandra', 'Sánchez', NULL),
(21, 'Tomás', 'Tenorio', NULL),
(22, 'Úrsula', 'Uriade', NULL),
(23, 'Víctor', 'Valverde', NULL),
(24, 'William', 'Wilson', NULL),
(25, 'Xavier', 'Xabier', NULL),
(26, 'Yago', 'Yagüe', NULL),
(27, 'Zaina', 'Zamorano', NULL),
(71, 'Agustín', 'Ruiz Linares', '15510111S');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
