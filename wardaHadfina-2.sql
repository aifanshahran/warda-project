-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 18, 2017 at 05:35 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wardaHadfina`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_password`) VALUES
(101, '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `total` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `customerID`, `total`) VALUES
(9, 36, '65.1'),
(10, 42, NULL),
(11, 39, '1095.4'),
(12, 43, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `productID` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `pricePerUnit` varchar(1000) NOT NULL,
  `Product_Qty` int(11) NOT NULL,
  `subtotal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`productID`, `cart_id`, `pricePerUnit`, `Product_Qty`, `subtotal`) VALUES
(127, 11, '69.00', 1, '69'),
(128, 11, '65.10', 2, '130.2'),
(129, 11, '48.00', 1, '48'),
(130, 11, '48.00', 1, '48'),
(134, 9, '65.10', 1, '65.1'),
(134, 11, '65.10', 2, '130.2'),
(135, 11, '135.00', 2, '270'),
(136, 11, '400.00', 1, '400');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(400) DEFAULT NULL,
  `dateOf_birth` date NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `photo_name` varchar(100) DEFAULT NULL,
  `customerStatus` enum('Y','N','','') NOT NULL DEFAULT 'N',
  `code` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `name`, `email`, `password`, `address`, `dateOf_birth`, `gender`, `photo_name`, `customerStatus`, `code`) VALUES
(36, 'Aifan Shahran', 'aifanshahran@icloud.com', '2ef63174092d78df324d4eae9b14bdc9', 'BLOCK A5-B502, PAGOH RESIDENTIAL COLLEGE, JALAN EDU HUB PAGOH, 80300,MUAR,JOHOR', '1998-11-17', 'Male', 'customer-photo_id.bin.jpeg', 'Y', '80577eef80e6facc33719a2d7630362e'),
(39, 'Nabil ', 'mnabil9660@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, '1998-04-07', 'Male', NULL, 'Y', 'a1b6cbb47592db3d62db1614097c2720'),
(40, 'shafinaz', 'asha_naz98@yahoo.com', 'ce8b48dc45d67a6c1976343de812bb8d', NULL, '1998-12-11', NULL, NULL, 'N', 'fa9c1c91d75db10d12f7e698723deeaa'),
(41, 'Siti Nurshaliza Adik', 'sitinurshaliza@gmail.com', '185aef3b1c810799a6be8314abf6512c', NULL, '1998-07-17', 'Female', 'IMG_0849.JPEG', 'Y', '750dfee9b4e30ba74fd34311296125bd'),
(42, 'Mohamad Aiman', 'smallbluedinosaur@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, '1998-12-19', 'Male', NULL, 'Y', '47757621d0bdd5391a462dfd4f6a9439'),
(43, 'rosni ramle', 'rosniramle@gmail.com', 'b3f08ac57e9f7b2108315bb6f9f4dbb8', 'lol, haha, 43200,Kedah,Malaysia', '1988-08-12', NULL, NULL, 'Y', 'a9b48cefa8a8521cc271df0f642f5dbf');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `commentID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`commentID`, `name`, `email`, `subject`, `comment`) VALUES
(1, 'Mohamad Aiman', 'aifanshahran@icloud.com', 'Try', 'Try');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_ID` int(100) NOT NULL,
  `customerID` int(11) NOT NULL,
  `admin_id` int(100) DEFAULT NULL,
  `invoiceNo` varchar(100) DEFAULT NULL,
  `paystatus` varchar(100) DEFAULT NULL,
  `shippingStatus` varchar(100) DEFAULT NULL,
  `totalproductorder` varchar(100) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `sname` varchar(100) DEFAULT NULL,
  `bname` varchar(100) DEFAULT NULL,
  `billingAddress` varchar(500) DEFAULT NULL,
  `shippingAddress` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_ID`, `customerID`, `admin_id`, `invoiceNo`, `paystatus`, `shippingStatus`, `totalproductorder`, `order_date`, `sname`, `bname`, `billingAddress`, `shippingAddress`) VALUES
