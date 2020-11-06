-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2020 at 07:31 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vowsbees`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `about_id` int(11) NOT NULL,
  `about_title` varchar(150) NOT NULL,
  `about_desc` text NOT NULL,
  `about_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`about_id`, `about_title`, `about_desc`, `about_order`) VALUES
(2, 'Bringing your feelings to life with Vows & Bees!', 'Bringing nature to your doorstep, online flower ordering has now become easy with Floward. With passion and love, we master the arrangement of elegant and vibrant bouquets to brighten up your special occasions.', 1),
(3, 'Receive Your Favorite Flowers Within 1 Hour', 'We are proud to have the fastest floral delivery, where our team can deliver your order to any destination in Kuwait, with an average time of 1 hour after submitting your order.', 2),
(4, 'Same – Day Flowers Delivery and Solid Customer Service', 'Our Customer Service team is perfectly trained to serve all your needs. Whether you’re sending red roses to express your love to that special someone, gifts and flowers to welcome the arrival of a baby into the world, or get well flowers to give a patient to heal better. Our team is always ready to assist you! Just visit our website or call our Customer Care team on +965 22222222. We’ll help you pick from our cheerful arrangements and pair your flowers with our wide selection of add-on products to send everlasting smiles to that special someone.', 3),
(5, 'Order Flowers Online to Celebrate Various Occasions and Holidays', 'Spread beauty and positive vibes for any occasion with our collection of truly original gifts! You can never run out of options when pairing a gift with your fresh arrangement. You have the option to choose from cards, balloons, candles, teddy bears, chocolates, jewelry, and more.', 4),
(6, 'Trusted Florist Guaranteed', 'Established in August 2006 as a major floral, gift retailer and distribution company, Vows & Bees is the first online flowers consumer platform with delivery service across Kuwait. On the 1st of October 2016, the brand Vows & Bees was introduced as a successor to Q8Flowers (original brand name) which resembles the root noun “flower” &ورد\"” in both languages, Arabic and English. \r\n\r\n \r\n\r\nOur fine flowers and plants are sourced on a daily basis from the best growers, distinctively designed, arranged and delivered to ensure a long lasting impression, backed with a friendly and prompt customer care team. Because we care so much about our customers, our professional staff is dedicated to making your shopping experience a pleasant one.\r\n\r\n \r\n\r\nChoose Vows & Bees to celebrate your next occasion, download Vows & Bees’s application or order at ordervb.com today! Whatever the occasion, Vows & Bees is here to make you smile!', 5);

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `address_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `address_name` varchar(100) NOT NULL,
  `address_type` varchar(20) NOT NULL,
  `address_area` varchar(50) NOT NULL,
  `address_block` varchar(10) NOT NULL,
  `address_avenue` varchar(10) NOT NULL,
  `address_street` varchar(100) NOT NULL,
  `address_building` varchar(10) NOT NULL,
  `address_home` varchar(10) NOT NULL,
  `address_floor` varchar(10) NOT NULL,
  `address_flat` varchar(10) NOT NULL,
  `address_notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `ad_id` int(11) NOT NULL,
  `ad_name` varchar(50) NOT NULL,
  `ad_url` varchar(1000) NOT NULL,
  `ad_img` text NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ad_id`, `ad_name`, `ad_url`, `ad_img`, `status`) VALUES
(4, 'Test Ad', 'https://idigitalq8.net/', 'big-tulip-flowers-bouquet-pink-table_23-2148070775.jpg', 'Show'),
(5, 'lkenfklnwef', '', '637358508021115383.jpg', 'Show');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_icon`) VALUES
(4, 'Love', 'Icon.png'),
(5, 'Mother Day', 'Icon-2.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_subject` varchar(150) NOT NULL,
  `contact_name` varchar(100) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(8) NOT NULL,
  `contact_body` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_subject`, `contact_name`, `contact_email`, `contact_phone`, `contact_body`, `date`) VALUES
(2, 'Complain', 'Jamal Dash', 'bodashtii911@hotmail.com', '96080899', 'There are several ways to create an API. Which one you pick will depend on the skills you have available to you, the feature set you need to support, time and budget. Here are some broad guidelines:', '2020-09-26 02:51:40'),
(3, 'Complain', 'Jamal Dash', 'bodashtii911@hotmail.com', '96080899', ' ggnbtyy', '2020-10-02 03:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `discount_id` int(11) NOT NULL,
  `discount_name` varchar(100) NOT NULL,
  `discount_code` varchar(20) NOT NULL,
  `discount_date` date NOT NULL,
  `discount_value` int(3) NOT NULL,
  `discount_type` varchar(20) NOT NULL,
  `discount_collection` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`discount_id`, `discount_name`, `discount_code`, `discount_date`, `discount_value`, `discount_type`, `discount_collection`) VALUES
(2, 'Test', 'TEST20', '2020-10-14', 20, 'general', '1');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_desc` text NOT NULL,
  `item_category` varchar(50) NOT NULL,
  `item_price` float NOT NULL,
  `new_price` float NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_status` varchar(5) NOT NULL,
  `height` varchar(15) NOT NULL,
  `width` varchar(15) NOT NULL,
  `weight` varchar(15) NOT NULL,
  `flowers` varchar(1000) NOT NULL,
  `img1` text NOT NULL,
  `img2` text NOT NULL,
  `img3` text NOT NULL,
  `img4` text NOT NULL,
  `img5` text NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_desc`, `item_category`, `item_price`, `new_price`, `item_quantity`, `item_status`, `height`, `width`, `weight`, `flowers`, `img1`, `img2`, `img3`, `img4`, `img5`, `added_date`) VALUES
