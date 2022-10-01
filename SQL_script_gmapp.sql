-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Set-2022 às 23:03
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gm_app`
--

-- DELIMITER $$
-- --
-- -- Procedimentos
-- --
-- CREATE DEFINER=`root`@`localhost` PROCEDURE `consulta_pedido` (`id_pedido` INT)   BEGIN
-- 	SELECT PE.id, PR.nome, PP.quantidade FROM pedido_produto PP
-- 	JOIN produto PR ON PP.produto_id = PR.id
-- 	JOIN pedido PE ON PE.id = PP.pedido_id
--     WHERE PE.id = id_pedido;
-- END$$

-- DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'epi'),
(2, 'uniforme'),
(3, 'ferramenta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `data_hora` date DEFAULT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `data_hora`, `status`) VALUES
(108, '2022-08-24', 'Enviado'),
(109, '2022-08-24', 'Concluído'),
(110, '2022-09-23', 'Enviado'),
(111, '2022-09-23', 'Enviado'),
(112, '2022-09-23', ''),
(113, '2022-09-23', 'Cancelado'),
(114, '2022-09-28', 'Enviado'),
(115, '2022-09-28', 'Concluído');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_produto`
--

CREATE TABLE `pedido_produto` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedido_produto`
--

INSERT INTO `pedido_produto` (`id`, `pedido_id`, `produto_id`, `quantidade`) VALUES
(56, 108, 8, 12),
(57, 108, 9, 3),
(58, 108, 10, 44),
(59, 109, 1, 2),
(60, 109, 3, 4),
(61, 110, 1, 3),
(62, 110, 2, 5),
(63, 110, 4, 2),
(64, 111, 8, 2),
(65, 111, 9, 2),
(66, 113, 2, 5),
(67, 113, 4, 3),
(68, 114, 1, 12),
(69, 114, 2, 3),
(70, 115, 1, 12),
(71, 115, 2, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `categoria_id`) VALUES
(1, 'Óculos de Proteção', 1),
(2, 'Luvas', 1),
(3, 'Protetor Auricular', 1),
(4, 'Capacete', 1),
(8, 'Camisa feminina (P)', 2),
(9, 'Camisa feminina (M)', 2),
(10, 'Camisa feminina (G)', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario`, `senha`, `nivel`) VALUES
(4, 'gmuser', 'gm2022', 1),
(5, 'gmadmin', 'gm2022', 2);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `view_info_pedido`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `view_info_pedido` (
`data` date
,`id` int(11)
,`quantidade de produtos` bigint(21)
,`status` varchar(45)
);

-- --------------------------------------------------------

--
-- Estrutura para vista `view_info_pedido`
--
DROP TABLE IF EXISTS `view_info_pedido`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_info_pedido`  AS SELECT cast(`pe`.`data_hora` as date) AS `data`, `pe`.`id` AS `id`, count(`pr`.`nome`) AS `quantidade de produtos`, `pe`.`status` AS `status` FROM ((`pedido_produto` `pp` join `produto` `pr` on(`pp`.`produto_id` = `pr`.`id`)) join `pedido` `pe` on(`pe`.`id` = `pp`.`pedido_id`)) GROUP BY `pe`.`id``id`  ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_pedido_id` (`id`);

--
-- Índices para tabela `pedido_produto`
--
ALTER TABLE `pedido_produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pedido_id` (`pedido_id`),
  ADD KEY `fk_produto_id` (`produto_id`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categoria_id` (`categoria_id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de tabela `pedido_produto`
--
ALTER TABLE `pedido_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pedido_produto`
--
ALTER TABLE `pedido_produto`
  ADD CONSTRAINT `fk_pedido_id` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`),
  ADD CONSTRAINT `fk_produto_id` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_categoria_id` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
