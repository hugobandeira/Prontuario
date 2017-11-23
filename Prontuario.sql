-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 29-Out-2017 às 20:58
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Prontuario`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Agendamento`
--

CREATE TABLE `Agendamento` (
  `id` int(11) NOT NULL,
  `codigo` int(11) DEFAULT NULL,
  `data/hora` datetime DEFAULT NULL,
  `paciente_id` int(11) NOT NULL,
  `medico_id` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Atendimento`
--

CREATE TABLE `Atendimento` (
  `id` int(11) NOT NULL,
  `queixa_principal` varchar(45) DEFAULT NULL,
  `historico` varchar(45) DEFAULT NULL,
  `problemas_renais` tinyint(4) DEFAULT NULL,
  `problemas_cardiocos` tinyint(4) DEFAULT NULL,
  `problemas_respiratorios` tinyint(4) DEFAULT NULL,
  `problemas_gastricos` tinyint(4) DEFAULT NULL,
  `alergia` tinyint(4) DEFAULT NULL,
  `hepatite` tinyint(4) DEFAULT NULL,
  `gravidez` tinyint(4) DEFAULT NULL,
  `diabetes` tinyint(4) DEFAULT NULL,
  `problemas_de_cicratrizacao` tinyint(4) DEFAULT NULL,
  `toma_medicamentos` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Medicos`
--

CREATE TABLE `Medicos` (
  `id` int(11) NOT NULL,
  `crm` float NOT NULL,
  `nome` varchar(45) NOT NULL,
  `endereco` varchar(105) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `cpf` int(11) NOT NULL,
  `rg` int(11) NOT NULL,
  `data_nascimento` date NOT NULL,
  `naturalidade` varchar(45) DEFAULT NULL,
  `nacionalidade` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefone` int(11) DEFAULT NULL,
  `celular` int(11) DEFAULT NULL,
  `trabalho` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Medicos`
--

INSERT INTO `Medicos` (`id`, `crm`, `nome`, `endereco`, `bairro`, `cidade`, `estado`, `cep`, `complemento`, `cpf`, `rg`, `data_nascimento`, `naturalidade`, `nacionalidade`, `email`, `telefone`, `celular`, `trabalho`) VALUES
(28, 12345700, 'Jackson Hugo Bandeira de FranÃ§a', 'rua coronel manuel bandeira', 'bacuri', 'Imperatriz', 'ma', '65916020', 'casa 02 lote 18', 2147483647, 0, '1997-11-24', 'maranhese', '99999999', 'hugo.bandeira@hotmail.com', 2147483647, NULL, 'ti'),
(30, 0, 'mRII', NULL, NULL, 'imperatriz', NULL, NULL, NULL, 0, 0, '0000-00-00', NULL, NULL, 'hugo.bandeira@hotmail', 0, NULL, NULL),
(31, 0, 'hugo', 'rua coronel manuel bandeira', 'bacuri', 'imperatriz', 'ma', '7733234324', '', 0, 0, '0000-00-00', '', '', 'hugo.bandeira@hotmail', 0, NULL, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Pacientes`
--

CREATE TABLE `Pacientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `endereco` varchar(105) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidades` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `cpf` int(11) NOT NULL,
  `rg` int(11) NOT NULL,
  `data_nascimento` date NOT NULL,
  `naturalidade` varchar(45) DEFAULT NULL,
  `nacionalidade` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefone` int(11) DEFAULT NULL,
  `telefone_trabalho` int(11) DEFAULT NULL,
  `nome_pai` varchar(45) DEFAULT NULL,
  `nome_mae` varchar(45) DEFAULT NULL,
  `tipo_sangue` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Pacientes`
--

INSERT INTO `Pacientes` (`id`, `nome`, `endereco`, `bairro`, `cidades`, `estado`, `cep`, `complemento`, `cpf`, `rg`, `data_nascimento`, `naturalidade`, `nacionalidade`, `email`, `telefone`, `telefone_trabalho`, `nome_pai`, `nome_mae`, `tipo_sangue`) VALUES
(1, 'jefferson hugo bandeira de frança', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(2, 'jefferson hugo bandeira de frança', NULL, NULL, NULL, NULL, NULL, NULL, 59532853, 595328539, '2017-10-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `nivel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `senha`, `nivel`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Agendamento`
--
ALTER TABLE `Agendamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Agendamento_Pacientes1_idx` (`paciente_id`),
  ADD KEY `fk_Agendamento_Médicos1_idx` (`medico_id`);

--
-- Indexes for table `Atendimento`
--
ALTER TABLE `Atendimento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Atendimento_Agendamento_idx` (`id`);

--
-- Indexes for table `Medicos`
--
ALTER TABLE `Medicos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Pacientes`
--
ALTER TABLE `Pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Medicos`
--
ALTER TABLE `Medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `Pacientes`
--
ALTER TABLE `Pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
