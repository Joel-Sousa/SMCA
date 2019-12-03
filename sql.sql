-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 14-Abr-2019 às 11:30
-- Versão do servidor: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.0.33-6+ubuntu18.04.1+deb.sury.org+3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smca`
--

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
(29, 'Pedro', 'Sousa', 24, 91597103, '524.998.280-80', '1995-06-04', 'Masculino', '(99) 99999-9999', 'Qnn 14', 'Ceilandia', 'Distrito Federal', '../imagensCadastro/3a6e6eb7a0116b6425076486274885ed.jpeg', 'Regular', 3),
(30, 'Karla', 'Sousa', 24, 87123871, '010.566.360-33', '1995-02-06', 'Feminino', '(88) 88888-8888', 'Quadra 13', 'Aguas lindas', 'Goias', '../imagensCadastro/71d988ec72de695b7f746203c4038dc4.jpeg', 'Regular', 3),
(31, 'Cristina', 'Sousa', 24, 39370798, '460.334.510-07', '1995-05-07', 'Feminino', '(77) 77777-7777', 'Qnn 14', 'Taguatinga', 'Distrito Federal', '../imagensCadastro/9bf274a0414d11ea9750a6648735c5aa.jpeg', 'Regular', 3),
(32, 'Diana', 'Silva', 24, 51811843, '658.602.180-44', '1995-06-08', 'Feminino', '(66) 66666-6666', 'Quadra 13', 'Taguatinga', 'Distrito Federal', '../imagensCadastro/8fc52c116fe8bca2b96f81eb15a8bd2f.jpeg', 'Pendente', 3);

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
(27, 'Felipe', 'Sousa', 24, '830.641.592-24', '1995-01-01', 'Masculino', '(99) 99999-9999', 'Qnn 17', 'Ceilandia', 'Distrito Federal', 38),
(28, 'Patricia', 'Silva', 24, '137.179.820-60', '1995-05-12', 'Feminino', '(88) 88888-8888', 'Quadra 13', 'Aguas lindas', 'Goias', 39),
(29, 'Fernando', 'Sousa', 24, '273.772.810-06', '1995-03-5', 'Masculino', '(77) 77777-7777', 'Qnn 14', 'Aguas claras', 'Distrito Federal', 40);

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
(1, 29, 'Pedro', 91597103, 'Regular', '11:28', '13/04/2019'),
(2, 30, 'Karla', 87123871, 'Regular', '11:29', '13/04/2019'),
(3, 31, 'Cristina', 39370798, 'Regular', '11:30', '13/04/2019'),
(4, 32, 'Diana', 51811843, 'Pendente', '11:31', '13/04/2019');

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
(10, 'Joel', '202cb962ac59075b964b07152d234b70', 1),
(38, 'Felipe', '81dc9bdb52d04dc20036dbd8313ed055', 2),
(39, 'patricia', '81dc9bdb52d04dc20036dbd8313ed055', 2),
(40, 'Fernando', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(43, 'root', '202cb962ac59075b964b07152d234b70', 1);

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
  MODIFY `idaluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `idfuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `historico`
--
ALTER TABLE `historico`
  MODIFY `idhistorioco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idperfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `funcionarios_idfuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
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
