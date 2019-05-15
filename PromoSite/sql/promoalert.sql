-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2019 at 03:06 PM
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
  `promo_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
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
(1, 'images/promo7starbucks.png', '20% off new flavours', '2 new flavours', '25/5/19', '23/6/19', 'drinks', 7),
(2, 'images/promo4pizza.png', 'RM5.55 for personal pizza', 'One per claim', '25/5/19', '23/6/19', 'food', 10),
(3, 'images/promo8sephora.png', '20% off for membership', 'Look, makeup!', '5/5/19', '6/6/19', 'other', 12),
(4, 'images/promo1.png', 'Buy stuff', 'Drinks', '23/5/19', '23/6/19', 'drinks', 13),
(5, 'images/promo2mcd.png', 'RM1 for McChicken burger', 'One claim per person', '25/5/19', '23/6/19', 'food', 14),
(6, 'images/promo5kfc.png', '20% discount of nuggets and tenders', '20% discount at any kfc store', '25/5/19', '23/6/19', 'food', 9),
(7, 'images/promo6sketchers.png', '20% off on second pair', 'At sketchers', '25/5/19', '23/6/19', 'shoes', 8);

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `purchase` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `profit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`id`, `year`, `purchase`, `sale`, `profit`) VALUES
(1, 2014, 2444, 3521, 3555),
(2, 2015, 2111, 2345, 2545),
(3, 2016, 2552, 1233, 757),
(4, 2017, 6767, 5656, 7777),
(5, 2018, 4324, 556, 442);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `trans_id` int(11) NOT NULL,
  `date` text NOT NULL,
  `sale` int(11) NOT NULL,
  `promo_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trans_id`, `date`, `sale`, `promo_id`, `cust_id`) VALUES
(1, 'Jan', 1233, 2, 4),
(2, 'Feb', 3456, 344, 445),
(3, 'Mar', 3156, 14, 425),
(4, 'Apr', 6261, 42, 66),
(5, 'May', 5261, 12, 46),
(6, 'Jun', 2221, 78, 555),
(7, 'Jul', 7261, 21, 76),
(8, 'Aug', 7831, 92, 446),
(9, 'Sep', 6261, 42, 66),
(10, 'Oct', 5268, 112, 123),
(11, 'Nov', 5261, 12, 46),
(51, 'Dec', 6261, 72, 34);

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
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`trans_id`);

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

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
