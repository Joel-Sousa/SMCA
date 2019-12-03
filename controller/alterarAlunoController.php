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

$data = $_POST["dtnasc"];
$arrayData = explode("/", $data);

$dtnasc = $arrayData[2]."-".$arrayData[1]."-".$arrayData[0];
//$imv = $_POST["imv"];

//echo $imv;

if(empty($destino)){
    $imv = $_POST["imv"];
    
    $destino = $imv;
}

//recuperar os dados do formulario
$nome = ucfirst($_POST["nome"]);
$sobrenome = ucfirst($_POST["sobrenome"]);
$matricula = $_POST["matricula"];
$cpf = $_POST["cpf"];
$datanasc = $dtnasc;
$sexo = $_POST["sexo"];
$celular = $_POST["celular"];
$endereco = ucfirst($_POST["endereco"]);
$cidade = ucfirst($_POST["cidade"]);
$estado = $_POST["estado"];
$imagem = $destino;
$status = $_POST["status"];

$idaluno = $_POST["idaluno"];

$alunoDTO = new AlunoDTO();
$alunoDTO->setNome($nome);
$alunoDTO->setSobrenome($sobrenome);
$alunoDTO->setMatricula($matricula);
$alunoDTO->setCpf($cpf);
$alunoDTO->setDatanascimento($datanasc);
$alunoDTO->setSexo($sexo);
$alunoDTO->setCelular($celular);
$alunoDTO->setEndereco($endereco);
$alunoDTO->setCidade($cidade);
$alunoDTO->setEstado($estado);
$alunoDTO->setImagem($imagem);
$alunoDTO->setStatus($status);

$alunoDTO->setIdaluno($idaluno);

$alunoDAO = new AlunoDAO();
$status = $alunoDAO->alterar($alunoDTO);



if(isset($status)){
    echo "<script>";
    echo "alert('Cadastrado Atualizado com Sucesso!')";
    echo "</script>";
    echo "<script>";
    echo "window.location='../view/listarAlunos.php'";
    echo "</script>";
    
}
?>
