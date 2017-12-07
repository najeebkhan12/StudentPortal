-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2017 at 02:02 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `ID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `StudentID` varchar(50) NOT NULL,
  `MarksAssigned` float DEFAULT NULL,
  `MarksObtained` float DEFAULT NULL,
  `WeightageAssigned` float NOT NULL,
  `WeightageObtained` float NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `assignments`
--
DELIMITER $$
CREATE TRIGGER `weightage_insert` BEFORE INSERT ON `assignments` FOR EACH ROW BEGIN
    SET NEW.WeightageObtained = (NEW.MarksObtained/ NEW.MarksAssigned)*NEW.WeightageAssigned;
  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `std_email` varchar(50) NOT NULL,
  `c_id` int(3) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `c_id` int(2) NOT NULL,
  `Course_Instructor_ID` int(2) DEFAULT NULL,
  `Course_name` varchar(40) DEFAULT NULL,
  `Course_desp` text,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`c_id`, `Course_Instructor_ID`, `Course_name`, `Course_desp`, `link`) VALUES
(1, 1, 'Calculus', 'This course is designed to develop the topics of differential and integral calculus. Emphasis is placed on limits, continuity, derivatives and integrals of algebraic and transcendental functions of one variable.\r\nIs not open to students who have completed a calculus course at the college level.', 'cal.jpg'),
(2, 2, 'Computer Programming', 'This course introduces the student to object-oriented programming through a study of the concepts of program specification and design, algorithm development, and coding and testing using a modern software development environment. Students learn how to write programs in an object-oriented high level programming language. Topics covered include fundamentals of algorithms, flowcharts, problem solving, programming concepts, classes and methods, control structures, arrays, and strings. Throughout the semester, problem solving skills will be stressed and applied to solving computing problems. Weekly laboratory experiments will provide hands-on experience in topics covered in this course.', 'c.jpg'),
(3, 6, 'Technical & Business Writing', 'to increase knowledge of students in business writing', 'tbw.png'),
(4, 4, 'Artificial Intelligence', 'Provide basic knowledge of AI and its applications', 'ai.jpg'),
(5, 3, 'Database Systems', 'A study of database models including the hierarhical, networ, relational and object oriented models and the examination of such practical issues as database design, setup, and manipulation. Other selected topics include data integrity, data seurity, backup and recovery procedures, database administration, etc. Several programming projects are assigned involving the use of a database management system', 'database.jpeg'),
(6, 3, 'Web Programming', 'Web Programming is a beginners’ course in programming using PhP, JavaScript, together with some HTML and CSS. It follows a problem-based approach which requires you to design and create a website of ever-increasing sophistication as the course progresses while creating design documentation, reflecting on the process, and (optionally) sharing and communicating with others on the course. The output of your work will be presented as a publicly accessible website, and you will submit a portfolio that maps what you have done to the course learning outcomes.', 'web-programming.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `course_registration`
--

CREATE TABLE `course_registration` (
  `Reg_id` int(5) NOT NULL,
  `C_id` int(2) DEFAULT NULL,
  `std_email` varchar(50) DEFAULT NULL,
  `Reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_registration`
--

INSERT INTO `course_registration` (`Reg_id`, `C_id`, `std_email`, `Reg_date`) VALUES
(1, 6, 'najeeb.khan12@outlook.com', '2017-05-05 15:24:39');

-- --------------------------------------------------------

--
-- Table structure for table `discussion_form`
--

CREATE TABLE `discussion_form` (
  `Q_id` int(8) NOT NULL,
  `C_id` int(2) DEFAULT NULL,
  `Id` varchar(50) DEFAULT NULL,
  `type` varchar(90) DEFAULT NULL,
  `q_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Comment` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `F_id` int(10) NOT NULL,
  `Reg_std_id` int(5) DEFAULT NULL,
  `S_Description` text,
  `Std_review` int(5) DEFAULT NULL,
  `Fdb_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `final_exam`
--

