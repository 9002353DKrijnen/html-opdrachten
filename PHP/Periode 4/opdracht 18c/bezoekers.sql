-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 09 jun 2025 om 22:37
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
-- Database: `statistiekensysteem`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bezoekers`
--

CREATE TABLE `bezoekers` (
  `id` int(11) NOT NULL,
  `land` varchar(100) DEFAULT NULL,
  `ip_adres` varchar(45) DEFAULT NULL,
  `provider` varchar(100) DEFAULT NULL,
  `browser` varchar(100) DEFAULT NULL,
  `datum_tijd` datetime DEFAULT NULL,
  `referer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `bezoekers`
--

INSERT INTO `bezoekers` (`id`, `land`, `ip_adres`, `provider`, `browser`, `datum_tijd`, `referer`) VALUES
(42, 'nl,en-US;q=0.7,en;q=0.3', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:139.0) Gecko/20100101 Firefox/139.0', '2025-06-09 18:27:24', 'Onbekend'),
(43, 'nl,en-US;q=0.7,en;q=0.3', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:139.0) Gecko/20100101 Firefox/139.0', '2025-06-09 18:27:38', 'Onbekend'),
(44, 'nl,en-US;q=0.7,en;q=0.3', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:139.0) Gecko/20100101 Firefox/139.0', '2025-06-09 18:27:48', 'Onbekend'),
(45, 'nl,en-US;q=0.7,en;q=0.3', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:139.0) Gecko/20100101 Firefox/139.0', '2025-06-09 18:31:50', '$SERVER[HTTP_REFERER]'),
(46, 'nl,en-US;q=0.7,en;q=0.3', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:139.0) Gecko/20100101 Firefox/139.0', '2025-06-09 18:31:59', '$SERVER[HTTP_REFERER]'),
(47, 'nl,en-US;q=0.7,en;q=0.3', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:139.0) Gecko/20100101 Firefox/139.0', '2025-06-09 22:23:44', '$SERVER[HTTP_REFERER]');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bezoekers`
--
ALTER TABLE `bezoekers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bezoekers`
--
ALTER TABLE `bezoekers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
