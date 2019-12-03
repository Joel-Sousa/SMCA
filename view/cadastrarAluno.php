<!DOCTYPE html>
<?php
include './principal.php';
//include './validarLogin.php';
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script language="javascript" type="text/javascript" src="../js/validacaocpf.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/mycss.css">
        <link rel="stylesheet" type="text/css" href="../css/dat.css">
        <style> body{ background: #8ea1f3;}</style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script language=javascript>
            function formata(src, mask)
            {
                var i = src.value.length;
                var saida = mask.substring(0, 1);
                var texto = mask.substring(i)
                if (texto.substring(0, 1) != saida)
                {
                    src.value += texto.substring(0, 1);
                }
            }
            function VALIDA() {
                if (isCPF(document.form1.cpf.value, 1)) {
//	alert('OK');
                } else {
                    alert('Digite um CPF Valido!');
                    document.getElementById('cpf1').value = '';
                    document.form1.cpf.focus();
                }
            }
        </script>

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
        <script language="JavaScript" type="text/javascript">
            function limite(val) {

                var max = 31;
                if (val > max) {
                    alert("Numero Tem que Ser Menor ou Igual a 31! ", val);
                    document.getElementById('dat1').value = '';
                    document.form1.datadia.focus();
                    return false;
                } else {
                    return true;
                }
            }
            // End -->
        </script> 

        <script language="JavaScript" type="text/javascript">
            function limite1(val) {

                var max = 2016;
                if (val > max) {
                    alert("O ano tem Que Ser Inferior A 2016! ", val);
                    document.getElementById('dat3').value = '';
                    document.form1.dataano.focus();
                    return false;
                } else {
                    return true;
                }
            }
            // End -->
        </script> 
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
    </head>
<?php $aleatorio = rand(10000000, 99999999); ?>
    <body >
    <center>
        <font color="red" size="4">
        <i><b>
                <?php
                if (isset($_GET["msg"])) {
                    echo $_GET["msg"];
                }
                ?>
            </b></i>
        </font>
    </center>
    <center>
        <b>Cadastrar Aluno.<br>
            Campos Obrigatorios(*).</b>
        <b><form action="../controller/cadastrarAlunoController.php" method="post" name="form1" enctype="multipart/form-data">
                <table id="cad_table">
                    <tr>
                        <td>Nome:*</td>
                        <td><input type="text" name="nome" required="true" class="txt" style="text-transform: capitalize"/></td>
                    </tr>
                    <tr>
                        <td>Sobrenome:</td>
                        <td><input type="text" name="sobrenome" class="txt" style="text-transform: capitalize"/></td>
                    </tr>
                    <tr>
                        <td>Matricula:*</td>
                        <td><input type="text" name="matricula" required="true" minlength="8" maxlength="8" value="<?php echo $aleatorio; ?>" class="txt"  onkeypress='return SomenteNumero(event)'/></td>
                    </tr>
                    <tr>
                        <td>Cpf:*</td>
                        <td><input type="text" required="true" id="cpf1" name="cpf" onChange="VALIDA()" onKeyPress="formata(this, '###.###.###-##')" maxlength="14"class="txt"/></td>
                    </tr>
<!--                    <tr>
                        <td>Data Nascimento:*</td>
                        <td><input type="date" required="true" name="datanasc" class="txt"/></td>
                    </tr>                -->
                    <tr>
                        <td>Data Nascimento:</td>
                        <td>
                            <input type="text" name="datadia" minlength="1" maxlength="2" id="dat1" placeholder="Dia" required="true"  onchange="limite(this.value)"  onkeypress='return SomenteNumero(event)'>
                            <select name="datames" id="dat2"  required="true">
                                <option value="">Mes</option>
                                <option value="01">Janeiro</option>
                                <option value="02">Fevereiro</option>
                                <option value="03">Março</option>
                                <option value="04">Abril</option>
                                <option value="05">Maio</option>
                                <option value="06">Junho</option>
                                <option value="07">Julho</option>
                                <option value="08">Agosto</option>
                                <option value="09">Setembro</option>
                                <option value="10">Outubro</option>
                                <option value="11">Novembro</option>
                                <option value="12">Dezembro</option>
                            </select>
                            <input type="text" name="dataano" minlength="4" maxlength="4" id="dat3" placeholder="Ano" required="true"  onchange="limite1(this.value)" onkeypress='return SomenteNumero(event)'>
                        </td>
                    </tr> 
                    <tr>
                        <td>Sexo:*</td>
                        <td>
                             Masculino: <input type="radio" name="sexo" value="Masculino" required="true"/>
                             Feminino: <input type="radio" name="sexo" value="Feminino"/>
                        </td>
                    </tr> 
                    <tr>
                    <script type='text/javascript'>
                        function MascaraTeleC(obj)
                        {
                            switch (obj.value.length)
                            {
                                case 0:
                                    obj.value = obj.value + "(";
                                    break;
                                case 3:
                                    obj.value = obj.value + ") ";
                                    break;
                                case 10:
                                    obj.value = obj.value + "-";
                                    break;
                            }
                        }
                    </script>
                    <td>Celular:*</td>
                    <td><input type="text" required="true" name="celular"  onKeyPress='MascaraTeleC(this);' maxlength="15" class="txt"  onkeydown='return SomenteNumero(event)'/></td>
                    </tr>
                    <tr>
                        <td>Endereco:</td>
                        <td><input type="text" name="endereco" class="txt" style="text-transform: capitalize"/></td>
                    </tr>
                    <tr>
                        <td>Cidade:*</td>
                        <td><input type="text" required="true" name="cidade" class="txt" style="text-transform: capitalize"/></td>
                    </tr>
                    <tr>
                        <td>Estado:*</td>
                        <td>
                            <select name="estado" required="true" class="txt">
                                <option value="">.:Selecione:.</option>
                                <option value="Goias">Goias</option>
                                <option value="Distrito Federal">Distrito Federal</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Imagem:</td><!--
                        <td><input type="file" name="arquivo"></td>-->
                        <td>
                            <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
                            <div id="teste">
                                <input type="file" name="arquivo" multiple="multiple" id="upload" />
                                <input type="text" id="texto" />
                                <input type="button" id="botao" value="Enviar" />
                            </div>

                        </td>

                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="status" value="Regular"/>
                            <input type="hidden" name="idperfil" value="3"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="Cadastrar" id="btnCad"/>
                            <input type="reset" value="Limpar" id="btnCad"/>
                        </td>
                    </tr>                
                </table>
            </form></b>
    </center>
<?php include './footer.php'; ?>
</body>
</html>
