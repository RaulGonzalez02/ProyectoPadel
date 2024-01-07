-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2023 a las 23:27:54
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `padel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `dni` varchar(20) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `ranking` int(11) DEFAULT NULL,
  `contraseña` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`dni`, `nombre`, `apellidos`, `email`, `ranking`, `contraseña`) VALUES
('11111111A', 'Juan', 'González', 'juan@example.com', 5, 'contraseña123'),
('22222222B', 'María', 'López', 'maria@example.com', 4, 'clave456'),
('33333333C', 'Pedro', 'Martínez', 'pedro@example.com', 6, 'pwd789');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores_pista`
--

CREATE TABLE `jugadores_pista` (
  `dni` varchar(20) NOT NULL,
  `cod_pista` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jugadores_pista`
--

INSERT INTO `jugadores_pista` (`dni`, `cod_pista`, `fecha`, `hora`) VALUES
('11111111A', 1, '2023-12-01', '18:00:00'),
('22222222B', 1, '2023-12-01', '19:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pistas`
--

CREATE TABLE `pistas` (
  `cod_pista` int(11) NOT NULL,
  `color` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pistas`
--

INSERT INTO `pistas` (`cod_pista`, `color`) VALUES
(1, 'Verde'),
(2, 'Azul'),
(3, 'Rojo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `jugadores_pista`
--
ALTER TABLE `jugadores_pista`
  ADD PRIMARY KEY (`dni`,`cod_pista`,`fecha`,`hora`),
  ADD KEY `cod_pista` (`cod_pista`);

--
-- Indices de la tabla `pistas`
--
ALTER TABLE `pistas`
  ADD PRIMARY KEY (`cod_pista`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `jugadores_pista`
--
ALTER TABLE `jugadores_pista`
  ADD CONSTRAINT `jugadores_pista_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `jugadores` (`dni`),
  ADD CONSTRAINT `jugadores_pista_ibfk_2` FOREIGN KEY (`cod_pista`) REFERENCES `pistas` (`cod_pista`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
