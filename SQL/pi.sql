-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-08-2013 a las 22:31:44
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `pi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `habilitado` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `nombre`, `pass`, `habilitado`) VALUES
(1, 'karim', '2167a6ac80340b69f3b05b800417d6c7', 1),
(2, 'dario', '8a49317e060e23bb86f9225ca581e0a9', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE IF NOT EXISTS `encuesta` (
  `idEncuesta` int(11) NOT NULL AUTO_INCREMENT,
  `descripEncuesta` varchar(45) DEFAULT NULL,
  `fechaCreacion` datetime DEFAULT NULL,
  PRIMARY KEY (`idEncuesta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `encuesta`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE IF NOT EXISTS `pregunta` (
  `idPregunta` int(11) NOT NULL AUTO_INCREMENT,
  `nroPregunta` int(11) DEFAULT NULL,
  `descripPregunta` varchar(45) DEFAULT NULL,
  `idEncuesta` int(11) NOT NULL,
  PRIMARY KEY (`idPregunta`),
  KEY `idEncuestaPreg_idx` (`idEncuesta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `pregunta`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `variable`
--

CREATE TABLE IF NOT EXISTS `variable` (
  `idVariable` int(11) NOT NULL AUTO_INCREMENT,
  `nombreVariable` varchar(45) DEFAULT NULL,
  `idEncuesta` int(11) NOT NULL,
  PRIMARY KEY (`idVariable`),
  KEY `idEncuestaVar_idx` (`idEncuesta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `variable`
--


--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `idEncuestaPreg` FOREIGN KEY (`idEncuesta`) REFERENCES `encuesta` (`idEncuesta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `variable`
--
ALTER TABLE `variable`
  ADD CONSTRAINT `idEncuestaVar` FOREIGN KEY (`idEncuesta`) REFERENCES `encuesta` (`idEncuesta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
