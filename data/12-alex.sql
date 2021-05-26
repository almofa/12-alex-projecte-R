-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2021 a las 13:50:26
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `12-alex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partner`
--

CREATE TABLE `partner` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `partner`
--

INSERT INTO `partner` (`id`, `name`, `logo`) VALUES
(1, 'cinfa', 'cinfa_logo.jpg'),
(2, 'eucerin', 'eucerin_logo.jpg'),
(3, 'sisheido', 'shiseido_logo.png'),
(4, 'uriage', 'uriage-logo.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producte`
--

CREATE TABLE `producte` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `preu` int(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `tipus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producte`
--

INSERT INTO `producte` (`id`, `name`, `preu`, `logo`, `tipus_id`) VALUES
(1, 'Producte1 ', 19, 'cosmetica1.jpg', 2),
(2, 'Producte2', 10, 'higiene2.jpg', 1),
(4, 'Producte3', 12, 'salud2.jpg', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipus`
--

CREATE TABLE `tipus` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipus`
--

INSERT INTO `tipus` (`id`, `nom`) VALUES
(1, 'higiene'),
(2, 'cosmetica'),
(5, 'salut');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'user', '$2y$12$xbtEssmGj0BLjsNeUIC3deqFq0J9TTAW5hjs9vtrKeO/EJk6yLYLm', 'ROLE_USER'),
(2, 'admin', '$2y$12$/YwHdopGzv0476J1.Cu4f.yu9oCyMZXdtrhDfAhg1liOOUj9F4dSi', 'ROLE_ADMIN'),
(3, 'paco', '$2y$12$lWwpIIxZTMj5b1KX2UAkgu7lqxz9BFdtcYNUn2deUkOm0Tbh6hmbi', 'ROLE_USER'),
(5, 'estelita', '$2y$10$I5MakJH/Zk4GQ8J1X7vvEeG9NHqfT2juon7scHsltbQkz.io93b9W', 'ROLE_USER'),
(6, 'SDGSD', '$2y$10$t5bkErdXm3QXwKL6Imih8OGOdknDMcct2RJZuapVTtJtwSL8XGnnO', 'ROLE_USER');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producte`
--
ALTER TABLE `producte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipus_id` (`tipus_id`);

--
-- Indices de la tabla `tipus`
--
ALTER TABLE `tipus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `producte`
--
ALTER TABLE `producte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipus`
--
ALTER TABLE `tipus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producte`
--
ALTER TABLE `producte`
  ADD CONSTRAINT `producte_ibfk_1` FOREIGN KEY (`tipus_id`) REFERENCES `tipus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
