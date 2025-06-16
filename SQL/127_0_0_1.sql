-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 24, 2023 at 02:40 AM
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
-- Database: `exam_system`
--
CREATE DATABASE IF NOT EXISTS `exam_system` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `exam_system`;

-- --------------------------------------------------------

--
-- Table structure for table `online_exam_enroll`
--

DROP TABLE IF EXISTS `online_exam_enroll`;
CREATE TABLE IF NOT EXISTS `online_exam_enroll` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `attendance_status` enum('Absent','Present') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_exam_enroll`
--

INSERT INTO `online_exam_enroll` (`id`, `user_id`, `exam_id`, `attendance_status`) VALUES
(18, 4, 1, 'Absent'),
(19, 4, 3, 'Absent'),
(20, 4, 3, 'Absent'),
(21, 4, 7, 'Absent'),
(22, 4, 6, 'Absent'),
(23, 4, 6, 'Absent'),
(24, 4, 4, 'Absent');

-- --------------------------------------------------------

--
-- Table structure for table `online_exam_exams`
--

DROP TABLE IF EXISTS `online_exam_exams`;
CREATE TABLE IF NOT EXISTS `online_exam_exams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `exam_title` varchar(250) NOT NULL,
  `exam_datetime` datetime NOT NULL,
  `duration` varchar(30) NOT NULL,
  `total_question` int(5) NOT NULL,
  `marks_per_right_answer` varchar(30) NOT NULL,
  `marks_per_wrong_answer` varchar(30) NOT NULL,
  `created_on` datetime NOT NULL,
  `status` enum('Pending','Created','Started','Completed') NOT NULL,
  `exam_code` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_exam_exams`
--

INSERT INTO `online_exam_exams` (`id`, `user_id`, `exam_title`, `exam_datetime`, `duration`, `total_question`, `marks_per_right_answer`, `marks_per_wrong_answer`, `created_on`, `status`, `exam_code`) VALUES
(1, 1, 'PHP Test', '0000-00-00 00:00:00', '1', 5, '1', '1', '2021-05-31 12:51:11', 'Created', ''),
(3, 1, 'JavaScript Test', '2020-11-27 15:03:00', '2', 2, '1', '1', '2020-11-15 08:26:41', 'Created', ''),
(4, 1, 'HTML Test', '2020-12-22 20:47:00', '5', 2, '1', '1', '0000-00-00 00:00:00', 'Created', ''),
(6, 1, 'Perl exams', '2020-11-30 15:54:00', '5', 2, '1', '1', '0000-00-00 00:00:00', 'Created', ''),
(7, 1, 'Python test exam', '0000-00-00 00:00:00', '2', 2, '1', '1', '0000-00-00 00:00:00', 'Created', '');

-- --------------------------------------------------------

--
-- Table structure for table `online_exam_option`
--

DROP TABLE IF EXISTS `online_exam_option`;
CREATE TABLE IF NOT EXISTS `online_exam_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `option` int(2) NOT NULL,
  `title` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_exam_option`
--

INSERT INTO `online_exam_option` (`id`, `question_id`, `option`, `title`) VALUES
(1, 1, 1, 'Pre Processor '),
(2, 1, 2, 'Processor PHP'),
(3, 1, 3, 'Hypertext Preprocessor'),
(4, 1, 4, 'Text Processor'),
(5, 2, 1, 'Front end language'),
(6, 2, 2, 'Server end language'),
(7, 2, 3, 'DB end language'),
(8, 2, 4, 'Top end language'),
(9, 3, 1, '&'),
(10, 3, 2, '$'),
(11, 3, 3, '#'),
(12, 3, 4, '%'),
(13, 8, 1, '&#60;?php ....?&#62;'),
(14, 8, 2, '&#60;?php &#62;'),
(15, 8, 3, '&#60;? php?'),
(16, 8, 4, '&#60;?php ?&#62;'),
(17, 9, 1, 'programming langauge'),
(18, 9, 2, 'markup language'),
(19, 9, 3, 'database language'),
(20, 9, 4, 'design language'),
(21, 10, 1, 'stylesheet language'),
(22, 10, 2, 'scripting langauge'),
(23, 10, 3, 'design language'),
(24, 10, 4, 'styling langauge'),
(25, 11, 1, 'Server side language'),
(26, 11, 2, 'Front end language'),
(27, 11, 3, 'Design language'),
(28, 11, 4, 'Style language'),
(29, 12, 1, 'Front end language'),
(30, 12, 2, 'server side language'),
(31, 12, 3, 'UI language'),
(32, 12, 4, 'Design language'),
(33, 13, 1, 'Jhon Smith'),
(34, 13, 2, 'George Belly'),
(35, 13, 3, 'Rasmus Lerdorf'),
(36, 13, 4, 'Andy Smith'),
(37, 14, 1, 'message(\"Hello World\")'),
(38, 14, 2, 'alert(\"Hello World\")'),
(39, 14, 3, 'console.log(\"Hello World\")'),
(40, 14, 4, 'alertbox(\"Hello World\")'),
(41, 15, 1, 'practical extraction and display language'),
(42, 15, 2, 'practical extraction and report language'),
(43, 15, 3, 'practical display and report language'),
(44, 15, 4, 'practical and report language'),
(45, 16, 1, 'design language'),
(46, 16, 2, 'programming language'),
(47, 16, 3, 'server side language'),
(48, 16, 4, 'front end language');

-- --------------------------------------------------------

--
-- Table structure for table `online_exam_process`
--

DROP TABLE IF EXISTS `online_exam_process`;
CREATE TABLE IF NOT EXISTS `online_exam_process` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `examid` int(11) NOT NULL,
  `start_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `online_exam_process`
