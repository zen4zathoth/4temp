-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 28-Fev-2020 às 20:35
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dados_empresa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `Nome` varchar(128) NOT NULL,
  `Senha` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Telefone` varchar(24) NOT NULL,
  `CPF` varchar(24) NOT NULL,
  `DataNascimento` date NOT NULL,
  `IsAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`Nome`, `Senha`, `Email`, `Telefone`, `CPF`, `DataNascimento`, `IsAdmin`) VALUES
('Victor Gomes', '123', 'email@provedor.com', '(21)90000-0000', '000.000.000-00', '1994-01-03', 0),
('Lucas Vitor', '77777', 'lucasvitorfc@gmail.com', '(21)90000-0000', '000.000.000-00', '2018-01-09', 0),
('administrador', 'admin', 'admin@admin.admin', '(21)90000-0000', '000.000.000-00', '0001-01-01', 1),
('Felipe Alves', '895342375890465947836', 'nomade.fe@outlook.com', '(21)92132-4856', '123.456.789-99', '2020-02-04', 0),
('EL JAVIER BUENAS ONDAS', '123123', 'javierattacksagain@shd.com', '(21)31231-2312', '312.312.312-31', '2020-02-28', 0),
('Aaron Keener', '12345678', 'aaron@keener.com', '(21)9912-4252', '234.512.336-89', '2001-01-30', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
