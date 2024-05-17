-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2024 at 01:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mhms`
--

-- --------------------------------------------------------

--
-- Table structure for table `symptom_track`
--

CREATE TABLE `symptom_track` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `symptoms` varchar(255) NOT NULL,
  `date` varchar(50) NOT NULL,
  `patient_id` int(50) NOT NULL,
  `care_giver_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `symptom_track`
--

INSERT INTO `symptom_track` (`id`, `name`, `symptoms`, `date`, `patient_id`, `care_giver_id`) VALUES
(11, 'John Doe', 'Mood swings,\nChanges in appetite', '2024-05-17', 1, 1),
(12, 'Sophia Martinez', 'Fatigue or lack of energy,\nPhysical symptoms without medical cause ,(headaches, stomachaches, etc.),\nSuicidal thoughts or self-harming behaviors,', '2024-05-17', 9, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `symptom_track`
--
ALTER TABLE `symptom_track`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `symptom_track`
--
ALTER TABLE `symptom_track`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
