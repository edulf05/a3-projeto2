-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/07/2024 às 05:32
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gestaoatendimentos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `atendimento`
--

CREATE TABLE `atendimento` (
  `idAtendimento` int(11) NOT NULL,
  `idFormaAtendimento` int(11) NOT NULL,
  `idPerguntaPublico` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `ativo` enum('S','N') NOT NULL DEFAULT 'S',
  `respostaAtendimento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `atendimento`
--

INSERT INTO `atendimento` (`idAtendimento`, `idFormaAtendimento`, `idPerguntaPublico`, `idUsuario`, `dataCadastro`, `ativo`, `respostaAtendimento`) VALUES
(1, 1, 1, 4, '2024-07-18 00:00:00', 'S', 'só é');

-- --------------------------------------------------------

--
-- Estrutura para tabela `formaatendimento`
--

CREATE TABLE `formaatendimento` (
  `idFormaAtendimento` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `nomeAtendimento` varchar(255) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `ativo` enum('S','N') NOT NULL DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `formaatendimento`
--

INSERT INTO `formaatendimento` (`idFormaAtendimento`, `idUsuario`, `nomeAtendimento`, `dataCadastro`, `ativo`) VALUES
(1, 4, 'edu', '2024-07-18 00:00:00', 'S');

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfil`
--

CREATE TABLE `perfil` (
  `idPerfil` int(11) NOT NULL,
  `nomePerfil` varchar(255) NOT NULL,
  `dataCadastro` datetime DEFAULT NULL,
  `ativo` enum('S','N') NOT NULL DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `perfil`
--

INSERT INTO `perfil` (`idPerfil`, `nomePerfil`, `dataCadastro`, `ativo`) VALUES
(2, 'edu', '2024-07-18 00:00:00', 'S');

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfilsessao`
--

CREATE TABLE `perfilsessao` (
  `idPerfil` int(11) NOT NULL,
  `idSessao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `perguntapublico`
--

CREATE TABLE `perguntapublico` (
  `idPerguntaPublico` int(11) NOT NULL,
  `idPublico` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `descricaoPergunta` text NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `ativo` enum('S','N') NOT NULL DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `perguntapublico`
--

INSERT INTO `perguntapublico` (`idPerguntaPublico`, `idPublico`, `idUsuario`, `descricaoPergunta`, `dataCadastro`, `ativo`) VALUES
(1, 1, 4, 'oq é', '2024-07-18 00:00:00', 'S');

-- --------------------------------------------------------

--
-- Estrutura para tabela `publico`
--

CREATE TABLE `publico` (
  `idPublico` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `nomePublico` varchar(255) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `ativo` enum('S','N') NOT NULL DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `publico`
--

INSERT INTO `publico` (`idPublico`, `idUsuario`, `nomePublico`, `dataCadastro`, `ativo`) VALUES
(1, 4, 'edu', '2024-07-18 00:00:00', 'S');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sessao`
--

CREATE TABLE `sessao` (
  `idSessao` int(11) NOT NULL,
  `nomeSessao` varchar(255) NOT NULL,
  `dataCadsatro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(255) NOT NULL,
  `emailUsuario` varchar(255) NOT NULL,
  `loginUsuario` varchar(255) NOT NULL,
  `senhaUsuario` varchar(255) NOT NULL,
  `dataCadastro` datetime DEFAULT NULL,
  `telefoneCelular` varchar(45) DEFAULT NULL,
  `ativo` enum('S','N') NOT NULL DEFAULT 'S',
  `idPerfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nomeUsuario`, `emailUsuario`, `loginUsuario`, `senhaUsuario`, `dataCadastro`, `telefoneCelular`, `ativo`, `idPerfil`) VALUES
(4, 'edu', 'edu123@gmail.com', 'edu', 'dudu6969', '2024-07-18 00:00:00', '51992911724', 'S', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `atendimento`
--
ALTER TABLE `atendimento`
  ADD PRIMARY KEY (`idAtendimento`) USING BTREE,
  ADD KEY `fk_atendimento_formaatendimento1_idx` (`idFormaAtendimento`),
  ADD KEY `fk_atendimento_perguntapublico1_idx` (`idPerguntaPublico`),
  ADD KEY `fk_atendimento_usuario1_idx` (`idUsuario`);

--
-- Índices de tabela `formaatendimento`
--
ALTER TABLE `formaatendimento`
  ADD PRIMARY KEY (`idFormaAtendimento`) USING BTREE,
  ADD KEY `fk_tipoatendimento_usuario1_idx` (`idUsuario`);

--
-- Índices de tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idPerfil`);

--
-- Índices de tabela `perfilsessao`
--
ALTER TABLE `perfilsessao`
  ADD PRIMARY KEY (`idPerfil`) USING BTREE,
  ADD KEY `fk_perfil_has_sessao_sessao1_idx` (`idSessao`);

--
-- Índices de tabela `perguntapublico`
--
ALTER TABLE `perguntapublico`
  ADD PRIMARY KEY (`idPerguntaPublico`) USING BTREE,
  ADD KEY `fk_perguntapublico_publico1_idx` (`idPublico`),
  ADD KEY `fk_perguntapublico_usuario1_idx` (`idUsuario`);

--
-- Índices de tabela `publico`
--
ALTER TABLE `publico`
  ADD PRIMARY KEY (`idPublico`) USING BTREE,
  ADD KEY `fk_publico_usuario1_idx` (`idUsuario`);

--
-- Índices de tabela `sessao`
--
ALTER TABLE `sessao`
  ADD PRIMARY KEY (`idSessao`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`) USING BTREE,
  ADD KEY `fk_usuario_perfil1_idx` (`idPerfil`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atendimento`
--
ALTER TABLE `atendimento`
  MODIFY `idAtendimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `formaatendimento`
--
ALTER TABLE `formaatendimento`
  MODIFY `idFormaAtendimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idPerfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `perguntapublico`
--
ALTER TABLE `perguntapublico`
  MODIFY `idPerguntaPublico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `publico`
--
ALTER TABLE `publico`
  MODIFY `idPublico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `sessao`
--
ALTER TABLE `sessao`
  MODIFY `idSessao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `atendimento`
--
ALTER TABLE `atendimento`
  ADD CONSTRAINT `fk_atendimento_formaatendimento1` FOREIGN KEY (`idFormaAtendimento`) REFERENCES `formaatendimento` (`idFormaAtendimento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_atendimento_perguntapublico1` FOREIGN KEY (`idPerguntaPublico`) REFERENCES `perguntapublico` (`idPerguntaPublico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_atendimento_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `formaatendimento`
--
ALTER TABLE `formaatendimento`
  ADD CONSTRAINT `fk_tipoatendimento_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `perfilsessao`
--
ALTER TABLE `perfilsessao`
  ADD CONSTRAINT `fk_perfil_has_sessao_perfil1` FOREIGN KEY (`idPerfil`) REFERENCES `perfil` (`idPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_perfil_has_sessao_sessao1` FOREIGN KEY (`idSessao`) REFERENCES `sessao` (`idSessao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `perguntapublico`
--
ALTER TABLE `perguntapublico`
  ADD CONSTRAINT `fk_perguntapublico_publico1` FOREIGN KEY (`idPublico`) REFERENCES `publico` (`idPublico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_perguntapublico_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `publico`
--
ALTER TABLE `publico`
  ADD CONSTRAINT `fk_publico_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_perfil1` FOREIGN KEY (`idPerfil`) REFERENCES `perfil` (`idPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