(57, 36, 101, '12201703136', 'Cash On Delivery', 'Delivered', '79.606', '2017-12-03', 'Aifan Shahran', 'Aifan Shahran', 'BLOCK A5-B502, PAGOH RESIDENTIAL COLLEGE, JALAN EDU HUB PAGOH, 80300,MUAR,JOHOR', 'BLOCK A5-B502, PAGOH RESIDENTIAL COLLEGE, JALAN EDU HUB PAGOH, 80300,MUAR,JOHOR'),
(58, 42, 101, '12201704142', 'Cash On Delivery', 'Delivered', '848', '2017-12-04', 'Mohamad Aiman', 'Mohamad Aiman', 'Block, A5, 80500,Johor,Malaysia', 'Block, A5, 80500,Johor,Malaysia'),
(59, 36, 101, '12201710236', 'Cash On Delivery', 'Delivered', '79.606', '2017-12-10', 'Atiqah', 'Atiqah', 'BLOCK A1, B302, 80500,Johor,Malaysia', 'BLOCK A1, B302, 80500,Johor,Malaysia'),
(60, 36, 101, '12201711336', 'Cash On Delivery', 'Delivered', '136.74', '2017-12-11', 'Aifan Shahran', 'Aifan Shahran', 'BLOCK A5-B502, PAGOH RESIDENTIAL COLLEGE, JALAN EDU HUB PAGOH, 80300,MUAR,JOHOR', 'BLOCK A5-B502, PAGOH RESIDENTIAL COLLEGE, JALAN EDU HUB PAGOH, 80300,MUAR,JOHOR'),
(61, 36, 101, '12201711436', 'Cash On Delivery', 'Delivered', '844.82', '2017-12-11', 'Aifan Shahran', 'Aifan Shahran', 'BLOCK A5-B502, PAGOH RESIDENTIAL COLLEGE, JALAN EDU HUB PAGOH, 80300,MUAR,JOHOR', 'BLOCK A5-B502, PAGOH RESIDENTIAL COLLEGE, JALAN EDU HUB PAGOH, 80300,MUAR,JOHOR'),
(62, 36, 101, '12201715536', 'Cash On Delivery', 'Packaging', '79.606', '2017-12-15', 'Aifan Shahran', 'Aifan Shahran', 'BLOCK A5-B502, PAGOH RESIDENTIAL COLLEGE, JALAN EDU HUB PAGOH, 80300,MUAR,JOHOR', 'BLOCK A5-B502, PAGOH RESIDENTIAL COLLEGE, JALAN EDU HUB PAGOH, 80300,MUAR,JOHOR'),
(63, 36, 101, '12201715636', 'Cash On Delivery', 'Shipping', '424', '2017-12-15', 'Aifan Shahran', 'Aifan Shahran', 'BLOCK A5-B502, PAGOH RESIDENTIAL COLLEGE, JALAN EDU HUB PAGOH, 80300,MUAR,JOHOR', 'BLOCK A5-B502, PAGOH RESIDENTIAL COLLEGE, JALAN EDU HUB PAGOH, 80300,MUAR,JOHOR'),
(64, 36, NULL, '12201715736', 'Cash On Delivery', 'In Process', '345.03', '2017-12-15', 'Aifan Shahran', 'Aifan Shahran', 'BLOCK A5-B502, PAGOH RESIDENTIAL COLLEGE, JALAN EDU HUB PAGOH, 80300,MUAR,JOHOR', 'BLOCK A5-B502, PAGOH RESIDENTIAL COLLEGE, JALAN EDU HUB PAGOH, 80300,MUAR,JOHOR'),
(65, 39, NULL, '12201715139', 'Cash On Delivery', 'In Process', '212.106', '2017-12-15', 'Muhamad Nabil', 'Muhamad Nabil', 'A5-B307, Kolej Kediaman Pagoh, 84600 Pagoh, Muar, Johor, 84600,Johor,Malaysia', 'A5-B307, Kolej Kediaman Pagoh, 84600 Pagoh, Muar, Johor, 84600,Johor,Malaysia'),
(66, 36, NULL, '12201716836', 'Cash On Delivery', 'In Process', '424', '2017-12-16', 'Aifan Shahran', 'Aifan Shahran', 'BLOCK A5-B502, PAGOH RESIDENTIAL COLLEGE, JALAN EDU HUB PAGOH, 80300,MUAR,JOHOR', 'BLOCK A5-B502, PAGOH RESIDENTIAL COLLEGE, JALAN EDU HUB PAGOH, 80300,MUAR,JOHOR'),
(67, 43, 101, '12201718143', 'Cash On Delivery', 'Shipping', '138.012', '2017-12-18', 'rosni ramle', 'rosni ramle', 'lol, haha, 43200,Kedah,Malaysia', 'lol, haha, 43200,Kedah,Malaysia');

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `order_ID` int(100) NOT NULL,
  `productID` int(100) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `total` varchar(100) NOT NULL,
  `subtotal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`order_ID`, `productID`, `product_qty`, `total`, `subtotal`) VALUES
(57, 134, 1, '65.1', '65.1'),
(58, 137, 1, '800', '800'),
(59, 128, 1, '65.1', '65.1'),
(60, 131, 1, '129', '129'),
(61, 135, 1, '135', '135'),
(61, 136, 1, '400', '400'),
(61, 138, 2, '262', '131'),
(62, 134, 1, '65.1', '65.1'),
(63, 136, 1, '400', '400'),
(64, 134, 5, '325.5', '65.1'),
(65, 134, 1, '65.1', '65.1'),
(65, 135, 1, '135', '135'),
(66, 136, 1, '400', '400'),
(67, 134, 2, '130.2', '65.1');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(100) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productQuantity` int(100) DEFAULT NULL,
  `productBrand` varchar(100) DEFAULT NULL,
  `productPrice_unit` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `colour` varchar(100) DEFAULT NULL,
  `photoProduct_name` varchar(100) DEFAULT NULL,
  `productDescription` varchar(900) DEFAULT NULL,
  `productMaterial` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `productQuantity`, `productBrand`, `productPrice_unit`, `category`, `size`, `colour`, `photoProduct_name`, `productDescription`, `productMaterial`) VALUES
