<?php
require_once '../dao/funcionarioDAO.php';
$idusuario = $_GET["iduser"];

$funcionarioDAO = new FuncionarioDAO();
$funcionarioDAO->deleteById($idusuario);


echo "<script>";
echo "alert('Funcinario Excluido com Sucesso!')";
echo "</script>";

echo "<script>";
echo "window.location = '../view/listarFuncionarios.php';";
echo "</script>";
?>
