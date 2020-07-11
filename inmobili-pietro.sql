-- phpMyAdmin SQL Dump
-- version 2.6.4-pl4
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 18-11-2010 a las 22:44:40
-- Versión del servidor: 5.0.16
-- Versión de PHP: 5.1.1
-- 
-- Base de datos: `inmobili`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cli_prop`
-- 

CREATE TABLE `cli_prop` (
  `idProp` int(2) NOT NULL,
  `idCli` int(2) NOT NULL,
  PRIMARY KEY  (`idProp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `cli_prop`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cli_realiza`
-- 

CREATE TABLE `cli_realiza` (
  `idPreg` int(2) NOT NULL,
  `idUsu` int(2) NOT NULL,
  `fecha` date NOT NULL,
  `texto` varchar(100) NOT NULL,
  PRIMARY KEY  (`idPreg`,`idUsu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `cli_realiza`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cli_selecciona`
-- 

CREATE TABLE `cli_selecciona` (
  `idProp` int(2) NOT NULL,
  `idCli` int(2) NOT NULL,
  PRIMARY KEY  (`idProp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `cli_selecciona`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `comodidades`
-- 

CREATE TABLE `comodidades` (
  `idComo` int(2) NOT NULL,
  `comodidad` varchar(20) NOT NULL,
  PRIMARY KEY  (`idComo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `comodidades`
-- 

INSERT INTO `comodidades` VALUES (1, 'dormitorios');
INSERT INTO `comodidades` VALUES (2, 'garaje');
INSERT INTO `comodidades` VALUES (3, 'patio');
INSERT INTO `comodidades` VALUES (4, 'jardÃ­n');
INSERT INTO `comodidades` VALUES (5, 'aire acondicionado');
INSERT INTO `comodidades` VALUES (6, 'metros cuadrados');
INSERT INTO `comodidades` VALUES (7, 'alarma');
INSERT INTO `comodidades` VALUES (8, 'parrillero');
INSERT INTO `comodidades` VALUES (9, 'Estufa a LeÃ±a');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `due_prop`
-- 

CREATE TABLE `due_prop` (
  `idDue` int(4) NOT NULL,
  `idProp` int(4) NOT NULL,
  PRIMARY KEY  (`idProp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `due_prop`
-- 

INSERT INTO `due_prop` VALUES (1, 23);
INSERT INTO `due_prop` VALUES (1, 26);
INSERT INTO `due_prop` VALUES (1, 27);
INSERT INTO `due_prop` VALUES (1, 28);
INSERT INTO `due_prop` VALUES (1, 29);
INSERT INTO `due_prop` VALUES (3, 30);
INSERT INTO `due_prop` VALUES (1, 31);
INSERT INTO `due_prop` VALUES (1, 34);
INSERT INTO `due_prop` VALUES (4, 35);
INSERT INTO `due_prop` VALUES (5, 36);
INSERT INTO `due_prop` VALUES (4, 37);
INSERT INTO `due_prop` VALUES (2, 38);
INSERT INTO `due_prop` VALUES (4, 39);
INSERT INTO `due_prop` VALUES (2, 40);
INSERT INTO `due_prop` VALUES (6, 41);
INSERT INTO `due_prop` VALUES (6, 42);
INSERT INTO `due_prop` VALUES (7, 43);
INSERT INTO `due_prop` VALUES (7, 44);
INSERT INTO `due_prop` VALUES (2, 45);
INSERT INTO `due_prop` VALUES (8, 46);
INSERT INTO `due_prop` VALUES (9, 47);
INSERT INTO `due_prop` VALUES (6, 48);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `duenio`
-- 

CREATE TABLE `duenio` (
  `idDue` int(2) NOT NULL auto_increment,
  `dir` varchar(50) NOT NULL,
  `tel` int(9) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `CI` varchar(9) NOT NULL,
  PRIMARY KEY  (`idDue`),
  UNIQUE KEY `CI` (`CI`),
  KEY `idDue` (`idDue`),
  KEY `idDue_2` (`idDue`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- 
-- Volcar la base de datos para la tabla `duenio`
-- 

INSERT INTO `duenio` VALUES (1, 'mexico 4789', 26003021, 'jilun@tarado.com', 'Julian', 'Julian', '2638350-9');
INSERT INTO `duenio` VALUES (2, 'vermejo 345', 23456780, 'canalla@vegerto.org', 'Vejerto', 'White', '7894556-9');
INSERT INTO `duenio` VALUES (3, 'piriaplolis', 3423434, 'sdfdfdf', 'virgilio', 'gutierrez', '1235456-0');
INSERT INTO `duenio` VALUES (4, '', 32434123, 'dfasdfdfd', 'Maria', 'Parodi', '658974-2');
INSERT INTO `duenio` VALUES (6, '', 341324, 'dfdfadfaf', 'Luis', 'Dias', '987456-1');
INSERT INTO `duenio` VALUES (7, '', 1324134, 'fdfadffdl', 'Juan', 'Zapata', '654189-2');
INSERT INTO `duenio` VALUES (8, '', 23432434, 'dfdsfdfd', 'Julian', 'Julian', '7856-5');
INSERT INTO `duenio` VALUES (9, '', 34343434, 'dsfdfdfdfdf', 'Maria', 'Parodi', '34343-3');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `encu_opc`
-- 

CREATE TABLE `encu_opc` (
  `idEnc` int(2) NOT NULL,
  `idPpc` int(2) NOT NULL,
  PRIMARY KEY  (`idEnc`,`idPpc`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `encu_opc`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `encuesta`
-- 

CREATE TABLE `encuesta` (
  `idEncu` int(2) NOT NULL,
  `tema` varchar(100) NOT NULL,
  PRIMARY KEY  (`idEncu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `encuesta`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `foro`
-- 

CREATE TABLE `foro` (
  `idForo` int(2) NOT NULL,
  `tema` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `foro`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `gerenteid`
-- 

CREATE TABLE `gerenteid` (
  `idUsu` int(4) NOT NULL,
  `idPerf` int(4) NOT NULL,
  `idPeli` int(4) NOT NULL,
  `idProp` int(4) NOT NULL,
  `idDue` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `gerenteid`
-- 

INSERT INTO `gerenteid` VALUES (41, 0, 0, 0, 0);
INSERT INTO `gerenteid` VALUES (0, 4, 0, 0, 0);
INSERT INTO `gerenteid` VALUES (0, 0, 0, 35, 4);
INSERT INTO `gerenteid` VALUES (0, 0, 0, 36, 5);
INSERT INTO `gerenteid` VALUES (0, 0, 0, 33, 0);
INSERT INTO `gerenteid` VALUES (0, 0, 0, 0, 3);
INSERT INTO `gerenteid` VALUES (42, 0, 0, 0, 0);
INSERT INTO `gerenteid` VALUES (0, 0, 0, 34, 0);
INSERT INTO `gerenteid` VALUES (0, 0, 0, 37, 0);
INSERT INTO `gerenteid` VALUES (0, 0, 0, 38, 0);
INSERT INTO `gerenteid` VALUES (0, 0, 0, 39, 0);
INSERT INTO `gerenteid` VALUES (0, 0, 0, 40, 0);
INSERT INTO `gerenteid` VALUES (0, 0, 0, 41, 6);
INSERT INTO `gerenteid` VALUES (0, 0, 0, 42, 0);
INSERT INTO `gerenteid` VALUES (0, 0, 0, 43, 7);
INSERT INTO `gerenteid` VALUES (0, 0, 0, 44, 0);
INSERT INTO `gerenteid` VALUES (0, 0, 0, 45, 0);
INSERT INTO `gerenteid` VALUES (0, 0, 0, 46, 8);
INSERT INTO `gerenteid` VALUES (0, 0, 0, 47, 9);
INSERT INTO `gerenteid` VALUES (0, 0, 0, 48, 0);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `inmobiliaria`
-- 

CREATE TABLE `inmobiliaria` (
  `nombre` varchar(15) NOT NULL,
  `dir` varchar(30) NOT NULL,
  `tel` int(9) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sitio` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `inmobiliaria`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `opcion`
-- 

CREATE TABLE `opcion` (
  `idOpc` int(2) NOT NULL,
  `desc` varchar(12) NOT NULL,
  PRIMARY KEY  (`idOpc`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `opcion`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `operacion`
-- 

CREATE TABLE `operacion` (
  `idOpera` int(1) NOT NULL,
  `operacion` varchar(15) NOT NULL,
  PRIMARY KEY  (`idOpera`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `operacion`
-- 

INSERT INTO `operacion` VALUES (1, 'Venta');
INSERT INTO `operacion` VALUES (2, 'Alquiler');
INSERT INTO `operacion` VALUES (3, 'Permuta');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `perfiles`
-- 

CREATE TABLE `perfiles` (
  `idPerfil` int(2) NOT NULL,
  `nomperfil` varchar(15) NOT NULL,
  PRIMARY KEY  (`idPerfil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `perfiles`
-- 

INSERT INTO `perfiles` VALUES (1, 'Administrador');
INSERT INTO `perfiles` VALUES (2, 'Vendedor');
INSERT INTO `perfiles` VALUES (3, 'Cliente');
INSERT INTO `perfiles` VALUES (4, 'Limpieza');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pregunta`
-- 

CREATE TABLE `pregunta` (
  `idPreg` int(2) NOT NULL,
  `texto` int(100) NOT NULL,
  `contador` int(4) NOT NULL,
  PRIMARY KEY  (`idPreg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `pregunta`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `prop_comodi`
-- 

CREATE TABLE `prop_comodi` (
  `idProp` int(2) NOT NULL,
  `idComo` int(2) NOT NULL,
  `cant` int(2) NOT NULL,
  PRIMARY KEY  (`idProp`,`idComo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `prop_comodi`
-- 

INSERT INTO `prop_comodi` VALUES (1, 1, 2);
INSERT INTO `prop_comodi` VALUES (1, 3, 1);
INSERT INTO `prop_comodi` VALUES (1, 6, 70);
INSERT INTO `prop_comodi` VALUES (1, 8, 1);
INSERT INTO `prop_comodi` VALUES (2, 1, 3);
INSERT INTO `prop_comodi` VALUES (2, 3, 1);
INSERT INTO `prop_comodi` VALUES (2, 6, 80);
INSERT INTO `prop_comodi` VALUES (2, 9, 2);
INSERT INTO `prop_comodi` VALUES (2, 2, 1);
INSERT INTO `prop_comodi` VALUES (3, 1, 4);
INSERT INTO `prop_comodi` VALUES (3, 2, 1);
INSERT INTO `prop_comodi` VALUES (3, 3, 1);
INSERT INTO `prop_comodi` VALUES (3, 4, 1);
INSERT INTO `prop_comodi` VALUES (3, 6, 82);
INSERT INTO `prop_comodi` VALUES (3, 8, 1);
INSERT INTO `prop_comodi` VALUES (3, 9, 1);
INSERT INTO `prop_comodi` VALUES (27, 4, 1);
INSERT INTO `prop_comodi` VALUES (28, 4, 1);
INSERT INTO `prop_comodi` VALUES (28, 5, 3);
INSERT INTO `prop_comodi` VALUES (28, 6, 78);
INSERT INTO `prop_comodi` VALUES (28, 2, 1);
INSERT INTO `prop_comodi` VALUES (28, 7, 1);
INSERT INTO `prop_comodi` VALUES (28, 8, 2);
INSERT INTO `prop_comodi` VALUES (28, 9, 3);
INSERT INTO `prop_comodi` VALUES (28, 3, 1);
INSERT INTO `prop_comodi` VALUES (28, 1, 3);
INSERT INTO `prop_comodi` VALUES (29, 1, 1);
INSERT INTO `prop_comodi` VALUES (30, 1, 4);
INSERT INTO `prop_comodi` VALUES (30, 2, 343);
INSERT INTO `prop_comodi` VALUES (30, 7, 3);
INSERT INTO `prop_comodi` VALUES (31, 1, 1);
INSERT INTO `prop_comodi` VALUES (32, 1, 3);
INSERT INTO `prop_comodi` VALUES (33, 1, 4);
INSERT INTO `prop_comodi` VALUES (34, 1, 4);
INSERT INTO `prop_comodi` VALUES (35, 1, 3);
INSERT INTO `prop_comodi` VALUES (36, 1, 1);
INSERT INTO `prop_comodi` VALUES (37, 1, 3);
INSERT INTO `prop_comodi` VALUES (38, 1, 0);
INSERT INTO `prop_comodi` VALUES (39, 1, 0);
INSERT INTO `prop_comodi` VALUES (40, 1, 0);
INSERT INTO `prop_comodi` VALUES (41, 1, 4);
INSERT INTO `prop_comodi` VALUES (42, 1, 3);
INSERT INTO `prop_comodi` VALUES (43, 1, 5);
INSERT INTO `prop_comodi` VALUES (44, 1, 2);
INSERT INTO `prop_comodi` VALUES (45, 1, 5);
INSERT INTO `prop_comodi` VALUES (46, 1, 2);
INSERT INTO `prop_comodi` VALUES (47, 1, 4);
INSERT INTO `prop_comodi` VALUES (48, 1, 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `propiedades`
-- 

CREATE TABLE `propiedades` (
  `idProp` int(2) NOT NULL,
  `idDue` int(4) NOT NULL,
  `dir` varchar(30) NOT NULL,
  `precio` int(7) NOT NULL,
  `idZona` int(2) NOT NULL,
  `idTipo` int(1) NOT NULL,
  `idOpera` int(1) NOT NULL,
  `dormitorios` int(1) NOT NULL,
  PRIMARY KEY  (`idProp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `propiedades`
-- 

INSERT INTO `propiedades` VALUES (1, 3, 'Palermo 5685 apto 041', 80000, 2, 2, 1, 2);
INSERT INTO `propiedades` VALUES (2, 3, 'Casinoni 1084 apto 5', 60000, 7, 2, 1, 3);
INSERT INTO `propiedades` VALUES (3, 1, 'Candelria 4598', 70000, 3, 1, 2, 4);
INSERT INTO `propiedades` VALUES (4, 2, 'Juan Paulier 1456', 50000, 7, 1, 1, 2);
INSERT INTO `propiedades` VALUES (5, 4, 'Candelaria 3256 apto 02', 60000, 3, 2, 2, 3);
INSERT INTO `propiedades` VALUES (6, 0, 'Comercio 1152', 70000, 5, 1, 1, 4);
INSERT INTO `propiedades` VALUES (7, 3, 'Guayabo 1478 apto 5', 70000, 9, 2, 2, 3);
INSERT INTO `propiedades` VALUES (8, 0, 'Berro 5893', 110000, 6, 2, 1, 4);
INSERT INTO `propiedades` VALUES (10, 0, 'San Salvador 2456', 35000, 8, 1, 1, 2);
INSERT INTO `propiedades` VALUES (13, 0, 'la perinola', 456789, 1, 1, 1, 1);
INSERT INTO `propiedades` VALUES (14, 0, 'fgfdgdfg', 243545, 1, 1, 1, 1);
INSERT INTO `propiedades` VALUES (15, 0, 'hgfhdghghgh', 45245, 2, 2, 2, 2);
INSERT INTO `propiedades` VALUES (16, 0, 'jklghjknmn', 67890, 3, 3, 3, 3);
INSERT INTO `propiedades` VALUES (17, 0, 'hgnvbvbvbvcb', 45689, 1, 1, 1, 1);
INSERT INTO `propiedades` VALUES (18, 0, 'fadsfdfxcxzfdf', 67890, 1, 1, 1, 1);
INSERT INTO `propiedades` VALUES (19, 0, 'dfdfdfadfdfdf', 43567, 1, 1, 1, 1);
INSERT INTO `propiedades` VALUES (20, 0, 'dfgdfgfdgdfg', 456789, 2, 2, 3, 3);
INSERT INTO `propiedades` VALUES (21, 0, 'covadonga', 45678, 2, 1, 2, 3);
INSERT INTO `propiedades` VALUES (22, 0, 'belastiquÃ­ 2312', 34567, 4, 1, 2, 3);
INSERT INTO `propiedades` VALUES (23, 1, 'xxxxxxxxxx', 2147483647, 1, 1, 1, 1);
INSERT INTO `propiedades` VALUES (26, 1, 'rrrrrrrrrrrrrrrrrrrrrrrr', 123, 1, 1, 1, 5);
INSERT INTO `propiedades` VALUES (27, 1, 'qqqqqqqqqqqqqqq', 12323, 1, 1, 1, 3);
INSERT INTO `propiedades` VALUES (28, 1, 'zzzzzzzzzzzzzzzzzzzzz', 1234, 1, 1, 1, 3);
INSERT INTO `propiedades` VALUES (29, 1, 'qqqqqqqqqqqqq', 12, 1, 1, 1, 1);
INSERT INTO `propiedades` VALUES (30, 3, 'dsfdsfdf', 12323, 1, 1, 1, 3);
INSERT INTO `propiedades` VALUES (31, 1, 'dfdfdf', 23213, 3, 1, 1, 1);
INSERT INTO `propiedades` VALUES (33, 0, 'colina', 3343434, 5, 1, 1, 4);
INSERT INTO `propiedades` VALUES (34, 1, 'segovia', 232323, 1, 1, 1, 4);
INSERT INTO `propiedades` VALUES (35, 4, 'chimenea', 3212322, 1, 1, 1, 3);
INSERT INTO `propiedades` VALUES (36, 5, 'wwwwwwwwwww', 343434, 1, 1, 1, 1);
INSERT INTO `propiedades` VALUES (37, 4, 'fgfgfgfg', 78900, 2, 4, 1, 0);
INSERT INTO `propiedades` VALUES (38, 2, 'belastiquÃ­ 777', 4500, 6, 2, 1, 0);
INSERT INTO `propiedades` VALUES (39, 4, 'direccion', 123, 1, 4, 1, 0);
INSERT INTO `propiedades` VALUES (40, 2, 'tiene', 23434, 1, 4, 1, 0);
INSERT INTO `propiedades` VALUES (41, 6, 'terreno', 2134, 1, 4, 1, 0);
INSERT INTO `propiedades` VALUES (42, 6, 'enviar', 1232323, 3, 1, 2, 3);
INSERT INTO `propiedades` VALUES (43, 7, 'zapata', 3123, 6, 1, 1, 5);
INSERT INTO `propiedades` VALUES (44, 7, 'zapatero', 213213, 8, 1, 1, 2);
INSERT INTO `propiedades` VALUES (45, 2, 'white 1234', 12345, 1, 1, 3, 5);
INSERT INTO `propiedades` VALUES (46, 8, 'julian', 1232, 1, 1, 1, 2);
INSERT INTO `propiedades` VALUES (47, 9, 'Parodi', 4234435, 1, 1, 1, 4);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tipo`
-- 

CREATE TABLE `tipo` (
  `idTipo` int(1) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  PRIMARY KEY  (`idTipo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `tipo`
-- 

INSERT INTO `tipo` VALUES (1, 'Casa');
INSERT INTO `tipo` VALUES (2, 'Apartamento');
INSERT INTO `tipo` VALUES (3, 'Local');
INSERT INTO `tipo` VALUES (4, 'Terreno');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usu_comercia`
-- 

CREATE TABLE `usu_comercia` (
  `idVende` int(2) NOT NULL,
  `idCli` int(2) NOT NULL,
  `idProp` int(2) NOT NULL,
  `fecha_comer` date NOT NULL,
  `tipo` varchar(12) NOT NULL,
  PRIMARY KEY  (`fecha_comer`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `usu_comercia`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios`
-- 

CREATE TABLE `usuarios` (
  `idUsu` int(2) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellido` varchar(15) NOT NULL,
  `idPerfil` int(2) NOT NULL,
  `Psw` varchar(10) NOT NULL,
  `fech_nac` date NOT NULL,
  `dir` varchar(30) NOT NULL,
  `tel` int(9) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY  (`idUsu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `usuarios`
-- 

INSERT INTO `usuarios` VALUES (10, 'Pascuchina', '', 1, 'pascucho', '1970-10-14', 'Palermo 5685 apto 022', 26003901, 'marcelocambeiro@gmail.com');
INSERT INTO `usuarios` VALUES (3, 'Mota', '', 2, 'maconia', '1973-01-01', 'Costa Rica 1569', 26008974, 'macoÃ±ia@adinet.com.uy');
INSERT INTO `usuarios` VALUES (1, 'Marcelo', '', 2, 'pepita', '1985-09-15', 'VelastiquÃ­', 24897569, 'marcelo@playboy.com');
INSERT INTO `usuarios` VALUES (38, 'diablo', '', 1, '123', '0000-00-00', '', 0, '');
INSERT INTO `usuarios` VALUES (4, 'Vicente', '', 4, 'cloro', '0000-00-00', '', 0, '');
INSERT INTO `usuarios` VALUES (34, 'Lizzy', '', 1, 'jua', '0000-00-00', '', 0, '');
INSERT INTO `usuarios` VALUES (6, 'Ana Clara', '', 1, 'jiji', '0000-00-00', '', 0, '');
INSERT INTO `usuarios` VALUES (11, 'Juan Pelotini', '', 3, 'jil', '0000-00-00', '', 0, '');
INSERT INTO `usuarios` VALUES (28, 'Ganzo', '', 3, '123', '0000-00-00', '', 0, '');
INSERT INTO `usuarios` VALUES (9, 'Loco', '', 2, '4321', '0000-00-00', '', 0, '');
INSERT INTO `usuarios` VALUES (8, 'Paco', '', 1, '1234', '0000-00-00', '', 0, '');
INSERT INTO `usuarios` VALUES (7, 'Luis', '', 1, '3490', '0000-00-00', '', 0, '');
INSERT INTO `usuarios` VALUES (13, 'Marcelino', '', 3, 'hola', '0000-00-00', '', 0, '');
INSERT INTO `usuarios` VALUES (15, 'Gallinazo', '', 3, '3456', '0000-00-00', '', 0, '');
INSERT INTO `usuarios` VALUES (16, 'Jose', '', 2, 'jose', '0000-00-00', '', 0, '');
INSERT INTO `usuarios` VALUES (23, 'gervacio', '', 3, 'artiga', '0000-00-00', '', 0, '');
INSERT INTO `usuarios` VALUES (22, 'Paulina', '', 1, 'luisi', '0000-00-00', '', 0, '');
INSERT INTO `usuarios` VALUES (18, 'Jeniffer', '', 3, 'hola', '0000-00-00', '', 0, '');
INSERT INTO `usuarios` VALUES (27, 'Sonia Birriel', '', 3, '1234', '0000-00-00', '', 0, '');
INSERT INTO `usuarios` VALUES (20, 'Mario Benedeti', '', 3, '1234', '0000-00-00', '', 0, '');
INSERT INTO `usuarios` VALUES (26, 'Gabriel', '', 1, '123', '0000-00-00', '', 0, '');
INSERT INTO `usuarios` VALUES (30, 'Micaela', '', 3, '123', '0000-00-00', '', 0, '');
INSERT INTO `usuarios` VALUES (31, 'Julian', '', 3, '1234', '1974-10-15', 'Palermo 3456', 26008579, 'arcangelu@hotmail.com');
INSERT INTO `usuarios` VALUES (32, 'Mariela', '', 3, '1234', '0000-00-00', '', 0, '');
INSERT INTO `usuarios` VALUES (37, 'elnabo', '', 1, '123', '0000-00-00', '', 0, '');
INSERT INTO `usuarios` VALUES (39, 'Peter', '', 3, 'peter', '0000-00-00', '', 0, '');
INSERT INTO `usuarios` VALUES (40, 'Paul', '', 3, 'paul', '0000-00-00', '', 0, '');
INSERT INTO `usuarios` VALUES (41, 'Paulito', '', 3, 'paulito', '0000-00-00', '', 0, '');
INSERT INTO `usuarios` VALUES (42, 'Javier', '', 1, '123', '0000-00-00', '', 0, '');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `vende_agenda`
-- 

CREATE TABLE `vende_agenda` (
  `idVend` int(2) NOT NULL,
  `idCli` int(2) NOT NULL,
  `idProp` int(2) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY  (`idVend`,`idCli`,`idProp`,`fecha`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `vende_agenda`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `vende_foro`
-- 

CREATE TABLE `vende_foro` (
  `idForo` int(2) NOT NULL,
  `idUsu` int(2) NOT NULL,
  `fecha` date NOT NULL,
  `texto` varchar(200) NOT NULL,
  PRIMARY KEY  (`idForo`,`idUsu`,`texto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `vende_foro`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `vende_responde`
-- 

CREATE TABLE `vende_responde` (
  `idUsu` int(2) NOT NULL,
  `idPreg` int(2) NOT NULL,
  `fech_resp` date NOT NULL,
  `texto` date NOT NULL,
  PRIMARY KEY  (`idUsu`,`idPreg`,`texto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `vende_responde`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `voto`
-- 

CREATE TABLE `voto` (
  `idUsu` int(2) NOT NULL,
  `idEnc` int(2) NOT NULL,
  `idOpc` int(2) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY  (`idUsu`,`idEnc`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `voto`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zona`
-- 

CREATE TABLE `zona` (
  `idZona` int(1) NOT NULL,
  `barrio` varchar(15) NOT NULL,
  PRIMARY KEY  (`idZona`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `zona`
-- 

INSERT INTO `zona` VALUES (1, 'Carrasco');
INSERT INTO `zona` VALUES (2, 'Punta Gorda');
INSERT INTO `zona` VALUES (3, 'Malvin');
INSERT INTO `zona` VALUES (4, 'Malvin Norte');
INSERT INTO `zona` VALUES (5, 'Buceo');
INSERT INTO `zona` VALUES (6, 'Pocitos');
INSERT INTO `zona` VALUES (7, 'Pque RodÃ³');
INSERT INTO `zona` VALUES (8, 'Palermo');
INSERT INTO `zona` VALUES (9, 'Centro');
