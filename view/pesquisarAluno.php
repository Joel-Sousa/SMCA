<!DOCTYPE html>
<?php
include './principal.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style> body{ background: #8ea1f3;}</style>
    </head>
    <body>
       
    <center>
        <form action="" method="post">
            Pesquisar:
            <input type="text" name="pnome" placeholder="Digite o Nome"/>
            <input type="submit" value="pesquisar"/>
        </form>
    </center>
    <br>
    <?php
    require_once '../dao/alunoDAO.php';
    $alunoDAO = new AlunoDAO();

    if (isset($_POST["pnome"])) {
        $pnome = $_POST["pnome"];
        $alunos = $alunoDAO->pesquisarAlunoByNome($pnome);
    } else {
        $alunos = $alunoDAO->getAllAluno();
    }

    echo "<table border='1' align='center' cellspacing='0'>";
    echo "  <tr>";
    echo "      <th>Nome</th>";
    echo "      <th>Sobrenome</th>";
    echo "      <th>Matricula</th>";
    echo "      <th>Cpf</th>";
    echo "      <th>Data nascimento</th>";
    echo "      <th>Sexo</th>";
    echo "      <th>Celular</th>";
    echo "      <th>Endereço</th>";
    echo "      <th>Cidade</th>";
    echo "      <th>Estado</th>";
    echo "      <th>Alterar</th>";
    echo "      <th>Excluir</th>";
    echo "  </tr>";
    foreach ($alunos as $a) {
        echo "  <tr>";
        echo "      <td>{$a["nome"]}</td>";
        echo "      <td>{$a["sobrenome"]}</td>";
        echo "      <td>{$a["matricula"]}</td>";
        echo "      <td>{$a["cpf"]}</td>";
        echo "      <td>{$a["datanascimento"]}</td>";
        echo "      <td>{$a["sexo"]}</td>";
        echo "      <td>{$a["celular"]}</td>";
        echo "      <td>{$a["endereco"]}</td>";
        echo "      <td>{$a["cidade"]}</td>";
        echo "      <td>{$a["estado"]}</td>";
        echo "      <td><a href='alterarAluno.php?id={$a["idaluno"]}'><input type='button' value='Alterar'/></a></td>";
        echo "      <td  align='center'><a href='../controller/excluirAlunoByIdController.php?id={$a["idaluno"]}&iduser={$a["idaluno"]}'><input type='button' value='Excluir'/></a></td>";
        echo "  </tr>";
    }
    echo "</table>";
    ?>
    <?php
    include './footer.php';
    ?>
</body>
</html>
