-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2021 at 04:03 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountant`
--

CREATE TABLE `accountant` (
  `id` int(100) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `whatsapp_number` varchar(255) NOT NULL,
  `reg_date` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250;

--
-- Dumping data for table `accountant`
--

INSERT INTO `accountant` (`id`, `fullname`, `email`, `password`, `designation`, `phone_number`, `whatsapp_number`, `reg_date`, `profile_pic`) VALUES
(1, 'Accountant', 'accountant@gmail.com', 'accountant', 'Accountant', '+92 318 1541107', '+92 318 1541107', '01-06-2020', 'uploads/profile.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(2555) NOT NULL,
  `email` varchar(2555) NOT NULL,
  `password` varchar(2555) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `designation`, `profile_pic`) VALUES
(1, 'Admin Panel', 'admin@gmail.com', 'admin', 'IT MANAGER', 'uploads/profile.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(100) NOT NULL,
  `name` varchar(2555) NOT NULL,
  `teacher_id` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `teacher_id`) VALUES
(35, 'One', '34'),
(36, 'Two', '36'),
(37, 'Three', '37'),
(38, 'Four', '35'),
(39, 'Five', '38');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(100) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `complain` varchar(2555) NOT NULL,
  `date1` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `student_id`, `complain`, `date1`) VALUES
(4, '25', 'He came late daily.', '03-02-2021');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(100) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_address` varchar(255) NOT NULL,
  `school_mn` varchar(255) NOT NULL,
  `school_pn` varchar(255) NOT NULL,
  `school_logo` varchar(255) NOT NULL,
  `admin_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `school_name`, `school_address`, `school_mn`, `school_pn`, `school_logo`, `admin_id`) VALUES
(1, 'Saya Technologies', 'asgar mall murree road rawalpindi', '03035992539', '03181541107', 'uploads/logo.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `id` int(100) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `whatsapp_number` varchar(255) NOT NULL,
  `reg_date` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`id`, `fullname`, `email`, `password`, `designation`, `phone_number`, `whatsapp_number`, `reg_date`, `profile_pic`) VALUES
(1, 'Librarian', 'librarian@gmail.com', 'librarian', 'Librarian', '03181541107', '03181541107', '', 'uploads/profile.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(100) NOT NULL,
  `title` varchar(2555) NOT NULL,
  `author` varchar(2555) NOT NULL,
  `description` varchar(2555) NOT NULL,
  `type` varchar(2555) NOT NULL,
  `price` varchar(2555) NOT NULL,
  `stock` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `title`, `author`, `description`, `type`, `price`, `stock`) VALUES
(11, 'Book 1', 'Author 1', 'A novel is a piece of long narrative in literary prose. Narrative prose is meant to entertain and tell a story. It is a description of a chain of events which includes a cast of characters, a setting, and an ending. Most publishers prefer novels that are in the 80,000- to 120,000-word range, depending on the genre.', 'English', '$450', 100),
(12, 'Book 2', 'Author 2', 'A novel is a piece of long narrative in literary prose. Narrative prose is meant to entertain and tell a story. It is a description of a chain of events which includes a cast of characters, a setting, and an ending. Most publishers prefer novels that are in the 80,000- to 120,000-word range, depending on the genre.', 'English', '$350', 100),
(13, 'Book 3', 'Author 3', 'A novel is a piece of long narrative in literary prose. Narrative prose is meant to entertain and tell a story. It is a description of a chain of events which includes a cast of characters, a setting, and an ending. Most publishers prefer novels that are in the 80,000- to 120,000-word range, depending on the genre.', 'English', '$250', 100),
(14, 'Book 4', 'Author 4', 'A novel is a piece of long narrative in literary prose. Narrative prose is meant to entertain and tell a story. It is a description of a chain of events which includes a cast of characters, a setting, and an ending. Most publishers prefer novels that are in the 80,000- to 120,000-word range, depending on the genre.', 'English', '$150', 100),
(15, 'Book 5', 'Author 5', 'A novel is a piece of long narrative in literary prose. Narrative prose is meant to entertain and tell a story. It is a description of a chain of events which includes a cast of characters, a setting, and an ending. Most publishers prefer novels that are in the 80,000- to 120,000-word range, depending on the genre.', 'English', '$650', 100),
(16, 'Book 6', 'Author 6', 'A novel is a piece of long narrative in literary prose. Narrative prose is meant to entertain and tell a story. It is a description of a chain of events which includes a cast of characters, a setting, and an ending. Most publishers prefer novels that are in the 80,000- to 120,000-word range, depending on the genre.', 'English', '$550', 100),
(17, 'Book 7', 'Author 7', 'A novel is a piece of long narrative in literary prose. Narrative prose is meant to entertain and tell a story. It is a description of a chain of events which includes a cast of characters, a setting, and an ending. Most publishers prefer novels that are in the 80,000- to 120,000-word range, depending on the genre.', 'English', '$450', 100),
(18, 'Book 8', 'Author 8', 'A novel is a piece of long narrative in literary prose. Narrative prose is meant to entertain and tell a story. It is a description of a chain of events which includes a cast of characters, a setting, and an ending. Most publishers prefer novels that are in the 80,000- to 120,000-word range, depending on the genre.', 'English', '$350', 100),
(19, 'Book 9', 'Author 9', 'A novel is a piece of long narrative in literary prose. Narrative prose is meant to entertain and tell a story. It is a description of a chain of events which includes a cast of characters, a setting, and an ending. Most publishers prefer novels that are in the 80,000- to 120,000-word range, depending on the genre.', 'English', '$250', 100),
(20, 'Book 10', 'Author 10', 'A novel is a piece of long narrative in literary prose. Narrative prose is meant to entertain and tell a story. It is a description of a chain of events which includes a cast of characters, a setting, and an ending. Most publishers prefer novels that are in the 80,000- to 120,000-word range, depending on the genre.', 'English', '$150', 100),
(22, 'Login User PHP and MYSQL', 'Sarfraz', 'description of Login User PHP and MYSQL', 'PHP programming Language', '$200', 50);

-- --------------------------------------------------------

--
-- Table structure for table `monthly_fees`
--

CREATE TABLE `monthly_fees` (
  `id` int(100) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `actual_dues` varchar(255) NOT NULL,
  `fees_payed` varchar(255) NOT NULL,
  `noted` varchar(2555) NOT NULL,
  `month` varchar(255) NOT NULL,
  `date1` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250;

--
-- Dumping data for table `monthly_fees`
--

INSERT INTO `monthly_fees` (`id`, `student_id`, `actual_dues`, `fees_payed`, `noted`, `month`, `date1`) VALUES
(47, '29', '70000', '65000', 'less 5000', '06-2020', '29-06-2020'),
(49, '29', '70000', '65000', 'less 5000', '07-2020', '29-07-2020'),
(50, '29', '70000', '65000', 'less 5000', '08-2020', '29-08-2020'),
(51, '29', '70000', '65000', 'less 5000', '09-2020', '29-09-2020'),
(52, '29', '70000', '65000', 'less 5000', '10-2020', '29-10-2020'),
(54, '29', '70000', '65000', 'less 5000', '01-2021', '29-01-2021'),
(56, '28', '7500', '3000', '3500 payed from zaqat', '01-2021', '29-01-2021'),
(57, '29', '70000', '70000', 'no adjustment', '02-2021', '31-12-2020'),
(58, '30', '2100', '2000', '100 less', '02-2021', '03-02-2021');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_salary`
--

