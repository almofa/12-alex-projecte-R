-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Temps de generació: 26-02-2021 a les 13:32:24
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
(2, 'Eucerin', 'eucerin_logo.jpg'),
(3, 'Cinfa', 'cinfa_logo.jpg'),
(5, 'Uriage', 'PTN6034bbadd9207.png'),
(7, 'Españita', 'PTN6038a7b68f7c3.jpg');

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

--
-- Bolcament de dades per a la taula `producte`
--

INSERT INTO `producte` (`id`, `name`, `preu`, `logo`, `tipus_id`) VALUES
(1, 'BIODERMA gel protector', 8, 'cosmetica1.jpg', 2),
(2, 'ISIDIN crema fotoprotectora', 10, 'cosmetica2.jpg', 2),
(5, 'XHEKPON crema revitalizante 333ml', 13, 'cosmetica3.jpg', 2),
(7, 'BIODERMA crema hidratante 256ml', 15, 'cosmetica4.jpg', 2),
(9, 'HELIOCARE crema protectora/hidrantante 200ml', 30, 'cosmetica5.jpg', 2),
(10, 'TROFOLASTIN crema anti-estrías 250ml', 21, 'cosmetica6.jpg', 2),
(11, 'Sterillium gel antiséptico de manos con válvula 475ml', 9, 'higiene2.jpg', 1),
(12, 'Ducray Kelual DS champú estados descamativos 100ml', 11, 'higiene3.jpg', 1),
(15, 'Oral-B® Pro-Expert pasta dentífrica Multi-Protección 2x100ml', 13, 'higiene4.jpg', 1),
(16, 'Bioderma Atoderm gel de ducha 1l', 15, 'higiene5.jpg', 1),
(19, 'Lacer Clorhexidina colutorio 500ml', 30, 'higiene6.jpg', 1),
(20, 'Cumlaude hidratante interno 6uds', 4, 'higiene8.jpg', 1),
(23, 'Armolipid Plus 20comp', 8, 'salud2.jpg', 3),
(24, 'Alflorex&reg; para Colon Irritable 30 C&aacute;', 10, 'salud3.jpg', 2),
(27, 'Tena Men Level 3 16uds', 15, 'salud5.jpg', 3),
(28, 'Avène Cicalfate crema reparadora 100ml', 30, 'salud6.jpg', 3),
(31, 'Oxicol 28Cáps', 4, 'salud8.jpg', 3),
(32, 'Supradyn® Activo 90comp + 30comp', 22, 'salud11.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de la taula `tipus`
--

CREATE TABLE `tipus` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `tipus`
--

INSERT INTO `tipus` (`id`, `nom`) VALUES
(1, 'higiene'),
(2, 'cosmetica'),
(3, 'salut');

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
(2, 'admin', 'ROLE_ADMIN', '$2y$10$0Yzbi/q9e6Ar7xRMMTMQLOzZ32XTkJplZhNqDwfoEi9JZTAwXyZJC'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la taula `producte`
--
ALTER TABLE `producte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT per la taula `tipus`
--
ALTER TABLE `tipus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
