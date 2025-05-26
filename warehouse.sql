-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql210.ezyro.com
-- Tempo de geração: 25/05/2025 às 21:18
-- Versão do servidor: 10.6.19-MariaDB
-- Versão do PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ezyro_38718018_warehouse`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `brands`
--

INSERT INTO `brands` (`id`, `brand`) VALUES
(3, 'Gold Edition'),
(4, 'Service pack'),
(6, 'JK digital displays'),
(7, 'wez parts'),
(8, 'sunlong'),
(9, 'original china');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(5, 'Frontal'),
(6, 'Sub-placa'),
(7, 'Bateria'),
(8, 'Tampa traseira'),
(9, 'Aro'),
(10, 'Chassi'),
(14, 'CarcaÃ§a'),
(15, 'Placa-mÃ£e'),
(16, 'CÃ¢mera');

-- --------------------------------------------------------

--
-- Estrutura para tabela `extras`
--

CREATE TABLE `extras` (
  `id` int(11) NOT NULL,
  `extra` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `extras`
--

INSERT INTO `extras` (`id`, `extra`) VALUES
(1, 'NÃ£o se aplica'),
(2, 'Com aro'),
(3, 'Sem aro'),
(4, 'preto'),
(5, 'branco'),
(6, 'silver'),
(7, 'azul');

-- --------------------------------------------------------

--
-- Estrutura para tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `products`
--

INSERT INTO `products` (`id`, `product`) VALUES
(2, 'Redmi note 11'),
(3, 'Redmi 10C'),
(4, 'iPhone 12'),
(5, 'iPhone 11'),
(6, 'Redmi 9A'),
(8, 'Redmi 12c'),
(11, 'Motorola One Fusion'),
(12, 'Redmi 13C'),
(13, 'Galaxy A20S'),
(14, 'Galaxy M12'),
(15, 'Xiaomi Mi 9T'),
(16, 'iPhone 13 pro max'),
(17, 'iPhone 11 pro'),
(18, 'iPhone 11'),
(19, 'iPhone 11 pro max'),
(20, 'iPhone XR'),
(22, 'iPhone 12'),
(23, 'iPhone 12 pro max'),
(24, 'iPhone 13'),
(25, 'Galaxy A12'),
(26, 'Galaxy A05'),
(27, 'Galaxy A01'),
(28, 'Galaxy A03'),
(29, 'Galaxy A04'),
(30, 'samsung a03 core'),
(31, 'Galaxy A01 core'),
(32, 'Galaxy A10'),
(33, 'Galaxy A14 5G'),
(34, 'Galaxy A21S'),
(35, 'Galaxy A13 4G'),
(36, 'Galaxy A13 5G'),
(37, 'Galaxy A32 4g '),
(38, 'Galaxy A02'),
(39, 'Galaxy A22 4G'),
(40, 'Galaxy A15'),
(41, 'Galaxy A31'),
(42, 'Galaxy A30s'),
(43, 'Galaxy A30'),
(44, 'Galaxy A11'),
(45, 'Galaxy A10s'),
(46, 'Redmi 14C'),
(48, 'Redmi A1'),
(50, 'Redmi 9A'),
(51, 'Redmi 10'),
(52, 'Redmi 13C'),
(53, 'Redmi 10C'),
(54, 'Redmi 9'),
(55, 'Redmi Note 8'),
(56, 'Redmi 12C'),
(57, 'Redmi Note 12'),
(58, 'RedmiNote 9'),
(59, 'Redmi 12'),
(60, 'Moto E32'),
(61, 'Moto G8 Power'),
(62, 'Moto E20'),
(63, 'Moto E40'),
(64, 'Moto E6S'),
(65, 'Moto G8 Plus'),
(66, 'LG K12'),
(67, 'LG K41S'),
(68, 'LG K51'),
(69, 'LG K20'),
(70, 'LG K11'),
(71, 'LG K22'),
(72, 'LG K52'),
(73, 'LG K9'),
(74, 'LG K50S'),
(75, 'LG K8 PLUS'),
(76, 'Moto G23 13'),
(77, 'Moto G9 PLAY/E 7 PLUS'),
(78, 'Moto E13'),
(79, 'Motorola One Fusion'),
(80, 'Moto E22'),
(81, 'Moto G04S'),
(82, 'Moto G6 PLAY'),
(83, 'Moto G22'),
(84, 'Moto G8 Power Lite'),
(85, 'Moto G73'),
(86, 'Galaxy A14 4G'),
(87, 'Galaxy J6 Preto'),
(88, 'Galaxy J4 dourado'),
(89, 'Galaxy J5 Prime Preto'),
(90, 'Galaxy A20'),
(91, 'Galaxy J7 Branco'),
(92, 'Galaxy J8 Preto'),
(93, 'Galaxy J6 Plus/J4 Plus/J4 core'),
(94, 'Moto G14'),
(95, 'LG K62/K62 plus'),
(96, 'Realme C53'),
(97, 'Realme C55'),
(98, 'Redmi A3'),
(99, 'Redmi Note 10S'),
(100, 'Redmi 9T/POCO M3'),
(101, 'Redmi Note 11 4G '),
(102, 'Xiaomi MI A2'),
(103, 'Redmi 10 5G'),
(104, 'Redmi Note 7'),
(105, 'Redmi Note 10 5G'),
(106, 'IPhone 12/12 pro'),
(108, 'nao se aplica'),
(109, 'iPhone XS'),
(110, 'Galaxy J5'),
(111, 'Galaxy J5 Metal/J510');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `expire` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip`, `token`, `created`, `expire`) VALUES
(15, 3, '187.109.104.74', '2bbe0b85a0f14efa68a9571ca9512c761bcecc00b5ab3e4c929a27798bdfb821', '2025-04-30 17:35:10', '2025-05-01 00:35:10'),
(16, 1, '191.37.11.199', '7d0b791b39b66c988cfdd538c165622a8f56eb733b00bcd6ae847676b42e3e1c', '2025-05-04 23:16:28', '2025-05-05 06:16:28'),
(17, 1, '191.37.11.204', 'daeadf561ef8a60d05f1785abf23c02dd7e4b492d094919d8c72db5e045fcd08', '2025-05-07 22:56:23', '2025-05-08 05:56:23'),
(18, 1, '191.37.11.204', 'e0c79edb3944d339608fbaebab33e7d141837a46382c25608c337c705534c0ad', '2025-05-09 23:59:04', '2025-05-10 06:59:04'),
(19, 1, '191.37.8.253', '7027b210c10068690c5e5d661db8b796497d3d96aaad4db253988da3ffaf3942', '2025-05-12 12:29:34', '2025-05-12 19:29:34'),
(23, 3, '187.109.104.74', '924ceff552c46f6625c698e5f62c7881e316affe3313e20aac4db71ff6b06614', '2025-05-14 00:50:00', '2025-05-14 07:50:00'),
(24, 3, '191.37.11.204', '51c88438b7cc6d7869faf9709a5cd39ede7fd04d4bf5673f446e113eca1f04bf', '2025-05-14 00:50:08', '2025-05-14 07:50:08'),
(26, 1, '191.37.8.253', 'db8109a0463f2edb643fcb3684958c47666e8e99b038d4d8402bf394ae650a28', '2025-05-21 16:53:19', '2025-05-21 23:53:19'),
(27, 2, '191.37.11.200', 'da230bf58443f7d72a12cf4a7856a600a79783e625ffe015cbee1aae6f978be1', '2025-05-22 23:06:30', '2025-05-23 06:06:30'),
(28, 1, '191.37.11.196', 'c059d01f1ded64f1a9b5e398dd517161518fd5bfeef019232eed8866f78eaa81', '2025-05-24 00:15:58', '2025-05-24 07:15:58'),
(29, 2, '191.37.11.200', '8b19f56fa5371e1701c0ffc6cfd6a0ff45ff8b9087cdf0e3e448c99ac209a2fb', '2025-05-24 16:40:09', '2025-05-24 23:40:09'),
(30, 2, '191.37.11.200', '55eed9842f42edec608b1d3987abe0ec61d8859f27bfb7ff80fbefa2e519ed00', '2025-05-24 20:53:17', '2025-05-25 03:53:17'),
(32, 2, '177.51.45.124', '9bd861171f3667b0f33686dd74647e7ad66cf7127cd26201effc51eeed070d6b', '2025-05-25 17:28:33', '2025-05-26 00:28:33'),
(33, 2, '191.37.11.200', 'b2deee6fbe18bcfb57c61956e4c9a77c2da653b24e144e087fe07bd2cdedfdee', '2025-05-25 21:51:23', '2025-05-26 04:51:23');

