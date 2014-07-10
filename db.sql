-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-01-2014 a las 05:12:48
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gestos`
--
CREATE DATABASE IF NOT EXISTS `gestos` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gestos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `url_imagen` text NOT NULL,
  `url_video` text NOT NULL,
  `id_categoria_padre` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplo`
--

DROP TABLE IF EXISTS `ejemplo`;
CREATE TABLE IF NOT EXISTS `ejemplo` (
  `id_ejemplo` int(11) NOT NULL AUTO_INCREMENT,
  `id_gesto` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `url_imagen` text NOT NULL,
  PRIMARY KEY (`id_ejemplo`),
  KEY `fk_ejemplo_gesto_idx` (`id_gesto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gesto`
--

DROP TABLE IF EXISTS `gesto`;
CREATE TABLE IF NOT EXISTS `gesto` (
  `id_gesto` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `definicion` text,
  `url_video` text NOT NULL,
  `url_imagen` text NOT NULL,
  PRIMARY KEY (`id_gesto`),
  KEY `fk_gest_categoria_idx` (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ejemplo`
--
ALTER TABLE `ejemplo`
  ADD CONSTRAINT `fk_ejemplo_gesto` FOREIGN KEY (`id_gesto`) REFERENCES `gesto` (`id_gesto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `gesto`
--
ALTER TABLE `gesto`
  ADD CONSTRAINT `fk_gest_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
