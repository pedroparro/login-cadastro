-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 06-Mar-2022 às 00:02
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `login`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_db`
--

CREATE TABLE `login_db` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `roles` int(1) NOT NULL,
  `tokenn` varchar(32) DEFAULT NULL,
  `statuss` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `login_db`
--

INSERT INTO `login_db` (`id`, `nome`, `email`, `senha`, `roles`, `tokenn`, `statuss`) VALUES
(1, 'Pedro', 'pedro@gmail.com', '$2y$10$Ev.Nag3elgF6SHcDLlibQeA.t2J4qdarIjmj0xP8SkBgClW16IApa', 1, 'LJ9S4Q9H', 1),
(2, 'Enzo', 'enzo@gmail.com', '$2y$10$B31mR8zwDpDrRpUVVaRKWOIQDzEOXTjE1rLZbKaVMrWjTaer7l0Jm', 2, 'QGL8IUOD', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `login_db`
--
ALTER TABLE `login_db`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `tokenn` (`tokenn`),
  ADD KEY `users_adm` (`roles`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `login_db`
--
ALTER TABLE `login_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
