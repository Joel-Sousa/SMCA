<?php

require_once '../dto/funcionarioDTO.php';
require_once '../dao/funcionarioDAO.php';
require_once '../dto/usuarioDTO.php';

//recuperar os dados do formulario
$datadia = $_POST["datadia"];
$datames = $_POST["datames"];
$dataano = $_POST["dataano"];

$datanasc = $dataano."-".$datames."-".$datadia;

//Data atual
$dia = date ("d");
$mes = date ("m");
$ano = date ("Y");
//Data do aniversário
$dianasc = $datadia;
$mesnasc = $datames;
$anonasc = $dataano;
//Calculando sua idade
$idade = $ano - $anonasc;
if ($mes < $mesnasc){
$idade;
//echo $idade;
}
elseif ($mes == $mesnasc and $dia <= $dianasc) {
$idade;
//echo $datames;
}
else{
//echo $idade;
}
//echo $datanasc;
//echo "<br>";
//echo $idade;

$nome = ucfirst($_POST["nome"]);
$sobrenome = ucfirst($_POST["sobrenome"]);
$idade = $idade;
$cpf = $_POST["cpf"];
$datanascimento = $datanasc;
$sexo = $_POST["sexo"];
$celular = $_POST["celular"];
$endereco = ucfirst($_POST["endereco"]);
$cidade = ucfirst($_POST["cidade"]);
$estado = $_POST["estado"];
//-------------------------------
$usuario = $_POST["usuario"];
$senha = md5($_POST["senha"]);
$idperfil = $_POST["perfil"];

$funcionarioDTO = new FuncionarioDTO();
$funcionarioDTO->setNome($nome);
$funcionarioDTO->setSobrenome($sobrenome);
$funcionarioDTO->setIdade($idade);
$funcionarioDTO->setCpf($cpf);
$funcionarioDTO->setDatanascimento($datanascimento);
$funcionarioDTO->setSexo($sexo);
$funcionarioDTO->setCelular($celular);
$funcionarioDTO->setEndereco($endereco);
$funcionarioDTO->setCidade($cidade);
$funcionarioDTO->setEstado($estado);

$usurioDTO = new UsuarioDTO();
$usurioDTO->setUsuario($usuario);
$usurioDTO->setSenha($senha);
$usurioDTO->setIdperfil($idperfil);


$funcionarioDAO = new FuncionarioDAO();

$y = $funcionarioDAO->getFuncionarioByCpfP($_POST["cpf"]);
$x = $funcionarioDAO->getFuncionarioByUsuarioP($_POST["usuario"]);

if (!empty($_POST["cpf"]) && !empty($_POST["usuario"])){
    $y = $funcionarioDAO->getFuncionarioByCpfP($_POST["cpf"]);
    $x = $funcionarioDAO->getFuncionarioByUsuarioP($_POST["usuario"]);
    if($y['cpf'] == $_POST['cpf']){
            echo "<script>";
            echo "alert('Cpf Ja Cadastrado!')";
            echo "</script>";
            echo "<script>";
            echo "javascript:window.history.back(1);";
            echo "</script>";
    }elseif($x['usuario'] == $_POST['usuario']){
        echo "<script>";
            echo "alert('Usuario Ja Cadastrado!')";
            echo "</script>";
            echo "<script>";
            echo "javascript:window.history.back(1);";
            echo "</script>";
    }elseif ($y["cpf"] != $_POST["cpf"] && $x["usuario"] != $_POST["usuario"]) {
        $y = $funcionarioDAO->getFuncionarioByCpfP($_POST["cpf"]);
        $x = $funcionarioDAO->getFuncionarioByUsuarioP($_POST["usuario"]);
        
        $funcionarioDAO->salvar($funcionarioDTO, $usurioDTO);
        echo "<script>";
        echo "alert('Funcionario Cadastrado com Sucesso!')";
        echo "</script>";
        echo "<script>";
        echo "window.location='../view/home.php'";
        echo "</script>";
        
    }elseif (empty ($_POST["usuario"]) || empty ($_POST["cpf"])) {
            echo "<script>";
            echo "alert('CPF e Ususario Sao Necessarios!')";
            echo "</script>";
            echo "<script>";
            echo "javascript:window.history.back(1);";
            echo "</script>";
    }
    
}else{
    echo "<script>";
            echo "alert('Cpf e Usuario Sao Necessarios!')";
            echo "</script>";
            echo "<script>";
            echo "window.location='../view/cadastrarFuncionario.php?';";
            echo "</script>";
    
}

//$funcionarioDAO = new FuncionarioDAO();
//$status = $funcionarioDAO->salvar($funcionarioDTO, $usurioDTO);
//
//if(isset($status)){
//    echo "<script>";
//    echo "alert('Funcionario Cadastrado com Sucesso!')";
//    echo "</script>";
//    echo "<script>";
//    echo "window.location='../view/principal.php'";
//    echo "</script>";
//    
//}else{
//    $msg = "Funcionario Nao Cadastrado!";
//    echo "<script>";
//    echo "alert('Funcionario Nao Cadastrado!')";
//    echo "</script>";
//    echo "<script>";
//    echo "window.location='../view/cadastrarFuncionario.php?msg={$msg}'";
//    echo "</script>";
//} 
?>

