-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Feb 2020 um 16:52
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `behop`
--
drop schema if exists behop;
create database behop;
use behop;
-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `city` varchar(50) NOT NULL,
  `street` varchar(100) NOT NULL,
  `number` varchar(10) NOT NULL,
  `zip` varchar(5) NOT NULL,
  `country` varchar(50) DEFAULT 'Germany'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `address`
--

INSERT INTO `address` (`id`, `createdAt`, `updatedAt`, `city`, `street`, `number`, `zip`, `country`) VALUES
(1, '2020-01-12 07:50:28', NULL, 'Erfurt', 'Altonaer Straße', '25', '99085', 'Germany'),
(2, '2020-01-13 16:39:12', NULL, 'Erfurt', 'Grolmannstraße', '13', '99085', 'Germany'),
(5, '2020-02-15 19:05:39', NULL, 'Erfurt', 'Altonaer Straße', '25', '99085', NULL),
(6, '2020-02-15 22:29:40', NULL, 'Erfurt', 'Altonaer Straße', '24', '99085', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `category`
--

INSERT INTO `category` (`id`, `createdAt`, `updatedAt`, `name`) VALUES
(1, '2020-01-12 07:59:20', NULL, 'Shoes'),
(2, '2020-01-12 07:59:20', NULL, 'Pants'),
(3, '2020-01-16 15:59:06', NULL, 'T-Shirts'),
(4, '2020-01-16 15:59:06', NULL, 'Jackets'),
(5, '2020-01-16 15:59:06', NULL, 'Hoodies'),
(6, '2020-01-20 20:10:32', NULL, 'Hats'),
(7, '2020-01-20 20:10:32', NULL, 'Socks');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `imageUrl` varchar(255) NOT NULL,
  `altText` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `sales_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `image`
--

INSERT INTO `image` (`id`, `createdAt`, `updatedAt`, `imageUrl`, `altText`, `product_id`, `sales_id`) VALUES
(1, '2020-01-12 08:14:02', NULL, 'assets/images/products/mainImage-1.png', 'Best looking Shoes', 1, NULL),
(2, '2020-01-12 10:37:47', NULL, 'assets/images/products/mainImage-2.png', 'Black Harem-Joggers', 2, NULL),
(3, '2020-01-18 17:42:54', NULL, 'assets/images/sales/endOfSeasonSale20.png', 'End of Season Sale: 20 Percent off', NULL, 3),
(5, '2020-01-20 18:18:10', NULL, 'assets/images/products/mainImage-3.png', 'Adidas NMD_R1 black', 4, NULL),
(6, '2020-01-20 18:37:17', NULL, 'assets/images/products/mainImage-4.png', 'Nike black Jacket', 5, NULL),
(8, '2020-01-20 20:14:06', NULL, 'assets/images/sales/WinterSale.png', 'Winter Sale', NULL, 2),
(9, '2020-01-20 18:37:17', NULL, 'assets/images/products/mainImage-5.jpg', 'White T-Shirt', 6, 2),
(10, '2020-01-20 18:37:17', NULL, 'assets/images/products/mainImage-6.png', 'Black Balenciaga Hoodie', 7, NULL),
(11, '2020-02-15 19:31:55', NULL, 'assets/images/products/mainImage-7.png', 'Grey Stretch Jeans with Cord', 8, NULL),
(12, '2020-02-15 19:40:07', NULL, 'assets/images/products/mainImage-8.png', 'Sidemen Hazard Hoodie in Black', 9, NULL),
(14, '2020-02-15 19:55:42', NULL, 'assets/images/products/mainImage-9.png', 'Checked T-Shirt', 10, NULL),
(15, '2020-02-15 19:59:00', NULL, 'assets/images/products/mainImage-10.png', 'Cannabis Socks', 11, NULL),
(16, '2020-02-15 20:00:16', NULL, 'assets/images/products/mainImage-11.png', 'Taco Sock, yay!', 12, NULL),
(19, '2020-02-15 20:09:39', NULL, 'assets/images/products/mainImage-12.png', 'Black Urban Nike Cap', 15, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL,
  `shoppingcart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `order`
--

INSERT INTO `order` (`id`, `createdAt`, `updatedAt`, `user_id`, `shoppingcart_id`) VALUES
(1, '2020-01-18 20:47:08', NULL, 5, 5),
(2, '2020-02-15 19:07:07', NULL, 5, 7),
(3, '2020-02-15 22:27:41', NULL, 5, 9),
(4, '2020-02-15 22:28:33', NULL, 5, 10);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `name` varchar(45) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `color` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `numberInStock` int(11) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `sales_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `product`
--

INSERT INTO `product` (`id`, `createdAt`, `updatedAt`, `name`, `price`, `color`, `brand`, `numberInStock`, `description`, `category_id`, `sales_id`) VALUES
(1, '2020-01-12 08:04:22', NULL, 'Jordans Supercool', '69.99', 'White', 'Jordan', 5, 'The hot and new Jordans Model SUPERCOOL: Comfort in its best looking way!', 1, 3),
(2, '2020-01-12 10:23:28', NULL, 'Camouflage Cargo', '19.99', 'Grey', 'BeHop', 4, 'Camouflage Military Cargo Pants. Hip hop Skateboard Bib Overall Pants', 2, 2),
(4, '2020-01-20 18:20:15', NULL, 'adidas Original NMD_R1', '140.00', 'Black', 'Adidas', 45, 'The nicest black shoe on the market, everyone want this shoe. It is a special edition and extremely rare.', 1, NULL),
(5, '2020-01-20 18:36:15', NULL, 'Nike Academy 18 Track Jacket', '39.95', 'Black', 'Nike', 12, 'Best jacket for Sports', 4, 2),
(6, '2020-01-20 18:36:15', NULL, 'e.s. Funktions T-Shirt poly cotton', '22.99', 'White', 'Engelbert Strauß', 22, 'Nice T-Shirt for everyone', 3, 2),
(7, '2020-01-20 18:36:15', NULL, 'Balenciaga Mode Hoodie', '359.99', 'Black', 'Balenciaga', 22, 'The best Hoodie on the Market', 5, NULL),
(8, '2020-02-15 19:30:27', NULL, 'Stretch Jeans', '49.99', 'Grey', 'Etre-Fort', 9, 'Stretch Jeans with Cord. Parkour-Style', 2, NULL),
(9, '2020-02-15 19:39:26', NULL, 'SDMN Hazard Hoodie', '34.99', 'Black', 'Sidemen', 7, 'SIDEMEN Hazard Hoodie. 99% Polyester, 1% Badass.', 5, NULL),
(10, '2020-02-15 19:53:34', NULL, 'Check Shirt', '12.99', 'White', 'Urban Classics', 12, 'Check-Figures not included', 3, NULL),
(11, '2020-02-15 19:57:38', NULL, 'Cannabis Socks', '5.99', 'Purple', 'Urban Classics', 19, '100% Hemp', 7, NULL),
(12, '2020-02-15 19:59:50', NULL, 'Taco Socks', '9.99', 'Black', 'BeHop', 99, 'Snack on the Sock', 7, 3),
(15, '2020-02-15 20:08:55', NULL, 'Nike Basecap ', '23.99', 'Black', 'Nike', 6, 'Urban Outdoor Baseball Cap', 6, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `name` varchar(50) NOT NULL,
  `discountPercent` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `sales`
--

INSERT INTO `sales` (`id`, `createdAt`, `updatedAt`, `name`, `discountPercent`) VALUES
(2, '2020-01-12 08:01:47', NULL, 'WinterSale', 15),
(3, '2020-01-18 17:40:49', NULL, 'EndOfSeasonSale', 20);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `id` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `shoppingcart`
--

INSERT INTO `shoppingcart` (`id`, `createdAt`, `updatedAt`, `user_id`) VALUES
(5, '2020-01-13 19:35:25', '2020-01-18 20:47:08', NULL),
(6, '2020-01-13 19:35:25', NULL, 3),
(7, '2020-01-18 20:47:08', '2020-02-15 19:07:07', NULL),
(8, '2020-01-19 09:13:46', NULL, 6),
(9, '2020-02-15 19:07:07', '2020-02-15 22:27:41', NULL),
(10, '2020-02-15 22:27:41', '2020-02-15 22:28:33', NULL),
(11, '2020-02-15 22:28:33', NULL, 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `shoppingcart_has_product`
--

CREATE TABLE `shoppingcart_has_product` (
  `id` int(11) NOT NULL,
  `shoppingCart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `shoppingcart_has_product`
--

INSERT INTO `shoppingcart_has_product` (`id`, `shoppingCart_id`, `product_id`, `quantity`) VALUES
(1, 5, 2, 1),
(2, 5, 1, 3),
(6, 7, 1, 1),
(8, 9, 4, 1),
(9, 9, 9, 1),
(10, 9, 6, 1),
(11, 9, 11, 1),
(12, 10, 5, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `email` varchar(320) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(70) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `createdAt`, `updatedAt`, `email`, `password`, `firstName`, `lastName`, `address_id`) VALUES
(3, '2020-01-13 16:39:12', NULL, 'MarieS.H@web.de', '$2y$10$Xj1rNHe6SHS20ptb1HbL2Oq4yXXGnFuHA2Qi4r5IEIwIzDSGsgzqe', 'Marie', 'Hartmann', 2),
(5, '2020-01-13 19:00:33', NULL, 'admin@fh-erfurt.de', '$2y$10$Y6.w6mpMlZioRLUrlw/ETOj7AhktY4ajnWX3TTD/f7D7S.hN9Z76C', 'admin', 'root', 1),
(6, '2020-01-19 09:13:46', '2020-01-19 11:05:04', 'marie.hartmann@uni-erfurt.de', '$2y$10$dCkDEAV4thuxSt.RC7XW9e74p9xWXvdUc3UohnGWYWRXZ0luRYKyG', 'Marie', 'Hartmann', 2);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `imageUrl_UNIQUE` (`imageUrl`),
  ADD KEY `fk_image_product1_idx` (`product_id`),
  ADD KEY `fk_image_sales1_idx` (`sales_id`);

--
-- Indizes für die Tabelle `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_user1_idx` (`user_id`),
  ADD KEY `fk_order_shoppingcart1` (`shoppingcart_id`);

--
-- Indizes für die Tabelle `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_category1_idx` (`category_id`),
  ADD KEY `fk_product_sales1_idx` (`sales_id`);

--
-- Indizes für die Tabelle `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indizes für die Tabelle `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_shoppingCart_user1_idx` (`user_id`);

--
-- Indizes für die Tabelle `shoppingcart_has_product`
--
ALTER TABLE `shoppingcart_has_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_shoppingCart_has_product_product1_idx` (`product_id`),
  ADD KEY `fk_shoppingCart_has_product_shoppingCart1_idx` (`shoppingCart_id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_user_address_idx` (`address_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT für Tabelle `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT für Tabelle `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `shoppingcart`
--
ALTER TABLE `shoppingcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `shoppingcart_has_product`
--
ALTER TABLE `shoppingcart_has_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_image_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_image_sales1` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_sales1` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD CONSTRAINT `fk_shoppingCart_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `shoppingcart_has_product`
--
ALTER TABLE `shoppingcart_has_product`
  ADD CONSTRAINT `fk_shoppingCart_has_product_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_shoppingCart_has_product_shoppingCart1` FOREIGN KEY (`shoppingCart_id`) REFERENCES `shoppingcart` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_address` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
