-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2021 a las 22:33:15
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_tst`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_user`
--

CREATE TABLE `rol_user` (
  `id` int(11) NOT NULL,
  `rol_description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol_user`
--

INSERT INTO `rol_user` (`id`, `rol_description`) VALUES
(1, 'ROL_ADMIN'),
(2, 'ROL_USER');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp(),
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `password`, `email`, `status`, `date_creation`, `id_rol`) VALUES
(1, 'carlos', 'rojas', '25d55ad283aa400af464c76d713c07ad', 'carlos@gmail.com', 1, '2021-10-21 17:28:06', 1);
(2, 'user_test', 'test_lastName', '25d55ad283aa400af464c76d713c07ad', 'test_@gmail.com', 1, '2021-10-21 17:28:06', 1);
(3, 'user_test', 'fernandez', '25d55ad283aa400af464c76d713c07ad', 'u_fer@gmail.com', 1, '2021-10-21 17:28:06', 2);
(4, 'user_test', 'rojas', '25d55ad283aa400af464c76d713c07ad', 'u_rojas@gmail.com', 1, '2021-10-21 17:28:06', 2);
(5, 'user_test', 'perez', '25d55ad283aa400af464c76d713c07ad', 'u_perez@gmail.com', 1, '2021-10-21 17:28:06', 1);
(6, 'user_test', 'gimenez', '25d55ad283aa400af464c76d713c07ad', 'u_gime@gmail.com', 1, '2021-10-21 17:28:06', 2);
(7, 'user_test', 'provincia', '25d55ad283aa400af464c76d713c07ad', 'provincia@gmail.com', 1, '2021-10-21 17:28:06', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `rol_user`
--
ALTER TABLE `rol_user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `rol_user`
--
ALTER TABLE `rol_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
