-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 03:58 PM
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
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `id` int(50) NOT NULL,
  `diagnosis_name` varchar(50) NOT NULL,
  `patient_id` int(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`id`, `diagnosis_name`, `patient_id`, `date`) VALUES
(1, 'Depression', 1, '2024-01-12'),
(2, 'Anxiety', 2, '2024-01-12'),
(3, 'Bipolar Disorder', 3, '2024-01-12'),
(4, 'Schizophrenia', 4, '2024-02-12'),
(5, 'Obsessive Compulsive Disorder', 5, '2024-03-12'),
(6, 'Post-Traumatic Stress Disorder', 6, '2024-01-12'),
(7, 'Eating Disorders', 7, '2024-04-12'),
(8, 'Borderline Personality Disorder', 8, '2024-01-15'),
(9, 'Attention Deficit Hyperactivity Disorder', 9, '2024-01-18'),
(10, 'Substance Use Disorder', 10, '2024-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `medication`
--

CREATE TABLE `medication` (
  `id` int(50) NOT NULL,
  `medication_name` varchar(50) NOT NULL,
  `patient_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medication`
--

INSERT INTO `medication` (`id`, `medication_name`, `patient_id`) VALUES
(1, 'Sertraline', 1),
(2, 'Lorazepam', 2),
(3, 'Lithium', 3),
(4, 'Olanzapine', 4),
(5, 'Fluoxetine', 5),
(6, 'Paroxetine', 6),
(7, 'Quetiapine', 7),
(8, 'Venlafaxine', 8),
(9, 'Methylphenidate', 9),
(10, 'Buprenorphine', 10);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `care_giver_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `age`, `phone`, `care_giver_id`) VALUES
(1, 'John Doe', '35', '+1234567890', 1),
(2, 'Jane Smith', '28', '+1987654321', 2),
(3, 'Alice Johnson', '45', '+1122334455', 3),
(4, 'Bob Williams', '40', '+1555666777', 4),
(5, 'Emma Brown', '30', '+1444333222', 5),
(6, 'Michael Davis', '50', '+1777888999', 6),
(7, 'Olivia Wilson', '32', '+1666777888', 7),
(8, 'William Taylor', '38', '+1999888777', 8),
(9, 'Sophia Martinez', '42', '+1223344556', 9),
(10, 'James Anderson', '48', '+1444555666', 10);

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id` int(50) NOT NULL,
  `mood` varchar(50) NOT NULL,
  `medicine` varchar(50) NOT NULL,
  `therapy_name` varchar(50) NOT NULL,
  `patient_id` int(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`id`, `mood`, `medicine`, `therapy_name`, `patient_id`, `date`) VALUES
(1, 'Stable', 'Sertraline', 'Cognitive Behavioral Therapy', 1, '2024-01-12'),
(2, 'Improved', 'Lorazepam', 'Exposure Therapy', 2, '2024-01-12'),
(3, 'Worsened', 'Lithium', 'Dialectical Behavior Therapy', 3, '2024-01-18'),
(4, 'Stable', 'Olanzapine', 'Interpersonal Therapy', 4, '2024-01-12'),
(5, 'Improved', 'Fluoxetine', 'Mindfulness-Based Therapy', 5, '2024-02-12'),
(6, 'Worsened', 'Paroxetine', 'Psychodynamic Therapy', 6, '2024-04-22'),
(7, 'Stable', 'Quetiapine', 'Group Therapy', 7, '2024-01-12'),
(8, 'Improved', 'Venlafaxine', 'Family Therapy', 8, '2024-02-12'),
(9, 'Worsened', 'Methylphenidate', 'Art Therapy', 9, '2024-03-17'),
(10, 'Stable', 'Buprenorphine', 'Music Therapy', 10, '2024-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending',
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `date`, `time`, `status`, `patient_id`) VALUES
(1, '2024-05-17', '09:00 AM', 'Confirmed', 1),
(2, '2024-05-18', '10:30 AM', 'Confirmed', 2),
(3, '2024-05-19', '11:00 AM', 'Pending', 3),
(4, '2024-05-20', '02:00 PM', 'Pending', 4),
(5, '2024-05-21', '03:30 PM', 'Confirmed', 5),
(6, '2024-05-22', '04:00 PM', 'Confirmed', 6),
(7, '2024-05-23', '10:00 AM', 'Pending', 7),
(8, '2024-05-24', '01:30 PM', 'Confirmed', 8),
(9, '2024-05-25', '11:30 AM', 'Pending', 9),
(10, '2024-05-26', '12:00 PM', 'Confirmed', 10);

-- --------------------------------------------------------

--
-- Table structure for table `symptom_track`
--

CREATE TABLE `symptom_track` (
  `id` int(50) NOT NULL,
  `mood_swings` varchar(50) NOT NULL,
  `changes_in_appetite` varchar(50) NOT NULL,
  `sleep_disturbances` varchar(50) NOT NULL,
  `difficulty_concentrating` varchar(50) NOT NULL,
  `loss_of_interest_in_activities` varchar(50) NOT NULL,
  `feelings_of_hopelessness` varchar(50) NOT NULL,
  `increased_irritability` varchar(50) NOT NULL,
  `social_withdrawal` varchar(50) NOT NULL,
  `lack_of_energy` varchar(50) NOT NULL,
  `suicidal_thoughts` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `patient_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `symptom_track`
--

INSERT INTO `symptom_track` (`id`, `mood_swings`, `changes_in_appetite`, `sleep_disturbances`, `difficulty_concentrating`, `loss_of_interest_in_activities`, `feelings_of_hopelessness`, `increased_irritability`, `social_withdrawal`, `lack_of_energy`, `suicidal_thoughts`, `date`, `patient_id`) VALUES
(1, 'Mild', 'Decreased', 'Trouble falling asleep', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'No', '2024-05-17', '1'),
(2, 'Moderate', 'Increased', 'Frequent waking up', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', '2024-05-18', '2'),
(3, 'Severe', 'Decreased', 'Insomnia', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '2024-05-19', '3'),
(4, 'Mild', 'Increased', 'Trouble staying asleep', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '2024-05-20', '4'),
(5, 'Moderate', 'Decreased', 'Hypersomnia', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'No', '2024-05-21', '5'),
(6, 'Severe', 'Increased', 'Nightmares', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '2024-05-22', '6'),
(7, 'Mild', 'Decreased', 'Frequent awakening', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '2024-05-23', '7'),
(8, 'Moderate', 'Increased', 'Night terrors', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', '2024-05-24', '8'),
(9, 'Severe', 'Decreased', 'Sleepwalking', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '2024-05-25', '9'),
(10, 'Mild', 'Increased', 'Sleep paralysis', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', '2024-05-26', '10');

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
(1, 'admin@example.com', 'admin123', 'admin'),
(2, 'doctor1@example.com', 'doctor123', 'doctor'),
(3, 'doctor2@example.com', 'doctor123', 'doctor'),
(4, 'caregiver1@example.com', 'caregiver123', 'caregiver'),
(5, 'caregiver2@example.com', 'caregiver123', 'caregiver'),
(6, 'patient1@example.com', 'patient123', 'patient'),
(7, 'patient2@example.com', 'patient123', 'patient'),
(8, 'patient3@example.com', 'patient123', 'patient'),
(9, 'patient4@example.com', 'patient123', 'patient'),
(10, 'patient5@example.com', 'patient123', 'patient'),
(11, 'test1@gmail.com', '$2y$10$MCIHGG4IV3HFTwG/UNQ3VORzSgwICBNb9PcPqOq/IyX', 'caregiver'),
(12, 'test1@gmail.com', '$2y$10$MCIHGG4IV3HFTwG/UNQ3VORzSgwICBNb9PcPqOq/IyX/zyD3QqA5u', 'caregiver');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medication`
--
ALTER TABLE `medication`
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
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `medication`
--
ALTER TABLE `medication`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `symptom_track`
--
ALTER TABLE `symptom_track`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
