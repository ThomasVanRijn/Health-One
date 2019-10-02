-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 02 okt 2019 om 12:33
-- Serverversie: 10.4.6-MariaDB
-- PHP-versie: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthone`
--
CREATE DATABASE IF NOT EXISTS `healthone` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `healthone`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `artsen`
--

CREATE TABLE `artsen` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefoonnummer` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `artsen`
--

INSERT INTO `artsen` (`id`, `naam`, `adres`, `email`, `telefoonnummer`) VALUES
(1, 'Ramiz van der Meijden', 'Somerenseweg 190', 'b5uefxp7kyl@groupbuff.com', '06-9046995'),
(2, 'Abygail de Mos', 'Linthorst Homanlaan 86', '0uibufvyrogb@groupbuff.com', ' 06-6580620'),
(3, 'Antoine Jansema', 'Schulpweg 15', 'h8s9yq4cqvo@powerencry.com', '06-8766940'),
(4, 'Jian van de Loo', 'Zijtak Oostzijde 12', 'voklx5xpgq@powerencry.com', '06-86579064'),
(5, 'Gulsum Coolen', 'Nieuwstraat 198', 'j21ug9v175@meantinc.com', '06-51531500');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medicijnen`
--

CREATE TABLE `medicijnen` (
  `id` int(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `herhaal` tinyint(1) NOT NULL,
  `vergoed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `medicijnen`
--

INSERT INTO `medicijnen` (`id`, `naam`, `herhaal`, `vergoed`) VALUES
(1, 'test', 1, 1),
(2, 'aids pil', 1, 0),
(3, 'naam', 1, 1),
(4, 'papier', 1, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `patient`
--

CREATE TABLE `patient` (
  `id` int(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `leeftijd` int(255) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefoonnummer` int(255) NOT NULL,
  `verzekeringsnummer` int(255) NOT NULL,
  `aandoeningen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `patient`
--

INSERT INTO `patient` (`id`, `naam`, `leeftijd`, `adres`, `email`, `telefoonnummer`, `verzekeringsnummer`, `aandoeningen`) VALUES
(1, 'Dinna de Waard', 17, 'Vogelkersstraat 37', 'daandata1@gmail.com', 648681485, 129856, 'Cholera'),
(2, 'Daytonius Boone', 17, 'De brink 1660', 'daytonboone@gmail.com', 67893272, 129852, ''),
(3, 'Dylanus van der Hout', 17, 'Boomaweg 6a', 'Dylanvanderhout@gmail.com', 657119062, 132434344, ''),
(4, 'Collin van de Laar', 17, 'heulstraat 3', 'collinvandelaar@gmail.com', 657119061, 856, 'Geen'),
(347, 'tom', 54, 'hoistraat', 'asd@asd.com', 635620159, 654852, 'aids');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `artsen`
--
ALTER TABLE `artsen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `medicijnen`
--
ALTER TABLE `medicijnen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `artsen`
--
ALTER TABLE `artsen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `medicijnen`
--
ALTER TABLE `medicijnen`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
