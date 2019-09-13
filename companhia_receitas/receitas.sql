-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Jul-2019 às 06:41
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `receitas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `cod_user` int(11) NOT NULL,
  `tipo_user` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `sobrenome` varchar(120) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `restricao` varchar(300) DEFAULT NULL,
  `senha` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE ingredientes (
id_ingrediente int(11) PRIMARY KEY,
nome_ingrediente varchar(100)
);

CREATE TABLE receitas (
cod_restricao int(11) PRIMARY KEY,
id_usuario int(11),
FOREIGN KEY(id_usuario) REFERENCES usuario (id_usuario)
);

CREATE TABLE categoria (
id_categoria int(11) PRIMARY KEY,
desc_cat_receita varchar(100)
);

CREATE TABLE cat_receita (
cod_restricao int(11),
id_categoria int(11),
restricao varchar(100),
FOREIGN KEY(cod_restricao) REFERENCES receitas (cod_restricao),
FOREIGN KEY(id_categoria) REFERENCES categoria (id_categoria)
);

CREATE TABLE ingred_receita (
cod_restricao int(11),
id_ingrediente int(11),
FOREIGN KEY(cod_restricao) REFERENCES receitas (cod_restricao),
FOREIGN KEY(id_ingrediente) REFERENCES ingredientes (id_ingrediente)
);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

ALTER TABLE ingred_receita ADD FOREIGN KEY(cod_restricao) REFERENCES receitas (cod_restricao);


INSERT INTO ingredientes(id_ingrediente,nome_ingrediente) VALUES (20001,'Abacaxi'),(20002,'Morango'),(20003,'Cenoura'),(20004,'Ovo'),(20005,'Batata'),(20006,'jiló');

INSERT INTO ingred_receita(cod_restricao) VALUES (00001),(00002),(00003);

INSERT INTO categoria(id_categoria,desc_cat_receita) VALUES (90001, 'Emagrecimento');

INSERT INTO cat_receita(restricao,) VALUES ('intolerancia a lactose'),('intolerancia a gluten'),('vegano');

INSERT INTO usuario(id_usuario,cpf,restricao_usu,nome_usu) VALUES ('1','066.279.870-82','intolerancia a lactose' ,'João'),('2','979.031.010-21','intolerancia a gluten','Ohana'),('3','383.886.920-62','vegano','Gabrielle'),('4','381.303.780-00','intolerancia a gluten','Nicolas'),('5','245.639.784-90','intolerancia a lactose','Leonardo');

INSERT INTO receitas(cod_restrição,id_usuario) VALUES ('11','1'),('22','2'),('33','3'),('44','4')
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
