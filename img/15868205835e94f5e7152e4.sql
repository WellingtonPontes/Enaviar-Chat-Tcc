-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Abr-2020 às 17:32
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 5.6.40



--
-- Database: `db_chattcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_grupo`

use  id13269847_db_chattcc;
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
  `dt_data` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_msn`
--


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



--
-- Indexes for dumped tables
--

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
-- Indexes for table `tb_usu`
--
ALTER TABLE `tb_usu`
  ADD PRIMARY KEY (`cd_usu`);

--
-- AUTO_INCREMENT for dumped tables
--

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
  MODIFY `cd_msn` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `tb_usu`
--
ALTER TABLE `tb_usu`
  MODIFY `cd_usu` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

ALTER TABLE tb_msn ADD ds_arquivo varchar(220);

ALTER TABLE tb_msn ADD nm_arquivo varchar(220);

CREATE TABLE `tb_notify` (
  cd_notify int (100) AUTO_increment not null,
  cd_de int (100) not null,
  cd_para int (100) not null,
  ds_notify varchar (220) not null,
  dt_data varchar (220)not null,
  hr_hora varchar (220)not null,
  PRIMARY KEY (cd_notify)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

create table tb_amigos(
cd_amigos int (100)auto_increment not null,
cd_de int (100)not null,
cd_para int (100) not null,
PRIMARY KEY (cd_amigos)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE tb_notify ADD ds_img varchar(220);
