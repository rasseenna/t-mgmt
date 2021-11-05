-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2021 at 07:44 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `t_mgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(30) NOT NULL,
  `description` longtext NOT NULL,
  `price` float NOT NULL,
  `hours` float NOT NULL,
  `c_code` varchar(30) NOT NULL,
  `c_status` enum('Active','InActive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_name`, `description`, `price`, `hours`, `c_code`, `c_status`) VALUES
(3, 'CV Writing', 'In its full form, CV stands for curriculum vitae (latin for: course of life). In the US, Canada, and Australia, a CV is a document you use for academic purposes. The US academic CV outlines every detail of your scholarly career. In other countries, CV is an equivalent of an American resume. You use it when you apply for jobs.', 145, 24, 'CV257', 'Active'),
(4, 'Presentation', 'A presentation conveys information from a speaker to an audience. Presentations are typically demonstrations, introduction, lecture, or speech meant to inform, persuade, inspire, motivate, build goodwill, or present a new idea/product. ... Presentations in certain formats are also known as keynote address.', 200, 30, 'PP658', 'Active'),
(5, 'Interview', 'What is meant by interview?\r\nImage result for interview\r\nAn interview is essentially a structured conversation where one participant asks questions, and the other provides answers. In common parlance, the word \"interview\" refers to a one-on-one conversation between an interviewer and an interviewee. ... An interview may also transfer information in both directions.', 25, 15, 'IRW87', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1636010031),
('m130524_201442_init', 1636010035),
('m190124_110200_add_verification_token_column_to_user_table', 1636010035);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `sh_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `location` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `sh_status` enum('Active','InActive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`sh_id`, `c_id`, `t_id`, `s_id`, `location`, `date`, `sh_status`) VALUES
(4, 3, 5, 1, 'London', '2021-11-09', 'Active'),
(5, 4, 6, 4, 'Luton', '2021-11-16', 'Active'),
(6, 5, 7, 5, 'Coventry', '2021-11-20', 'Active'),
(7, 3, 6, 3, 'Luton', '2021-11-27', 'Active'),
(8, 5, 7, 3, 'Birmingham', '2021-11-19', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(30) NOT NULL,
  `from_time` varchar(30) NOT NULL,
  `to_time` varchar(30) NOT NULL,
  `s_status` enum('Active','InActive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`s_id`, `s_name`, `from_time`, `to_time`, `s_status`) VALUES
(1, 'Morning First Slot', '8.30', '11.30', 'Active'),
(2, 'Morning Second Slot', '10', '12', 'Active'),
(3, 'Noon First Slot', '12', '15', 'Active'),
(4, 'Noon Second Slot ', '13', '15', 'Active'),
(5, 'Evening First Slot', '15', '18', 'Active'),
(6, 'Evening Second Slot', '16', '19', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `job_title` varchar(30) NOT NULL,
  `mobile_number` varchar(30) NOT NULL,
  `s_id` int(11) NOT NULL,
  `imageUrl` varchar(155) NOT NULL,
  `address` varchar(55) NOT NULL,
  `t_status` enum('Active','InActive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`t_id`, `t_name`, `age`, `email`, `job_title`, `mobile_number`, `s_id`, `imageUrl`, `address`, `t_status`) VALUES
(5, 'Smith', 28, 'smith@gmail.com', 'Python', '8954231542', 1, 'download (1).jpg', 'Rose villa, California, USA', 'Active'),
(6, 'James Vil', 30, 'james@gmail.com', 'Laravel', '8754215632', 4, 'download00.jpg', 'James cottage, House no:10, Florida', 'Active'),
(7, 'Gabilina', 32, 'gb@gmail.com', 'Angular', '878954562152', 5, 'images.jpg', 'Forg palace road, Whiteton, Germany', 'Active'),
(8, 'Noorin', 29, 'noorin@gmail.com', 'PHP', '7539518521', 6, 'download 20.jpg', 'Nor villa, France', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', 'rT3M6VH0Pdc99mp_2h7q15ClmTZTNB4P', '$2y$13$eVMLi5gPYs2CjGO96SvEGu./0m0cQ4lmRBOHA6SIwU7LqNQ/cOYa6', NULL, 'admin-t-mgmt@yopmail.com', 10, 1636010311, 1636010311, 'lk5cw67yTg4MHSud4N8POYp-GJXswelg_1636010311');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`sh_id`),
  ADD KEY `slot_id` (`s_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `sh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `c_id` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `slot_id` FOREIGN KEY (`s_id`) REFERENCES `slot` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_id` FOREIGN KEY (`t_id`) REFERENCES `trainer` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trainer`
--
ALTER TABLE `trainer`
  ADD CONSTRAINT `s_id` FOREIGN KEY (`s_id`) REFERENCES `slot` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
