-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2017 at 10:52 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_information`
--

CREATE TABLE IF NOT EXISTS `admin_information` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `join_date` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_information`
--

INSERT INTO `admin_information` (`admin_id`, `name`, `email`, `username`, `password`, `contact`, `address`, `join_date`, `status`) VALUES
(1, 'Mir Lutfur Rahman', 'mirlutfur.rahman@gmail.com', 'mir', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '01739213886', '9 - Paharika, North Peer Moholla, Housing Estate, Sylhet -3100.', '29 DEC 2016', 'controller');

-- --------------------------------------------------------

--
-- Table structure for table `cart_information`
--

CREATE TABLE IF NOT EXISTS `cart_information` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `transaction_id` varchar(20) NOT NULL,
  `discount_id` varchar(250) NOT NULL,
  `adding_date` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `cart_information`
--

INSERT INTO `cart_information` (`cart_id`, `product_id`, `seller_id`, `customer_id`, `transaction_id`, `discount_id`, `adding_date`, `quantity`, `status`) VALUES
(65, 11, 2, 1, '6', '1', '21 Jan 2017', 1, 'processing'),
(66, 15, 2, 1, '6', '1', '21 Jan 2017', 1, 'processing'),
(67, 8, 1, 1, '6', '1', '21 Jan 2017', 1, 'processing'),
(68, 12, 1, 1, '6', '1', '21 Jan 2017', 1, 'processing'),
(69, 8, 1, 1, '7', '0', '21 Jan 2017', 1, 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `adding_date` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`category_id`),
  KEY `admin_information_category_fk` (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `admin_id`, `name`, `adding_date`, `status`) VALUES
