-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Jul-2021 às 02:59
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 7.3.28

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
-- Estrutura da tabela `anotacoes`
--

CREATE TABLE `anotacoes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `mensagem` varchar(255) NOT NULL,
  `prioridade` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `anotacoes`
--

INSERT INTO `anotacoes` (`id`, `titulo`, `mensagem`, `prioridade`) VALUES
(3, 'Gol turbo Jean ', 'Fazer gol tudo do Jean \r\n\r\n\r\nTeste ', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) NOT NULL,
  `cep` varchar(11) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cpfcnpj` bigint(20) NOT NULL,
  `telefone` bigint(11) NOT NULL,
  `veiculo` varchar(255) DEFAULT NULL,
  `ano` mediumint(9) DEFAULT NULL,
  `modelo` varchar(255) DEFAULT NULL,
  `placa` varchar(50) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `excluido` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `cidade`, `cep`, `bairro`, `cpfcnpj`, `telefone`, `veiculo`, `ano`, `modelo`, `placa`, `endereco`, `excluido`) VALUES
(1, 'Jean Marcos', '', 'Tapejara', NULL, '', 4398942041, 54996660580, '', NULL, '', '', '', 0),
(2, 'Ademir de Souza', '', 'Tapejara', '99950000', '', 4398942041, 54996147241, '', NULL, '', '', '', 0),
(3, 'Tainara Policarpi', 'tai-policarpi@hotmail.com', 'Tapejara', '99950000', 'São Paulo', 4564564456, 54999999999, 'Ka', 2007, '', 'IFZ3768', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `config_os`
--

CREATE TABLE `config_os` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `lis_titulo` tinyint(1) NOT NULL DEFAULT 1,
  `endereco` varchar(255) DEFAULT NULL,
  `lis_endereco` tinyint(1) NOT NULL DEFAULT 1,
  `tel1` varchar(30) DEFAULT NULL,
  `lis_tel1` tinyint(1) NOT NULL DEFAULT 1,
  `tel2` varchar(30) DEFAULT NULL,
  `lis_tel2` tinyint(1) NOT NULL DEFAULT 1,
  `email` varchar(255) DEFAULT NULL,
  `lis_email` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `config_os`
--

INSERT INTO `config_os` (`id`, `titulo`, `lis_titulo`, `endereco`, `lis_endereco`, `tel1`, `lis_tel1`, `tel2`, `lis_tel2`, `email`, `lis_email`) VALUES
(1, 'CASCA AUTOCAR', 1, 'R. Antônio José Vivan, 602, Centro', 1, '54991610893', 1, '54999256529', 1, 'leonardo.milani.pizzi@gmail.com', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `enderecamento` varchar(40) DEFAULT NULL,
  `valor` int(11) NOT NULL,
  `quantidade_estoque` int(11) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `excluido` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`codigo`, `descricao`, `enderecamento`, `valor`, `quantidade_estoque`, `imagem`, `excluido`) VALUES
(1, 'Tainara', '', 102, 1, 'img/376abc99aceec60f850ed6a2a7d8ee6e8242247548615961009327388554.jpg', 0),
(2, 'Solange ', '', 0, 1, 'img/4ca1c6c5c6880ec5689a509992a0cb518237886043051598969973887769.jpg', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itensordens`
--

CREATE TABLE `itensordens` (
  `id` int(11) NOT NULL,
  `os` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` float NOT NULL,
  `data` date NOT NULL,
  `cliente` varchar(255) DEFAULT NULL,
  `produto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `itensordens`
--

INSERT INTO `itensordens` (`id`, `os`, `quantidade`, `valor`, `data`, `cliente`, `produto`) VALUES
(1, 2, 1, 10, '2021-06-27', '1', '1'),
(2, 3, 6, 60, '2021-06-27', '1', '1'),
(3, 4, 1, 10, '2021-06-27', '3', '2'),
(4, 4, 1, 20, '2021-06-27', '3', '1'),
(5, 5, 1, 10, '2021-06-27', '1', '2'),
(6, 6, 3, 102, '2021-06-27', '3', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `osid`
--

CREATE TABLE `osid` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `osid`
--

INSERT INTO `osid` (`id`) VALUES
(6);

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
(2, 'Leonardo Milani Pizzi', 'a3b9b46c138a0e5b748a8621539e8378', 'leonardo.milani.pizzi@gmail.com', 'leonardo'),
(3, 'João Simonetto', 'feb4e3306f69f047cfb53ce2627d3a4d', '', 'joao');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anotacoes`
--
ALTER TABLE `anotacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `config_os`
--
ALTER TABLE `config_os`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `itensordens`
--
ALTER TABLE `itensordens`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anotacoes`
--
ALTER TABLE `anotacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `config_os`
--
ALTER TABLE `config_os`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `itensordens`
--
ALTER TABLE `itensordens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `osid`
--
ALTER TABLE `osid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
