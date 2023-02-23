-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 23 feb 2023 om 12:38
-- Serverversie: 5.7.36
-- PHP-versie: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Nailstudio`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Afspraak`
--

DROP TABLE IF EXISTS `Afspraak`;
CREATE TABLE IF NOT EXISTS `Afspraak` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Kleuren` varchar(100) NOT NULL,
  `Tel` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Afspraak` datetime NOT NULL,
  `Behandeling` varchar(500) NOT NULL,
  `huidigeDatum` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Afspraak`
--

INSERT INTO `Afspraak` (`Id`, `Kleuren`, `Tel`, `Email`, `Afspraak`, `Behandeling`, `huidigeDatum`) VALUES
(16, '#000000', 631521089, '335476@student.mboutrecht.nl', '1222-12-12 01:01:00', 'on', '2023-02-23 12:30:45');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
