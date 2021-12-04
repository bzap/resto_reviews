-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2021 at 10:21 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resto`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `email` varchar(255) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `street` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `pcode` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`email`, `password`, `dob`, `street`, `city`, `province`, `pcode`) VALUES
('james', '123123', '2003-06-03', '1 King St. West', 'Hamilton', 'Ontario', 'L8P 1A4'),
('jessica', '123123', '1995-06-03', '220 Yonge St', 'Toronto', 'Ontario', 'M5B 2H1'),
('jimmy', '123123', '2001-06-03', '100 City Centre Dr', 'Mississauga', 'Ontario', 'L5B 2C9'),
('john', '1234', '1997-02-14', '1280 Main Street W.', 'Hamilton', 'Ontario', 'L8S 4L8');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `remail` varchar(20) NOT NULL,
  `rlocation` varchar(20) NOT NULL,
  `rating` decimal(4,2) NOT NULL,
  `review` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`remail`, `rlocation`, `rating`, `review`) VALUES
('james', 'Bento Sushi', '4.10', 'I really enjoyed the food here. '),
('jimmy', 'Bento Sushi', '4.50', 'I really enjoyed this one'),
('jimmy', 'Lazeez Shawarma', '4.00', 'Pretty good, would recommend. '),
('jimmy', 'Original Shawarma', '5.00', 'This was some good stuff, I love it.'),
('john', 'Bento Sushi', '3.20', 'It\'s alright. I\'ve had better. ');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `location` varchar(20) NOT NULL,
  `loc_image` varchar(255) NOT NULL,
  `food_image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `loc_lat` decimal(9,6) NOT NULL,
  `loc_long` decimal(9,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`location`, `loc_image`, `food_image`, `description`, `loc_lat`, `loc_long`) VALUES
('Bento Sushi', '7.png', '7.png', 'Bento Sushi is North America\'s second largest sushi brand providing the highest quality packaged sushi and ready to heat/made to order hot Asian food.', '43.581440', '-79.685222'),
('Lazeez Shawarma', '7.png', '7.png', 'The Lazeez story begins with the universal passion for great taste. Our founders, while each having different and unique stories, backgrounds and personalities, found a strong connection over their common love for great tasting Middle Eastern food.', '42.581440', '-78.685222'),
('Miga Korean BBQ', '7.png', '7.png', 'Sleek, contemporary scene for refined Korean tabletop barbecue & polished Japanese dishes.', '55.325400', '58.543300'),
('Original Shawarma', '7.png', '7.png', 'Down-to-earth Middle Eastern eatery with outdoor seating specializing in shawarma & meat plates.', '45.581440', '-80.685222'),
('Yasu Sushi', '7.png', '7.png', 'Yasu is Canada\'s first Omakase sushi bar, dedicated to using only the finest fish from around the world. ', '43.581440', '-79.685222');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`remail`,`rlocation`),
  ADD KEY `rlocation` (`rlocation`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`location`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`remail`) REFERENCES `registration` (`email`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`rlocation`) REFERENCES `submission` (`location`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
