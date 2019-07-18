-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Jul-2019 às 18:54
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartconnect`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(32) CHARACTER SET latin1 NOT NULL,
  `nome` varchar(255) CHARACTER SET latin1 NOT NULL,
  `apelido` varchar(255) CHARACTER SET latin1 NOT NULL,
  `hierarquia` text CHARACTER SET latin1 NOT NULL,
  `zonas` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `nome`, `apelido`, `hierarquia`, `zonas`) VALUES
(1, 'goncalo.barros', 'e10adc3949ba59abbe56e057f20f883e', 'Gonçalo', 'Barros', 'admin', 'todas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `userszonas`
--

CREATE TABLE `userszonas` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idzona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_mysql561_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) CHARACTER SET latin1 NOT NULL,
  `sobrenome` text CHARACTER SET latin1 NOT NULL,
  `hierarquia` text CHARACTER SET latin1 NOT NULL,
  `login` varchar(255) CHARACTER SET latin1 NOT NULL,
  `senha` varchar(32) CHARACTER SET latin1 NOT NULL,
  `created` date NOT NULL,
  `intropage` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_mysql561_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `sobrenome`, `hierarquia`, `login`, `senha`, `created`, `intropage`) VALUES
(1, 'Miguel', 'Dias', '0', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', 0),
(2, 'Adriele', 'Santos', '1', 'nana', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', 1),
(3, 'Goncalo', 'Barros', '1', 'aa', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `zonas`
--

CREATE TABLE `zonas` (
  `id` int(11) NOT NULL,
  `nome` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `q1` int(11) NOT NULL,
  `q2` int(11) NOT NULL,
  `q3` int(11) NOT NULL,
  `q4` int(11) NOT NULL,
  `salaestar` int(11) NOT NULL,
  `salajantar` int(11) NOT NULL,
  `cozinha` int(11) NOT NULL,
  `hall` int(11) NOT NULL,
  `roupeiro` int(11) NOT NULL,
  `salaarmas` int(11) NOT NULL,
  `wc` int(11) NOT NULL,
  `escritorio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Extraindo dados da tabela `zonas`
--

INSERT INTO `zonas` (`id`, `nome`, `q1`, `q2`, `q3`, `q4`, `salaestar`, `salajantar`, `cozinha`, `hall`, `roupeiro`, `salaarmas`, `wc`, `escritorio`) VALUES
(1, 'joao', 0, 1, 0, 1, 1, 1, 1, 1, 0, 0, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userszonas`
--
ALTER TABLE `userszonas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idzona` (`idzona`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userszonas`
--
ALTER TABLE `userszonas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `zonas`
--
ALTER TABLE `zonas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
