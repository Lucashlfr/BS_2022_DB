-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 07. Jul 2022 um 20:36
-- Server-Version: 10.4.24-MariaDB
-- PHP-Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `berufsschule_sql`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `module_autos`
--

CREATE TABLE `module_autos` (
  `uuid_auto` varchar(255) NOT NULL,
  `uuid_modell` varchar(255) NOT NULL,
  `kennzeichen` varchar(255) DEFAULT NULL,
  `uuid_reifen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `module_autos`
--

INSERT INTO `module_autos` (`uuid_auto`, `uuid_modell`, `kennzeichen`, `uuid_reifen`) VALUES
('62c71933f2b77', '62c7177e27be7', 'GER LH-157', '62c718de0fd64'),
('62c7193ef3036', '62c7188aa034c', 'GER MX-211', '62c7190502110'),
('62c7194cb246d', '62c7188aa034c', 'GER AZ-623', '62c719172c3ec');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `module_map_auto_mieter`
--

CREATE TABLE `module_map_auto_mieter` (
  `uuid_mietvorgang` varchar(255) NOT NULL,
  `uuid_auto` varchar(255) NOT NULL,
  `uuid_mieter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `module_map_auto_mieter`
--

INSERT INTO `module_map_auto_mieter` (`uuid_mietvorgang`, `uuid_auto`, `uuid_mieter`) VALUES
('62c71affbee53', '62c71933f2b77', '62c719680b6b0'),
('62c71b0672518', '62c7193ef3036', '62c71982a83c2'),
('62c71b0d40f0d', '62c7193ef3036', '62c71982a83c2'),
('62c71b103c5a0', '62c7194cb246d', '62c71982a83c2');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `module_marken`
--

CREATE TABLE `module_marken` (
  `uuid_marken` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `abkuerzung` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `module_marken`
--

INSERT INTO `module_marken` (`uuid_marken`, `name`, `abkuerzung`) VALUES
('62c716d65390e', 'Volkswagen', 'VW'),
('62c7171799163', 'Opel', 'OP');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `module_mieter`
--

CREATE TABLE `module_mieter` (
  `uuid_mieter` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `vorname` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `gebdatum` varchar(255) DEFAULT NULL,
  `führerschein_klassen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `module_mieter`
--

INSERT INTO `module_mieter` (`uuid_mieter`, `name`, `vorname`, `adresse`, `gebdatum`, `führerschein_klassen`) VALUES
('62c719680b6b0', 'Helfer', 'Lucas', 'Musterstraße 21, Karlsruhe', '15.01.2021', 'B'),
('62c71982a83c2', 'Geiser', 'Lukas', 'Musterstraße 21, Mannheim', '23.01.1997', 'AB');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `module_modells`
--

CREATE TABLE `module_modells` (
  `uuid_modell` varchar(255) NOT NULL,
  `uuid_marken` varchar(255) NOT NULL,
  `ausstattung` varchar(255) DEFAULT NULL,
  `farbe` varchar(255) DEFAULT NULL,
  `bezeichnung` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `module_modells`
--

INSERT INTO `module_modells` (`uuid_modell`, `uuid_marken`, `ausstattung`, `farbe`, `bezeichnung`) VALUES
('62c7177e27be7', '62c7171799163', 'Keine', 'Blau', 'Corsa'),
('62c7188aa034c', '62c716d65390e', 'Klimaanlage', 'Rot', 'Golf');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `module_reifen`
--

CREATE TABLE `module_reifen` (
  `uuid_reifen` varchar(255) NOT NULL,
  `bezeichnung` varchar(255) DEFAULT NULL,
  `typ` varchar(255) DEFAULT NULL,
  `hersteller` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `module_reifen`
--

INSERT INTO `module_reifen` (`uuid_reifen`, `bezeichnung`, `typ`, `hersteller`) VALUES
('62c718de0fd64', '1.6 GSI CORSA-A-CC', 'Ganzjahresreifen', 'Goodyear'),
('62c7190502110', '1.21 GSI Golf-U-DA', 'Winterreifen', 'Michelin'),
('62c719172c3ec', '2.32 GSI Golf-U-891', 'Sommerreifen', 'Barum');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `module_autos`
--
ALTER TABLE `module_autos`
  ADD PRIMARY KEY (`uuid_auto`),
  ADD KEY `uuid_modell` (`uuid_modell`),
  ADD KEY `uuid_reifen` (`uuid_reifen`);

--
-- Indizes für die Tabelle `module_map_auto_mieter`
--
ALTER TABLE `module_map_auto_mieter`
  ADD PRIMARY KEY (`uuid_mietvorgang`),
  ADD KEY `uuid_auto` (`uuid_auto`),
  ADD KEY `uuid_mieter` (`uuid_mieter`);

--
-- Indizes für die Tabelle `module_marken`
--
ALTER TABLE `module_marken`
  ADD PRIMARY KEY (`uuid_marken`);

--
-- Indizes für die Tabelle `module_mieter`
--
ALTER TABLE `module_mieter`
  ADD PRIMARY KEY (`uuid_mieter`);

--
-- Indizes für die Tabelle `module_modells`
--
ALTER TABLE `module_modells`
  ADD PRIMARY KEY (`uuid_modell`),
  ADD KEY `uuid_marken` (`uuid_marken`);

--
-- Indizes für die Tabelle `module_reifen`
--
ALTER TABLE `module_reifen`
  ADD PRIMARY KEY (`uuid_reifen`);

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `module_autos`
--
ALTER TABLE `module_autos`
  ADD CONSTRAINT `module_autos_ibfk_1` FOREIGN KEY (`uuid_modell`) REFERENCES `module_modells` (`uuid_modell`),
  ADD CONSTRAINT `module_autos_ibfk_2` FOREIGN KEY (`uuid_reifen`) REFERENCES `module_reifen` (`uuid_reifen`);

--
-- Constraints der Tabelle `module_map_auto_mieter`
--
ALTER TABLE `module_map_auto_mieter`
  ADD CONSTRAINT `module_map_auto_mieter_ibfk_1` FOREIGN KEY (`uuid_auto`) REFERENCES `module_autos` (`uuid_auto`),
  ADD CONSTRAINT `module_map_auto_mieter_ibfk_2` FOREIGN KEY (`uuid_mieter`) REFERENCES `module_mieter` (`uuid_mieter`);

--
-- Constraints der Tabelle `module_modells`
--
ALTER TABLE `module_modells`
  ADD CONSTRAINT `module_modells_ibfk_1` FOREIGN KEY (`uuid_marken`) REFERENCES `module_marken` (`uuid_marken`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
