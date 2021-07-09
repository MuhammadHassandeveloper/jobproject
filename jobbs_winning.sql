-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2021 at 07:50 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobbs_winning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `applied_jobs`
--

CREATE TABLE `applied_jobs` (
  `aj_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applied_jobs`
--

INSERT INTO `applied_jobs` (`aj_id`, `job_id`, `s_id`) VALUES
(1, 4, 4),
(2, 7, 4),
(3, 6, 4),
(4, 4, 1),
(8, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Web, Mobile & Software Dev'),
(2, 'IT & Networking'),
(3, 'Game Development'),
(4, 'QA & Testing'),
(5, 'Creative Developer'),
(6, 'Legal'),
(7, 'Customer Services');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `e_id` int(100) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Company_name` varchar(256) NOT NULL,
  `Logo` varchar(256) NOT NULL,
  `website_link` varchar(200) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`e_id`, `Name`, `Company_name`, `Logo`, `website_link`, `Phone`, `Email`, `Password`) VALUES
(4, 'nimra', 'website', 'logo-5.png', 'https://sbsl.org/', '03064793240', 'nimra@gmail.com', '98765'),
(5, 'Mohsin', 'Zstep', 'partner-2.png', 'https://www.linkedin.com/feed/', '03095075738', 'hakim@gmail.com', '12345678'),
(6, 'hakimAli', 'Z_step', 'partner-1.png', 'https://www.linkedin.com/feed/', '03095075736', 'hakimali@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(100) NOT NULL,
  `e_id` int(100) NOT NULL,
  `job_name` varchar(256) NOT NULL,
  `job_description` text NOT NULL,
  `job_location` varchar(200) NOT NULL,
  `job_category` varchar(256) NOT NULL,
  `post_date` date NOT NULL,
  `Expiration_date` date NOT NULL,
  `job_type` varchar(256) NOT NULL,
  `job_experience` varchar(256) NOT NULL,
  `job_qualification` varchar(200) NOT NULL,
  `job_salary` int(100) NOT NULL,
  `vaccancies` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `e_id`, `job_name`, `job_description`, `job_location`, `job_category`, `post_date`, `Expiration_date`, `job_type`, `job_experience`, `job_qualification`, `job_salary`, `vaccancies`) VALUES
(1, 2, 'web developer', 'We are looking from concept to finished product.', 'sahiwal farid town', '1', '2021-05-31', '2021-05-31', ' 1', ' 1', ' 1', 30000, 44),
(2, 2, 'web designer', ' We are looking for a specialized Game Developer to turn a game idea into code on a fast moving environment. You will be involved in various aspects of game’s creation from concept to finished product including coding, programming, audio, design, production and visual arts. We are looking for a specialized Game Developer to turn a game idea into code on a fast moving environment. You will be involved in various aspects of game’s creation from concept to finished product including coding, programming, audio, design, We are looking for a specialized Game Developer to turn a game idea into code on a fast moving environment. You will be involved in various aspects of game’s creation from concept to finished product including coding, programming, audio, design, production and visual art production and visual arts. ', 'lahore', '2', '2021-06-03', '2021-06-11', ' 4', ' 3', ' 4', 40000, 15),
(3, 2, 'android', '  We are looking for a specialized Game Developer to turn a game idea into code on a fast moving environment. You will be involved in various aspects of game’s creation from concept to finished product including coding, programming, audio, design, production and visual arts. . You will be involved in various aspects of game’s creation from concept to finished product including coding, programming, audio, design, We are looking for a specialized Game Developer to turn a game idea into code on a fast moving environment. You will be involved in various aspects of game’s creation from concept to finished product including coding, programming, audio, design, production                                                                                                                                  ', 'sahiwal', '1', '2021-06-03', '2021-06-11', ' 1', ' 1', ' 1', 45000, 48),
(4, 3, 'SQL, database', 'Searching to fulfill your business\'s software solutions? At GoodFirms, we curate and present a list of Top Custom Software Development Companies in Pakistan to aid service-seekers. Software development has been rapidly growing in the country, with many of the software companies getting international recognition for their services. Some of the software projects have even set niche in their domains like education, hospitality, pharmaceuticals, and e-commerce. Consider hiring one of these software developers, once you check out their client review, GoodFirms\' ranking, and company details.Searching to fulfill your business\'s software solutions? At GoodFirms, we curate and present a list of Top Custom Software Development Companies in Pakistan to aid service-seekers. Software development has been rapidly growing in the country, with many of the software companies getting international recognition for their services. Some of the software projects have even set niche in their domains like education, hospitality, pharmaceuticals, and e-commerce. Consider hiring one of these software developers, once you check out their client review, GoodFirms\' ranking, and company details.\r\n\r\n \r\n\r\n\r\n ', 'harrapa', '5', '2021-06-04', '2021-06-12', ' 2', ' 4', ' 5', 50000, 8),
(5, 3, 'testing programmer', 'Searching to fulfill your business\'s software solutions? At GoodFirms, we curate and present a list of Top Custom Software Development Companies in Pakistan to aid service-seekers. Software development has been rapidly growing in the country, with many of the software companies getting international recognition for their services. Some of the software projects have even set niche in their domains like education, hospitality, pharmaceuticals, and e-commerce. Consider hiring one of these software developers, once you check out their client review, GoodFirms\' ranking, and company details.\r\n\r\n ', 'gujrawala', '4', '2021-06-05', '2021-06-17', ' 1', ' 4', ' 4', 55000, 12),
(6, 4, 'networking', 'When your sales and marketing teams need to orchestrate a unified marketing approach for lead generation and nurturing, nothing fits better than dynamic marketing automation software. Marketing automation is a complete solution to all challenges faced by sales and marketing teams in the digital age. Organizations of all sizes use marketing automation for B2B and B2C marketing. From designing, implementing, monitoring, and managing marketing campaigns on multiple platforms to lead generation, nurturing, and onboarding, marketing automation eliminates all deadlocks and makes your sales and marketing teams highly performant. ', 'lahore', '2', '2021-06-12', '2021-06-18', ' 6', ' 3', ' 3', 35000, 17),
(7, 4, 'IT developer', 'When your sales and marketing teams need to orchestrate a unified marketing approach for lead generation and nurturing, nothing fits better than dynamic marketing automation software. Marketing automation is a complete solution to all challenges faced by sales and marketing teams in the digital age. Organizations of all sizes use marketing automation for B2B and B2C marketing. From designing, implementing, monitoring, and managing marketing campaigns on multiple platforms to lead generation, nurturing, and onboarding, marketing automation eliminates all deadlocks and makes your sales and marketing teams highly performant. ', 'sahiwal', '2', '2021-06-05', '2021-06-11', ' 3', ' 3', ' 3', 33000, 12);

-- --------------------------------------------------------

--
-- Table structure for table `job_experiences`
--

CREATE TABLE `job_experiences` (
  `exp_id` int(100) NOT NULL,
  `exp_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_experiences`
--

INSERT INTO `job_experiences` (`exp_id`, `exp_name`) VALUES
(1, 'Entry Level'),
(2, 'Enter mediate'),
(3, 'Expert'),
(4, 'Pro Expert');

-- --------------------------------------------------------

--
-- Table structure for table `job_seekers`
--

CREATE TABLE `job_seekers` (
  `s_id` int(100) NOT NULL,
  `name` varchar(256) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_seekers`
--

INSERT INTO `job_seekers` (`s_id`, `name`, `phone`, `email`, `password`) VALUES
(1, 'hassan', '03095075729', 'hassan@gmail.com', '123456'),
(4, 'akhtr', '03095075723', 'akhtr@gmail.com', '123456'),
(5, 'MohsinAli', '03123456789', 'mohsincuisahiwal@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `jt_id` int(100) NOT NULL,
  `jt_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`jt_id`, `jt_name`) VALUES
(1, 'Full time'),
(2, 'Part time'),
(3, 'Contract'),
(4, 'Temporary'),
(5, 'Remotic'),
(6, 'Internship');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `q_id` int(100) NOT NULL,
  `q_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`q_id`, `q_name`) VALUES
(1, 'High School Diploma'),
(2, 'Associate\'s Degree'),
(3, 'Bachelor\'s Degree '),
(4, 'Master\'s Degree'),
(5, 'Master\'s of Business Administration');

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE `resume` (
  `r_id` int(100) NOT NULL,
  `s_id` int(100) NOT NULL,
  `qualification` varchar(256) NOT NULL,
  `file` varchar(300) NOT NULL,
  `experience` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`r_id`, `s_id`, `qualification`, `file`, `experience`) VALUES
(3, 1, 'bscs', 'G-12-BCS-16-58.docx', '3 years');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `applied_jobs`
--
ALTER TABLE `applied_jobs`
  ADD PRIMARY KEY (`aj_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD UNIQUE KEY `e_id` (`job_id`);

--
-- Indexes for table `job_experiences`
--
ALTER TABLE `job_experiences`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `job_seekers`
--
ALTER TABLE `job_seekers`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`jt_id`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applied_jobs`
--
ALTER TABLE `applied_jobs`
  MODIFY `aj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `e_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `job_experiences`
--
ALTER TABLE `job_experiences`
  MODIFY `exp_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_seekers`
--
ALTER TABLE `job_seekers`
  MODIFY `s_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `jt_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `q_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `resume`
--
ALTER TABLE `resume`
  MODIFY `r_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
