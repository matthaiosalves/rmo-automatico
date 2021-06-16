-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Jun-2021 às 07:41
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `rmo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `controls`
--

CREATE TABLE `controls` (
  `id` int(30) NOT NULL,
  `nick` varchar(250) NOT NULL DEFAULT '0',
  `link` varchar(250) NOT NULL DEFAULT '0',
  `tempo_inicio` time NOT NULL DEFAULT '00:00:00',
  `tempo_fim` time NOT NULL DEFAULT '00:00:00',
  `token` varchar(250) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `moviments`
--

CREATE TABLE `moviments` (
  `id` int(30) NOT NULL,
  `nick` varchar(250) DEFAULT NULL,
  `link` varchar(300) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Ativo',
  `tempo_inicio` time DEFAULT NULL,
  `tempo_final` time DEFAULT NULL,
  `tempo_total` time DEFAULT NULL,
  `verificacao` tinyint(1) DEFAULT 0,
  `entrada` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `registros`
--

CREATE TABLE `registros` (
  `id` int(30) NOT NULL,
  `nick` varchar(250) NOT NULL,
  `entrada` time NOT NULL,
  `saida` time NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nick` varchar(250) NOT NULL DEFAULT '0',
  `token` varchar(250) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nick`, `token`) VALUES
(1, 'Paterneck', 'd7e32d619fd2d0972df994c5ece0388a');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `controls`
--
ALTER TABLE `controls`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `moviments`
--
ALTER TABLE `moviments`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `controls`
--
ALTER TABLE `controls`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `moviments`
--
ALTER TABLE `moviments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de tabela `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