-- --------------------------------------------------------

--
-- Estrutura para tabela `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `brand` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `supplier` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `extra` int(11) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `stock`
--

INSERT INTO `stock` (`id`, `brand`, `category`, `product`, `supplier`, `type`, `extra`, `price`, `quantity`, `user_created`) VALUES
(47, 3, 5, 6, 2, 2, 2, 75, 1, 2),
(48, 3, 5, 8, 2, 2, 2, 75, 2, 2),
(49, 4, 5, 11, 2, 2, 3, 80, 1, 2),
(50, 3, 5, 12, 2, 2, 2, 70, 2, 2),
(56, 3, 7, 14, 2, 1, 1, 35, 1, 2),
(59, 3, 7, 13, 2, 1, 1, 35, 2, 2),
(60, 3, 5, 16, 2, 3, 3, 450, 1, 2),
(61, 6, 5, 18, 3, 2, 3, 150, 1, 2),
(62, 3, 5, 19, 2, 3, 3, 200, 1, 2),
(63, 6, 5, 17, 3, 3, 3, 220, 1, 2),
(64, 3, 5, 18, 2, 3, 3, 140, 3, 2),
(65, 3, 5, 24, 2, 3, 3, 300, 1, 2),
(66, 3, 5, 23, 2, 3, 3, 450, 1, 2),
(67, 3, 5, 20, 2, 2, 3, 140, 3, 2),
(68, 4, 5, 25, 3, 2, 2, 120, 1, 2),
(69, 4, 5, 27, 2, 2, 2, 100, 1, 2),
(70, 4, 5, 26, 2, 2, 2, 80, 1, 2),
(71, 4, 5, 25, 2, 2, 2, 80, 2, 2),
(72, 3, 5, 45, 2, 2, 2, 80, 1, 2),
(73, 3, 5, 45, 2, 2, 2, 80, 1, 2),
(74, 3, 5, 44, 2, 2, 2, 80, 1, 2),
(75, 3, 5, 43, 2, 3, 2, 130, 1, 2),
(76, 3, 5, 42, 2, 3, 2, 135, 1, 2),
(77, 3, 5, 40, 2, 3, 2, 180, 1, 2),
(78, 3, 5, 41, 2, 3, 2, 190, 1, 2),
(79, 3, 5, 37, 2, 3, 2, 190, 1, 2),
(80, 3, 5, 37, 2, 3, 2, 190, 1, 2),
(81, 3, 5, 39, 2, 3, 2, 180, 1, 2),
(82, 3, 5, 38, 2, 2, 2, 60, 1, 2),
(83, 3, 5, 36, 2, 2, 2, 150, 1, 2),
(84, 3, 5, 35, 2, 2, 2, 140, 1, 2),
(85, 3, 5, 34, 2, 2, 2, 75, 1, 2),
(86, 3, 5, 34, 2, 2, 2, 75, 1, 2),
(87, 3, 5, 34, 2, 2, 2, 75, 1, 2),
(88, 3, 5, 33, 2, 2, 2, 75, 1, 2),
(89, 3, 5, 32, 2, 2, 2, 75, 2, 2),
(90, 3, 5, 25, 2, 2, 2, 75, 1, 2),
(91, 3, 5, 31, 2, 2, 2, 75, 2, 2),
(92, 3, 5, 30, 2, 2, 2, 65, 2, 2),
(93, 3, 5, 28, 2, 2, 2, 65, 4, 2),
(94, 3, 5, 29, 2, 2, 2, 75, 2, 2),
(95, 8, 5, 59, 4, 2, 2, 120, 1, 2),
(96, 3, 5, 58, 2, 2, 2, 75, 2, 2),
(97, 4, 5, 57, 3, 3, 2, 350, 1, 2),
(98, 4, 5, 50, 3, 2, 2, 130, 1, 2),
(99, 4, 5, 48, 3, 2, 2, 120, 2, 2),
(100, 4, 5, 46, 3, 2, 2, 150, 1, 2),
(101, 3, 5, 56, 2, 2, 2, 80, 2, 2),
(102, 3, 5, 55, 2, 2, 2, 75, 2, 2),
(103, 3, 5, 54, 2, 2, 2, 75, 1, 2),
(104, 3, 5, 53, 2, 2, 2, 80, 1, 2),
(105, 3, 5, 52, 2, 2, 2, 80, 2, 2),
(106, 3, 5, 50, 2, 2, 2, 75, 2, 2),
(107, 3, 5, 51, 2, 2, 2, 85, 1, 2),
(108, 3, 5, 64, 2, 2, 2, 70, 1, 2),
(109, 3, 5, 63, 2, 2, 2, 60, 1, 2),
(110, 3, 5, 62, 2, 2, 2, 75, 1, 2),
(111, 3, 5, 61, 2, 2, 2, 120, 1, 2),
(112, 3, 5, 60, 2, 2, 2, 60, 1, 2),
(113, 3, 5, 65, 2, 2, 2, 90, 1, 2),
(115, 3, 5, 75, 2, 2, 2, 70, 1, 2),
(116, 3, 5, 74, 2, 2, 2, 85, 1, 2),
(117, 3, 5, 73, 2, 2, 2, 80, 1, 2),
(118, 3, 5, 72, 2, 2, 2, 80, 2, 2),
(119, 3, 5, 71, 2, 2, 2, 70, 1, 2),
(120, 3, 5, 70, 2, 2, 2, 65, 1, 2),
(121, 4, 5, 69, 2, 2, 2, 75, 1, 2),
(122, 4, 5, 68, 2, 2, 2, 90, 2, 2),
(123, 4, 5, 67, 2, 2, 2, 75, 1, 2),
(124, 4, 5, 66, 2, 2, 2, 75, 1, 2),
(125, 4, 5, 63, 2, 2, 3, 60, 1, 2),
(126, 4, 5, 85, 2, 2, 3, 75, 1, 2),
(127, 4, 5, 84, 2, 2, 3, 120, 1, 2),
(128, 4, 5, 83, 2, 2, 3, 65, 1, 2),
(129, 4, 5, 82, 2, 2, 3, 70, 1, 2),
(130, 4, 5, 81, 2, 2, 3, 80, 1, 2),
(131, 4, 5, 80, 2, 2, 3, 65, 1, 2),
(132, 4, 5, 79, 2, 2, 3, 65, 2, 2),
(133, 4, 5, 78, 2, 2, 3, 65, 1, 2),
(134, 4, 5, 77, 2, 2, 3, 65, 1, 2),
(135, 4, 5, 77, 4, 2, 2, 90, 1, 2),
(136, 4, 5, 76, 2, 2, 3, 65, 2, 2),
(137, 9, 5, 26, 3, 2, 3, 120, 1, 2),
(138, 4, 5, 26, 2, 2, 3, 65, 1, 2),
(139, 4, 5, 25, 4, 2, 3, 65, 1, 2),
(140, 4, 5, 25, 2, 2, 3, 65, 3, 2),
(141, 9, 5, 40, 5, 3, 3, 320, 1, 2),
(142, 9, 5, 28, 3, 2, 3, 85, 1, 2),
(143, 9, 5, 25, 3, 2, 3, 100, 2, 2),
(144, 9, 5, 32, 3, 2, 3, 85, 1, 2),
(145, 4, 5, 29, 2, 2, 3, 75, 1, 2),
(146, 4, 5, 43, 2, 2, 3, 90, 1, 2),
(147, 4, 5, 30, 2, 2, 3, 60, 2, 2),
(148, 4, 5, 13, 2, 2, 3, 55, 1, 2),
(149, 4, 5, 35, 2, 2, 3, 70, 1, 2),
(150, 4, 5, 33, 2, 2, 3, 80, 1, 2),
(151, 9, 5, 28, 3, 2, 3, 100, 1, 2),
(152, 4, 5, 32, 2, 2, 3, 75, 1, 2),
(153, 4, 5, 92, 2, 3, 3, 160, 1, 2),
(154, 4, 5, 91, 2, 3, 3, 150, 1, 2),
(155, 4, 5, 90, 2, 2, 3, 70, 1, 2),
(156, 4, 5, 89, 2, 2, 3, 70, 1, 2),
(157, 4, 5, 88, 2, 3, 3, 140, 1, 2),
(158, 4, 5, 87, 2, 2, 3, 80, 1, 2),
(159, 4, 5, 86, 2, 2, 3, 75, 2, 2),
(160, 4, 5, 93, 2, 2, 3, 70, 1, 2),
(161, 3, 5, 95, 2, 2, 2, 90, 1, 2),
(162, 3, 5, 94, 2, 2, 2, 90, 2, 2),
(163, 9, 5, 71, 3, 2, 3, 100, 1, 2),
(164, 7, 5, 96, 4, 2, 2, 140, 1, 2),
(165, 7, 5, 97, 4, 2, 2, 140, 1, 2),
(166, 4, 5, 52, 2, 2, 3, 70, 3, 2),
(167, 4, 5, 51, 2, 2, 3, 70, 1, 2),
(168, 9, 5, 46, 3, 2, 3, 135, 1, 2),
(169, 4, 5, 46, 2, 2, 3, 80, 1, 2),
(170, 4, 5, 6, 2, 2, 3, 70, 3, 2),
(171, 4, 5, 56, 2, 2, 3, 80, 3, 2),
(172, 4, 5, 48, 4, 2, 3, 70, 1, 2),
(173, 4, 5, 104, 2, 2, 3, 70, 1, 2),
(174, 4, 5, 103, 2, 2, 3, 65, 1, 2),
(175, 4, 5, 103, 4, 2, 3, 65, 1, 2),
(176, 4, 5, 102, 2, 2, 3, 65, 1, 2),
(177, 4, 5, 101, 2, 2, 3, 75, 2, 2),
(178, 4, 5, 101, 4, 3, 3, 250, 1, 2),
(179, 4, 5, 100, 2, 2, 3, 90, 2, 2),
(180, 4, 5, 99, 2, 3, 3, 135, 1, 2),
(181, 4, 5, 98, 2, 2, 3, 75, 1, 2),
(182, 4, 5, 105, 3, 2, 3, 110, 1, 2),
(183, 9, 5, 105, 5, 2, 3, 150, 1, 2),
(184, 3, 5, 106, 2, 3, 3, 180, 1, 2),
(185, 3, 7, 77, 2, 1, 1, 40, 1, 2),
(186, 9, 7, 12, 2, 1, 1, 60, 1, 2),
(187, 3, 7, 51, 2, 12, 1, 70, 1, 2),
(188, 3, 7, 100, 2, 11, 1, 70, 1, 2),
(189, 3, 7, 58, 2, 10, 1, 50, 2, 2),
(190, 3, 7, 55, 2, 9, 1, 50, 2, 2),
(191, 3, 7, 108, 2, 8, 1, 40, 1, 2),
(192, 3, 7, 48, 2, 7, 1, 40, 1, 2),
(193, 3, 7, 20, 2, 1, 1, 70, 1, 2),
(194, 3, 7, 22, 2, 1, 1, 75, 1, 2),
(195, 3, 7, 18, 2, 1, 1, 100, 1, 2),
(196, 3, 7, 109, 2, 1, 1, 110, 1, 2),
(197, 3, 7, 110, 2, 1, 1, 60, 1, 2),
(198, 3, 7, 73, 2, 1, 1, 60, 1, 2),
(199, 3, 7, 111, 2, 1, 1, 65, 1, 2),
(200, 3, 7, 30, 2, 1, 1, 65, 1, 2),
(201, 3, 7, 82, 2, 1, 1, 50, 1, 2),
(202, 3, 7, 61, 2, 1, 1, 65, 1, 2),
(203, 3, 8, 18, 2, 1, 4, 20, 2, 2),
(204, 3, 8, 24, 2, 1, 5, 20, 1, 2),
(205, 3, 8, 23, 2, 1, 6, 35, 1, 2),
(206, 3, 8, 57, 2, 1, 7, 40, 1, 2),
(207, 3, 8, 55, 6, 1, 4, 40, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `supplier` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier`) VALUES
(1, 'NÃ£o se aplica'),
(2, 'King Parts'),
(3, 'Tussolini (TJ Parts)'),
(4, 'Planeta Cell'),
(5, 'Mercado Livre'),
(6, 'Shopee');

