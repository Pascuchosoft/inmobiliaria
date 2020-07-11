-- phpMyAdmin SQL Dump
-- version 3.2.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-12-2010 a las 21:25:21
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
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE IF NOT EXISTS `imagenes` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_propiedad` int(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `extencion` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Volcar la base de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `id_propiedad`, `descripcion`, `extencion`) VALUES
(17, 43, 'koko', '.jpg'),
(16, 43, 'asas', '.jpg'),
(23, 70, 'volando', '.jpg');
