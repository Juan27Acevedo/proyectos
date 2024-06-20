-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2024 a las 17:31:50
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `papeleria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administracion`
--

CREATE TABLE `administracion` (
  `idadmin` int(11) NOT NULL,
  `horasextras` int(11) NOT NULL,
  `horasnocturnas` int(11) NOT NULL,
  `festivos` int(11) NOT NULL,
  `atr` int(11) NOT NULL,
  `descuentopension` int(11) NOT NULL,
  `descuentosalud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administracion`
--

INSERT INTO `administracion` (`idadmin`, `horasextras`, `horasnocturnas`, `festivos`, `atr`, `descuentopension`, `descuentosalud`) VALUES
(5, 6915, 9681, 13830, 162000, 4, 4),
(7, 500, 100, 50, 300, 4, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idempleado` int(11) NOT NULL,
  `archivo` varchar(30) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` bigint(15) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `cargo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idempleado`, `archivo`, `nombre`, `apellido`, `direccion`, `telefono`, `correo`, `cargo`) VALUES
(1, '', 'juan', 'aaaaaaaaaaa', '', 0, '', ''),
(4, 'includes/files/CC_1007449726_D', 'camila', 'acuña', '34567', 34567890, 'holaaaaaaaaaa', 'estudiante'),
(333, 'includes/files/Interfas Proyec', 'chicloso', 'rondon', '1234567', 12345, 'sebastian@hotmail.com', 'estudiante de musica'),
(999, 'includes/files/Jose Arroyo - E', 'angel', 'rojas', '', 2345678, '', 'sapo'),
(9999, 'includes/files/Fiesta-de-Negri', 'santiago', 'anillo', 'ertyui', 2345678, 'santiago@gmail.co', 'aprendiz'),
(1003698186, 'includes/files/Interfas Proyec', 'jean carlo ', 'rondon medina', 'dg16#5-95', 3125445166, 'jeancarlorondonmedina@gmail.com', 'supervisor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomina`
--

CREATE TABLE `nomina` (
  `idnomina` int(11) NOT NULL,
  `salio_base` varchar(100) NOT NULL,
  `mes` varchar(45) NOT NULL,
  `idempleado` int(11) DEFAULT NULL,
  `idadmin` int(11) DEFAULT NULL,
  `horasextras` int(20) NOT NULL,
  `horasnocturnas` int(20) NOT NULL,
  `festivos` int(20) NOT NULL,
  `nombrebono` varchar(20) NOT NULL,
  `bono` int(20) NOT NULL,
  `sintrabajar` int(30) NOT NULL,
  `salario_neto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nomina`
--

INSERT INTO `nomina` (`idnomina`, `salio_base`, `mes`, `idempleado`, `idadmin`, `horasextras`, `horasnocturnas`, `festivos`, `nombrebono`, `bono`, `sintrabajar`, `salario_neto`) VALUES
(9, '130000', '', 4, 5, 34575, 48405, 55320, '', 200, 0, '268500'),
(10, '1300000', '', 9999, 5, 34575, 48405, 69150, '', 200, 0, '1452330'),
(11, '1000000', '', 4, 5, 13830, 9681, 13830, '', 20000, 0, '1057341'),
(12, '20000', '', 4, 5, 6915, 9681, 13830, '', 20000, 0, '70426'),
(13, '20000', '', 4, 5, 6915, 9681, 13830, '', 20000, 0, '70426'),
(14, '20000', '', 4, 5, 6915, 9681, 13830, '', 20000, 0, '70426'),
(15, '20000', '', 4, 5, 6915, 9681, 13830, '', 20000, 0, '70426'),
(16, '20000', '', 4, 5, 6915, 9681, 13830, '', 20000, 0, '70426'),
(17, '20000', '', 4, 5, 6915, 9681, 13830, '', 20000, 0, '70426'),
(18, '20000', '', 4, 5, 6915, 9681, 13830, '', 20000, 0, '70426'),
(19, '20000', '', 4, 5, 6915, 9681, 13830, '', 20000, 0, '70426'),
(20, '20000', '', 4, 5, 6915, 9681, 13830, '', 20000, 0, '70426'),
(21, '20000', '', 4, 5, 6915, 9681, 13830, '', 20000, 0, '70426'),
(22, '20000', '', 4, 5, 6915, 9681, 13830, '', 20000, 0, '70426'),
(23, '1', '', 4, 5, 6915, 9681, 13830, '', 20000, 0, '50427'),
(24, '92000', '', 4, 5, 6915, 9681, 13830, '', 20000, 0, '142426'),
(25, '92000', '', 4, 5, 6915, 9681, 13830, '', 20000, 0, '142426'),
(26, '92000', '', 4, 5, 6915, 9681, 13830, '', 20000, 0, '142426'),
(27, '546', '', 1003698186, 7, 500, 200, 50, '', 50, 0, '1346'),
(28, '91000', '', 4, 7, 500, 100, 50, '', 20000, 0, '111650'),
(29, '91000', '', 4, 7, 500, 100, 50, '', 20000, 0, '111650'),
(30, '91000', '', 4, 7, 500, 100, 50, '', 20000, 0, '111650'),
(31, '91000', '', 4, 7, 500, 100, 50, '', 20000, 0, '111650'),
(32, '91000', '', 4, 7, 500, 100, 50, '', 20000, 0, '111650'),
(33, '91000', '', 4, 7, 500, 100, 50, '', 20000, 0, '111650'),
(34, '91000', '', 4, 7, 500, 100, 50, '', 20000, 0, '111650'),
(35, '91000', '', 4, 7, 500, 100, 50, '', 20000, 0, '111650'),
(36, '91000', '', 4, 7, 500, 100, 50, '', 20000, 0, '111650'),
(37, '91000', '', 4, 7, 500, 100, 50, '', 20000, 0, '111650'),
(38, '91000', '', 4, 7, 500, 100, 50, '', 20000, 0, '111650'),
(39, '910000', '', 4, 7, 500, 100, 50, '', 20000, 0, '930650');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administracion`
--
ALTER TABLE `administracion`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idempleado`);

--
-- Indices de la tabla `nomina`
--
ALTER TABLE `nomina`
  ADD PRIMARY KEY (`idnomina`),
  ADD KEY `idempleado` (`idempleado`),
  ADD KEY `idadicional` (`idadmin`),
  ADD KEY `idadmin` (`idadmin`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administracion`
--
ALTER TABLE `administracion`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `nomina`
--
ALTER TABLE `nomina`
  MODIFY `idnomina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `nomina`
--
ALTER TABLE `nomina`
  ADD CONSTRAINT `nomina_ibfk_1` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`idempleado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nomina_ibfk_2` FOREIGN KEY (`idadmin`) REFERENCES `administracion` (`idadmin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
