-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 01, 2017 at 05:59 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qualitex`
--

-- --------------------------------------------------------

--
-- Table structure for table `propostas`
--

CREATE TABLE IF NOT EXISTS `propostas` (
`id` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `data_criacao` datetime NOT NULL,
  `status` enum('Em Elaboracao','Pendente','Aprovado','Negado') NOT NULL,
  `ativo` enum('S','N') NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `propostas`
--

INSERT INTO `propostas` (`id`, `descricao`, `data_criacao`, `status`, `ativo`, `user_id`) VALUES
(1, 'Proposals', '2017-04-01 05:18:36', 'Em Elaboracao', 'S', 1),
(2, 'Proposals 2', '2017-04-01 05:18:54', 'Em Elaboracao', 'S', 1),
(3, 'Lorem ipsum', '2017-04-01 05:19:17', 'Em Elaboracao', 'S', 1),
(4, 'Test', '2017-04-01 05:19:32', 'Em Elaboracao', 'S', 1),
(5, 'Qualitex Teste', '2017-04-01 05:20:02', 'Em Elaboracao', 'S', 1),
(6, 'Qualitex Teste', '2017-04-01 05:21:29', 'Aprovado', 'S', 1),
(7, 'More one', '2017-04-01 05:35:12', 'Em Elaboracao', 'N', 1);

-- --------------------------------------------------------

--
-- Table structure for table `proposta_servicos`
--

CREATE TABLE IF NOT EXISTS `proposta_servicos` (
`id` int(11) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `propostas_id` int(11) NOT NULL,
  `servicos_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposta_servicos`
--

INSERT INTO `proposta_servicos` (`id`, `data_criacao`, `propostas_id`, `servicos_id`) VALUES
(1, '2017-04-01 05:18:36', 1, 1),
(2, '2017-04-01 05:18:36', 1, 2),
(3, '2017-04-01 05:18:36', 1, 3),
(4, '2017-04-01 05:18:54', 2, 4),
(5, '2017-04-01 05:18:54', 2, 5),
(6, '2017-04-01 05:19:17', 3, 3),
(7, '2017-04-01 05:19:17', 3, 4),
(8, '2017-04-01 05:19:17', 3, 5),
(9, '2017-04-01 05:19:32', 4, 5),
(10, '2017-04-01 00:00:00', 5, 3),
(11, '2017-04-01 00:00:00', 6, 5),
(12, '2017-04-01 05:35:12', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `servicos`
--

CREATE TABLE IF NOT EXISTS `servicos` (
`id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` text NOT NULL,
  `valor` float(10,2) NOT NULL,
  `ativo` enum('S','N') NOT NULL,
  `tipos_servicos_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicos`
--

INSERT INTO `servicos` (`id`, `nome`, `descricao`, `valor`, `ativo`, `tipos_servicos_id`) VALUES
(1, 'Águas e Efluentes', 'Amostragens técnicas e laboratoriais para verificação de conformidade em relação aos requisitos legais.', 500.00, 'S', 1),
(2, 'Qualidade do Ar e Emissões gasosas', 'A QUALITEX está engajada apoiando o Plano Nacional de Qualidade do Ar. O monitoramento da qualidade do ar e das fontes de emissão de ...', 600.00, 'S', 1),
(3, 'Saúde Ocupacional', 'Os ambientes de trabalho possuem regulamentações relacionadas a exposição dos trabalhadores a agentes físicos...', 450.00, 'S', 1),
(4, 'Alimentos e Swabs', 'A QUALITEX está engajada apoiando a Política Nacional de Alimentação e Nutrição. A caracterização dos alimentos e suporte analítico...', 800.00, 'S', 1),
(5, 'Gerenciamento de Resíduos', 'Remoção de resíduos e borras em equipamentos, tais como: SAO, torres, vasos, tanques, permutadores, canaletas, sistemas de resfriamento, etc.', 1000.00, 'S', 2),
(6, 'Limpeza e conservação predial ', 'Limpeza e conservação de prédios industriais, administrativos, cinturão verde, jardins, etc.\r\nReflorestamento e paisagismo', 900.00, 'S', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tipos_servicos`
--

CREATE TABLE IF NOT EXISTS `tipos_servicos` (
`id` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `ativo` enum('S','N') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipos_servicos`
--

INSERT INTO `tipos_servicos` (`id`, `nome`, `ativo`) VALUES
(1, 'ANÁLISES AMBIENTAIS - SEGMENTOS', 'S'),
(2, 'SERVIÇOS OPERACIONAIS', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` enum('Elaborador','Aprovador','Cliente') DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(1, 'Elaborisvaldo ', 'Silva Lins', 'elaborador', 'a5d8838165f60fa7f82f4e84495a96048cf128f9', 'Elaborador'),
(2, 'Aprovisionaldis ', 'do Carmo', 'aprovador', '4fd6eb82cae985c41a0c6c177787bc837fd16ba4', 'Aprovador'),
(3, 'Climeriano', 'Rocha Buarque', 'cliente', 'd94019fd760a71edf11844bb5c601a4de95aacaf', 'Cliente');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `propostas`
--
ALTER TABLE `propostas`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_propostas_user_idx` (`user_id`);

--
-- Indexes for table `proposta_servicos`
--
ALTER TABLE `proposta_servicos`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_proposta_servicos_propostas1_idx` (`propostas_id`), ADD KEY `fk_proposta_servicos_servicos1_idx` (`servicos_id`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_servicos_tipo_servicos1_idx` (`tipos_servicos_id`);

--
-- Indexes for table `tipos_servicos`
--
ALTER TABLE `tipos_servicos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `propostas`
--
ALTER TABLE `propostas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `proposta_servicos`
--
ALTER TABLE `proposta_servicos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tipos_servicos`
--
ALTER TABLE `tipos_servicos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `propostas`
--
ALTER TABLE `propostas`
ADD CONSTRAINT `fk_propostas_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `proposta_servicos`
--
ALTER TABLE `proposta_servicos`
ADD CONSTRAINT `fk_proposta_servicos_propostas1` FOREIGN KEY (`propostas_id`) REFERENCES `propostas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_proposta_servicos_servicos1` FOREIGN KEY (`servicos_id`) REFERENCES `servicos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `servicos`
--
ALTER TABLE `servicos`
ADD CONSTRAINT `fk_servicos_tipo_servicos1` FOREIGN KEY (`tipos_servicos_id`) REFERENCES `tipos_servicos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
