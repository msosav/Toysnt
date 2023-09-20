-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 20, 2023 at 07:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toysnt`
--

--
-- Dumping data for table `techniques`
--

INSERT INTO `techniques` (`id`, `model`, `image`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 'AK-47', 'technique_image_1.jpg', 'It explains itself', 120.00, '2023-09-20 10:46:38', '2023-09-20 10:47:23'),
(2, 'Acid', 'technique_image_2.jpg', 'Nitric Acid', 130.00, '2023-09-20 10:48:33', '2023-09-20 10:48:33'),
(3, 'Bomb', 'technique_image_3.jpg', 'Booooom', 400.00, '2023-09-20 10:49:14', '2023-09-20 10:49:14'),
(4, 'TNT', 'technique_image_4.jpg', 'Boooooom x2', 200.00, '2023-09-20 10:49:42', '2023-09-20 10:49:42');

--
-- Dumping data for table `toys`
--

INSERT INTO `toys` (`id`, `model`, `image`, `description`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'Ken', 'toy_image_1.jpg', 'Cool Ken', 200.00, 9, '2023-09-20 09:53:15', '2023-09-20 10:41:57'),
(2, 'Barbie', 'toy_image_2.jpg', 'Stereotypical barbie', 300.00, 21, '2023-09-20 10:37:51', '2023-09-20 10:37:51'),
(3, 'Osito Cariñosito', 'toy_image_3.jpg', 'Osito triste', 200.00, 12, '2023-09-20 10:38:27', '2023-09-20 10:38:27'),
(4, 'Max Steel', 'toy_image_4.jpg', 'Mejor juguete', 1000.00, 1, '2023-09-20 10:40:52', '2023-09-20 10:40:52'),
(5, 'My Little Pony', 'toy_image_5.jpg', 'Un pony-persona', 30.00, 44, '2023-09-20 10:41:33', '2023-09-20 10:41:33');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `balance`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Soos', 'soos@gmail.com', 'admin', 150000.00, 'Cra 49', NULL, '$2y$10$06J/lWDWX/aKudFRk9QEgeqvPDRrz/71fEoU.1296u2ovciWhhH8K', NULL, '2023-09-20 09:50:26', '2023-09-20 09:50:26'),
(2, 'Miguel', 'migue@sosa.com', 'basic_user', 149800.00, 'Cra 49', NULL, '$2y$10$S1LxWoU0gk.noE15bifEweLOzuEkcCH6aT8lGoI9x/481fRLXK4xm', NULL, '2023-09-20 09:50:53', '2023-09-20 09:54:21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
