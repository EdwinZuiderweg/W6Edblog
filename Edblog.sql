-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 08 feb 2018 om 00:23
-- Serverversie: 10.1.29-MariaDB
-- PHP-versie: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Edblog`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Artikelen`
--

CREATE TABLE `Artikelen` (
  `Artnr` int(11) NOT NULL,
  `Artikelnaam` varchar(255) NOT NULL,
  `Artikelinhoud` varchar(10000) NOT NULL,
  `catid` int(11) NOT NULL,
  `allowreacties` tinyint(1) DEFAULT NULL,
  `Datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Artikelen`
--

INSERT INTO `Artikelen` (`Artnr`, `Artikelnaam`, `Artikelinhoud`, `catid`, `allowreacties`, `Datum`) VALUES
(1, 'quisquam est qui dolorem', 'Etiam ut ex non orci maximus convallis. Maecenas consectetur luctus gravida.\r\n          Maecenas tincidunt nulla quis quam vulputate, sit amet pellentesque tellus hendrerit.\r\n          Suspendisse potenti. Morbi dictum nulla diam, at maximus turpis vehicula et. Donec erat\r\n ligula, viverra vel feugiat et, convallis eu nunc. Etiam posuere libero vitae tempus ornare.', 1, 1, '2018-01-31 13:51:11'),
(2, 'quisquam est qui dolorem', '          Ut molestie nisi vel sollicitudin sagittis. Integer molestie diam in ex fermentum pretium.\r\n          Sed at turpis consectetur, condimentum massa a, sollicitudin tortor. Donec sit amet mi sed\r\n          mauris euismod facilisis ac imperdiet sapien. Aenean at maximus dolor. Nullam efficitur,\r\n          nunc vitae porta lobortis, orci est blandit nisl, id congue sapien tortor sed felis. Vestibulum\r\n          a lobortis nunc. Sed lacinia mauris non ornare ultrices. Nunc a neque molestie, porttitor risus\r\n          eu, dapibus elit. Pellentesque molestie imperdiet massa, ac dapibus arcu feugiat eu.', 1, 1, '2018-01-31 13:51:11'),
(4, 'quisquam est qui dolorem', 'Quisque vel rhoncus risus. Praesent purus nunc, vulputate a pretium nec, tempus vestibulum\r\n           elit. Vivamus accumsan dui sed dui euismod cursus. Morbi ac lacus id libero consectetur\r\n           semper id at nisl. Sed nisi ligula, interdum eget velit eget, vehicula porttitor nibh.\r\n           Integer placerat viverra fermentum. Aliquam ut quam viverra nibh iaculis tincidunt.\r\n           Pellentesque molestie enim non enim ultricies molestie.', 2, 1, '2018-01-31 13:53:42'),
(14, 'test123', 'PHP is lastig', 4, 1, '2018-02-07 11:47:04'),
(16, 'testartikel', 'Sport is een vermoeiende aangelegendheid', 9, 0, '2018-02-07 20:20:18'),
(19, 'dictatuur', 'Reacties verboten!', 10, 0, '2018-02-07 21:55:08');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categorieen`
--

CREATE TABLE `categorieen` (
  `catid` int(11) NOT NULL,
  `catnaam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `categorieen`
--

INSERT INTO `categorieen` (`catid`, `catnaam`) VALUES
(6, 'Doping'),
(5, 'Klimaatverandering'),
(8, 'muziek'),
(3, 'Natuur'),
(10, 'politiek'),
(4, 'Programmeren'),
(1, 'Schaken'),
(9, 'sport'),
(2, 'Wielrennen');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Reacties`
--

CREATE TABLE `Reacties` (
  `reactienr` int(11) NOT NULL,
  `artikelid` int(11) NOT NULL,
  `reactie` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Reacties`
--

INSERT INTO `Reacties` (`reactienr`, `artikelid`, `reactie`) VALUES
(2, 1, 'Onbegrijpelijke wartaal.'),
(3, 1, 'Wat een flauwekul zeg!'),
(4, 1, 'Komt geen zinnig woord uit!'),
(5, 4, 'Potjeslatijn'),
(6, 9, 'Ook goedendag.'),
(11, 9, 'hallo Jorrit'),
(12, 12, 'hallo'),
(13, 14, 'valt wel mee vind ik.'),
(14, 14, 'groenteboer');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `Artikelen`
--
ALTER TABLE `Artikelen`
  ADD PRIMARY KEY (`Artnr`);

--
-- Indexen voor tabel `categorieen`
--
ALTER TABLE `categorieen`
  ADD PRIMARY KEY (`catid`),
  ADD UNIQUE KEY `catnaam` (`catnaam`);

--
-- Indexen voor tabel `Reacties`
--
ALTER TABLE `Reacties`
  ADD PRIMARY KEY (`reactienr`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `Artikelen`
--
ALTER TABLE `Artikelen`
  MODIFY `Artnr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT voor een tabel `Reacties`
--
ALTER TABLE `Reacties`
  MODIFY `reactienr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
