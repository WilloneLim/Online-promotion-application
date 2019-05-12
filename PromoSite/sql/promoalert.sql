-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2019 at 02:40 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `promoalert`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(5) NOT NULL,
  `cust_username` varchar(15) NOT NULL,
  `cust_email` varchar(254) NOT NULL,
  `cust_password` varchar(15) NOT NULL,
  `cust_country` varchar(100) NOT NULL,
  `cust_city` varchar(100) NOT NULL,
  `cust_state` varchar(100) NOT NULL,
  `cust_bday` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_username`, `cust_email`, `cust_password`, `cust_country`, `cust_city`, `cust_state`, `cust_bday`) VALUES
(1, 'jocelyn123', 'jocelyn@gmail.com', 'helloworld', 'Malaysia', 'Kuching', 'Sarawak', '1998-08-28'),
(2, 'alex321', 'alex@hotmail.com', 'testtest', 'Malaysia', 'Kuching', 'Sarawak', '1993-10-09'),
(5, 'Anais', 'itsbabyanais@gmail.com', '$2y$10$yRAqhKcI', 'Malaysia', 'Sarawak', 'Kuching', '2019-05-26'),
(6, 'Darwin', 'dwin@gmail.com', '$2y$10$0qO2TidS', 'Malaysia', 'Sarawak', 'Kuching', '2019-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `promoter`
--

CREATE TABLE `promoter` (
  `promoter_id` int(50) NOT NULL,
  `promoter_username` varchar(100) NOT NULL,
  `promoter_password` varchar(100) NOT NULL,
  `promoter_description` varchar(254) NOT NULL,
  `promoter_keywords` varchar(300) NOT NULL,
  `promoter_profile` varchar(100) NOT NULL,
  `promoter_cover` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promoter`
--

INSERT INTO `promoter` (`promoter_id`, `promoter_username`, `promoter_password`, `promoter_description`, `promoter_keywords`, `promoter_profile`, `promoter_cover`) VALUES
(7, 'StarBucks', 'lovecoffee', 'drinks and stuff', 'drinks', 'profilestar.png', 'coverstar.png'),
(8, 'Sketchers', 'loveshoes', 'shoesss', 'clothes', 'profilesketch.png', 'coversketch.png'),
(9, 'KFC', 'lovechicken', 'fried chicken', 'food', 'profilekfc.png', 'coverkfc.png'),
(10, 'Dominos', 'lovepizza', 'pizza ', 'food', 'profiledomi.png', 'coverdomi.png'),
(11, 'Hush Puppies', 'lovepuppies', 'clothes and stuff', 'clothes', 'profilehush.png', 'coverhush.png'),
(12, 'Sephora', 'lovemakeup', 'desp', 'clothes', 'something.png', 'somethingalso.png'),
(13, 'Tealive', 'lovetea', 'desction', 'drinks', 'profile.png', 'promo1.png'),
(14, 'McDonalds', 'happymeal', 'this is a desc for mcd', 'food', 'profilemcd.png', 'covermcd.png');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promo_id` int(50) NOT NULL,
  `promo_img` varchar(100) NOT NULL,
  `promo_title` varchar(100) NOT NULL,
  `promo_desc` varchar(300) NOT NULL,
  `promo_start` varchar(50) NOT NULL,
  `promo_end` varchar(50) NOT NULL,
  `promo_keywords` varchar(100) NOT NULL,
  `promoter_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promo_id`, `promo_img`, `promo_title`, `promo_desc`, `promo_start`, `promo_end`, `promo_keywords`, `promoter_id`) VALUES
(1, 'promo7starbucks.png', '20% off new flavours', '2 new flavours', '25/5/19', '23/6/19', 'drinks', 7),
(2, 'promo4pizza.png', 'RM5.55 for personal pizza', 'One per claim', '25/5/19', '23/6/19', 'food', 10),
(3, 'promo8sephora.png', '20% off for membership', 'Look, makeup!', '5/5/19', '6/6/19', 'other', 12),
(4, 'promo1.png', 'Buy stuff', 'Drinks', '23/5/19', '23/6/19', 'drinks', 13),
(5, 'promo2mcd.png', 'RM1 for McChicken burger', 'One claim per person', '25/5/19', '23/6/19', 'food', 14),
(6, 'promo5kfc.png', '20% discount of nuggets and tenders', '20% discount at any kfc store', '25/5/19', '23/6/19', 'food', 9),
(7, 'promo6sketchers.png', '20% off on second pair', 'At sketchers', '25/5/19', '23/6/19', 'shoes', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `promoter`
--
ALTER TABLE `promoter`
  ADD PRIMARY KEY (`promoter_id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promo_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `promoter`
--
ALTER TABLE `promoter`
  MODIFY `promoter_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promo_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
