-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-08-2018 a las 04:05:30
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alquilercarros`
--
CREATE DATABASE IF NOT EXISTS `alquilercarros` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `alquilercarros`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquiler`
--

CREATE TABLE `alquiler` (
  `idAlquiler` int(11) NOT NULL,
  `alqCarro` int(11) NOT NULL,
  `alqCliente` int(11) NOT NULL,
  `alqFechaAlquiler` date NOT NULL,
  `alqFechaDevolucion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carros`
--

CREATE TABLE `carros` (
  `idCarro` int(11) NOT NULL,
  `carPlaca` varchar(6) NOT NULL,
  `carMarca` varchar(25) NOT NULL,
  `carColor` varchar(25) NOT NULL,
  `carEstado` enum('Alquilado','Disponible') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carros`
--

INSERT INTO `carros` (`idCarro`, `carPlaca`, `carMarca`, `carColor`, `carEstado`) VALUES
(1, 'gfd234', 'afdsf', 'asd', 'Disponible'),
(2, 'zcxxzc', 'xzczx', 'zxc', 'Disponible'),
(3, '53453', 'sdfsd', 'dsgs', 'Disponible'),
(4, 'sdfgsd', 'fsdf', 'fsdf', 'Disponible'),
(5, 'dfsf', 'fsdfs', 'sdfsdf', 'Disponible'),
(6, '', '', '', 'Disponible'),
(8, '534535', 'dgdfdf', 'gdfgdfgfdg', 'Disponible'),
(10, 'fgfdgd', 'cvsdfv', 'vfcvxc', 'Disponible'),
(12, 'fdsf', 'sadsa', 'asdasd', 'Disponible'),
(13, 'sfsd', 'casxcaz', 'xczcxz', 'Disponible'),
(14, 'sdfasd', 'aadfsasdf', 'asdfasfas', 'Disponible'),
(15, '123dsf', 'fasdfasd', 'asdfasdf', 'Disponible'),
(16, '21321', 'dasdas', 'Blanco', 'Disponible'),
(17, '545234', 'fdgsdgsd', 'Negro', 'Disponible'),
(18, '544353', 'gdfgdfg', 'Rojo', 'Disponible'),
(19, 'dfasjk', 'sdasd', 'Blanco', 'Disponible'),
(20, 'das443', 'asdas', 'Blanco', 'Disponible'),
(21, 'dsada', 'dsada', 'Rojo', 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `cliTelefono` varchar(15) NOT NULL,
  `cliFechaRegistro` date NOT NULL,
  `cliPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `cliTelefono`, `cliFechaRegistro`, `cliPersona`) VALUES
(1, '23452345323', '2018-08-06', 33);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `idEmpleado` int(11) NOT NULL,
  `empCargo` varchar(50) NOT NULL,
  `empPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`idEmpleado`, `empCargo`, `empPersona`) VALUES
(11, 'gerente', 24),
(12, 'Tesorero', 25),
(13, 'Gerente', 26),
(14, 'Recepcionista', 27),
(15, 'Tesoreso', 28),
(16, 'Tesoreso', 29),
(17, 'Tesoreso', 30),
(18, 'Recepcionista', 31),
(19, 'Recepcionista', 32),
(20, 'Tesorero', 34),
(21, 'Recepcionista', 35),
(22, 'Recepcionista', 36),
(23, 'Recepcionista', 37),
(24, 'Recepcionista', 38),
(25, 'Tesorero', 39),
(26, 'Recepcionista', 40),
(27, 'Recepcionista', 41),
(28, 'Recepcionista', 42);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `idPersona` int(11) NOT NULL,
  `perIdentificacion` varchar(15) NOT NULL,
  `perNombres` varchar(50) NOT NULL,
  `perApellidos` varchar(50) NOT NULL,
  `perCorreo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`idPersona`, `perIdentificacion`, `perNombres`, `perApellidos`, `perCorreo`) VALUES
