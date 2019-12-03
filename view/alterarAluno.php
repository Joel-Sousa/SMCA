<!DOCTYPE html>
<?php
include './principal.php';
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/mycss.css">
        <style> body{ background: #8ea1f3;}</style>
        <script language="JavaScript" type="text/javascript" src="../js/validacao.js"></script> 
        <script>
            $(function () {
                $('#upload').on('change', function () {
                    var numArquivos = $(this).get(0).files.length;
                    if (numArquivos > 1) {
                        $('#texto').val(numArquivos + ' arquivos selecionados');
                    } else {
                        $('#texto').val($(this).val());
                    }
                });
            });
        </script>
        <style>
            #teste { position:relative; }
            #upload { position:absolute; top:0;left:0; border:1px solid #ff0000; opacity:0.01; z-index:1; }
            #texto { border:0px; background:#dedede; border-radius:4px; padding:5px; }
            #botao { border:1px solid #dedede; background:#989898; color:#ffffff; border-radius:4px; padding:5px }
        </style>
        <script>
    function fone() {
        if (document.form1.celular.value.length == 0) {
            document.form1.celular.value = "(" + document.form1.celular.value;
        }
        if (document.form1.celular.value.length == 3) {
            document.form1.celular.value = document.form1.celular.value + ") ";
        }
        if (document.form1.celular.value.length == 10) {
            document.form1.celular.value = document.form1.celular.value + "-";
        }
    }
</script>
<script language='JavaScript'>
function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true;
	else  return false;
    }
}
</script>
    </head>
    <body>

        <?php
        require_once '../dao/alunoDAO.php';

        $idaluno = null;
        if (isset($_GET["id"])) {
            $idaluno = $_GET["id"];
        }
        $alunoDAO = new AlunoDAO();
        $aluno = $alunoDAO->getAlunoById($idaluno);
        ?>
    <center>
        <b>Alterar Aluno.<br>
        Campos Obrigatorios(*).</b>
        <b>
        <form action="../controller/alterarAlunoController.php" method="post" name="form1" enctype="multipart/form-data">
            <input type="hidden" name="idaluno" value="<?php echo $aluno["idaluno"] ?>"/>
            <table id="cad_table2">
                <tr>
                    <td>Nome:*</td>
                    <td><input type="text" name="nome" required="true" value="<?php echo $aluno["nome"] ?>" class="txt" style="text-transform: capitalize"/></td>
                </tr>
                <tr>
                    <td>Sobrenome:</td>
                    <td><input type="text" name="sobrenome" value="<?php echo $aluno["sobrenome"] ?>" class="txt" style="text-transform: capitalize"/></td>
                </tr>
                <tr>
                    <td>Matricula:</td>
                    <td><input type="text" name="matricula" readonly="readonly" value="<?php echo $aluno["matricula"] ?>" class="txt"/></td>
                </tr>
                <tr>
                    <td>Cpf:*</td>
                    <td><input type="text" name="cpf" required="true" onBlur="ValidarCPF(form1.cpf);" 
                               onKeyPress="MascaraCPF(form1.cpf);" maxlength="14" value="<?php echo $aluno["cpf"] ?>" class="txt"/></td>
                </tr>
<!--                    <tr>
                    <td>Data Nascimento:*</td>
                    <td><input type="text" name="dtnasc" required="true" value="<?php echo $aluno["datanascimento"] ?>" class="txt"/></td>
                </tr>                -->
                <tr>
                    <td>Data Nascimento:*</td>
                    <td>
                        <?php
                        $data = $aluno["datanascimento"];
                        $arrayData = explode("-", $data);
                        ?>
                        <input type="text" name="dtnasc" required="true" readonly="readonly" value="<?php echo $arrayData[2] . "/" . $arrayData[1] . "/" . $arrayData[0]; ?>" class="txt"/>
                    </td>
                </tr>
                <tr>
                    <td>Sexo:</td>
                    <td>
                        <?php
                        if ($aluno["sexo"] == 'Masculino') {
                            echo "Masculino: <input checked type='radio' name='sexo' value='Masculino'/>";
                            echo " Feminino: <input type='radio' name='sexo' value='Feminino'/>";
                        } else {
                            echo "Masculino <input type='radio' name='sexo' value='Masculino'/>";
                            echo "Feminino <input checked type='radio' name='sexo' value='Feminino'/>";
                        }
                        ?>
                    </td>
                </tr> 
                <tr>
                    <td>Celular:*</td>
                    <td><input type="text" name="celular" required="true"  id="celular" onKeyPress="fone(this)"  maxlength="15"  onkeydown='return SomenteNumero(event)' value="<?php echo $aluno["celular"] ?>" class="txt"/></td>
                </tr>
                <tr>
                    <td>Endereco:</td>
                    <td><input type="text" name="endereco" value="<?php echo $aluno["endereco"] ?>" class="txt" style="text-transform: capitalize"/></td>
                </tr>
                <tr>
                    <td>Cidade:*</td>
                    <td><input type="text" name="cidade" required="true" value="<?php echo $aluno["cidade"] ?>" class="txt" style="text-transform: capitalize"/></td>
                </tr>
                <tr>
                    <td>Estado:*</td>
                    <td>
                        <?php
                        //$funcionario["estado"];
                        echo "<select name='estado' required='true' class='txt'>";
                        echo "<option value=''>.:Selecione:.</option>";
                        if ($aluno["estado"] == 'Goias') {
                            echo "<option selected value='Goias'>Goias</option>";
                            echo "<option value='Distrito Federal'>Distrito Federal</option>";
                        } else {
                            echo "<option value='Goias'>Goias</option>";
                            echo "<option selected value='Distrito Federal'>Distrito Federal</option>";
                        }
                        echo "</select>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Imagem:</td>
                    <td>
                        <!--<input type="file" name="arquivo">-->
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                        <div id="teste">
                            <input type="file" name="arquivo" multiple="multiple" id="upload" />
                            <input type="text" id="texto" />
                            <input type="button" id="botao" value="Enviar" />
                        </div>



                        <input type="hidden" name="imv" value="<?php echo $aluno["imagem"] ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td>
                        <?php
                        if ($aluno["status"] == "Regular") {
                            echo "Regular:<input checked type='radio' name='status' value='Regular'/>";
                            echo "Pendente:<input type='radio' name='status' value='Pendente'/>";
                        } else {
                            echo "Regular:<input type='radio' name='status' value='Regular'/>";
                            echo "Pendente:<input checked type='radio' name='status' value='Pendente'/>";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Alterar"  id="btnCad"/></td>
                </tr>                
            </table>              
        </form>
            </b>
    </center>
    <?php
    include './footer.php';
    ?>
</body>
</html>
