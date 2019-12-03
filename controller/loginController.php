<?php
session_start();

require_once '../dao/loginDAO.php';

$usuario = $_POST["user"];
$senha = md5($_POST["senha"]);

$loginDAO = new loginDAO();
$usuario = $loginDAO->login($usuario, $senha);

if (!empty($usuario)) {
    $_SESSION["funcionarios_idfuncionario"] = $usuario["funcionarios_idfuncionario"];
    $_SESSION["usuario"] = $usuario["usuario"]; 
    $_SESSION["perfil"] = $usuario["perfil"]; 
    echo "<script>";
    echo "window.location = '../view/home.php';";
    echo "</script>";
} else {
    $msg = "Login ou Senha Inválidos!";
    echo "<script>";
    echo "window.location = '../index.php?msg={$msg}';";
    echo "</script>";
}