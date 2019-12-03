<?php

// verifica se foi enviado um arquivo 
if (isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0) {

    //  echo "Você enviou o arquivo: <strong>" . $_FILES['arquivo']['name'] . "</strong><br />";
    //  echo "Este arquivo é do tipo: <strong>" . $_FILES['arquivo']['type'] . "</strong><br />";
    //  echo "Temporáriamente foi salvo em: <strong>" . $_FILES['arquivo']['tmp_name'] . "</strong><br />";
    //  echo "Seu tamanho é: <strong>" . $_FILES['arquivo']['size'] . "</strong> Bytes<br /><br />";

    $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
    $nome = $_FILES['arquivo']['name'];

    // Pega a extensao
    $extensao = strrchr($nome, '.');

    // Converte a extensao para mimusculo
    $extensao = strtolower($extensao);

    // Somente imagens, .jpg;.jpeg;.gif;.png
    // Aqui eu enfilero as extesões permitidas e separo por ';'
    // Isso server apenas para eu poder pesquisar dentro desta String
    if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
        // Cria um nome único para esta imagem
        // Evita que duplique as imagens no servidor.
        $novoNome = md5(microtime()) . $extensao;

        // Concatena a pasta com o nome
        $destino = '../imagensCadastro/' . $novoNome;

        // tenta mover o arquivo para o destino
        if (@move_uploaded_file($arquivo_tmp, $destino)) {
            //echo "Arquivo salvo com sucesso em : <strong>" . $destino . "</strong><br />";
            // echo "<img src=\"" . $destino . "\" />";
        } else
            echo "Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />";
    } else
        echo "Você poderá enviar apenas arquivos \"*.jpg;*.jpeg;*.gif;*.png\"<br />";
        //echo "<script>";
        //echo "</script>";
}
?>

<?php

require_once '../dto/alunoDTO.php';
require_once '../dao/alunoDAO.php';

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


if(empty($destino)){
    $destino = "../imagensCadastro/default.jpg";
}

//recuperar os dados do formulario
$nome = ucfirst($_POST["nome"]);
$sobrenome = ucfirst($_POST["sobrenome"]);
$idade = $idade;
$matricula = $_POST["matricula"];
$cpf = $_POST["cpf"];
$datanascimento = $datanasc;
$sexo = $_POST["sexo"];
$celular = $_POST["celular"];
$endereco = ucfirst($_POST["endereco"]);
$cidade = ucfirst($_POST["cidade"]);
$estado = $_POST["estado"];
$imagem = $destino;
$status = $_POST["status"];
$idperfil = $_POST["idperfil"];
//-------------------------------

$alunoDTO = new AlunoDTO();
$alunoDTO->setNome($nome);
$alunoDTO->setSobrenome($sobrenome);
$alunoDTO->setIdade($idade);
$alunoDTO->setMatricula($matricula);
$alunoDTO->setCpf($cpf);
$alunoDTO->setDatanascimento($datanascimento);
$alunoDTO->setSexo($sexo);
$alunoDTO->setCelular($celular);
$alunoDTO->setEndereco($endereco);
$alunoDTO->setCidade($cidade);
$alunoDTO->setEstado($estado);
$alunoDTO->setImagem($imagem);
$alunoDTO->setStatus($status);
$alunoDTO->setIdperfil($idperfil);

$alunoDAO = new AlunoDAO();

$y = $alunoDAO->getAlunoByCpfP($_POST["cpf"]);
$x = $alunoDAO->getAlunoByMatriculaP($_POST["matricula"]);

if (!empty($_POST["cpf"]) && !empty($_POST["matricula"])){
    $y = $alunoDAO->getAlunoByCpfP($_POST["cpf"]);
    $x = $alunoDAO->getAlunoByMatriculaP($_POST["matricula"]);
    if($y['cpf'] == $_POST['cpf']){
            echo "<script>";
            echo "alert('Cpf Ja Cadastrado!')";
            echo "</script>";
            echo "<script>";
            echo "javascript:window.history.back(1);";
            echo "</script>";
    }elseif($x['matricula'] == $_POST['matricula']){
            echo "<script>";
            echo "alert('Matricula Ja Cadastrada!')";
            echo "</script>";
            echo "<script>";
            echo "javascript:window.history.back(1);";
            echo "</script>";
    }elseif ($y["cpf"] != $_POST["cpf"] && $x["matricula"] != $_POST["matricula"]) {
        $y = $alunoDAO->getAlunoByCpfP($_POST["cpf"]);
        $x = $alunoDAO->getAlunoByMatriculaP($_POST["matricula"]);
        
        $alunoDAO->salvar($alunoDTO);
        echo "<script>";
        echo "alert('Aluno Cadastrado com Sucesso!')";
        echo "</script>";
        echo "<script>";
        echo "window.location='../view/listarAlunos.php'";
        echo "</script>";
    
        
    }elseif (empty ($_POST["matricula"]) || empty ($_POST["cpf"])) {
            echo "<script>";
            echo "alert('Matricula e CPF Sao Necessarios!')";
            echo "</script>";
            echo "<script>";
            echo "javascript:window.history.back(1);";
            echo "</script>";
    }
    
}else{
            echo "<script>";
            echo "alert('Matricula e CPF Sao Necessarios!')";
            echo "</script>";
            echo "<script>";
            echo "javascript:window.history.back(1);";
            echo "</script>";
}

//
//$alunoDAO = new AlunoDAO();
//$status = $alunoDAO->salvar($alunoDTO);
//
//if(isset($status)){
//    echo "<script>";
//    echo "alert('Aluno Cadastrado com Sucesso!')";
//    echo "</script>";
//    echo "<script>";
//    echo "window.location='../view/principal.php'";
//    echo "</script>";
//    
//}else{
//    $msg = "Aluno Nao Cadastrado!";
//    echo "<script>";
//    echo "alert('Aluno Nao Cadastrado!')";
//    echo "</script>";
//    echo "<script>";
//    echo "window.location='../view/cadastrarAluno.php?msg={$msg}'";
//    echo "</script>";
//} 
?>


