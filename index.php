<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>SMCA</title>
        <link rel="stylesheet" type="text/css" href="css/styleLogin.css"/>
        <link rel="shortcut icon" href="img/ico.png" />
        <style> body{ background: #8ea1f3;}</style>
    </head>
    <body onLoad="document.frmLogin.user.focus();">
        <br><br><br>
        <div id="log1"><img src="img/dfd.png"></div>
        <br><br><br><br><br><br><br>
        <div class="centerLogin">
            <form method="post" name="frmLogin" action="controller/loginController.php">
                <div class="emailLogin formularioLogin">
                    <img src="img/imgLogin/user.png" alt="E-mail" />
                    <input type="text" name="user" required="true" placeholder="Login" autocomplete="off" />
                </div>

                <div class="senhaLogin formularioLogin">
                    <img src="img/imgLogin/pass.png" alt="Senha" />
                    <input type="password" name="senha" required="senha"placeholder="********" autocomplete="off" />
                </div>

                <input type="submit" name="btnSubmit" value="Login" class="btnSubmitLogin" />&nbsp;&nbsp;&nbsp;
                <font color="red" size="4">
        <b>
            <?php
            if (isset($_GET["msg"])) {
                echo "<script>";
                echo "alert('Login ou Senha Invalidos!')";
                echo "</script>";
                echo $_GET["msg"];
            }
            ?>
        </b>
        </font>
            </form>
            
        </div>
        
</body>
</html>
