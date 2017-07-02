-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 02. Jul 2017 um 14:45
-- Server-Version: 10.1.21-MariaDB
-- PHP-Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `spoticlouddb`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `songs`
--

CREATE TABLE `songs` (
  `title` text NOT NULL,
  `artist` text NOT NULL,
  `genre` text NOT NULL,
  `length` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `id` int(11) NOT NULL,
  `filename` text CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `songs`
--

INSERT INTO `songs` (`title`, `artist`, `genre`, `length`, `year`, `id`, `filename`) VALUES
('poor economic policies', 'adcBicycle', 'Instrumental', 199, 2006, 0, 'music/adcBicycle_-_02_-_poor_economic_policies.mp3'),
('Total Breakdown', 'Brad Sucks', 'Rock', 139, 2008, 0, 'music/Brad_Sucks_-_07_-_Total_Breakdown.mp3'),
('Eigenvalue Subspace Decomposition', 'Choc', 'Electronic', 299, 2009, 0, 'music/Choc_-_01_-_Eigenvalue_Subspace_Decomposition.mp3'),
('Sorry', 'Comfort Fit', 'Hip-Hop', 201, 2010, 0, 'music/Comfort_Fit_-_03_-_Sorry.mp3'),
('Kofein i CO2', 'inje', 'International', 242, 2017, 0, 'music/inje_-_08_-_Kofein_i_CO2.mp3'),
('Choice', 'N.I.M.', 'Rock', 203, 0000, 0, 'music/NIM_-_21_-_Choice.mp3'),
('Trail', 'Nobara Hayakawa', 'Electronic', 206, 2010, 0, 'music/Nobara_Hayakawa_-_01_-_Trail.mp3'),
('Ubogi Poeta', 'Ortalio', 'International', 324, 2017, 0, 'music/Ortalio_-_16_-_Ubogi_Poeta.mp3'),
('Bust This Bust That', 'Professor Kliq', 'Pop', 269, 2009, 0, 'music/Professor_Kliq_-_03_-_Bust_This_Bust_That.mp3'),
('These Days', 'Robin Grey', 'Indie', 234, 2008, 0, 'music/Robin_Grey_-_01_-_These_Days.mp3'),
('Falling For You (Piano Version)', 'Sean Fournier', 'Pop', 204, 2008, 0, 'music/Sean_Fournier_-_06_-_Falling_For_You_Piano_Version.mp3'),
('Islamatronic cantilliation', 'The Orientalist', 'International', 256, 2006, 0, 'music/The_Orientalist_-_06_-_Islamatronic_cantilliation.mp3');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
