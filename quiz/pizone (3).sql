-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2018 at 02:32 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizone`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(255) NOT NULL,
  `id` int(255) NOT NULL,
  `first` varchar(255) NOT NULL,
  `last` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `id`, `first`, `last`, `password`, `confirm`) VALUES
('tarun79dadhich@gmail.com', 3, 'Tarun', 'Sharma', 'tarun', '');

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `StuID` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `collegeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`StuID`, `name`, `collegeid`) VALUES
(1, 'm.d', 1),
(3, 'igm', 2),
(2, 'skd', 3);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `marks` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course`, `marks`) VALUES
(2, 'DATABASE', 100),
(3, 'JAVA', 100),
(4, 'HTML', 100),
(5, 'C', 100),
(13, 'C++', 100);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(255) NOT NULL,
  `emp name` varchar(255) NOT NULL,
  `emp address` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp name`, `emp address`, `mobile`) VALUES
(1, 'mohit', 'hmh', '12463246'),
(2, 'ajay', 'plbng', '1246343'),
(3, 'aman', 'hmg', '124343'),
(4, 'rohit', 'gng', '1231345');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(255) NOT NULL,
  `cat_image` varchar(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `cat_image`, `cat_name`, `cat_desc`) VALUES
(51, '7.jpg', '', 'Lorem ipsum dolor sit amet consectetur adipisicing');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `password`) VALUES
(1, 'Tarun', 'tarun'),
(2, 'Tarun', 'tarun'),
(3, 'Tarun', 'Tarun'),
(4, 'Tarun', 'Tarun'),
(5, 'Tarun', 'tarun'),
(6, 'Tarun', 'tarun'),
(7, 'Deepika', 'deepika'),
(8, 'Tarun', 'tarun'),
(9, 'Tarun', 'tarun'),
(10, 'Tarun', 'tarun'),
(11, 'Tarun', 'tarun'),
(12, 'Tarun', 'tarun'),
(13, 'Tarun', 'tarun'),
(14, 'Tarun', 'tarun'),
(15, 'Tarun', 'tarun'),
(16, 'Tarun', 'Tarun'),
(17, 'Tarun', 'tarun'),
(18, 'Tarun', 'tarun'),
(19, 'Tarun', 'tarun'),
(20, 'Tarun', 'tarun'),
(21, 'Deepika', 'Deepika'),
(22, 'Tarun', 'tarun'),
(23, 'Tarun', 'tarun');

-- --------------------------------------------------------

--
-- Table structure for table `login2`
--

CREATE TABLE `login2` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login2`
--

INSERT INTO `login2` (`id`, `name`, `email`, `password`, `confirm password`) VALUES
(82, 'Tarun', 'tarun@gmail.com', 'tarun', 'tarun'),
(86, 'Deepika ', 'deepika@gmail.com', 'deepika', 'deepika'),
(88, 'Test', 'test@gmail.com', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(8) NOT NULL,
  `member_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `member_password` varchar(64) NOT NULL,
  `member_email` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `member_name`, `member_password`, `member_email`) VALUES
(1, 'vincy', 'e2f3088a505f1ed02e40f5b62550f291', 'user@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`) VALUES
(10, 'Dashboard', 'index.php'),
(11, 'Data tables', 'table.php'),
(12, 'Training', 'training.php'),
(13, 'Contact US', 'mail.php');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(255) NOT NULL,
  `course_id` int(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `a1` varchar(255) NOT NULL,
  `a2` varchar(255) NOT NULL,
  `a3` varchar(255) NOT NULL,
  `a4` varchar(255) NOT NULL,
  `correct` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `course_id`, `question`, `a1`, `a2`, `a3`, `a4`, `correct`) VALUES
(6, 3, 'Which of these keywords is used to make a class?', 'class', 'struct', 'int', 'none of the mentioned', 'class'),
(9, 5, '	\r\nWhich bitwise operator is suitable for turning off a particular bit in a number?', '&& operator', '& operator', '|| operator', '! operator', '& operator'),
(11, 2, 'The SQL statement to create a view is:?', 'CREATE VIEW', 'MAKE VIEW', 'SELECT VIEW', 'INSERT VIEW', 'CREATE VIEW'),
(15, 13, 'Which of the following cannot be friend?', 'Function', 'Class', 'Object', 'Operator function', 'Object'),
(16, 4, 'HTML is a subset of?', 'SGMT', 'SGML', 'SGMD', 'None of these', 'SGML'),
(17, 4, 'www is based on which model?', 'Local-server', 'Client-server', '3-tier', 'None of these', 'Client-server'),
(18, 4, 'The map definition file is generally stored in', 'CGI-BIN', 'RECYCLE-BIN', 'BIN', 'All of these', 'CGI-BIN'),
(19, 13, 'Which of the following is not the member of class?', 'Static function', 'Friend function', 'Const function', 'Virtual function', 'Friend function'),
(20, 5, 'In which header file is the NULL macro defined? ', 'stdio.h', 'stddef.h', 'stdio.h and stddef.h', 'math.h', 'stdio.h and stddef.h'),
(21, 3, 'Is an empty .java file a valid source file?', 'True', 'False', 'Both (a)&(b)', 'None of these', 'True'),
(22, 3, 'What is the default value of short variable?', '0.0', '0', 'null', 'not defined', '0');

-- --------------------------------------------------------

--
-- Table structure for table `radio`
--

CREATE TABLE `radio` (
  `id` int(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL,
  `course_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `radio`
--

INSERT INTO `radio` (`id`, `answer`, `userid`, `question_id`, `course_id`) VALUES
(1, 'SGML', '82', 16, '4'),
(2, 'Client-server', '82', 17, '4'),
(3, 'CGI-BIN', '82', 18, '4'),
(4, 'class', '82', 6, '3'),
(5, 'True', '82', 21, '3'),
(6, 'not defined', '82', 22, '3');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `collegeid` int(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `mobile` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`collegeid`, `grade`, `mobile`) VALUES
(1, 'A', 132465),
(3, 'B', 134324),
(6, 'A', 3126465);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `right` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `report` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `email`, `contact`, `profile`) VALUES
(6, 'Email:Pizone@gmail.com ', ' Support:+99-000-6461-02 ', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StuID` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Age` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StuID`, `Name`, `Address`, `Age`) VALUES
(1, 'ABC', 'SGNR', '21'),
(2, 'DEF', 'SGNR', '22'),
(3, 'GHI', 'HMH', '24'),
(4, 'HIJ', 'PLBNG', '25'),
(5, 'JKL', 'SURATGARH', '20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`collegeid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login2`
--
ALTER TABLE `login2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radio`
--
ALTER TABLE `radio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StuID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `collegeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `login2`
--
ALTER TABLE `login2`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `radio`
--
ALTER TABLE `radio`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `StuID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
