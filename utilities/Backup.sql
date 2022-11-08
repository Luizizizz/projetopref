--192.168.10.6/NLocados
-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Ago-2022 às 18:08
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `syspref`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `naolocados`
--

CREATE TABLE `naolocados` (
  `id` int(11) NOT NULL,
  `nserie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `obs` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'Nenhuma observação descrita pelo usuario.',
  `foto` mediumblob DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `locado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `naolocados`
--

INSERT INTO `naolocados` (`id`, `nserie`, `nome`, `obs`, `foto`, `created`, `modified`, `locado`) VALUES
(42, '4132', 'teste', 'Não inserido pelo usuario', NULL, '2022-08-16 10:30:25', NULL, 0),
(45, '5724', 'teste', 'Não foi inserido nenhuma informção sobre o respectivo patrimônio pelo usuario!', NULL, '2022-08-16 10:30:34', NULL, 0),
(46, '4045', 'HP LASER JET 4015Nn', 'Não inserido pelo usuario', NULL, '2022-08-16 10:32:17', '2022-08-16 11:42:30', 0),
(48, '404501', 'HP LASER JET 1200', 'Não inserido pelo usuario', NULL, '2022-08-16 10:34:15', NULL, 0),
(51, '575725', 'teste', 'Não inserido pelo usuario', NULL, '2022-08-16 10:44:33', NULL, 0),
(52, '245210', 'HP LASER JET 1200', 'Não inserido pelo usuario', NULL, '2022-08-16 10:58:48', NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `patrimoniopref`
--

CREATE TABLE `patrimoniopref` (
  `id` int(11) NOT NULL,
  `npatrimonio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nserie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `obs` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'Nenhuma observação descrita pelo usuario.',
  `foto` mediumblob DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `alocado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `patrimoniopref`
--

INSERT INTO `patrimoniopref` (`id`, `npatrimonio`, `nserie`, `nome`, `obs`, `foto`, `created`, `modified`, `alocado`) VALUES
(28, '20503', 'Não consta', 'HP LASER JET 4015N', '', NULL, '2022-08-15 13:29:01', NULL, 0),
(33, 'Não consta', '4132', 'HP LASER JET 4015N', '', NULL, '2022-08-15 13:57:57', NULL, 0),
(35, 'Não consta', '452724421', 'HP LASER JET 1200', '', NULL, '2022-08-15 13:59:03', NULL, 0),
(38, '16545', '413239', 'HP LASER JET 4014N', 'Não foi inserido nenhuma informção sobre o respectivo patrimônio pelo usuario!', NULL, '2022-08-16 08:25:18', '2022-08-16 08:53:18', 0),
(39, '72147', 'Não consta', 'teste', '', NULL, '2022-08-16 08:55:18', NULL, 0),
(40, '7214741', 'Não consta', 'HP LASER JET 4014', 'Não inserido pelo usuario', NULL, '2022-08-16 08:59:16', NULL, 0),
(41, 'Não consta', '324231', 'Passa fio', 'Todos nós temos Luz e Trevas dentro de nós. O que importa é o lado que escolhemos para agir. Isso é o que realmente somos.', NULL, '2022-08-16 08:59:33', '2022-08-16 09:10:51', 0),
(42, '45245', 'Não consta', 'teste', 'Objeto perdido', NULL, '2022-08-16 10:27:52', NULL, 0),
(43, '2505', 'Não consta', 'teste22', 'Não inserido pelo usuario', NULL, '2022-08-16 10:32:03', '2022-08-16 11:42:19', 0),
(44, '72147100', 'Não consta', 'HP LASER JET 4014', 'Impressora se encontra em outro setor', NULL, '2022-08-16 11:38:29', NULL, 0),
(45, '542201', '045011', 'PC 123', 'Não inserido pelo usuario', NULL, '2022-08-16 11:38:41', NULL, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `naolocados`
--
ALTER TABLE `naolocados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `patrimoniopref`
--
ALTER TABLE `patrimoniopref`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `naolocados`
--
ALTER TABLE `naolocados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `patrimoniopref`
--
ALTER TABLE `patrimoniopref`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;
