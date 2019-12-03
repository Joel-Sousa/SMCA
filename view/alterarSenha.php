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
        <script>
            function validaSenha(input) {
                if (input.value != document.getElementById('txtSenha').value) {
                    input.setCustomValidity('As Senhas Nao Sao Iguais!');
                } else {
                    input.setCustomValidity('');
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

            foreach ($funcionario as $u) {
                //echo "{$u['idusuario']}";
                //echo "<br>";
                //echo "{$u['idfuncionario']}";
            }
        }
        ?>
    <center><br>
        <h3>Alterar Senha.</h3><br><br>
        <form action="../controller/alterarSenhaController.php" method="post">
            <table id="duc">
                <tr>
                <input type="hidden" name="idusuario" value="<?php echo $u["idusuario"] ?>">
                    <td>Usuario:</td>
                    <td><input type="text" name="usuario" readonly="readonly" value="<?php echo $u["usuario"] ?>" class="txt"></td>
                </tr>
                <tr>
                    <td>Senha Antiga:</td>
                    <td><input type="password" name="senhav" required="true" placeholder="Digite a Senha Antiga" class="txt"></td>
                </tr>
                <tr>
                    <td>Nova Senha:</td>
                    <td><input type="password" id="txtSenha" name="senha" required="true" placeholder="Nova Senha" class="txt"></td>
                </tr>
                <tr>
                    <td>Confirma Nova Senha:</td>
                    <td><input type="password" id="repetir_senha"  name="reptirsenha" required="true" placeholder="Confirma Nova Senha" oninput="validaSenha(this)" class="txt"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Alterar Senha" id="btnalt"></td>
                </tr>
            </table>
        </form>
    </center>
    <br><br><br><br><br><br><br><br>
        <?php
        include './footer.php';
        ?>
    </body>
</html>
