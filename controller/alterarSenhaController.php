<?php

require_once '../dao/funcionarioDAO.php';
require_once '../dto/usuarioDTO.php';

$senhav = md5($_POST["senhav"]);
$senha = md5($_POST["senha"]);
$idusuario = $_POST["idusuario"];

//echo $senhav;
//echo "<br>";
//echo $senha;
//echo "<br>";
//echo $idusuario;
//echo "<br>";


$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setSenha($senha);
$usuarioDTO->setIdusuario($idusuario);

$funcionarioDAO = new FuncionarioDAO();
if (!empty(md5($_POST["senhav"]))) {
    $x = $funcionarioDAO->getSenhaV($idusuario);
    
    //echo md5($_POST["senhav"]);
    //echo "<br>";
    //echo $x["senha"];
    if ($x["senha"] != md5($_POST["senhav"])) {
        echo "<script>";
        echo "alert('Senha Invalida!')";
        echo "</script>";
        echo "<script>";
        echo "window.location='../view/alterarSenha.php';";
        echo "</script>";
    }elseif ($x["senha"] == md5($_POST["senhav"])) {
        
        $funcionarioDAO->alterarSenha($usuarioDTO);
        echo "<script>";
        echo "alert('Senha Alterada Com Sucesso!')";
        echo "</script>";
        echo "<script>";
        echo "window.location='../view/home.php'";
        echo "</script>";
    }
}
?>