-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Abr-2021 às 03:02
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cascar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `cep` varchar(11) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cpfcnpj` bigint(20) NOT NULL,
  `telefone` bigint(11) NOT NULL,
  `veiculo` varchar(255) NOT NULL,
  `ano` mediumint(9) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `placa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `cidade`, `cep`, `bairro`, `cpfcnpj`, `telefone`, `veiculo`, `ano`, `modelo`, `placa`) VALUES
(59, 'Leonardo Milani Pizzi', 'leonardo.milani.pizzi@gmail.com', 'Passo Fundo', '99950000', 'São Paulo', 4398942041, 54996660580, 'Gol', 1986, 'LS', 'IFZ3768'),
(60, 'Jean Marcos de Souza', 'jiamarcos@outlook.com.br', 'Passo Fundo', '999595959', 'Sao paulo', 4399999999, 54996660580, 'golf', 20021, 'sportline', 'ii1i99'),
(61, 'Tainara Policarpi', 'tai-policarpi@hotmail.com', 'Tapejara', '99950000', 'São Cristovão', 35645887455, 54999999999, 'Ka', 2007, 'Ford', 'AA3I22');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `enderecamento` varchar(40) NOT NULL,
  `valor` int(11) NOT NULL,
  `quantidade_estoque` int(11) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`codigo`, `descricao`, `enderecamento`, `valor`, `quantidade_estoque`, `imagem`) VALUES
(16, 'Mouse Gamer', 'teste', 250, 30, NULL),
(18, 'Teclado Mecânico RGB', 'suahsuah', 399, 12, 'img/9b95f97349cf631b1ce26ddf4b01074aadv.png'),
(19, 'Notebook Gamer Avell', 'a1b1c2d4', 7500, 4, NULL),
(20, 'Iphone 7 Black', '32312312', 2500, 6, NULL),
(21, 'Mão de Obra', '-', 250, 999, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `osid`
--

CREATE TABLE `osid` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`, `email`, `usuario`) VALUES
(1, 'Jean Marcos de Souza', '698dc19d489c4e4db73e28a713eab07b', 'jiamarcos@outlook.com.br', 'jean.souza'),
(2, 'jean', 'teste', 'jiamarcos@outlook.com.br', 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `osid`
--
ALTER TABLE `osid`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `osid`
--
ALTER TABLE `osid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD CONSTRAINT `veiculos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
