-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2023 a las 22:16:26
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbdemo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `estado` int(1) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `fecha_hora` datetime(6) NOT NULL,
  `navegador` varchar(50) NOT NULL,
  `sistema_operativo` varchar(100) NOT NULL,
  `validation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `logs`
--

INSERT INTO `logs` (`id`, `email`, `estado`, `ip`, `fecha_hora`, `navegador`, `sistema_operativo`, `validation`) VALUES
(5, 'asd@gmail.com', 1, '::1', '2023-06-05 23:50:38.000000', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', 'Windows 10', 'Login Exitoso'),
(6, 'asd@gmail.com', 1, '::1', '2023-06-05 23:57:45.000000', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', 'Windows 10', 'Login Exitoso'),
(7, 'asd@gmail.com', 1, '::1', '2023-06-06 00:16:41.000000', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', 'Windows 10', 'Login Exitoso'),
(8, 'admin@gmail.com', 1, '::1', '2023-06-06 00:45:17.000000', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', 'Windows 10', 'Login Exitoso'),
(9, 'admin@gmail.com', 1, '::1', '2023-06-06 00:45:45.000000', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', 'Windows 10', 'Login Exitoso'),
(10, 'car@gmail.com', 1, '127.0.0.1', '2023-06-09 13:24:07.000000', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:109.0)', 'Windows 7', 'Login Exitoso'),
(11, 'car@gmail.com', 1, '127.0.0.1', '2023-06-09 13:30:31.000000', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:109.0)', 'Windows 7', 'Login Exitoso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(150) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `role`) VALUES
(1, 'slackm_@hotmail.com', 'Carlos Manuel Nieto Vasquez', '$2y$10$k23T9gXY14xRfCMLp/mFWu0qFJsMsAyeINXfZ1hEsKrzS5JaO74XS', 'usuario'),
(3, 's@gmail.com', 'Carlos Manuel Nieto Vasquez', '$2y$10$ouTJDB1oDa3hA75QSHZwAeA2zk6SiGcHC62qA5NupvWuTLHQnu9HW', 'usuario'),
(4, 'asd@gmail.com', 'fer', '$2y$10$GHM2B4Ij1lzrWkLLl6Hbg.BCL3k5CsGtpzJwdZFLGsmmmh3no24Q6', 'usuario'),
(5, 'admin@gmail.com', 'Administrador', '$2y$10$ifKdMfFPfULBfpP1PYG/3.80RU8adPeMw69nf4a99NKIsSne3iSXS', 'admin'),
(6, 'car@gmail.com', 'carlosdw', '$2y$10$FTKxaHojkkLT8EAqusKsK.a9e.bNVS5rytTdkpV/AntJLIYQYSVFi', 'admin'),
(7, '123@gmail.com', '1231123', '$2y$10$U0aEBscu6MrmaCovVdK2fuU58QPOD6SDCtEFrKJQSHPL/7rUI477G', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
