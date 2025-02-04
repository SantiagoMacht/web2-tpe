-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2024 a las 16:45:20
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `formula1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `CategoryId` int(11) NOT NULL,
  `type` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `team` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`CategoryId`, `type`, `team`) VALUES
(1, 'Gorras', ''),
(2, 'Remeras', ''),
(3, 'Buzos', ''),
(4, 'Camperas', ''),
(5, 'Chombas', ''),
(6, 'categoria6', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `image` varchar(300) NOT NULL,
  `name` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `price` double NOT NULL,
  `stock` int(11) NOT NULL,
  `CategoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`product_id`, `image`, `name`, `price`, `stock`, `CategoryId`) VALUES
(101, '', 'Gorra Red Bull', 100, 10, 1),
(102, '', 'Gorra Aston Martin', 100, 10, 1),
(103, '', 'Gorra Ferrari', 100, 10, 1),
(104, '', 'Gorra Alpha Tauri', 100, 10, 1),
(105, '', 'Gorra Mclaren', 100, 10, 1),
(200, '', 'Remera Mercedes', 100, 10, 2),
(201, '', 'Remera Redbull', 100, 10, 2),
(202, '', 'Remera Aston martin', 100, 10, 2),
(203, '', 'Remera Ferrari', 100, 10, 2),
(204, '', 'Remera Alpha tauri', 100, 10, 2),
(205, '', 'Remera Mclaren', 100, 10, 2),
(300, '', 'Buzo Mercedessssssssssssssss', 100, 10, 1),
(301, '', 'Buzo Redbull', 100, 10, 3),
(302, '', 'Buzo Aston martin', 100, 10, 3),
(303, '', 'Buzo Ferrari', 100, 10, 3),
(304, '', 'Buzo Alpha tauri', 100, 10, 3),
(305, '', 'Buzo Mclaren', 100, 10, 3),
(400, '', 'Campera Mercedes', 100, 10, 4),
(401, '', 'Campera Redbull', 100, 10, 4),
(402, '', 'Campera Aston martin', 100, 10, 4),
(403, '', 'Campera Ferrari', 100, 10, 4),
(404, '', 'Campera Alpha tauri', 100, 10, 4),
(405, '', 'Campera Mclaren', 100, 10, 4),
(500, '', 'Chomba Mercedes', 100, 10, 5),
(501, '', 'Chomba Redbull', 100, 10, 5),
(502, '', 'Chomba Aston martin', 100, 10, 5),
(503, '', 'Chomba Ferrari', 100, 10, 5),
(504, '', 'Chomba Alpha tauri', 100, 10, 5),
(505, '', 'Chomba Mclaren', 100, 10, 5),
(506, '', 'prueba', 1234, 10, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `email_user`, `password`, `Nombre`) VALUES
(2, '[santi@gmail.com]', '123', 'santi'),
(3, 'admin@gmail.com', '1234', 'santiii'),
(4, 'admin@gmail.com', '1234', 'santiii'),
(5, 'adminnn@gmail.com', '$2y$10$zXRWXE/9a2MoloaDCRMk1uIG5mBSB8PmbHb5LjEME3KdiOT2adD46', 'santiii232');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryId`),
  ADD UNIQUE KEY `CategoryId` (`CategoryId`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `CategoryId` (`CategoryId`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=538;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