(95, 'Cakenis Fume - Moonlight', 49, 'Cakenis', '135.00', 'Hijab & Shawl', '200cm x 68cm', 'Moonlight', 'cak7.jpg', 'Broochless just-hook. Extra hook added to fit more face shapes & sizes including repair kit.', 'Heavy Chiffon'),
(97, 'Naelofar Duchess - Dusty Mustard', 50, 'Naelofar', '78.31', 'Hijab & Shawl', '2.5m x 1m', 'Dusty Mustard', 'ne11.jpg', 'The design is fuss-free. Don\'t need pin to create the draping effect. Embellish with Swarovski hotflix along the edge of the hijab.', 'Heavy Chiffon with Swarovski HotfixRetail'),
(98, 'dUCk Blooming - Pink Orchid ', 50, 'dUCk', '130.00', 'Hijab & Shawl', '173cm x 67cm', 'Pink Orchid', 'duck8.jpg', 'Sweet looking scarve will takes the shape of a blooming flower.', 'Satin Silk'),
(100, 'dUCk Gerogette - Walnut', 50, 'dUCk', '130.00', 'Hijab & Shawl', '173cm x 67cm', 'Walnut', 'duck7.jpg', 'Lightweight with a grain texture, these scarves have a slight sheer and drape beautifully without looking bulky. Whether for work, play or rest, these scarves ooze clean-cut elegance and are another crowd favourite!', 'Georgette'),
(102, 'Naelofar Duchess - Chamomile', 50, 'Naelofar', '78.31', 'Hijab & Shawl', '2.5m x 1m', 'Chamomile', 'ne10.jpg', 'The design is fuss-free. Don\'t need pin to create the draping effect. Embellish with Swarovski hotflix along the edge of the hijab.', 'Heavy Chiffon with Swarovski HotfixRetail'),
(103, 'dUCk Georgette - Vintage Rose', 50, 'dUCk', '130.00', 'Hijab & Shawl', '173cm x 67cm', 'Vintage Rose', 'duck6.jpg', 'dUCk\'s Georgette Premium Basic scarf is a lightweight fabric with woven polyester. With its slightly textured crepe surface, it drapes beautifully and creates a very elegant look that\'s perfect for both formal and casual wear. dUCk\'s Georgette Premium Basics collection features single colour scarves with dUCk\'s signature dUCk charm.', 'Georgette'),
(104, 'Naelofar Zehra - Blue Quartz', 50, 'Naelofar', '65.10', 'Hijab & Shawl', '2.5m x 1m', 'Blue Quartz', 'ne9.jpg', 'Zehra uses a heavy chiffon fabric that wear well and do not wrinkle easily. These qualities make the shawl a cinch to style and a delight to wear! You can perform your fast in full comfort with the versatile Zehra. Chiffon in particular, also breathes well which makes it a suitable option for our hot and humid weather.', 'Heavy Chiffon Premium with Swarovski Xilion Rose and Gold Charm'),
(105, 'Cakenis Fume - Jade Moss', 50, 'Cakenis', '135.00', 'Hijab & Shawl ', '200cm x 68cm', 'Jade Moss', 'cak6.jpg', 'Broochless just-hook. Extra hook added to fit more face shapes & sizes including repair kit.', 'Heavy Chiffon'),
(106, 'Naelofar Zehra - Harbour Gray', 50, 'Naelofar', '65.10', 'Hijab & Shawl', '2.5m x 1m', 'Harbour Gray', 'ne8.jpg', 'Zehra uses a heavy chiffon fabric that wear well and do not wrinkle easily. These qualities make the shawl a cinch to style and a delight to wear! You can perform your fast in full comfort with the versatile Zehra. Chiffon in particular, also breathes well which makes it a suitable option for our hot and humid weather.', 'Heavy Chiffon Premium with Swarovski Xilion Rose and Gold Charm'),
(107, 'dUCk Georgette - Coffee Bean', 50, 'dUCk', '130.00', 'Hijab & Shawl', '173cm x 68cm', 'Coffee Bean', 'duck5.jpg', 'dUCk\'s Georgette Premium Basic scarf is a lightweight fabric with woven polyester. With its slightly textured crepe surface, it drapes beautifully and creates a very elegant look that\'s perfect for both formal and casual wear. dUCk\'s Georgette Premium Basics collection features single colour scarves with dUCk\'s signature dUCk charm.', 'Georgette'),
(108, 'Naelofar Zehra - Cadmium Orange', 49, 'Naelofar', '65.10', 'Hijab & Shawl', '2.5m x 1m', 'Cadmium Orange', 'ne7.jpg', 'Zehra uses a heavy chiffon fabric that wear well and do not wrinkle easily. These qualities make the shawl a cinch to style and a delight to wear! You can perform your fast in full comfort with the versatile Zehra. Chiffon in particular, also breathes well which makes it a suitable option for our hot and humid weather.', 'Heavy Chiffon Premium with Swarovski Xilion Rose and Gold Charm'),
(109, 'Cakenis Fume - Lavender Bloom', 49, 'Cakenis', '135.00', 'Hijab & Shawl', '200cm x 68cm', 'Lavender Bloom', 'cak5.jpg', 'Broochless just-hook. Extra hook added to fit more face shapes & sizes including repair kit.', 'Heavy Chiffon'),
(110, 'dUCk Georgette - Thai Mango', 50, 'DUCk', '130.00', 'Hijab & Shawl', '173cm x 68cm', 'Thai Mango', 'duck4.jpg', 'Lightweight with a grain texture, these scarves have a slight sheer and drape beautifully without looking bulky. Whether for work, play or rest, these scarves ooze clean-cut elegance and are another crowd favourite!', 'Georgette'),
(111, 'Naelofar Zehra - Conch Shell', 50, 'Naelofar', '65.10', 'Hijab & Shawl', '2.5m x 1m', 'Conch Shell', 'ne6.jpg', 'Zehra uses a heavy chiffon fabric that wear well and do not wrinkle easily. These qualities make the shawl a cinch to style and a delight to wear! You can perform your fast in full comfort with the versatile Zehra. Chiffon in particular, also breathes well which makes it a suitable option for our hot and humid weather.', 'Heavy Chiffon with Swarovski HotfixRetail'),
(112, 'Naelofar Miss Charm - Moroccan Blue', 50, 'Naelofar', '56.61', 'Hijab & Shawl', '2.5m x 1m', 'Moroccan Blue', 'ne5.jpg', 'Miss Charm by Naelofar Hijab celebrates typography in the most whimsical way. Now, you can wear your favourite letter on your hijab in the form of a dangling dainty golden charm. Jewel Swarovski embellishments add a touch of decadence to the overall design. Personalise your look, style it your way, choose a letter from A - Z and flaunt it!', 'Wool Chiffon with Alphabet and Frame Flatback Hotfix'),
(113, 'Cakenis Perak Collection', 50, 'Cakenis', '135.00', 'Hijab & Shawl', '200cm x 68cm', 'Perwinkle, Sunshine and Boysenberry', 'cak4.jpg', 'Beautiful heavy chiffon shawl with Broochless Just-Hook feature comes with 3 shades of shawls : Periwinkle, Sunshine and Boysenberry', 'Heavy Chiffon'),
(116, 'Naelofar Miss Charm', 50, 'Naelofar', '56.61', 'Hijab & Shawl', '', 'Mahogang Rose', 'ne11.jpg', 'Miss Charm by Naelofar Hijab celebrates typography in the most whimsical way. Now, you can wear your favourite letter on your hijab in the form of a dangling dainty golden charm. Jewel Swarovski embellishments add a touch of decadence to the overall design. Personalise your look, style it your way, choose a letter from A - Z and flaunt it!', 'Wool Chiffon with Alphabet and Frame Flatback Hotfix'),
(117, 'Cakenis Birthday Cake Collection', 49, 'Cakenis', '135', 'Hijab & Shawl', '2000cm x 68cm', 'Butter Cream, Precan Praline and Choc Ganache', 'cak3.jpg', 'The first Cakenis shawl innovation : Broochless Just-Hook', 'Heavy Chiffon'),
(118, 'dUCk Songket - Turqouise', 50, 'dUCk', '220', 'Hijab & Shawl', '173cm x 68cm', 'Turquoise', 'duck3.jpg', 'Inspired by a fabric of the same name, the Songket is a luxurious hand-woven textile from the brocade family with history dating all the way back to the 7th century! In this illustrated re-creation, intricate details of the Songket meticulously hand-drawn into the design; using uneven lines and gaps to create the illusion of movement.', 'Satin Silk'),
(119, 'dUCk Mixed Crepe - Peppermint', 50, 'dUCk', '130.00', 'Hijab & Shawl', '173cm x 68cm', 'Peppermint', 'duck2.jpg', 'Lightweight with a slight grain texture, dUCk\'s Mixed Crepe scarves offer fuss-free solutions. They hold their shape well when worn as a head scarf and do not crease easily; making them perfect for work or play!', 'High Quality Mixed Crepe'),
(120, 'Naelofar Miss Charm - Messa Rose', 50, 'Naelofar', '56.61', 'Hijab & Shawl', '2.5m x 1m', 'Mesa Rose', 'ne3.jpg', 'Miss Charm by Naelofar Hijab celebrates typography in the most whimsical way. Now, you can wear your favourite letter on your hijab in the form of a dangling dainty golden charm. Jewel Swarovski embellishments add a touch of decadence to the overall design. Personalise your look, style it your way, choose a letter from A - Z and flaunt it!', 'Wool Chiffon with Alphabet and Frame Flatback Hotfix'),
(121, 'Naelofar Miss Charm - Dusty Pink', 50, 'Naelofar', '56.61', 'Hijab & Shawl', '2.5m x 1m', 'Dusty Pink', 'ne2.jpg', 'Miss Charm by Naelofar Hijab celebrates typography in the most whimsical way. Now, you can wear your favourite letter on your hijab in the form of a dangling dainty golden charm. Jewel Swarovski embellishments add a touch of decadence to the overall design. Personalise your look, style it your way, choose a letter from A - Z and flaunt it!', 'Wool Chiffon with Alphabet and Frame Flatback Hotfix'),
(122, 'Cakenis Signature Collection', 50, 'Cakenis', '135.00', 'Hijab & Shawl', '200cm x 68cm', 'Olive Green, Dusty Pink and Classic Black', 'cak2.jpg', 'First Cakenis shawl innovation : Broochless Just-Hook', 'Silky Chiffon '),
(123, 'Cakenis Negeri Sembilan Collection', 49, 'Cakenis', '135.00', 'Hijab & Shawl', '200cm x 68cm', 'Cotton Candy Pink, Peaches N Cream and Pistachio Green', 'cak1.jpg', 'First Cakenis shawl innovation : Broochless Just-Hook', 'Heavy Chiffon'),
(124, 'dUCk Songket', 40, 'dUCk', '220.00', 'Hijab & Shawlj', '173cm x 68cm', 'Multicolour in one pack', 'duck1.jpg', 'Inspired by a fabric of the same name, the Songket is a luxurious hand-woven textile from the brocade family with history dating all the way back to the 7th century! In this illustrated re-creation, intricate details of the Songket meticulously hand-drawn into the design; using uneven lines and gaps to create the illusion of movement.', 'Satin Silk'),
(125, 'Naelofar Miss Charm - Lavender Blue', 50, 'Naelofar', '56.61', 'Hijab & Shawl', '2.5m x 1m', 'Lavender Blue', 'ne1.jpg', 'Miss Charm by Naelofar Hijab celebrates typography in the most whimsical way. Now, you can wear your favourite letter on your hijab in the form of a dangling dainty golden charm. Jewel Swarovski embellishments add a touch of decadence to the overall design. Personalise your look, style it your way, choose a letter from A - Z and flaunt it!', 'Wool Chiffon with Alphabet and Frame Flatback Hotfix'),
(126, 'Cakenis Temasik', 49, 'Cakenis', '135.00', 'Hijab & Shawl', '200cm x 68cm', 'Medal, Rainforest and Terracotta', 'product1.jpg', 'The first Cakenis shawl innovation : Broochless Just-Hook', 'Heavy Chiffon'),
(127, 'Naelofar Lady Lofa - Dark Earth', 50, 'Naelofar', '69.00', 'Hijab & Shawl', '2.5m x 1m', 'Dark Earth', 'product2.jpg', 'Lady Lofa is an ideal hijab for daily wear. Lady Lofa\'s strength lies in its simplicity. It\'s a breath of fresh air, uncomplicated, a straightforward design devoid of complexities.', 'Korean Chiffon With Golden Dragonfly Pendant and Swarovski Flatback Hotfix Crystal'),
(128, 'Naelofar Zehra - Whisper White', 48, 'Naelofar', '65.10', 'Hijab & Shawl', '2.5m x 1m', 'Whisper White', 'product3.jpg', 'Zehra uses a heavy chiffon fabric that wear well and do not wrinkle easily. These qualities make the shawl a cinch to style and a delight to wear! You can perform your fast in full comfort with the versatile Zehra. Chiffon in particular, also breathes well which makes it a suitable option for our hot and humid weather.', 'Heavy Chiffon Premium with Swarovski Xilion Rose and Gold Charm'),
(129, 'CLOVERUSH Lily L - Black', 50, 'CLOVERUSH', '48.00', 'Hijab & Shawl', 'S, M AND L', 'Black', 'product4.jpg', 'LILY scarf is one of our hot selling items for plain instant shawl collection. She made high quality spandex cotton that is breathable and very comfy to be worn all day long. No ironing is required as the material is not easily crumpled. This made our LILY as number one choice especially for those who are always on the go/travelling. Our specialty other than the type of materials used, the visor cutting up to the jaw area. It is specially designed to cover up the chubby cheek, apart from hiding stray hair. The edge of the visor is sewn using double stitches method to ensure that it won\'t stick  on your forehead and easily shaped around your face. Perfect match with printed blouse, jubah or kurung!', 'Cotton'),
(130, 'CLOVERUSH Lily L - Rose', 46, 'CLOVERUSH', '48.00', 'Hijab & Shawl', 'S, M AND L', 'Rose', 'product5.jpg', 'LILY scarf is one of our hot selling items for plain instant scarf collection. She is made of high quality spandex cotton that is breathable and very comfy to be worn all day long. No ironing required as the material is not easily crumpled. This made our Lily as number one choice especially for those who are always on the go/travelling. Our specialty other than the type of material used, the visor cutting is long up to the jaw area. It is specially designed to cover up the chubby cheek (makes your face looks slimmer), apart from hiding your stray hair. The edge of the visor is sewn using double stitches method to ensure that it wonâ€™t stick on your forehead and easily shaped around your face. Perfect match with printed blouse, jubah or kurung!', 'Cotton'),
(131, 'Bokkita Voila Printed Crepe - Calido', 49, 'CLOVERUSH', '129.00', 'Hijab & Shawl', 'Free Size', 'Calido', 'product6.jpg', 'Voila has a short side flap and shorter coverage. It covers up to the top of the chest area.', 'Cotton and Lycra'),
(132, 'dUCk Chiffon Scarf -Yoghurt', 50, 'dUCk', '130.00', 'Hijab & Shawl', '173cm x 68cm', 'Yoghurt', 'product7.jpg', 'dUCk\'s Premium Basic Collection presents its latest in chiffon - a light, soft and semi-sheer scarf sure to tug at your heart. Delicate in appearance with soft drapes - these feminine scaves features a slight texture which makes it easy to style as head scarves and are light enough for everyday use. ', 'Chiffon'),
(133, 'dUCk Mixed Crepe -Blackberry', 46, 'dUCk', '133.00', 'Hijab & Shawl', '173cm x 68cm', 'Blackberry', 'product8.jpg', 'Crafted from high quality mixed crepe, dUCk\'s premium basics collection features single colour scarves with dUCk signature silver dUCk charm and wide shawl with neat trimmings.', 'High Quality Mixed Crepe'),
(134, 'Naelofar Zehra - Violet Quartz', 40, 'Naelofar', '65.10', 'Hijab & Shawl', '2.5m x 1m', 'Violet Quartz', 'product9.jpg', 'Zehra uses a heavy chiffon fabric that wear well and do not wrinkle easily. These qualities make the shawl a cinch to style and a delight to wear! You can perform your fast in full comfort with the versatile Zehra. Chiffon in particular, also breathes well which makes it a suitable option for our hot and humid weather.', 'Heavy Chiffon Premium with Swarovski Xilion Rose and Gold Charm'),
(135, 'Cakenis Istanbul Collection', 48, 'Cakenis', '135.00', 'Hijab & Shawl', '200cm x 68cm', 'Iznik, Sky Blue and Marina', 'product10.jpg', 'First Cakenis shawl innovation : Broochless Just-Hook', 'Heavy Chiffon'),
(136, 'dUCk The Mother\'s Day', 43, 'dUCk', '400.00', 'Hijab & Shawl', '173cm x 68cm', 'Twilly Pink', 'product11.jpg', 'Made especially in conjuction with the celebration of mother\'s day, The scarf celebrates mothers and their capacity for unconditional love and patience featuring a child\'s sketch of a mother and her children in a scene, it is the imperfections in its creation that makes it so perfect and reminiscent of a child\'s creativity and natural love towards their moms.', 'Satin Silk'),
(137, 'dUCk Miss Universe', 0, 'dUCk', '800.00', 'Hijab & Shawl', '173cm x 68cm', 'Pink', 'product12.jpg', 'I was having lunch when the phone rang â€“ it was from the Miss Universe Malaysia Organisation asking dUCk to represent Malaysia with our signature KL dUCk. Could this be true? To be able to create the KL dUCk is already pure joy, but to now present it to over 100 of the most beautiful women from across the world in a world-class competitionâ€¦ now thatâ€™s just unreal.', 'Satin Silk with 200 Swarovski Crystal'),
(138, 'Ice Ice Baby', 0, 'dUCk', '131.00', 'Scarf', '112x112 cm', 'Ice Ice Baby', '12821111709_a.jpg', 'Our Matte Satin Silk dUCks are saying hello again with delicious new colours and now, they come in Squares too! The perfect combination of classy and elegant, with a touch of demureness.\r\n\r\ndUCkâ€™s Matte Satin Silk Premium Basic scarf is a lightweight fabric with a less slippery finish and creates a very elegant look thatâ€™s perfect for both formal and casual wear. This collection features single-coloured scarves with dUCkâ€™s signature silver dUCk charm.\r\n\r\nEvery dUCk scarf purchase comes beautifully wrapped in its own hard casing with a personalised thank you card from D, so they would be great as gifts too!', 'Matte Satin Silk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD UNIQUE KEY `customerID` (`customerID`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`productID`,`cart_id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `productID` (`productID`) USING BTREE;

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_ID`),
  ADD UNIQUE KEY `order_ID` (`order_ID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`order_ID`,`productID`),
  ADD KEY `order_ID` (`order_ID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `customerID` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD CONSTRAINT `cart_id` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productID` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD CONSTRAINT `orders_details_ibfk_1` FOREIGN KEY (`order_ID`) REFERENCES `orders` (`order_ID`),
  ADD CONSTRAINT `orders_details_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
