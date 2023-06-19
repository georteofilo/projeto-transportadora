-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Jun-2023 às 14:26
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_transportadora`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agregados`
--

CREATE TABLE `agregados` (
  `idAgregado` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `dataNasc` date DEFAULT NULL,
  `telefone` varchar(15) NOT NULL,
  `fotoNome` varchar(100) DEFAULT NULL,
  `fotoTipo` varchar(5) DEFAULT NULL,
  `fotoTam` int(10) DEFAULT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `numero` int(5) DEFAULT NULL,
  `cep` varchar(15) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(40) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `agregados`
--

INSERT INTO `agregados` (`idAgregado`, `nome`, `email`, `cpf`, `dataNasc`, `telefone`, `fotoNome`, `fotoTipo`, `fotoTam`, `rua`, `bairro`, `numero`, `cep`, `cidade`, `estado`, `pais`) VALUES
(1, 'ana paula', 'ana@email.com', '000.000.000-10', '1990-10-16', '3099999999', 'pexels-superlens-photography-15827873.jpg', 'image', 54, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Junior Siqueira da Silva', 'junior@gmail.com', '020.000.000-20', '2000-11-02', '3099999901', 'pexels-muhammad-ali-15866461.jpg', 'image', 57, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Igor Soares Pereira', 'igor@gmail.com', '176.200.300.10', '2023-06-01', '3899999999', 'pexels-mwabonje-1812634.jpg', 'image', 71, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Gustavo Alves Silva', 'gustavo@gmail.com', '020.000.000-10', '1988-07-12', '3099999999', 'pexels-yuri-manei-3211476.jpg', 'image', 43, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Adilson Junior Gonçalves', 'adilson@gmail.com', '176.200.300.12', '2023-06-01', '3899999999', 'pexels-andrea-piacquadio-3823495.jpg', 'image', 62, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cnpj` varchar(40) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `numero` varchar(5) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `cep` varchar(15) DEFAULT NULL,
  `estado` varchar(40) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nome`, `email`, `cnpj`, `telefone`, `rua`, `bairro`, `numero`, `cidade`, `cep`, `estado`, `pais`) VALUES
(2, 'Hospital São Judas', 'hospitalsaojudas@email.com', '12.345.678/0001-16', '(38)99156-0005', 'Simbad', 'Industrial', '49', 'São Paulo', '35649-083', 'São Paulo', 'Brasil'),
(3, 'Pedro Alves', 'pedroalves@gmail.com', ' 10.545.544/0001-20', '(11) 98765-4321', 'Avenida Central', 'Centro', '456', 'Rio de Janeiro', '98765-432', 'Rio de Janeiro', 'Brasil'),
(4, 'Sofia Santos', 'sofiasantos@gmail.com', '20.145.657/0001-41', '(21) 1234-5678', 'Rua das Flores', 'Jardim Primavera', '123', 'São Paulo', '01234-567', 'São Paulo', 'Brasil'),
(5, 'Lucas Oliveira', 'lucasoliveira@gmail.com', '20.124.879/0001-63', '(31) 8765-4321', 'Calle Principal', ' El Centro', '789', 'Madri', '12345', 'Madri', 'Espanha'),
(6, 'Isabella Silva', 'isabelasilva@gmail.com', '64.984.364/0001-79', '(63)99854-2174', 'Rua das Acácias', 'Jardim das Flores', '234', 'Belo Horizonte', '34567-890', 'Minas Gerais', 'Brasil');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `idFornecedor` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cnpj` varchar(40) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `numero` varchar(5) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `cep` varchar(15) DEFAULT NULL,
  `estado` varchar(40) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`idFornecedor`, `nome`, `email`, `cnpj`, `telefone`, `rua`, `bairro`, `numero`, `cidade`, `cep`, `estado`, `pais`) VALUES
(2, 'Clinica Jesus', 'clinicajesus@email.com', '12.345.678/0001-02', '(38)99356-0521', 'Maria Betania', 'Industrial', '106', 'Belo Horizonte', '35649-083', 'Minas Gerais', 'Brasil'),
(4, 'Farmácia Saúde Total', 'farmaciatotal@gmail.com', ' 64.367.146/0001-96', '(21)98721-6354', 'Via Roma', 'Centro Storico', '56', 'Roma', '00100', 'Lazio', 'Itália'),
(5, 'Drogaria Bem-Estar', 'bemestar@gmail.com', '20.987.365/0001-54', '3221-8598', 'Main Street', 'Downtown', '789', 'Nova York', '10001', 'Nova York', 'Estados Unidos'),
(6, 'Farmácia Popular', 'farmaciapopular@gmail.com', '78.365.214/0001-36', '3221-6547', 'Rua das Acácias', 'Jardim das Flores', '234', 'Belo Horizonte', '34567-890', ' Minas Gerais', 'Brasil'),
(7, 'Drogasil', 'drogasil@gmail.com', '13.745.123/0001-60', '3221-6987', 'Rua das Oliveiras', 'Vila Verde', '321', 'Lisboa', '54321', 'Lisboa', 'Portugal'),
(8, 'Kali', 'kali@gmail.com', '12.345.678/0001-38', '(38)99156-2000', 'Maria Betania', 'Industrial', '365', 'Belo Horizonte', '25378-111', 'Minas Gerais', 'Brasil');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `idFuncionarios` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `dataNasc` varchar(11) DEFAULT NULL,
  `senha` varchar(150) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `fotoNome` varchar(100) DEFAULT NULL,
  `fotoTipo` varchar(5) DEFAULT NULL,
  `fotoTam` int(10) DEFAULT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `numero` varchar(5) DEFAULT NULL,
  `cep` varchar(15) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(40) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`idFuncionarios`, `nome`, `email`, `cpf`, `dataNasc`, `senha`, `telefone`, `fotoNome`, `fotoTipo`, `fotoTam`, `rua`, `bairro`, `numero`, `cep`, `cidade`, `estado`, `pais`) VALUES
(1, 'Administrador', 'admin@email.com', '000.000.000-00', '1988-07-12', 'e10adc3949ba59abbe56e057f20f883e', '(00)00000-0000', 'administrador.jpg', 'image', 72, '', '', '106', '', '', '', ''),
(2, 'Sabrina Maia Cardoso', 'sabrina@email.com', '111.555.666-05', '1996-05-09', 'd41d8cd98f00b204e9800998ecf8427e', '(38)99156-7893', 'pexels-hudson-marques-3366753.jpg', 'image', 98, 'Simbad', 'são bento', '20', '39000-500', 'Montes Claros', 'Minas Gerais', 'Brasil'),
(3, 'João Kleber Ribeiro', 'joao@email.com', '333.555.666-77', '1997-12-23', '202cb962ac59075b964b07152d234b70', '(38)99156-7893', 'pexels-spencer-selover-428328.jpg', 'image', 78, 'Simbad', 'são bento', '1562', '39000-500', 'Montes Claros', 'Minas Gerais', 'Brasil'),
(6, 'Beatriz Pereira', 'beatrizpereira@gmail.com', '123.456.789-09', '', '202cb962ac59075b964b07152d234b70', '(38)98754-2121', 'Daenerys.jpg', 'image', 492, 'Rua das Flores', 'Vila Esperança', '123', '87654-321', 'Curitiba', 'Paraná', 'Brasil'),
(7, 'Guilherme Rodrigues', 'guilhermerodrigues@gmail.com', '081.789.136-09', '', '202cb962ac59075b964b07152d234b70', '(81)98721-5641', 'pexels-justin-shaifer-1222271.jpg', 'image', 46, 'Avenida Central', 'Jardim São Paulo', '456', '54321-098', 'Recife', 'Pernambuco', 'Brasil'),
(8, 'Laura Carvalho', 'lauracarvalho@gmail.com', '081.369.036-74', '', '202cb962ac59075b964b07152d234b70', '(31)98154-3212', 'pexels-samuel-moura-15681635(1).jpg', 'image', 759, 'Rua do Sol', 'Centro Histórico', '789', '12345-678', 'Salvador', 'Bahia', 'Brasil'),
(10, 'camila', 'camila@gmail.com', '111.555.666-04', '2003-12-01', '202cb962ac59075b964b07152d234b70', '(38)99156-7893', 'pexels-nathan-cowley-1153369.jpg', 'image', 2007, 'Maria Betania', 'são bento', '106', '39000-500', 'Montes Claros', 'Minas Gerais', 'Brasil');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(5) NOT NULL,
  `idFornecedor` int(5) NOT NULL,
  `idCliente` int(5) NOT NULL,
  `dataPedido` date DEFAULT NULL,
  `valor` double(10,2) DEFAULT NULL,
  `gastos` double(10,2) DEFAULT NULL,
  `produtos` varchar(500) NOT NULL,
  `entrega` tinyint(1) NOT NULL DEFAULT 0,
  `dataEntrega` date DEFAULT NULL,
  `idAgregado` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `idFornecedor`, `idCliente`, `dataPedido`, `valor`, `gastos`, `produtos`, `entrega`, `dataEntrega`, `idAgregado`) VALUES
(1, 2, 2, '2023-06-01', 10.00, 2.00, '10 caixas de dipirona', 1, '2023-06-03', 1),
(2, 7, 5, '2023-06-01', 16000.00, 2000.00, '100 caixas de dipirona\r\n200 caixas de iboprufeno\r\n200 caixa de soro', 0, NULL, NULL),
(4, 5, 5, '2023-06-02', 8000.00, 3000.00, '100 caixas de shampoo para calvicie\r\n\r\n50 caixas de condicionador para calvicie', 0, NULL, NULL),
(5, 4, 4, NULL, 4000.00, 2000.60, '200 caixas de esparadrapo', 0, NULL, NULL),
(6, 6, 3, NULL, 10000.60, 3000.10, '2 Sabonetes Incolor', 0, NULL, NULL),
(7, 8, 6, NULL, 200.30, 50.90, 'sa', 1, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agregados`
--
ALTER TABLE `agregados`
  ADD PRIMARY KEY (`idAgregado`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices para tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`idFornecedor`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`idFuncionarios`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idAgregado` (`idAgregado`),
  ADD KEY `idFornecedor` (`idFornecedor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agregados`
--
ALTER TABLE `agregados`
  MODIFY `idAgregado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `idFornecedor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `idFuncionarios` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`idAgregado`) REFERENCES `agregados` (`idAgregado`),
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`idFornecedor`) REFERENCES `fornecedores` (`idFornecedor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