(24, '11', 'pedro', 'picapiedra', '@lapiedra'),
(25, '5345', 'sdfdsf', 'sdfsf', 'dfad@adsa'),
(26, '435435', 'gfgbcvbcv', 'bcvbvcb', 'dfad@adsafsdfd'),
(27, 'asdas342', 'fgfdgdf', 'casca', 'cascasca@asda'),
(28, '231', 'sasdsa', 'sdad', 'dasda@dasd'),
(29, '121', 'dsds', 'sdsd', 'dsfsdf@dsfsd'),
(30, '2145', 'sfdasdsdf', 'asdfasfasf', 'sdfaf@sdafsdf'),
(31, '123123', 'asdfasf', 'asdfasdfd', 'zxcv@dfgsd'),
(32, '00342', 'dfgsg', 'sdfgsdg', 'cascasca@asdasdfg'),
(33, '31243523', 'sfghsdcvb', 'dfgsdgxcb', 'dfad@adsafsdfdsdfg'),
(34, '121345', 'fdasdf', 'asdfa', 'sad@adfasfsaf'),
(35, '3424', 'asdsad', 'asddas', 'asdasd@fasfas'),
(36, '42523523', 'afdasfasdf', 'sdfsafasf', 'asdasdad@dasdasd'),
(37, '456346346', 'fgsdfgsdgsd', 'dfsgsdfgsdfg', 'sfgsd@fsfsdf'),
(38, '6745', 'gdfgsdfg', 'dfgsdfgsfd', 'dfgsdfgsd@dsasfas'),
(39, 'sdfasdf', 'asdfasf', 'sdfasdf', 'dfasf@dfasfas'),
(40, '45324523', 'gfdgdf', 'dfsgsd', 'sdfgsd@sdadfasdffsd'),
(41, '343246534', 'sdgsdfgsd', 'sdfgsdg', 'fds@fddsfsd'),
(42, '252453', 'fsdfsa', 'asfsadaf', 'afsfas@sdfasdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `usuUsuario` varchar(25) NOT NULL,
  `usuPassword` varchar(60) NOT NULL,
  `usuRol` varchar(25) NOT NULL,
  `usuEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `usuUsuario`, `usuPassword`, `usuRol`, `usuEmpleado`) VALUES
(3, '11', '6512bd43d9caa6e02c990b0a82652dca', 'Administrador', 11),
(4, '5345', '7776e88b0c189539098176589250bcba', 'Asistente', 12),
(5, '435435', '1c8aa4d715046f5de5bb708ea8926168', 'Asistente', 13),
(6, 'asdas342', '549d5ffda1824e36f6ddc99b0239fb60', 'Administrador', 14),
(7, '231', '9b04d152845ec0a378394003c96da594', 'Asistente', 15),
(8, '121', '4c56ff4ce4aaf9573aa5dff913df997a', 'Asistente', 16),
(9, '2145', 'c182f930a06317057d31c73bb2fedd4f', 'Asistente', 17),
(10, '123123', '4297f44b13955235245b2497399d7a93', 'Asistente', 18),
(11, '00342', '9daa6c30079c95920c407f4ba15708d0', 'Asistente', 19),
(12, '121345', '0038d1bcbbb76870733e9f2ae0739faa', 'Asistente', 20),
(13, '3424', '71a5c0514ab83382d98154e5a5f9d813', 'Asistente', 21),
(14, '42523523', '35ab82ca11cfa773b0d01188cc7edeaa', 'Asistente', 22),
(15, '456346346', 'c6cc78c872a6a2b38ec85fc5400b9f77', 'Asistente', 23),
(16, '6745', 'a4ed074907dc9bc3c86cc52904d763e3', 'Asistente', 24),
(17, 'sdfasdf', '5e64fe04bfd8363b6c74ea86f5c867f1', 'Asistente', 25),
(18, '45324523', '2dd94a8b1b4b96e424508abbbfbc400f', 'Asistente', 26),
(19, '343246534', 'feda5d3e4e86d4dc838d6fb657496df0', 'Asistente', 27),
(20, '252453', 'ef00463c2a4279d9d58d452cb713906b', 'Asistente', 28);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD PRIMARY KEY (`idAlquiler`),
  ADD KEY `alqCarro` (`alqCarro`),
  ADD KEY `alqCliente` (`alqCliente`);

--
-- Indices de la tabla `carros`
--
ALTER TABLE `carros`
  ADD PRIMARY KEY (`idCarro`),
  ADD UNIQUE KEY `carPlaca` (`carPlaca`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `cliPersona` (`cliPersona`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`idEmpleado`),
  ADD KEY `empPersona` (`empPersona`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`idPersona`),
  ADD UNIQUE KEY `perIdentificacion` (`perIdentificacion`),
  ADD UNIQUE KEY `perCorreo` (`perCorreo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `usuUsuario` (`usuUsuario`),
  ADD KEY `usuEmpleado` (`usuEmpleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  MODIFY `idAlquiler` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carros`
--
ALTER TABLE `carros`
  MODIFY `idCarro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD CONSTRAINT `alquiler_ibfk_1` FOREIGN KEY (`alqCarro`) REFERENCES `carros` (`idCarro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `alquiler_ibfk_2` FOREIGN KEY (`alqCliente`) REFERENCES `clientes` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`cliPersona`) REFERENCES `personas` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`empPersona`) REFERENCES `personas` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`usuEmpleado`) REFERENCES `empleados` (`idEmpleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
