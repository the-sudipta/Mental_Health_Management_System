-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2024 at 09:37 PM
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
(2, 'Test Name', 'Male', '01931117419', 1),
(3, 'test Name', 'Male', '01931117419', 15),
(4, 'R sdad', 'Male', '01010101010', 16);

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
(1, 'John Doe', '35', '12345678903112', 1, 'Male', 'Napa', 'Head Pain', '2024-05-17'),
(2, 'Jane Smith', '28', '119876543214', 1, 'Female', 'Napa', 'Head Pain', '2024-05-17'),
(3, 'Alice Johnson', '45', '121122334455', 1, 'Female', 'Napa', 'Head Pain', '2024-05-17'),
(4, 'Bob Williams', '40', '1555666777', 1, 'Male', 'Death', 'Head Pain', '2024-05-17'),
(5, 'Emma Browny', '30', '121444333222', 1, 'Female', 'Napa', 'Head Pain', '2024-05-17'),
(6, 'Michael Davis', '50', '+1777888999', 2, 'Male', 'Napa', 'Head Pain', '2024-05-17'),
(8, 'William Taylor', '38', '+1999888777', 3, 'Male', 'Napa', 'Head Pain', '2024-05-17'),
(9, 'Sophia Martinez', '42', '+1223344556', 5, 'Female', 'Napa', 'Head Pain', '2024-05-17'),
(19, 'Test Night Edited', '22', '0101010555555', 1, 'Male', 'Test Night', 'Test Night', '2024-05-18'),
(20, 'Test Day', '55', '010101012223344', 1, 'Male', 'Test Day', 'Test Day', '2024-05-18');

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
(18, 'Not Good 😔', 'Irregular', '3', 2, '2023-12-28'),
(19, 'Sad 😐', 'Poor', '12', 3, '2024-05-23'),
(20, 'Not Good 😔', 'Excellent', '500', 4, '2023-06-02'),
(22, 'Not Good 😔', 'Irregular', '121', 19, '2024-05-20'),
(23, 'Not Good 😔', 'Regular', '121', 20, '2024-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending',
  `patient_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `time_from` varchar(50) NOT NULL,
  `time_to` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `date`, `status`, `patient_id`, `type`, `purpose`, `time_from`, `time_to`) VALUES
(2, '2024-05-18', 'Pending', 2, 'Offline', 'Back pain', '10:30', '11:30'),
(3, '2024-05-18', 'Confirmed', 3, 'Online', 'Headache', '14:00', '15:00'),
(4, '2024-05-20', 'Pending', 4, 'Offline', 'Joint stiffness', '09:00', '10:00'),
(5, '2024-05-18', 'Confirmed', 5, 'Online', 'Allergy consultation', '11:00', '12:00'),
(6, '2024-05-20', 'Pending', 4, 'Offline', 'Sprained ankle', '16:30', '17:30'),
(7, '2024-05-25', 'Confirmed', 1, 'Online', 'Respiratory issues', '13:30', '14:30'),
(8, '2024-05-24', 'Pending', 5, 'Offline', 'Eye checkup', '15:00', '16:00'),
(9, '2024-05-25', 'Confirmed', 3, 'Online', 'Skin rash', '10:00', '11:00'),
(10, '2024-05-26', 'Pending', 10, 'Offline', 'Dental cleaning', '08:30', '09:30'),
(11, '2024-05-18', 'Confirmed', 11, 'Online', 'Counseling session', '17:00', '18:00'),
(21, '2024-05-25', 'Confirmed', 1, 'Online', 'Follow-up appointment', '09:00', '10:00'),
(22, '2024-05-30', 'Pending', 5, 'Offline', 'Annual physical', '10:30', '11:30'),
(23, '2024-05-25', 'Confirmed', 23, 'Online', 'Medication refill', '12:00', '13:00'),
(24, '2024-05-31', 'Pending', 24, 'Offline', 'Blood test', '14:00', '15:00'),
(25, '2024-05-31', 'Confirmed', 3, 'Online', 'Nutritional consultation', '15:30', '16:30'),
(26, '2024-06-01', 'Pending', 26, 'Offline', 'Physical therapy', '17:00', '18:00'),
(28, '2024-06-02', 'Pending', 28, 'Offline', 'Dietary advice', '20:00', '21:00'),
(29, '2024-06-02', 'Confirmed', 1, 'Online', 'Yoga therapy', '21:30', '22:30'),
(30, '2024-05-20', 'Pending', 19, 'Online', 'Unknwon', '22:00', '23:00'),
(31, '2024-05-20', 'Pending', 20, 'Online', 'Joking', '22:00', '23:00');

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
(12, 'Fatigue or lack of energy,\nPhysical symptoms without medical cause ,(headaches, stomachaches, etc.),\nSuicidal thoughts or self-harming behaviors,', '2024-05-17', 9, 15),
(13, 'Mood Swings, Sleep Disturbance, Difficulty Concentrating, Social Withdrawal, Suicidal Thoughts', '2024-05-16', 1, 1),
(15, 'Mood Swings, Changes In Appetite, Sleep Disturbance, Social Withdrawal, Fatigue or Lack of Energy, Physical Symptoms, Suicidal Thoughts', '2024-05-20', 19, 1),
(16, 'Mood Swings, Changes In Appetite, Sleep Disturbance, Feelings of Hopelessness, Increased Irritability, Social Withdrawal', '2024-05-19', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `task_name` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `care_giver_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `status`, `task_name`, `date`, `care_giver_id`) VALUES
(1, 'Task Not Completed', 'Administer medication to patient', '2024-05-18', 1),
(2, 'Task Completed Successfully', 'Conduct therapy session with patient', '2024-05-17', 2),
(3, 'Task Not Completed', 'Update patient medical records', '2024-05-18', 2),
(4, 'Task Completed Successfully', 'Prepare treatment plan for new patient', '2024-05-18', 1),
(5, 'Task Not Completed', 'Follow up on discharged patient', '2024-05-16', 1),
(6, 'Task Completed Successfully', 'Organize group therapy session', '2024-05-19', 1),
(7, 'Task Not Completed', 'Monitor patient vital signs', '2024-05-17', 3),
(8, 'Task Completed Successfully', 'Assist patient with daily activities', '2024-05-18', 3),
(9, 'Task Not Completed', 'Schedule next appointment with psychiatrist', '2024-05-19', 1),
(10, 'Task Completed Successfully', 'Coordinate with family for patient care', '2024-05-15', 1);

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
(1, 'test1@gmail.com', '$2y$10$uN83Bkias/1SXpcD2EO0cug/9loaTAYnONIP3OHQpAro3Nz8vh1he', 'caregiver'),
(15, 'testxxx@gmail.com', '$2y$10$AokMj/Zmu5gGRiIBvDA2duZZhwmHewb1TEiRLtOVufj9PUZoGiOJ2', 'caregiver'),
(16, 'testxx1@gmail.com', '$2y$10$c9l10Oxkair.nDP34qq.W.jI/OKwwvhxvE7uDDM3tS3yF45GDq/hy', 'caregiver');

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
-- Indexes for table `task`
--
ALTER TABLE `task`
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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `symptom_track`
--
ALTER TABLE `symptom_track`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
