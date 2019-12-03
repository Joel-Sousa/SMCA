<?php
require_once '../dao/alunoDAO.php';

$alunoDAO = new AlunoDAO();
$alunoDAO->deleteHistorico();

echo "<script>";
echo "alert('Historico Limpo Com Sucesso!')";
echo "</script>";

echo "<script>";
echo "window.location = '../view/listarHistorico.php';";
echo "</script>";
?>