CREATE TABLE `monthly_salary` (
  `id` int(100) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `actual_dues` varchar(255) NOT NULL,
  `salary_payed` varchar(255) NOT NULL,
  `noted` varchar(2555) NOT NULL,
  `month` varchar(255) NOT NULL,
  `date1` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250;

--
-- Dumping data for table `monthly_salary`
--

INSERT INTO `monthly_salary` (`id`, `teacher_id`, `actual_dues`, `salary_payed`, `noted`, `month`, `date1`) VALUES
(1, '37', '57000', '50000', '7000 cut due to holidays', '01-2021', '25-01-2021'),
(2, '36', '51000', '51000', 'no adjustment', '01-2021', '30-01-2021'),
(5, '37', '57000', '57000', 'nill', '12-2020', '30-01-2021'),
(6, '36', '51000', '51000', 'nill', '12-2020', '30-01-2021'),
(7, '38', '80000', '80000', 'payed complete', '02-2021', '03-02-2021');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` int(100) NOT NULL,
  `fullname` varchar(2555) NOT NULL,
  `email` varchar(2555) NOT NULL,
  `password` varchar(2555) NOT NULL,
  `gender` varchar(2555) NOT NULL,
  `address` varchar(2555) NOT NULL,
  `phone_number` varchar(2555) NOT NULL,
  `whatsapp_number` varchar(255) NOT NULL,
  `student_id` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `fullname`, `email`, `password`, `gender`, `address`, `phone_number`, `whatsapp_number`, `student_id`) VALUES
(15, 'Parent Account', 'parent@gmail.com', 'parent', 'Male', 'asgar mall murree road rawalpindi', '033653168862', '0310-5316862', '25,28,29,'),
(18, 'Parent of Test account 50', 'parenttestaccout@gmail.com', 'parent123', 'Male', 'UN', '+92 318 1541107', '+92 318 1541107', '30,');

-- --------------------------------------------------------

--
-- Table structure for table `publish_book`
--

CREATE TABLE `publish_book` (
  `id` int(100) NOT NULL,
  `book_id` varchar(2555) NOT NULL,
  `student_id` varchar(2555) NOT NULL,
  `publish_date` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(100) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `salary_monthly` varchar(255) NOT NULL,
  `transport` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `date1` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `teacher_id`, `salary_monthly`, `transport`, `total`, `date1`, `month`) VALUES
(18, '27', '14000', '200', '14200', '2020-07-21', 'Jul'),
(19, '18', '30000', '0', '30000', '2020-07-21', 'Jul'),
(20, '17', '50000', '0', '50000', '2020-08-27', 'Aug'),
(21, '28', '45000', '0', '45000', '2020-08-27', 'Aug'),
(22, '29', '700', '0', '700', '2020-08-27', 'Aug'),
(23, '29', '700', '0', '700', '2020-08-27', 'Aug'),
(24, '29', '700', '0', '700', '2020-08-27', 'Aug'),
(25, '18', '30000', '0', '30000', '2020-08-27', 'Aug');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(100) NOT NULL,
  `full_name` varchar(2555) NOT NULL,
  `roll_id` varchar(2555) NOT NULL,
  `email` varchar(2555) NOT NULL,
  `password` varchar(2555) NOT NULL,
  `gender` varchar(2555) NOT NULL,
  `address` varchar(2555) NOT NULL,
  `p_n` varchar(2555) NOT NULL,
  `w_n` varchar(255) NOT NULL,
  `class` varchar(2555) NOT NULL,
  `profile` varchar(2555) NOT NULL,
  `date1` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `full_name`, `roll_id`, `email`, `password`, `gender`, `address`, `p_n`, `w_n`, `class`, `profile`, `date1`) VALUES
(25, 'Student Account 1', 'F-10', 'student@gmail.com', 'student', 'Male', 'asgar mall murree road rawalpindi', '+92 318 1541107', '+92 318 1541107', '35', 'uploads/profile.PNG', '31-10-2020'),
(28, 'Student Account 2', '1', 'student1@gmail.com', 'student', 'Male', 'asgar mall murree road rawalpindi', '+92 318 1541107', '+92 318 1541107', '35', 'uploads/profile.PNG', '19-01-2021'),
(29, 'Student Account 3', '2', 'student2@gmail.com', 'student', 'Male', 'address is here', '+92 318 1541107', '+92 318 1541107', '35', 'uploads/profile.PNG', '19-01-2021'),
(30, 'Test Account 50', 'test-50', 'testaccount50@gmail.com', 'testaccount50', 'Male', 'US', '+92 318 1541107', '+92 318 1541107', '35', 'uploads/profile.PNG', '03-02-2021');

-- --------------------------------------------------------

--
-- Table structure for table `student_dues`
--

CREATE TABLE `student_dues` (
  `id` int(100) NOT NULL,
  `fees` int(100) NOT NULL,
  `hostel` int(100) NOT NULL,
  `labortary_fees` int(100) NOT NULL,
  `computer_fees` int(100) NOT NULL,
  `stationary_fees` int(100) NOT NULL,
  `exam_fees` int(100) NOT NULL,
  `transportation` varchar(255) NOT NULL,
  `student_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250;

--
-- Dumping data for table `student_dues`
--

INSERT INTO `student_dues` (`id`, `fees`, `hostel`, `labortary_fees`, `computer_fees`, `stationary_fees`, `exam_fees`, `transportation`, `student_id`) VALUES
(15, 100, 100, 100, 100, 100, 100, '', 19),
(16, 150, 150, 150, 150, 150, 150, '', 20),
(17, 42000, 1000, 1200, 53000, 1000, 1200, '', 21),
(18, 9000, 9000, 9000, 9000, 9000, 900, '', 22),
(19, 10000, 10000, 10000, 10000, 10000, 10000, '10000', 29),
(20, 1500, 2500, 500, 500, 500, 500, '1500', 28),
(21, 500, 2000, 200, 200, 200, 200, '2000', 25),
(22, 500, 250, 350, 200, 500, 100, '200', 30);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(100) NOT NULL,
  `fullname` varchar(2555) NOT NULL,
  `email` varchar(2555) NOT NULL,
  `password` varchar(2555) NOT NULL,
  `gender` varchar(2555) NOT NULL,
  `address` varchar(2555) NOT NULL,
  `p_n` varchar(2555) NOT NULL,
  `w_n` varchar(255) NOT NULL,
  `joining_date` varchar(2555) NOT NULL,
  `profile` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `fullname`, `email`, `password`, `gender`, `address`, `p_n`, `w_n`, `joining_date`, `profile`) VALUES
