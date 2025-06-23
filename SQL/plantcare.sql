-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 23/06/2025 às 23:34
-- Versão do servidor: 9.1.0
-- Versão do PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `plantcare`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `plantas`
--

DROP TABLE IF EXISTS `plantas`;
CREATE TABLE IF NOT EXISTS `plantas` (
  `id_plant` int NOT NULL AUTO_INCREMENT,
  `popular_name` varchar(255) NOT NULL,
  `plant_type` varchar(255) NOT NULL,
  `plant_environment` varchar(255) NOT NULL,
  `plant_obs` text NOT NULL,
  `scientific_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_plant`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `plantas`
--

INSERT INTO `plantas` (`id_plant`, `popular_name`, `plant_type`, `plant_environment`, `plant_obs`, `scientific_name`) VALUES
(38, 'Sigônio', 'Trepadeira', 'Locais altos em vasos suspensos', 'Rega regular.', 'Syngonium angustatum'),
(39, 'Jiboia', 'Trepadeira', 'Em paredes ou apoios', 'reguas regulares e deixar em sombra', 'Epipremnum pinnatum'),
(44, 'Costela-de-adão', 'Arácea', 'Lugares que não tenham muita exposição ao sol.', 'Deixar a meia sombra, não expor ao frio e deixar o substrato sempre úmido', 'Monstera deliciosa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tarefas`
--

DROP TABLE IF EXISTS `tarefas`;
CREATE TABLE IF NOT EXISTS `tarefas` (
  `id_task` int NOT NULL AUTO_INCREMENT,
  `descricao` text NOT NULL,
  `prioridade` enum('Baixa','Média','Alta','') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `data_criacao` date NOT NULL,
  `status` enum('Pendente','Concluindo','Concluída','') NOT NULL,
  `plant_id` int NOT NULL,
  PRIMARY KEY (`id_task`),
  KEY `plant_id` (`plant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tarefas`
--

INSERT INTO `tarefas` (`id_task`, `descricao`, `prioridade`, `data_criacao`, `status`, `plant_id`) VALUES
(9, 'Regar hoje, adubar hoje, trocar ela de lugar daqui a 3 dias', 'Média', '2026-04-01', 'Concluindo', 38);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_graduation` varchar(255) DEFAULT NULL,
  `user_type` int NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `user_name`, `user_email`, `user_password`, `user_graduation`, `user_type`) VALUES
(17, 'ADM', 'ADM@gmail.com', '$2y$10$/FCFYNXbMQy5n8e.1n2xM.7jZHn7KQrKe7IZadYuLQ40foCholxdm', 'Biologia', 1),
(18, 'Renan', 'renan28@gmail.com', '$2y$10$4jwW/X4tjx6u/juM6bEIZeJQeQuaOGG2aKI6l17yCxrxBDLWfjTdK', 'Botânica', 1),
(15, 'Sophia Santiago', 'santiagosophia@gmail.com', '$2y$10$DSzTLXPMnpGwacyO7qEK5e9WEsMBaCgvrAH5Bqz/PCCd52wVLBQqC', 'Biologia', 1);

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tarefas`
--
ALTER TABLE `tarefas`
  ADD CONSTRAINT `fk_planta` FOREIGN KEY (`plant_id`) REFERENCES `plantas` (`id_plant`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
