-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2021 at 04:26 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied_job`
--

CREATE TABLE `applied_job` (
  `id` int(11) NOT NULL,
  `job_id` int(20) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `apply_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applied_job`
--

INSERT INTO `applied_job` (`id`, `job_id`, `candidate_id`, `apply_date`) VALUES
(1, 5, 3, '2021-07-02'),
(2, 2, 3, '2021-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin_reg`
--

CREATE TABLE `tbladmin_reg` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin_reg`
--

INSERT INTO `tbladmin_reg` (`ID`, `FirstName`, `LastName`, `Email`, `Password`, `Address`) VALUES
(3, 'Khairul', 'Islam', 'khairul@gmail.com', '12345', 'Mirpur, Dhaka'),
(4, 'Jafar', 'Udding', 'jafar12@gmail.com', '1234', 'Ghoraghata'),
(5, 'Micky', 'Mouse', 'micky@gmail.com', 'm123', 'Mirpur, Dhaka'),
(13, 'Donald', 'Duck', 'donald@gmail.com', '5679', 'Dhaka'),
(14, 'Micky', 'Mouse', 'mouse@gmail.com', '1234', 'Dhaka'),
(15, 'Xman', '', 'xman@gmail.com', '1234567', 'Dhaka'),
(16, 'xyz', '', 'xyz@gmail.com', '123', 'Dhaka'),
(17, 'mmm', '', 'mym@gmail.com', '123d', 'Dhaka'),
(18, 'Jack', '', 'Jack@gmail.com', '1234', 'Dhaka'),
(19, 'Jone', 'Doe', 'jondoe@gmail.com', '4567', 'Dhaka'),
(20, 'Jany', 'Doe', 'jany@gmail.com', '2wer', 'England'),
(21, 'Hans', 'Pee', 'hans@gmail.com', '12wer', 'Uganda'),
(22, 'July', '', 'july@gmail.com', '123ed', 'Uganda'),
(23, 'Jerry', '', 'jerry@ymail.com', 'rthi', 'California,US'),
(24, 'ccc', 'miimi', 'cm@gmail.com', '12sc', 'sd'),
(25, 'Rajia', 'Shultana', 'rajiashultana21@gmail.com', '1234', 'Pabna'),
(26, 'Donald', 'Udding', 'edruc@gmail.com', 'dfv', 'dfvb');

-- --------------------------------------------------------

--
-- Table structure for table `tblcompany_reg`
--

CREATE TABLE `tblcompany_reg` (
  `Id` int(11) NOT NULL,
  `Company` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Contact_No` int(20) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Company_logo` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcompany_reg`
--