CREATE TABLE `final_exam` (
  `CourseID` int(11) NOT NULL,
  `StudentID` varchar(50) NOT NULL,
  `MarksAssigned` float DEFAULT NULL,
  `MarksObtained` float DEFAULT NULL,
  `Weightage` float DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `inst_id` int(2) NOT NULL,
  `inst_name` varchar(50) NOT NULL,
  `dept` varchar(40) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `ins_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`inst_id`, `inst_name`, `dept`, `gender`, `ins_email`) VALUES
(1, 'Tariq Raheem', 'Humanities', 'Male', 'tariq_raheem'),
(2, 'Shoaib Khan', 'Computer Sciecne', 'Male', 'shoaib_khan'),
(3, 'Taimoor Khan', 'Computer Science', 'Male', 'Taimoor_khan'),
(4, 'Hafeez Ur Rehman', 'Computer Science', 'Male', 'Hefeez_ur_Rehman'),
(5, 'Khalil Ullah', 'Electrical Engineering', 'Male', 'Khalil_ULLAH'),
(6, 'Maryum Ali Khan', 'Humanities', 'Female', 'Maryam_khan'),
(7, 'Nouman Azam', 'Computer Science', 'Male', 'Nouman_Azam'),
(8, 'Gulrukh Raess', 'Humanities', 'Female', 'Gulruk_Raess'),
(9, 'Muhammad Nouman', 'Computer Science', 'Male', 'Muhammad Nouman'),
(10, 'Anwar Ali', 'Electrical Engineering', 'Male', 'Anwar_ali'),
(11, 'Hamid Khan', 'Humanities', 'Male', 'Hamid_khan');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `uname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uname`, `password`) VALUES
('najeeb.khan12@outlook.com', 'najeeb12');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `ID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `StudentID` varchar(50) NOT NULL,
  `MarksAssigned` float DEFAULT NULL,
  `MarksObtained` float DEFAULT NULL,
  `WeightageAssigned` float DEFAULT NULL,
  `WeightageObtained` float NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `replier_form`
--

CREATE TABLE `replier_form` (
  `Q_id` int(8) DEFAULT NULL,
  `Id` varchar(50) DEFAULT NULL,
  `type` varchar(90) DEFAULT NULL,
  `replier_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Replier_Comment` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sessional_i`
--

CREATE TABLE `sessional_i` (
  `CourseID` int(11) NOT NULL,
  `StudentID` varchar(50) NOT NULL,
  `MarksAssigned` float DEFAULT NULL,
  `MarksObtained` float DEFAULT NULL,
  `Weightage` float DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sessional_ii`
--

CREATE TABLE `sessional_ii` (
  `CourseID` int(11) NOT NULL,
  `StudentID` varchar(50) NOT NULL,
  `MarksAssigned` float DEFAULT NULL,
  `MarksObtained` float DEFAULT NULL,
  `Weightage` float DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Std_name` varchar(20) DEFAULT NULL,
  `std_email` varchar(50) NOT NULL,
  `mob_number` varchar(15) DEFAULT NULL,
  `Reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `link` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Std_name`, `std_email`, `mob_number`, `Reg_date`, `link`) VALUES
('Najeeb Khan', 'najeeb.khan12@outlook.com', '+923432851253', '2017-05-05 15:23:02', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD KEY `c_id` (`c_id`),
  ADD KEY `std_email` (`std_email`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `Course_Instructor_ID` (`Course_Instructor_ID`);

--
-- Indexes for table `course_registration`
--
ALTER TABLE `course_registration`
  ADD PRIMARY KEY (`Reg_id`),
  ADD KEY `C_id` (`C_id`),
  ADD KEY `std_email` (`std_email`);

--
-- Indexes for table `discussion_form`
--
ALTER TABLE `discussion_form`
  ADD PRIMARY KEY (`Q_id`),
  ADD KEY `d_f_c` (`C_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`F_id`),
  ADD KEY `Reg_std_id` (`Reg_std_id`);

--
-- Indexes for table `final_exam`
--
ALTER TABLE `final_exam`
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`inst_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `replier_form`
--
ALTER TABLE `replier_form`
  ADD KEY `Q_id` (`Q_id`);

--
-- Indexes for table `sessional_i`
--
ALTER TABLE `sessional_i`
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `sessional_ii`
--
ALTER TABLE `sessional_ii`
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`std_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `c_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `course_registration`
--
ALTER TABLE `course_registration`
  MODIFY `Reg_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `discussion_form`
--
ALTER TABLE `discussion_form`
  MODIFY `Q_id` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `F_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`std_email`),
  ADD CONSTRAINT `assignments_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`c_id`);

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `courses` (`c_id`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`std_email`) REFERENCES `student` (`std_email`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`Course_Instructor_ID`) REFERENCES `instructor` (`inst_id`);

--
-- Constraints for table `course_registration`
--
ALTER TABLE `course_registration`
  ADD CONSTRAINT `course_registration_ibfk_1` FOREIGN KEY (`C_id`) REFERENCES `courses` (`c_id`),
  ADD CONSTRAINT `course_registration_ibfk_2` FOREIGN KEY (`std_email`) REFERENCES `student` (`std_email`);

--
-- Constraints for table `discussion_form`
--
ALTER TABLE `discussion_form`
  ADD CONSTRAINT `d_f_c` FOREIGN KEY (`C_id`) REFERENCES `courses` (`c_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`Reg_std_id`) REFERENCES `course_registration` (`Reg_id`);

--
-- Constraints for table `final_exam`
--
ALTER TABLE `final_exam`
  ADD CONSTRAINT `final_exam_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`std_email`),
  ADD CONSTRAINT `final_exam_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`c_id`);

--
-- Constraints for table `replier_form`
--
ALTER TABLE `replier_form`
  ADD CONSTRAINT `replier_form_ibfk_1` FOREIGN KEY (`Q_id`) REFERENCES `discussion_form` (`Q_id`);

--
-- Constraints for table `sessional_i`
--
ALTER TABLE `sessional_i`
  ADD CONSTRAINT `sessional_i_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`std_email`),
  ADD CONSTRAINT `sessional_i_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`c_id`);

--
-- Constraints for table `sessional_ii`
--
ALTER TABLE `sessional_ii`
  ADD CONSTRAINT `sessional_ii_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`std_email`),
  ADD CONSTRAINT `sessional_ii_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`c_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
