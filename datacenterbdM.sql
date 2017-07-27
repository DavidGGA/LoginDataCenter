-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2017 a las 02:10:20
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
('2', 'Wingo'),
('3', 'Palace');

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
(1, 'Ecommerce', '1'),
(2, 'Apps', '1'),
(3, 'ReporteGeneral', '2'),
(4, 'TigoLeads', '1'),
(5, 'TigoPortabilidad', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usecli`
--

CREATE TABLE `usecli` (
  `idUseCli` int(11) NOT NULL,
  `useID` varchar(50) DEFAULT NULL,
  `cliID` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usecli`
--

INSERT INTO `usecli` (`idUseCli`, `useID`, `cliID`) VALUES
(1, 'daniel.valencia@ariadnacg.com', '1'),
(2, 'daniel.valencia@ariadnacg.com', '2'),
(3, 'david.gallego@ariadnacg.com', '1'),
(4, 'david.gallego@ariadnacg.com', '2'),
(5, 'dfnarvaez@wingo.com', '2'),
(6, 'Dortega@wingo.com', '2'),
(7, 'MChaves@wingo.com', '2'),
(8, 'daniel.ramirez@maianetworks.com', '1'),
(9, 'daniel.ramirez@maianetworks.com', '2'),
(10, 'juan.espinosa@ariadnacg.com', '1'),
(11, 'juan.espinosa@ariadnacg.com', '2'),
(12, 'tigo@tigo.com', '1'),
(14, 'wingo@wingo.com', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `useEmail` varchar(50) NOT NULL,
  `usePassword` varchar(30) NOT NULL,
  `useStatus` tinyint(1) NOT NULL,
  `useOnline` tinyint(1) NOT NULL,
  `fk_cliID` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`useEmail`, `usePassword`, `useStatus`, `useOnline`, `fk_cliID`) VALUES
('ana.ramirez@millicom.com', 'anarmz/2017', 1, 1, '1'),
('angelica.ruiz@tigo.net.py', 'anruiz%py', 1, 1, '1'),
('cnieves@sv.tigo.com', 'nievesSV%2017', 1, 1, '1'),
('cristian.rivera@ariadnacg.com', 'crisRiv#2017', 1, 1, '1'),
('daniel.ramirez@maianetworks.com', 'daramirez2017#', 1, 1, '2'),
('daniel.valencia@ariadnacg.com', 'dvalencia#2017', 1, 1, '1'),
('david.gallego@ariadnacg.com', 'davidAriadna2017&', 1, 1, '2'),
('dfnarvaez@wingo.com', 'dfwingo#2017', 1, 1, '2'),
('Dortega@wingo.com', 'dortega2017*', 1, 1, '2'),
('felipe.ortiz@ariadnacg.com', 'fortiz$#17', 1, 1, '1'),
('gvega@sv.tigo.com', 'vegatigo&2017', 1, 1, '1'),
('juan.espinosa@ariadnacg.com', 'juanAriadna#', 1, 1, '2'),
('marcela.lara@ariadnacg.com', 'malara/tigo', 1, 1, '2'),
('mariacristina.benitez@tigo.net.py', 'crisbtz#net', 1, 1, '1'),
('max.gomez@ariadnacg.com', 'max$2017All', 1, 1, '1'),
('MChaves@wingo.com', 'wingoChaves2017$', 1, 1, '2'),
('mmelara@tigo.com.hn', 'laratigohn$', 1, 1, '1'),
('terrazass@tigo.net.bo', 'terrazass%bo', 1, 1, '1'),
('tigo@tigo.com', 'tigoDash', 1, 1, '1'),
('vasquezn@tigo.net.bo', 'vasquezn$bo', 1, 1, '1'),
('wingo@wingo.com', 'wingoDash', 1, 1, '2');

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
-- Indices de la tabla `usecli`
--
ALTER TABLE `usecli`
  ADD PRIMARY KEY (`idUseCli`),
  ADD KEY `useFK_idx` (`useID`),
  ADD KEY `cliFK_idx` (`cliID`);

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
-- Filtros para la tabla `usecli`
--
ALTER TABLE `usecli`
  ADD CONSTRAINT `cliFK` FOREIGN KEY (`cliID`) REFERENCES `client` (`cliID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `useFK` FOREIGN KEY (`useID`) REFERENCES `user` (`useEmail`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_cliID` FOREIGN KEY (`fk_cliID`) REFERENCES `client` (`cliID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
