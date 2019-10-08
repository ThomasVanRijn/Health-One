-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 08 okt 2019 om 11:46
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
CREATE DATABASE IF NOT EXISTS `healthone` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `healthone`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medicijnen`
--

CREATE TABLE `medicijnen` (
  `id` int(255) NOT NULL,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `herhaal` tinyint(1) NOT NULL,
  `vergoed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leeftijd` int(255) NOT NULL,
  `adres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefoonnummer` int(255) NOT NULL,
  `verzekeringsnummer` int(255) NOT NULL,
  `aandoeningen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `patient`
--

INSERT INTO `patient` (`id`, `naam`, `leeftijd`, `adres`, `email`, `telefoonnummer`, `verzekeringsnummer`, `aandoeningen`) VALUES
(1, 'Dinna de Waard', 17, 'Vogelkersstraat 3', 'daandata1@gmail.com', 64868148, 12985, 'Cholera'),
(3, 'Dylanus van der Hout', 17, 'Boomaweg 6a', 'Dylanvanderhout@gmail.com', 657119062, 132434344, ''),
(4, 'Collin van de Laar', 17, 'heulstraat 3', 'collinvandelaar@gmail.com', 657119061, 856, 'Geen'),
(348, 'Marcel de Jong', 23, 'Lange Straat 11', 'marceldejong@gmail.com', 612895520, 1192, 'Stress');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `recepten`
--

CREATE TABLE `recepten` (
  `id` int(11) NOT NULL,
  `uitgeschreven` timestamp NOT NULL DEFAULT current_timestamp(),
  `opgehaald` timestamp NOT NULL DEFAULT current_timestamp(),
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `functie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefoonnummer` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `functie`, `naam`, `adres`, `email`, `telefoonnummer`) VALUES
(18, 'arts1', '$2y$10$4dHpPL9q7xSo/N0vVG8hhOu3jycf8DGJulcUp4zW4Kj5zlvpDs8SW', '2019-10-07 08:58:31', 'artsen', 'Pietje', 'straat1', 'asd@asd.com', 2147483647),
(23, 'apo123', '$2y$10$0PZ.j.m90S61/fxAQknO.Og2A5p96J5aicnXNA6eam4bV3wle3wZS', '2019-10-07 19:46:21', 'apotheker', 'apo21341', '234324532', '423423', 2147483647),
(24, 'verzekering', '$2y$10$yrNs9U5z06tO0rWljfSkAuumZFw2vSsgy20Aqf2IQ5vuj2hudeFF2', '2019-10-07 19:48:24', 'verzekering', 'verzekering', 'verzekering', 'verzekering@.com', 24322354),
(25, 'artstest', '$2y$10$WNvtyfN.mb.2kcVmZIUL5ukEeFa9DVv2clVGh//BiL4/0./3B7sAS', '2019-10-07 19:55:18', 'artsen', 'artstest', 'artstest', 'arts@arts.com', 2342134),
(26, 'arts1234', '$2y$10$GkNxu/BgjiEZKVRKTMrG8OEbA8ulp.vRn/zs9tOEZhM35PyKNzUnK', '2019-10-07 20:05:09', 'artsen', 'arts1234', 'arts1234', 'fsdf', 3434453);

--
-- Indexen voor geëxporteerde tabellen
--

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
-- Indexen voor tabel `recepten`
--
ALTER TABLE `recepten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

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
-- AUTO_INCREMENT voor een tabel `recepten`
--
ALTER TABLE `recepten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `recepten`
--
ALTER TABLE `recepten`
  ADD CONSTRAINT `recepten_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
