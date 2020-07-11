-- phpMyAdmin SQL Dump
-- version 3.2.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-12-2010 a las 21:26:16
-- Versión del servidor: 5.1.37
-- Versión de PHP: 5.2.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `inmobili`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE IF NOT EXISTS `visita` (
  `idVisita` int(4) NOT NULL AUTO_INCREMENT,
  `idVende` int(4) NOT NULL,
  `idCli` int(4) NOT NULL,
  `idProp` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `idEstado` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idVisita`),
  KEY `idVisita` (`idVisita`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcar la base de datos para la tabla `visita`
--

INSERT INTO `visita` (`idVisita`, `idVende`, `idCli`, `idProp`, `fecha`, `hora`, `idEstado`) VALUES
(1, 0, 6, 1, '2010-11-24', '15:30:00', 2),
(2, 0, 6, 5, '2010-11-25', '14:00:00', 2),
(15, 0, 6, 45, '0000-00-00', '00:00:00', 1),
(6, 0, 6, 38, '2010-11-27', '08:00:00', 2);
