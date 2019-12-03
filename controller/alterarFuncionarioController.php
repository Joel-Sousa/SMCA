<?php

require_once '../dto/funcionarioDTO.php';
require_once '../dao/funcionarioDAO.php';
require_once '../dto/usuarioDTO.php';

$data = $_POST["dtnasc"];
$arrayData = explode("/", $data);

//echo $arrayData[0];
//echo '<br>';
//echo $arrayData[1];
//echo '<br>';
//echo $arrayData[2];

$dtnasc = $arrayData[2]."-".$arrayData[1]."-".$arrayData[0];

//recuperar os dados do formulario
$nome = ucfirst($_POST["nome"]);
$sobrenome = ucfirst($_POST["sobrenome"]);
$cpf = $_POST["cpf"];
$datanasc = $dtnasc;
$sexo = $_POST["sexo"];
$celular = $_POST["celular"];
$endereco = ucfirst($_POST["endereco"]);
$cidade = ucfirst($_POST["cidade"]);
$estado = $_POST["estado"];


$usuario = $_POST["usuario"];
$idperfil = $_POST["perfil"];

$idusuario = $_POST["idusuario"];
$idfuncionario = $_POST["idfuncionario"];

$funcionarioDTO = new FuncionarioDTO();
$funcionarioDTO->setNome($nome);
$funcionarioDTO->setSobrenome($sobrenome);
$funcionarioDTO->setCpf($cpf);
$funcionarioDTO->setDatanascimento($datanasc);
$funcionarioDTO->setSexo($sexo);
$funcionarioDTO->setCelular($celular);
$funcionarioDTO->setEndereco($endereco);
$funcionarioDTO->setCidade($cidade);
$funcionarioDTO->setEstado($estado);

$funcionarioDTO->setIdfuncionario($idfuncionario);

$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setUsuario($usuario);
$usuarioDTO->setIdperfil($idperfil);
$usuarioDTO->setIdusuario($idusuario);

$funcionarioDAO = new FuncionarioDAO();
$status = $funcionarioDAO->alterar($funcionarioDTO, $usuarioDTO);

if (isset($status)) {
    echo "<script>";
    echo "alert('Cadastrado Atualizado com Sucesso!')";
    echo "</script>";
    echo "<script>";
    echo "window.location='../view/listarFuncionarios.php'";
    echo "</script>";
}
?>
