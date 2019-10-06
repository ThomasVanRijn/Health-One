-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 06 okt 2019 om 12:46
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
(2, 'aids pil', 1, 0),
(3, 'naampje', 0, 1);

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
(1, 'Dinna de Waard', 17, 'Vogelkersstraat 3', 'daandata1@gmail.com', 64868148, 12985, 'Cholera'),
(3, 'Dylanus van der Hout', 17, 'Boomaweg 6a', 'Dylanvanderhout@gmail.com', 657119062, 132434344, ''),
(4, 'Collin van de Laar', 17, 'heulstraat 3', 'collinvandelaar@gmail.com', 657119061, 856, 'Geen'),
(347, 'tom', 54, 'hoistraat', 'asd@asd.com', 635620159, 654852, 'aids'),
(348, 'Marcel de Jong', 23, 'Lange Straat 11', 'marceldejong@gmail.com', 612895520, 1192, 'Stress');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `functie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `functie`) VALUES
(1, 'test', '$2y$10$hs6PNiyRN4Q8b7e9ujYzW.NncE7wF0Dj0XB3OxnX4nrgSQf8rt8Fq', '2019-10-06 11:48:13', 'arts'),
(3, 'collinvandelaar@gmail.com', '$2y$10$cPImEM6fhNsZsJ3FnuVZb.scdPD0M1Ywvcwhw0a011SgbFwzeAPtK', '2019-10-06 12:18:31', ''),
(4, 'testjes', '$2y$10$cRUZvDYZc04Et/7urFhMledVZmvF5g3aMz2WeYiwEBs4N3sJ052Ma', '2019-10-06 12:31:06', ''),
(5, 'collin', '$2y$10$vZOXfVjYyLEvnNyTI789suwETQLc0jo.fPH8grOHc7Wctr7XMT9A6', '2019-10-06 12:38:26', '');

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
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `functie` (`functie`);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=349;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
