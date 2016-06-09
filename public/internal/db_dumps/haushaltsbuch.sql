-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Jun 2016 um 15:58
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
-- Tabellenstruktur für Tabelle `current_debts`
--

CREATE TABLE `current_debts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `current_debts`
--

INSERT INTO `current_debts` (`id`, `user_id`, `value`) VALUES
(1, 1, 456),
(2, 2, 471);

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
(33, 'Spar', 5, 2, 1, 6),
(34, 'Spar', 5, 2, 1, 5),
(35, 'Spar', 10, 1, 1, 5),
(36, 'Spar', 10, 1, 1, 6),
(37, 'Hofer', 2, 2, 1, 6),
(38, 'Billa', 10, 1, 1, 6),
(42, '', 12, 2, 1, 6),
(45, 'spar', 123, 1, 1, 1),
(46, 'hofer', 230, 2, 1, 1),
(47, 'hofer', 123, 1, 1, 2),
(48, 'spar', 32, 2, 1, 2),
(49, 'Spar', 30, 1, 1, 3),
(50, 'hofer', 10, 2, 1, 3),
(51, 'hofer', 130, 1, 1, 4),
(52, 'spar', 30, 2, 1, 4),
(53, 'schulden bezahlt', 115, 2, 1, 6),
(54, 'Patrick', 10, 1, 1, 7),
(55, 'Tini ', 30, 2, 1, 7),
(57, 'bezahl', 10, 1, 1, 7);

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
-- Indizes für die Tabelle `current_debts`
--
ALTER TABLE `current_debts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `current_debts_user_id_uindex` (`user_id`);

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
-- AUTO_INCREMENT für Tabelle `current_debts`
--
ALTER TABLE `current_debts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `money_entries`
--
ALTER TABLE `money_entries`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
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
