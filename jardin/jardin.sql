-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2023 a las 04:18:28
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jardin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_cuotas`
--

CREATE TABLE `control_cuotas` (
  `id_cuota` int(11) NOT NULL,
  `tipo_jornada` enum('simple','extendida','completa') DEFAULT NULL,
  `arancel` decimal(10,2) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_gastos`
--

CREATE TABLE `control_gastos` (
  `id_gasto` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `fecha_hora_gasto` datetime DEFAULT NULL,
  `detalles_proveedor` varchar(255) DEFAULT NULL,
  `proposito_gasto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion_salas`
--

CREATE TABLE `informacion_salas` (
  `id_sala` int(11) NOT NULL,
  `numero_sala` enum('1','2','3','4') DEFAULT NULL,
  `cupos_disponibles` int(11) DEFAULT NULL,
  `tipo_jornada` enum('simple','extendida','completa') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `legajo_alumno`
--

CREATE TABLE `legajo_alumno` (
  `id_alumno` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `dni` int(11) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `enfermedades` text DEFAULT NULL,
  `autorizacion_retiro` tinyint(1) DEFAULT NULL,
  `actividades_extracurriculares` text DEFAULT NULL,
  `sala` enum('1','2','3','4') DEFAULT NULL,
  `turno` enum('1','2','3') DEFAULT NULL,
  `jornada` enum('simple','extendida','completa') DEFAULT NULL,
  `id_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `legajo_personal`
--

CREATE TABLE `legajo_personal` (
  `id_personal` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `dni` int(11) DEFAULT NULL,
  `certificaciones` text DEFAULT NULL,
  `capacitaciones` text DEFAULT NULL,
  `salario_fijo` decimal(10,2) DEFAULT NULL,
  `horas_extras` decimal(10,2) DEFAULT NULL,
  `suplencia` decimal(10,2) DEFAULT NULL,
  `hora_ingreso` time DEFAULT NULL,
  `hora_egreso` time DEFAULT NULL,
  `id_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nominas_pago`
--

CREATE TABLE `nominas_pago` (
  `id_nomina` int(11) NOT NULL,
  `tipo_personal` enum('docente','administrativo') DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `fecha_generacion` datetime DEFAULT NULL,
  `detalles_nomina` text DEFAULT NULL,
  `total_pagar` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `nominas_pago`
--

INSERT INTO `nominas_pago` (`id_nomina`, `tipo_personal`, `mes`, `anio`, `fecha_generacion`, `detalles_nomina`, `total_pagar`) VALUES
(1, NULL, 8, 0, NULL, 'Detalles de la nómina', 0.00),
(2, NULL, 8, 0, NULL, 'Detalles de la nómina', 0.00),
(3, NULL, 8, 0, NULL, 'Detalles de la nómina', 0.00),
(4, NULL, 8, 0, NULL, 'Detalles de la nómina', 0.00),
(5, NULL, 8, 0, NULL, 'Detalles de la nómina', 0.00),
(6, NULL, 8, 0, NULL, 'Detalles de la nómina', 0.00),
(7, NULL, 8, 0, NULL, 'Detalles de la nómina', 0.00),
(8, NULL, 8, 0, NULL, 'Detalles de la nómina', 0.00),
(9, NULL, 8, 0, NULL, 'Detalles de la nómina', 0.00),
(10, NULL, 8, 0, NULL, 'Detalles de la nómina', 0.00),
(11, NULL, 8, 0, NULL, 'Detalles de la nómina', 0.00),
(12, NULL, 8, 0, NULL, 'Detalles de la nómina', 0.00),
(13, NULL, 8, 0, NULL, 'Detalles de la nómina', 0.00),
(14, NULL, 8, 0, NULL, 'Detalles de la nómina', 0.00),
(15, NULL, 8, 0, NULL, 'Detalles de la nómina', 0.00),
(16, NULL, 8, 0, NULL, 'Detalles de la nómina', 0.00),
(17, NULL, 8, 0, NULL, 'Detalles de la nómina', 0.00),
(18, NULL, 8, 0, NULL, 'Detalles de la nómina', 0.00),
(19, NULL, 8, 0, NULL, 'Detalles de la nómina', 0.00),
(20, NULL, 8, 0, NULL, 'Detalles de la nómina', 0.00),
(21, NULL, 8, 0, NULL, 'Detalles de la nómina', 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_asistencias`
--

CREATE TABLE `registro_asistencias` (
  `id_asistencia` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_ingreso` time NOT NULL,
  `hora_salida` time NOT NULL,
  `id_alumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_ingreso_egreso_docentes`
--

CREATE TABLE `registro_ingreso_egreso_docentes` (
  `id_registro` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_ingreso` time NOT NULL,
  `hora_egreso` time NOT NULL,
  `id_docente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `id_sala` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `capacidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `control_cuotas`
--
ALTER TABLE `control_cuotas`
  ADD PRIMARY KEY (`id_cuota`);

--
-- Indices de la tabla `control_gastos`
--
ALTER TABLE `control_gastos`
  ADD PRIMARY KEY (`id_gasto`);

--
-- Indices de la tabla `informacion_salas`
--
ALTER TABLE `informacion_salas`
  ADD PRIMARY KEY (`id_sala`);

--
-- Indices de la tabla `legajo_alumno`
--
ALTER TABLE `legajo_alumno`
  ADD PRIMARY KEY (`id_alumno`),
  ADD KEY `alumno-sala` (`id_sala`);

--
-- Indices de la tabla `legajo_personal`
--
ALTER TABLE `legajo_personal`
  ADD PRIMARY KEY (`id_personal`),
  ADD KEY `personal-sala` (`id_sala`);

--
-- Indices de la tabla `nominas_pago`
--
ALTER TABLE `nominas_pago`
  ADD PRIMARY KEY (`id_nomina`);

--
-- Indices de la tabla `registro_asistencias`
--
ALTER TABLE `registro_asistencias`
  ADD PRIMARY KEY (`id_asistencia`),
  ADD KEY `asistencia-alumno` (`id_alumno`);

--
-- Indices de la tabla `registro_ingreso_egreso_docentes`
--
ALTER TABLE `registro_ingreso_egreso_docentes`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `registro-personal` (`id_docente`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id_sala`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `control_cuotas`
--
ALTER TABLE `control_cuotas`
  MODIFY `id_cuota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `control_gastos`
--
ALTER TABLE `control_gastos`
  MODIFY `id_gasto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `informacion_salas`
--
ALTER TABLE `informacion_salas`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `legajo_alumno`
--
ALTER TABLE `legajo_alumno`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `legajo_personal`
--
ALTER TABLE `legajo_personal`
  MODIFY `id_personal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nominas_pago`
--
ALTER TABLE `nominas_pago`
  MODIFY `id_nomina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `registro_asistencias`
--
ALTER TABLE `registro_asistencias`
  MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `registro_ingreso_egreso_docentes`
--
ALTER TABLE `registro_ingreso_egreso_docentes`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `legajo_alumno`
--
ALTER TABLE `legajo_alumno`
  ADD CONSTRAINT `alumno-sala` FOREIGN KEY (`id_sala`) REFERENCES `sala` (`id_sala`);

--
-- Filtros para la tabla `legajo_personal`
--
ALTER TABLE `legajo_personal`
  ADD CONSTRAINT `personal-sala` FOREIGN KEY (`id_sala`) REFERENCES `sala` (`id_sala`);

--
-- Filtros para la tabla `registro_asistencias`
--
ALTER TABLE `registro_asistencias`
  ADD CONSTRAINT `asistencia-alumno` FOREIGN KEY (`id_alumno`) REFERENCES `legajo_alumno` (`id_alumno`);

--
-- Filtros para la tabla `registro_ingreso_egreso_docentes`
--
ALTER TABLE `registro_ingreso_egreso_docentes`
  ADD CONSTRAINT `registro-personal` FOREIGN KEY (`id_docente`) REFERENCES `legajo_personal` (`id_personal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
