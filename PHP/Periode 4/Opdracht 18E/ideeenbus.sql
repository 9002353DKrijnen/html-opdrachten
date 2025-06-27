-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 27 jun 2025 om 13:54
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
-- Database: `ideeenbus`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `style_emoji`
--

CREATE TABLE `style_emoji` (
  `id` int(11) NOT NULL,
  `emoji` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `style_text`
--

CREATE TABLE `style_text` (
  `id` int(11) NOT NULL,
  `style` varchar(45) DEFAULT NULL,
  `visitor_messages_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `visitor_messages`
--

CREATE TABLE `visitor_messages` (
  `id` int(11) NOT NULL,
  `titel` varchar(255) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `idea` text NOT NULL,
  `time` datetime NOT NULL,
  `style` varchar(45) DEFAULT NULL,
  `votes_id` int(11) NOT NULL,
  `style_emoji_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `amount` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `style_emoji`
--
ALTER TABLE `style_emoji`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `style_text`
--
ALTER TABLE `style_text`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_style_text_visitor_messages1_idx` (`visitor_messages_id`);

--
-- Indexen voor tabel `visitor_messages`
--
ALTER TABLE `visitor_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_visitor_messages_votes_idx` (`votes_id`),
  ADD KEY `fk_visitor_messages_style_emoji1_idx` (`style_emoji_id`);

--
-- Indexen voor tabel `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `style_emoji`
--
ALTER TABLE `style_emoji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `style_text`
--
ALTER TABLE `style_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `visitor_messages`
--
ALTER TABLE `visitor_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `style_text`
--
ALTER TABLE `style_text`
  ADD CONSTRAINT `fk_style_text_visitor_messages1` FOREIGN KEY (`visitor_messages_id`) REFERENCES `visitor_messages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `visitor_messages`
--
ALTER TABLE `visitor_messages`
  ADD CONSTRAINT `fk_visitor_messages_style_emoji1` FOREIGN KEY (`style_emoji_id`) REFERENCES `style_emoji` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_visitor_messages_votes` FOREIGN KEY (`votes_id`) REFERENCES `votes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
