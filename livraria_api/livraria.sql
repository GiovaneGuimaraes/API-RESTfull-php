-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Abr-2023 às 04:03
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `livraria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE `autor` (
  `nome` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`nome`, `id`) VALUES
('Ronaldo', 24),
('Giovane', 27),
('Marquinhos', 29),
('Marcola', 30),
('Fernandinho', 31),
('Saulaum', 32),
('Felipopi', 33),
('Leozao', 34),
('Niltingos', 35),
('Trojis', 36),
('Pedroca', 37);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `idlivro` int(11) NOT NULL,
  `nomelivro` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `ano` year(4) NOT NULL,
  `idPessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`idlivro`, `nomelivro`, `genero`, `ano`, `idPessoa`) VALUES
(12, 'As aventuras de Pedroca', 'TERROR', 2020, 24),
(13, 'As aventuras de Bombom', 'TERROR', 2020, 24),
(14, 'it a coisa', 'TERROR', 2021, 27),
(16, 'Perceu jaquison', 'COMEDIA', 2010, 35),
(18, 'Bombomzin', 'COMEDIA', 2010, 29),
(19, 'Codigo Valoroso', 'ROMANCE', 2003, 27),
(20, 'Contra Atacantes 2', 'AÇÃO', 2012, 37),
(21, 'Contra Atacantes 1', 'AÇÃO', 2013, 37),
(22, 'Ying e Yang - uma historia de amor', 'ROMANCE', 2023, 36),
(23, 'it a coisa 2 ', 'TERROR', 2023, 35);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`idlivro`),
  ADD KEY `idAutor` (`idPessoa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `idlivro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `livro_ibfk_1` FOREIGN KEY (`idPessoa`) REFERENCES `autor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