--

INSERT INTO `online_exam_process` (`id`, `userid`, `examid`, `start_time`) VALUES
(32, 4, 1, '2021-11-05 17:51:48'),
(33, 4, 3, '2023-02-13 12:45:43'),
(34, 4, 6, '2023-02-13 12:51:21'),
(35, 4, 4, '2023-02-22 02:44:26');

-- --------------------------------------------------------

--
-- Table structure for table `online_exam_question`
--

DROP TABLE IF EXISTS `online_exam_question`;
CREATE TABLE IF NOT EXISTS `online_exam_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` enum('1','2','3','4') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_exam_question`
--

INSERT INTO `online_exam_question` (`id`, `exam_id`, `question`, `answer`) VALUES
(1, 1, 'PHP Stands For?', '3'),
(2, 1, 'PHP is ?', '2'),
(3, 1, 'All variables in PHP start with which symbol?', '2'),
(8, 1, 'PHP server scripts are surrounded by delimiters, which?', '4'),
(9, 4, 'HTML is ?', '2'),
(10, 4, 'CSS is', '1'),
(11, 3, 'JavaScript is a ?', '2'),
(12, 6, 'Perl is a  ?', '2'),
(13, 1, 'Who is known as the father of PHP?', '3'),
(14, 3, 'How do you write &quot;Hello World&quot; in an alert box?', '2'),
(15, 6, 'Perl language full form ?', '2'),
(16, 7, 'python is ?', '2');

-- --------------------------------------------------------

--
-- Table structure for table `online_exam_question_answer`
--

DROP TABLE IF EXISTS `online_exam_question_answer`;
CREATE TABLE IF NOT EXISTS `online_exam_question_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_answer_option` enum('0','1','2','3','4') NOT NULL,
  `marks` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_exam_question_answer`
--

