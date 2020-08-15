SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `aventura`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_aventura_criatura`
--

CREATE TABLE `tb_aventura_criatura` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL,
  `habilidade` int(11) NOT NULL,
  `energia` int(11) NOT NULL,
  `heroi_id` int(11) NOT NULL,
  `status` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_aventura_heroi`
--

CREATE TABLE `tb_aventura_heroi` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `aventura` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `habilidade` int(11) NOT NULL DEFAULT '0',
  `habilidade_inicial` int(11) NOT NULL DEFAULT '0',
  `energia` int(11) NOT NULL DEFAULT '0',
  `energia_inicial` int(11) NOT NULL DEFAULT '0',
  `sorte` int(11) NOT NULL DEFAULT '0',
  `sorte_inicial` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_aventura_heroi`
--

INSERT INTO `tb_aventura_heroi` (`id`, `nome`, `aventura`, `status`, `habilidade`, `habilidade_inicial`, `energia`, `energia_inicial`, `sorte`, `sorte_inicial`) VALUES
(1, 'Hanzar', 'As Montanhas Shamutanti', 1, 7, 11, -2, 22, 2, 9),
(5, 'Herói', 'A Cidade dos Ladrões', 1, 9, 9, 17, 17, 7, 7),
(6, 'Kharé', 'Kharé - Porto dos Ardis', 1, 9, 9, 19, 22, 7, 10),
(7, 'Grassam', 'A Cidadela do Caos', 1, 2, 2, 5, 5, 6, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_aventura_inventario`
--

CREATE TABLE `tb_aventura_inventario` (
  `id` int(11) UNSIGNED NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `status` int(1) DEFAULT '1',
  `heroi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_aventura_inventario`
--

INSERT INTO `tb_aventura_inventario` (`id`, `descricao`, `quantidade`, `tipo`, `status`, `heroi_id`) VALUES
(25, 'Moeda de ouro', 16, 1, 1, 1),
(26, 'Espada', 1, 3, 1, 5),
(27, 'Armadura de couro', 1, 3, 1, 5),
(28, 'Mochila', 1, 3, 1, 5),
(30, 'Provisões', 10, 2, 1, 5),
(31, 'Moedas de ouro', 13, 1, 1, 6),
(32, 'Alimentação', 1, 2, 1, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_aventura_rota`
--

CREATE TABLE `tb_aventura_rota` (
  `id` int(11) NOT NULL,
  `heroi_id` int(11) NOT NULL,
  `rota` int(11) DEFAULT NULL,
  `rota_id` int(11) DEFAULT NULL,
  `contexto` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_aventura_rota`
--

INSERT INTO `tb_aventura_rota` (`id`, `heroi_id`, `rota`, `rota_id`, `contexto`) VALUES
(1, 1, 1, 0, 0),
(5, 1, 178, 1, 0),
(6, 5, 1, 0, 0),
(7, 6, 1, 0, 0),
(8, 6, 218, 7, 0),
(9, 6, 254, 8, 0),
(10, 6, 371, 9, 0),
(11, 6, 504, 9, 0),
(12, 6, 486, 9, 0),
(13, 6, 432, 9, 0),
(14, 6, 344, 9, 0),
(15, 6, 81, 13, 0),
(16, 6, 23, 15, 0),
(17, 6, 138, 15, 0),
(18, 6, 292, 15, 0),
(19, 6, 171, 18, 0),
(20, 6, 294, 18, 0),
(21, 6, 90, 19, 0),
(22, 6, 75, 19, 0),
(23, 6, 43, 21, 0),
(24, 6, 145, 23, 0),
(25, 6, 243, 23, 0),
(26, 6, 257, 23, 0),
(27, 6, 294, 23, 0),
(28, 6, 273, 24, 0),
(29, 6, 283, 24, 0),
(30, 6, 100, 29, 0),
(31, 6, 294, 29, 0),
(32, 6, 243, 29, 0),
(33, 6, 257, 29, 0),
(34, 6, 29, 32, 0),
(35, 6, 294, 34, 0),
(36, 6, 244, 35, 0),
(37, 6, 328, 35, 0),
(38, 6, 261, 36, 0),
(39, 6, 269, 36, 0),
(40, 6, 33, 36, 0),
(41, 6, 263, 36, 0),
(42, 6, 240, 41, 0),
(43, 6, 160, 41, 0),
(44, 6, 318, 42, 0),
(45, 6, 160, 42, 0),
(46, 6, 202, 45, 0),
(47, 6, 165, 45, 0),
(48, 6, 110, 47, 0),
(49, 6, 331, 48, 0),
(50, 6, 282, 48, 0),
(51, 6, 140, 48, 0),
(52, 6, 227, 50, 0),
(53, 6, 15, 52, 0),
(54, 6, 211, 52, 2),
(56, 7, 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_aventura_criatura`
--
ALTER TABLE `tb_aventura_criatura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `heroi_id` (`heroi_id`);

--
-- Indexes for table `tb_aventura_heroi`
--
ALTER TABLE `tb_aventura_heroi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_aventura_inventario`
--
ALTER TABLE `tb_aventura_inventario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `heroi_id` (`heroi_id`);

--
-- Indexes for table `tb_aventura_rota`
--
ALTER TABLE `tb_aventura_rota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `heroi_id` (`heroi_id`),
  ADD KEY `rota_id` (`rota_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_aventura_criatura`
--
ALTER TABLE `tb_aventura_criatura`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_aventura_heroi`
--
ALTER TABLE `tb_aventura_heroi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_aventura_inventario`
--
ALTER TABLE `tb_aventura_inventario`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tb_aventura_rota`
--
ALTER TABLE `tb_aventura_rota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_aventura_criatura`
--
ALTER TABLE `tb_aventura_criatura`
  ADD CONSTRAINT `tb_aventura_criatura_ibfk_1` FOREIGN KEY (`heroi_id`) REFERENCES `tb_aventura_heroi` (`id`);

--
-- Limitadores para a tabela `tb_aventura_inventario`
--
ALTER TABLE `tb_aventura_inventario`
  ADD CONSTRAINT `tb_aventura_inventario_ibfk_1` FOREIGN KEY (`heroi_id`) REFERENCES `tb_aventura_heroi` (`id`);

--
-- Limitadores para a tabela `tb_aventura_rota`
--
ALTER TABLE `tb_aventura_rota`
  ADD CONSTRAINT `tb_aventura_rota_ibfk_1` FOREIGN KEY (`heroi_id`) REFERENCES `tb_aventura_heroi` (`id`);
