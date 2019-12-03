<?php
require_once '../dao/alunoDAO.php';
$idaluno = $_GET["id"];

$alunoDAO = new AlunoDAO();
$alunoDAO->deleteById($idaluno);

echo "<script>";
echo "alert('Aluno Excluido com Sucesso!')";
echo "</script>";

echo "<script>";
echo "window.location = '../view/listarAlunos.php';";
echo "</script>";
?>
