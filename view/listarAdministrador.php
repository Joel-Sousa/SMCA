<!DOCTYPE html>
<?php
include './principal.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/mycss.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script language="Javascript">
            function confirmacao(id) {
                var resposta = confirm("Deseja Excluir esse Funcionario?");
                if (resposta === true) {

                    window.location.href = "../controller/excluirFuncionarioByIdController.php?iduser=" + id;
                 }
            }
        </script>
<style> 
    body{ background: #8ea1f3;}
    #adm{position:absolute; margin-left: 20px;}
    
</style>
    </head>
    <body onLoad="document.form.pnome.focus();">
        <div id="adm"><a href="listarFuncionarios.php"><input type="button" name="Funcionario" value="Funcionarios" id="btnCad"></a></div>
    <center>
        <form name="form" action="" method="post">
            Pesquisar:
            <input type="text" name="pnome" placeholder="Nome do Funcionario" class="txt"/>
            <input type="submit" value="pesquisar" id="btnCad"/>
        </form>
    </center>
    <br>
    <?php
    require_once '../dao/funcionarioDAO.php';
    $funcionarioDAO = new FuncionarioDAO();

    if (isset($_POST["pnome"])) {
        $pnome = $_POST["pnome"];
        $funcionarios = $funcionarioDAO->pesquisarFuncionarioByNome2($pnome);
    } else {
        $funcionarios = $funcionarioDAO->getAllAdm();
    }
    echo "<table border='1'  align='center' width='500' bordercolor='#dddddd'>";
    echo "  <tr>";
    echo "      <th bgcolor='#d9edf7' width='100' height='30'>Nome</th>";
    echo "      <th bgcolor='#d9edf7' width='100'>Sobrenome</th>";
    echo "      <th bgcolor='#d9edf7' width='50'>Idade</th>";
    echo "      <th bgcolor='#d9edf7' width='100'>Sexo</th>";
    echo "      <th bgcolor='#d9edf7' width='100'>Usuário</th>";
    echo "      <th bgcolor='#d9edf7' width='50'>Alterar</th>";
    echo "      <th bgcolor='#d9edf7' width='50'>Excluir</th>";
    echo "  </tr>";
    foreach ($funcionarios as $f) {
        echo "  <tr>";
        echo "      <td bgcolor='#f5f5f5' height='30'>{$f["nome"]}</td>";
        echo "      <td bgcolor='#f5f5f5'>{$f["sobrenome"]}</td>";
        echo "      <td bgcolor='#f5f5f5'>{$f["idade"]}</td>";
        echo "      <td bgcolor='#f5f5f5'>{$f["sexo"]}</td>";
        echo "      <td bgcolor='#f5f5f5'>{$f["usuario"]}</td>";
        echo "      <td align='center' bgcolor='#f5f5f5'><a href='aterarFuncionario.php?id={$f["idfuncionario"]}'><b class='glyphicon glyphicon-pencil' title='Alterar'></b></a></td>";
        //echo "      <td  align='center'><a href='../controller/excluirFuncionarioByIdController.php?id={$f["idfuncionario"]}&iduser={$f["idusuario"]}'><input type='button' value='Excluir'/></a></td>";
        echo "      <td align='center' bgcolor='#f5f5f5' ><a href='javascript:func()' onclick='confirmacao({$f["funcionarios_idfuncionario"]})'><b class='glyphicon glyphicon-trash' title='Excluir'></b></a></td>";
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
