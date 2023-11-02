-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2023 a las 13:02:18
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
-- Base de datos: `automotores`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(15) NOT NULL,
  `fecha` varchar(25) NOT NULL,
  `nomCliente` varchar(30) NOT NULL,
  `apeCliente` varchar(30) NOT NULL,
  `dirCliente` varchar(60) NOT NULL,
  `telCliente` varchar(10) NOT NULL,
  `emaiCliente` varchar(40) NOT NULL,
  `nomTrabaCliente` varchar(50) NOT NULL,
  `apelliTrabaCliente` varchar(50) NOT NULL,
  `telTrabaCliente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `fecha`, `nomCliente`, `apeCliente`, `dirCliente`, `telCliente`, `emaiCliente`, `nomTrabaCliente`, `apelliTrabaCliente`, `telTrabaCliente`) VALUES
(1023364851, '', 'miguel', 'rodrigues', 'kr2 sur calle 2', '3227330091', 'tibaguyrincon@gmail.com', 'no aplica', 'no aplica', 'no aplica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenservicio`
--

CREATE TABLE `ordenservicio` (
  `idOrden` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `idCliente` int(11) NOT NULL,
  `idVehiculo` int(11) NOT NULL,
  `idTecnico` bigint(20) NOT NULL,
  `idPintor` bigint(20) NOT NULL,
  `idLatonero` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ordenservicio`
--

INSERT INTO `ordenservicio` (`idOrden`, `fecha`, `idCliente`, `idVehiculo`, `idTecnico`, `idPintor`, `idLatonero`) VALUES
(4, '2023-11-02 05:55:07', 1023364851, 6, 12123123, 778654, 88787),
(5, '2023-11-02 06:02:12', 1023364851, 8, 1075236271, 778654, 88787);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnico`
--

CREATE TABLE `tecnico` (
  `idTecnico` bigint(20) NOT NULL,
  `nomTecnico` varchar(30) NOT NULL,
  `apeTecnico` varchar(30) NOT NULL,
  `emailTecnico` varchar(40) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tecnico`
--

INSERT INTO `tecnico` (`idTecnico`, `nomTecnico`, `apeTecnico`, `emailTecnico`, `estado`) VALUES
(12123123, 'Luis Ernesto', 'Tique Calderon', '', 'Activo'),
(987654321, 'Jose Wilmer ', 'Monje Cedeño ', '', 'Activo'),
(1075236271, 'Luis Humberto ', 'Tique Santos', '', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadorlatoneria`
--

CREATE TABLE `trabajadorlatoneria` (
  `idLatonero` bigint(20) NOT NULL,
  `nomLatonero` varchar(80) NOT NULL,
  `apelliLatonero` varchar(80) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trabajadorlatoneria`
--

INSERT INTO `trabajadorlatoneria` (`idLatonero`, `nomLatonero`, `apelliLatonero`, `estado`) VALUES
(88787, 'Miguel Angel', 'Zanclemente', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadorpintor`
--

CREATE TABLE `trabajadorpintor` (
  `idPintor` bigint(20) NOT NULL,
  `nomPintor` varchar(80) NOT NULL,
  `apelliPintor` varchar(80) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trabajadorpintor`
--

INSERT INTO `trabajadorpintor` (`idPintor`, `nomPintor`, `apelliPintor`, `estado`) VALUES
(778654, 'juan', 'rincon', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userapp`
--

CREATE TABLE `userapp` (
  `idUser` bigint(20) NOT NULL,
  `nomUser` varchar(30) NOT NULL,
  `apeUser` varchar(30) NOT NULL,
  `passUser` varchar(100) NOT NULL,
  `emailUser` varchar(40) NOT NULL,
  `telUseer` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `userapp`
--

INSERT INTO `userapp` (`idUser`, `nomUser`, `apeUser`, `passUser`, `emailUser`, `telUseer`) VALUES
(36123123123, 'CLAUDIA PATRICIA', 'TOLEDO LOSADA', '123', 'todoautomoreshuilasas@hotmail.com', '3228968368');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `idVehiculo` int(11) NOT NULL,
  `placaVehiculo` varchar(10) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(10) NOT NULL,
  `motor` varchar(30) NOT NULL,
  `chasis` varchar(30) NOT NULL,
  `kilometros` smallint(6) NOT NULL,
  `color` varchar(20) NOT NULL,
  `estadoLlantaDelanteraIzquierda` char(1) NOT NULL COMMENT 'B, R, M',
  `estadoLlantaTraseraIzquierda` char(1) NOT NULL COMMENT '	B, R, M',
  `estadoLlantaDelanteraDerecha` char(1) NOT NULL COMMENT '	B, R, M',
  `estadoLlantaTraseraDerecha` char(1) NOT NULL COMMENT '	B, R, M',
  `combustible` varchar(1000) NOT NULL DEFAULT '0',
  `radio` varchar(50) NOT NULL,
  `plumillas` varchar(50) NOT NULL,
  `llavesPernos` varchar(50) NOT NULL,
  `parlantes` varchar(50) NOT NULL,
  `espejos` varchar(50) NOT NULL,
  `repuestos` varchar(50) NOT NULL,
  `antena` varchar(50) NOT NULL,
  `tapetes` varchar(50) NOT NULL,
  `herramientas` varchar(50) NOT NULL,
  `encendedor` varchar(50) NOT NULL,
  `copas` varchar(50) NOT NULL,
  `gato` varchar(50) NOT NULL,
  `mensaje` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`idVehiculo`, `placaVehiculo`, `marca`, `modelo`, `motor`, `chasis`, `kilometros`, `color`, `estadoLlantaDelanteraIzquierda`, `estadoLlantaTraseraIzquierda`, `estadoLlantaDelanteraDerecha`, `estadoLlantaTraseraDerecha`, `combustible`, `radio`, `plumillas`, `llavesPernos`, `parlantes`, `espejos`, `repuestos`, `antena`, `tapetes`, `herramientas`, `encendedor`, `copas`, `gato`, `mensaje`) VALUES
(1, 'z', 'a', 'a', 'a', 'a', 0, 'a', 'B', 'B', 'B', 'B', '1234', 'azul', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'asaaaaaa'),
(2, 'z', 'a', 'a', 'a', 'a', 0, 'a', 'R', 'R', 'R', 'R', '123', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(3, 'ZMJ-123', 'zusuki', 'unico', '118976jyu87', '5453rt152t', 3300, 'si aplica', 'B', 'B', 'B', 'B', '333', 'no aplica', 'no aplica', 'no aplica', 'si aplica', 'si aplica', 'si aplica', 'si aplica', 'si aplica', 'si aplica', 'no aplica', 'no aplica', 'si aplica', 'modificasiones'),
(4, 'ZMJ-123', 'zusuki', 'unico', '118976jyu87', '5453rt152t', 3300, 'si aplica', 'B', 'B', 'B', 'B', '333', 'no aplica', 'no aplica', 'no aplica', 'si aplica', 'si aplica', 'si aplica', 'si aplica', 'si aplica', 'si aplica', 'no aplica', 'no aplica', 'si aplica', 'modificasiones'),
(5, 'ZMJ-123', 'zusuki', 'unico', '118976jyu87', '5453rt152t', 3300, 'si aplica', 'B', 'B', 'B', 'B', '333', 'no aplica', 'no aplica', 'no aplica', 'si aplica', 'si aplica', 'si aplica', 'si aplica', 'si aplica', 'si aplica', 'no aplica', 'no aplica', 'si aplica', 'modificasiones'),
(6, 'a', 'a', 'a', 'a', 'a', 0, 'a', 'B', 'B', 'B', 'B', '1', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'sjdsj'),
(7, 'a', 'a', 'a', 'a', 'a', 0, 'a', 'R', 'B', 'B', 'R', '21', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(8, 'a', 'a', 'a', 'a', 'a', 0, 'a', 'R', 'B', 'B', 'R', '21', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `ordenservicio`
--
ALTER TABLE `ordenservicio`
  ADD PRIMARY KEY (`idOrden`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idTecnico` (`idTecnico`),
  ADD KEY `idVehiculo` (`idVehiculo`),
  ADD KEY `idLatonero` (`idLatonero`),
  ADD KEY `idPintor` (`idPintor`);

--
-- Indices de la tabla `tecnico`
--
ALTER TABLE `tecnico`
  ADD PRIMARY KEY (`idTecnico`);

--
-- Indices de la tabla `trabajadorlatoneria`
--
ALTER TABLE `trabajadorlatoneria`
  ADD PRIMARY KEY (`idLatonero`);

--
-- Indices de la tabla `trabajadorpintor`
--
ALTER TABLE `trabajadorpintor`
  ADD PRIMARY KEY (`idPintor`);

--
-- Indices de la tabla `userapp`
--
ALTER TABLE `userapp`
  ADD PRIMARY KEY (`idUser`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`idVehiculo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1023364877;

--
-- AUTO_INCREMENT de la tabla `ordenservicio`
--
ALTER TABLE `ordenservicio`
  MODIFY `idOrden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `trabajadorlatoneria`
--
ALTER TABLE `trabajadorlatoneria`
  MODIFY `idLatonero` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88792;

--
-- AUTO_INCREMENT de la tabla `trabajadorpintor`
--
ALTER TABLE `trabajadorpintor`
  MODIFY `idPintor` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=778658;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `idVehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ordenservicio`
--
ALTER TABLE `ordenservicio`
  ADD CONSTRAINT `ordenservicio_ibfk_1` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculo` (`idVehiculo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordenservicio_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordenservicio_ibfk_4` FOREIGN KEY (`idTecnico`) REFERENCES `tecnico` (`idTecnico`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordenservicio_ibfk_5` FOREIGN KEY (`idLatonero`) REFERENCES `trabajadorlatoneria` (`idLatonero`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordenservicio_ibfk_6` FOREIGN KEY (`idPintor`) REFERENCES `trabajadorpintor` (`idPintor`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