INSERT INTO `online_exam_question_answer` (`id`, `user_id`, `exam_id`, `question_id`, `user_answer_option`, `marks`) VALUES
(117, 4, 1, 1, '3', '1'),
(118, 4, 1, 2, '3', '-1'),
(119, 4, 1, 3, '4', '-1'),
(120, 4, 1, 8, '2', '-1'),
(121, 4, 1, 13, '3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `online_exam_user`
--

DROP TABLE IF EXISTS `online_exam_user`;
CREATE TABLE IF NOT EXISTS `online_exam_user` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(64) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `address` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `role` enum('admin','user') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `online_exam_user`
--

INSERT INTO `online_exam_user` (`id`, `first_name`, `last_name`, `gender`, `email`, `password`, `mobile`, `address`, `created`, `role`) VALUES
(1, 'William', 'Smith', 'Male', 'admin@webdamn.com', '202cb962ac59075b964b07152d234b70', '1234567890', '', '2020-11-28 22:45:58', 'admin'),
(2, 'jhon', 'smith', 'Male', 'user@webdamn.com', '202cb962ac59075b964b07152d234b70', '123456789', '', '2020-11-28 22:45:58', 'user'),
(3, 'Jhon', 'Eyan', 'Male', 'user1@test.com', '202cb962ac59075b964b07152d234b70', '123456789', '', '2020-11-28 22:45:58', 'user'),
(4, 'Dunkun', 'damian', 'Male', 'user2@test.com', '202cb962ac59075b964b07152d234b70', '123456789', '', '2020-11-28 22:45:58', 'user'),
(6, 'sfas', 'khan', 'Male', 'abcd@gmail.com', '202cb962ac59075b964b07152d234b70', '1234567890', 'dsdgsd', '2021-11-04 20:42:14', 'user');
--
-- Database: `online_exam`
--
CREATE DATABASE IF NOT EXISTS `online_exam` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `online_exam`;

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

DROP TABLE IF EXISTS `enroll`;
CREATE TABLE IF NOT EXISTS `enroll` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `exam_taken` enum('Yes','No') NOT NULL DEFAULT 'No',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`exam_id`)
) ENGINE=MyISAM AUTO_INCREMENT=252 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`id`, `user_id`, `exam_id`, `exam_taken`) VALUES
(251, 2, 20, 'Yes'),
(250, 2, 1, 'Yes'),
(249, 2, 4, 'No'),
(248, 2, 7, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `exam_answer`
--

DROP TABLE IF EXISTS `exam_answer`;
CREATE TABLE IF NOT EXISTS `exam_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_answer_option` enum('0','1','2','3','4') NOT NULL,
  `marks` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`exam_id`,`question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_answer`
--

INSERT INTO `exam_answer` (`id`, `user_id`, `exam_id`, `question_id`, `user_answer_option`, `marks`) VALUES
(56, 2, 7, 7, '2', '5'),
(57, 2, 7, 582, '1', '5'),
(58, 2, 4, 9, '2', '1'),
(59, 2, 4, 10, '1', '1'),
(60, 2, 1, 1, '1', '1'),
(61, 2, 1, 2, '2', '1'),
(62, 2, 1, 3, '2', '1'),
(63, 2, 1, 8, '4', '1'),
(64, 8, 1, 1, '1', '1'),
(65, 8, 1, 2, '2', '1'),
(66, 8, 1, 3, '2', '1'),
(67, 8, 1, 8, '4', '1'),
(68, 8, 20, 584, '1', '1'),
(69, 2, 20, 584, '1', '1'),
(70, 1, 20, 584, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `exam_create`
--

DROP TABLE IF EXISTS `exam_create`;
CREATE TABLE IF NOT EXISTS `exam_create` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `exam_title` varchar(250) NOT NULL,
  `duration` varchar(30) NOT NULL,
  `total_question` int(5) NOT NULL,
  `marks_right_answer` varchar(30) NOT NULL,
  `create_on` date NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','Created','Started','Completed') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_create`
--

INSERT INTO `exam_create` (`id`, `user_id`, `exam_title`, `duration`, `total_question`, `marks_right_answer`, `create_on`, `status`) VALUES
(7, 1, 'Python ', '2', 2, '5', '0000-00-00', 'Completed'),
(4, 1, 'HTML ', '5', 2, '1', '0000-00-00', 'Completed'),
(1, 1, 'PHP Test', '1', 4, '1', '2021-05-31', 'Started'),
(20, 1, 'CSS', '10', 1, '1', '2023-02-27', 'Started');

-- --------------------------------------------------------

--
-- Table structure for table `exam_option`
--

DROP TABLE IF EXISTS `exam_option`;
CREATE TABLE IF NOT EXISTS `exam_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `Q_option` int(2) NOT NULL,
  `title` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=178 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_option`
--

INSERT INTO `exam_option` (`id`, `question_id`, `Q_option`, `title`) VALUES
(1, 1, 1, 'Hypertext Preprocessor'),
(2, 1, 2, 'Pre Processor'),
(3, 1, 3, 'Text Processor'),
(4, 1, 4, 'Processor PHP'),
(5, 2, 1, 'Front end language'),
(6, 2, 2, 'Server end language'),
(7, 2, 3, 'DB end language'),
(8, 2, 4, 'Top end language'),
(9, 3, 1, '&'),
(10, 3, 2, '$'),
(11, 3, 3, '#'),
(12, 3, 4, '%'),
(13, 8, 1, '&#60;?php ....?&#62;'),
(14, 8, 2, '&#60;?php &#62;'),
(15, 8, 3, '&#60;? php?'),
(16, 8, 4, '&#60;?php ?&#62;'),
(17, 9, 1, 'programming langauge'),
(18, 9, 2, 'markup language'),
(19, 9, 3, 'database language'),
(20, 9, 4, 'design language'),
(21, 10, 1, 'stylesheet language'),
(22, 10, 2, 'scripting langauge'),
(23, 10, 3, 'design language'),
(24, 10, 4, 'styling langauge'),
(26, 4, 1, 'Markup Language'),
(27, 4, 2, 'Scripting Language'),
(28, 4, 3, 'Temporary Language'),
(29, 4, 4, 'None of Above'),
(30, 5, 1, 'Bjarne Stroustrup'),
(31, 5, 2, 'Brendan Eich'),
(32, 5, 3, 'Rasmus Lerdorf'),
(33, 5, 4, 'James Gosling OC'),
(34, 6, 1, 'echo Hello'),
(35, 6, 2, 'alert(\"Hello World\")'),
(36, 6, 3, 'cout<<\"Hello World\"'),
(37, 6, 4, 'print(\"Hello World\")'),
(38, 7, 1, 'Low Level'),
(39, 7, 2, 'High Level'),
(40, 7, 3, 'machine Language'),
(41, 7, 4, 'None of Above'),
(177, 584, 4, 'grgr'),
(176, 584, 3, 'rgrgr'),
(175, 584, 2, 'dfedgf'),
(174, 584, 1, 'stylesheet language'),
(169, 582, 4, '()'),
(168, 582, 3, '<>'),
(167, 582, 2, '{}'),
(166, 582, 1, '[]');

-- --------------------------------------------------------

--
-- Table structure for table `exam_question`
--

DROP TABLE IF EXISTS `exam_question`;
CREATE TABLE IF NOT EXISTS `exam_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) NOT NULL,
  `Question` text NOT NULL,
  `Answer` enum('1','2','3','4') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=585 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_question`
--

INSERT INTO `exam_question` (`id`, `exam_id`, `Question`, `Answer`) VALUES
(1, 1, 'PHP Stands For?', '1'),
(2, 1, 'PHP is ?', '2'),
(3, 1, 'All variables in PHP start with which symbol?', '2'),
(8, 1, 'PHP server scripts are surrounded by delimiters, which?', '4'),
(9, 4, 'html  is ?', '2'),
(10, 4, 'CSS is', '1'),
(4, 3, 'JavaScript is a ?', '2'),
(6, 3, 'How do you write &quot;Hello World&quot; in an alert box?', '2'),
(7, 7, 'python is ?', '2'),
(584, 20, 'what is css', '1'),
(582, 7, 'Give Syntax of List ? ', '1');

-- --------------------------------------------------------

--
-- Table structure for table `exam_user`
--

DROP TABLE IF EXISTS `exam_user`;
CREATE TABLE IF NOT EXISTS `exam_user` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `laast_name` varchar(250) CHARACTER SET utf16 DEFAULT NULL,
  `gender` enum('Male','Female') CHARACTER SET utf8 NOT NULL,
  `email` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(60) CHARACTER SET utf8 NOT NULL,
  `mobile` varchar(12) CHARACTER SET utf8 NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `role` enum('admin','user') CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_user`
--

INSERT INTO `exam_user` (`id`, `first_name`, `laast_name`, `gender`, `email`, `password`, `mobile`, `address`, `created`, `role`) VALUES
(1, 'Priyam', 'Davra', 'Male', 'admin@gmail.com', 'Priyam', '1234657980', 'Nana Bazar, near Shahid Chowk.', '2022-12-21 20:39:30', 'admin'),
(2, 'Pushpesh', 'Chavda', 'Male', 'user@gmail.com', 'Pushpesh', '9601290900', 'Nana Bazar, Near Shahid Chowk.', '2022-12-21 20:41:13', 'user'),
(8, 'anant', 'Patel', 'Male', 'user2@gmail.com', '123', '123456780', 'gc buigejNIPEJO;', '2023-02-27 17:58:21', 'user');
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
