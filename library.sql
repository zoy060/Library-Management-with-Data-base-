-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2023 at 10:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `username`, `pass`, `email`) VALUES
(501, 'Mizanur Rahman', 'rahman', 'rahman', 'mizanurrahmanzoy@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `Book_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(100) DEFAULT NULL,
  `Description` varchar(255) NOT NULL,
  `Author` varchar(50) DEFAULT NULL,
  `Price` int(10) DEFAULT NULL,
  `Available` varchar(20) DEFAULT NULL,
  `Publisher_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Book_ID`, `Title`, `Description`, `Author`, `Price`, `Available`, `Publisher_ID`) VALUES
(61, 'Dhaka: The City of Joy', 'A novel that will create timeless images in your heart', 'Imran H Sarker', 200, 'In Stock', 1),
(62, 'The Hungry Tide', 'This is a beautiful Bengali novel', 'Niaz Zaman', 300, 'In Stock', 4),
(63, 'A Golden Age', 'A thought-provoking exploration of the human psyche', 'Tahmima Anam', 400, 'Out of Stock', 5),
(64, 'Brick Lane', 'An enchanting fantasy world that captivates the imagination', 'Monica Ali', 500, 'In Stock', 4),
(65, 'White Teeth', 'A historical epic that transports you to a bygone era', 'Zadie Smith', 600, 'Out of Stock', 5),
(66, 'The Buddha of Suburbia', 'A humorous take on everyday life and its quirks', 'Hanif Kureishi', 700, 'In Stock', 3),
(67, 'Midnight\'s Children', 'A suspenseful mystery that keeps you guessing until the end', 'Salman Rushdie', 800, 'Out of Stock', 1),
(68, 'The God of Small Things', 'A collection of poignant short stories that tug at the heartstrings', 'Arundhati Roy', 900, 'In Stock', 3),
(69, 'The Hungry Tide', 'An insightful exploration of the complexities of human relationships', 'Amitav Ghosh', 1000, 'Out of Stock', 4),
(70, 'The Namesake', 'An amazing travel book, introducing beautiful places in Bangladesh', 'Jhumpa Lahiri', 1100, 'In Stock', 2);

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_by`
--

CREATE TABLE `borrowed_by` (
  `serial` int(11) NOT NULL,
  `issue` datetime DEFAULT current_timestamp(),
  `return_date` datetime DEFAULT (current_timestamp() + interval 10 day),
  `book_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrowed_by`
--

INSERT INTO `borrowed_by` (`serial`, `issue`, `return_date`, `book_id`, `member_id`) VALUES
(4, '2023-11-12 02:12:52', '2023-11-22 02:12:52', 68, 105),
(5, '2023-11-12 02:28:47', '2023-11-22 02:28:47', 61, 105),
(6, '2023-11-17 01:10:57', '2023-11-27 01:10:57', 66, 101),
(7, '2023-11-17 01:36:14', '2023-11-27 01:36:14', 70, 101),
(8, '2023-11-19 02:33:54', '2023-11-29 02:33:54', 64, 123),
(9, '2023-11-19 15:13:39', '2023-11-29 15:13:39', 70, 101),
(10, '2023-11-19 22:37:16', '2023-11-29 22:37:16', 63, 101),
(11, '2023-11-19 22:42:28', '2023-11-29 22:42:28', 70, 128),
(12, '2023-11-19 23:00:42', '2023-11-29 23:00:42', 67, 122),
(13, '2023-11-20 15:46:22', '2023-11-30 15:46:22', 68, 101);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `Member_ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `Address` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Member_ID`, `Name`, `username`, `email`, `pass`, `create_date`, `Address`) VALUES
(101, 'Zoy Rahman', 'zoy', 'zoyrahman1@gmail.com', 'zoya', '2023-11-09 13:55:44', NULL),
(105, 'sadsfdsf', 'dsfsdfsd', 'dsfsd', '', '2023-11-09 21:31:54', NULL),
(106, '', 'samua', 'samua@gmail.com', 'samu', '2023-11-09 21:39:48', NULL),
(122, 'Ferdous Hassan', 'ferdous', 'ferdous1@gmail.com', '12345', '2023-11-10 23:29:18', NULL),
(123, '', 'rhhira', 'rajibul@gmail.com', 'hira', '2023-11-12 21:11:21', NULL),
(124, '', 'AAAA', 'aaaa@gmail.com', 'aaaa', '2023-11-13 21:24:36', NULL),
(128, 'Maruf Rahman', 'maruf', 'maruf', 'mmmm', '2023-11-19 22:41:16', NULL),
(129, 'Pias Rahman', 'pias', 'pais@gmail.com', 'pias', '2023-11-20 21:47:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `Pub_ID` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`Pub_ID`, `Name`, `Address`) VALUES
(1, 'Bangla Publishers', 'Dhaka, Bangladesh'),
(2, 'Rajshahi Books', 'Rajshahi, Bangladesh'),
(3, 'Chittagong Publishing', 'Chittagong, Bangladesh'),
(4, 'Khulna Printers', 'Khulna, Bangladesh'),
(5, 'Sylhet Press', 'Sylhet, Bangladesh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Book_ID`);

--
-- Indexes for table `borrowed_by`
--
ALTER TABLE `borrowed_by`
  ADD PRIMARY KEY (`serial`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Member_ID`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`Pub_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT for table `borrowed_by`
--
ALTER TABLE `borrowed_by`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `Member_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`Publisher_ID`) REFERENCES `publisher` (`Pub_ID`) ON DELETE SET NULL;

--
-- Constraints for table `borrowed_by`
--
ALTER TABLE `borrowed_by`
  ADD CONSTRAINT `borrowed_by_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`Book_ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `borrowed_by_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`Member_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
