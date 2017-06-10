-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 10/06/2017 às 06:20
-- Versão do servidor: 5.5.54-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `2ofus`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `contacasal`
--

CREATE TABLE IF NOT EXISTS `contacasal` (
  `cd_contacasal` int(11) NOT NULL,
  PRIMARY KEY (`cd_contacasal`),
  KEY `fk_contacasal` (`cd_contacasal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `contacasal`
--

INSERT INTO `contacasal` (`cd_contacasal`) VALUES
(1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `cd_evento` int(11) NOT NULL AUTO_INCREMENT,
  `nm_evento` varchar(50) NOT NULL,
  `dt_evento` date NOT NULL,
  `hr_evento` time NOT NULL,
  `cd_contacasal` int(11) NOT NULL,
  PRIMARY KEY (`cd_evento`),
  KEY `FK_evento_contacasal` (`cd_contacasal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `cd_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `ds_email` varchar(50) NOT NULL,
  `cd_senha` varchar(100) NOT NULL,
  `nm_usuario` varchar(50) NOT NULL,
  `dt_nascimento` date NOT NULL,
  `ic_sexo` char(1) NOT NULL,
  `cd_conecta` int(11) DEFAULT NULL,
  `cd_contacasal` int(11) NOT NULL,
  PRIMARY KEY (`cd_usuario`),
  KEY `FK_usuario_contacasal` (`cd_contacasal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `FK_evento_contacasal` FOREIGN KEY (`cd_contacasal`) REFERENCES `contacasal` (`cd_contacasal`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_usuario_contacasal` FOREIGN KEY (`cd_contacasal`) REFERENCES `contacasal` (`cd_contacasal`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
