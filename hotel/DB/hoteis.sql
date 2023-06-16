-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Jun-2023 às 13:47
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
-- Banco de dados: `hoteis`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_produto`
--

CREATE TABLE `tabela_produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `quantpessoas` varchar(255) NOT NULL,
  `hotel` varchar(255) NOT NULL,
  `inicio` date NOT NULL,
  `fim` date NOT NULL,
  `pagamento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tabela_produto`
--

INSERT INTO `tabela_produto` (`id`, `nome`, `telefone`, `quantpessoas`, `hotel`, `inicio`, `fim`, `pagamento`) VALUES
(1, 'Mavi', '000000000', '5', '1º', '2023-06-16', '2023-06-23', 'Pix'),
(3, 'Felipe Rodrigo dos Santos', '997306797', '3', '3º', '2023-06-19', '2023-06-20', 'Pix');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tabela_produto`
--
ALTER TABLE `tabela_produto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tabela_produto`
--
ALTER TABLE `tabela_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
