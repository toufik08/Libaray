-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 09:55 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'librarian 01', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booklist`
--

CREATE TABLE `booklist` (
  `book_id` int(20) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_image` varchar(500) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `no_of_copy` int(11) NOT NULL,
  `available_copy` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `laibarian_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booklist`
--

INSERT INTO `booklist` (`book_id`, `book_name`, `book_image`, `author_name`, `no_of_copy`, `available_copy`, `cat_name`, `laibarian_name`) VALUES
(20, 'abababa', '../image/books_image/7e9fd033c7fe5568d3b08dd0469b8b50pexels-quang-nguyen-vinh-2133604.jpg', 'aaa', 10, 0, 'Physics', ''),
(25, 'aaaa', '../image/books_image/307c38e2d75e2131a4b2c1ca347bc6dapibubear_311265295_1269169680548554_2377536271786494888_n.jpg', 'aaa', 4, 3, 'CSE', ''),
(26, 'Electric Machinery Fundamentals', '../image/books_image/2ff1f5d3057096d4aa416e4e59a7e5baD5.jpg', ' Stephen Chapman', 19, 21, 'EEE', ''),
(27, 'The Usborne Book of Astronomy & Space', '../image/books_image/1ca56405f2c10ebba23d90342a3b1eca51MCRe5uHVL._AC_SY780_.jpg', 'Lisa Miles, Alastair Smith', 5, 0, 'Astronomy', ''),
(28, 'new book', '../image/books_image/78b6dd25741b4e3dfef2fcd0c23a5a6d306540717_3607885649495446_1664258900935426859_n.jpg', 'newa', 4, 1, 'Physics', ''),
(29, ' The C++ Programming Language, 4th Edition 4th Edition', '../image/books_image/59b68a6baf6eb8ca38439f48108f160f0321563840.01._SCLZZZZZZZ_SX500_.jpg', 'Bjarne Stroustrup', 30, 20, 'CSE', ''),
(30, 'name of book', '../image/books_image/08320049f0d8737caf4f8f77b5aec249280288893_1059759058268526_3199909925641020996_n.jpg', 'namepp', 0, 0, 'Mathematics', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_no` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `total_book` int(30) NOT NULL,
  `available_book` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_no`, `category_name`, `total_book`, `available_book`) VALUES
