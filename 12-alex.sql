-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Temps de generació: 02-02-2021 a les 10:03:10
-- Versió del servidor: 10.4.14-MariaDB
-- Versió de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `12-alex`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `partner`
--

CREATE TABLE `partner` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `partner`
--

INSERT INTO `partner` (`id`, `name`, `logo`) VALUES
(1, 'Uriage', 'uriage-logo.png'),
(2, 'Eucerin', 'eucerin_logo.jpg'),
(3, 'Cinfa', 'cinfa_logo.jpg'),
(4, 'Shiseido', 'shiseido_logo.png');

-- --------------------------------------------------------

--
-- Estructura de la taula `producte`
--

CREATE TABLE `producte` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `preu` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `tipus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de la taula `tipus`
--

CREATE TABLE `tipus` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de la taula `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `user`
--

INSERT INTO `user` (`id`, `username`, `role`, `password`) VALUES
(1, 'user', 'ROLE_USER', '$2y$12$VwwJnexXWZTO8TSmOUQg/uNSwCV3ZRjv3toPewZfVwQNK2XMGZ7VK'),
(2, 'admin', 'ROLE_ADMIN', '$2y$12$GD7lDnp9rT.hqPuQ8IHo.e8PjYbokPuFJ3BrtXsMWPA5f8TSiJcYy'),
(6, 'paco', 'ROLE_USER', '$2y$10$pQr/PIPHnjUYzwdWBxG48ugjPhWqoHkhVQ.0LxdtSwBigxnFWhzYO');

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `producte`
--
ALTER TABLE `producte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipus_id` (`tipus_id`);

--
-- Índexs per a la taula `tipus`
--
ALTER TABLE `tipus`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la taula `producte`
--
ALTER TABLE `producte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `tipus`
--
ALTER TABLE `tipus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restriccions per a les taules bolcades
--

--
-- Restriccions per a la taula `producte`
--
ALTER TABLE `producte`
  ADD CONSTRAINT `producte_ibfk_1` FOREIGN KEY (`tipus_id`) REFERENCES `tipus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
