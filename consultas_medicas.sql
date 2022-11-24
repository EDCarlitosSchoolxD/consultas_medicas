-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2022 a las 02:41:45
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `consultas_medicas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `horario` date NOT NULL,
  `mensaje` text NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellido_paterno` varchar(255) NOT NULL,
  `apellido_materno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `id_doctor`, `id_usuario`, `horario`, `mensaje`, `nombres`, `apellido_paterno`, `apellido_materno`) VALUES
(1, 8, 1, '2022-12-01', '\n                                    console.log(response);\n    ', 'Juan Carlos', 'Uch', 'Dzib');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellido_paterno` varchar(150) NOT NULL,
  `apellido_materno` varchar(150) NOT NULL,
  `id_especialidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`id`, `nombre`, `apellido_paterno`, `apellido_materno`, `id_especialidad`) VALUES
(1, 'Alejandro', 'Mendez \r\n', 'Mendez', 1),
(2, 'Nancy Beatriz', 'Calderón ', 'Muller ', 1),
(3, 'Santos Margarita ', 'López ', 'López', 1),
(4, 'Adolfo Orlando', 'Alvarez \r\n', 'Rosales', 2),
(5, 'Alejandro del Carmen ', 'Samayoa \r\n', 'Eguizabal', 2),
(6, 'Ana Francisca', 'Leiva ', 'García', 2),
(7, 'Byron Aroldo ', 'Estrada ', 'Rodriguez', 3),
(8, 'Cecilia Isabel ', 'Aliñado', 'Asturias', 3),
(9, ' Cristian Yovani ', 'Pérez ', 'Guevara', 3),
(10, 'Edwin Manfredo', 'Garcia\r\n', 'Morales', 5),
(11, 'Elder Adonias', 'Santos', 'Rosales ', 5),
(12, 'Juan Carlos', 'Uch', 'Dzib', 5),
(13, 'Juan Pablo', 'Perez', 'Chale', 4),
(14, 'Hannia Alejandra', 'Yepez', 'Perez', 4),
(15, 'Mario Israel', 'Celis', 'Diaz', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id` int(11) NOT NULL,
  `especialidad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id`, `especialidad`) VALUES
(1, 'Cardiología Clínica'),
(2, 'Cirugía General'),
(3, 'Dermatología'),
(4, 'Ortopedia'),
(5, 'Neumología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `contrasenna` text NOT NULL,
  `usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `telefono`, `contrasenna`, `usuario`) VALUES
(1, 'juanuchdzib@gmail.com', '123', '$2y$10$gyYrGkJsm7e0w0BjgZwGd.FRTMoZF3QjWLX/RuE9dFUtSu0Bl/mKK', 'EDCarlitosxD');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_doctor` (`id_doctor`,`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_especialidad` (`id_especialidad`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`id_doctor`) REFERENCES `doctores` (`id`);

--
-- Filtros para la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD CONSTRAINT `doctores_ibfk_1` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidades` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
