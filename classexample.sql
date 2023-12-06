-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 09:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classexample`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `town` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `applicationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `username`, `password`, `email`, `firstName`, `lastName`, `address`, `street`, `town`, `course`, `applicationDate`) VALUES
(1, 'matcumb', '$2y$10$2QnuJGdEXRX..fagb8WNk..ejkjZ8W0ldwQiAU8oKRJIeJek6L7EO', 'matcumb@gmail.com', 'Matt', 'Cumbo', '1', '2', 1, 1, '2023-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `code` varchar(20) NOT NULL,
  `ects` int(10) UNSIGNED NOT NULL,
  `mode` int(11) NOT NULL,
  `duration` varchar(25) NOT NULL,
  `decription` text NOT NULL,
  `entryRequirements` text NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `title`, `code`, `ects`, `mode`, `duration`, `decription`, `entryRequirements`, `level`) VALUES
(1, 'Advanced Diploma in Art and Design', 'CA4-05-21', 120, 1, '2 Years Full-time', 'his course presents learners with challenging exercises in Art and Design. Students undertake guided and independent learning in order to develop further their skills and creativity. Learners will be expected to develop a portfolio of work for progression or for potential employment. In the second year learners focus on a specialist path to enhance their technical skills and in preparation to progress to higher levels of study or find employment. Special attention is given to visual and written communication in preparation to self-promotion in the industry or for Higher Education.', 'Entry requirements: MCAST Diploma in Art and Design\r\nor\r\nAny MCAST Level 3 Diploma, whilst being in possession of the compulsory subject as indicated hereunder\r\nor\r\n4 SEC/O-Level/SSC&P (Level 3) passes\r\nCompulsory: Art or Art and Design or Textiles and Design or Design and Technology or Fashion and Textiles\r\n', 1),
(2, 'Advanced Diploma in Digital Design', 'CA4-02-21', 120, 1, '', 'The course introduces common fundamental principles, skills and software related to contemporary fields of design. Minor streams in game art, graphic design and interactive media will allow learners to specialise in their field of interest and master the required skills in preparation for more independent study at undergraduate level. Exploratory exercises, real life work and the possibility of competitions all form part of the process for an effective learning experience. Taught by experienced visual and technical designers from interdependent fields, this course of study prepares learners to communicate ideas and solve problems through creative and interactive solutions.', 'Entry requirements: MCAST Diploma in Printing\r\nor\r\nMCAST Diploma in Art and Design\r\nor\r\nMCAST Diploma in Media\r\nor\r\nAny MCAST Level 3 Diploma, whilst being in possession of the compulsory subject as indicated hereunder\r\nor\r\n4 SEC/O-Level/SSC&P (Level 3) passes\r\nCompulsory: Art or a comparable award (in terms of both volume, content and Level of studies) related to Digital Design', 1),
(3, 'Bachelor of Arts (Honours) in Game Art', 'CA6-03-22', 180, 2, '3 Years Full-time', 'This degree programme has been developed in response to the increased demand for trained artists and designers who are able to produce visual concepts and assets for digital games. Learners will acquire grounding in essential art and design principles as well as basic knowledge in game creation using industry-standard software. They will continuously reinforce applied skills while relating relevant theories in game and visual design, storytelling, and IP development. In their final year of studies, Learners will be able to team up with students from the Interactive Digital Media programme to create functional video games.', 'Entry requirements: MCAST Advanced Diploma in Digital Design\r\nor\r\nMCAST Advanced Diploma in Art and Design\r\nor\r\n2 A-Level passes and 2 I-Level passes\r\nCompulsory A-Level: Art', 2),
(4, 'Bachelor of Arts (Honours) in Interactive Digital Media', 'CA6-05-22', 180, 2, '3 Years Full-time', 'This degree programme prepares learners to work in various sectors within an ever-evolving digital industry by giving them exposure to creative design and software development techniques for interactive media content. Learners will receive a strong grounding in graphic design principles and programming techniques for games, website technologies and interactive installations. They will concurrently acquire applied knowledge in the fundamental practices of the industry by exploring user experience design, game design, and generative digital imaging techniques. In their final year of study, Learners will be able to team up with students from other disciplines to create rich interactive experiences.', 'Entry requirements: MCAST Advanced Diploma in Digital Design\r\nor\r\nMCAST Advanced Diploma in Art and Design\r\nor\r\nMCAST Advanced Diploma in Photography\r\nor\r\nMCAST Advanced Diploma in Creative Media Production\r\nor\r\nMCAST Advanced Diploma in IT (Multimedia Software Development stream or Software Development stream only)\r\nor\r\nMCAST Advanced Diploma in Video Production\r\nor\r\n2 A-Level passes and 2 I-Level passes\r\nCompulsory A-Level: Art or Computing', 2);

-- --------------------------------------------------------

--
-- Table structure for table `courselevel`
--

CREATE TABLE `courselevel` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courselevel`
--

INSERT INTO `courselevel` (`id`, `level`, `name`) VALUES
(1, 4, 'Advanced Diploma'),
(2, 6, 'Bachelor of Arts');

-- --------------------------------------------------------

--
-- Table structure for table `coursemode`
--

CREATE TABLE `coursemode` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coursemode`
--

INSERT INTO `coursemode` (`id`, `name`) VALUES
(1, 'Includes Work Placement'),
(2, 'Live Cases');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `name` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`) VALUES
(1, 'Malta'),
(2, 'Gozo');

-- --------------------------------------------------------

--
-- Table structure for table `town`
--

CREATE TABLE `town` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `town`
--

INSERT INTO `town` (`id`, `name`, `region`) VALUES
(1, 'Attard', 1),
(2, 'Mosta', 1),
(3, 'Munxar', 2),
(4, 'Xlendi', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course` (`course`),
  ADD KEY `town` (`town`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mode` (`mode`),
  ADD KEY `level` (`level`);

--
-- Indexes for table `courselevel`
--
ALTER TABLE `courselevel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coursemode`
--
ALTER TABLE `coursemode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `town`
--
ALTER TABLE `town`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region` (`region`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courselevel`
--
ALTER TABLE `courselevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coursemode`
--
ALTER TABLE `coursemode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `town`
--
ALTER TABLE `town`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`course`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`town`) REFERENCES `town` (`id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`mode`) REFERENCES `coursemode` (`id`),
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`level`) REFERENCES `courselevel` (`id`);

--
-- Constraints for table `town`
--
ALTER TABLE `town`
  ADD CONSTRAINT `town_ibfk_1` FOREIGN KEY (`region`) REFERENCES `region` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
