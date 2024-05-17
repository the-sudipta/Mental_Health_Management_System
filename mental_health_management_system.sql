-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2024 at 11:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mental_health_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `care_giver`
--

CREATE TABLE `care_giver` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `user_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `care_giver`
--

INSERT INTO `care_giver` (`id`, `name`, `gender`, `phone`, `user_id`) VALUES
(2, 'Test Name', 'Male', '01931117419', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `care_giver_id` int(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `medication` varchar(50) NOT NULL,
  `diagnosis` varchar(300) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `age`, `phone`, `care_giver_id`, `gender`, `medication`, `diagnosis`, `date`) VALUES
(1, 'John Doe', '35', '+1234567890', 1, 'Male', 'Napa', 'Head Pain', '2024-05-17'),
(2, 'Jane Smith', '28', '+1987654321', 1, 'Female', 'Napa', 'Head Pain', '2024-05-17'),
(3, 'Alice Johnson', '45', '+1122334455', 1, 'Female', 'Napa', 'Head Pain', '2024-05-17'),
(4, 'Bob Williams', '40', '+1555666777', 1, 'Male', 'Napa', 'Head Pain', '2024-05-17'),
(5, 'Emma Brown', '30', '+1444333222', 1, 'Female', 'Napa', 'Head Pain', '2024-05-17'),
(6, 'Michael Davis', '50', '+1777888999', 2, 'Male', 'Napa', 'Head Pain', '2024-05-17'),
(8, 'William Taylor', '38', '+1999888777', 3, 'Male', 'Napa', 'Head Pain', '2024-05-17'),
(9, 'Sophia Martinez', '42', '+1223344556', 5, 'Female', 'Napa', 'Head Pain', '2024-05-17'),
(17, 'Test Patient', '40', '111111222334', 1, 'Male', '12431sfda', 'Test Problem', '2024-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id` int(50) NOT NULL,
  `mood` varchar(50) NOT NULL,
  `medication_adherence` varchar(50) NOT NULL,
  `therapy_attended` varchar(50) NOT NULL,
  `patient_id` int(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`id`, `mood`, `medication_adherence`, `therapy_attended`, `patient_id`, `date`) VALUES
(1, 'Sad', 'Sertraline', '0', 1, '2024-01-12'),
(2, 'Sad', 'Lorazepam', '6', 2, '2024-01-12'),
(3, 'Not Good', 'Lithium', '2', 3, '2024-01-18'),
(4, 'Very Happy', 'Olanzapine', '1', 4, '2024-01-12'),
(5, 'Very Happy', 'Fluoxetine', '4', 5, '2024-02-12'),
(6, 'Happy', 'Paroxetine', '12', 6, '2024-04-22'),
(7, 'Not Good', 'Quetiapine', '23', 7, '2024-01-12'),
(8, 'Very Happy', 'Venlafaxine', '12', 8, '2024-02-12'),
(9, 'Sad', 'Methylphenidate', '43', 9, '2024-03-17'),
(10, 'Happy', 'Buprenorphine', '10', 10, '2024-04-11'),
(11, 'Happy', 'Excellent', '11', 3, '2023-05-17'),
(12, 'Sad', 'Irregular', '3', 1, '2022-09-28'),
(13, 'Happy', 'Regular', '15', 2, '2024-05-18'),
(14, 'Very Happy', 'Excellent', '33', 3, '2024-05-25'),
(15, 'Sad', 'Poor', '12', 2, '2024-05-29'),
(16, 'Very Happy', 'Excellent', '1111', 2, '2026-06-25'),
(18, 'Not Good 😔', 'Irregular', '3', 2, '2023-12-28');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending',
  `patient_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `date`, `time`, `status`, `patient_id`, `type`) VALUES
(1, '2024-05-17', '09:00 AM', 'Confirmed', 1, 'Online'),
(2, '2024-05-18', '10:30 AM', 'Confirmed', 2, 'Offline'),
(3, '2024-05-19', '11:00 AM', 'Pending', 3, 'Offline'),
(4, '2024-05-20', '02:00 PM', 'Cancelled', 4, 'Offline'),
(5, '2024-05-21', '03:30 PM', 'Completed', 5, 'Online'),
(6, '2024-05-22', '04:00 PM', 'Completed', 6, 'Offline'),
(7, '2024-05-23', '10:00 AM', 'Completed', 7, 'Online'),
(8, '2024-05-24', '01:30 PM', 'Confirmed', 8, 'Online'),
(9, '2024-05-25', '11:30 AM', 'Pending', 9, 'Offline'),
(10, '2024-05-26', '12:00 PM', 'Cancelled', 10, 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `symptom_track`
--

CREATE TABLE `symptom_track` (
  `id` int(50) NOT NULL,
  `symptoms` varchar(255) NOT NULL,
  `date` varchar(50) NOT NULL,
  `patient_id` int(50) NOT NULL,
  `care_giver_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `symptom_track`
--

INSERT INTO `symptom_track` (`id`, `symptoms`, `date`, `patient_id`, `care_giver_id`) VALUES
(11, 'Mood swings,\nChanges in appetite', '2024-05-17', 1, 1),
(12, 'Fatigue or lack of energy,\nPhysical symptoms without medical cause ,(headaches, stomachaches, etc.),\nSuicidal thoughts or self-harming behaviors,', '2024-05-17', 9, 15);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`) VALUES
(1, 'test1@gmail.com', '$2y$10$uN83Bkias/1SXpcD2EO0cug/9loaTAYnONIP3OHQpAro3Nz8vh1he', 'caregiver');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `care_giver`
--
ALTER TABLE `care_giver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `symptom_track`
--
ALTER TABLE `symptom_track`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `care_giver`
--
ALTER TABLE `care_giver`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `symptom_track`
--
ALTER TABLE `symptom_track`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
