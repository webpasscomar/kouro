-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-02-2023 a las 11:26:59
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cibase`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `categoria` varchar(255) DEFAULT NULL,
  `centroide_lat` float DEFAULT NULL,
  `centroide_lon` float DEFAULT NULL,
  `fuente` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `iso_id` varchar(255) DEFAULT NULL,
  `iso_nombre` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `nombre_completo` varchar(255) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`categoria`, `centroide_lat`, `centroide_lon`, `fuente`, `id`, `iso_id`, `iso_nombre`, `nombre`, `nombre_completo`) VALUES
('Ciudad Autónoma', -34.6145, -58.4459, 'IG', 2, 'AR-C', 'Ciudad Autónoma de Buenos Aires', 'Ciudad Autónoma de Buenos Aires', 'Ciudad Autónoma de Buenos Aires'),
('Provincia', -36.6769, -60.5588, 'IG', 6, 'AR-B', 'Buenos Aires', 'Buenos Aires', 'Provincia de Buenos Aires'),
('Provincia', -27.3358, -66.9477, 'IG', 10, 'AR-K', 'Catamarca', 'Catamarca', 'Provincia de Catamarca'),
('Provincia', -32.1429, -63.8018, 'IG', 14, 'AR-X', 'Córdoba', 'Córdoba', 'Provincia de Córdoba'),
('Provincia', -28.7743, -57.8012, 'IG', 18, 'AR-W', 'Corrientes', 'Corrientes', 'Provincia de Corrientes'),
('Provincia', -26.3864, -60.7658, 'IG', 22, 'AR-H', 'Chaco', 'Chaco', 'Provincia del Chaco'),
('Provincia', -43.7886, -68.5268, 'IG', 26, 'AR-U', 'Chubut', 'Chubut', 'Provincia del Chubut'),
('Provincia', -32.0589, -59.2014, 'IG', 30, 'AR-E', 'Entre Ríos', 'Entre Ríos', 'Provincia de Entre Ríos'),
('Provincia', -24.895, -59.9324, 'IG', 34, 'AR-P', 'Formosa', 'Formosa', 'Provincia de Formosa'),
('Provincia', -23.3201, -65.7643, 'IG', 38, 'AR-Y', 'Jujuy', 'Jujuy', 'Provincia de Jujuy'),
('Provincia', -37.1316, -65.4467, 'IG', 42, 'AR-L', 'La Pampa', 'La Pampa', 'Provincia de La Pampa'),
('Provincia', -29.6858, -67.1817, 'IG', 46, 'AR-F', 'La Rioja', 'La Rioja', 'Provincia de La Rioja'),
('Provincia', -34.6299, -68.5831, 'IG', 50, 'AR-M', 'Mendoza', 'Mendoza', 'Provincia de Mendoza'),
('Provincia', -26.8754, -54.6517, 'IGN', 54, 'AR-N', 'Misiones', 'Misiones', 'Provincia de Misiones'),
('Provincia', -38.6418, -70.1186, 'IG', 58, 'AR-Q', 'Neuquén', 'Neuquén', 'Provincia del Neuquén'),
('Provincia', -40.4058, -67.2293, 'IG', 62, 'AR-R', 'Río Negro', 'Río Negro', 'Provincia de Río Negro'),
('Provincia', -24.2991, -64.8145, 'IG', 66, 'AR-A', 'Salta', 'Salta', 'Provincia de Salta'),
('Provincia', -30.8654, -68.8895, 'IG', 70, 'AR-J', 'San Juan', 'San Juan', 'Provincia de San Juan'),
('Provincia', -33.7577, -66.0281, 'IG', 74, 'AR-D', 'San Luis', 'San Luis', 'Provincia de San Luis'),
('Provincia', -48.8155, -69.9558, 'IG', 78, 'AR-Z', 'Santa Cruz', 'Santa Cruz', 'Provincia de Santa Cruz'),
('Provincia', -30.7069, -60.9498, 'IG', 82, 'AR-S', 'Santa Fe', 'Santa Fe', 'Provincia de Santa Fe'),
('Provincia', -27.7824, -63.2524, 'IG', 86, 'AR-G', 'Santiago del Estero', 'Santiago del Estero', 'Provincia de Santiago del Estero'),
('Provincia', -26.9478, -65.3648, 'IG', 90, 'AR-T', 'Tucumán', 'Tucumán', 'Provincia de Tucumán'),
('Provincia', -82.5215, -50.7427, 'IG', 94, 'AR-V', 'Tierra del Fuego', 'Tierra del Fuego, Antartida e Islas del Atlantico Sur', 'Provincia de Tierra del Fuego, Antartida e Islas del Atlantico Sur');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
