-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-07-2024 a las 03:58:49
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

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

CREATE TABLE `concursantes` (
  `id_registro` int(11) NOT NULL,
  `nombre_completo_participante` varchar(255) NOT NULL,
  `fecha_nacimiento_participante` date NOT NULL,
  `nombre_completo_pareja` varchar(255) NOT NULL,
  `fecha_nacimiento_pareja` date NOT NULL,
  `telefono_contacto` varchar(20) NOT NULL,
  `representacion` varchar(255) NOT NULL,
  `curp_participante` int(11) NOT NULL,
  `acta_nac_participante` int(11) NOT NULL,
  `ine_participante` int(11) NOT NULL,
  `fotografia_participante` int(11) NOT NULL,
  `curp_pareja` int(11) NOT NULL,
  `acta_nac_pareja` int(11) NOT NULL,
  `ine_pareja` int(11) NOT NULL,
  `fotografia_pareja` int(11) NOT NULL,
  `nombre_completo_tutor` varchar(255) DEFAULT NULL,
  `telefono_tutor` varchar(20) DEFAULT NULL,
  `categoria` varchar(150) NOT NULL,
  `estilo` varchar(150) NOT NULL,
  `numero_pareja` varchar(20) NOT NULL,
  `estatus_valido` int(11) NOT NULL,
  `bloque_inicial` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `concursantes`
--
ALTER TABLE `concursantes`
  ADD PRIMARY KEY (`id_registro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `concursantes`
--
ALTER TABLE `concursantes`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
