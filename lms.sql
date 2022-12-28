-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 03:47 PM
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
(20, 'abababa', '../image/books_image/7e9fd033c7fe5568d3b08dd0469b8b50pexels-quang-nguyen-vinh-2133604.jpg', 'aaa', 10, 10, 'Physics', ''),
(25, 'aaaa', '../image/books_image/307c38e2d75e2131a4b2c1ca347bc6dapibubear_311265295_1269169680548554_2377536271786494888_n.jpg', 'aaa', 4, 4, 'CSE', ''),
(26, 'Electric Machinery Fundamentals', '../image/books_image/597e442d1313f5f33a6306a09b640a9c4122GTgFDeL._AC_SY1000_.jpg', ' Stephen Chapman', 50, 50, 'EEE', ''),
(27, 'The Usborne Book of Astronomy & Space', '../image/books_image/1ca56405f2c10ebba23d90342a3b1eca51MCRe5uHVL._AC_SY780_.jpg', 'Lisa Miles, Alastair Smith', 5, 5, 'Astronomy', ''),
(28, 'new book', '../image/books_image/78b6dd25741b4e3dfef2fcd0c23a5a6d306540717_3607885649495446_1664258900935426859_n.jpg', 'newa', 4, 4, 'Physics', ''),
(29, ' The C++ Programming Language, 4th Edition 4th Edition', '../image/books_image/59b68a6baf6eb8ca38439f48108f160f0321563840.01._SCLZZZZZZZ_SX500_.jpg', 'Bjarne Stroustrup', 30, 30, 'CSE', ''),
(30, 'name of book', '../image/books_image/08320049f0d8737caf4f8f77b5aec249280288893_1059759058268526_3199909925641020996_n.jpg', 'namepp', 20, 20, 'Mathematics', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_no` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_no`, `category_name`) VALUES
(1, 'Mathematics'),
(2, 'CSE'),
(3, 'EEE'),
(4, 'Physics'),
(5, 'Robotics'),
(6, 'Astronomy');

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
(190, 20, 'abababa', 'lisa@gmail.com', '34', 'lisa', '12-12-22', '12-12-22', 'returned'),
(191, 27, 'The Usborne Book of Astronomy & Space', 'ru@gmail.com', '37', 'rupos', '16-12-22', '16-12-22', 'returned'),
(193, 25, 'aaaa', 'ru@gmail.com', '37', 'rupos', '16-12-22', '27-12-22', 'returned');

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
(23, 'Munzereen Shahid', 'munzu@gmail.com', 'm', '0145685324645', 'yes', 13125500, 'English', './image/user_image/ec24988f1b38ffa8b752de7ba5d1a9d6240607345_413971250291092_8993427087351339923_n.jpg'),
(27, 'Hasin Hayder', 'h@gmail.com', 'h', '654654565', 'yes', 124, 'CSE', './image/user_image/4508d230f551b09f809567d59c3efdc8unnamed.jpg'),
(28, 'Anisul Islam', 'anisul@gmail.com', 'an', '6656565', 'yes', 1335665, 'CSE', './image/user_image/be87c308858a6aeb883acb322bf484f13bdd809671476c12ebb1159d83d8a267unname22d.jpg'),
(29, 'Toufik Hasan', 'toufikhasan088@gmail.com', 'r', '01710632751', 'yes', 192313006, 'Computer Science and Engineering', './image/user_image/18f74ad7d441f14e346ebb5ce99d99feo.jpg'),
(33, 'alex', 'alex@gmail.com', 'a', '8466542', 'yes', 181818001, 'EEE', './image/user_image/35804b734547cd53dc3361f9e34cfa8cistockphoto-1270067126-612x612.jpg'),
(34, 'lisa', 'lisa@gmail.com', 'l', '656547521', 'yes', 171717001, 'CSE', './image/user_image/e125226d8e94bea69552532198661948prometeus200501032-beautiful-young-woman-with-long-red-hair-hair-care-hair-coloring-.jpg'),
(35, 'Ava', 'ava@gmail.com', 'a', '66475641471', 'yes', 141414010, 'EEE', './image/user_image/8760285e19ec2f787daf2610b2b9d762pexels-juliana-stein-1898555.jpg'),
(36, 'Ahmed Rupos', 'ar@gmail.com', 'ar', '0172646546545', 'no', 1414141414, 'CSE', './image/user_image/0fe60dbadab73ae64e8412460a5e255adc-Cover-gn73njaor4d7s28k33dftl5j46-20200117010139.jpeg'),
(37, 'rupos', 'ru@gmail.com', 'rr', '0171234566789', 'yes', 15151515, 'CSE', './image/user_image/ff1fae6bac9d1d8f9fd90bc96ec1e900987c6aa8b3c093f0c6dd04fef4ddad011329373.jpg');

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
  MODIFY `issue_book_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
