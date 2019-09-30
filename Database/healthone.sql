-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 30 sep 2019 om 09:54
-- Serverversie: 10.4.6-MariaDB
-- PHP-versie: 7.3.9

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
(3, 'Dylanus van der Hout', 17, 'Boomaweg 6a', 'Dylanvanderhout@gmail.com', 657119062, 132434344, '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