(1, 'Bouquet 1', 'dwedweferferre', 'Love', 100, 80, 3, 'Show', '120 cm', '50 cm', '2 kg', 'roses, tolips', '637236529569337090.jpg', '637363665864300545.jpg', '636999828924377732.jpg', '637363693022494260.jpg', '', '2020-09-26 03:22:04'),
(4, '35 Red Roses', 'Height 50 CM Width 30 CM\r\n35 piece of red rose for your special occasions.', 'Love', 12, 0, 5, 'Show', '', '', '', '', '636999828834189930.jpg', '', '', '', '', '2020-09-25 22:10:34'),
(5, 'FL4054', 'Height 50 CM Width 40 CM\r\nThe arrangement contains  Rose', 'Love', 21, 0, 1, 'Show', '', '', '', '', '637363678200042295.jpg', '', '', '', '', '2020-09-25 22:10:34'),
(6, '100 Berry mixed roses', 'Height 60 CM Width 50 CM\r\nThe arrangement contains  Rose', 'Mother Day', 56, 0, 10, 'Show', '', '', '', '', '637363693022494260.jpg', '', '', '', '', '2020-09-25 22:10:34'),
(8, '35 Red Roses', '', 'Mother Day', 5, 0, 3, 'Show', '', '', '', '', '637236529569337090.jpg', '', '', '', '', '2020-09-25 22:13:48');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `first_name`, `last_name`, `email_address`, `status`, `total_price`) VALUES
(10, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 68),
(11, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 80),
(12, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 160),
(13, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 160),
(14, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 189),
(15, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 189),
(16, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 189),
(17, '', '', '', 'Success', 12),
(18, '', '', '', 'Success', 440),
(19, '', '', '', 'Success', 21),
(20, '', '', '', 'Success', 21),
(21, '', '', '', 'Success', 21),
(22, '', '', '', 'Fail', 21),
(23, '', '', '', 'Success', 21),
(24, '', '', '', 'Success', 21),
(25, '', '', '', 'Success', 136),
(26, '', '', '', 'Success', 136),
(27, '', '', '', 'Success', 136),
(28, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 136),
(29, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 136),
(30, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 136),
(31, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 136),
(32, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 136),
(33, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 136),
(34, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 136),
(35, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 136),
(36, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 136),
(37, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 136),
(38, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 136),
(39, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 136),
(40, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 148),
(41, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 68),
(42, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 68),
(43, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 68),
(44, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 68),
(45, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 68),
(46, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 68),
(47, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 68),
(48, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 68),
(49, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 68),
(50, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 68),
(51, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 68),
(52, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 68),
(53, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 68),
(54, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 68),
(55, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 68),
(56, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 68),
(57, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 68),
(58, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 68),
(59, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 68),
(60, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 68),
(61, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 56),
(62, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 136),
(63, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 136),
(64, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 92),
(65, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 92),
(66, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 12),
(67, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 136),
(68, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 136),
(69, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 136),
(70, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 80),
(71, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 0),
(72, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 136),
(73, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 136),
(74, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 80),
(75, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 113),
(76, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 113),
(77, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 113),
(78, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 113),
(79, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 113),
(80, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', 'Success', 113),
(81, '', '', '', 'Success', 112),
(82, '', '', '', 'Success', 112);

-- --------------------------------------------------------

--
-- Table structure for table `order_contents`
--

CREATE TABLE `order_contents` (
  `order_content_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_contents`
--

INSERT INTO `order_contents` (`order_content_id`, `order_id`, `item_name`, `item_quantity`, `item_subtotal`) VALUES
(1, 10, '100 Berry mixed roses', 1, 56),
(2, 10, '35 Red Roses', 1, 12),
(3, 11, '100 Berry mixed roses', 1, 56),
(4, 11, '35 Red Roses', 2, 24),
(5, 12, '100 Berry mixed roses', 2, 112),
(6, 12, '35 Red Roses', 4, 48),
(7, 13, '100 Berry mixed roses', 2, 112),
(8, 13, '35 Red Roses', 4, 48),
(9, 14, '100 Berry mixed roses', 3, 168),
(10, 14, 'FL4054', 1, 21),
(11, 15, '100 Berry mixed roses', 3, 168),
(12, 15, 'FL4054', 1, 21),
(13, 16, '100 Berry mixed roses', 3, 168),
(14, 16, 'FL4054', 1, 21),
(15, 17, '35 Red Roses', 1, 12),
(16, 18, 'Bouquet 1', 2, 160),
(17, 18, '100 Berry mixed roses', 5, 280),
(18, 19, 'FL4054', 1, 21),
(19, 20, 'FL4054', 1, 21),
(20, 21, 'FL4054', 1, 21),
(21, 22, 'FL4054', 1, 21),
(22, 23, 'FL4054', 1, 21),
(23, 24, 'FL4054', 1, 21),
(24, 25, 'Bouquet 1', 1, 80),
(25, 25, '100 Berry mixed roses', 1, 56),
(26, 26, 'Bouquet 1', 1, 80),
(27, 26, '100 Berry mixed roses', 1, 56),
(28, 27, 'Bouquet 1', 1, 80),
(29, 27, '100 Berry mixed roses', 1, 56),
(30, 28, 'Bouquet 1', 1, 80),
(31, 28, '100 Berry mixed roses', 1, 56),
(32, 29, 'Bouquet 1', 1, 80),
(33, 29, '100 Berry mixed roses', 1, 56),
(34, 30, 'Bouquet 1', 1, 80),
(35, 30, '100 Berry mixed roses', 1, 56),
(36, 31, 'Bouquet 1', 1, 80),
(37, 31, '100 Berry mixed roses', 1, 56),
(38, 32, 'Bouquet 1', 1, 80),
(39, 32, '100 Berry mixed roses', 1, 56),
(40, 33, 'Bouquet 1', 1, 80),
(41, 33, '100 Berry mixed roses', 1, 56),
(42, 34, 'Bouquet 1', 1, 80),
(43, 34, '100 Berry mixed roses', 1, 56),
(44, 35, 'Bouquet 1', 1, 80),
(45, 35, '100 Berry mixed roses', 1, 56),
(46, 36, 'Bouquet 1', 1, 80),
(47, 36, '100 Berry mixed roses', 1, 56),
(48, 37, 'Bouquet 1', 1, 80),
(49, 37, '100 Berry mixed roses', 1, 56),
(50, 38, 'Bouquet 1', 1, 80),
(51, 38, '100 Berry mixed roses', 1, 56),
(52, 39, 'Bouquet 1', 1, 80),
(53, 39, '100 Berry mixed roses', 1, 56),
(54, 40, 'Bouquet 1', 1, 80),
(55, 40, '100 Berry mixed roses', 1, 56),
(56, 40, '35 Red Roses', 1, 12),
(57, 41, '100 Berry mixed roses', 1, 56),
(58, 41, '35 Red Roses', 1, 12),
(59, 42, '100 Berry mixed roses', 1, 56),
(60, 42, '35 Red Roses', 1, 12),
(61, 43, '100 Berry mixed roses', 1, 56),
(62, 43, '35 Red Roses', 1, 12),
(63, 44, '100 Berry mixed roses', 1, 56),
(64, 44, '35 Red Roses', 1, 12),
(65, 45, '100 Berry mixed roses', 1, 56),
(66, 45, '35 Red Roses', 1, 12),
(67, 46, '100 Berry mixed roses', 1, 56),
(68, 46, '35 Red Roses', 1, 12),
(69, 47, '100 Berry mixed roses', 1, 56),
(70, 47, '35 Red Roses', 1, 12),
(71, 48, '100 Berry mixed roses', 1, 56),
(72, 48, '35 Red Roses', 1, 12),
(73, 49, '100 Berry mixed roses', 1, 56),
(74, 49, '35 Red Roses', 1, 12),
(75, 50, '100 Berry mixed roses', 1, 56),
(76, 50, '35 Red Roses', 1, 12),
(77, 51, '100 Berry mixed roses', 1, 56),
(78, 51, '35 Red Roses', 1, 12),
(79, 52, '100 Berry mixed roses', 1, 56),
(80, 52, '35 Red Roses', 1, 12),
(81, 53, '100 Berry mixed roses', 1, 56),
(82, 53, '35 Red Roses', 1, 12),
(83, 54, '100 Berry mixed roses', 1, 56),
(84, 54, '35 Red Roses', 1, 12),
(85, 55, '100 Berry mixed roses', 1, 56),
(86, 55, '35 Red Roses', 1, 12),
(87, 56, '100 Berry mixed roses', 1, 56),
(88, 56, '35 Red Roses', 1, 12),
(89, 57, '100 Berry mixed roses', 1, 56),
(90, 58, '100 Berry mixed roses', 1, 56),
(91, 59, '100 Berry mixed roses', 1, 56),
(92, 60, '100 Berry mixed roses', 1, 56),
(93, 60, '35 Red Roses', 1, 12),
(94, 61, '100 Berry mixed roses', 1, 56),
(95, 62, 'Bouquet 1', 1, 80),
(96, 62, '100 Berry mixed roses', 1, 56),
(97, 63, 'Bouquet 1', 1, 80),
(98, 63, '100 Berry mixed roses', 1, 56),
(99, 64, 'Bouquet 1', 1, 80),
(100, 65, 'Bouquet 1', 1, 80),
(101, 66, '35 Red Roses', 1, 12),
(102, 67, 'Bouquet 1', 1, 80),
(103, 68, 'Bouquet 1', 1, 80),
(104, 69, 'Bouquet 1', 1, 80),
(105, 69, '100 Berry mixed roses', 1, 56),
(106, 70, 'Bouquet 1', 1, 80),
(107, 72, 'Bouquet 1', 1, 80),
(108, 72, '100 Berry mixed roses', 1, 56),
(109, 73, 'Bouquet 1', 1, 80),
(110, 73, '100 Berry mixed roses', 1, 56),
(111, 74, 'Bouquet 1', 1, 80),
(112, 75, 'Bouquet 1', 1, 80),
(113, 75, 'FL4054', 1, 21),
(114, 75, '35 Red Roses', 1, 12),
(115, 76, 'Bouquet 1', 1, 80),
(116, 76, 'FL4054', 1, 21),
(117, 76, '35 Red Roses', 1, 12),
(118, 77, 'Bouquet 1', 1, 80),
(119, 77, 'FL4054', 1, 21),
(120, 77, '35 Red Roses', 1, 12),
(121, 78, 'Bouquet 1', 1, 80),
(122, 78, 'FL4054', 1, 21),
(123, 78, '35 Red Roses', 1, 12),
(124, 79, 'Bouquet 1', 1, 80),
(125, 79, 'FL4054', 1, 21),
(126, 79, '35 Red Roses', 1, 12),
(127, 80, 'Bouquet 1', 1, 80),
(128, 80, 'FL4054', 1, 21),
(129, 80, '35 Red Roses', 1, 12),
(130, 81, '100 Berry mixed roses', 2, 112),
(131, 82, '100 Berry mixed roses', 2, 112);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email_address`, `password`, `role`) VALUES
(2, 'Jamal', 'Dash', 'jamal.ahmad@idigitalq8.com', '828466f3e0b3c4e34227548e5ee658b2', 'Admin'),
(3, 'Jamal', 'Dash', 'jamal.ahmad@idigitalq8.com', '31b69a7494a0eec4ac544fd648c9d604', 'Admin'),
(4, 'Jamal', 'Dash', 'mk@hotmail.com', 'qwe', 'User'),
(5, 'Jay', 'Dashtii', 'bodashtii911@hotmail.com', '31b69a7494a0eec4ac544fd648c9d604', 'User'),
(7, 'Jamal', 'Dash', 'qwe@qwe.com', '200820e3227815ed1756a6b531e7e0d2', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`discount_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_contents`
--
ALTER TABLE `order_contents`
  ADD PRIMARY KEY (`order_content_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `order_contents`
--
ALTER TABLE `order_contents`
  MODIFY `order_content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
