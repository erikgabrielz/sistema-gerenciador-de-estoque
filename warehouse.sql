-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/05/2025 às 21:01
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `warehouse`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `street` varchar(200) NOT NULL,
  `number` int(6) NOT NULL,
  `district` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `state_acronym` varchar(2) NOT NULL,
  `cep` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(4, 'Service pack');

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
-- Estrutura para tabela `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(14) NOT NULL,
  `address` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `defects`
--

CREATE TABLE `defects` (
  `id` int(11) NOT NULL,
  `defect` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(3, 'Sem aro');

-- --------------------------------------------------------

--
-- Estrutura para tabela `menu_options`
--

CREATE TABLE `menu_options` (
  `id` int(11) NOT NULL,
  `url` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(14, 'Galaxy M12');

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
(7, 1, '::1', 'd28403af373a31bfcb67bccf0dbd7e91a6a7fa6380a8fdbd77a75f544e9db02b', '2025-05-06 18:50:22', '2025-05-06 21:50:22'),
(8, 1, '::1', '9d81cbe73635b63f9abc9dec38352de9cea5e0933f798c285e74bc0bda510b3a', '2025-05-08 16:09:08', '2025-05-08 19:09:08'),
(11, 1, '::1', '880622a321f47346d268318014609aee280491cfb6241d4c6db9899617e5ff0a', '2025-05-22 17:49:01', '2025-05-22 20:49:01');

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
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `stock`
--

INSERT INTO `stock` (`id`, `brand`, `category`, `product`, `supplier`, `type`, `extra`, `price`, `quantity`) VALUES
(47, 3, 5, 6, 2, 2, 2, 75, 1),
(48, 3, 5, 8, 2, 2, 2, 75, 2),
(49, 4, 5, 11, 2, 2, 3, 80, 1),
(50, 3, 5, 12, 2, 2, 2, 65, 1),
(55, 3, 7, 13, 2, 1, 1, 35, 1);

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
(6, 'E Ink');

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
(2, 'Vinicius Staidel', 'vinistdl@gmail.com', 'vini', '$2y$10$XOcKwJ2L8yYZUpvSPmrZ/.dHFAiQIz2R8jirxHcbClmjvRxcHiUcO', 0, 1, '2025-04-11 01:52:51', '2025-04-24 17:57:37');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

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
-- Índices de tabela `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `defects`
--
ALTER TABLE `defects`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `extras`
--
ALTER TABLE `extras`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `menu_options`
--
ALTER TABLE `menu_options`
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
  ADD KEY `fk_supplier` (`supplier`);

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
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `defects`
--
ALTER TABLE `defects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `extras`
--
ALTER TABLE `extras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `menu_options`
--
ALTER TABLE `menu_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de tabela `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
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
  ADD CONSTRAINT `fk_type` FOREIGN KEY (`type`) REFERENCES `types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
