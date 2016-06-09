-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Jun 2016 um 11:36
-- Server-Version: 10.0.17-MariaDB
-- PHP-Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `haushaltsbuch`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Haushalt'),
(2, 'Einkauf');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `money_entries`
--

CREATE TABLE `money_entries` (
  `id` int(10) NOT NULL,
  `description` varchar(128) NOT NULL,
  `value` float NOT NULL,
  `user_id` int(8) NOT NULL,
  `category_id` int(8) NOT NULL,
  `month_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `money_entries`
--

INSERT INTO `money_entries` (`id`, `description`, `value`, `user_id`, `category_id`, `month_id`) VALUES
(1, 'Spar 10.01.2016', 15.12, 1, 2, 1),
(2, 'Lampen 20.02.2016', 140, 1, 1, 1),
(3, 'Spar ', 96.93, 2, 2, 1),
(4, 'Möbel', 149.98, 2, 1, 1),
(5, 'Hofer', 123, 1, 1, 1),
(15, 'Spar', 1, 1, 1, 2),
(26, 'Billa', 23.23, 2, 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `months`
--

CREATE TABLE `months` (
  `id` int(128) NOT NULL,
  `name` varchar(32) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `months`
--

INSERT INTO `months` (`id`, `name`) VALUES
(1, 'Jaenner'),
(2, 'Februar'),
(3, 'Maerz'),
(4, 'April'),
(5, 'Mai'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'August'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Dezember');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(64) NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(512) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'patrick', '098f6bcd4621d373cade4e832627b4f6'),
(2, 'martina', '098f6bcd4621d373cade4e832627b4f6');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `money_entries`
--
ALTER TABLE `money_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `money_entries`
--
ALTER TABLE `money_entries`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT für Tabelle `months`
--
ALTER TABLE `months`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
