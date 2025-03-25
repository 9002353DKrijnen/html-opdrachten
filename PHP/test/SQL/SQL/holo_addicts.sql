-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 17 mrt 2025 om 15:14
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
-- Database: `holo_addicts`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE `klant` (
  `klant_id` int(11) NOT NULL,
  `klant_username` varchar(255) DEFAULT NULL,
  `klant_password` varchar(255) DEFAULT NULL,
  `klant_adres` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `klant`
--

INSERT INTO `klant` (`klant_id`, `klant_username`, `klant_password`, `klant_adres`) VALUES
(1, 'johndoe1', 'fa870a2658fc49993579f7471d86d0a54ca1267e52d3f9be2395d6f3689bdcc7', '123 Main St, Amsterdam'),
(2, 'janesmith2', 'b77f5643318b6f52887b23eba92f0f1068dd75a29a5be2812d4a1c1ccb19bc31', '456 Elm St, Rotterdam'),
(3, 'mikebrown3', '7bfd5078efc1b2b838e28a79574e2fc6bd9b7fb63edf789b3023ba12aff099fd', '789 Oak St, Utrecht'),
(4, 'laurasmith4', 'ad31b4a38001166d9db4850e12b32e75b535109bf75b20baa49207fcfed6aa80', '321 Pine St, The Hague'),
(5, 'davidharris5', 'ee667f85f73cb2275a1e86d1ce6cbc751a17c82d795d9ff52e45963686355cf4', '654 Birch St, Eindhoven'),
(6, 'sarawilson6', '8cdb08667fa45a5b935579f4981ad56c446cfce806dd176f88316550df328f81', '987 Cedar St, Groningen'),
(7, 'brianlee7', '51e6deec0a9031fd9581e51db698c4daa40095a6400e55a847628f35b6095e14', '741 Maple St, Maastricht'),
(8, 'emilydavis8', 'a8a50f7e641bfd7035f392d534420df9be408dd4e86ad42872afa33f0c3e3796', '852 Walnut St, Haarlem'),
(9, 'kevinmiller9', '60cb5af16b2dbb6a1e15cc1400187377a5654abbb20fa389c64309d00aa23fa0', '963 Chestnut St, Breda'),
(10, 'amandalewis10', 'a4e121cbfd849ec02d9198e4e67cd8efefbc446caf55082196c0c86faa7b833a', '159 Spruce St, Tilburg'),
(11, 'charlesmoore11', '46e5f1f1078d41cf3fecdeee229c313c115c34a4667eae612a4012562e135645', '753 Willow St, Nijmegen'),
(12, 'susanclark12', '363bc1d896fd8f59088ad82d279c774ef14b2b275bbb07cebd1987d3696cd331', '357 Fir St, Almere'),
(13, 'robertyoung13', '761540cd4c77bccee08bddce1051863e2c82ffc70ce3f113ea25d3fa6adef0d0', '258 Redwood St, Arnhem'),
(14, 'lisathomas14', 'fb01434f280e957dbb8ddbcbe0147e03db30406a50e1a77c04d2afb1080f5615', '369 Sequoia St, Amersfoort'),
(15, 'markhall15', 'dccf19b3b1434b1f622960d6f6670eefd86465c0b4bc4a4083ffec11f83f8eff', '741 Aspen St, Zwolle'),
(16, 'nancyadams16', 'fd762adec4a486305af4efa730fd52fcdd527645b29c98ecf03925bf5b57cca1', '852 Hickory St, Apeldoorn'),
(17, 'jamesbaker17', '07af8aa4e80bafa4e598775cbe85a9d17e9122285ef196c0bf1b1bddc9808c41', '963 Poplar St, Leiden'),
(18, 'patriciaroberts18', '2f0bda2b9db154ea5df993ed9bd80f8e3a5018853ebe37e581f414faa9b12b5e', '147 Sycamore St, Delft'),
(19, 'michaelgarcia19', 'b3c04ea694341975e19244f4b2f5455d7a34cf5de46ff37d3da28f6388841c6e', '258 Magnolia St, Deventer'),
(20, 'angelawilson20', '5674e682c263948095373091d314ed3c7912c571d5a56bf14acebcbe484dfc4a', '369 Dogwood St, Zwolle');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `leverancier`
--

CREATE TABLE `leverancier` (
  `leverancier_id` int(11) NOT NULL,
  `leverancier_naam` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `leverancier`
--

INSERT INTO `leverancier` (`leverancier_id`, `leverancier_naam`) VALUES
(1, 'wizards_of_the_coast'),
(2, 'nintendo'),
(3, 'disney'),
(4, 'bandai');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `klant_id` int(11) DEFAULT NULL,
  `order_prijs` float DEFAULT NULL,
  `order_payment` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `product_id`, `klant_id`, `order_prijs`, `order_payment`) VALUES
(1, '2025-02-07', 5, 1, 10.25, 0),
(2, '2025-03-05', 7, 8, 250.75, 1),
(3, '2024-06-18', 6, 17, 15.99, 0),
(4, '2025-02-20', 2, 16, 89.5, 1),
(5, '2024-09-30', 1, 2, 450.25, 0),
(6, '2024-12-10', 4, 14, 39.99, 1),
(7, '2025-01-15', 10, 19, 120, 0),
(8, '2024-07-25', 1, 13, 575.49, 1),
(9, '2024-11-05', 8, 18, 10, 0),
(10, '2025-03-10', 3, 16, 599.99, 1),
(11, '2024-05-01', 10, 12, 275.35, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_naam` varchar(255) DEFAULT NULL,
  `product_prijs` decimal(10,0) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `serie_id` int(11) DEFAULT NULL,
  `leverancier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`product_id`, `product_naam`, `product_prijs`, `type_id`, `serie_id`, `leverancier_id`) VALUES
(1, 'elite trainer box', 30, 3, 1, 2),
(2, 'one piece booster', 8, 2, 4, 4),
(3, 'pokemon single', 2, 1, 1, 2),
(4, 'yu-gi-oh starter deck', 15, 5, 2, 1),
(5, 'mtg duel deck box', 30, 3, 3, 1),
(6, 'eevee t-shirt', 15, 4, 1, 2),
(7, 'magic single', 3, 1, 3, 1),
(8, 'lorcana booster box', 20, 3, 5, 3),
(9, 'pokemon booster pack', 9, 2, 1, 2),
(10, 'lorcana single', 1, 1, 5, 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_serie`
--

CREATE TABLE `product_serie` (
  `serie_id` int(11) NOT NULL,
  `serie_naam` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `product_serie`
--

INSERT INTO `product_serie` (`serie_id`, `serie_naam`) VALUES
(1, 'pokemon'),
(2, 'yu-gi-oh'),
(3, 'magic: the gathering'),
(4, 'one piece'),
(5, 'disney lorcana');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_type`
--

CREATE TABLE `product_type` (
  `type_id` int(11) NOT NULL,
  `type_naam` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `product_type`
--

INSERT INTO `product_type` (`type_id`, `type_naam`) VALUES
(1, 'single'),
(2, 'booster_pack'),
(3, 'box_set'),
(4, 'merchandise'),
(5, 'starter_deck');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`klant_id`);

--
-- Indexen voor tabel `leverancier`
--
ALTER TABLE `leverancier`
  ADD PRIMARY KEY (`leverancier_id`);

--
-- Indexen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `klant_id` (`klant_id`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `type_id` (`type_id`,`serie_id`,`leverancier_id`),
  ADD KEY `serie_id` (`serie_id`),
  ADD KEY `leverancier_id` (`leverancier_id`);

--
-- Indexen voor tabel `product_serie`
--
ALTER TABLE `product_serie`
  ADD PRIMARY KEY (`serie_id`);

--
-- Indexen voor tabel `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `klant`
--
ALTER TABLE `klant`
  MODIFY `klant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT voor een tabel `leverancier`
--
ALTER TABLE `leverancier`
  MODIFY `leverancier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `product_serie`
--
ALTER TABLE `product_serie`
  MODIFY `serie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `product_type`
--
ALTER TABLE `product_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`klant_id`) REFERENCES `klant` (`klant_id`);

--
-- Beperkingen voor tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `product_type` (`type_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`serie_id`) REFERENCES `product_serie` (`serie_id`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`leverancier_id`) REFERENCES `leverancier` (`leverancier_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
