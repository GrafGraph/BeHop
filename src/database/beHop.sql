-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2020 at 06:46 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `behop`
--
create database behop;
use behop;
-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `city` varchar(50) NOT NULL,
  `street` varchar(100) NOT NULL,
  `number` varchar(10) NOT NULL,
  `zip` varchar(5) NOT NULL,
  `country` varchar(50) NOT NULL DEFAULT 'Deutschland'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `createdAt`, `updatedAt`, `city`, `street`, `number`, `zip`, `country`) VALUES
(1, '2020-01-12 07:50:28', NULL, 'Erfurt', 'Altonaer Straße', '25', '99085', 'Deutschland'),
(2, '2020-01-13 16:39:12', NULL, 'Erfurt', 'Grolmannstraße', '13', '99085', 'Deutschland'),
(3, '2020-01-13 16:39:15', NULL, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `createdAt`, `updatedAt`, `name`) VALUES
(1, '2020-01-12 07:59:20', NULL, 'Schuhe'),
(2, '2020-01-12 07:59:20', NULL, 'Hosen');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `imageUrl` varchar(255) NOT NULL,
  `altText` varchar(255) DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `createdAt`, `updatedAt`, `imageUrl`, `altText`, `product_id`) VALUES
(1, '2020-01-12 08:14:02', NULL, '/Git/BeHop/assets/images/products/mainImage-1.jpg', '', 1),
(2, '2020-01-12 10:37:47', NULL, '/Git/BeHop/assets/images/products/mainImage-2.jpg', 'Schwarze Harem-Jogginghose', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `name` varchar(45) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `color` varchar(50) NOT NULL,
  `numberInStock` int(11) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `sales_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `createdAt`, `updatedAt`, `name`, `price`, `color`, `numberInStock`, `description`, `category_id`, `sales_id`) VALUES
(1, '2020-01-12 08:04:22', NULL, 'Jordans Supercool', '69.99', 'White', 5, 'Das Brandneue Jordans Modell SUPERCOOL: Noch mehr Tragekomfort und das im bisher coolsten Look!', 1, NULL),
(2, '2020-01-12 10:23:28', NULL, 'Harem Jogginghose', '19.99', 'Schwarz', 2, 'Verschluss: Tunnelzug.\r\nPolyester.\r\nHarem.\r\nBreiter, weicher Gummibund mit innenliegendem Kordelzug für komfortablen, sicheren Halt.\r\nPerfekt für einen aktiven Lebensstil und geeignet zum Laufen, Laufen, Yoga und den meisten Sportarten.', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `name` varchar(50) NOT NULL,
  `discountPercent` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `createdAt`, `updatedAt`, `name`, `discountPercent`) VALUES
(1, '2020-01-12 08:01:47', NULL, 'Sale10', 10),
(2, '2020-01-12 08:01:47', NULL, 'Wintersale', 15);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `id` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `user_id` int(11) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shoppingcart`
--

INSERT INTO `shoppingcart` (`id`, `createdAt`, `updatedAt`, `user_id`) VALUES
(5, '2020-01-13 19:35:25', NULL, 5),
(6, '2020-01-13 19:35:25', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart_has_product`
--

CREATE TABLE `shoppingcart_has_product` (
  `id` int(11) NOT NULL,
  `shoppingCart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shoppingcart_has_product`
--

INSERT INTO `shoppingcart_has_product` (`id`, `shoppingCart_id`, `product_id`, `quantity`) VALUES
(1, 5, 2, 1),
(2, 5, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `email` varchar(70) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(70) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `createdAt`, `updatedAt`, `email`, `password`, `firstName`, `lastName`, `address_id`) VALUES
(3, '2020-01-13 16:39:12', NULL, 'MarieS.H@web.de', '$2y$10$Xj1rNHe6SHS20ptb1HbL2Oq4yXXGnFuHA2Qi4r5IEIwIzDSGsgzqe', 'Marie', 'Hartmann', 2),
(5, '2020-01-13 19:00:33', NULL, 'admin@fh-erfurt.de', '$2y$10$Y6.w6mpMlZioRLUrlw/ETOj7AhktY4ajnWX3TTD/f7D7S.hN9Z76C', 'admin', 'root', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `imageUrl_UNIQUE` (`imageUrl`),
  ADD KEY `fk_image_product1_idx` (`product_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_user1_idx` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_category1_idx` (`category_id`),
  ADD KEY `fk_product_sales1_idx` (`sales_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_shoppingCart_user1_idx` (`user_id`);

--
-- Indexes for table `shoppingcart_has_product`
--
ALTER TABLE `shoppingcart_has_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_shoppingCart_has_product_product1_idx` (`product_id`),
  ADD KEY `fk_shoppingCart_has_product_shoppingCart1_idx` (`shoppingCart_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_user_address_idx` (`address_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `shoppingcart_has_product`
--
ALTER TABLE `shoppingcart_has_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_image_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_sales1` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD CONSTRAINT `fk_shoppingCart_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `shoppingcart_has_product`
--
ALTER TABLE `shoppingcart_has_product`
  ADD CONSTRAINT `fk_shoppingCart_has_product_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_shoppingCart_has_product_shoppingCart1` FOREIGN KEY (`shoppingCart_id`) REFERENCES `shoppingcart` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_address` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
