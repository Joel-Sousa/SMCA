-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14-Dez-2016 às 21:36
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smca`
--
CREATE DATABASE smca; 

USE smca;
-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `idaluno` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `idade` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  `cpf` varchar(100) NOT NULL,
  `datanascimento` date NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `celular` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `perfil_idperfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`idaluno`, `nome`, `sobrenome`, `idade`, `matricula`, `cpf`, `datanascimento`, `sexo`, `celular`, `endereco`, `cidade`, `estado`, `imagem`, `status`, `perfil_idperfil`) VALUES
(23, 'Leticia', 'Silvas', 17, 22222222, '309.265.817-59', '1999-05-04', 'Feminino', '(22) 22222-2222', 'Qnn 17', 'Aguas', 'Goias', '../imagensCadastro/4fe9becb34e6403bc28d4e4cd4c5595d.jpg', 'Regular', 3),
(24, 'Joao', 'Gomes', 17, 11111111, '850.379.462-47', '1999-02-05', 'Masculino', '(55) 55555-5555', 'Qnn 4', 'Jos', 'Goias', '../imagensCadastro/f38a3877c3cf03102d1c810d2f933fba.jpg', 'Pendente', 3),
(26, 'Julia', 'Silva', 16, 96006469, '742.810.659-11', '2000-03-12', 'Feminino', '(11) 11111-1111', 'Qnn 3', 'Ceilandia', 'Distrito Federal', '../imagensCadastro/1cc13261c6aa09c476f277ecf992b11b.jpg', 'Regular', 3),
(27, 'Caio', 'Gomes', 17, 52756042, '548.061.329-42', '1999-10-04', 'Masculino', '(44) 44444-4444', 'Qnn 6', 'Psul', 'Distrito Federal', '../imagensCadastro/eff2b49188d651d47d0ff85e8118afe1.jpg', 'Regular', 3),
(28, 'Estevam', 'Chagas', 22, 39690551, '871.590.426-11', '1994-12-05', 'Masculino', '(77) 77777-7777', 'Qnn 7', 'Taguatinga', 'Distrito Federal', '../imagensCadastro/default.jpg', 'Regular', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `idfuncionario` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `idade` int(11) NOT NULL,
  `cpf` varchar(100) DEFAULT NULL,
  `datanascimento` varchar(100) DEFAULT NULL,
  `sexo` varchar(100) DEFAULT NULL,
  `celular` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `usuarios_idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`idfuncionario`, `nome`, `sobrenome`, `idade`, `cpf`, `datanascimento`, `sexo`, `celular`, `endereco`, `cidade`, `estado`, `usuarios_idusuario`) VALUES
(1, 'Administrador', 'Sousa', 21, '871.590.426-11', '1995-02-18', 'Masculino', '(11) 11111-1111', 'Qnn17', 'Ceilandia', 'Distrito Federal', 10),
(20, 'Pedro', 'Sous', 19, '742.810.659-11', '1997-11-21', 'Masculino', '(22) 22222-2222', 'Qnn 17', 'Aguas', 'Distrito Federal', 31),
(21, 'Migue', 'Neto', 27, '309.265.817-59', '1989-05-4', 'Masculino', '(33) 33333-3333', 'Qnn 3', 'Ceilandia', 'Distrito Federal', 32),
(22, 'Joe', 'Sousa', 21, '548.061.329-42', '1995-02-4', 'Masculino', '(44) 44444-4444', 'Qnnn', 'Agas', 'Goias', 33),
(25, 'Felipe', 'Hedriric', 19, '850.379.462-47', '1997-08-4', 'Masculino', '(77) 77777-7777', 'Qnn 56q', 'Aguas', 'Goias', 36);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `idhistorioco` int(11) NOT NULL,
  `alunos_idaluno` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `matricula` int(11) NOT NULL,
  `status` varchar(45) NOT NULL,
  `hora` varchar(100) NOT NULL,
  `data` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`idhistorioco`, `alunos_idaluno`, `nome`, `matricula`, `status`, `hora`, `data`) VALUES
(1, 24, 'Joao', 27781372, 'Pendente', '11:28', '14/12/2016'),
(2, 23, 'Leticia', 22222222, 'Regular', '11:28', '14/12/2016'),
(3, 23, 'Leticia', 22222222, 'Regular', '12:46', '14/12/2016'),
(4, 24, 'Joao', 11111111, 'Pendente', '18:30', '14/12/2016');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `idperfil` int(11) NOT NULL,
  `perfil` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`idperfil`, `perfil`) VALUES
(1, 'Administrador'),
(2, 'Funcionario'),
(3, 'Aluno');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `funcionarios_idfuncionario` int(11) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `perfil_idperfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`funcionarios_idfuncionario`, `usuario`, `senha`, `perfil_idperfil`) VALUES
(0, 'root', 'c6f057b86584942e415435ffb1fa93d4', 1),
(10, 'adm', '202cb962ac59075b964b07152d234b70', 1),
(31, 'pedro', '202cb962ac59075b964b07152d234b70', 2),
(32, 'miguel', '202cb962ac59075b964b07152d234b70', 2),
(33, 'joe', '202cb962ac59075b964b07152d234b70', 1),
(36, 'felipe', '202cb962ac59075b964b07152d234b70', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`idaluno`),
  ADD KEY `idperfil_idx` (`perfil_idperfil`);

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`idfuncionario`),
  ADD KEY `fk_cliente_usuario1_idx` (`usuarios_idusuario`);

--
-- Indexes for table `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`idhistorioco`),
  ADD KEY `alunos_idaluno_idx` (`alunos_idaluno`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idperfil`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`funcionarios_idfuncionario`),
  ADD KEY `fk_usuario_perfil_idx` (`perfil_idperfil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
  MODIFY `idaluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `idfuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `historico`
--
ALTER TABLE `historico`
  MODIFY `idhistorioco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idperfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `funcionarios_idfuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `idperfil` FOREIGN KEY (`perfil_idperfil`) REFERENCES `perfil` (`idperfil`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `fk_cliente_usuario1` FOREIGN KEY (`usuarios_idusuario`) REFERENCES `usuarios` (`funcionarios_idfuncionario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `alunos_idaluno` FOREIGN KEY (`alunos_idaluno`) REFERENCES `alunos` (`idaluno`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuario_perfil` FOREIGN KEY (`perfil_idperfil`) REFERENCES `perfil` (`idperfil`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
