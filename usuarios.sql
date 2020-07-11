-- phpMyAdmin SQL Dump
-- version 3.2.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-09-2010 a las 21:30:46
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
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsu` int(2) NOT NULL,
  `Nombre` varchar(15) NOT NULL,
  `Psw` varchar(6) NOT NULL,
  `idPerfil` int(4) NOT NULL,
  PRIMARY KEY (`idUsu`),
  KEY `idPerfil` (`idPerfil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsu`, `Nombre`, `Psw`, `idPerfil`) VALUES
(1, 'Marcelo', 'pepita', 2),
(2, 'Ana Clara', 'chau', 2),
(4, 'Vicente', 'cloro', 4),
(5, 'Maria', 'chau', 2),
(6, 'Ana Clara', 'jiji', 1),
(11, 'Juan Pelotini', 'jil', 3),
(14, 'Ganzo', '123', 3),
(9, 'Loco', '4321', 1),
(8, 'Paco', '1234', 1),
(7, 'Luis', '3490', 1),
(13, 'Marcelino', 'hola', 3),
(15, 'Gallinazo', '3456', 3),
(16, 'Jose', 'jose', 2),
(23, 'gervacio', 'artiga', 3),
(22, 'Paulina', 'luisi', 1),
(18, 'Jeniffer', 'hola', 3),
(27, 'Sonia Birriel', '1234', 3),
(20, 'Mario Benedeti', '1234', 3),
(26, 'Gabriel', '123', 1);
