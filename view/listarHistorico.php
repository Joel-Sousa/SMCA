<!DOCTYPE html>
<?php
include './principal.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
<style> body{ background: #8ea1f3;}
        #del{position:absolute; margin-top: -55; margin-left: 1250px;}
</style>
        <script language="Javascript">
            function confirmacao() {
                var resposta = confirm("Deseja Excluir Todo Historico?");
                if (resposta == true) {
                    window.location.href = "../controller/limparHistoricoController.php";
                 }
            }
        </script>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/mycss.css">
    </head>
    <body  onLoad="document.form.pmatricula.focus();">
        <br><br>
    <center>
        <form name="form" action="" method="post">
            Pesquisar:
            <input type="text" name="pmatricula" placeholder="Digite a Matricula" minlength="8" maxlength="8" class="txt"/>
            <input type="submit" value="pesquisar" id="btnCad"/>
            <div id="del"><p align="right"><a href='javascript:func()'onclick='confirmacao()'><font color="black"><input type="button" value="Limpar" title="Limpar Historico"  id="btnCad"></font></a></p></div>
        </form>
    </center>
    <!--<p align="right"><a href="limparHistoricoController"><input type="button" name="" value="Limpar"></a></p>-->
    <!--<a href='javascript:func()'onclick='confirmacao()'><input type="button" value="Limpar"  id="btnCad"></a>-->
    <br>
    <?php
    require_once '../dao/alunoDAO.php';
    $alunoDAO = new AlunoDAO();

    if (isset($_POST["pmatricula"])) {
        $pmatricula = $_POST["pmatricula"];
        $historico = $alunoDAO->pesquisarHistoricoByNome($pmatricula);
    } else {
        $historico = $alunoDAO->getAllHistorico();
    }

    echo "<table border='1' align='center' width='400' bordercolor='#dddddd'>";
    echo "  <tr>";
    echo "      <th bgcolor='#d9edf7' height='30'>Nome</th>";
    echo "      <th bgcolor='#d9edf7'>Matricula</th>";
    echo "      <th bgcolor='#d9edf7'>Status</th>";
    echo "      <th bgcolor='#d9edf7'>Hora</th>";
    echo "      <th bgcolor='#d9edf7'>Data</th>";
    //echo "      <th>Excluir</th>";
    echo "  </tr>";
    foreach ($historico as $h) {
        echo "  <tr>";
        echo "      <td  height='30' bgcolor='#f5f5f5'>{$h["nome"]}</td>";
        echo "      <td bgcolor='#f5f5f5'>{$h["matricula"]}</td>";
        echo "      <td bgcolor='#f5f5f5'>{$h["status"]}</td>";
        echo "      <td bgcolor='#f5f5f5'>{$h["hora"]}</td>";
        echo "      <td bgcolor='#f5f5f5'>{$h["data"]}</td>";
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
