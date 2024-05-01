-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/02/2024 às 21:38
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
-- Banco de dados: `crud_clientes`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp(),
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `foto`, `email`, `senha`, `telefone`, `nascimento`, `data`, `admin`) VALUES
(1, 'Lucas santos', NULL, 'lucas@gmail.com', '12345', '95981014262', '1995-06-06', '2024-02-21 10:24:02', 1),
(8, 'Miller santos silva', NULL, 'silva@gmail.com', '', '95991547578', '1990-04-05', '2024-02-22 15:49:27', NULL),
(3, 'Pedro Costa Brito', NULL, 'pedro@gmail.com', '', '95991526547', '1998-12-02', '2024-02-21 14:12:46', NULL),
(4, 'Gustavo Brito', NULL, 'brito@gmail.com', '', '95991145758', '1998-05-05', '2024-02-21 14:16:08', NULL),
(5, 'Bruno da silva', NULL, 'bruno@gmail.com', '', '95991145758', '1997-05-05', '2024-02-21 14:38:48', NULL),
(7, 'Rodrigo Lacan', NULL, 'rodrigo@yahoo.com.br', '', '95991457894', '1998-05-21', '2024-02-22 10:10:45', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
