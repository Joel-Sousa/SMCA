<!DOCTYPE html>
<?php
include './validarLogin.php';
require_once "../DTO/alunoDTO.php";
require_once "../DAO/alunoDAO.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SMCA</title>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/mycss.css">
        <link rel="stylesheet" type="text/css" href="../css/dat.css">
        <link rel="shortcut icon" type="image/x-icon" href="../img/ico.png"> 
        <script language="javascript" type="text/javascript" src="../js/validacaocpf.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/dat.css">
        <style> body{ background: #8ea1f3;}</style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script language='JavaScript'>
            function SomenteNumero(e) {
                var tecla = (window.event) ? event.keyCode : e.which;
                if ((tecla > 47 && tecla < 58))
                    return true;
                else {
                    if (tecla == 8 || tecla == 0)
                        return true;
                    else
                        return false;
                }
            }
        </script>

    </head>
    <body  onLoad="document.form.matricula.focus();">
        <a href='home.php'><img src="../img/set.png" width="50" height="50"></a>
        <!--<a href='home.php'><input type="button" value="Voltar" id="btnCad"></a>-->

        <form name="form" action="" method="post">
            <center> <?PHP
                date_default_timezone_set('America/Sao_Paulo');
                $data = date('d/m/Y');
                $hora = date('H:i');
                echo "<input readonly='readonly' type='hidden' name='hora' value='$hora'/>";
                echo "<input readonly='readonly' type='hidden' name='data' value='$data'/>";
                ?></center>
            <center>

                Pesquisar:
                <!--<input type="text" name="matricula" placeholder="Matricula" minlength="8" maxlength="8"  class="txt" onkeypress='return SomenteNumero(event)'/>-->
                <input type="text" name="matricula" placeholder="Matricula" minlength="8" maxlength="8"  class="txt"/>
                <input type="submit" value="pesquisar" id="btnCad"/>

            </center>
        </form>

        <?php
        require_once '../dao/alunoDAO.php';
        $alunoDAO = new AlunoDAO();
        echo "<br><br><br><br><br>";
        if (isset($_POST["matricula"])) {
            $pnome = $_POST["matricula"];
            $alunos = $alunoDAO->pesquisarAlunoByMatricula($pnome);

            foreach ($alunos as $a) {
                $imagem = "{$a['imagem']}";
                $nome = "{$a['nome']}";
                $matricula = "{$a['matricula']}";
                $status = "{$a['status']}";
                //echo $tipo;
            }
            if (empty($_POST["matricula"])) {

                echo "<br><br><center><b><font size='4'>Digite Uma Matricula Valida!</font></b></center>";
                echo "<br><br><br><br><br><br><br><br><br>";
                echo "<br><br><br><br><br><br><br><br>";
//                if($_POST["pnome"] != $pnome){}
            } else if (empty($alunos)) {
                echo "<script> alert('Aluno não Encontrado!')</script>";
                echo "<br><br><center><b><font size='4'>Aluno Não Encontrado!</font></b></center>";
                echo "<br><br><br><br><br><br><br><br><br>";
                echo "<br><br><br><br><br><br><br><br>";
            } else if ($status == "Pendente") {
                echo "<script>";
                echo "alert('Cadastro Do Aluno: $nome e Matricula: $matricula  Pendente!')";
                echo "</script>";
                echo "<center><b><font size='3'>O Cadastro deste Aluno Encontra-se Pendente!</font></b></center><br>";
                foreach ($alunos as $a) {
                    echo "<font size='4'>";
                    echo "<table border='1' width='500'  height='170' align='center' cellspacing='0'>";
                    echo "  <tr>";
                    echo "      <td rowspan='4'  width='80'><img src='{$a['imagem']}' width='150' height='190'></td>";
                    echo "      <th width='80' bgcolor='#d9edf7'>Nome:</th>";
                    echo "      <td width='270' bgcolor='#f5f5f5'>{$a["nome"]} {$a["sobrenome"]}</td>";
                    echo "  </tr>";
                    echo "  <tr>";
                    echo "      <th bgcolor='#d9edf7'>Matricula:</th>";
                    echo "      <td bgcolor='#f5f5f5'>{$a["matricula"]}</td>";
                    echo "  </tr>";
                    echo "  <tr>";
                    echo "      <th bgcolor='#d9edf7'>Sexo:</th>";
                    echo "      <td bgcolor='#f5f5f5'>{$a["sexo"]}</td>";
                    echo "  </tr>";
                    echo "  <tr>";
                    echo "      <th bgcolor='#d9edf7'>Status:</th>";
                    echo "      <td bgcolor='#f5f5f5'>{$a["status"]}</td>";
                    echo "  </tr>";
                    echo "</table>";
                    echo "</font>";
                    echo "<br><br><br><br><br><br><br><br><br>";
                    $hora = $_POST["hora"];
                    $data = $_POST["data"];

                    $alunoDTO = new AlunoDTO();
                    $alunoDTO->setIdaluno($a["idaluno"]);
                    $alunoDTO->setNome($a["nome"]);
                    $alunoDTO->setMatricula($a["matricula"]);
                    $alunoDTO->setStatus($a["status"]);
                    $alunoDTO->setHora($hora);
                    $alunoDTO->setData($data);

                    $alunoDAO = new AlunoDAO();
                    $alunoDAO->salvarHistorico($alunoDTO);
                }
            } else {
                echo '<br><br>';
                foreach ($alunos as $a) {
                    echo "<font size='4'>";
                    echo "<table border='1' width='500'  height='170' align='center' cellspacing='0'>";
                    echo "  <tr>";
                    echo "      <td rowspan='4'  width='80'><img src='{$a['imagem']}' width='150' height='190'></td>";
                    echo "      <th width='80' bgcolor='#d9edf7'>Nome:</th>";
                    echo "      <td width='270' bgcolor='#f5f5f5'>{$a["nome"]} {$a["sobrenome"]}</td>";
                    echo "  </tr>";
                    echo "  <tr>";
                    echo "      <th bgcolor='#d9edf7'>Matricula:</th>";
                    echo "      <td bgcolor='#f5f5f5'>{$a["matricula"]}</td>";
                    echo "  </tr>";
                    echo "  <tr>";
                    echo "      <th bgcolor='#d9edf7'>Sexo:</th>";
                    echo "      <td bgcolor='#f5f5f5'>{$a["sexo"]}</td>";
                    echo "  </tr>";
                    echo "  <tr>";
                    echo "      <th bgcolor='#d9edf7'>Status:</th>";
                    echo "      <td bgcolor='#f5f5f5'>{$a["status"]}</td>";
                    echo "  </tr>";
                    echo "</table>";
                    echo "</font>";
                    echo "<br><br><br><br><br><br><br><br><br>";
                }

                $hora = $_POST["hora"];
                $data = $_POST["data"];

                $alunoDTO = new AlunoDTO();
                $alunoDTO->setIdaluno($a["idaluno"]);
                $alunoDTO->setNome($a["nome"]);
                $alunoDTO->setMatricula($a["matricula"]);
                $alunoDTO->setStatus($a["status"]);
                $alunoDTO->setHora($hora);
                $alunoDTO->setData($data);

                $alunoDAO = new AlunoDAO();
                $alunoDAO->salvarHistorico($alunoDTO);
            }
            echo "</table>";
        }
        ?>
<?php // include './footer.php'; ?>
    </body>
</html>
