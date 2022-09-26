-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Värd: localhost
-- Tid vid skapande: 26 sep 2022 kl 14:31
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
-- Tabellstruktur `product`
--

CREATE TABLE `product` (
  `id` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `price` varchar(20) NOT NULL,
  `imgSource` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `product`
--

INSERT INTO `product` (`id`, `name`, `brand`, `category`, `price`, `imgSource`, `created`, `updated`) VALUES
('1', 'Air force 1', 'Nike', 'Shoes', '1000', 'airforce.webp', '2022-09-22 22:47:25', NULL),
('2', 'Jordan', 'Nike', 'Shoes', '3500', 'jordan.png', '2022-09-22 22:47:32', NULL),
('3', 'Dior x Judy Blame', 'Dior', 'Shirt', '7500', 'dior.webp', '2022-09-22 22:56:17', NULL),
('4', 'Cotton Polo', 'Gucci', 'Shirt', '5200', 'gucci.webp', '2022-09-22 22:47:47', NULL),
('5', 'Duo Messenger Bag', 'Louis Vuitton', 'Bag', '13700', 'louis.jpeg', '2022-09-22 22:47:53', NULL),
('6', 'Fabric Shirt', 'Prada', 'Shirt', '4950', 'prada.jpg', '2022-09-22 22:48:00', NULL),
('7', 'Speed 2.0', 'Balenciaga', 'Shoes', '6000', 'balenciaga.png', '2022-09-22 22:48:05', NULL),
('8', 'Messenger Bag', 'Gucci', 'Bag', '4400', 'guccibag.jpeg', '2022-09-22 22:48:10', NULL);

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'Test', '$2y$10$5zrSiPoRCdM36k00BrnRVupT89Stjfus5l9gIdXo.5i9xEs7t6kAK', '2022-09-15 18:02:48'),
(2, 'David', '$2y$10$hVE1QM.bmO7d4WMiftkLHOnuSHWU/zJAg.Lmmc5CpSkA5m.LDcEXO', '2022-09-15 18:54:47'),
(3, 'test2', '$2y$10$So/jr6XN7Uot3wSfYIpo9.Wxy52X9vV6MDq7NAU2r02VU/N29UmTO', '2022-09-22 12:53:29'),
(4, 'david2', '$2y$10$ur6yYBk00W.CfyYEUTxS1.Av2croEAmD1hAhRgQclHENg8m270vBu', '2022-09-22 13:17:35');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
