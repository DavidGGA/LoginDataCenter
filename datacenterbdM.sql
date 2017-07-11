-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-07-2017 a las 21:21:13
-- Versión del servidor: 10.1.24-MariaDB
-- Versión de PHP: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `datacenterbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client`
--

CREATE TABLE `client` (
  `cliID` varchar(30) NOT NULL,
  `cliName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `client`
--

INSERT INTO `client` (`cliID`, `cliName`) VALUES
('1', 'Tigo'),
('2', 'Wingo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `proID` int(11) NOT NULL,
  `proName` varchar(40) NOT NULL,
  `fk_cliPID` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`proID`, `proName`, `fk_cliPID`) VALUES
(1, 'ecommerce', '1'),
(2, 'apps', '1'),
(3, 'reporte_General', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `useEmail` varchar(30) NOT NULL,
  `usePassword` varchar(30) NOT NULL,
  `useStatus` tinyint(1) NOT NULL,
  `useOnline` tinyint(1) NOT NULL,
  `fk_cliID` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`useEmail`, `usePassword`, `useStatus`, `useOnline`, `fk_cliID`) VALUES
('1', '1', 1, 1, '1'),
('daniel.valencia@ariadnacg.com', '123', 1, 1, '1'),
('david.gallego@ariadnacg.com', '123', 1, 1, '2'),
('juan.espinosa@ariadnacg.com', '123', 1, 1, '2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`cliID`),
  ADD UNIQUE KEY `cliID_UNIQUE` (`cliID`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`proID`),
  ADD UNIQUE KEY `proID_UNIQUE` (`proID`),
  ADD KEY `fk_cliID_idx` (`fk_cliPID`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`useEmail`),
  ADD UNIQUE KEY `useEmail_UNIQUE` (`useEmail`),
  ADD KEY `fk_cliID_idx` (`fk_cliID`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_cliPID` FOREIGN KEY (`fk_cliPID`) REFERENCES `client` (`cliID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_cliID` FOREIGN KEY (`fk_cliID`) REFERENCES `client` (`cliID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
