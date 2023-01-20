-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2022 a las 21:24:31
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
-- Base de datos: `multitravel_services`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(5) NOT NULL,
  `nombre_categoria` varchar(25) NOT NULL,
  `categoria_p` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `categoria_p`) VALUES
(3, 'En Bogotá', 'Hotelería');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` int(11) NOT NULL,
  `nombre_servicio` varchar(50) NOT NULL,
  `descripcion_servicio` longtext NOT NULL,
  `precio` varchar(50) NOT NULL,
  `nombre_empresa` varchar(50) NOT NULL,
  `fecha_limite` varchar(50) NOT NULL,
  `imagen_serv` varchar(50) NOT NULL,
  `categoria_serv` varchar(50) NOT NULL,
  `descuento_aplicable` varchar(50) NOT NULL,
  `subcategoria1` varchar(30) NOT NULL,
  `subcategoria2` varchar(30) NOT NULL,
  `subcategoria3` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `nombre_servicio`, `descripcion_servicio`, `precio`, `nombre_empresa`, `fecha_limite`, `imagen_serv`, `categoria_serv`, `descuento_aplicable`, `subcategoria1`, `subcategoria2`, `subcategoria3`) VALUES
(1, 'Habitación para 4', 'Habitacion con una cama doble y dos camas sencilla Habitacion con una cama doble y dos camas sencilla Habitacion con una cama doble y dos camas sencilla Habitacion con una cama doble y dos camas sencilla Habitacion con una cama doble y dos camas sencilla Habitacion con una cama doble y dos camas sencilla Habitacion con una cama doble y dos camas sencilla Habitacion con una cama doble y dos camas sencilla Habitacion con una cama doble y dos camas sencilla Habitacion con una cama doble y dos camas sencilla Habitacion con una cama doble y dos camas sencilla ', '$500000 por noche', 'Hotel Caribe', '2193-07-28', 'descarga.jfif', 'Hotelería', '10% con tarjeta exito', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `documento` int(50) NOT NULL,
  `tipo_documento` varchar(50) NOT NULL,
  `nombre1` varchar(50) NOT NULL,
  `nombre2` varchar(50) NOT NULL,
  `apellido1` varchar(50) NOT NULL,
  `apellido2` varchar(50) NOT NULL,
  `pais_na` varchar(50) NOT NULL,
  `ciudad_na` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `pais_resi` varchar(50) NOT NULL,
  `ciudad_resi` varchar(50) NOT NULL,
  `direccion_resi` varchar(50) NOT NULL,
  `telefono` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user` text NOT NULL,
  `clave` varchar(50) NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`documento`, `tipo_documento`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `pais_na`, `ciudad_na`, `fecha_nacimiento`, `pais_resi`, `ciudad_resi`, `direccion_resi`, `telefono`, `email`, `user`, `clave`, `cargo`) VALUES
(47474, 'Cédula', 'David', 'Esteban', 'Caraballo', 'Naranjo', 'Colombia', 'Bog', '2022-09-07', 'Colombia', 'Bog', 'Carrrera79', 54373, 'Faranda@gmail.com', 'Faranda Hotels', '800618943025315f869e4e1f09471012', 2),
(765785, 'Cédula', 'David', 'Esteban', 'Caraballo', 'Naranjo', 'Colombia', 'Bog', '2022-09-07', 'Colombia', 'Bog', 'Carrrera79', 576575, 'david@gmail.com', 'DavidCN', 'f623e75af30e62bbd73d6df5b50bb7b5', 1),
(89569843, 'Cédula', 'David', 'Esteban', 'Caraballo', 'Naranjo', 'Colombia', 'Bog', '2022-09-16', 'Colombia', 'Bog', 'Carrrera79', 309274837, 'xilon@gmail.com', 'Xilon', '2db95e8e1a9267b7a1188556b2013b33', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`documento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
