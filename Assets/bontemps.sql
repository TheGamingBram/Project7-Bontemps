-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 26, 2022 at 09:22 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bontemps`
--

-- --------------------------------------------------------

--
-- Table structure for table `klanten`
--

DROP TABLE IF EXISTS `klanten`;
CREATE TABLE IF NOT EXISTS `klanten` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Wachtwoord` varchar(255) NOT NULL,
  `Telefoonnummer` varchar(12) NOT NULL,
  `Adres` varchar(255) NOT NULL,
  `Postcode` varchar(255) NOT NULL,
  `Plaats` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klanten`
--

INSERT INTO `klanten` (`ID`, `Naam`, `Email`, `Wachtwoord`, `Telefoonnummer`, `Adres`, `Postcode`, `Plaats`) VALUES
(1, 'Ton van Uuden', 'ton.uuden@leijgraaf.nl', '', '+31689972132', 'Regio Land van Cuijk & Oss', '5460 AK', 'Veghel ');

-- --------------------------------------------------------

--
-- Table structure for table `medewerkers`
--

DROP TABLE IF EXISTS `medewerkers`;
CREATE TABLE IF NOT EXISTS `medewerkers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Wachtwoord` varchar(255) NOT NULL,
  `Telefoonnummer` varchar(12) NOT NULL,
  `Adres` varchar(255) NOT NULL,
  `Postcode` varchar(255) NOT NULL,
  `Plaats` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medewerkers`
--

INSERT INTO `medewerkers` (`ID`, `Naam`, `Email`, `Wachtwoord`, `Telefoonnummer`, `Adres`, `Postcode`, `Plaats`) VALUES
(1, 'Jovey Smits', '0087348@rocdeleijgraaf.nl', '', '+31614393475', 'Randerade 69', '5807EM', 'Oostrum');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Naam_ID` int(11) NOT NULL,
  `Producten_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`ID`, `Naam_ID`, `Producten_ID`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menunaam`
--

DROP TABLE IF EXISTS `menunaam`;
CREATE TABLE IF NOT EXISTS `menunaam` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menunaam`
--

INSERT INTO `menunaam` (`ID`, `Naam`) VALUES
(1, 'Vlees'),
(2, 'Vis'),
(3, 'Vega');

-- --------------------------------------------------------

--
-- Table structure for table `producten`
--

DROP TABLE IF EXISTS `producten`;
CREATE TABLE IF NOT EXISTS `producten` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(255) NOT NULL,
  `Prijs` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producten`
--

INSERT INTO `producten` (`ID`, `Naam`, `Prijs`) VALUES
(1, 'T-Bone steak', 26);

-- --------------------------------------------------------

--
-- Table structure for table `reserveringen`
--

DROP TABLE IF EXISTS `reserveringen`;
CREATE TABLE IF NOT EXISTS `reserveringen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Datum` datetime(2) DEFAULT CURRENT_TIMESTAMP(2),
  `Aantal` int(2) NOT NULL,
  `Klanten_ID` int(11) NOT NULL,
  `Medewerker_ID` int(11) NOT NULL,
  `Tafel_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reserveringmenu`
--

DROP TABLE IF EXISTS `reserveringmenu`;
CREATE TABLE IF NOT EXISTS `reserveringmenu` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `menu_ID` int(11) NOT NULL,
  `aantal` int(11) NOT NULL,
  `reservering_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
