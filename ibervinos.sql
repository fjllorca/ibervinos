-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2015 a las 09:05:04
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ibervinos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `origen`
--

CREATE TABLE  'origen' (
  'idorigen' int(11) NOT NULL,
  'nombre' varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `origen`
--

INSERT INTO `origen` (`idorigen`, `nombre`) VALUES
(1, 'Rioja'),
(2, 'Canarias'),
(3, 'Srancia'),
(4, 'otro'),
(5, 'La gitana'),
(6, 'Seda'),
(7, 'La guardia'),
(8, 'palen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `idproveedor` int(6) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `ciudad` varchar(15) NOT NULL,
  `direccion` varchar(15) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idproveedor`, `nombre`, `ciudad`, `direccion`, `telefono`, `email`) VALUES
(0, 'Juanma', 'Graná', 'TU BUSCAAAAAAAA', 545656767, 'xc xcv'),
(1, 'VinoRosal', 'Motril', 'ASUSTATE_ES_MOT', 985652325, 'juanesrosales@gmail.com'),
(2, 'Juan', 'Jerez', 'C', 658652323, 'juanma@hotmail.com'),
(4, 'Productos Daver', 'Cadiz', 'C/ Virgen de lo', 952877163, 'ProductosDaver@hotmail.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `idtipo` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`idtipo`, `nombre`) VALUES
(1, 'Blanco'),
(2, 'Rosados'),
(3, 'Tintos Nacional'),
(4, 'Tintos Internacionales'),
(5, 'Cavas, Champagn'),
(6, 'Vino de la tierra'),
(7, 'Generosos, Dulces'),
(8, 'Vino que sorprende'),
(9, 'CALASU'),
(10, 'pa borrar'),
(12, 'pa borrar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vende`
--

CREATE TABLE IF NOT EXISTS `vende` (
  `idvende` int(6) NOT NULL,
  `idvino` int(11) NOT NULL,
  `idtipo` int(11) NOT NULL,
  `idorigen` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vende`
--

INSERT INTO `vende` (`idvende`, `idvino`, `idtipo`, `idorigen`, `precio`) VALUES
(3, 3, 2, 2, 55),
(4, 4, 2, 5, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vino`
--

CREATE TABLE IF NOT EXISTS `vino` (
  `idvino` int(6) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `variedad` varchar(15) NOT NULL,
  `idorigen` int(6) NOT NULL,
  `idtipo` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vino`
--

INSERT INTO `vino` (`idvino`, `nombre`, `variedad`, `idorigen`, `idtipo`) VALUES
(3, 'ty', 'tyryt', 5, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `origen`
--
ALTER TABLE `origen`
  ADD PRIMARY KEY (`idorigen`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idproveedor`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`idtipo`);

--
-- Indices de la tabla `vende`
--
ALTER TABLE `vende`
  ADD PRIMARY KEY (`idvende`);

--
-- Indices de la tabla `vino`
--
ALTER TABLE `vino`
  ADD PRIMARY KEY (`idvino`,`nombre`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