-- --------------------------------------------------------

--
-- Estrutura para tabela `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `types`
--

INSERT INTO `types` (`id`, `type`) VALUES
(1, 'NÃ£o se aplica'),
(2, 'LCD'),
(3, 'OLED'),
(4, 'AMOLED'),
(5, 'QLED'),
(6, 'E Ink'),
(7, 'BN31'),
(8, 'BN36'),
(9, 'BN46'),
(10, 'BN54'),
(11, 'BN62'),
(12, 'BN63');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user` varchar(4) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user`, `password`, `level`, `status`, `created`, `modified`) VALUES
(1, 'Erik Gabriel', 'farmingsimulatorpc@gmail.com', 'erik', '$2y$10$uJYEYzeDEH6ygF4xwcj3E.vpnGROVgjGpbn9HdHsxOLmAPkgL.fmG', 1, 1, '2025-04-10 22:49:21', '2025-04-25 00:23:11'),
(2, 'Vinicius Staidel', 'vinistdl@gmail.com', 'vini', '$2y$10$XOcKwJ2L8yYZUpvSPmrZ/.dHFAiQIz2R8jirxHcbClmjvRxcHiUcO', 0, 1, '2025-04-11 01:52:51', '2025-04-24 17:57:37'),
(3, 'Diego', 'diegomichalowski18@gmail.com', 'dimi', '$2y$10$hXKBcgHx43vIihhEhlUy5O2efJNwD9r1/gWGHXi1tCyp/j2MUt2Cu', 0, 1, '2025-04-30 17:30:38', '2025-05-14 00:50:23');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `extras`
--
ALTER TABLE `extras`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices de tabela `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_brand` (`brand`),
  ADD KEY `fk_category` (`category`),
  ADD KEY `fk_product` (`product`),
  ADD KEY `fk_type` (`type`),
  ADD KEY `fk_extra` (`extra`),
  ADD KEY `fk_supplier` (`supplier`),
  ADD KEY `fk_user` (`user_created`);

--
-- Índices de tabela `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `extras`
--
ALTER TABLE `extras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de tabela `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT de tabela `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk_brand` FOREIGN KEY (`brand`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `fk_extra` FOREIGN KEY (`extra`) REFERENCES `extras` (`id`),
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_supplier` FOREIGN KEY (`supplier`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `fk_type` FOREIGN KEY (`type`) REFERENCES `types` (`id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_created`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
