-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 16 mei 2025 om 08:21
-- Serverversie: 8.2.0
-- PHP-versie: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rijschool`
--
CREATE DATABASE IF NOT EXISTS `rijschool` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `rijschool`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `auto`
--

DROP TABLE IF EXISTS `auto`;
CREATE TABLE IF NOT EXISTS `auto` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Merk` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Kenteken` varchar(20) DEFAULT NULL,
  `Brandstof` enum('elektrisch','benzine') DEFAULT NULL,
  `IsActief` tinyint(1) DEFAULT '1',
  `Opmerking` text,
  `DatumAangemaakt` datetime DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Kenteken` (`Kenteken`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `auto`
--

INSERT INTO `auto` (`Id`, `Merk`, `Type`, `Kenteken`, `Brandstof`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 'Volkswagen', 'Polo', 'AB-123-C', 'benzine', 1, NULL, '2025-05-16 10:15:48', '2025-05-16 10:15:48'),
(2, 'Tesla', 'Model 3', 'EL-456-D', 'elektrisch', 1, NULL, '2025-05-16 10:15:48', '2025-05-16 10:15:48'),
(3, 'Ford', 'Fiesta', 'CD-789-E', 'benzine', 1, NULL, '2025-05-16 10:17:57', '2025-05-16 10:17:57'),
(4, 'Renault', 'ZOE', 'EL-321-F', 'elektrisch', 1, NULL, '2025-05-16 10:17:57', '2025-05-16 10:17:57'),
(5, 'BMW', 'i3', 'EL-654-G', 'elektrisch', 1, NULL, '2025-05-16 10:17:57', '2025-05-16 10:17:57');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `betaling`
--

DROP TABLE IF EXISTS `betaling`;
CREATE TABLE IF NOT EXISTS `betaling` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `FactuurId` int DEFAULT NULL,
  `Datum` date DEFAULT NULL,
  `Bedrag` decimal(10,2) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `IsActief` tinyint(1) DEFAULT '1',
  `Opmerking` text,
  `DatumAangemaakt` datetime DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `FactuurId` (`FactuurId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `betaling`
--

INSERT INTO `betaling` (`Id`, `FactuurId`, `Datum`, `Status`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 1, '2024-01-16', 'Voltooid', 1, NULL, '2025-05-16 10:15:48', '2025-05-16 10:15:48'),
(2, 2, '2024-02-15', 'In behandeling', 1, NULL, '2025-05-16 10:17:58', '2025-05-16 10:17:58'),
(3, 3, '2024-03-12', 'Voltooid', 1, NULL, '2025-05-16 10:17:58', '2025-05-16 10:17:58'),
(4, 4, '2024-04-15', 'Voltooid', 1, NULL, '2025-05-16 10:17:58', '2025-05-16 10:17:58');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `GebruikerId` int DEFAULT NULL,
  `Straatnaam` varchar(100) DEFAULT NULL,
  `Huisnummer` varchar(10) DEFAULT NULL,
  `Toevoeging` varchar(10) DEFAULT NULL,
  `Postcode` varchar(10) DEFAULT NULL,
  `Plaats` varchar(100) DEFAULT NULL,
  `Mobiel` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `IsActief` tinyint(1) DEFAULT '1',
  `Opmerking` text,
  `DatumAangemaakt` datetime DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `GebruikerId` (`GebruikerId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `contact`
--

INSERT INTO `contact` (`Id`, `GebruikerId`, `Straatnaam`, `Huisnummer`, `Toevoeging`, `Postcode`, `Plaats`, `Mobiel`, `Email`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 1, 'Dorpsstraat', '12', '', '1234AB', 'Amsterdam', '0612345678', 'jan@email.com', 1, NULL, '2025-05-16 10:15:48', '2025-05-16 10:15:48'),
(2, 2, 'Lindelaan', '23', 'A', '5678CD', 'Rotterdam', '0623456789', 'sara@email.com', 1, NULL, '2025-05-16 10:15:48', '2025-05-16 10:15:48'),
(3, 4, 'Bergstraat', '10', '', '3456GH', 'Eindhoven', '0634567890', 'lisa@email.com', 1, NULL, '2025-05-16 10:17:57', '2025-05-16 10:17:57'),
(4, 5, 'Zonstraat', '88', 'B', '6543LK', 'Den Haag', '0645678901', 'kevin@email.com', 1, NULL, '2025-05-16 10:17:57', '2025-05-16 10:17:57'),
(5, 6, 'Laanweg', '4', '', '7890AB', 'Tilburg', '0656789012', 'emma@email.com', 1, NULL, '2025-05-16 10:17:57', '2025-05-16 10:17:57');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `examen`
--

DROP TABLE IF EXISTS `examen`;
CREATE TABLE IF NOT EXISTS `examen` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `InschrijvingId` int DEFAULT NULL,
  `InstructeurId` int DEFAULT NULL,
  `Begindatum` date DEFAULT NULL,
  `Begintijd` time DEFAULT NULL,
  `Einddatum` date DEFAULT NULL,
  `Eindtijd` time DEFAULT NULL,
  `Locatie` varchar(100) DEFAULT NULL,
  `Resultaat` enum('Geslaagd','Gezakt') DEFAULT NULL,
  `IsActief` tinyint(1) DEFAULT '1',
  `Commentaar` text,
  `DatumAangemaakt` datetime DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `InschrijvingId` (`InschrijvingId`),
  KEY `InstructeurId` (`InstructeurId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `examen`
--

INSERT INTO `examen` (`Id`, `InschrijvingId`, `InstructeurId`, `Begindatum`, `Begintijd`, `Einddatum`, `Eindtijd`, `Locatie`, `Resultaat`, `IsActief`, `Commentaar`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 1, 1, '2024-06-15', '09:00:00', '2024-06-15', '10:00:00', 'CBR Utrecht', 'Geslaagd', 1, NULL, '2025-05-16 10:15:48', '2025-05-16 10:15:48'),
(2, 2, 2, '2024-07-01', '10:00:00', '2024-07-01', '11:00:00', 'CBR Eindhoven', 'Gezakt', 1, NULL, '2025-05-16 10:17:58', '2025-05-16 10:17:58'),
(3, 3, 3, '2024-08-15', '14:00:00', '2024-08-15', '15:00:00', 'CBR Rotterdam', 'Geslaagd', 1, NULL, '2025-05-16 10:17:58', '2025-05-16 10:17:58'),
(4, 4, 1, '2024-09-10', '09:00:00', '2024-09-10', '10:00:00', 'CBR Utrecht', 'Geslaagd', 1, NULL, '2025-05-16 10:17:58', '2025-05-16 10:17:58');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `factuur`
--

DROP TABLE IF EXISTS `factuur`;
CREATE TABLE IF NOT EXISTS `factuur` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `InschrijvingId` int DEFAULT NULL,
  `Factuurnummer` varchar(50) DEFAULT NULL,
  `Factuurdatum` date DEFAULT NULL,
  `BedragExcBtw` decimal(10,2) DEFAULT NULL,
  `Btw` decimal(10,2) DEFAULT NULL,
  `BedragIncBtw` decimal(10,2) DEFAULT NULL,
  `Factuurstatus` varchar(50) DEFAULT NULL,
  `IsActief` tinyint(1) DEFAULT '1',
  `Opmerking` text,
  `DatumAangemaakt` datetime DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Factuurnummer` (`Factuurnummer`),
  KEY `InschrijvingId` (`InschrijvingId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `factuur`
--

INSERT INTO `factuur` (`Id`, `InschrijvingId`, `Factuurnummer`, `Factuurdatum`, `BedragExcBtw`, `Btw`, `BedragIncBtw`, `Factuurstatus`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 1, 'F2024001', '2024-01-15', 450.00, 94.50, 544.50, 'Betaald', 1, NULL, '2025-05-16 10:15:48', '2025-05-16 10:15:48'),
(2, 2, 'F2024002', '2024-02-10', 850.00, 178.50, 1028.50, 'Open', 1, NULL, '2025-05-16 10:17:58', '2025-05-16 10:17:58'),
(3, 3, 'F2024003', '2024-03-10', 600.00, 126.00, 726.00, 'Betaald', 1, NULL, '2025-05-16 10:17:58', '2025-05-16 10:17:58'),
(4, 4, 'F2024004', '2024-04-10', 470.00, 98.70, 568.70, 'Betaald', 1, NULL, '2025-05-16 10:17:58', '2025-05-16 10:17:58');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker`
--


DROP TABLE IF EXISTS `gebruiker`;
CREATE TABLE IF NOT EXISTS `gebruiker` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Voornaam` varchar(50) DEFAULT NULL,
  `Tussenvoegsel` varchar(20) DEFAULT NULL,
  `Achternaam` varchar(50) DEFAULT NULL,
  `Geboortedatum` date DEFAULT NULL,
  `Gebruikersnaam` varchar(50) DEFAULT NULL,
  `Wachtwoord` varchar(255) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL, -- <-- NIEUWE KOLOM TOEGEVOEGD
  `IsIngelogd` tinyint(1) DEFAULT '0',
  `Ingelogd` datetime DEFAULT NULL,
  `Uitgelogd` datetime DEFAULT NULL,
  `IsActief` tinyint(1) DEFAULT '1',
  `Opmerking` text,
  `DatumAangemaakt` datetime DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Gebruikersnaam` (`Gebruikersnaam`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens voor tabel `gebruiker` (aangevuld met Email)
--

INSERT INTO `gebruiker` (`Id`, `Voornaam`, `Tussenvoegsel`, `Achternaam`, `Geboortedatum`, `Gebruikersnaam`, `Wachtwoord`, `Email`, `IsIngelogd`, `Ingelogd`, `Uitgelogd`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 'Jan', NULL, 'Jansen', '2000-01-15', 'janjansen', 'test123', 'jan@email.com', 0, NULL, NULL, 1, NULL, '2025-05-16 10:15:47', '2025-05-16 10:15:47'),
(2, 'Sara', 'de', 'Vries', '1998-03-22', 'saravries', 'test456', 'sara@email.com', 0, NULL, NULL, 1, NULL, '2025-05-16 10:15:47', '2025-05-16 10:15:47'),
(3, 'Tom', NULL, 'Bakker', '1985-07-10', 'tombakker', 'test789', 'tom@email.com', 0, NULL, NULL, 1, NULL, '2025-05-16 10:15:47', '2025-05-16 10:15:47'),
(4, 'Lisa', NULL, 'Peters', '2002-08-12', 'lisapeters', 'test111', 'lisa@email.com', 0, NULL, NULL, 1, NULL, '2025-05-16 10:17:57', '2025-05-16 10:17:57'),
(5, 'Kevin', NULL, 'Smit', '1995-09-20', 'kevinsmit', 'test222', 'kevin@email.com', 0, NULL, NULL, 1, NULL, '2025-05-16 10:17:57', '2025-05-16 10:17:57'),
(6, 'Emma', 'van', 'Dijk', '2003-05-03', 'emmavdijk', 'test333', 'emma@email.com', 0, NULL, NULL, 1, NULL, '2025-05-16 10:17:57', '2025-05-16 10:17:57');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `inschrijving`
--

DROP TABLE IF EXISTS `inschrijving`;
CREATE TABLE IF NOT EXISTS `inschrijving` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `LeerlingId` int DEFAULT NULL,
  `PakketId` int DEFAULT NULL,
  `Begindatum` date DEFAULT NULL,
  `Einddatum` date DEFAULT NULL,
  `IsActief` tinyint(1) DEFAULT '1',
  `Opmerking` text,
  `DatumAangemaakt` datetime DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `LeerlingId` (`LeerlingId`),
  KEY `PakketId` (`PakketId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `inschrijving`
--

INSERT INTO `inschrijving` (`Id`, `LeerlingId`, `PakketId`, `Begindatum`, `Einddatum`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 1, 1, '2024-01-01', '2024-06-01', 1, NULL, '2025-05-16 10:15:48', '2025-05-16 10:15:48'),
(2, 4, 2, '2024-02-01', '2024-08-01', 1, NULL, '2025-05-16 10:17:58', '2025-05-16 10:17:58'),
(3, 1, 3, '2024-03-01', '2024-09-01', 1, NULL, '2025-05-16 10:17:58', '2025-05-16 10:17:58'),
(4, 6, 1, '2024-04-01', '2024-10-01', 1, NULL, '2025-05-16 10:17:58', '2025-05-16 10:17:58');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `instructeur`
--

DROP TABLE IF EXISTS `instructeur`;
CREATE TABLE IF NOT EXISTS `instructeur` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `GebruikerId` int DEFAULT NULL,
  `Nummer` varchar(20) DEFAULT NULL,
  `IsActief` tinyint(1) DEFAULT '1',
  `Opmerking` text,
  `DatumAangemaakt` datetime DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `GebruikerId` (`GebruikerId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `instructeur`
--

INSERT INTO `instructeur` (`Id`, `GebruikerId`, `Nummer`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 2, 'IN001', 1, NULL, '2025-05-16 10:15:48', '2025-05-16 10:15:48'),
(2, 5, 'IN002', 1, NULL, '2025-05-16 10:17:57', '2025-05-16 10:17:57'),
(3, 3, 'IN003', 1, NULL, '2025-05-16 10:17:57', '2025-05-16 10:17:57');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `leerling`
--

DROP TABLE IF EXISTS `leerling`;
CREATE TABLE IF NOT EXISTS `leerling` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `GebruikerId` int DEFAULT NULL,
  `Relatienummer` varchar(20) DEFAULT NULL,
  `IsActief` tinyint(1) DEFAULT '1',
  `Opmerking` text,
  `DatumAangemaakt` datetime DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `GebruikerId` (`GebruikerId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `leerling`
--

INSERT INTO `leerling` (`Id`, `GebruikerId`, `Relatienummer`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 1, 'RL001', 1, NULL, '2025-05-16 10:15:48', '2025-05-16 10:15:48'),
(2, 4, 'RL002', 1, NULL, '2025-05-16 10:17:57', '2025-05-16 10:17:57'),
(3, 6, 'RL003', 1, NULL, '2025-05-16 10:17:57', '2025-05-16 10:17:57');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `melding`
--

DROP TABLE IF EXISTS `melding`;
CREATE TABLE IF NOT EXISTS `melding` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `GebruikerId` int DEFAULT NULL,
  `Doelgroep` enum('Leerling','Instructeur','Beide') DEFAULT NULL,
  `Bericht` text,
  `SoortMelding` enum('Ziek','Leswijziging','Lesannulering','LesOphaaladreswijziging','Lesdoelwijziging') DEFAULT NULL,
  `Datum` date DEFAULT NULL,
  `IsActief` tinyint(1) DEFAULT '1',
  `Opmerking` text,
  `DatumAangemaakt` datetime DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `GebruikerId` (`GebruikerId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `melding`
--

INSERT INTO `melding` (`Id`, `GebruikerId`, `Doelgroep`, `Bericht`, `SoortMelding`, `Datum`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 1, 'Leerling', 'Ik ben ziek en kan niet komen.', 'Ziek', '2024-03-01', 1, NULL, '2025-05-16 10:15:48', '2025-05-16 10:15:48'),
(2, 4, 'Leerling', 'Ik kan niet op tijd zijn', 'Leswijziging', '2024-04-01', 1, NULL, '2025-05-16 10:17:58', '2025-05-16 10:17:58'),
(3, 5, 'Instructeur', 'Auto is in onderhoud', 'Lesannulering', '2024-04-05', 1, NULL, '2025-05-16 10:17:58', '2025-05-16 10:17:58'),
(4, 6, 'Beide', 'Lesdoel is aangepast', 'Lesdoelwijziging', '2024-04-10', 1, NULL, '2025-05-16 10:17:58', '2025-05-16 10:17:58');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ophaaladres`
--

DROP TABLE IF EXISTS `ophaaladres`;
CREATE TABLE IF NOT EXISTS `ophaaladres` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Straatnaam` varchar(100) DEFAULT NULL,
  `Huisnummer` varchar(10) DEFAULT NULL,
  `Toevoeging` varchar(10) DEFAULT NULL,
  `Postcode` varchar(10) DEFAULT NULL,
  `Plaats` varchar(100) DEFAULT NULL,
  `IsActief` tinyint(1) DEFAULT '1',
  `Opmerking` text,
  `DatumAangemaakt` datetime DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `ophaaladres`
--

INSERT INTO `ophaaladres` (`Id`, `Straatnaam`, `Huisnummer`, `Toevoeging`, `Postcode`, `Plaats`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 'Stationsstraat', '45', '', '4321EF', 'Utrecht', 1, NULL, '2025-05-16 10:15:48', '2025-05-16 10:15:48'),
(2, 'Boslaan', '78', '', '3210HG', 'Arnhem', 1, NULL, '2025-05-16 10:17:58', '2025-05-16 10:17:58'),
(3, 'Weideweg', '11', '', '2222ZZ', 'Leeuwarden', 1, NULL, '2025-05-16 10:17:58', '2025-05-16 10:17:58'),
(4, 'Grachtstraat', '9', 'A', '1212KK', 'Maastricht', 1, NULL, '2025-05-16 10:17:58', '2025-05-16 10:17:58');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pakket`
--

DROP TABLE IF EXISTS `pakket`;
CREATE TABLE IF NOT EXISTS `pakket` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Soort` enum('Pakket1','Pakket2','Pakket3') DEFAULT NULL,
  `AantalLessen` int DEFAULT NULL,
  `PrijsPerLes` decimal(10,2) DEFAULT NULL,
  `IsActief` tinyint(1) DEFAULT '1',
  `Opmerking` text,
  `DatumAangemaakt` datetime DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `pakket`
--

INSERT INTO `pakket` (`Id`, `Soort`, `AantalLessen`, `PrijsPerLes`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 'Pakket1', 10, 45.00, 1, NULL, '2025-05-16 10:15:48', '2025-05-16 10:15:48'),
(2, 'Pakket2', 20, 42.50, 1, NULL, '2025-05-16 10:15:48', '2025-05-16 10:15:48'),
(3, 'Pakket3', 30, 40.00, 1, NULL, '2025-05-16 10:15:48', '2025-05-16 10:15:48'),
(4, 'Pakket1', 8, 47.00, 1, NULL, '2025-05-16 10:17:58', '2025-05-16 10:17:58'),
(5, 'Pakket2', 25, 41.00, 1, NULL, '2025-05-16 10:17:58', '2025-05-16 10:17:58'),
(6, 'Pakket3', 15, 44.00, 1, NULL, '2025-05-16 10:17:58', '2025-05-16 10:17:58');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rijles`
--

DROP TABLE IF EXISTS `rijles`;
CREATE TABLE IF NOT EXISTS `rijles` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `InschrijvingId` int DEFAULT NULL,
  `InstructeurId` int DEFAULT NULL,
  `AutoId` int DEFAULT NULL,
  `Begindatum` date DEFAULT NULL,
  `Begintijd` time DEFAULT NULL,
  `Einddatum` date DEFAULT NULL,
  `Eindtijd` time DEFAULT NULL,
  `Lesstatus` varchar(50) DEFAULT NULL,
  `Doel` text,
  `CommentaarLeerling` text,
  `CommentaarInstructeur` text,
  `IsActief` tinyint(1) DEFAULT '1',
  `Commentaar` text,
  `DatumAangemaakt` datetime DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `InschrijvingId` (`InschrijvingId`),
  KEY `InstructeurId` (`InstructeurId`),
  KEY `AutoId` (`AutoId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `rijles`
--

INSERT INTO `rijles` (`Id`, `InschrijvingId`, `InstructeurId`, `AutoId`, `Begindatum`, `Begintijd`, `Einddatum`, `Eindtijd`, `Lesstatus`, `Doel`, `CommentaarLeerling`, `CommentaarInstructeur`, `IsActief`, `Commentaar`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 1, 1, 1, '2024-02-01', '10:00:00', '2024-02-01', '11:00:00', 'Gepland', 'Keren op de weg', 'Prima les', 'Goede inzet', 1, NULL, '2025-05-16 10:15:48', '2025-05-16 10:15:48'),
(2, 2, 2, 2, '2024-03-05', '13:00:00', '2024-03-05', '14:00:00', 'Gepland', 'Rijden op snelweg', '', '', 1, NULL, '2025-05-16 10:17:58', '2025-05-16 10:17:58'),
(3, 3, 3, 3, '2024-04-10', '09:00:00', '2024-04-10', '10:30:00', 'Gepland', 'Parkeren achteruit', '', '', 1, NULL, '2025-05-16 10:17:58', '2025-05-16 10:17:58'),
(4, 4, 1, 1, '2024-05-02', '11:00:00', '2024-05-02', '12:00:00', 'Gepland', 'Verkeersinzicht', '', '', 1, NULL, '2025-05-16 10:17:58', '2025-05-16 10:17:58');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rijlesperophaaladres`
--

DROP TABLE IF EXISTS `rijlesperophaaladres`;
CREATE TABLE IF NOT EXISTS `rijlesperophaaladres` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `RijlesId` int DEFAULT NULL,
  `OphaaladresId` int DEFAULT NULL,
  `IsActief` tinyint(1) DEFAULT '1',
  `Opmerking` text,
  `DatumAangemaakt` datetime DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `RijlesId` (`RijlesId`),
  KEY `OphaaladresId` (`OphaaladresId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `rijlesperophaaladres`
--

INSERT INTO `rijlesperophaaladres` (`Id`, `RijlesId`, `OphaaladresId`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 1, 1, 1, NULL, '2025-05-16 10:15:48', '2025-05-16 10:15:48'),
(2, 2, 2, 1, NULL, '2025-05-16 10:17:58', '2025-05-16 10:17:58'),
(3, 3, 3, 1, NULL, '2025-05-16 10:17:58', '2025-05-16 10:17:58'),
(4, 4, 1, 1, NULL, '2025-05-16 10:17:58', '2025-05-16 10:17:58');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `GebruikerId` int DEFAULT NULL,
  `Naam` varchar(50) DEFAULT NULL,
  `IsActief` tinyint(1) DEFAULT '1',
  `Opmerking` text,
  `DatumAangemaakt` datetime DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `GebruikerId` (`GebruikerId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `rol`
--

INSERT INTO `rol` (`Id`, `GebruikerId`, `Naam`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 1, 'Leerling', 1, NULL, '2025-05-16 10:15:48', '2025-05-16 10:15:48'),
(2, 2, 'Instructeur', 1, NULL, '2025-05-16 10:15:48', '2025-05-16 10:15:48'),
(3, 3, 'Beheerder', 1, NULL, '2025-05-16 10:15:48', '2025-05-16 10:15:48'),
(4, 4, 'Leerling', 1, NULL, '2025-05-16 10:17:57', '2025-05-16 10:17:57'),
(5, 5, 'Instructeur', 1, NULL, '2025-05-16 10:17:57', '2025-05-16 10:17:57'),
(6, 6, 'Beheerder', 1, NULL, '2025-05-16 10:17:57', '2025-05-16 10:17:57');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
