-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Jan 2020 um 18:23
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
  `country` varchar(50) DEFAULT 'Deutschland'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `address`
--

INSERT INTO `address` (`id`, `createdAt`, `updatedAt`, `city`, `street`, `number`, `zip`, `country`) VALUES
(1, '2020-01-12 07:50:28', NULL, 'Erfurt', 'Altonaer Straße', '25', '99085', 'Deutschland'),
(2, '2020-01-13 16:39:12', NULL, 'Erfurt', 'Grolmannstraße', '13', '99085', 'Deutschland');

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
(2, '2020-01-12 07:59:20', NULL, 'Trousers'),
(3, '2020-01-16 15:59:06', NULL, 'T-Shirts'),
(4, '2020-01-16 15:59:06', NULL, 'Jackets'),
(5, '2020-01-16 15:59:06', NULL, 'Sweaters and Hoodies'),
(6, '2020-01-16 15:59:06', NULL, 'Underwear');

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
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `image`
--

INSERT INTO `image` (`id`, `createdAt`, `updatedAt`, `imageUrl`, `altText`, `product_id`) VALUES
(1, '2020-01-12 08:14:02', NULL, '/Git/BeHop/assets/images/products/mainImage-1.jpg', 'best looking shoes', 1),
(2, '2020-01-12 10:37:47', NULL, '/Git/BeHop/assets/images/products/mainImage-2.jpg', 'Black Harem-Joggers', 2);

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
(1, '2020-01-12 08:04:22', NULL, 'Jordans Supercool', '69.99', 'White', 'Jordan', 5, 'The hot and new Jordans Model SUPERCOOL: Comfort in its best looking way!', 1, NULL),
(2, '2020-01-12 10:23:28', NULL, 'Harem Joggers', '19.99', 'Black', 'BeHop', 2, 'Polyester.\r\nHarem.\r\nPerfect for an active lifestyle: Suitable for trekking, running, yoga, couchsurfing and most other sports!', 2, 1);

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
(1, '2020-01-12 08:01:47', NULL, 'Sale10', 10),
(2, '2020-01-12 08:01:47', NULL, 'Wintersale', 15);

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
(5, '2020-01-13 19:35:25', NULL, 5),
(6, '2020-01-13 19:35:25', NULL, 3);

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
(2, 5, 1, 3);

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
(5, '2020-01-13 19:00:33', NULL, 'admin@fh-erfurt.de', '$2y$10$Y6.w6mpMlZioRLUrlw/ETOj7AhktY4ajnWX3TTD/f7D7S.hN9Z76C', 'admin', 'root', 1);

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
  ADD KEY `fk_image_product1_idx` (`product_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `shoppingcart`
--
ALTER TABLE `shoppingcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `shoppingcart_has_product`
--
ALTER TABLE `shoppingcart_has_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_image_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
