-- phpMyAdmin SQL Dump
-- version 3.2.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-09-2010 a las 22:01:05
-- Versión del servidor: 5.1.37
-- Versión de PHP: 5.2.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `video`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gerenteid`
--

CREATE TABLE IF NOT EXISTS `gerenteid` (
  `idUsu` int(4) DEFAULT NULL,
  `idPerf` int(4) DEFAULT NULL,
  `idPeli` int(4) DEFAULT NULL,
  UNIQUE KEY `idUsu` (`idUsu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `gerenteid`
--

INSERT INTO `gerenteid` (`idUsu`, `idPerf`, `idPeli`) VALUES
(1, 1, 0),
(2, 2, 0),
(3, 3, 0),
(4, 4, 0),
(25, 0, 0),
(0, 0, 4),
(NULL, NULL, 5),
(NULL, NULL, 6),
(NULL, NULL, 7),
(NULL, NULL, 8),
(NULL, NULL, 9),
(26, NULL, NULL),
(27, NULL, NULL);
