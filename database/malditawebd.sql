-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-08-2016 a las 21:18:35
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `malditawebd`
--



--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `Id` int(11) NOT NULL,
  `Cuenta` varchar(50) NOT NULL,
  `Clave` varchar(1000) NOT NULL,
  `Nombre` varchar(180) NOT NULL,
  `Apellido` varchar(180) DEFAULT NULL,
  `FechaRegistro` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id`, `Cuenta`, `Clave`, `Nombre`, `Apellido`, `FechaRegistro`) VALUES
(1, 'admin', '010438e6515e45aeaea0ac5303dbf9c2806eb0d0', 'Saul Mamani', 'Ingeniero Informatico de Bolivia', '2015-02-02'),
(34, '76137269', 'saul123', 'Saul', 'Mamani', '2016-04-07'),
(35, '761513691', 'lidia123', 'Lidia', 'Tangara Marce', '2016-04-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE IF NOT EXISTS `libro` (
  `IdLibro` int(11) NOT NULL,
  `Titulo` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Autor` varchar(80) CHARACTER SET latin1 DEFAULT NULL,
  `Descripcion` text CHARACTER SET latin1,
  `Portada` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `Url` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `FkUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf32;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`IdLibro`, `Titulo`, `Autor`, `Descripcion`, `Portada`, `Url`, `FkUsuario`) VALUES
(12, 'Scrum y Xp desde las trincheras', 'Henrik Kniberg', 'Tanto Scrum como Programación Extrema (XP) requieren que los equipos\r\ncompleten algún tipo de producto potencialmente liberable al final de cada\r\niteración.', 'portadas/Scrum.PNG', 'https://mega.nz/#!UswyGbLT!_j-qEDleHw4UIzTN_ZsRhkUQVsFfaGpXHwjbj0lY2xI', 34),
(13, 'Hacking desde cero', 'Daniel Montes', 'En este volumen están desarrollados los conceptos\r\nbásicos con los que se trabaja en seguridad informática\r\na fines de la primera década del siglo XXI,\r\nalgo muy difícil, de lograr.', 'portadas/hadesdecero.PNG', 'https://mega.nz/#!loZQ3ACS!N59e9SxZyrdb6pAbu5tH-IHholsEp7UXJBUrqqpJU5I', 34),
(14, 'Analisis y Diseño de Sistemas', 'Kendall y Kendall', 'Existen tres aspectos fundamentales de la organización que se deben tomar en cuenta al\r\nanalizar y diseñar sistemas de información: el concepto de organizaciones como sistemas,\r\nlos diversos niveles de administración y la cultura general de la organización.', 'portadas/kendallKendall.jpg', 'https://mega.nz/#!J45nSTQB!ZIomAF3Tq0X9KORbiiqSrk1o6w8dxhb_tq--6NENA8A', 34),
(15, 'UML 2.0', 'Grady Booch', 'El lenguaje de modelado unificado segunda version, Guia del Usuario', 'portadas/UMLguia.PNG', 'https://mega.nz/#!Y95DUb6I!2jdqp1luQdoFr0hZGwrIxTjBLa-laqzL8fN7GXNJzyU', 35),
(16, 'BPMN 2.0', 'Stephen A. White, PHD Derek Miers', 'Guía de Referencia y Modelado BPMN 2.0\r\nComprendiendo y utilizando BPMN', 'portadas/BPMN.PNG', 'https://mega.nz/#!41Bk3CID!BDailYYFPNRNoKxxTPQ4xeBbAyikEhJy1Q6pO8bl2sg', 35);

-- --------------------------------------------------------

--
-- Estructura para la vista `vwlibro`
--
DROP TABLE IF EXISTS `vwlibro`;

CREATE VIEW `vwlibro` AS select `libro`.`IdLibro` AS `IdLibro`,`libro`.`Titulo` AS `Titulo`,`libro`.`Autor` AS `Autor`,`libro`.`Descripcion` AS `Descripcion`,`libro`.`Portada` AS `Portada`,`libro`.`Url` AS `Url`,concat('Cuenta: ',`usuario`.`Cuenta`,'<br/>Nombre: ',`usuario`.`Nombre`,' ',`usuario`.`Apellido`) AS `Gentileza` from (`libro` join `usuario` on((`libro`.`FkUsuario` = `usuario`.`Id`)));

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`IdLibro`), ADD KEY `FkUsuarioLibro` (`FkUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `IdLibro` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
ADD CONSTRAINT `FkUsuarioLibro` FOREIGN KEY (`FkUsuario`) REFERENCES `usuario` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