INSERT INTO `tblcompany_reg` (`Id`, `Company`, `Email`, `Password`, `Contact_No`, `Address`, `Company_logo`) VALUES
(1, 'Apex', 'apex@gmail.com', 'ddd', 0, 'Dhaka, Bangladesh', ''),
(2, 'SuJu', 'suju@gmail.com', 'ffff', 1789234598, 'Tokio, Japan', ''),
(3, 'SuJu', 'suju@gmail.com', 'ffff', 1789234598, 'Tokio, Japan', ''),
(10, 'ink', 'ink@gmail.com', 'uio', 94832, 'Rongpur, Bangladesh', ''),
(11, 'ink', 'ink@gmail.com', 'klo', 1789234598, 'tipi', ''),
(12, 'ink', 'ink@gmail.com', 'klp', 1789234598, 'Pabna', 'redflower.jpg'),
(13, 'fff', 'ff@gmail.com', '456', 13098765, 'Pabna', ''),
(14, 'fff', 'ff@gmail.com', 'op0', 92394586, 'pabna', 'lotus.jpg'),
(15, 'preal', 'preal@gmail.com', '2345', 1789234598, 'pabina', 'lotus.jpg'),
(16, 'preal', 'rimu@gmail.com', 'ui', 1789234598, 'uio', 'Fig0338(a)(blurry_moon).tif'),
(17, 'Daraz', 'daraz@gmail.com', '12345', 203789623, 'Dhaka', 'redflower.jpg'),
(18, 'Daraz', 'daraz@gmail.com', '12345', 203789623, 'Dhaka', 'redflower.jpg'),
(19, 'Edruc', 'edruc@gmail.com', '123', 738294712, 'Pabana, Dhaka', 'lotus.jpg'),
(20, 'Techdevs', 'techdev@gmail.com', '567', 598765422, 'Rajshahi', 'new 1.txt'),
(21, 'X', 'x@gmail.com', '34rt', 1345084508, 'Dhaka', 'flower.jpg'),
(22, 'fff', 'rr@gmail.com', '123', 1345084508, 'ds', ''),
(23, 'h', '', 'gf', 0, 'g', ''),
(24, 'SuJu', 'darazf@gmail.com', '', 0, '', ''),
(25, 'preal', 'ritu@gmail.com', 'fd', 0, 'dsa', ''),
(26, 'dasf', 'xman@gmail.com', 'fsad', 0, 'sdfasd', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployee_reg`
--

CREATE TABLE `tblemployee_reg` (
  `Id` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Phone_Number` int(20) NOT NULL,
  `University` varchar(50) NOT NULL,
  `Department` varchar(20) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `CV_or_Resume` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblemployee_reg`
--

INSERT INTO `tblemployee_reg` (`Id`, `FirstName`, `LastName`, `Email`, `Password`, `Phone_Number`, `University`, `Department`, `Address`, `CV_or_Resume`) VALUES
(1, 'Mohona', 'Pramanik', 'mohonapramanik@gmail.com', '345', 1828152595, 'Dhaka university', 'Social work', 'Pabna', '170602 Rajia Shultana.docx'),
(2, 'Jon', 'Doe', 'jondoe@gmail.com', '1234', 170981234, 'Dhaka university', 'Computer Science Eng', 'Dhaka', '170602 Rajia Shultana.docx'),
(3, 'Jon', 'Doe', 'jondoe@gmail.com', '1234', 170981234, 'Dhaka university', 'Computer Science Eng', 'Dhaka', '170602 Rajia Shultana.docx'),
(4, 'Yman', 'Ree', 'yman@gmail.com', '3ert', 123456745, 'X University', 'Information and Comm', 'Malta', '3_2_project_papper.pdf'),
(5, 'Mohona', 'P', 'techdev@gmail.com', '45', 0, 'asd', 'adf', 'fsad', 'datatable.html');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs`
--

CREATE TABLE `tbl_jobs` (
  `Id` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Requirement` varchar(350) NOT NULL,
  `Education` varchar(300) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `Salary` varchar(10) NOT NULL,
  `Job_type` varchar(20) NOT NULL,
  `Comapany_id` int(11) NOT NULL,
  `Dead_line` varchar(15) NOT NULL,
  `Status` int(3) NOT NULL DEFAULT 0,
  `Post_Date` datetime NOT NULL DEFAULT current_timestamp(),
  `Category` varchar(255) DEFAULT NULL,
  `Vacancy` int(11) DEFAULT NULL,
  `InstitutionalName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jobs`
--

INSERT INTO `tbl_jobs` (`Id`, `Title`, `Description`, `Requirement`, `Education`, `Location`, `Salary`, `Job_type`, `Comapany_id`, `Dead_line`, `Status`, `Post_Date`, `Category`, `Vacancy`, `InstitutionalName`) VALUES
(1, 'Technical Officer', 'Some thing', 'Some thing', 'BSc', 'Pabna', '12000', 'full-time', 9, '2021-07-07', 1, '2021-06-22 11:57:09', NULL, NULL, NULL),
(2, 'Web Developer', 'Develop website and webapp', 'skill: html, css, js, php, Database', 'BSc completed', 'Pabna', '30000', 'full-time', 9, '2021-08-06', 1, '2021-06-22 12:06:56', NULL, NULL, NULL),
(6, 'Web Designer', 'some thing', 'something', 'some', 'Rajshahi', '12', 'part-time', 16, '2021-07-20', 1, '2021-06-24 14:58:45', NULL, NULL, NULL),
(8, 'google designer', 'Google Web Designer gives you the power to create beautiful, engaging HTML5 content. Use animation and interactive elements to bring your creative vision to life, and enjoy seamless integration with other Google products, like Google Drive, Display', 'skill at html, css, js', 'BSc', 'Rajshahi', '23', 'part-time', 16, '2021-07-09', 1, '2021-06-24 15:08:22', NULL, NULL, NULL),
(9, 'Web Developer (Laravel &amp; VueJS)', 'Are you on the hunt for exciting new challenges that boost your professional growth? If you’re an innovator by nature and have a passion for development, we’d love to hear from you! Read on to see if you’d be a good fit for the Scopic team of 250+ professionals from over 40 countries.\r\nAt Scopic, the virtual world is our home so this is a fully remote position. Only apply if you’re prepared for the zero-hour commute and the thought of collaborating with colleagues from around the globe excites y', 'Skills Required: JavaScript, Laravel Framework, VueJS, PHP, Bootstrap, HTML5 &amp; CSS3, jQuery, MySQL', 'BSc in Computer Science and Engineering from any reputed University.', 'Dhaka', 'Tk. 20,000', 'part-time', 20, '2021-08-06', 0, '2021-07-02 20:49:41', NULL, NULL, NULL),
(20, 'Education Consultant (Australia, Canda and UK)', 'WE ARE HIRING!! Be one of our education consultant and become a part of success stories.\r\nPathway Education and Visa Services (www.pathwateducation.com.au) is a trusted name in the Education Consultation industry with 4 international branches in Australia and 1 local branch in Bangladesh backed by the best Education Agents, Migration Lawyers and a team of dedicated Customer Service Representatives.\r\nOur journey has been filled with numerous success stories of students, migrants and various clien', 'Applications will be assessed-based on the following requirements.\r\nMust have minimum 1-year proven job experience in especially Australia, Canada and UK and have PIER certification\r\nHandle visa applications, to ensure all the paperwork are prepared properly accordingly to the regulations, however, the application will be only processed by our migr', 'Bachelor degree in any discipline.\r\nSkills Required: Ability to judge, Communication skill, Negotiation Skills, network building, Organised, Student Counselling, Team player', 'Dhaka', 'Tk. 40000 ', 'full-time', 1, '2021-09-09', 1, '2021-08-21 19:25:02', 'Education/Training', 1, 'Pathway Education'),
(21, 'fsdf', 'fsdaf', 'fadsf', 'fadf', 'fas', 'afdf', 'part-time', 1, '2021-09-08', 0, '2021-08-21 19:36:42', 'afd', 0, 'afdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE `tbl_message` (
  `Id` int(15) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Message` varchar(450) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`Id`, `Name`, `Email`, `Message`) VALUES
(1, 'Rajia', '', ''),
(2, 'Rajia Shultana', 'rajiashultana21@gmail.com', ''),
(3, 'Rajia Shultana', 'rajiashultana21@gmail.com', 'Hello!'),
(4, 'Rajia Shultana', 'rajiashultana21@gmail.com', 'Hello!'),
(5, 'Jone Doe', 'jondoe@gmail.com', 'abe ckei akfoj fjowiej'),
(6, 'Umme Habiba', 'umhabiba@gmail.com', 'Thank you.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applied_job`
--
ALTER TABLE `applied_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin_reg`
--
ALTER TABLE `tbladmin_reg`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `tblcompany_reg`
--
ALTER TABLE `tblcompany_reg`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblemployee_reg`
--
ALTER TABLE `tblemployee_reg`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  ADD PRIMARY KEY (`Id`);
ALTER TABLE `tbl_jobs` ADD FULLTEXT KEY `Title` (`Title`,`InstitutionalName`);
ALTER TABLE `tbl_jobs` ADD FULLTEXT KEY `Title_2` (`Title`);
ALTER TABLE `tbl_jobs` ADD FULLTEXT KEY `Location` (`Location`);

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applied_job`
--
ALTER TABLE `applied_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbladmin_reg`
--
ALTER TABLE `tbladmin_reg`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tblcompany_reg`
--
ALTER TABLE `tblcompany_reg`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tblemployee_reg`
--
ALTER TABLE `tblemployee_reg`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `Id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
