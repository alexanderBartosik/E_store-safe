-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Värd: localhost
-- Tid vid skapande: 29 sep 2022 kl 02:15
-- Serverversion: 10.4.20-MariaDB
-- PHP-version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `estore`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `finished_orders`
--

CREATE TABLE `finished_orders` (
  `finished_order_id` int(11) NOT NULL,
  `same_order_id` int(11) NOT NULL,
  `buyers_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `buyers_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `price` int(20) NOT NULL,
  `imgSource` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `product`
--

INSERT INTO `product` (`id`, `name`, `brand`, `category`, `price`, `imgSource`, `created`, `updated`) VALUES
(1, 'Air force 1', 'Nike', 'Shoes', 1000, 'airforce.webp', '2022-09-22 22:47:25', NULL),
(2, 'Jordan', 'Nike', 'Shoes', 3500, 'jordan.png', '2022-09-22 22:47:32', NULL),
(3, 'Dior x Judy Blame', 'Dior', 'Shirt', 7500, 'dior.webp', '2022-09-22 22:56:17', NULL),
(4, 'Cotton Polo', 'Gucci', 'Shirt', 5200, 'gucci.webp', '2022-09-22 22:47:47', NULL),
(5, 'Duo Messenger Bag', 'Louis Vuitton', 'Bag', 13700, 'louis.jpeg', '2022-09-22 22:47:53', NULL),
(6, 'Fabric Shirt', 'Prada', 'Shirt', 4950, 'prada.jpg', '2022-09-27 22:16:40', NULL),
(7, 'Speed 2.0', 'Balenciaga', 'Shoes', 6000, 'balenciaga.png', '2022-09-27 22:16:48', NULL),
(8, 'Messenger Bag', 'Gucci', 'Bag', 4400, 'guccibag.jpeg', '2022-09-22 22:48:10', NULL);

-- --------------------------------------------------------

--
-- Tabellstruktur `same_order_counter`
--

CREATE TABLE `same_order_counter` (
  `same_order_counter` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `same_order_counter`
--

INSERT INTO `same_order_counter` (`same_order_counter`, `created`, `updated`) VALUES
(1, '2022-09-28 23:57:55', NULL);

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `home_adress` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `home_adress`, `created_at`) VALUES
(2, 'David', '$2y$10$hVE1QM.bmO7d4WMiftkLHOnuSHWU/zJAg.Lmmc5CpSkA5m.LDcEXO', 'Adelgatan 19', '2022-09-15 18:54:47'),
(4, 'david2', '$2y$10$ur6yYBk00W.CfyYEUTxS1.Av2croEAmD1hAhRgQclHENg8m270vBu', 'Lundavägen 25', '2022-09-22 13:17:35'),
(9, 'Anders', '$2y$10$6Jsu56kHKb13lErlbfGaGu2XykPvMvAvMZX6Itr4QKYZBrwPd2Yr2', 'Lundavägen 10', '2022-09-26 16:43:07');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `finished_orders`
--
ALTER TABLE `finished_orders`
  ADD PRIMARY KEY (`finished_order_id`),
  ADD KEY `FK_PersonOrders` (`buyers_id`),
  ADD KEY `FK_ProductOrders` (`product_id`);

--
-- Index för tabell `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK_PersonOrder` (`buyers_id`),
  ADD KEY `FK_ProductOrder` (`product_id`);

--
-- Index för tabell `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `same_order_counter`
--
ALTER TABLE `same_order_counter`
  ADD PRIMARY KEY (`same_order_counter`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `finished_orders`
--
ALTER TABLE `finished_orders`
  MODIFY `finished_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT för tabell `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT för tabell `same_order_counter`
--
ALTER TABLE `same_order_counter`
  MODIFY `same_order_counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `finished_orders`
--
ALTER TABLE `finished_orders`
  ADD CONSTRAINT `FK_PersonOrders` FOREIGN KEY (`buyers_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_ProductOrders` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Restriktioner för tabell `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_PersonOrder` FOREIGN KEY (`buyers_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_ProductOrder` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
