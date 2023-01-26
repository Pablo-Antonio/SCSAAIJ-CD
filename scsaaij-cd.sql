-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-01-2023 a las 05:59:53
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `scsaaij-cd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `idAsistencia` int(11) NOT NULL,
  `solicitante` varchar(100) NOT NULL,
  `sede` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `anydesk` varchar(5) NOT NULL,
  `fechaSoli` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`idAsistencia`, `solicitante`, `sede`, `area`, `descripcion`, `anydesk`, `fechaSoli`, `status`) VALUES
(1, 'andrea soto dominguez', 'cuautla', 'recursos humanos', 'la computadora no enciende', 'SI', '2023-01-24 21:31:19', 0),
(2, 'alejandro soto dominguez', 'cuautla', 'recursos humanos', 'el equipo enciende pero solicita modificar la fecha y hora', 'SI', '2023-01-24 21:32:14', 2),
(3, 'PRUEBA', 'prueba', 'PRUEBA', 'prueba', 'SI', '2023-01-24 21:45:22', 0),
(4, 'prueba2', 'prueba2', 'prueba2', 'prueba2', 'SI', '2023-01-25 11:16:10', 0);

--
-- Disparadores `asistencias`
--
DELIMITER $$
CREATE TRIGGER `completar_after_update` AFTER UPDATE ON `asistencias` FOR EACH ROW BEGIN  
 IF NEW.status = 0 THEN
 INSERT INTO historial (idAsistencia)
 VALUES (NEW.idAsistencia);
 END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `idHistorial` int(11) NOT NULL,
  `descripcionEquipo` text NOT NULL,
  `inventario` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `numeroSerie` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `descripcionDictamen` text NOT NULL,
  `asistente` varchar(100) NOT NULL,
  `idAsistencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`idHistorial`, `descripcionEquipo`, `inventario`, `modelo`, `numeroSerie`, `marca`, `descripcionDictamen`, `asistente`, `idAsistencia`) VALUES
(3, '', '', '', '', '', '', '', 1),
(5, '', '', '', '', '', '', '', 3),
(6, 'computadora de escritorio color negra', '', 'pavilion 2020', 'asd-123', 'hp', 'se le cambio la pila a la tarjeta madre, posteriormente se le realizo mantenimiento preventivo y correctivo', 'alexa guzman flores', 2),
(7, '', '', '', '', '', '', '', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(38, '2023-01-21-034320', 'App\\Database\\Migrations\\Asistencias', 'default', 'App', 1674617437, 1),
(39, '2023-01-21-042131', 'App\\Database\\Migrations\\Historial', 'default', 'App', 1674617437, 1),
(40, '2023-01-22-192814', 'App\\Database\\Migrations\\Usuarios', 'default', 'App', 1674617437, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsr` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apePat` varchar(50) NOT NULL,
  `apeMat` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `nomUsr` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsr`, `nombre`, `apePat`, `apeMat`, `telefono`, `nomUsr`, `password`, `tipo`, `status`) VALUES
(1, 'pablo antonio', 'vergara', 'escandon', '7351331097', 'pablovergara', '$2y$10$g45V/8HoU8sXj5.qtz.7Je0TOfIQ5z5l6xwOyezeO7mCJxv2aofNS', 'Administrador', '1'),
(2, 'rosalba', 'galicia', 'ramos', '7352204761', 'rosalbagalicia', '$2y$10$g6WvEH7L8Hdcr4L.reXYnez1Blcw1DwhLf2qFVUroPbvEZhGcqL8C', 'Pasante', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`idAsistencia`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`idHistorial`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsr`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `idAsistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `idHistorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
