-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 08/10/2013 às 16:31:16
-- Versão do Servidor: 5.5.32
-- Versão do PHP: 5.4.6-1ubuntu1.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `financas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `receitaDespesa`
--

CREATE TABLE IF NOT EXISTS `receitaDespesa` (
  `idReceitaDespesa` int(11) NOT NULL AUTO_INCREMENT,
  `idTipo` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `descReceitaDespesa` varchar(30) NOT NULL,
  `valor` float NOT NULL,
  `data` varchar(10) NOT NULL,
  PRIMARY KEY (`idReceitaDespesa`),
  KEY `FK_usuario` (`idUsuario`),
  KEY `FK_tipo` (`idTipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `receitaDespesa`
--

INSERT INTO `receitaDespesa` (`idReceitaDespesa`, `idTipo`, `idUsuario`, `descReceitaDespesa`, `valor`, `data`) VALUES
(3, 1, 1, 'teste', 850.21, '07/10/13'),
(5, 3, 1, 'Boleto net', 89.69, '03/10/13'),
(6, 3, 1, 'testando...', 10.96, '05/11/13'),
(7, 1, 1, 'rwste', 145.88, '07/10/13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `idTipo` int(11) NOT NULL AUTO_INCREMENT,
  `descTipo` varchar(30) NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`idTipo`, `descTipo`) VALUES
(1, 'Despesas Fixas'),
(2, 'Despesas Variáveis'),
(3, 'Reecitas Fixas'),
(4, 'Receitas Variáveis');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nomeUsuario` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `senha` varchar(10) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nomeUsuario`, `login`, `senha`) VALUES
(1, 'Lucian', 'lucian.rochati@gmail.com', 'email68');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `receitaDespesa`
--
ALTER TABLE `receitaDespesa`
  ADD CONSTRAINT `FK_tipo` FOREIGN KEY (`idTipo`) REFERENCES `tipo` (`idTipo`),
  ADD CONSTRAINT `FK_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
