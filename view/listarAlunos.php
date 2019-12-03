<!DOCTYPE html>
<?php
include './principal.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style> body{ background: #8ea1f3;}</style>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/mycss.css">
        <script language="Javascript">
            function confirmacao(id) {
                var resposta = confirm("Deseja Excluir esse Aluno?");
                if (resposta == true) {
                    window.location.href = "../controller/excluirAlunoByIdController.php?id=" + id;
                 }
            }
        </script>


    </head>
    <body  style="background-color: " onLoad="document.form.pnome.focus();">
        <br>
    <center>
        <form name="form" action="" method="post">
            Pesquisar:
            <input type="text" name="pnome" placeholder="Digite o Nome"  class="txt"/>
            <input type="submit" value="pesquisar"  id="btnCad"/>
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

    echo "<table border='1' align='center' width='500' bordercolor='#dddddd'>";
    echo "  <tr>";
    echo "      <th bgcolor='#d9edf7' height='30'>Nome</th>";
    echo "      <th bgcolor='#d9edf7'>Sobrenome</th>";
    echo "      <th bgcolor='#d9edf7'>Idade</th>";
    echo "      <th bgcolor='#d9edf7'>Matricula</th>";
    echo "      <th bgcolor='#d9edf7'>Sexo</th>";
    echo "      <th bgcolor='#d9edf7'>Status</th>";
    echo "      <th bgcolor='#d9edf7'>Alterar</th>";
    echo "      <th bgcolor='#d9edf7'>Excluir</th>";
    echo "  </tr>";
    foreach ($alunos as $a) {
        echo "  <tr>";
        echo "      <td bgcolor='#f5f5f5' height='30'>{$a["nome"]}</td>";
        echo "      <td bgcolor='#f5f5f5'>{$a["sobrenome"]}</td>";
        echo "      <td bgcolor='#f5f5f5'>{$a["idade"]}</td>";
        echo "      <td bgcolor='#f5f5f5'>{$a["matricula"]}</td>";
        echo "      <td bgcolor='#f5f5f5'>{$a["sexo"]}</td>";
        echo "      <td bgcolor='#f5f5f5'>{$a["status"]}</td>";
        echo "      <td align='center' bgcolor='#f5f5f5'><a href='alterarAluno.php?id={$a["idaluno"]}'><b class='glyphicon glyphicon-pencil' title='Alterar'></b></a></td>";
        //echo "      <td  align='center'><a href='../controller/excluirAlunoByIdController.php?id={$a["idaluno"]}&iduser={$a["idaluno"]}'><input type='button' value='Excluir'/></a></td>";
        echo "<td align='center' bgcolor='#f5f5f5'><a href='javascript:func()'onclick='confirmacao({$a['idaluno']})'><b class='glyphicon glyphicon-trash' title='Excluir'></b></a></td>";
        echo "  </tr>";
    }
    echo "</table>";
    echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
    ?>
    <?php
    include './footer.php';
    ?>
</body>
</html>