(1, 'Mathematics', 300, 290),
(2, 'CSE', 0, 0),
(3, 'EEE', 0, 0),
(4, 'Physics', 0, 0),
(5, 'Robotics', 0, 0),
(6, 'Astronomy', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `issuebook`
--

CREATE TABLE `issuebook` (
  `issue_book_id` int(30) NOT NULL,
  `book_id` int(30) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `Issue_date` varchar(50) NOT NULL,
  `return_date` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issuebook`
--

INSERT INTO `issuebook` (`issue_book_id`, `book_id`, `book_name`, `user_email`, `user_id`, `user_name`, `Issue_date`, `return_date`, `status`) VALUES
(117, 25, 'aaaa', 'aaa@gmail.com', '1', 'aaa', '03-12-22', '06-12-22', 'returned'),
(118, 26, 'Electric Machinery Fundamentals', 'toufik@gmail.com', '5', 'toufik', '29-11-22', '03-12-22', 'returned'),
(120, 29, ' The C++ Programming Language, 4th Edition 4th Edition', 'rupos@gmail.com', '10', 'rupos', '03-12-22', '03-12-22', 'returned'),
(125, 20, 'aajdlajdla', 'aaa@gmail.com', '1', 'aaa', '06-12-22', '11-12-2022', 'borrow'),
(128, 29, ' The C++ Programming Language, 4th Edition 4th Edition', 'rupos@gmail.com', '10', 'rupos', '06-12-22', '06-12-22', 'returned'),
(133, 26, 'Electric Machinery Fundamentals', 'toufik@gmail.com', '5', 'toufik', '06-12-22', '06-12-22', 'returned'),
(134, 29, ' The C++ Programming Language, 4th Edition 4th Edition', 'toufik@gmail.com', '5', 'toufik', '06-12-22', '06-12-22', 'returned'),
(135, 26, 'Electric Machinery Fundamentals', 'toufik@gmail.com', '5', 'toufik', '06-12-22', '11-12-22', 'dateover'),
(138, 26, 'Electric Machinery Fundamentals', 'samiul@gmail.com', '17', 'samiul', '06-12-22', '11-12-2022', 'borrow'),
(139, 29, ' The C++ Programming Language, 4th Edition 4th Edition', 'samiul@gmail.com', '17', 'samiul', '01-12-22', '05-12-2022', 'dateover'),
(140, 29, ' The C++ Programming Language, 4th Edition 4th Edition', 'samiul@gmail.com', '17', 'samiul', '01-12-22', '05-12-2022', 'dateover'),
(141, 20, 'aajdlajdla', 'samiul@gmail.com', '17', 'samiul', '06-12-22', '11-12-2022', 'borrow'),
(142, 29, ' The C++ Programming Language, 4th Edition 4th Edition', 'toufik@gmail.com', '5', 'toufik', '07-12-22', '12-12-2022', 'borrow'),
(143, 29, ' The C++ Programming Language, 4th Edition 4th Edition', 'munzu@gmail.com', '23', 'Munzereen Shahid', '08-12-22', '13-12-2022', 'borrow'),
(144, 20, 'aajdlajdla', 'munzu@gmail.com', '23', 'Munzereen Shahid', '09-12-22', '14-12-22', 'pending'),
(157, 20, 'aajdlajdla', 'toufik@gmail.com', '5', 'toufik', '10-12-22', '15-12-22', 'pending'),
(158, 20, 'aajdlajdla', 'toufik@gmail.com', '5', 'toufik', '10-12-22', '15-12-22', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_phoneno` varchar(255) NOT NULL,
  `status` varchar(5) NOT NULL,
  `student_id` int(30) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `user_pic` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_phoneno`, `status`, `student_id`, `dept`, `user_pic`) VALUES
(1, 'aaa', 'aaa@gmail.com', 'aaaa', '5656', 'yes', 20, '', ''),
(5, 'Toufik Hasan', 'toufik@gmail.com', 'toufik', '01710365424', 'yes', 1823456244, 'EEE', './image/user_image/bf5412f8c09bee279d6db0e287168e76linustech_308073761_1253452365446684_2676245555575551316_n.jpg'),
(10, 'Ahmed Rupos', 'rupos@gmail.com', 'aaaa', '445545454', 'yes', 1923130002, 'CSE', './image/user_image/0bae511133d15200051d42c97e227f55o.jpg'),
(13, 'onik', 'onik@gmail.com', 'onik', 'onik', 'yes', 0, '', ''),
(17, 'samiul', 'samiul@gmail.com', 'sami', 'samiul', 'yes', 0, '', ''),
(18, 'Onikbro', 'onikbro@gmail.com', 'onik', '01865656565', 'yes', 0, '', ''),
(19, 'necole', 'nicole@gmail.com', 'nicole', '01710632751', 'yes', 0, '', ''),
(20, 'alexd', 'alexd@gmail.com', 'alexd', '5454545454', 'yes', 0, '', ''),
(21, 'mmm', 'mm@gmail.com', 'mm', '01454', 'no', 111, 'Cse', '../image/user_image/0290beb284f4a5d7a906995b6b8870cd'),
(22, 'ppp', 'mm1@gmail.com', 'mm', '54545', 'yes', 42421, 'cse', './image/user_image/b9af309b05f399242b528291aea95ebc'),
(23, 'Munzereen Shahid', 'munzu@gmail.com', 'm', '0145685324645', 'yes', 13125500, 'English', './image/user_image/0e3f2a7ff408ca1cb48b0c403d404b95munzereen.shahid_317707333_5609681275793343_5653511102029844165_n.jpg'),
(24, 'o', 'o@gmail.com', 'o', '12', 'yes', 21, 'EEE', '/image/user_image/59809426523130f15838dbb9f4ac3010linustech_308073761_1253452365446684_2676245555575551316_n.jpg'),
(25, 'r', 'r@gmail.com', 'r', '3', 'yes', 3, 'r', './image/user_image/e1c930b0be18d73fd1cd49e43b5bdcc420220930_171205.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booklist`
--
ALTER TABLE `booklist`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_no`);

--
-- Indexes for table `issuebook`
--
ALTER TABLE `issuebook`
  ADD PRIMARY KEY (`issue_book_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booklist`
--
ALTER TABLE `booklist`
  MODIFY `book_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `issuebook`
--
ALTER TABLE `issuebook`
  MODIFY `issue_book_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
