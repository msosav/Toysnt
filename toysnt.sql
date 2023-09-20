-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 20-09-2023 a las 06:23:58
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `toysnt`
--

--
-- Volcado de datos para la tabla `techniques`
--

INSERT INTO `techniques` (`id`, `model`, `image`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Explosion', 'technique_image_Explosion.jpg', 'cosito', 200.00, '2023-09-20 11:21:23', '2023-09-20 11:21:23'),
(2, 'Ácido', 'technique_image_Ácido.jpg', 'es un pez que busca a otro pez por que se le perdió, que pesar', 201.00, '2023-09-20 11:21:51', '2023-09-20 11:21:51');

--
-- Volcado de datos para la tabla `toys`
--

INSERT INTO `toys` (`id`, `model`, `image`, `description`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'Barbi', 'toy_image_Barbi.jpg', 'Descripcion', 100.00, 16, '2023-09-20 11:20:43', '2023-09-20 08:57:17'),
(2, 'Ken', 'toy_image_Ken.jpg', 'Descripcion', 101.00, 20, '2023-09-20 11:21:04', '2023-09-20 08:53:18');

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `balance`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Camilo Palacio Restrepo', 'admin@gmail.com', 'admin', 150000.00, 'tampoco', NULL, '$2y$10$v84r7MzD/4vkAzRtbB53Re2lvYHiVGYHy0vwqbesAhwjhlxuSyx7m', NULL, '2023-09-20 11:18:35', '2023-09-20 11:18:35'),
(2, 'ejemplo', 'ejemplo@ejemplo.com', 'basic_user', 998294.99, 'ronca la esquina', NULL, '$2y$10$rxjrP70o5.vc/Gscv4TNoerdnFbh.17TF/n1BiUdlQSPLlHJ7IpsS', NULL, '2023-09-20 11:19:30', '2023-09-20 08:57:17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
