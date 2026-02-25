-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2020 at 02:31 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `virtuallab`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

CREATE TABLE `course_details` (
  `faculty_id` varchar(20) NOT NULL,
  `course_url` varchar(500) NOT NULL,
  `course_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_details`
--

INSERT INTO `course_details` (`faculty_id`, `course_url`, `course_name`) VALUES
('VCE511', 'https://virtual-labs-267308.uc.r.appspot.com/dbms', 'DBMS'),
('VCE511', 'https://virtual-labs-267308.uc.r.appspot.com/data_science', 'Data Science'),
('VCE511', 'https://virtual-labs-267308.uc.r.appspot.com/machinelearning', 'Machine Learning'),
('VCE511', 'https://virtual-labs-267308.uc.r.appspot.com/ost', 'Open Source Technologies');

-- --------------------------------------------------------

--
-- Table structure for table `data_table`
--

CREATE TABLE `data_table` (
  `branch` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_table`
--

INSERT INTO `data_table` (`branch`, `section`, `semester`) VALUES
('CSE', 'A', '6'),
('CSE', 'A', '5'),
('CSE', 'D', '1'),
('IT', 'D', '4'),
('ECE', 'D', '4'),
('', '', ''),
('IT', 'A', '6'),
('ECE', 'B', '1'),
('IT', 'C', '2'),
('IT', 'C', '2'),
('IT', 'B', '3'),
('CSE', 'C', '6'),
('CSE', 'C', '6'),
('CSE', 'C', '6'),
('CSE', 'C', '6'),
('CSE', 'C', '6');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_details`
--

CREATE TABLE `faculty_details` (
  `faculty_id` varchar(10) NOT NULL,
  `faculty_pass` varchar(10) NOT NULL,
  `faculty_name` varchar(20) NOT NULL,
  `faculty_branch` varchar(5) NOT NULL,
  `faculty_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_details`
--

INSERT INTO `faculty_details` (`faculty_id`, `faculty_pass`, `faculty_name`, `faculty_branch`, `faculty_email`) VALUES
('VCE511', '#UPIS', 'G S PRASADA REDDY', 'CSE', 'gsprasada@vardhaman.org');

-- --------------------------------------------------------

--
-- Table structure for table `groupmessages`
--

CREATE TABLE `groupmessages` (
  `id` varchar(20) NOT NULL,
  `messages` varchar(2000) NOT NULL,
  `sender` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `daate` varchar(20) NOT NULL,
  `timee` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lab_details`
--

CREATE TABLE `lab_details` (
  `lab_branch` varchar(10) NOT NULL,
  `lab_semester` varchar(10) NOT NULL,
  `lab_section` varchar(10) NOT NULL,
  `lab_1` varchar(20) NOT NULL,
  `lab1_assign` varchar(10) NOT NULL,
  `lab_2` varchar(20) NOT NULL,
  `lab2_assign` varchar(10) NOT NULL,
  `lab_3` varchar(20) NOT NULL,
  `lab3_assign` varchar(10) NOT NULL,
  `lab1_schedule` text NOT NULL,
  `lab2_schedule` text NOT NULL,
  `lab3_schedule` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_details`
--

INSERT INTO `lab_details` (`lab_branch`, `lab_semester`, `lab_section`, `lab_1`, `lab1_assign`, `lab_2`, `lab2_assign`, `lab_3`, `lab3_assign`, `lab1_schedule`, `lab2_schedule`, `lab3_schedule`) VALUES
('CSE', '6', 'C', 'OST', 'VCE511', 'UML', 'VCE511', 'MAD', 'VCE511', 'Date : 2020-03-10_Execute week-1 Programs;Date : 2020-03-16_Execute Week-2 programs;', 'Date : 2020-03-11_Execute Week-2 programs;', '');

-- --------------------------------------------------------

--
-- Table structure for table `sectionid`
--

CREATE TABLE `sectionid` (
  `id` varchar(20) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `section` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sectionid`
--

INSERT INTO `sectionid` (`id`, `branch`, `section`, `semester`) VALUES
('1', 'CSE', 'A', '8'),
('2', 'CSE', 'C', '6');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `student_id` varchar(20) NOT NULL,
  `student_pass` varchar(10) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `student_branch` varchar(10) NOT NULL,
  `student_section` varchar(5) NOT NULL,
  `student_semester` varchar(5) NOT NULL,
  `student_cgpa` varchar(5) NOT NULL,
  `student_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`student_id`, `student_pass`, `student_name`, `student_branch`, `student_section`, `student_semester`, `student_cgpa`, `student_email`) VALUES
('15881A05C1', '#RPSF', 'Bharat Reddy', 'CSE', 'C', '6', '7.5', 'bharatreddy@gmail.com'),
('15881A05C2', '#STRY', 'Ajay Upadhyay', 'CSE', 'C', '6', '9.3', 'sreyas.9494@gmail.com'),
('15881A05C3', '#BADS', 'Aray Neha Reddy', 'CSE', 'C', '6', '6.5', 'sreyas.9494@gmail.com'),
('15881A05C4', '#RAOS', 'Shreyas Bandaru', 'CSE', 'C', '6', '7.1', 'sreyas.9494@gmail.com'),
('15881A05C5', '#READ', 'Shekar', 'CSE', 'C', '6', '8.1', 'sreyas.9494@gmail.com'),
('15881A05C6', '#IRYG', 'Shravanthi', 'CSE', 'C', '6', '7.5', 'sreyas.9494@gmail.com'),
('15881A05C7', '#MIAN', 'Praveen Chand', 'CSE', 'C', '6', '7.2', 'sreyas.9494@gmail.com'),
('15881A05C8', '#RTHS', 'Sushma Bojja', 'CSE', 'C', '6', '8.3', 'sreyas.9494@gmail.com'),
('15881A05C9', '#GPOS', 'Rithvik', 'CSE', 'C', '6', '6.8', 'sreyas.9494@gmail.com'),
('15881A05D0', '#MADW', 'Renuka Priya', 'CSE', 'C', '6', '8.8', 'sreyas.9494@gmail.com'),
('15881A05D1', '#RTPH', 'Lavanya Chavali', 'CSE', 'C', '6', '5.5', 'sreyas.9494@gmail.com'),
('15881A05D2', '#OMKV', 'Sahitya', 'CSE', 'C', '6', '8.9', 'sreyas.9494@gmail.com'),
('15881A05D3', '#HEST', 'Shiva Priya', 'CSE', 'C', '6', '9.1', 'sreyas.9494@gmail.com'),
('15881A05D4', '#HOYI', 'Hareesh', 'CSE', 'C', '6', '9', 'sreyas.9494@gmail.com'),
('15881A05D5', '#HERD', 'Divya', 'CSE', 'C', '6', '9.2', 'sreyas.9494@gmail.com'),
('15881A05D6', '#JUND', 'Meghana', 'CSE', 'C', '6', '9.7', 'sreyas.9494@gmail.com'),
('15881A05D7', '#JEST', 'Suraj', 'CSE', 'C', '6', '7.4', 'sreyas.9494@gmail.com'),
('15881A05D8', '#UPAD', 'Nagpal', 'CSE', 'C', '6', '5', 'sreyas.9494@gmail.com'),
('15881A05D9', '#KNIL', 'Priyanka Gouspur', 'CSE', 'C', '6', '9.2', 'sreyas.9494@gmail.com'),
('15881A05H8', '#IMRY', 'U Sreyas', 'CSE', 'C', '6', '9.3', 'sreyas.9494@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
