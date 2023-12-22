-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 04:12 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `intern_applied`
--

CREATE TABLE `intern_applied` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `intern_id` int(11) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `is_finished` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `intern_chance`
--

CREATE TABLE `intern_chance` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `periode` varchar(50) DEFAULT NULL,
  `industry` varchar(20) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `intern_request`
--

CREATE TABLE `intern_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `intern_id` int(11) DEFAULT NULL,
  `is_handled` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dataset`
--

CREATE TABLE `tb_dataset` (
  `id_dataset` int(11) NOT NULL,
  `job_dataset` int(11) NOT NULL,
  `experience` varchar(99) NOT NULL,
  `salary` varchar(99) NOT NULL,
  `location` varchar(99) NOT NULL,
  `country` varchar(99) NOT NULL,
  `work_type` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dataset`
--

INSERT INTO `tb_dataset` (`id_dataset`, `job_dataset`, `experience`, `salary`, `location`, `country`, `work_type`) VALUES
(1, 1, 'gg', 'gg', 'gg', 'gg', 'gg'),
(2, 2, 'nn', 'nn', 'nn', 'nn', 'nn'),
(3, 1, 'oo', 'oo', 'oo', 'oo', 'oo'),
(4, 3, 'nora', 'nora', 'nora', 'nora', 'nora'),
(5, 3, 'nao', 'nao', 'nao', 'nao', 'nao');

-- --------------------------------------------------------

--
-- Table structure for table `tb_job`
--

CREATE TABLE `tb_job` (
  `id` int(11) NOT NULL,
  `job_type` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_job`
--

INSERT INTO `tb_job` (`id`, `job_type`) VALUES
(1, 'IT'),
(2, 'Marketing'),
(3, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `user_achievement`
--

CREATE TABLE `user_achievement` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `organizer` varchar(30) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `undergoing` tinyint(1) DEFAULT NULL,
  `degree` varchar(20) DEFAULT NULL,
  `field` varchar(30) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_company`
--

CREATE TABLE `user_company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `company_email` varchar(50) DEFAULT NULL,
  `company_number` int(11) DEFAULT NULL,
  `industry` varchar(20) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  `company` tinyint(1) DEFAULT NULL,
  `password` varchar(70) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `logo` blob DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_education`
--

CREATE TABLE `user_education` (
  `id` int(11) NOT NULL,
  `institution_name` varchar(50) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `undergoing` tinyint(1) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_seeker`
--

CREATE TABLE `user_seeker` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `last_education` int(11) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `hometown` varchar(20) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `busyness` varchar(30) DEFAULT NULL,
  `company` tinyint(1) DEFAULT NULL,
  `password` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_seeker`
--

INSERT INTO `user_seeker` (`user_id`, `email`, `fullname`, `birth_date`, `phone_number`, `last_education`, `address`, `hometown`, `description`, `busyness`, `company`, `password`) VALUES
(1, 'n@gmail.com', 'no', '2023-12-23', 123123, 2, '1', NULL, NULL, NULL, 0, 'c4ca4238a0b923820dcc509a6f75849b'),
(2, 'nora@gmail.com', '1', '2023-11-29', 11, 1, '1', NULL, NULL, NULL, 0, 'c4ca4238a0b923820dcc509a6f75849b'),
(3, 'b@gmail.com', '1', '2024-01-03', 1, 2, '1', NULL, NULL, NULL, 0, 'c4ca4238a0b923820dcc509a6f75849b'),
(4, '3@gmail.com', 'momo', '2023-11-29', 1, 3, '1', NULL, NULL, NULL, 0, 'c4ca4238a0b923820dcc509a6f75849b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `intern_applied`
--
ALTER TABLE `intern_applied`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `intern_id` (`intern_id`);

--
-- Indexes for table `intern_chance`
--
ALTER TABLE `intern_chance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `intern_request`
--
ALTER TABLE `intern_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `intern_id` (`intern_id`);

--
-- Indexes for table `tb_dataset`
--
ALTER TABLE `tb_dataset`
  ADD PRIMARY KEY (`id_dataset`),
  ADD KEY `tb_typejobF` (`job_dataset`);

--
-- Indexes for table `tb_job`
--
ALTER TABLE `tb_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_achievement`
--
ALTER TABLE `user_achievement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_company`
--
ALTER TABLE `user_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `user_education`
--
ALTER TABLE `user_education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_seeker`
--
ALTER TABLE `user_seeker`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `tb_LastEduF` (`last_education`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `intern_applied`
--
ALTER TABLE `intern_applied`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `intern_chance`
--
ALTER TABLE `intern_chance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `intern_request`
--
ALTER TABLE `intern_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_achievement`
--
ALTER TABLE `user_achievement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_company`
--
ALTER TABLE `user_company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_education`
--
ALTER TABLE `user_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_seeker`
--
ALTER TABLE `user_seeker`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `intern_applied`
--
ALTER TABLE `intern_applied`
  ADD CONSTRAINT `intern_applied_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_seeker` (`user_id`),
  ADD CONSTRAINT `intern_applied_ibfk_2` FOREIGN KEY (`intern_id`) REFERENCES `intern_chance` (`id`);

--
-- Constraints for table `intern_chance`
--
ALTER TABLE `intern_chance`
  ADD CONSTRAINT `intern_chance_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `user_company` (`company_id`);

--
-- Constraints for table `intern_request`
--
ALTER TABLE `intern_request`
  ADD CONSTRAINT `intern_request_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_seeker` (`user_id`),
  ADD CONSTRAINT `intern_request_ibfk_2` FOREIGN KEY (`intern_id`) REFERENCES `intern_chance` (`id`);

--
-- Constraints for table `tb_dataset`
--
ALTER TABLE `tb_dataset`
  ADD CONSTRAINT `tb_typejobF` FOREIGN KEY (`job_dataset`) REFERENCES `tb_job` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_achievement`
--
ALTER TABLE `user_achievement`
  ADD CONSTRAINT `user_achievement_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_seeker` (`user_id`);

--
-- Constraints for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD CONSTRAINT `user_activity_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_seeker` (`user_id`);

--
-- Constraints for table `user_education`
--
ALTER TABLE `user_education`
  ADD CONSTRAINT `user_education_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_seeker` (`user_id`);

--
-- Constraints for table `user_seeker`
--
ALTER TABLE `user_seeker`
  ADD CONSTRAINT `tb_LastEduF` FOREIGN KEY (`last_education`) REFERENCES `tb_job` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
