-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/05/2025 às 03:03
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

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
-- Estrutura para tabela `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `state` varchar(100) NOT NULL,
  `acronym` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `states`
--

INSERT INTO `states` (`id`, `state`, `acronym`) VALUES
(1, 'Rondônia', 'RO'),
(2, 'Acre', 'AC'),
(3, 'Roraima', 'RR'),
(4, 'Pará', 'PA'),
(5, 'Amapá', 'AP'),
(6, 'Amazonas', 'AM'),
(7, 'Tocantins', 'TO'),
(8, 'Maranhão', 'MA'),
(9, 'Piauí', 'PI'),
(10, 'Ceará', 'CE'),
(11, 'Rio Grande do Norte', 'RN'),
(12, 'Paraíba', 'PB'),
(13, 'Pernambuco', 'PE'),
(14, 'Alagoas', 'AL'),
(15, 'Sergipe', 'SE'),
(16, 'Bahia', 'BA'),
(17, 'Minas Gerais', 'MG'),
(18, 'Espírito Santo', 'ES'),
(19, 'Rio de Janeiro', 'RJ'),
(20, 'São Paulo', 'SP'),
(21, 'Paraná', 'PR'),
(22, 'Santa Catarina', 'SC'),
(23, 'Rio Grande do Sul', 'RS'),
(24, 'Mato Grosso do Sul', 'MS'),
(25, 'Mato Grosso', 'MT'),
(26, 'Goiás', 'GO'),
(27, 'Distrito Federal', 'DF');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