(1, 1, 'Gents T-shirt', '29 DEC 2016', 'active'),
(2, 1, 'Gents Pant', '10 Dec 2016', 'active'),
(3, 1, 'Gents Full Shirt', '10 Dec 2016', 'active'),
(4, 1, 'Gents Wrist Watch', '10 Dec 2016', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `customer_information`
--

CREATE TABLE IF NOT EXISTS `customer_information` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthdate` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `join_date` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `customer_information`
--

INSERT INTO `customer_information` (`customer_id`, `name`, `username`, `password`, `contact`, `address`, `gender`, `birthdate`, `email`, `join_date`, `status`) VALUES
(1, 'Mofij Ali', 'c', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '01234567890', 'kutalipara, Foridpur.', 'Male', '05 Mar 1996', 'mofij@gmail.com', '01 Jan 2016', 'active'),
(9, 'mir', 'cusacc0853062', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', '', '', '', 'mirlutfur.rahman@gmail.com', '', 'active'),
(10, 'Kuddus Ali', 'cusacc0546513', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', '', '', '', 'kudd@gmail.com', '', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `discount_chart`
--

CREATE TABLE IF NOT EXISTS `discount_chart` (
  `discount_id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_code` varchar(20) NOT NULL,
  `discount_percentage` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`discount_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `discount_chart`
--

INSERT INTO `discount_chart` (`discount_id`, `coupon_code`, `discount_percentage`, `status`) VALUES
(1, 'eid1234', 5, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `category_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `admin_id` varchar(250) NOT NULL,
  `adding_date` varchar(20) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `rank` int(11) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `seller_information_product_fk` (`seller_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `category_id`, `seller_id`, `admin_id`, `adding_date`, `price`, `quantity`, `status`, `rank`) VALUES
(1, 'Diesel BX-239', 1, 3, '1', '29 Jan 2016', 450, 45, 'active', 1),
(2, 'Diesel BX-242', 1, 1, '1', '04 Dec 2016', 780, 20, 'active', 1),
(3, 'Top Man x234', 2, 2, '1', '10 Dec 2016', 700, 5, 'active', 2),
(4, 'Top Man x334', 3, 3, '1', '10 Dec 2016', 900, 12, 'active ', 1),
(5, 'Diesel BX-243', 1, 1, '1', '15 Feb 2017', 550, 20, 'active', 1),
(6, 'Diesel BX-245', 1, 2, '1', '12 Jan 2017', 550, 19, 'active', 2),
(7, 'Diesel BX-246', 1, 1, '1', '12 Jan 2017', 550, 20, 'active', 2),
(8, 'Diesel BX-249', 1, 1, '1', '15 Jan 2017', 950, 201, 'active', 3),
(9, 'Rolex 245l', 4, 2, '1', '10 Dec 2016', 8000, 10, 'active', 20),
(10, 'Redo 250', 4, 1, '1', '11 Dec 2016', 4500, 5, 'active', 10),
(11, 'Redo Silver 2', 4, 2, '1', '10 Dec 2016', 3500, 4, 'active', 15),
(12, 'Rich 2jkx', 2, 1, '1', '10 Dec 2016', 1500, 19, 'active', 10),
(13, 'Rich jo25', 2, 1, '1', '10 Dec 2016', 1500, 5, 'active', 15),
(14, 'River Asile 23', 3, 3, '1', '11 Dec 2016', 2000, 10, 'active', 10),
(15, 'River Asile 46', 3, 2, '1', '10 Dec 2016', 2500, 9, 'active', 35),
(18, ' Titan Lx231', 4, 1, 'not yet', '21 Jan 2017', 3650, 25, 'waiting', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_picture`
--

CREATE TABLE IF NOT EXISTS `product_picture` (
  `product_picture_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  PRIMARY KEY (`product_picture_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `product_picture`
--

INSERT INTO `product_picture` (`product_picture_id`, `product_id`, `image_name`) VALUES
(1, 1, 't3.jpg'),
(2, 3, 'pant.jpg'),
(3, 4, 'shirt.jpg'),
(4, 9, 'rolex1.jpg'),
(5, 10, 'redo1.jpg'),
(6, 11, 'redo2.jpg'),
(7, 8, 't1.jpg'),
(8, 7, 't2.jpg'),
(9, 6, 't10.jpg'),
(10, 2, 't11.jpg'),
(11, 5, 't22.jpg'),
(12, 12, 'p1.jpg'),
(13, 13, 'p3.jpg'),
(14, 14, 's1.jpg'),
(15, 15, 's2.jpg'),
(18, 18, '148502593414850259345820.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `seller_information`
--

CREATE TABLE IF NOT EXISTS `seller_information` (
  `seller_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `join_date` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`seller_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `seller_information`
--

INSERT INTO `seller_information` (`seller_id`, `name`, `contact`, `username`, `password`, `email`, `address`, `join_date`, `status`) VALUES
(1, 'Kuddus Ali', '01711111111', 's', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'kuddus@gmail.com', 'Kolapara, 5/2 Green Road, Dhaka.', '29 DEC 2016', 'active'),
(2, 'Borkot Ali', '', 'selacc0550314', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'borkot@gmail.com', '', '', 'active'),
(3, 'Lucifer', '', 'selacc0521044', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'luci@gmail.com', '', '', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` varchar(250) NOT NULL,
  `transaction_method` varchar(250) NOT NULL,
  `discount_id` varchar(250) NOT NULL,
  `bkash_trx_id` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `adding_date` varchar(40) NOT NULL,
  `customer_id` varchar(250) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `admin_id`, `transaction_method`, `discount_id`, `bkash_trx_id`, `status`, `adding_date`, `customer_id`) VALUES
(6, '1', 'cod', '1', 'not_used', 'waiting_for_receive_money', '21 Jan 2017', '1'),
(7, '1', 'cod', '0', 'not_used', 'waiting_for_receive_money', '21 Jan 2017', '1');

-- --------------------------------------------------------

--
-- Table structure for table `verified_customer`
--

CREATE TABLE IF NOT EXISTS `verified_customer` (
  `customer_verified_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `verification_date` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`customer_verified_id`),
  KEY `admin_information_verified_customer_fk` (`admin_id`),
  KEY `customer_information_verified_customer_fk` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `verified_customer`
--

INSERT INTO `verified_customer` (`customer_verified_id`, `customer_id`, `admin_id`, `verification_date`, `status`) VALUES
(1, 1, 1, '01 Jan 2017', 'active'),
(2, 9, 1, '01 Jan 2017', 'active'),
(3, 10, 1, '01 Jan 2017', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `verified_seller`
--

CREATE TABLE IF NOT EXISTS `verified_seller` (
  `seller_verified_id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `verification_date` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`seller_verified_id`),
  KEY `seller_information_verified_seller_fk` (`seller_id`),
  KEY `admin_information_verified_seller_fk` (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `verified_seller`
--

INSERT INTO `verified_seller` (`seller_verified_id`, `seller_id`, `admin_id`, `verification_date`, `status`) VALUES
(1, 1, 1, '29 DEC 2016', 'active');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `admin_information_category_fk` FOREIGN KEY (`admin_id`) REFERENCES `admin_information` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `seller_information_product_fk` FOREIGN KEY (`seller_id`) REFERENCES `seller_information` (`seller_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `verified_customer`
--
ALTER TABLE `verified_customer`
  ADD CONSTRAINT `admin_information_verified_customer_fk` FOREIGN KEY (`admin_id`) REFERENCES `admin_information` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `customer_information_verified_customer_fk` FOREIGN KEY (`customer_id`) REFERENCES `customer_information` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `verified_seller`
--
ALTER TABLE `verified_seller`
  ADD CONSTRAINT `admin_information_verified_seller_fk` FOREIGN KEY (`admin_id`) REFERENCES `admin_information` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `seller_information_verified_seller_fk` FOREIGN KEY (`seller_id`) REFERENCES `seller_information` (`seller_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