(34, 'Teacher Main Account', 'teacher@gmail.com', 'teacher', 'Male', 'asgar mall murree road rawalpindi', '03181541107', '03181541107', '27-01-2021', 'uploads/profile.PNG'),
(35, 'Teacher Account 2', 'teacher1@gmail.com', 'teacher', 'Male', 'asgar mall murree road rawalpindi', '03181541107', '03181541107', '27-01-2021', 'uploads/profile.PNG'),
(36, 'Teacher Account 3', 'teacher2@gmail.com', 'teacher', 'Male', 'asgar mall murree road rawalpindi', '03181541107', '03181541107', '27-01-2021', 'uploads/profile.PNG'),
(37, 'Teacher Account 4', 'teacher3@gmail.com', 'teacher', 'Male', 'asgar mall murree road rawalpindi', '03181541107', '03181541107', '27-01-2021', 'uploads/profile.PNG'),
(38, 'Text Account Teacher 10', 'testaccount10@gmail.com', 'test', 'Male', 'UK', '+92 318 1541107', '+92 318 1541107', '03-02-2021', 'uploads/profile.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_payments`
--

CREATE TABLE `teacher_payments` (
  `id` int(100) NOT NULL,
  `transportation` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `others` varchar(255) NOT NULL,
  `teacher_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250;

--
-- Dumping data for table `teacher_payments`
--

INSERT INTO `teacher_payments` (`id`, `transportation`, `salary`, `others`, `teacher_id`) VALUES
(1, '2000', '50000', '5000', '37'),
(2, '1000', '50000', '0', '36'),
(3, '1000', '50000', '1000', '35'),
(4, '5000', '25000', '5000', '34'),
(5, '5000', '75000', '0', '38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountant`
--
ALTER TABLE `accountant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_fees`
--
ALTER TABLE `monthly_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_salary`
--
ALTER TABLE `monthly_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publish_book`
--
ALTER TABLE `publish_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_dues`
--
ALTER TABLE `student_dues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_payments`
--
ALTER TABLE `teacher_payments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountant`
--
ALTER TABLE `accountant`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `librarian`
--
ALTER TABLE `librarian`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `monthly_fees`
--
ALTER TABLE `monthly_fees`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `monthly_salary`
--
ALTER TABLE `monthly_salary`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `publish_book`
--
ALTER TABLE `publish_book`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `student_dues`
--
ALTER TABLE `student_dues`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `teacher_payments`
--
ALTER TABLE `teacher_payments`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
