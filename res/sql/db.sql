-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2023 at 04:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookedtravels`
--

CREATE TABLE `bookedtravels` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `OfferID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookedtravels`
--

INSERT INTO `bookedtravels` (`ID`, `UserID`, `OfferID`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `ID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL,
  `Price` decimal(10,2) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `Latitude` decimal(21,16) NOT NULL,
  `Longitude` decimal(21,16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`ID`, `Title`, `Description`, `Price`, `StartDate`, `EndDate`, `Latitude`, `Longitude`) VALUES
(1, 'Trafo', 'Przygoda w górach', 500.00, '2023-07-01', '2023-07-15', 50.5665674351534660, 19.5356050517405680),
(2, 'Ratusz Ogr', 'Przygoda w górach', 800.00, '2024-08-10', '2024-08-25', 50.4532462119902050, 19.5238280825227730),
(3, 'Orlik Mirów', 'Przygoda w górach', 300.00, '2024-09-05', '2024-09-12', 50.6150298790832740, 19.4725325729212170),
(4, 'Łutowiec', 'Przygoda w górach', 500.00, '2024-10-06', '2024-10-09', 50.6281700505497500, 19.4525109219685750);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Email`, `Password`) VALUES
(1, 'jan@example.com', 'haslo123'),
(2, 'anna@example.com', 'haslo456'),
(3, 'mateusz@example.com', 'haslo789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookedtravels`
--
ALTER TABLE `bookedtravels`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `OfferID` (`OfferID`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookedtravels`
--
ALTER TABLE `bookedtravels`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookedtravels`
--
ALTER TABLE `bookedtravels`
  ADD CONSTRAINT `bookedtravels_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `bookedtravels_ibfk_2` FOREIGN KEY (`OfferID`) REFERENCES `offers` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
