-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 08-07-2024 a las 23:00:52
-- Versión del servidor: 8.2.0
-- Versión de PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `huapango_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concursantes`
--

DROP TABLE IF EXISTS `concursantes`;
CREATE TABLE IF NOT EXISTS `concursantes` (
  `id_registro` int NOT NULL AUTO_INCREMENT,
  `nombre_completo_participante` varchar(255) NOT NULL,
  `fecha_nacimiento_participante` date NOT NULL,
  `nombre_completo_pareja` varchar(255) NOT NULL,
  `fecha_nacimiento_pareja` date NOT NULL,
  `telefono_contacto` varchar(20) NOT NULL,
  `representacion` varchar(255) NOT NULL,
  `curp_participante` int NOT NULL,
  `acta_nac_participante` int NOT NULL,
  `ine_participante` int NOT NULL,
  `fotografia_participante` int NOT NULL,
  `curp_pareja` int NOT NULL,
  `acta_nac_pareja` int NOT NULL,
  `ine_pareja` int NOT NULL,
  `fotografia_pareja` int NOT NULL,
  `nombre_completo_tutor` varchar(255) DEFAULT NULL,
  `telefono_tutor` varchar(20) DEFAULT NULL,
  `categoria` varchar(150) NOT NULL,
  `estilo` varchar(150) NOT NULL,
  `numero_participacion` varchar(20) NOT NULL,
  PRIMARY KEY (`id_registro`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
