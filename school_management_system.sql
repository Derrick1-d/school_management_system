-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2024 at 10:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `adminName` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `adminName`, `password`) VALUES
(4, 'derrick', '$2y$10$LB8/Axr3UdLnhtIlSo3ozehXix4pk2tPv.Cf07vyUUsq9zBVbHu8C'),
(5, 'evelyn', '$2y$10$t746DAIePQPKSIas2EOabuEJfPN.X6KDuIhQfbJyXNSMAtwOIRpXm'),
(6, 'eric', '$2y$10$UNH64.qlLuxaYhdcgaMNouh0qMAUoinEPoZfxhE7AwIhCqRTcntWa'),
(7, 'cal', '$2y$10$bQW0KUJGscuylz.9NVEUF.d0NNFtOZovI4bDd7qIugsfAB3AhADCW'),
(8, 'khem', '$2y$10$W0s6QVBVhBTq5wd3TsQJYOCt2FedCHmOn9ikyEn4MsRvGTxdWSSCC'),
(9, 'admin', '$2y$10$3DcHs2gic/5GRchfv0jjJORw/vJW1DsGYkK58s9icVgiYeP/vJXsG');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `writer_name` varchar(100) DEFAULT NULL,
  `class` varchar(50) DEFAULT NULL,
  `publishing_year` int(11) DEFAULT NULL,
  `date_added` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) NOT NULL,
  `idnumber` varchar(20) NOT NULL,
  `dob` date DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `amount_paid` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `firstname`, `middlename`, `lastname`, `idnumber`, `dob`, `level`, `payment_method`, `amount_paid`) VALUES
(2, 'derrick', '', 'Tabiri', '2246', '2024-02-21', 'form_one', 'school', 20.00);

-- --------------------------------------------------------

--
-- Table structure for table `school_info`
--

CREATE TABLE `school_info` (
  `id` int(11) NOT NULL,
  `total_students` int(11) NOT NULL,
  `total_teachers` int(11) NOT NULL,
  `new_admissions` int(11) NOT NULL,
  `total_costs` decimal(10,2) NOT NULL,
  `monthly_revenue` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `dob` date NOT NULL,
  `religion` text NOT NULL,
  `gender` text NOT NULL,
  `admission_number` int(100) NOT NULL,
  `program` text NOT NULL,
  `mother_name` text NOT NULL,
  `Father_name` text NOT NULL,
  `father_occupation` text NOT NULL,
  `mother_occupation` text NOT NULL,
  `mother_phone_number` int(25) NOT NULL,
  `father_phone_number` int(100) NOT NULL,
  `nationality` text NOT NULL,
  `parent_address` varchar(100) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `middlename`, `lastname`, `email`, `dob`, `religion`, `gender`, `admission_number`, `program`, `mother_name`, `Father_name`, `father_occupation`, `mother_occupation`, `mother_phone_number`, `father_phone_number`, `nationality`, `parent_address`, `profile_picture`) VALUES
(1, 'Derrick', '', 'Tabiri', 'derrick@gmail.com', '2024-03-23', 'christianity', 'male', 456, 'general-arts-crs', 'ama', 'derrick', 'farmer', 'farmer', 558686295, 558686295, 'ghanain', '3456', 'uploads/image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `idnumber` varchar(20) NOT NULL,
  `dob` date DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `profilePicture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `firstname`, `middlename`, `lastname`, `email`, `phone`, `idnumber`, `dob`, `religion`, `subject`, `gender`, `profilePicture`) VALUES
(1, 'derrick', '', 'Tabiri', 'derriktabiri046@gmail.com', '0558686295', '2244', '2024-02-13', 'islam', 'social-studies', 'male', 'uploads/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idnumber` (`idnumber`);

--
-- Indexes for table `school_info`
--
ALTER TABLE `school_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idnumber` (`idnumber`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `school_info`
--
ALTER TABLE `school_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
