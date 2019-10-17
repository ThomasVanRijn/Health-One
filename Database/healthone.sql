-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 17 okt 2019 om 16:32
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
  `vergoed` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `medicijnen`
--

INSERT INTO `medicijnen` (`id`, `naam`, `vergoed`) VALUES
(13, 'Paracetamol', 'Nee'),
(16, 'Antibiotica', 'Nee'),
(17, 'Aidsremmers', 'Ja');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `patient`
--

CREATE TABLE `patient` (
  `id` int(255) NOT NULL,
  `medicijn_id` int(11) NOT NULL,
  `recept_id` int(11) NOT NULL,
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

INSERT INTO `patient` (`id`, `medicijn_id`, `recept_id`, `naam`, `leeftijd`, `adres`, `email`, `telefoonnummer`, `verzekeringsnummer`, `aandoeningen`) VALUES
(1, 0, 0, 'Dinna de Waard', 17, 'Vogelkersstraat 3', 'daandata1@gmail.com', 64868148, 12985, 'Cholera'),
(3, 0, 0, 'Dylanus van der Hout', 17, 'Boomaweg 6a', 'Dylanvanderhout@gmail.com', 657119062, 132434344, ''),
(4, 0, 0, 'Collin van de Laar', 17, 'heulstraat 3', 'collinvandelaar@gmail.com', 657119061, 856, 'Geen'),
(348, 0, 0, 'Marcel de Jong', 23, 'Lange Straat 11', 'marceldejong@gmail.com', 612895520, 1192, 'Stress');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `recepten`
--

CREATE TABLE `recepten` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `medicijn_id` int(11) NOT NULL,
  `herhaal` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosering` int(11) NOT NULL,
  `omschrijving` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `uitgeschreven` timestamp NOT NULL DEFAULT current_timestamp(),
  `betaald` tinyint(1) NOT NULL DEFAULT 0,
  `afgehaald` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `recepten`
--

INSERT INTO `recepten` (`id`, `patient_id`, `medicijn_id`, `herhaal`, `dosering`, `omschrijving`, `uitgeschreven`, `betaald`, `afgehaald`) VALUES
(75, 3, 13, 'ja', 7, '1 week elke avond', '2019-10-10 12:24:26', 0, 0),
(76, 1, 13, 'nee', 45, 'asdasdasd', '2019-10-14 06:51:17', 0, 1),
(78, 1, 13, 'ja', 542, 'rfef', '2019-10-14 14:45:37', 0, 1),
(79, 1, 16, 'ja', 11, '22', '2019-10-14 14:48:50', 0, 1);

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
(17, 'test', '$2y$10$uoY02OwPMblodY.IR9bV4uHBSVLzHQKmVZSYihGJSJaYQXGDIyL.y', '2019-10-07 08:51:58', 'artsen', 'test', 'test', 'test', 989021),
(18, 'arts1', '$2y$10$4dHpPL9q7xSo/N0vVG8hhOu3jycf8DGJulcUp4zW4Kj5zlvpDs8SW', '2019-10-07 08:58:31', 'artsen', 'Piet', 'straat1', 'asd@asd.com', 2147483647),
(20, 'apotheker', '$2y$10$Hu9rK3QNH9xbpsSPsHZuQu3V7o.IJKf1o3fqym.MlQ6i6fayiHy3W', '2019-10-14 09:25:37', 'apotheker', 'jan', 'straat 2', 'jan@gmail.com', 656984512),
(22, 'apotheker1', '$2y$10$9Pjj8J5oI4LFGV4npq.wCeq1dn.A9.2hyQhrjN9WhUMIEskeRzpRG', '2019-10-14 17:03:51', 'apotheker', 'Bert', 'apotje', 'apo@apo.nl', 23213421),
(23, 'apotje', '$2y$10$blP0WsSmiBL46kObwSLCbu2QnA7M/6Z6lO2xu4E.MpxptjmKL.XEa', '2019-10-14 17:04:24', 'apotheker', 'apotje', 'apotje', 'apotje@apo.nl', 2147483647),
(24, 'ver', '$2y$10$roNgVdx0awt2fG2G7S3zue7525ZuC1jJeyMLGPV/5d79hmpQ0SVHm', '2019-10-17 16:14:40', 'verzekering', 'ver', 'ver', 'ver', 213),
(25, 'arts', '$2y$10$AeomCLLhEa9KI0glFAIVYOPVDML8NlJoMcVi0drNpOWn/uHJHmN.i', '2019-10-17 16:16:05', 'artsen', 'arts', 'arts', 'arts', 675);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicijn_id` (`medicijn_id`,`recept_id`);

--
-- Indexen voor tabel `recepten`
--
ALTER TABLE `recepten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicijn_id` (`medicijn_id`),
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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT voor een tabel `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=349;

--
-- AUTO_INCREMENT voor een tabel `recepten`
--
ALTER TABLE `recepten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `recepten`
--
ALTER TABLE `recepten`
  ADD CONSTRAINT `medicijn_id` FOREIGN KEY (`medicijn_id`) REFERENCES `medicijnen` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_id` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
