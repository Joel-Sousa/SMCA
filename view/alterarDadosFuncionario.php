<!DOCTYPE html>
<?php
include './principal.php';
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <style> body{ background: #8ea1f3;}</style>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/mycss.css">
        <script language="JavaScript" type="text/javascript" src="../js/validacao.js"></script> 
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
        require_once '../dao/funcionarioDAO.php';

        $funcionarioDAO = new FuncionarioDAO();

        if (isset($_SESSION["usuario"])) {
            $id = $_SESSION["usuario"];
            $funcionario = $funcionarioDAO->getByid($id);

            foreach ($funcionario as $f) {
                //echo "{$f['idusuario']}";
                //echo "<br>";
                //echo "{$f['idfuncionario']}";
            }
        }
        ?>
    <center>
       <b> Alterar Funcionario.<br>
        Campos Obrigatorios(*).</b>
        <b><form action="../controller/alterarFuncionarioController.php" method="post" name="form1">
            <input type="hidden" name="idusuario" value="<?php echo $f["funcionarios_idfuncionario"] ?>"/>
            <input type="hidden" name="idfuncionario" value="<?php echo $f["idfuncionario"] ?>"/>
            <table  id="cad3">
                <tr>
                    <td>Nome:*</td>
                    <td><input type="text" name="nome" required="true" value="<?php echo $f["nome"] ?>" class="txt" style="text-transform: capitalize"/></td>
                </tr>
                <tr>
                    <td>Sobrenome:</td>
                    <td><input type="text" name="sobrenome" value="<?php echo $f["sobrenome"] ?>" class="txt" style="text-transform: capitalize"/></td>
                </tr>
                <tr>
                    <td>Cpf:</td>
                    <td><input type="text" name="cpf" readonly="readonly" onBlur="ValidarCPF(form1.cpf);" 
                               onKeyPress="MascaraCPF(form1.cpf);" maxlength="14" value="<?php echo $f["cpf"] ?>" class="txt"/></td>
                </tr>
<!--                <tr>
                    <td>Data Nascimento:*</td>
                    <td><input type="date" name="dtnasc" required="true" value="<?php echo $f["datanascimento"] ?>" class="txt"/></td>
                </tr>                -->
                <tr>
                    <td>Data Nascimento:*</td>
                    <td>
                        <?php
                        $data = $f["datanascimento"];
                        $arrayData = explode("-", $data);

                        ?>
                        <input type="text" name="dtnasc" required="true" readonly="readonly" value="<?php echo $arrayData[2]."/".$arrayData[1]."/".$arrayData[0]; ?>" class="txt"/>
                    </td>
                </tr> 
                <tr>
                    <td>Sexo:*</td>
                    <td>
                        <?php
                        if ($f["sexo"] == 'Masculino') {
                            echo " Masculino: <input checked type='radio' name='sexo' value='Masculino'/>";
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
                    <td><input type="text" name="celular" required="true" id="celular" onKeyPress="fone(this)" onkeydown='return SomenteNumero(event)' maxlength="15" value="<?php echo $f["celular"] ?>" class="txt"/></td>
                </tr>
                <tr>
                    <td>Endereco:</td>
                    <td><input type="text" name="endereco" value="<?php echo $f["endereco"] ?>" class="txt" style="text-transform: capitalize"/></td>
                </tr>
                <tr>
                    <td>Cidade:*</td>
                    <td><input type="text" name="cidade" required="true" value="<?php echo $f["cidade"] ?>" class="txt" style="text-transform: capitalize"/></td>
                </tr>
                <tr>
                    <td>Estado:*</td>
                    <td>
                        <?php
                        //$funcionario["estado"];
                        echo "<select name='estado' required='true' class='txt'>";
                        echo "<option value=''>.:Selecione:.</option>";
                        if ($f["estado"] == 'Goias') {
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
                    <td>Usuário:</td>
                    <td><input type="text" name="usuario" readonly="readonly" required="true" value="<?php echo $f["usuario"] ?>" class="txt"/></td>
                </tr>
                <tr>
                    <td>Senha:*</td>
                    <td>
                        <a href="alterarSenha.php"><font color="black"><input type="button" name="senha" value="Alterar Senha" id="btnalt"/></font></a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                            <?php
                            $f["perfil"];
                            if ($f["perfil"] == 'Administrador') {
                                echo "<input type='hidden' name='perfil' value='1'>";
                            } else {
                                echo "<input type='hidden' name='perfil' value='2'>";
                            }
                            echo "</select>";
                            ?>
                        </td>
                </tr>                                                            
                <tr>
                    <td colspan="2"><input type="submit" value="Alterar"  id="btnCad"/></td>
                </tr>                
            </table>              
        </form></b>
    </center>
    <?php
    include './footer.php';
    ?>
</body>
</html>
