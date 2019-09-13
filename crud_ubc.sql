-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Set-2019 às 02:25
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud_ubc`
--
CREATE DATABASE IF NOT EXISTS `crud_ubc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `crud_ubc`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(4) NOT NULL,
  `nm_curso` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nm_curso`) VALUES
(1, 'Administracao'),
(2, 'Pedagogia'),
(3, 'Corte e Costura');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `id` int(4) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `flg_aluno` tinyint(1) NOT NULL DEFAULT 0,
  `id_curso` int(10) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `flg_prof` tinyint(1) NOT NULL DEFAULT 0,
  `id_titulo` int(4) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `tipo_tel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id`, `nome`, `cpf`, `flg_aluno`, `id_curso`, `email`, `flg_prof`, `id_titulo`, `telefone`, `tipo_tel`) VALUES
(49, 'Professor 01', '123.112.212-12', 0, 0, 'prof01@gmail.com', 1, 1, '4875-1146', 'Residencial'),
(52, 'Professor 02', '255.681.458-71', 0, 0, 'prof02@hotmail.com', 1, 2, '', ''),
(53, 'Aluno 01', '320.512.486-11', 1, 3, 'aluno01@gmail.com', 0, 0, '4721-0000', 'Residencial'),
(56, 'Aluno 02', '324.242.334-32', 1, 2, 'aluno02@hotmail.com', 1, 1, '97545-8456', 'Celular'),
(60, 'Aluno 03', '134.556.189-48', 1, 2, 'aluno03@outlook.com', 0, 0, '', ''),
(61, 'Professor 03', '956.132.481-22', 1, 3, 'prof03@ig.com.br', 1, 2, '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `titulos`
--

CREATE TABLE `titulos` (
  `id_titulo` int(4) NOT NULL,
  `nm_titulo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `titulos`
--

INSERT INTO `titulos` (`id_titulo`, `nm_titulo`) VALUES
(1, 'Mestre'),
(2, 'Doutor(a)');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Índices para tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_titulo` (`id_titulo`);

--
-- Índices para tabela `titulos`
--
ALTER TABLE `titulos`
  ADD PRIMARY KEY (`id_titulo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de tabela `titulos`
--
ALTER TABLE `titulos`
  MODIFY `id_titulo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
