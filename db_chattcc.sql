-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Jun-2020 às 05:15
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_chattcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_amigos`
--

CREATE TABLE `tb_amigos` (
  `cd_amigos` int(100) NOT NULL,
  `cd_de` int(100) NOT NULL,
  `cd_para` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_amigos`
--

INSERT INTO `tb_amigos` (`cd_amigos`, `cd_de`, `cd_para`) VALUES
(1, 3, 2),
(2, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_grupo`
--

CREATE TABLE `tb_grupo` (
  `cd_grupo` int(100) NOT NULL,
  `nm_grupo` varchar(100) NOT NULL,
  `cd_part1` int(100) NOT NULL,
  `cd_part2` int(100) NOT NULL,
  `cd_part3` int(100) NOT NULL,
  `cd_part4` int(100) DEFAULT NULL,
  `cd_part5` int(100) DEFAULT NULL,
  `ds_imagem_grupo` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_grupo`
--

INSERT INTO `tb_grupo` (`cd_grupo`, `nm_grupo`, `cd_part1`, `cd_part2`, `cd_part3`, `cd_part4`, `cd_part5`, `ds_imagem_grupo`) VALUES
(1, 'primeiro grupo', 2, 3, 0, 0, 1, '../img/ 15860155475e88ad3b72610.jpg'),
(2, 'outro grupo', 2, 0, 0, 0, 1, '../img/ 15864771005e8fb82c1cbba.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_grupo_msn`
--

CREATE TABLE `tb_grupo_msn` (
  `cd_msn_grupo` int(100) NOT NULL,
  `cd_grupo` int(100) NOT NULL,
  `ds_msn_grupo` varchar(220) NOT NULL,
  `cd_de_grupo` int(100) NOT NULL,
  `hr_hora` varchar(50) NOT NULL,
  `dt_hora` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_grupo_msn`
--

INSERT INTO `tb_grupo_msn` (`cd_msn_grupo`, `cd_grupo`, `ds_msn_grupo`, `cd_de_grupo`, `hr_hora`, `dt_hora`) VALUES
(1, 1, 'ola grupo', 1, '14:23', '04/04/20'),
(2, 1, 'ola mundo!! nÃ£o sou obrigada a nada', 1, '15:34:42', '04/04/20'),
(3, 1, 'conversa comigo', 2, '15:35:53', '04/04/20'),
(4, 1, 'sdcsvdss', 2, '15:52:56', '04/04/20'),
(5, 1, 'NÃ£o acredite em algo simplesmente porque ouviu. NÃ£o acredite em algo simplesmente porque todos falam a respeito. NÃ£o acredite em algo simplesmente porque estÃ¡ escrito em seus livros religiosos. NÃ£o acredite em algo ', 2, '16:05:53', '04/04/20'),
(6, 1, 'olha ela em ', 1, '16:06:49', '04/04/20'),
(7, 2, 'ola mundo', 1, '14:23', '04/04/20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_msn`
--

CREATE TABLE `tb_msn` (
  `cd_msn` int(100) NOT NULL,
  `cd_para` int(100) NOT NULL,
  `cd_de` int(100) NOT NULL,
  `ds_msn` varchar(220) NOT NULL,
  `hr_hora` varchar(50) NOT NULL,
  `dt_data` varchar(60) NOT NULL,
  `ds_arquivo` varchar(220) DEFAULT NULL,
  `nm_arquivo` varchar(220) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_msn`
--

INSERT INTO `tb_msn` (`cd_msn`, `cd_para`, `cd_de`, `ds_msn`, `hr_hora`, `dt_data`, `ds_arquivo`, `nm_arquivo`) VALUES
(111, 1, 2, 'Oi!!! agora somos amigos!!!', '13:48:32', '13/04/20', NULL, NULL),
(112, 2, 3, 'Oi!!! agora somos amigos!!!', '14:01:22', '13/04/20', NULL, NULL),
(114, 2, 1, '', '20:29:43', '13/04/20', '../img/ 15868205835e94f5e7152e4.sql', 'db_chattcc (13)04(2020).sql'),
(115, 0, 1, 'oi', '21:24:17', '13/04/20', NULL, NULL),
(116, 0, 1, 'oi', '21:29:25', '13/04/20', NULL, NULL),
(117, 1, 1, 'Oi!!! agora somos amigos!!!', '22:07:02', '13/04/20', NULL, NULL),
(118, 6, 6, 'Oi!!! agora somos amigos!!!', '15:27:10', '14/04/20', NULL, NULL),
(119, 6, 6, '', '15:27:24', '14/04/20', '../img/ 15868888445e96008c48d4d.docx', '_15865384805e90a7f095cdc.docx'),
(120, 6, 6, 'ðŸ˜¥ðŸ˜¥ðŸ˜©ðŸ™ðŸ™ðŸ™', '15:27:36', '14/04/20', NULL, NULL),
(121, 6, 5, 'Oi!!! agora somos amigos!!!', '15:29:00', '14/04/20', NULL, NULL),
(122, 6, 5, '', '15:29:12', '14/04/20', '', 'emoji (2).png'),
(123, 6, 5, '', '15:29:21', '14/04/20', '../img/ 15868889615e960101a4aed.docx', '_15865384805e90a7f095cdc.docx'),
(124, 5, 6, 'oi tudo bem ? ', '15:29:37', '14/04/20', NULL, NULL),
(125, 6, 5, 'tudo e com vc ?', '15:29:47', '14/04/20', NULL, NULL),
(126, 6, 5, 'ðŸ˜–ðŸ˜–', '15:29:54', '14/04/20', NULL, NULL),
(127, 5, 6, 'modo escuro', '15:36:19', '14/04/20', NULL, NULL),
(128, 6, 5, 'xdtshts', '13:40:45', '19/04/20', NULL, NULL),
(129, 3, 2, 'ola mundo', '14:04:41', '19/04/20', NULL, NULL),
(130, 6, 5, 'csdss', '23:02:46', '04/05/20', NULL, NULL),
(131, 6, 5, 'lblih', '23:39:23', '04/05/20', NULL, NULL),
(132, 1, 2, '', '14:11:40', '12/05/20', '', ''),
(133, 1, 2, '', '14:11:59', '12/05/20', '../img/ 15893035195ebad8dfc6b02.pdf', 'Itaucard_6685_fatura_202005.pdf'),
(134, 7, 7, 'Oi!!! agora somos amigos!!!', '15:33:51', '12/05/20', NULL, NULL),
(135, 7, 2, 'Oi!!! agora somos amigos!!!', '15:34:16', '12/05/20', NULL, NULL),
(136, 7, 2, 'ola tudo bem', '15:34:33', '12/05/20', NULL, NULL),
(137, 7, 2, 'ola mundo', '15:35:00', '12/05/20', NULL, NULL),
(138, 2, 7, 'enviar', '15:35:10', '12/05/20', NULL, NULL),
(139, 7, 2, '', '15:35:20', '12/05/20', '', 'MicrosoftTeams-image.png'),
(140, 7, 2, '', '15:35:29', '12/05/20', '../img/ 15893085295ebaec7158b71.pdf', 'Itaucard_6685_fatura_202005.pdf'),
(141, 7, 2, 'ðŸ˜¨ðŸ˜¨ðŸ˜“ðŸ˜“', '15:35:45', '12/05/20', NULL, NULL),
(142, 2, 2, 'Oi!!! agora somos amigos!!!', '14:36:45', '02/06/20', NULL, NULL),
(143, 2, 2, 'oi minha gata ', '14:36:57', '02/06/20', NULL, NULL),
(144, 2, 2, 'ola minha linda', '14:37:03', '02/06/20', NULL, NULL),
(145, 2, 3, 'Â Â Â Â ola\r\n', '13:52:03', '06/06/20', NULL, NULL),
(146, 2, 3, 'Â Â Â Â ðŸ˜µðŸ’©ðŸ‘¿ðŸ‘³â€â™€ï¸ðŸ‘³â€â™‚ï¸\r\n\r\n\r\n', '18:09:29', '07/06/20', NULL, NULL),
(147, 1, 2, '', '20:38:25', '08/06/20', '../img/ 15916595055edecbf138fc9.docx', 'karl Marx.docx'),
(148, 7, 2, 'Â Â Â Â pora\r\n', '21:14:11', '08/06/20', NULL, NULL),
(149, 5, 2, 'Oi!!! agora somos amigos!!!', '21:22:00', '08/06/20', NULL, NULL),
(150, 5, 2, 'Â Â Â Â ola amigo\r\n', '21:22:32', '08/06/20', NULL, NULL),
(151, 2, 5, 'Â Â Â Â como vai vc ? \r\n', '21:22:41', '08/06/20', NULL, NULL),
(152, 5, 2, 'Â Â Â Â tudo bem e com vc ? \r\n', '21:22:52', '08/06/20', NULL, NULL),
(153, 8, 8, 'Oi!!! agora somos amigos!!!', '12:45:54', '09/06/20', NULL, NULL),
(154, 9, 9, 'Oi!!! agora somos amigos!!!', '13:48:01', '09/06/20', NULL, NULL),
(155, 9, 9, 'Â Â Â Â ola mundo \r\n', '13:48:10', '09/06/20', NULL, NULL),
(156, 9, 9, 'Â Â Â Â ðŸ˜«ðŸ˜«ðŸ˜«\r\n', '13:48:18', '09/06/20', NULL, NULL),
(157, 9, 8, 'Oi!!! agora somos amigos!!!', '13:49:26', '09/06/20', NULL, NULL),
(158, 9, 8, 'Â Â Â Â ola amigo\r\n', '13:49:42', '09/06/20', NULL, NULL),
(159, 9, 8, 'Â Â Â Â ðŸ˜ªðŸ˜ª ola \r\n', '13:50:05', '09/06/20', NULL, NULL),
(160, 9, 8, '', '13:50:36', '09/06/20', '', ''),
(161, 9, 8, '', '13:50:47', '09/06/20', '../img/ 15917214475edfbde751d2a.doc', 'modelodtcc(1).doc'),
(162, 9, 5, 'Â Â Â Â ola\r\n', '14:03:15', '10/06/20', NULL, NULL),
(163, 3, 3, 'Â Â Â Â oi\r\n', '02:55:10', '16/06/20', NULL, NULL),
(164, 10, 10, 'Oi!!! agora somos amigos!!!', '03:47:03', '16/06/20', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_notify`
--

CREATE TABLE `tb_notify` (
  `cd_notify` int(100) NOT NULL,
  `cd_de` int(100) NOT NULL,
  `cd_para` int(100) NOT NULL,
  `ds_notify` varchar(220) NOT NULL,
  `dt_data` varchar(220) NOT NULL,
  `hr_hora` varchar(220) NOT NULL,
  `ds_img` varchar(220) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_notify`
--

INSERT INTO `tb_notify` (`cd_notify`, `cd_de`, `cd_para`, `ds_notify`, `dt_data`, `hr_hora`, `ds_img`) VALUES
(10, 6, 1, 'oi vamos ser amigos!!!', '14/04/20', '15:28:53', '../img/ 15868888095e96006943f1c.png'),
(15, 9, 7, 'oi vamos ser amigos!!!', '09/06/20', '13:47:56', '../img/ 15917212295edfbd0d1a4d2.png'),
(21, 3, 3, 'oi vamos ser amigos!!!', '16/06/20', '03:47:30', '../img/ 15827603425e570196c2762.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usu`
--

CREATE TABLE `tb_usu` (
  `cd_usu` int(100) NOT NULL,
  `nm_usu` varchar(50) NOT NULL,
  `ds_imagem` varchar(50) NOT NULL,
  `cd_senha` varchar(50) NOT NULL,
  `nm_login` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usu`
--

INSERT INTO `tb_usu` (`cd_usu`, `nm_usu`, `ds_imagem`, `cd_senha`, `nm_login`) VALUES
(1, 'wellington', '../img/ 15823054915e5010d361244.jpg', '123', 'well'),
(2, 'lania', '../img/ 15823057235e5011bb6f3be.jpg', '159', 'lany'),
(3, 'francisco', '../img/ 15827603425e570196c2762.jpg', '123', 'franc'),
(4, 'pablo', '../img/ 15868163545e94e5624a78c.png', '123', 'palha'),
(5, 'wellington', '', '1235', 'well'),
(6, 'pontes', '../img/ 15868888095e96006943f1c.png', '123', 'pontes'),
(7, 'teste', '../img/ 15893084025ebaebf24cb28.png', '123', 'teste'),
(8, 'banca09', '../img/ 15917175225edfae92bc200.png', '123', 'banca09'),
(9, 'teste', '../img/ 15917212295edfbd0d1a4d2.png', '123', 'teste2'),
(10, 'WELLINGTON FRANCISCO SOUZA PONTES', '../img/ 15922879625ee862dae79f0.jpg', '123', 'pontes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_amigos`
--
ALTER TABLE `tb_amigos`
  ADD PRIMARY KEY (`cd_amigos`);

--
-- Indexes for table `tb_grupo`
--
ALTER TABLE `tb_grupo`
  ADD PRIMARY KEY (`cd_grupo`);

--
-- Indexes for table `tb_grupo_msn`
--
ALTER TABLE `tb_grupo_msn`
  ADD PRIMARY KEY (`cd_msn_grupo`);

--
-- Indexes for table `tb_msn`
--
ALTER TABLE `tb_msn`
  ADD PRIMARY KEY (`cd_msn`);

--
-- Indexes for table `tb_notify`
--
ALTER TABLE `tb_notify`
  ADD PRIMARY KEY (`cd_notify`);

--
-- Indexes for table `tb_usu`
--
ALTER TABLE `tb_usu`
  ADD PRIMARY KEY (`cd_usu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_amigos`
--
ALTER TABLE `tb_amigos`
  MODIFY `cd_amigos` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_grupo`
--
ALTER TABLE `tb_grupo`
  MODIFY `cd_grupo` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_grupo_msn`
--
ALTER TABLE `tb_grupo_msn`
  MODIFY `cd_msn_grupo` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_msn`
--
ALTER TABLE `tb_msn`
  MODIFY `cd_msn` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `tb_notify`
--
ALTER TABLE `tb_notify`
  MODIFY `cd_notify` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_usu`
--
ALTER TABLE `tb_usu`
  MODIFY `cd_usu` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
