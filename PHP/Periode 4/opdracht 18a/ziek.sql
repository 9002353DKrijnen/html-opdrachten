-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 25 mei 2025 om 21:52
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ziek`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `docent`
--

CREATE TABLE `docent` (
  `docent_id` int(11) NOT NULL,
  `naam` varchar(100) DEFAULT NULL,
  `vak` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `docent`
--

INSERT INTO `docent` (`docent_id`, `naam`, `vak`) VALUES
(1, 'Mevrouw Jansen', 'Wiskunde'),
(2, 'Meneer De Vries', 'Geschiedenis'),
(3, 'Mevrouw El Ouardi', 'Biologie'),
(4, 'Meneer Peters', 'Informatica'),
(5, 'Mevrouw Smits', 'Engels');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `leerling`
--

CREATE TABLE `leerling` (
  `leerling_id` int(11) NOT NULL,
  `naam` varchar(100) DEFAULT NULL,
  `klas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `leerling`
--

INSERT INTO `leerling` (`leerling_id`, `naam`, `klas`) VALUES
(1, 'Noah Jansen', '4A'),
(2, 'Emma de Vries', '4A'),
(3, 'Liam Bakker', '4A'),
(4, 'Tess Visser', '4A'),
(5, 'Milan Smit', '4A'),
(6, 'Sara Meijer', '4A'),
(7, 'Lucas Willems', '4B'),
(8, 'Julia Hendriks', '4B'),
(9, 'Daan Bos', '4B'),
(10, 'Anna van Dijk', '4B'),
(11, 'Sem Peters', '4B'),
(12, 'Eva de Boer', '4B'),
(13, 'Finn Kuipers', '4C'),
(14, 'Sophie Kramer', '4C'),
(15, 'Luuk Vos', '4C'),
(16, 'Lotte van Leeuwen', '4C'),
(17, 'Jayden Mol', '4C'),
(18, 'Zoë van Dam', '4C'),
(19, 'Niek Blom', '4D'),
(20, 'Maud Dekker', '4D'),
(21, 'Jens van Loon', '4D'),
(22, 'Fleur Post', '4D');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reden`
--

CREATE TABLE `reden` (
  `reden_id` int(11) NOT NULL,
  `leerling_id` int(11) DEFAULT NULL,
  `docent_id` int(11) DEFAULT NULL,
  `omschrijving` text DEFAULT NULL,
  `datum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `reden`
--

INSERT INTO `reden` (`reden_id`, `leerling_id`, `docent_id`, `omschrijving`, `datum`) VALUES
(11, 1, 1, 'sick', '2025-05-25'),
(12, 5, 3, 'doctor', '2025-05-25'),
(13, 3, 2, 'doctor', '2025-05-25'),
(14, 3, 2, 'doctor', '2025-05-25'),
(15, 1, 1, 'doctor', '2025-05-25'),
(16, 1, 1, 'doctor', '2025-05-25'),
(17, 1, 1, 'doctor', '2025-05-25'),
(18, 1, 1, 'sick', '2025-05-25'),
(19, 1, 1, 'sick', '2025-05-25'),
(20, 1, 1, 'sick', '2025-05-25'),
(21, 3, 3, 'marriage', '2025-05-25');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `docent`
--
ALTER TABLE `docent`
  ADD PRIMARY KEY (`docent_id`);

--
-- Indexen voor tabel `leerling`
--
ALTER TABLE `leerling`
  ADD PRIMARY KEY (`leerling_id`);

--
-- Indexen voor tabel `reden`
--
ALTER TABLE `reden`
  ADD PRIMARY KEY (`reden_id`),
  ADD KEY `leerling_id` (`leerling_id`),
  ADD KEY `docent_id` (`docent_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `docent`
--
ALTER TABLE `docent`
  MODIFY `docent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `leerling`
--
ALTER TABLE `leerling`
  MODIFY `leerling_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT voor een tabel `reden`
--
ALTER TABLE `reden`
  MODIFY `reden_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `reden`
--
ALTER TABLE `reden`
  ADD CONSTRAINT `reden_ibfk_1` FOREIGN KEY (`leerling_id`) REFERENCES `leerling` (`leerling_id`),
  ADD CONSTRAINT `reden_ibfk_2` FOREIGN KEY (`docent_id`) REFERENCES `docent` (`docent_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
